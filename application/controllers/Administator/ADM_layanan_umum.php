<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ADM_layanan_umum extends CI_Controller
{
    //Halaman Jenis Permintaan Layanan
    public function jenis_permintaan_layanan()
    {
        $data['title'] = 'Jenis Permintaan Layanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jns_prmn_lyn'] = $this->db->get('tb_master_jenis_permintaan_layanan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/layanan_umum/jenis_permintaan_layanan', $data);
        $this->load->view('templates/footer');
    }

    //Tambah Jenis Permintaan Layanan
    public function add_jns_prm_lyn()
    {
        $data = [
            'jenis_permintaan_layanan' => $this->input->post('jns_prm_lyn')
        ];

        $this->db->insert('tb_master_jenis_permintaan_layanan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jenis permintaan layanan baru berhasil ditambahkan!</div>');
        redirect('administator/adm_layanan_umum/jenis_permintaan_layanan');
    }

    //Ubah Jenis Permintaan Layanan
    public function ubh_jns_prm_lyn($id_jenis_layanan)
    {
        $data = [
            'jenis_permintaan_layanan' => $this->input->post('jns_prm_lyn')
        ];

        $this->db->where('id_jenis_layanan', $id_jenis_layanan);
        $this->db->update('tb_master_jenis_permintaan_layanan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jenis permintaan layanan berhasil diubah!</div>');
        redirect('administator/adm_layanan_umum/jenis_permintaan_layanan');
    }

    //Hapus Jenis Permintaan Layanan
    public function hps_jns_prm_lyn($id_jenis_layanan)
    {
        $this->db->where('id_jenis_layanan', $id_jenis_layanan);
        $this->db->delete('tb_master_jenis_permintaan_layanan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jenis permintaan layanan berhasil dihapus!</div>');
        redirect('administator/adm_layanan_umum/jenis_permintaan_layanan');
    }
}
