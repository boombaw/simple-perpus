<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends CI_Controller
{

    public $viewpath = 'auth';

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $page = $this->viewpath . "/v_auth";
        $this->load->view($page);
    }
}
