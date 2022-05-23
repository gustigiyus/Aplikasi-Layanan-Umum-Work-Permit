<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    //Menampilkan Halaman Complain (Admin, Tenant, Karyawan)
    public function index()
    {
        $data['title'] = 'Laporan Izin Kerja Officer Umum';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $cari_tanggal_permintaanawal = $this->input->post('cari_tanggal_permintaanawal');
        $cari_tanggal_permintaanakhir = $this->input->post('cari_tanggal_permintaanakhir');

        if ($cari_tanggal_permintaanawal && $cari_tanggal_permintaanakhir) {
            $this->db->where('tanggaL_ajukan >=', $cari_tanggal_permintaanawal);
            $this->db->where('tanggal_ajukan <=', $cari_tanggal_permintaanakhir);
        }
        $this->db->select('*');
        $this->db->from('tb_complain');
        $this->db->where('status_complain', 'Selesai');
        $this->db->where('status_kerja', 'Selesai');
        $data['complain'] = $this->db->get()->result_array();

        $data['izin'] = $this->db->get('tb_izin_kerja')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('umum/admin/permintaan-workpermit/laporan', $data);
        $this->load->view('templates/footer');
    }

    public function detail_laporan($id)
    {
        $data['title'] = 'Detail Laporan Izin Kerja';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['complain'] = $this->db->get_where('tb_complain', array('id' => $id, 'status_complain' => 'Selesai', 'status_kerja' => 'Selesai'))->result_array();
        $data['izin'] = $this->db->get_where('tb_izin_kerja', array('id_complain' => $id, 'status_izin_kerja' => 'Selesai'))->result_array();
        $id_izin['id'] = $this->db->select('id')->from('tb_izin_kerja')
            ->where('id_complain', $id)
            ->where('status_izin_kerja', 'Selesai')
            ->get()
            ->result_array();
        $this->load->model('Laporan_model', 'LM');
        $data['JP'] = $this->LM->getallJP($id_izin['id'])->result_array();
        $data['jmlJP'] = $this->LM->getallJP($id_izin['id'])->num_rows();
        $data['TP'] = $this->LM->getallTP($id_izin['id']);
        $data['APD'] = $this->LM->getallAPD($id_izin['id']);
        $data['pekerja'] = $this->LM->getPekerja($id_izin['id']);
        $data['mulai'] = $this->LM->getfotomulai($id_izin['id']);
        $data['akhir'] = $this->LM->getfotoakhir($id_izin['id']);
        $data['master_JP'] = $this->db->get('tb_master_jenis_potensi')->result_array();
        $data['master_TP'] = $this->db->get('tb_master_tindak_pencegahan')->result_array();
        $data['master_APD'] = $this->db->get('tb_master_apd')->result_array();

        if ($this->session->userdata('role_id') == 3) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('umum/admin/permintaan-workpermit/detail_laporan', $data);
            $this->load->view('templates/footer');
        }
    }
}
