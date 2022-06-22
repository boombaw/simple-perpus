<?php

class Auth_model extends MY_Model
{

    protected $_table = 'users';

    function __construct()
    {
        parent::__construct();
    }

    public function get_by_username($username)
    {
        return $this->db->get_where($this->_table, ['username' => $username]);
    }
}
