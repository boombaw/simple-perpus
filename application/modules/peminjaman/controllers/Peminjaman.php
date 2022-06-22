<?php

class Peminjaman extends MY_Controller
{
    public $viewpath = "peminjaman";

    function __construct()
    {
        parent::__construct();
        $this->load->model("Peminjaman_model", "peminjaman");
        $this->load->model('Buku/Buku_model', 'buku');
    }

    public function input()
    {
        $buku = $this->buku->get_books();
        $page = $this->viewpath . "/v_input_peminjaman";
        $page = $this->viewpath . "/v_input_peminjaman";

        $data = [
            'content' => $page,
            'buku' => $buku
        ];

        $this->_admin($data);
    }

    public function list()
    {
        $peminjaman = $this->peminjaman->get_peminjaman();
        $page = $this->viewpath . "/v_daftar_pinjaman";

        $data = [
            'content' => $page,
            'peminjaman' => $peminjaman
        ];

        $this->_admin($data);
    }

    public function check()
    {
        $id = $this->input->post('member', true);

        $member_exists = $this->peminjaman->member_exists($id);

        $response = [];
        if ($member_exists) {
            $response = [
                'code' => 200,
                'message' => 'Member ditemukan'
            ];
        } else {
            $response = [
                'code' => 400,
                'message' => 'Member tidak terdaftar, periksa id member'
            ];
        }

        echo json_encode($response);
    }

    public function check_peminjaman()
    {
        $book_id = $this->input->post('book_id', true);
        $member_id = $this->input->post('member_id', true);

        $condition = [
            'book_id' => $book_id,
            'member_id' => $member_id,
            'is_kembali' => 0
        ];

        $peminjaman_exist = $this->peminjaman->is_exist($condition);

        $response = [];
        if ($peminjaman_exist) {
            $response = [
                'code' => 400,
                'message' => 'Buku sudah di pinjam'
            ];
        } else {
            $response = [
                'code' => 200,
                'message' => 'Buku bisa di pinjam'
            ];
        }

        echo json_encode($response);
    }

    public function add()
    {
        $data_insert = [];

        $member = $_POST['member'];
        $bukus = $_POST['bukus'];
        $lama_pinjams = $_POST['lama_pinjams'];


        for ($i = 0; $i < count($bukus); $i++) {
            $data_insert[] = [
                'book_id' => $bukus[$i],
                'member_id' => $member,
                'tgl_kembali' => date('Y-m-d', strtotime(date('Y-m-d') . ' +' . $lama_pinjams[$i] . ' day')),
                'tgl_pinjam' => date('Y-m-d')
            ];
        }

        $response = [];

        if ($this->peminjaman->insert_batch($data_insert)) {

            $response = [
                'code' => 200,
                'message' => 'Peminjaman berhasil di tambahkan',
            ];
        } else {

            $response = [
                'code' => 500,
                'message' => 'Peminjaman gagal di tambahkan',
            ];
        }

        echo json_encode($response);
    }

    public function selesai($id)
    {
        $condition = ['id' => $id];
        $exist = $this->peminjaman->is_exist($condition);
        $response = [];

        if (!$exist) {
            echo "<script>alert('Data tidak ditemukan !!');history.go(-1);</script>";
            exit();
        } else {

            $data = [
                'is_kembali' => 1,
            ];

            $condition = [
                'id' => $id
            ];

            $this->db->trans_begin();
            $this->peminjaman->update($data, $condition);

            if ($this->db->trans_status() === FALSE) {
                echo "<script>alert('Peminjaman gagal di selesaikan !!');history.go(-1);</script>";
                exit();
            } else {
                $this->db->trans_commit();
                echo "<script>alert('Peminjaman berhasil di selesaikan !!');history.go(-1);</script>";
                exit();
            }
        }

        echo json_encode($response);
    }
}
