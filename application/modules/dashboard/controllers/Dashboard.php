<?php

class Dashboard extends MY_Controller
{
    public $viewpath = "dashboard";

    function __construct()
    {
        parent::__construct();
    }

    public function home()
    {
        $page = $this->viewpath . "/v_dashboard";

        $data = [
            'content' => $page,
        ];

        $this->template->admin($data);
    }
}
