<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    //Menampilkan Halaman Laporan (Karyawan)
    public function index()
    {
        $data['title'] = 'Laporan Peminjaman Ruangan';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();

        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();
        $data['detail_user'] = $this->PM->detailuser()->result_array();

        $data['data_peminjaman'] = $this->db->get_where('tb_peminjaman_ruangan', array('email' => $this->session->userdata('email'), 'status_peminjaman' => 'Close'))->result_array();

        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('umum/pengguna/peminjaman-ruangan/laporan.php', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user');
    }

    //Menampilkan Halaman Kelola Permintaan Properti (Karyawan)
    public function detail_laporan($no_peminjaman)
    {
        $data['title'] = 'Detail Data Peminjaman';

        //Data Sesuai Session Email User 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();

        //Mengambil data dari model
        $this->load->model('Profile_model', 'PM');
        $this->load->model('Permintaanlayanan_model', 'PRMLYN');

        //Data Profile dan Role User
        $data['role_user'] = $this->PM->role_user()->result_array();
        $data['detail_user'] = $this->PM->detailuser()->result_array();

        //Data Peminjaman Ruangan
        $data['data_peminjaman'] = $this->db->get_where('tb_peminjaman_ruangan', ['no_peminjaman' => $no_peminjaman])->result_array();

        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('umum/pengguna/peminjaman-ruangan/detail_laporan.php', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user');
    }


    /////////////////////////////////////////////////////  BAGIAN ATASAN  /////////////////////////////////////////////////

    //Menampilkan Halaman Laporan (Atasan)
    public function laporan_atasan()
    {
        $data['title'] = 'Laporan Peminjaman Ruangan Atasan';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();

        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();
        $data['detail_user'] = $this->PM->detailuser()->result_array();

        $cari_tanggal_permintaanawal = $this->input->post('cari_tanggal_permintaanawal');
        $cari_tanggal_permintaanakhir = $this->input->post('cari_tanggal_permintaanakhir');

        if ($cari_tanggal_permintaanawal && $cari_tanggal_permintaanakhir) {
            $this->db->where('tanggal_request >=', $cari_tanggal_permintaanawal);
            $this->db->where('tanggal_request <=', $cari_tanggal_permintaanakhir);
        }
        $this->db->select('*');
        $this->db->from('tb_peminjaman_ruangan');
        $this->db->where('status_peminjaman', 'Close');
        $data['data_peminjaman'] = $this->db->get()->result_array();

        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('umum/atasan/peminjaman-ruangan/laporan.php', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user');
    }

    //Menampilkan Halaman Kelola Permintaan Properti (Atasan)
    public function detail_laporan_atasan($no_peminjaman)
    {
        $data['title'] = 'Detail Data Peminjaman Atasan';

        //Data Sesuai Session Email User 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();

        //Mengambil data dari model
        $this->load->model('Profile_model', 'PM');
        $this->load->model('Permintaanlayanan_model', 'PRMLYN');

        //Data Profile dan Role User
        $data['role_user'] = $this->PM->role_user()->result_array();
        $data['detail_user'] = $this->PM->detailuser()->result_array();

        //Data Peminjaman Ruangan
        $data['data_peminjaman'] = $this->db->get_where('tb_peminjaman_ruangan', ['no_peminjaman' => $no_peminjaman])->result_array();

        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('umum/atasan/peminjaman-ruangan/detail_laporan.php', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user');
    }

    //Data Laporan Agenda Peminjaman Ruangan (Atasan)
    public function laporan_agenda()
    {
        $data['title'] = 'Agenda Kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();
        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();

        $this->load->model('Pinjaman_model', 'PJM_RNG');
        $data['agenda'] = $this->PJM_RNG->data_pinjam_ruangan()->result_array();

        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('umum/atasan/peminjaman-ruangan/laporan_agenda', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_agenda');
    }
}
