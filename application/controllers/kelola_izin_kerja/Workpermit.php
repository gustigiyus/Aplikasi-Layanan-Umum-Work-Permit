<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Workpermit extends CI_Controller
{

    //Menampilkan Halaman Complain (Admin, Tenant, Karyawan)
    public function index()
    {
        $data['title'] = 'Kelola Izin Kerja';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['complain'] = $this->db->get('tb_complain')->result_array();
        $data['izin'] = $this->db->get('tb_izin_kerja')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('umum/admin/permintaan-workpermit/index', $data);
        $this->load->view('templates/footer');
    }

    //Edit Status Complain Buat Admin
    public function editPersetujuanIzinKerja()
    {
        $id_izin = $this->input->post('id_izin');
        $id_complain = $this->input->post('id_complain');
        $sts_izin_kerja = $this->input->post('status_izin_kerja');


        if ($sts_izin_kerja == 'Izin Kerja Ditolak') {
            //Ubah Status jadi Gagal
            $this->db->set('status_izin_kerja', $sts_izin_kerja);
            $this->db->where('id', $id_izin);
            $this->db->update('tb_izin_kerja');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status berhasil diubah!</div>');
            redirect('kelola_izin_kerja/workpermit');
        } elseif ($sts_izin_kerja == 'Izin Kerja Disetujui') {
            //Ubah Status jadi Gagal
            $this->db->set('status_izin_kerja', 'Izin Kerja Ditolak');
            $this->db->where('id_complain', $id_complain);
            $this->db->update('tb_izin_kerja');

            //Kemudian Ubah Status jadi OKE
            $this->db->set('status_izin_kerja', $sts_izin_kerja);
            $this->db->where('id', $id_izin);
            $this->db->update('tb_izin_kerja');

            //Kemudian Ubah Status jadi OKE
            $this->db->set('status_kerja', $sts_izin_kerja);
            $this->db->where('id', $id_complain);
            $this->db->update('tb_complain');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status berhasil diubah!</div>');
            redirect('kelola_izin_kerja/workpermit');
        } elseif ($sts_izin_kerja == 'Selesai') {

            //Kemudian Ubah Status jadi OKE
            $this->db->set('status_izin_kerja', $sts_izin_kerja);
            $this->db->where('id', $id_izin);
            $this->db->update('tb_izin_kerja');

            //Kemudian Ubah Status jadi OKE
            $this->db->set('status_kerja', $sts_izin_kerja);
            $this->db->where('id', $id_complain);
            $this->db->update('tb_complain');

            //Kemudian Ubah Status jadi OKE
            $this->db->set('status_complain', $sts_izin_kerja);
            $this->db->where('id', $id_complain);
            $this->db->update('tb_complain');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status berhasil diubah!</div>');
            redirect('kelola_izin_kerja/workpermit');
        }
    }

    private function _sendEmailToUser($emailuser, $nama, $judul, $deskripsi, $keadaan, $tingkat_bahaya, $tanggal_ajukan, $upload_image1, $upload_image2, $upload_image3)
    {

        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'cocmarvel5@gmail.com';
        $config['smtp_pass'] = 'draxx123';
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->load->library('email', $config);
        $tanggal = date("j F Y");
        $link = base_url('landingpage/login');
        $foto1 = base_url('assets/img/complain/') . $upload_image1;
        $foto2 = base_url('assets/img/complain/') . $upload_image2;
        $foto3 = base_url('assets/img/complain/') . $upload_image3;
        $this->email->from('cocmarvel5@gmail.com', 'Admin PT INTI COMPLAIN');
        $this->email->to($emailuser);
        // Lampiran email, isi dengan url/path file
        $this->email->attach($foto1);
        $this->email->attach($foto2);
        $this->email->attach($foto3);
        $this->email->subject('Notifikasi Complain');
        $this->email->message("Complain Dibuat Oleh <strong>$nama</strong> Dengan : <br><br>
    <strong>Judul</strong>  : $judul <br>
    <strong>Deskripsi</strong> : $deskripsi <br>
    <strong>Keadaan</strong> : $keadaan <br>
    <strong>Tingkat Bahaya</strong> : $tingkat_bahaya <br>
    <strong>Tanggal Diajukan</strong> : $tanggal_ajukan <br><br>
    <strong>Status Complain: Selesai </strong><br><br>
    Dikirim Pada Tanggal : $tanggal <br>
    Klik <strong><a href='$link' target='_blank' rel='noopener'>disini</a></strong> untuk Login ke aplikasi dan mendowload PDF.");

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    private function _sendEmailToTenant($emailt, $nama, $nm_kontrak, $nm_jawab, $no_tlp, $dsk_pekrj, $wk_awal, $wk_akhir, $tg_akhir, $sebelum_kerja, $sesudah_kerja)
    {

        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'cocmarvel5@gmail.com';
        $config['smtp_pass'] = 'draxx123';
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->load->library('email', $config);
        $this->email->clear(TRUE);
        $tanggal = date("j F Y");
        $link = base_url('landingpage/login');
        $this->email->from('cocmarvel5@gmail.com', 'Admin PT INTI WORKPERMIT');
        $this->email->to($emailt);
        // Lampiran email, isi dengan url/path file
        $jumlah = count($sebelum_kerja);
        for ($i = 0; $i < $jumlah; $i++) {
            $foto = base_url('assets/img/pekerjaan/awal/') . $sebelum_kerja[$i];
            $this->email->attach($foto);
        }
        $jumlah1 = count($sesudah_kerja);
        for ($i = 0; $i < $jumlah1; $i++) {
            $foto1 = base_url('assets/img/pekerjaan/akhir/') . $sesudah_kerja[$i];
            $this->email->attach($foto1);
        }
        $this->email->subject('Notifikasi Workpermit');
        $this->email->message("Complain Dibuat Oleh <strong>$nama</strong> yang dikerjakan oleh <strong>$nm_kontrak</strong> Dengan : <br><br>
    <strong>Penanggung Jawab</strong>  : $nm_jawab <br>
    <strong>Nomor Telepon</strong> : $no_tlp <br>
    <strong>Deskripsi Pekerjaan</strong> : $dsk_pekrj <br>
    <strong>Yang dikerjakan pada :</strong><br>
    <strong>Tanggal :</strong> $tg_akhir <br>
    <strong>Waktu Mulai Bekerja</strong> : $wk_awal <br>
    <strong>Waktu Akhir Bekerja</strong> : $wk_akhir <br>
    <br>
    Dikirim Pada Tanggal : $tanggal <br>
    Klik <strong><a href='$link' target='_blank' rel='noopener'>disini</a></strong> untuk Login ke aplikasi dan mendowload Laporan Izin Kerja.");


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
