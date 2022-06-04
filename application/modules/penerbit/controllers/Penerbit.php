<?php

class Penerbit extends MY_Controller
{

    public $viewpath = "penerbit";

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $page = $this->viewpath . "/v_penerbit";
        $data = [
            'content' => $page,
        ];

        $this->template->admin($data);
    }
}
