<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan extends CI_Controller
{

    //Menampilkan Halaman Complain (Admin, Tenant, Karyawan)
    public function index()
    {
        $data['title'] = 'Data Complain';
        if ($this->session->userdata('role_id') == 3) {

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['complain'] = $this->db->get('tb_complain')->result_array();
            $data['izin'] = $this->db->get('tb_izin_kerja')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('umum/admin/permintaan-complain/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();
            $data['complain'] = $this->db->get_where('tb_complain', ['email' => $this->session->userdata('email')])->result_array();
            $data['izin'] = $this->db->get('tb_izin_kerja')->result_array();
            $this->load->model('Profile_model', 'PM');
            $data['role_user'] = $this->PM->role_user()->result_array();

            if ($this->session->userdata('role_id') == 4) {
                $this->load->view('templates/user_template/header_user', $data);
                $this->load->view('templates/user_template/navbar_user', $data);
                $this->load->view('umum/pengguna/index.php', $data);
                $this->load->view('templates/user_template/sidebar_modal_user', $data);
                $this->load->view('templates/user_template/footer_user');
            } elseif ($this->session->userdata('role_id') == 2) {
                $this->load->view('templates/user_template/header_user', $data);
                $this->load->view('templates/user_template/navbar_user', $data);
                $this->load->view('umum/pengguna/index.php', $data);
                $this->load->view('templates/user_template/sidebar_modal_user', $data);
                $this->load->view('templates/user_template/footer_user');
            } else {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('umum/admin/index', $data);
                $this->load->view('templates/footer');
            }
        }
    }

    //Tambah Complain
    public function addComplain()
    {
        $mail = $this->input->post('email');
        $nm = $this->input->post('nama');
        $jdl_cmp = $this->input->post('judul_complain');
        $dsk = $this->input->post('deskripsi');
        $lks_pkj = $this->input->post('lokasi_pekerjaan');
        $kdn = $this->input->post('keadaan');
        $tngk_bhy = $this->input->post('tingkat_bahaya');
        $tgl_ajk = $this->input->post('tanggal_ajukan');
        $upload_image = $_FILES['gambar'];
        $upload_image2 = $_FILES['gambar2'];
        $upload_image3 = $_FILES['gambar3'];
        //gambar 1
        if ($upload_image = '') {
            echo $this->upload->display_errors();
        } else {
            $filename = $_FILES['gambar']['name'];
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $config['file_name'] = rand() . "." . $extension;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '1024';
            $config['upload_path'] = './assets/img/complain';
            $config['image_width'] = 800;
            $config['image_height'] = 600;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo $this->upload->display_errors();
                die;
            } else {
                $upload_image = $this->upload->data('file_name');
                //$uploadedImage = $this->upload->data();
                $this->resizeImage($upload_image);
            }
        }
        //gambar2
        if ($upload_image2 = '') {
            echo $this->upload->display_errors();
        } else {
            $filename = $_FILES['gambar2']['name'];
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $config['file_name'] = rand() . "." . $extension;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '1024';
            $config['upload_path'] = './assets/img/complain';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar2')) {
                echo $this->upload->display_errors();
                die;
            } else {
                $upload_image2 = $this->upload->data('file_name');
                //  $uploadedImage = $this->upload->data();
                $this->resizeImage($upload_image2);
            }
        }
        //gambar3
        if ($upload_image3 = '') {
            echo $this->upload->display_errors();
        } else {
            $filename = $_FILES['gambar3']['name'];
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $config['file_name'] = rand() . "." . $extension;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '1024';
            $config['upload_path'] = './assets/img/complain';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar3')) {
                echo $this->upload->display_errors();
                die;
            } else {
                $upload_image3 = $this->upload->data('file_name');
                //$uploadedImage = $this->upload->data();
                $this->resizeImage($upload_image3);
            }
        }

        $data = [
            'email' => $mail,
            'nama' => $nm,
            'judul_complain' => $jdl_cmp,
            'deskripsi' => $dsk,
            'lokasi_pekerjaan' => $lks_pkj,
            'keadaan' => $kdn,
            'tingkat_bahaya' => $tngk_bhy,
            'tanggal_ajukan' => $tgl_ajk,
            'gambar' => $upload_image,
            'gambar2' => $upload_image2,
            'gambar3' => $upload_image3
        ];

        $this->db->insert('tb_complain', $data);

        $this->_sendEmail($nm, $jdl_cmp, $dsk, $kdn, $tngk_bhy, $tgl_ajk, $upload_image, $upload_image2, $upload_image3);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <div class="container">
          <div class="alert-icon">
            <i class="now-ui-icons ui-2_like"></i>
          </div>
          <strong>' . $this->input->post('nama')  . '</strong> Complain Anda Berhasil Diajukan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
      </div>');
        redirect('permintaan');
    }

    public function resizeImage($filename)
    {
        $source_path = './assets/img/complain/' . $filename;
        $target_path = './assets/img/complain';
        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'width' => 800

        );

        $this->load->library('image_lib', $config_manip);
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
        $this->image_lib->clear();
    }

    private function _sendEmail($nama, $judul, $deskripsi, $keadaan, $tingkat_bahaya, $tanggal_ajukan, $upload_image1, $upload_image2, $upload_image3)
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
        $this->email->to('gustiggt123@gmail.com');
        // Lampiran email, isi dengan url/path file
        $this->email->attach($foto1);
        $this->email->attach($foto2);
        $this->email->attach($foto3);
        $this->email->subject('Notifikasi Complain Baru');
        $this->email->message("Complain Baru Telah Dibuat Oleh <strong>$nama</strong> Dengan : <br><br>
        <strong>Judul</strong>  : $judul <br>
        <strong>Deskripsi</strong> : $deskripsi <br>
        <strong>Keadaan</strong> : $keadaan <br>
        <strong>Tingkat Bahaya</strong> : $tingkat_bahaya <br>
        <strong>Tanggal Diajukan</strong> : $tanggal_ajukan <br><br>
        Dikirim Pada Tanggal : $tanggal <br>
        Klik <strong><a href='$link' target='_blank' rel='noopener'>disini</a></strong> untuk Login ke aplikasi.");


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    //Edit Complain
    public function editComplain($edt_id)
    {
        $id = $edt_id;
        $mail = $this->input->post('email');
        $nm = $this->input->post('nama');
        $jdl_cmp = $this->input->post('judul_complain');
        $dsk = $this->input->post('deskripsi');
        $lks_pkj = $this->input->post('ed_lokasi_pekerjaan');
        $kdn = $this->input->post('keadaan');
        $tngk_bhy = $this->input->post('tingkat_bahaya');
        $tgl_ajk = $this->input->post('tanggal_ajukan');

        $upload_image1 = $_FILES['new_image0'];
        $upload_image2 = $_FILES['new_image1'];
        $upload_image3 = $_FILES['new_image2'];
        $old_image1 = $this->input->post('old_image1');
        $old_image2 = $this->input->post('old_image2');
        $old_image3 = $this->input->post('old_image3');
        $gambar = [$upload_image1, $upload_image2, $upload_image3];
        $gambarlama = [$old_image1, $old_image2, $old_image3];
        for ($g = 0; $g < 3; $g++) {
            if ($gambar[$g]['name'] != '') {
                $filename = $gambar[$g]['name'];
                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                $config['file_name'] = rand() . "." . $extension;
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1024';
                $config['upload_path'] = './assets/img/complain/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('new_image' . $g)) {
                    $upload_image[] = $this->upload->data('file_name');
                    unlink('./assets/img/complain/' . $gambarlama[$g]);
                } else {
                    $upload_image[$g] = $gambarlama[$g];
                }
            } else {
                $upload_image[$g] = $gambarlama[$g];
            }
        }

        $data = [
            'id' => $id,
            'email' => $mail,
            'nama' => $nm,
            'judul_complain' => $jdl_cmp,
            'deskripsi' => $dsk,
            'lokasi_pekerjaan' => $lks_pkj,
            'keadaan' => $kdn,
            'tingkat_bahaya' => $tngk_bhy,
            'tanggal_ajukan' => $tgl_ajk,
            'gambar' => $upload_image[0],
            'gambar2' => $upload_image[1],
            'gambar3' => $upload_image[2]
        ];
        $this->db->where('id', $edt_id);
        $this->db->update('tb_complain', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                                                  <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                  <div class="alert-text">Detail Complain Berhasil Diubah!</div>
                                                  <div class="alert-close">
                                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                          <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                                      </button>
                                                  </div>
                                              </div>');
        redirect('permintaan');
    }

    //Edit Status Complain Buat Admin
    public function editStatusComplain()
    {
        $id = $this->input->post('id');
        $sts_cmp = $this->input->post('status_complain');

        $this->db->set('status_complain', $sts_cmp);
        $this->db->where('id', $id);
        $this->db->update('tb_complain');

        if ($sts_cmp == 'Selesai') {
            $emailuser = $this->input->post('email');
            $nm = $this->input->post('nama');
            $jdl_cmp = $this->input->post('judul_complain');
            $dsk = $this->input->post('deskripsi');
            $kdn = $this->input->post('keadaan');
            $tngk_bhy = $this->input->post('tingkat_bahaya');
            $tgl_ajk = $this->input->post('tanggal_ajukan');
            $upload_image = $this->input->post('gambar');
            $upload_image2 = $this->input->post('gambar2');
            $upload_image3 = $this->input->post('gambar3');

            $nm_kontrak = $this->input->post('nm_kontrak');
            $nm_jawab = $this->input->post('nm_jawab');
            $no_tlp = $this->input->post('no_tlp');
            $dsk_pekrj = $this->input->post('dsk_pekrj');
            $wk_awal = $this->input->post('wk_awal');
            $wk_akhir = $this->input->post('wk_akhir');
            $tg_akhir = $this->input->post('tg_akhir');
            $emailtten = $this->db->get_where('user', ['name' => $nm_kontrak])->row_array();
            $emailtenant = $emailtten['email'];

            $jumlah = count($this->input->post('sblm'));
            for ($i = 0; $i < $jumlah; $i++) {
                $sebelum_kerja = $this->input->post('sblm');
            }
            $jumlah2 = count($this->input->post('ssdh'));
            for ($i = 0; $i < $jumlah2; $i++) {
                $sesudah_kerja = $this->input->post('ssdh');
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status berhasil diubah!</div>');
            $this->_sendEmailToUser($emailuser, $nm, $jdl_cmp, $dsk, $kdn, $tngk_bhy, $tgl_ajk, $upload_image, $upload_image2, $upload_image3);
            $this->_sendEmailToTenant($emailtenant, $nm, $nm_kontrak, $nm_jawab, $no_tlp, $dsk_pekrj, $wk_awal, $wk_akhir, $tg_akhir, $sebelum_kerja, $sesudah_kerja);
            redirect('permintaan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status berhasil diubah!</div>');
            redirect('permintaan');
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

    //Function Laporan Complain
    public function laporan()
    {
        $data['title'] = 'Laporan Complain';
        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();

        $cari_tanggal_permintaanawal = $this->input->post('cari_tanggal_permintaanawal');
        $cari_tanggal_permintaanakhir = $this->input->post('cari_tanggal_permintaanakhir');

        if ($cari_tanggal_permintaanawal && $cari_tanggal_permintaanakhir) {
            $this->db->where('tanggaL_ajukan >=', $cari_tanggal_permintaanawal);
            $this->db->where('tanggal_ajukan <=', $cari_tanggal_permintaanakhir);
        }
        $this->db->select('*');
        $this->db->from('tb_complain');
        $this->db->where('email', $this->session->userdata('email'));
        $this->db->where('status_complain', 'Selesai');
        $data['complain'] = $this->db->get()->result_array();

        $data['izin'] = $this->db->get('tb_izin_kerja')->result_array();

        if ($this->session->userdata('role_id') == 4) {
            $this->load->view('templates/user_template/header_user', $data);
            $this->load->view('templates/user_template/navbar_user', $data);
            $this->load->view('umum/pengguna/laporan', $data);
            $this->load->view('templates/user_template/sidebar_modal_user', $data);
            $this->load->view('templates/user_template/footer_user');
        } elseif ($this->session->userdata('role_id') == 2) {
            $this->load->view('templates/user_template/header_user', $data);
            $this->load->view('templates/user_template/navbar_user', $data);
            $this->load->view('umum/pengguna/laporan', $data);
            $this->load->view('templates/user_template/sidebar_modal_user', $data);
            $this->load->view('templates/user_template/footer_user');
        } else {

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

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('umum/admin/permintaan-complain/laporan', $data);
            $this->load->view('templates/footer');
        }
    }
}
