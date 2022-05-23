<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    //Menampilkan Halaman Laporan (Karyawan)
    public function karyawan()
    {
        $data['title'] = 'Laporan Permintaan Layanan Karyawan';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();

        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();
        $data['detail_user'] = $this->PM->detailuser()->result_array();

        $cari_tanggal_permintaanawal = $this->input->post('cari_tanggal_permintaanawal');
        $cari_tanggal_permintaanakhir = $this->input->post('cari_tanggal_permintaanakhir');

        if ($cari_tanggal_permintaanawal && $cari_tanggal_permintaanakhir) {
            $this->db->where('tanggaL_ajukan >=', $cari_tanggal_permintaanawal);
            $this->db->where('tanggal_ajukan <=', $cari_tanggal_permintaanakhir);
        }
        $this->db->select('*');
        $this->db->from('tb_permintaan_layanan');
        $this->db->where('email', $this->session->userdata('email'));
        $this->db->where('status_permintaan', 'Close');
        $data['layananbaru'] = $this->db->get()->result_array();

        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('umum/pengguna/permintaan-layanan/laporan.php', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user');
    }

    //Menampilkan Halaman Kelola Permintaan Properti (Karyawan)
    public function detail_laporan_pengguna($no_permintaan)
    {
        $data['title'] = 'Detail Laporan Permintaan Layanan Karyawan';

        //Data Sesuai Session Email User 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();

        //Mengambil data dari model
        $this->load->model('Profile_model', 'PM');
        $this->load->model('Permintaanlayanan_model', 'PRMLYN');

        //Data Profile dan Role User
        $data['role_user'] = $this->PM->role_user()->result_array();
        $data['detail_user'] = $this->PM->detailuser()->result_array();

        //Data Penerimaan Helpdesk
        $data['data_helpdesk'] = $this->PRMLYN->getpenerimaanhelpdesk($no_permintaan);

        //Data Eskalasi
        $data['data_eskalasi'] = $this->PRMLYN->geteskalasi($no_permintaan);

        //Data Distribusi Pekerja
        $data['data_distribusi_pekerja'] = $this->PRMLYN->getdistribusi_pekerja($no_permintaan);

        //Data Penyerahaan dan Pemeriksaan
        $data['data_pemeriksaan_penyerahaan'] = $this->PRMLYN->getpemeriksaan_penyerahaan($no_permintaan);

        //Data Permintaan Layanan
        $data['data_permintaan'] = $this->db->get_where('tb_permintaan_layanan', ['no_permintaan' => $no_permintaan])->result_array();

        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('umum/pengguna/permintaan-layanan/detail_laporan.php', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user');
    }


    /////////////////////////////////////////////////////////  BAGIAN ATASAN  ///////////////////////////////////////////

    //Menampilkan Halaman Laporan (Atasan)
    public function atasan()
    {
        $data['title'] = 'Laporan Permintaan Layanan Atasan';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();

        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();
        $data['detail_user'] = $this->PM->detailuser()->result_array();

        $cari_tanggal_permintaanawal = $this->input->post('cari_tanggal_permintaanawal');
        $cari_tanggal_permintaanakhir = $this->input->post('cari_tanggal_permintaanakhir');

        if ($cari_tanggal_permintaanawal && $cari_tanggal_permintaanakhir) {
            $this->db->where('tanggaL_ajukan >=', $cari_tanggal_permintaanawal);
            $this->db->where('tanggal_ajukan <=', $cari_tanggal_permintaanakhir);
        }
        $this->db->select('*');
        $this->db->from('tb_permintaan_layanan');
        $this->db->where('email_atasan', $this->session->userdata('email'));
        $this->db->where('status_permintaan', 'Close');
        $data['layananbaru'] = $this->db->get()->result_array();


        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('umum/atasan/permintaan-layanan//laporan.php', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user');
    }

    //Menampilkan Halaman Kelola Permintaan Properti (Atasan)
    public function detail_laporan($no_permintaan, $email_pengaju)
    {
        $data['title'] = 'Laporan Detail Permintaan Layanan Atasan';

        //Data Sesuai Session Email User 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();

        //Mengambil data dari model
        $this->load->model('Profile_model', 'PM');
        $this->load->model('Permintaanlayanan_model', 'PRMLYN');

        //Data Profile dan Role User
        $data['role_user'] = $this->PM->role_user()->result_array();
        $data['detail_user'] = $this->PM->detailuser()->result_array();

        //Data Permintaan User
        $data['data_user'] = $this->db->get_where('detail_user', ['email' => $email_pengaju])->result_array();

        //Data Penerimaan Helpdesk
        $data['data_helpdesk'] = $this->PRMLYN->getpenerimaanhelpdesk($no_permintaan);

        //Data Eskalasi
        $data['data_eskalasi'] = $this->PRMLYN->geteskalasi($no_permintaan);

        //Data Distribusi Pekerja
        $data['data_distribusi_pekerja'] = $this->PRMLYN->getdistribusi_pekerja($no_permintaan);

        //Data Penyerahaan dan Pemeriksaan
        $data['data_pemeriksaan_penyerahaan'] = $this->PRMLYN->getpemeriksaan_penyerahaan($no_permintaan);

        //Data Permintaan Layanan
        $data['data_permintaan'] = $this->db->get_where('tb_permintaan_layanan', ['no_permintaan' => $no_permintaan])->result_array();

        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('umum/atasan/permintaan-layanan//detail_laporan.php', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user');
    }


    //Menampilkan Halaman Laporan Chart (Atasan)
    public function chart_atasan()
    {
        $data['title'] = 'Laporan Charts';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();

        $data['layanan_mekanikal_elektrikal'] = $this->db->get_where('tb_permintaan_layanan', array('status_permintaan' => 'Close', 'jenis_permintaan_layanan' => 'Layanan Mekanikal Elektrikal'))->num_rows();

        $data['layanan_kebersihan'] = $this->db->get_where('tb_permintaan_layanan', array('status_permintaan' => 'Close', 'jenis_permintaan_layanan' => 'Layanan Kebersihan'))->num_rows();

        $data['layanan_bangunan_gedung'] = $this->db->get_where('tb_permintaan_layanan', array('status_permintaan' => 'Close', 'jenis_permintaan_layanan' => 'Layanan Bangunan Gedung'))->num_rows();

        $data['layanan_status_close'] = $this->db->get_where('tb_permintaan_layanan', array('status_permintaan' => 'Close'))->num_rows();

        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();
        $data['detail_user'] = $this->PM->detailuser()->result_array();

        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('umum/atasan/permintaan-layanan/laporan_chart.php', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user');
    }
}
