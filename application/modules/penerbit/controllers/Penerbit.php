<?php

class Penerbit extends MY_Controller
{

    public $viewpath = "penerbit";

    function __construct()
    {
        parent::__construct();
        $this->load->model('Penerbit_model', 'penerbit');
    }

    public function index()
    {
        $page = $this->viewpath . "/v_penerbit";
        $data = [
            'content' => $page,
        ];

        $this->_admin($data);
    }

    public function list()
    {
        $list = $this->penerbit->get_all();

        $i = 1;
        $data = [];
        foreach ($list as $val) {
            $data[] = [
                'no' => $i,
                'id' => $val->id,
                'name' => $val->name,
                'address' => $val->address,
                'phone' => $val->phone,
            ];

            ++$i;
        }

        echo json_encode($data);
    }

    public function add()
    {
        if (array_key_exists('pbtid', $_POST)) {
            $this->_update($_POST);
        } else {
            $nama_penerbit = $this->input->post('nama_penerbit', true);
            $alamat_penerbit = $this->input->post('alamat_penerbit', true);
            $tlp_penerbit = $this->input->post('tlp_penerbit', true);

            $condition = ['name' => trim($nama_penerbit)];
            $exist = $this->penerbit->is_exist($condition);

            $response = [];

            if ($exist) {
                $response = [
                    'code' => 400,
                    'message' => 'Penerbit sudah terdaftar'
                ];
            } else {

                $data = [
                    'name' => trim($nama_penerbit),
                    'address' => trim($alamat_penerbit),
                    'phone' => trim($tlp_penerbit)
                ];

                $this->db->trans_begin();
                $this->penerbit->insert($data);

                if ($this->db->trans_status() === FALSE) {
                    $response = [
                        'code' => 500,
                        'message' => 'Penerbit baru gagal di tambahkan',
                    ];
                } else {
                    $this->db->trans_commit();

                    $response = [
                        'code' => 200,
                        'message' => 'Penerbit baru berhasil di tambahkan',
                    ];
                }
            }

            echo json_encode($response);
        }
    }

    public function _update($data)
    {
        $nama_penerbit = $data['nama_penerbit'];
        $alamat_penerbit = $data['alamat_penerbit'];
        $tlp_penerbit = $data['tlp_penerbit'];

        $id_penerbit = $data['pbtid'];

        $condition = ['name' => trim($nama_penerbit)];
        $exist = $this->penerbit->is_exist($condition);

        $response = [];

        if ($exist) {
            $response = [
                'code' => 400,
                'message' => 'Penerbit sudah terdaftar'
            ];
        } else {

            $data = [
                'name' => trim($nama_penerbit),
                'address' => trim($alamat_penerbit),
                'phone' => trim($tlp_penerbit)
            ];

            $condition = [
                'id' => $id_penerbit
            ];

            $this->db->trans_begin();
            $this->penerbit->update($data, $condition);

            if ($this->db->trans_status() === FALSE) {
                $response = [
                    'code' => 500,
                    'message' => 'Penerbit gagal di ubah',
                ];
            } else {
                $this->db->trans_commit();

                $response = [
                    'code' => 200,
                    'message' => 'Penerbit berhasil di ubah',
                ];
            }
        }

        echo json_encode($response);
    }

    public function save()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
        $id_penerbit = $this->input->post('id', true);

        $id_exist = $this->penerbit->id_exist($id_penerbit);

        if ($id_exist) {
            $response = [
                'code' => 400,
                'message' => 'Penerbit tidak terdaftar'
            ];
        } else {

            $condition = [
                'id' => $id_penerbit
            ];

            $this->db->trans_begin();
            $this->penerbit->delete($condition);

            if ($this->db->trans_status() === FALSE) {
                $response = [
                    'code' => 500,
                    'message' => 'Penerbit gagal di hapus',
                ];
            } else {
                $this->db->trans_commit();

                $response = [
                    'code' => 200,
                    'message' => 'Penerbit berhasil di hapus',
                ];
            }
        }

        echo json_encode($response);
    }
}
