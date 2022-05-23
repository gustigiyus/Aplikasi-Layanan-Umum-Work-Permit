<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ADM_peminjaman_ruangan extends CI_Controller
{

    ///////////////////////////////////////////////  PERLENGKAPAN RUANGAN  ////////////////////////////////////////////

    //Halaman Perlengkapan Ruangan
    public function perlengkapan_ruangan()
    {
        $data['title'] = 'Perlengkapan Ruangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['plngkp_rng'] = $this->db->get('tb_master_perlengkapan_ruangan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/peminjaman_ruangan/perlengkapan_ruangan', $data);
        $this->load->view('templates/footer');
    }

    //Tambah Perlengkapan Ruangan
    public function add_prlngkp_rng()
    {
        $data = [
            'perlengkapan_ruangan' => $this->input->post('prlngkp_rng')
        ];

        $this->db->insert('tb_master_perlengkapan_ruangan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Perlengkapan ruangan baru berhasil ditambahkan!</div>');
        redirect('administator/adm_peminjaman_ruangan/perlengkapan_ruangan');
    }

    //Ubah Perlengkapan Ruangan
    public function ubh_prlngkp_rng($id_perlengkapan_ruangan)
    {
        $data = [
            'perlengkapan_ruangan' => $this->input->post('prlngkp_rng')
        ];

        $this->db->where('id_perlengkapan_ruangan', $id_perlengkapan_ruangan);
        $this->db->update('tb_master_perlengkapan_ruangan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Perlengkapan ruangan berhasil diubah!</div>');
        redirect('administator/adm_peminjaman_ruangan/perlengkapan_ruangan');
    }

    //Hapus Perlengkapan Ruangan
    public function hps_prlngkp_rng($id_perlengkapan_ruangan)
    {
        $this->db->where('id_perlengkapan_ruangan', $id_perlengkapan_ruangan);
        $this->db->delete('tb_master_perlengkapan_ruangan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Perlengkapan ruangan berhasil dihapus!</div>');
        redirect('administator/adm_peminjaman_ruangan/perlengkapan_ruangan');
    }

    ///////////////////////////////////////////////  LAYOUT RUANGAN  ////////////////////////////////////////////

    //Halaman Layout Ruangan
    public function layout_ruangan()
    {
        $data['title'] = 'Layout Ruangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['lyot_rng'] = $this->db->get('tb_master_layout_ruangan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/peminjaman_ruangan/layout_ruangan', $data);
        $this->load->view('templates/footer');
    }

    //Tambah Layout Ruangan
    public function add_lyt_rng()
    {
        $data = [
            'layout_ruangan' => $this->input->post('lyt_rng')
        ];

        $this->db->insert('tb_master_layout_ruangan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Layout ruangan baru berhasil ditambahkan!</div>');
        redirect('administator/adm_peminjaman_ruangan/layout_ruangan');
    }

    //Ubah Layout Ruangan
    public function ubh_lyt_rng($id_layout_ruangan)
    {
        $data = [
            'layout_ruangan' => $this->input->post('lyt_rng')
        ];

        $this->db->where('id_layout_ruangan', $id_layout_ruangan);
        $this->db->update('tb_master_layout_ruangan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Layout ruangan berhasil diubah!</div>');
        redirect('administator/adm_peminjaman_ruangan/layout_ruangan');
    }

    //Hapus Layout Ruangan
    public function hps_lyt_rng($id_layout_ruangan)
    {
        $this->db->where('id_layout_ruangan', $id_layout_ruangan);
        $this->db->delete('tb_master_layout_ruangan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Layout ruangan berhasil dihapus!</div>');
        redirect('administator/adm_peminjaman_ruangan/layout_ruangan');
    }
}
