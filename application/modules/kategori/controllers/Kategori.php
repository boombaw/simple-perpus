<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Kategori extends MY_Controller
{

    public $viewpath = "kategori";

    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model', 'kategori');
    }

    public function index()
    {
        $page = $this->viewpath . "/v_kategori";
        $data = [
            'content' => $page,
        ];

        $this->_admin($data);
    }

    public function list()
    {
        $list = $this->kategori->get_all();

        $i = 1;
        $data = [];
        foreach ($list as $val) {
            $data[] = [
                'no' => $i,
                'id' => $val->id,
                'kategori' => $val->name,
                'keterangan' => $val->desc
            ];

            ++$i;
        }

        echo json_encode($data);
    }

    public function add()
    {
        if (array_key_exists('katid', $_POST)) {
            $this->_update($_POST);
        } else {
            $kategori_name = $this->input->post('nama_kategori', true);
            $kategori_desc = $this->input->post('keterangan', true);

            $condition = ['name' => trim($kategori_name)];
            $exist = $this->kategori->is_exist($condition);

            $response = [];

            if ($exist) {
                $response = [
                    'code' => 400,
                    'message' => 'Kategori sudah terdaftar'
                ];
            } else {

                $data = [
                    'name' => trim($kategori_name),
                    'desc' => trim($kategori_desc)
                ];

                $this->db->trans_begin();
                $this->kategori->insert($data);

                if ($this->db->trans_status() === FALSE) {
                    $response = [
                        'code' => 500,
                        'message' => 'Kategori baru gagal di tambahkan',
                    ];
                } else {
                    $this->db->trans_commit();

                    $response = [
                        'code' => 200,
                        'message' => 'Kategori baru berhasil di tambahkan',
                    ];
                }
            }

            echo json_encode($response);
        }
    }

    public function _update($data)
    {
        $kategori_name = $data['nama_kategori'];
        $kategori_desc = $data['keterangan'];
        $kategori_id = $data['katid'];

        $condition = ['name' => trim($kategori_name)];
        $exist = $this->kategori->is_exist($condition);

        $response = [];

        if ($exist) {
            $response = [
                'code' => 400,
                'message' => 'Kategori sudah terdaftar'
            ];
        } else {

            $data = [
                'name' => trim($kategori_name),
                'desc' => trim($kategori_desc)
            ];

            $condition = [
                'id' => $kategori_id
            ];

            $this->db->trans_begin();
            $this->kategori->update($data, $condition);

            if ($this->db->trans_status() === FALSE) {
                $response = [
                    'code' => 500,
                    'message' => 'Kategori gagal di ubah',
                ];
            } else {
                $this->db->trans_commit();

                $response = [
                    'code' => 200,
                    'message' => 'Kategori berhasil di ubah',
                ];
            }
        }

        echo json_encode($response);
    }

    public function delete()
    {
        $kategori_id = $this->input->post('id', true);

        $id_exist = $this->kategori->id_exist($kategori_id);

        if ($id_exist) {
            $response = [
                'code' => 400,
                'message' => 'Kategori tidak terdaftar'
            ];
        } else {

            $condition = [
                'id' => $kategori_id
            ];

            $this->db->trans_begin();
            $this->kategori->delete($condition);

            if ($this->db->trans_status() === FALSE) {
                $response = [
                    'code' => 500,
                    'message' => 'Kategori gagal di hapus',
                ];
            } else {
                $this->db->trans_commit();

                $response = [
                    'code' => 200,
                    'message' => 'Kategori berhasil di hapus',
                ];
            }
        }

        echo json_encode($response);
    }
}
