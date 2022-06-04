<?php

defined('BASEPATH') or exit('No direct script access allowed');


class About extends MY_Controller
{

    public $viewpath = "about";

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $page = $this->viewpath . "/v_about";
        $data = [
            'content' => $page,
        ];

        $this->_admin($data);
    }
}
