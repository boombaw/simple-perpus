<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends MY_Controller
{

    public $viewpath = 'auth';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth');
    }

    public function index()
    {
        if ($this->session->is_login && $this->session->role == 1) {
            redirect('buku/daftar-buku', 'refresh');
        }

        if ($this->session->is_login && $this->session->role == 2) {
            redirect('about', 'refresh');
        }

        $page = $this->viewpath . "/v_auth";
        $this->load->view($page);
    }

    public function login()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        $condition = [
            'username' => $username,
            'password' => $password
        ];

        $exist = $this->auth->is_exist($condition);

        $response = [];

        if ($exist) {
            $response = [
                'code' => 200,
                'message' => 'Login Berhasil, sedang mengalihkan halaman'
            ];

            $user = $this->auth->get_by_username($username)->row();



            $this->session->set_userdata('is_login', true);
            $this->session->set_userdata('uid', $user->id);
            $this->session->set_userdata('nama', $user->nama);
            $this->session->set_userdata('role', $user->role);
        } else {
            $response = [
                'code' => 400,
                'message' => 'Login Gagal, periksa username dan password'
            ];
        }

        echo json_encode($response);
    }

    public function logout()
    {
        session_destroy();

        redirect('auth', 'refresh');
    }

    public function register()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $confpassword = $this->input->post('confpassword', true);

        $condition = ['username' => $username];

        $exist = $this->auth->is_exist($condition);

        if ($exist) {
            $response = [
                'code' => 400,
                'message' => 'Pengguna telah terdaftar'
            ];
        } else {
            $data = [
                'username' => trim($username),
                'password' => trim($password),
                'role' => 2,
                'nama' => trim($username),
            ];

            $this->db->trans_begin();
            $this->auth->insert($data);

            $response = [];
            if ($this->db->trans_status() === FALSE) {
                $response = [
                    'code' => 500,
                    'message' => 'Pengguna gagal di daftarkan',
                ];
            } else {
                $this->db->trans_commit();

                $response = [
                    'code' => 200,
                    'message' => 'Pengguna berhasil di daftarkan',
                ];
            }
        }

        echo json_encode($response);
    }
}
