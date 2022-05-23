<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Properti extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    //Menampilkan Halaman Permintaan Properti (Karyawan)
    public function index()
    {
        $data['title'] = 'Permintaan Layanan';
        if ($this->session->userdata('role_id') == 3) {

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['layananbaru'] = $this->db->get('tb_permintaan_layanan')->result_array();
            $data['izin'] = $this->db->get('tb_izin_kerja')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('umum/admin/layanan-baru', $data);
            $this->load->view('templates/footer');
        } else {
            $data['title'] = 'Permintaan Layanan Karyawan';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();

            $data['layananbaru'] = $this->db->get_where('tb_permintaan_layanan', ['email' => $this->session->userdata('email')])->result_array();
            $data['jenis_layanan'] = $this->db->get('tb_master_jenis_permintaan_layanan')->result_array();

            $this->load->model('Profile_model', 'PM');
            $data['role_user'] = $this->PM->role_user()->result_array();
            $data['detail_user'] = $this->PM->detailuser()->result_array();

            if ($this->session->userdata('role_id') == 4) {
                $this->load->view('templates/user_template/header_user', $data);
                $this->load->view('templates/user_template/navbar_user', $data);
                $this->load->view('umum/pengguna/permintaan-layanan/layanan-baru.php', $data);
                $this->load->view('templates/user_template/sidebar_modal_user', $data);
                $this->load->view('templates/user_template/footer_user');
            } elseif ($this->session->userdata('role_id') == 2) {
                $this->load->view('templates/user_template/header_user', $data);
                $this->load->view('templates/user_template/navbar_user', $data);
                $this->load->view('umum/pengguna/permintaan-layanan/layanan-baru.php', $data);
                $this->load->view('templates/user_template/sidebar_modal_user', $data);
                $this->load->view('templates/user_template/footer_user');
            }
        }
    }

    //Menampilkan Halaman Detail Permintaan Layanan (Karyawan)
    public function detail_permintaan($no_permintaan)
    {
        $data['title'] = 'Detail Permintaan Layanan Karyawan';

        $data['no_permintaan_ttd_penerima_layanan'] = $no_permintaan;

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
        $this->load->view('umum/pengguna/permintaan-layanan/detail_permintaan.php', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user');
    }

    //Tambah Permintaan Properti (Karyawan)
    public function addpermintaanbaru()
    {
        $idlayanan = $this->input->post('id_nomer_layanan');
        $mail = $this->input->post('email');
        $nm = $this->input->post('nama');
        $permintaan = $this->input->post('permintaan');
        $jdl_pmt = $this->input->post('judul_permintaan');
        $jns_lyn = $this->input->post('jenis_permintaan_layanan');
        $dsk = $this->input->post('deskripsi');
        $sts_permintaan = $this->input->post('status_permintaan');
        $tanggal_ajukan = $this->input->post('tanggal_ajukan');
        $nama_atasan = $this->input->post('nm_atasan');
        $email_atasan = $this->input->post('em_atasan');
        $nomor_atasan = $this->input->post('no_atasan');

        $data = [
            'no_permintaan' => $idlayanan,
            'email' => $mail,
            'nama' => $nm,
            'permintaan' => $permintaan,
            'judul_permintaan' => $jdl_pmt,
            'jenis_permintaan_layanan' => $jns_lyn,
            'deskripsi' => $dsk,
            'status_permintaan' => $sts_permintaan,
            'tanggal_ajukan' => $tanggal_ajukan,
            'nama_atasan' => $nama_atasan,
            'email_atasan' => $email_atasan,
            'nomor_atasan' => $nomor_atasan
        ];

        $data1 = [
            'no_permintaan_hlpdsk' => $idlayanan,
        ];
        $data2 = [
            'no_permintaan_eskls' => $idlayanan,
        ];
        $data3 = [
            'no_permintaan_prsk' => $idlayanan,
        ];
        $data4 = [
            'no_permintaan_pnyrh' => $idlayanan,
        ];

        $this->db->insert('tb_permintaan_layanan', $data);
        $this->db->insert('tb_plyn_adm_penerimaan_helpdesk', $data1);
        $this->db->insert('tb_plyn_adm_eskalasi', $data2);
        $this->db->insert('tb_plyn_adm_pemeriksaan', $data3);
        $this->db->insert('tb_plyn_adm_penyerahaan', $data4);

        $this->session->set_flashdata('message', $this->input->post('edit_nama_peminjaman') . ' Data Permintaan Layanan Anda Berhasil Diajukan');
        redirect('permintaan_layanan/properti');
    }

    //Edit Permintaan Layanan Properti (Karyawan)
    public function editpermintaan($no_permintaan)
    {
        $data['title'] = 'Edit Permintaan Layanan Karaywan';
        $data['no_permintaan'] = $no_permintaan;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();

        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();
        $data['detail_user'] = $this->PM->detailuser()->result_array();

        $data['layananbaru'] = $this->db->get_where('tb_permintaan_layanan', ['no_permintaan' => $no_permintaan])->result_array();
        $data['jenis_layanan'] = $this->db->get('tb_master_jenis_permintaan_layanan')->result_array();

        $this->form_validation->set_rules('edit_permintaan', 'ID Permintaan', 'required|trim');

        if ($this->form_validation->run() == false) {
            //load view
            $this->load->view('templates/user_template/header_user', $data);
            $this->load->view('templates/user_template/navbar_user', $data);
            $this->load->view('umum/pengguna/permintaan-layanan/edit_permintaan', $data);
            $this->load->view('templates/user_template/sidebar_modal_user', $data);
            $this->load->view('templates/user_template/footer_user');
        } else {
            //Validasi Success
            $permintaan = $this->input->post('edit_permintaan');
            $jdl_pmt = $this->input->post('edit_judul_permintaan');
            $jns_lyn = $this->input->post('edit_jenis_permintaan_layanan');
            $dsk = $this->input->post('edit_deskripsi');
            $tanggal_ajukan = $this->input->post('tanggal_ajukan');

            $data = [
                'permintaan' => $permintaan,
                'judul_permintaan' => $jdl_pmt,
                'jenis_permintaan_layanan' => $jns_lyn,
                'deskripsi' => $dsk,
                'tanggal_ajukan' => $tanggal_ajukan,
            ];

            $this->db->where('no_permintaan', $no_permintaan);
            $this->db->update('tb_permintaan_layanan', $data);

            $this->session->set_flashdata('message', $this->input->post('edit_nama_peminjaman') . ' Data Permintaan Layanan Anda Berhasil Diubah');
            redirect('permintaan_layanan/properti');
        }
    }

    //ADD TTD PENERIMA LAYANAN (Karyawan)
    public function upload_ttd_penerima_layanan($no_permintaan_ttd)
    {
        $config['upload_path']   = FCPATH . './assets/img/permintaan_layanan/ttd_penyerahaan';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('ttd_penerima_layanan')) {
            $token_penerima_layanan = $this->input->post('token_TTD_penerima_layanan');
            $TTD_penerima_layanan = $this->upload->data('file_name');
            $this->db->where('no_permintaan_pnyrh', $no_permintaan_ttd);
            $this->db->update('tb_plyn_adm_penyerahaan', array('ttd_penerima_layanan' => $TTD_penerima_layanan, 'token_penerima_layanan' => $token_penerima_layanan));
            $this->db->where('no_permintaan', $no_permintaan_ttd);
            $this->db->update('tb_permintaan_layanan', array('status_permintaan' => 'Sedang Diproses'));
        }
    }

    //DELETE TTD PENERIMA LAYANAN (Karyawan)
    public function remove_foto_TTD_penerima_layanan()
    {
        //Ambil token foto
        $token_penerima_layanan = $this->input->post('token_penerima_layanan');
        $foto = $this->db->get_where('tb_plyn_adm_penyerahaan', array('token_penerima_layanan' => $token_penerima_layanan));

        if ($foto->num_rows() > 0) {
            $hasil = $foto->row();
            $nama_foto = $hasil->ttd_penerima_layanan;
            if (file_exists($file = FCPATH . './assets/img/permintaan_layanan/ttd_penyerahaan/' . $nama_foto)) {
                unlink($file);
            }
            $this->db->where('token_penerima_layanan', $token_penerima_layanan);
            $this->db->update('tb_plyn_adm_penyerahaan', array('ttd_penerima_layanan' => '', 'token_penerima_layanan' => ''));
        }

        echo "{}";
    }


    //////////////////////////////////////  BAGIAN HALAMAN ATASAN ///////////////////////////////////

    //Menampilkan Semua data Permintaan Properti sesuai dengan email (Atasan)
    public function permintaan_baru()
    {
        $data['title'] = 'Data Permintaan Baru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();
        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();
        $data['detail_user'] = $this->PM->detailuser()->result_array();

        $data['layananbaru'] = $this->db->get_where('tb_permintaan_layanan', array('email_atasan' => $this->session->userdata('email'), 'permintaan' => 'Permintaan Baru'))->result_array();

        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('umum/atasan/permintaan-layanan/index.php', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user');
    }

    public function penanganan_gangguan()
    {
        $data['title'] = 'Data Penanganan Gangguan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();
        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();
        $data['detail_user'] = $this->PM->detailuser()->result_array();

        $data['layananbaru'] = $this->db->get_where('tb_permintaan_layanan', array('email_atasan' => $this->session->userdata('email'), 'permintaan' => 'Penanganan Gangguan'))->result_array();

        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('umum/atasan/permintaan-layanan/index.php', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user');
    }

    public function proses_hapus_permintaan($permintaan, $no_permintaan)
    {

        $data_jenis_permintaan = urldecode($permintaan);

        $this->db->where('no_permintaan', $no_permintaan);
        $this->db->delete('tb_permintaan_layanan');

        $this->db->where('no_permintaan_dstrb', $no_permintaan);
        $this->db->delete('tb_plyn_adm_distribusi_pekerja');

        $this->db->where('no_permintaan_eskls', $no_permintaan);
        $this->db->delete('tb_plyn_adm_eskalasi');

        $this->db->where('no_permintaan_prsk', $no_permintaan);
        $this->db->delete('tb_plyn_adm_pemeriksaan');

        $this->db->where('no_permintaan_hlpdsk', $no_permintaan);
        $this->db->delete('tb_plyn_adm_penerimaan_helpdesk');

        $this->db->where('no_permintaan_pnyrh', $no_permintaan);
        $this->db->delete('tb_plyn_adm_penyerahaan');

        if ($data_jenis_permintaan == 'Penanganan Gangguan') {
            $this->session->set_flashdata('message', 'Data Berhasil Dihapus!');
            redirect('permintaan_layanan/properti/penanganan_gangguan');
        } elseif ($data_jenis_permintaan == 'Permintaan Baru') {
            $this->session->set_flashdata('message', 'Data Berhasil Dihapus!');
            redirect('permintaan_layanan/properti/permintaan_baru');
        }
    }

    //Menampilkan Halaman Kelola Permintaan Properti (Atasan)
    public function kelola_permintaan($no_permintaan)
    {
        $data['title'] = 'Kelola Permintaan';
        $data['no_permintaan'] = $no_permintaan;

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
        $this->load->view('umum/atasan/permintaan-layanan/kelola_permintaan.php', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user');
    }

    //Menampilkan Halaman Kelola Permintaan Properti (Atasan)
    public function kelola_permintaan_close($no_permintaan, $email_pengaju)
    {
        $data['title'] = 'Kelola Permintaan Close Proses';
        $data['no_permintaan'] = $no_permintaan;
        $data['email_pengaju'] = $email_pengaju;

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
        $this->load->view('umum/atasan/permintaan-layanan/kelola_permintaan_close.php', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user', $data);
    }

    //Proses Kelola Status Permintaan Close Properti (Atasan)
    public function proses_kelola_permintaan_close()
    {
        if (isset($_POST["no_permintaan"])) {

            $no_permintaan = $this->input->post('no_permintaan');
            $status_permintaan = $this->input->post('status_permintaan');

            $data = [
                'status_permintaan' => $status_permintaan,
            ];

            $this->db->where('no_permintaan', $no_permintaan);
            $this->db->update('tb_permintaan_layanan', $data);
        }
    }

    //Proses Cencel Status Permintaan Properti (Atasan)
    public function proses_kelola_permintaan_cencel_request($no_permintaan, $permintaan)
    {
        $data_jenis_permintaan = urldecode($permintaan);

        $data = [
            'status_permintaan' => 'Cencel Request',
        ];

        $this->db->where('no_permintaan', $no_permintaan);
        $this->db->update('tb_permintaan_layanan', $data);

        if ($data_jenis_permintaan == 'Penanganan Gangguan') {
            redirect('permintaan_layanan/properti/penanganan_gangguan');
        } elseif ($data_jenis_permintaan == 'Permintaan Baru') {
            redirect('permintaan_layanan/properti/permintaan_baru');
        }
    }

    //Kelola Penerimaan Helpdesk
    public function kelola_penerimaan_helpdesk()
    {
        $no_permintaan_helpdesk = $this->input->post('no_lyn_adm_helpdesk');
        $nama_penerima = $this->input->post('nama_penerima');
        $email_penerima = $this->input->post('email_penerima');
        $diterima_oleh = $this->input->post('diterima_oleh');
        $jenis_layanan = $this->input->post('jenis_layanan');
        $ext_hp = $this->input->post('ext_hp');
        $tanggal_penerimaan = $this->input->post('tgl_terima_helpdesk');

        $data = [
            'no_permintaan_hlpdsk' => $no_permintaan_helpdesk,
            'nama_penerima' => $nama_penerima,
            'email_penerima' => $email_penerima,
            'diterima_oleh' => $diterima_oleh,
            'jenis_layanan' => $jenis_layanan,
            'ext_hp' => $ext_hp,
            'tgl_terima_helpdesk' => $tanggal_penerimaan
        ];

        $this->db->replace('tb_plyn_adm_penerimaan_helpdesk', $data);

        $this->session->set_flashdata('message', $this->input->post('edit_nama_peminjaman') . ' Penerimaan Helpdesk berhasil dilakukan');
        redirect('permintaan_layanan/properti/kelola_permintaan/' . $no_permintaan_helpdesk . '#flashdatascroll');
    }

    //Kelola Penerimaan Eskalasi
    public function kelola_eskalasi()
    {
        $no_permintaan_eskls = $this->input->post('no_lyn_adm_eskalasi');
        $email_eskalasi = $this->input->post('email_eskalasi');
        $eskalasi_Ke = $this->input->post('eskalasi_ke');
        $alasan_eskalasi = $this->input->post('alasan_eskalasi');
        $tgl_assignment_eskalasi = $this->input->post('tgl_assigment_eskalasi');

        $data = [
            'no_permintaan_eskls' => $no_permintaan_eskls,
            'email_eskalasi' => $email_eskalasi,
            'eskalasi_Ke' => $eskalasi_Ke,
            'alasan_eskalasi' => $alasan_eskalasi,
            'tgl_assignment_eskalasi' => $tgl_assignment_eskalasi
        ];

        $this->db->replace('tb_plyn_adm_eskalasi', $data);

        $this->session->set_flashdata('message', $this->input->post('edit_nama_peminjaman') . ' Eskalasi berhasil dilakukan');
        redirect('permintaan_layanan/properti/kelola_permintaan/' . $no_permintaan_eskls . '#flashdatascroll');
    }

    //Kelola Penerimaan Helpdesk
    public function kelola_distribusi_pekerja()
    {
        if (isset($_POST["no_permintaan"])) {

            $no_permintaan = $this->input->post('no_permintaan');
            $nama_pekerja = $this->input->post('nama_pekerja');
            $jenis_pekerjaan = $this->input->post('jenis_pekerjaan');
            $lokasi_pekerjaan = $this->input->post('lokasi_pekerjaan');

            $jmldata = count($_POST["no_permintaan"]);

            for ($i = 0; $i < $jmldata; $i++) {

                $data = array(
                    'no_permintaan_dstrb'  => $no_permintaan[$i],
                    'nama_pekerja'  => $nama_pekerja[$i],
                    'jenis_pekerjaan'  => $jenis_pekerjaan[$i],
                    'lokasi_pekerjaan'  => $lokasi_pekerjaan[$i]
                );

                $this->db->insert('tb_plyn_adm_distribusi_pekerja', $data);
            }
        }
    }

    public function getdatatable($no_permintaan)
    {
        $this->load->model('Permintaanlayanan_model', 'PRMLYN');
        //Data Distribusi Pekerja
        $data_distribusi_pekerja = $this->PRMLYN->getdistribusi_pekerja($no_permintaan);

        $i = 1;
        foreach ($data_distribusi_pekerja as $dst_pkrj) {
            echo "<tr>";
            echo "<td class='align-middle' style='text-align: center;'>" . $i . "</td>";
            echo "<td class='align-middle' style='text-align: center;'>" . $dst_pkrj['nama_pekerja'] . "</td>";
            echo "<td class='align-middle' style='text-align: center;'>" . $dst_pkrj['jenis_pekerjaan'] . "</td>";
            echo "<td class='align-middle' style='text-align: center;'>" . $dst_pkrj['lokasi_pekerjaan'] . "</td>";
            echo "<td class='align-middle' style='text-align: center;'>";
            echo "<a href='" . base_url('permintaan_layanan/properti/proses_delete_dstpekerja/') . $dst_pkrj['id'] . '/' . $dst_pkrj['no_permintaan_dstrb'] . "' class='btn btn-danger btn-sm btn-icon hapus-distribusiPekejra'>";
            echo "<i class='fa fa-trash'></i>";
            echo "</a>";
            echo "</td>";
            echo "</tr>";
            $i++;
        }
    }

    public function proses_delete_dstpekerja($id, $no_permintaan)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_plyn_adm_distribusi_pekerja');
        $this->session->set_flashdata('message', 'Pekerja Berhasil Dihapus!');
        redirect('permintaan_layanan/properti/kelola_permintaan/' . $no_permintaan . '#flashdatascroll');
    }

    //Kelola Penerimaan Pemiksaan dan Penyerahaan Kembali
    public function kelola_pemeriksaan_penyerahaan()
    {
        $no_permintaan = $this->input->post('no_permintaan');
        $nama_pengaju = $this->input->post('nama_pengaju');

        $hasil_pemeriksaan = $this->input->post('hasil_pemeriksaan');
        $usulan_solusi = $this->input->post('usulan_solusi');
        $tgl_pemeriksaan = $this->input->post('tanggal_pemeriksaaan');

        $catatan_pemeliharaan = $this->input->post('catatan_pemeliharaan');
        $total_biaya = $this->input->post('total_biaya');
        $tgl_kembali = $this->input->post('tanggal_kembali');

        $tanggal_persetujuan = $this->input->post('tanggal_persetujuan');
        $data_satatus = 'Menunggu TTD';

        $data1 = [
            'hasil_pemeriksaan' => $hasil_pemeriksaan,
            'usulan_solusi' => $usulan_solusi,
            'tgl_pemeriksaan' => $tgl_pemeriksaan,
        ];

        $data2 = [
            'catatan_pemeliharaan' => $catatan_pemeliharaan,
            'total_biaya' => $total_biaya,
            'tgl_kembali' => $tgl_kembali
        ];

        $data3 = [
            'tanggal_persetujuan' => $tanggal_persetujuan,
            'status_permintaan' => $data_satatus
        ];



        $this->db->where('no_permintaan_prsk', $no_permintaan);
        $this->db->update('tb_plyn_adm_pemeriksaan', $data1);

        $this->db->where('no_permintaan_pnyrh', $no_permintaan);
        $this->db->update('tb_plyn_adm_penyerahaan', $data2);

        $this->db->where('no_permintaan', $no_permintaan);
        $this->db->update('tb_permintaan_layanan', $data3);

        $this->session->set_flashdata('message', 'Permintaan berhasil disimpan');
        redirect('permintaan_layanan/properti/kelola_permintaan/' . $no_permintaan . '#flashdatascroll');
    }


    //ADD TTD PEMERIKSAAN
    public function upload_ttd_pemeriksaan($no_permintaan_ttd_pemeriksaan)
    {
        $config['upload_path']   = FCPATH . './assets/img/permintaan_layanan/ttd_pemeriksaan';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('ttd_pemeriksaan')) {
            $token_pemeriksaan = $this->input->post('token_TTD_Pemeriksaan');
            $nama_TTD_pemeriksaan = $this->upload->data('file_name');
            $this->db->where('no_permintaan_prsk', $no_permintaan_ttd_pemeriksaan);
            $this->db->update('tb_plyn_adm_pemeriksaan', array('ttd_pemeriksaan' => $nama_TTD_pemeriksaan, 'token_pemeriksaan' => $token_pemeriksaan));
            $this->db->where('no_permintaan', $no_permintaan_ttd_pemeriksaan);
            $this->db->update('tb_permintaan_layanan', array('status_permintaan' => 'Menunggu TTD'));
        }
    }

    //Untuk menghapus foto pemeriksaan
    public function remove_foto_TTD_pemeriksaan()
    {
        //Ambil token foto
        $token = $this->input->post('token');
        $foto = $this->db->get_where('tb_plyn_adm_pemeriksaan', array('token_pemeriksaan' => $token));

        if ($foto->num_rows() > 0) {
            $hasil = $foto->row();
            $nama_foto = $hasil->ttd_pemeriksaan;
            if (file_exists($file = FCPATH . './assets/img/permintaan_layanan/ttd_pemeriksaan/' . $nama_foto)) {
                unlink($file);
            }
            $this->db->where('token_pemeriksaan', $token);
            $this->db->update('tb_plyn_adm_pemeriksaan', array('ttd_pemeriksaan' => '', 'token_pemeriksaan' => ''));
        }

        echo "{}";
    }
}
