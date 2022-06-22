<?php

class Peminjaman_model extends MY_Model
{

    protected $_table = 'detail_pinjaman';

    function __construct()
    {
        parent::__construct();
    }

    public function member_exists($id)
    {
        $data = $this->db->get_where('users', ['id' => $id, 'role' => 2]);

        $exist = false;
        if ($data->num_rows() > 0) {
            $exist = true;
        }

        return $exist;
    }

    public function get_peminjaman()
    {
        if ($this->session->role == 2) {
            $this->db->where('member_id', $this->session->uid);
        }

        return $this->db->get('view_peminjaman')->result();
    }
}
