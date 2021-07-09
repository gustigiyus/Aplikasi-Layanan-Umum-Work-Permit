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
        // $data['agenda'] = $this->db->get_where('tb_agenda', ['peminjam' => $this->session->userdata('email')])->result_array();
        $data['agenda'] = $this->db->get_where('tb_agenda')->result_array();

        //load view
        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('peminjaman_ruangan/agenda', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_agenda');
    }

    public function tambah_agenda()
    {
        // post data
        $judul = $this->input->post('judul');
        $jenis = $this->input->post('jenis');
        $tanggal = $this->input->post('tanggal');
        $waktu_buat = date('Y-m-d H:i:s');
        $waktu_mulai = $this->input->post('waktu_mulai');
        $waktu_akhir = $this->input->post('waktu_akhir');
        $desk = $this->input->post('isi');
        $penulis = $this->session->userdata('email');
        //kirim file gambar

        // data array
        $data = [
            'judul' => $judul,
            'jenis_kegiatan' => $jenis,
            'penulis' => $penulis,
            'waktu_buat' => $waktu_buat,
            'tanggal_agenda' => $tanggal,
            'kegiatan' => $desk,
            'waktu_mulai' => $waktu_mulai,
            'waktu_akhir' => $waktu_akhir
        ];
        // insert data
        $this->db->insert('tb_agenda', $data);
        // pesan
        $this->session->set_flashdata('pesan', '<div class="alert alert-custom alert-outline-2x alert-outline-success fade show mb-5" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">Agenda Baru Telah Berhasil Disimpan!</div>
        <div class="alert-close">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>');
        // mengarahkan
        redirect('peminjaman_ruangan/agenda');
    }
}
