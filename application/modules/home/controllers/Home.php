<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Home extends MY_Controller
{

    public $viewpath = "home";

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->_blog();
    }
}
