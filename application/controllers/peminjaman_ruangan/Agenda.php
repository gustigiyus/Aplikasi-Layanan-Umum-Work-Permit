<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{

    //funcion Agenda
    public function index()
    {
        //persiapam
        $data['title'] = 'Agenda Kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();
        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();

        $this->load->model('Pinjaman_model', 'PJM_RNG');
        $data['agenda'] = $this->PJM_RNG->data_pinjam_ruangan()->result_array();

        //load view
        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('umum/pengguna/peminjaman-ruangan/agenda', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_agenda');
    }
}
