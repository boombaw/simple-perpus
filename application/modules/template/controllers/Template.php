<?php

class Template extends MY_Controller
{

    public function admin($data)
    {
        $page = 'template/layout/app';
        $this->load->view($page, $data);
    }

    public function blog()
    {
        $page = 'template/layout/blog';
        $this->load->view($page);
    }
}
