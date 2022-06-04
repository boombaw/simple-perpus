<?php

class MY_Controller extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function _admin($data)
    {
        $page = 'template/layout/app';
        $this->load->view($page, $data);
    }

    function _blog()
    {
        $page = 'template/layout/blog';
        $this->load->view($page);
    }
}
