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

        $data = [];
        $this->load->model('Buku/Buku_model', 'buku');

        $buku = $this->buku->get_books();
        $data = [
            'buku' => $buku
        ];

        $this->load->view($page, $data);
    }
}
