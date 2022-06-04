<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Kategori extends MY_Controller
{

    public $viewpath = "kategori";

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $page = $this->viewpath . "/v_kategori";
        $data = [
            'content' => $page,
        ];

        $this->_admin($data);
    }
}
