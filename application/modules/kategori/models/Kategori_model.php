<?php

class Kategori_model extends MY_Model
{

    protected $_table = 'tbl_kategori';

    function __construct()
    {
        parent::__construct();
    }

    public function get_by_id($id)
    {
        $this->db->where(['id' => $id]);
        $data = $this->db->get($this->_table);

        $res = new stdClass;
        if ($data->num_rows() > 0) {
            $res = $data->result();
        }

        return $res;
    }
}
