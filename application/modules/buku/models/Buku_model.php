<?php

class Buku_model extends MY_Model
{

    protected $_table = 'tbl_buku';

    function __construct()
    {
        parent::__construct();
    }

    public function get_books()
    {
        return $this->db->get('view_books')->result();
    }
}
