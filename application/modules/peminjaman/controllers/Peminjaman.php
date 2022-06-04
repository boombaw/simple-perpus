<?php

class Peminjaman extends MY_Controller
{
    public $viewpath = "peminjaman";

    function __construct()
    {
        parent::__construct();
    }

    public function input()
    {

        $page = $this->viewpath . "/v_input_peminjaman";

        $data = [
            'content' => $page,
        ];

        $this->_admin($data);
    }

    public function list()
    {

        $page = $this->viewpath . "/v_daftar_pinjaman";

        $data = [
            'content' => $page,
        ];

        $this->_admin($data);
    }
}
