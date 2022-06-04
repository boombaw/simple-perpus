<?php

class Buku extends MY_Controller
{

    public $viewpath = "buku";

    function __construct()
    {
        parent::__construct();
    }


    public function daftar_buku()
    {

        $page = $this->viewpath . "/v_daftar_buku";

        $data = [
            'content' => $page
        ];

        $this->_admin($data);
    }
}
