<?php

class Buku extends MY_Controller
{

    public $viewpath = "buku";

    function __construct()
    {
        parent::__construct();
        $this->load->model('kategori/Kategori_model', 'kategori');
        $this->load->model('penerbit/Penerbit_model', 'penerbit');
        $this->load->model('Buku_model', 'buku');
    }


    public function daftar_buku()
    {
        $kategori = $this->kategori->get_all();
        $penerbit = $this->penerbit->get_all();

        if ($this->session->role == 1) {
            $page = $this->viewpath . "/v_daftar_buku";
        } else {
            $page = $this->viewpath . "/v_daftar_buku_pengguna";
        }

        $data = [
            'kategori' => $kategori,
            'penerbit' => $penerbit,
            'content' => $page
        ];

        $this->_admin($data);
    }

    public function list()
    {
        $list = $this->buku->get_books();

        $i = 1;
        $data = [];
        foreach ($list as $val) {
            $data[] = [
                'no' => $i,
                'id' => $val->id,
                'judul_buku' => $val->title,
                'tahun_terbit' => $val->pub_year,
                'kategori' => $val->category_id,
                'kategori_name' => $val->category_name,
                'penerbit' => $val->publisher_id,
                'penerbit_name' => $val->publisher_name,
                'penulis' => $val->writer,
                'isbn' => $val->isbn,
            ];

            ++$i;
        }

        echo json_encode($data);
    }

    public function add()
    {
        if (array_key_exists('bid', $_POST)) {
            $this->_update($_POST);
        } else {
            $judul_buku = $this->input->post('judul', true);
            $tahun_terbit = $this->input->post('tahun', true);
            $penulis = $this->input->post('penulis', true);
            $isbn = $this->input->post('isbn', true);
            $penerbit = $this->input->post('penerbit', true);
            $kategori = $this->input->post('kategori', true);


            $condition = [
                'title' => trim($judul_buku),
                'pub_year' => trim($tahun_terbit),
                'writer' => trim($penulis),
                'isbn' => trim($isbn),
                'publisher_id' => $penerbit,
                'category_id' => $kategori,
            ];
            $exist = $this->buku->is_exist($condition);

            $response = [];

            if ($exist) {
                $response = [
                    'code' => 400,
                    'message' => 'Buku sudah terdaftar'
                ];
            } else {

                $data = [
                    'title' => trim($judul_buku),
                    'pub_year' => trim($tahun_terbit),
                    'writer' => trim($penulis),
                    'isbn' => trim($isbn),
                    'publisher_id' => trim($penerbit),
                    'category_id' => trim($kategori),
                ];

                $this->db->trans_begin();
                $this->buku->insert($data);

                if ($this->db->trans_status() === FALSE) {
                    $response = [
                        'code' => 500,
                        'message' => 'Buku baru gagal di tambahkan',
                    ];
                } else {
                    $this->db->trans_commit();

                    $response = [
                        'code' => 200,
                        'message' => 'Buku baru berhasil di tambahkan',
                    ];
                }
            }

            echo json_encode($response);
        }
    }

    public function _update($data)
    {
        $buku_id = $data['bid'];
        $judul = $data['judul'];
        $penulis = $data['penulis'];
        $isbn = $data['isbn'];
        $tahun = $data['tahun'];
        $penerbit_id = $data['penerbit'];
        $kategori_id = $data['kategori'];

        $condition = [
            'title' => trim($judul),
            'pub_year' => trim($tahun),
            'writer' => trim($penulis),
            'isbn' => trim($isbn),
            'publisher_id' => $penerbit_id,
            'category_id' => $kategori_id,
        ];
        $exist = $this->buku->is_exist($condition);
        $response = [];

        if ($exist) {
            $response = [
                'code' => 400,
                'message' => 'Kategori sudah terdaftar'
            ];
        } else {

            $data = [
                'title' => trim($judul),
                'pub_year' => trim($tahun),
                'writer' => trim($penulis),
                'isbn' => trim($isbn),
                'publisher_id' => trim($penerbit_id),
                'category_id' => trim($kategori_id),
            ];

            $condition = [
                'id' => $buku_id
            ];

            $this->db->trans_begin();
            $this->buku->update($data, $condition);

            if ($this->db->trans_status() === FALSE) {
                $response = [
                    'code' => 500,
                    'message' => 'Buku gagal di ubah',
                ];
            } else {
                $this->db->trans_commit();

                $response = [
                    'code' => 200,
                    'message' => 'Buku berhasil di ubah',
                ];
            }
        }

        echo json_encode($response);
    }

    public function delete()
    {
        $buku_id = $this->input->post('id', true);

        $id_exist = $this->buku->id_exist($buku_id);

        if ($id_exist) {
            $response = [
                'code' => 400,
                'message' => 'Buku tidak terdaftar'
            ];
        } else {

            $condition = [
                'id' => $buku_id
            ];

            $this->db->trans_begin();
            $this->buku->delete($condition);

            if ($this->db->trans_status() === FALSE) {
                $response = [
                    'code' => 500,
                    'message' => 'Buku gagal di hapus',
                ];
            } else {
                $this->db->trans_commit();

                $response = [
                    'code' => 200,
                    'message' => 'Buku berhasil di hapus',
                ];
            }
        }

        echo json_encode($response);
    }
}
