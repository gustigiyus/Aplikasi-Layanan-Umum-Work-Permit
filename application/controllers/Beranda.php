<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();
        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();

        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('beranda/index', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user');
    }
}
