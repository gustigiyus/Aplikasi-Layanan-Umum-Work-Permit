<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Workpermit extends CI_Controller
{
    public function index()
    {
        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();
        $data['title'] = 'Pengajuan Izin Kerja';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();

        $data['complain'] = $this->db->select('*')->from('tb_complain')
            ->group_start()
            ->where('status_kerja !=', 'Selesai')
            ->where('status_kerja !=', 'Selesai Dikerjakan')
            ->where('status_kerja !=', 'Sedang Dikerjakan')
            ->where('status_kerja !=', 'Izin Kerja Disetujui')
            ->where('email !=', $this->session->userdata('email'))
            ->group_end()
            ->get()
            ->result_array();

        // Hitung Jumlah data sesuai dengan id_complain dan nama kontraktor
        $this->load->model('workpermit_model', 'dc');
        $data['complainizin'] = $this->dc->data_izinkerja_complain();

        $data['izin_kerja'] = $this->db->get_where('tb_izin_kerja', ['nama_kontraktor' => $this->session->userdata('name')])->result_array();



        if ($this->session->userdata('role_id') == 4) {
            $this->load->view('templates/user_template/header_user', $data);
            $this->load->view('templates/user_template/navbar_user', $data);
            $this->load->view('workpermit/index', $data);
            $this->load->view('templates/user_template/sidebar_modal_user', $data);
            $this->load->view('templates/user_template/footer_user');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('workpermit/index', $data);
            $this->load->view('templates/footer');
        }
    }

    public function IzinKerja($id)
    {
        $data['title'] = 'Izin Kerja';
        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();
        $data['complain'] = $this->db->get_where('tb_complain', ['id' => $id])->result_array();
        $data['pekerja'] = $this->db->get('tb_tenaga_kerja')->result_array();

        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('workpermit/izin_kerja', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user');
    }

    public function pekerjaan()
    {
        $data['title'] = 'Data Pekerjaan';
        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();
        $this->load->model('workpermit_model', 'pekerja');

        //Data Complain Yang Sudah OKE
        $data['complain'] = $this->pekerja->data_complain_OK();

        //Data Izin Kerja Yang Sudah OKE
        $data['izin_kerja'] = $this->pekerja->data_izinkerja_OK();

        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('workpermit/data-pekerjaan', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user');
    }

    public function pekerjaan_emailsend()
    {

        $this->_sendEmail_datapekerjaaan();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <div class="container">
            <div class="alert-icon">
                <i class="now-ui-icons ui-2_like"></i>
            </div>
            Data pekerjaan Anda Berhasil Diajukan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
            </div>
        </div>');
        redirect('workpermit/pekerjaan');
    }

    private function _sendEmail_datapekerjaaan()
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

        $this->email->from('cocmarvel5@gmail.com', 'Admin PT INTI IZIN KERJA');
        $this->email->to('gustiggt123@gmail.com');
        $this->email->subject('Notifikasi data sesudah/sebelum kerja');
        $this->email->message('ada data sesudah/sebelum kerja');


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function addizin($id)
    {
        //siapkan isi tabel izin kerja
        $id_comp = $this->input->post('id_complain');
        $na_kon = $this->input->post('nama_kontraktor');
        $na_pen = $this->input->post('nama_penanggung_jawab');
        $no_tel = $this->input->post('no_telp');
        $desk = $this->input->post('desk_kerja');
        $lks_pkj = $this->input->post('lokasi_pekerjaan');
        $date = $this->input->post('tanggal');
        $tanggal = date('Y-m-d', strtotime($date));
        $wak_mu = $this->input->post('waktu_mulai');
        $wak_mu_t = $tanggal . ' ' . $wak_mu;
        $wak_ak = $this->input->post('waktu_akhir');
        $wak_ak_t = $tanggal . ' ' . $wak_ak;

        $this->load->model('workpermit_model');
        $this->workpermit_model->addizin($id_comp, $na_kon, $na_pen, $no_tel, $desk, $lks_pkj, $tanggal, $wak_mu_t, $wak_ak_t);
        redirect('workpermit/addpekerja/' . $id);
    }

    public function editizin($id)
    {
        //siapkan isi tabel izin kerja
        $id_comp = $this->input->post('id_complain');
        $na_kon = $this->input->post('nama_kontraktor');
        $na_pen = $this->input->post('nama_penanggung_jawab');
        $no_tel = $this->input->post('no_telp');
        $desk = $this->input->post('desk_kerja');
        $date = $this->input->post('tanggal');
        $tanggal = date('Y-m-d', strtotime($date));
        $wak_mu = $this->input->post('waktu_mulai');
        $wak_mu_t = $tanggal . ' ' . $wak_mu;
        $wak_ak = $this->input->post('waktu_akhir');
        $wak_ak_t = $tanggal . ' ' . $wak_ak;

        //data dimasukan ke array
        $data = [
            'id_complain' => $id_comp,
            'nama_kontraktor' => $na_kon,
            'nama_penanggung_jawab' => $na_pen,
            'no_telp_kantor' => $no_tel,
            'deskripsi_pekerjaan' => $desk,
            'tanggal_dikerjakan' => $tanggal,
            'waktu_mulai' => $wak_mu_t,
            'waktu_akhir' => $wak_ak_t,
        ];

        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('tb_izin_kerja');

        $id_comp = $this->input->post('id_complain');
        $querystatus = "UPDATE tb_complain SET status_complain = 'Meminta Izin Kerja' WHERE id = '$id_comp'";
        $this->db->query($querystatus);
        redirect('workpermit/manage/' . $id_comp);
    }

    // TAMBAH PEKERJA SINGLE ADD //
    public function addpekerjasingle()
    {
        $id_izn = $this->input->post('id_izin_kerja');
        $nm_pekerja = $this->input->post('nama_pekerja');
        $js_pekerja = $this->input->post('jenis_pekerjaan');
        $lokpek = $this->input->post('lokasi_pekerjaan');

        //data dimasukan ke array
        $data = [
            'id_izin_kerja' => $id_izn,
            'nama_pekerja' => $nm_pekerja,
            'jenis_Pekerjaan' => $js_pekerja,
            'lokasi_pekerjaan' => $lokpek,
        ];

        $this->db->insert('tb_tenaga_kerja', $data);

        $id_comp = $this->input->post('id_complain');
        $querystatus = "UPDATE tb_complain SET status_complain = 'Meminta Izin Kerja' WHERE id = '$id_comp'";
        $this->db->query($querystatus);
        redirect('workpermit/manage/' . $id_comp);
    }

    // EDIT PEKERJA SINGLE EDIT//
    public function editpekerja()
    {
        $id_kerja = $this->input->post('id_kerja');
        $id_izn = $this->input->post('id_izin_kerja');
        $nm_pekerja = $this->input->post('nama_pekerja');
        $js_pekerja = $this->input->post('jenis_pekerjaan');
        $lokpek = $this->input->post('lokasi_pekerjaan');

        //data dimasukan ke array
        $data = [
            'id' => $id_kerja,
            'id_izin_kerja' => $id_izn,
            'nama_pekerja' => $nm_pekerja,
            'jenis_Pekerjaan' => $js_pekerja,
            'lokasi_pekerjaan' => $lokpek,
        ];

        $this->db->set($data);
        $this->db->where('id', $id_kerja);
        $this->db->update('tb_tenaga_kerja');

        $id_comp = $this->input->post('id_complain');
        $querystatus = "UPDATE tb_complain SET status_complain = 'Meminta Izin Kerja' WHERE id = '$id_comp'";
        $this->db->query($querystatus);
        redirect('workpermit/manage/' . $id_comp);
    }

    // DELETE PEKERJA SINGLE DELETE//
    public function delpekerja($id_pkj, $id_comp)
    {
        $this->db->where('id', $id_pkj);
        $this->db->delete('tb_tenaga_kerja');

        redirect('workpermit/manage/' . $id_comp);
    }





    // BAGIAN TINDAK PENCEGAHAAN //

    // TAMBAH TINDAK PENCEGAHAAN SINGLE ADD//
    public function addtindakpencegahaan($id)
    {
        //ambil data dari form
        $id_izin_kerja = $id;
        $tindak_pencegahan = $this->input->post('tindak_pencegahan');

        //data dimasukan ke array
        $jumlah = count($tindak_pencegahan);
        for ($i = 0; $i <  $jumlah; $i++) {

            $data = [
                'id_izin_kerja' => $id_izin_kerja,
                'id_tindak_pencegahan' => $tindak_pencegahan[$i]
            ];

            $this->db->insert('tb_tindak_pencegahan', $data);
        }

        $id_comp = $this->input->post('id_complain');
        $querystatus = "UPDATE tb_complain SET status_complain = 'Meminta Izin Kerja' WHERE id = '$id_comp'";
        $this->db->query($querystatus);
        redirect('workpermit/manage/' . $id_comp);
    }

    // EDIT TINDAK PENCEGAHAAN SINGLE EDIT//
    public function edittindakpencegahaan($id)
    {
        //ambil data dari form
        $id_izin_kerja = $this->input->post('id_izin_kerja');;
        $tindak_pencegahan = $this->input->post('tindak_pencegahan');

        //data dimasukan ke array
        $jumlah = count($tindak_pencegahan);
        for ($i = 0; $i <  $jumlah; $i++) {

            $data = [
                'id' => $id,
                'id_izin_kerja' => $id_izin_kerja,
                'id_tindak_pencegahan' => $tindak_pencegahan[$i]
            ];

            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('tb_tindak_pencegahan');
        }

        $id_comp = $this->input->post('id_complain');
        $querystatus = "UPDATE tb_complain SET status_complain = 'Meminta Izin Kerja' WHERE id = '$id_comp'";
        $this->db->query($querystatus);
        redirect('workpermit/manage/' . $id_comp);
    }

    // DELETE TINDAK PENCEGAHAAN SINGLE DELETE//
    public function deltindakpencegahan($idtindak, $id_comp)
    {
        $this->db->where('id', $idtindak);
        $this->db->delete('tb_tindak_pencegahan');

        redirect('workpermit/manage/' . $id_comp);
    }


    // BAGIAN JENIS POTENSI //

    // TAMBAH POTENSI SINGLE ADD//
    public function addpotensi($id)
    {

        //ambil data dari form
        $id_izin_kerja = $id;
        $jenis_potensi = $this->input->post('jenis_potensi');

        //data dimasukan ke array
        $jumlah = count($jenis_potensi);
        for ($i = 0; $i <  $jumlah; $i++) {

            $data = [
                'id_izin_kerja' => $id_izin_kerja,
                'id_JP' => $jenis_potensi[$i]
            ];

            $this->db->insert('tb_jenis_potensi', $data);
        }

        $id_comp = $this->input->post('id_complain');
        $querystatus = "UPDATE tb_complain SET status_complain = 'Meminta Izin Kerja' WHERE id = '$id_comp'";
        $this->db->query($querystatus);
        redirect('workpermit/manage/' . $id_comp);
    }


    // EDIT POTENSI SINGLE EDIT//
    public function editpotensi($id)
    {
        //ambil data dari form
        $id_izin_kerja = $this->input->post('id_izin_kerja');;
        $jenis_potensi = $this->input->post('jenis_potensi');

        //data dimasukan ke array
        $jumlah = count($jenis_potensi);
        for ($i = 0; $i <  $jumlah; $i++) {

            $data = [
                'id' => $id,
                'id_izin_kerja' => $id_izin_kerja,
                'id_JP' => $jenis_potensi[$i]
            ];

            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('tb_jenis_potensi');
        }

        $id_comp = $this->input->post('id_complain');
        $querystatus = "UPDATE tb_complain SET status_complain = 'Meminta Izin Kerja' WHERE id = '$id_comp'";
        $this->db->query($querystatus);
        redirect('workpermit/manage/' . $id_comp);
    }

    // DELETE PEKERJA SINGLE DELETE//
    public function delpotensi($idpoten, $id_comp)
    {
        $this->db->where('id', $idpoten);
        $this->db->delete('tb_jenis_potensi');

        redirect('workpermit/manage/' . $id_comp);
    }


    // SEMUA FUNCTION ADD PEKERJA //
    public function formtambahbanyak($id, $id_complain, $lokasi)
    {

        $lokasi_pekerjaan = urldecode($lokasi);

        if ($this->input->is_ajax_request()) {

            $data = array(
                'id_izin' => $id,
                'id_complain' => $id_complain,
                'lokasi_pekerjaan' => $lokasi_pekerjaan
            );

            $msg = [

                'data' =>  $this->load->view('workpermit/formtambahbanyak', $data, true)
            ];

            echo json_encode($msg);
        }
    }

    public function addpekerja($id)
    {
        $this->load->model('workpermit_model', 'pekerja');
        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();
        $data['title'] = 'Tambah Pekerja';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();
        $data['complain'] = $this->db->get_where('tb_complain', ['id' => $id])->result_array();
        $data['pekerja'] = $this->db->get('tb_tenaga_kerja')->result_array();
        $data['izin'] = $this->pekerja->detailizinsatuan($id);

        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('workpermit/add_pekerja', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_pekerja', $data);
    }

    public function simpandatabanyak()
    {
        if ($this->input->is_ajax_request()) {
            $id_izin_kerja = $this->input->post('id_izin_kerja');
            $nama_pekerja = $this->input->post('nama_pekerja');
            $jenis_pekerja = $this->input->post('jenis_pekerja');
            $lokasi_pekerja = $this->input->post('lokasi_pekerja');

            $jmldata = count($id_izin_kerja);

            for ($i = 0; $i < $jmldata; $i++) {

                $data = [
                    'id_izin_kerja' => $id_izin_kerja[$i],
                    'nama_pekerja' => $nama_pekerja[$i],
                    'jenis_pekerjaan' => $jenis_pekerja[$i],
                    'lokasi_pekerjaan' => $lokasi_pekerja[$i],
                ];

                $this->db->insert('tb_tenaga_kerja', $data);
            }
        }

        $msg = [
            'sukses' => " $jmldata data berhasil disimpan"
        ];

        echo json_encode($msg);
    }


    // SEMUA FUNCTION ADD DETAIL PEKRJAAN //
    public function adddetailizin($id)
    {
        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();
        $this->load->model('workpermit_model', 'pekerja');
        $data['title'] = 'Tambah Pekerja';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();
        $data['complain'] = $this->db->get_where('tb_complain', ['id' => $id])->result_array();
        $data['pekerja'] = $this->db->get('tb_tenaga_kerja')->result_array();
        $data['izin'] = $this->pekerja->detailizinsatuan($id);
        $data['jp'] = $this->pekerja->getallJP();
        $data['tp'] = $this->pekerja->getallTP();
        $data['apd'] = $this->pekerja->getallAPD();

        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('workpermit/add_detail_izin', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user');
    }

    public function adddetail($id)
    {
        //ambil data dari form
        $id_izin_kerja = $id;
        $jenis_potensi = $this->input->post('jenis_potensi');
        $tindak_pencegahan = $this->input->post('tindak_pencegahan');


        //hitung jumlah file
        $jmldata = count($jenis_potensi);
        $jmldata2 = count($tindak_pencegahan);


        //jenis Potensi Bahaya
        for ($i = 0; $i < $jmldata; $i++) {
            $data1 = [
                'id_izin_kerja' => $id_izin_kerja,
                'id_JP' =>  $jenis_potensi[$i]
            ];

            // var_dump($data);
            // die;
            $this->db->insert('tb_jenis_potensi', $data1);
        }

        //Tindak Pencegahan
        for ($i = 0; $i < $jmldata2; $i++) {
            $data2 = [
                'id_izin_kerja' => $id_izin_kerja,
                'id_tindak_pencegahan' =>  $tindak_pencegahan[$i]
            ];
            $this->db->insert('tb_tindak_pencegahan', $data2);
        }

        //APD
        $this->load->library('upload');
        $dataInfo = array();
        $files = $_FILES;
        $cpt = count($_FILES['gambar_apd']['name']);
        $id_apd = $this->input->post('id_apd');
        for ($i = 0; $i < $cpt; $i++) {

            $_FILES['userfile']['name'] = $files['gambar_apd']['name'][$i];
            $_FILES['userfile']['type'] = $files['gambar_apd']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['gambar_apd']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $files['gambar_apd']['error'][$i];
            $_FILES['userfile']['size'] = $files['gambar_apd']['size'][$i];
            $extension = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
            $config['file_name'] = rand() . "." . $extension;
            $this->upload->initialize($this->set_upload_options());
            if ($files['gambar_apd']['name'][$i] != '') {

                $this->upload->do_upload();
                $dataInfo[$i] = $this->upload->data();

                $data = array(
                    'id_izin_kerja' => $id_izin_kerja,
                    'id_APD' =>  $id_apd[$i],
                    'gambar_apd' => $dataInfo[$i]['file_name']
                );

                $this->db->insert('tb_apd', $data);
            }
        }

        $id_comp = $this->input->post('id_complain');
        $query2 = "UPDATE tb_complain SET status_complain = 'Complain Disetujui' WHERE id = '$id_comp'";
        $this->db->query($query2);
        $this->_sendEmail();

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <div class="container">
          <div class="alert-icon">
            <i class="now-ui-icons ui-2_like"></i>
          </div>
            Izin kerja Anda Berhasil Diajukan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
      </div>');
        redirect('workpermit/index');
    }

    private function _sendEmail()
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

        $this->email->from('cocmarvel5@gmail.com', 'Admin PT INTI IZIN KERJA');
        $this->email->to('gustiggt123@gmail.com');
        $this->email->subject('Notifikasi Izin Kerja baru');
        $this->email->message('ada izin Kerja Baru');


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    private function set_upload_options()
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = './assets/img/workpermit';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '2048';
        $config['overwrite']     = FALSE;

        return $config;
    }

    // MANAGE (EDIT & DELETE) //

    public function manage($id)
    {
        $data['title'] = 'Edit Data Izin Kerja';
        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();

        $this->load->model('workpermit_model', 'manage');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();
        $data['complain'] = $this->db->get_where('tb_complain', ['id' => $id])->result_array();
        $data['izin'] = $this->db->get_where('tb_izin_kerja', ['id_complain' => $id])->result_array();
        $data['pekerja'] = $this->db->get('tb_tenaga_kerja')->result_array();
        $data['jp'] = $this->db->get('tb_jenis_potensi')->result_array();
        $data['tp'] = $this->db->get('tb_tindak_pencegahan')->result_array();
        $data['apd'] = $this->db->get('tb_apd')->result_array();
        $data['getalljp'] = $this->manage->getallJP();
        $data['getalltp'] = $this->manage->getallTP();
        $data['getallAPD'] = $this->manage->getallAPD();

        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('workpermit/manage', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user');
    }

    // MANAGE APD (EDIT )
    public function editapd($id)
    {
        //ambil data dari form
        $id_izin_kerja = $this->input->post('id_izin_kerja');;
        $id_apd = $this->input->post('id_apd');
        $upload_image = $_FILES['gambar'];
        $old_image = $this->input->post('old_image1');

        //gambar 1
        if ($upload_image = '') {
            $upload_image =  $this->input->post('old_image1');
        } else {
            $filename = $_FILES['gambar']['name'];
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '1024';
            $config['upload_path'] = './assets/img/workpermit';
            $config['file_name'] = rand() . "." . $extension;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                $upload_image =  $this->input->post('old_image1');
            } else {
                $upload_image = $this->upload->data('file_name');
                unlink(base_url('assets/img/workpermit') . $old_image);
            }
        }
        //data dimasukan ke array

        $data = [
            'id_APD' => $id_apd,
            'gambar_apd' => $upload_image
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('tb_apd');

        $this->session->set_flashdata('message', '<div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
        <div class="alert-icon"><i class="flaticon-warning"></i></div>
        <div class="alert-text">Gambar APD Telah Diubah!</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>');
        $id_comp = $this->input->post('id_complain');
        redirect('workpermit/manage/' . $id_comp);
    }

    // MANAGE APD (ADD )
    public function addapd()
    {
        //ambil data dari form
        $id_izin_kerja = $this->input->post('id_izin_kerja');;
        $id_apd = $this->input->post('idapd');
        $upload_image = $_FILES['gambar2'];
        $id_comp = $this->input->post('id_complain');
        //gambar 1
        if ($upload_image = '') {
            sleep(5);
            $this->session->set_flashdata('message', '<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
              <div class="alert-icon"><i class="flaticon-warning"></i></div>
              <div class="alert-text">Silahkan Pilih Gambar Terlebih Dahulu!</div>
              <div class="alert-close">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true"><i class="ki ki-close"></i></span>
                  </button>
              </div>
          </div>');
            redirect('workpermit/manage/' . $id_comp);
        } else {
            $filename = $_FILES['gambar2']['name'];
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $config['file_name'] = rand() . "." . $extension;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/workpermit/';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar2')) {
                sleep(5);
                $this->session->set_flashdata('message', '<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                <div class="alert-text">Silahkan Pilih Gambar Terlebih Dahulu!</div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>
            </div>');
                redirect('workpermit/manage/' . $id_comp);
            } else {
                $upload_image = $this->upload->data('file_name');
            }
        }
        //data dimasukan ke array

        $data = [
            'id_izin_kerja' => $id_izin_kerja,
            'id_APD' => $id_apd,
            'gambar_apd' => $upload_image
        ];

        $this->session->set_flashdata('message', '<div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
        <div class="alert-icon"><i class="flaticon-warning"></i></div>
        <div class="alert-text">Gambar APD Telah Ditambahkan!</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>');
        $this->db->insert('tb_apd', $data);
        redirect('workpermit/manage/' . $id_comp);
    }

    public function delapd($id_apd, $id_comp, $gambar)
    {
        $this->db->where('id', $id_apd);
        $this->db->delete('tb_apd');
        unlink(base_url('assets/img/workpermit') . $gambar);
        $this->session->set_flashdata('message', '<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
      <div class="alert-icon"><i class="flaticon-warning"></i></div>
      <div class="alert-text">APD Telah Dihapus!</div>
      <div class="alert-close">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"><i class="ki ki-close"></i></span>
          </button>
      </div>
  </div>');
        redirect('workpermit/manage/' . $id_comp);
    }

    //Function Laporan
    public function laporan()
    {
        $data['title'] = 'Laporan Workpermit';
        $this->load->model('Profile_model', 'PM');
        $this->load->model('Laporan_model', 'lm');
        $data['role_user'] = $this->PM->role_user()->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();

        //Data Izin Yang Sudah OKE
        $data['izin_kerja'] = $this->lm->laporan_izin_kerja_tenant();
        //Data Complain Yang Sudah OKE

        $data['complain'] = $this->lm->laporan_data_complain();

        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('workpermit/laporan', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user');
    }
}
