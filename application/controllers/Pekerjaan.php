<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pekerjaan extends CI_Controller
{

  //funcion Mulai Pekerjaan
  public function mulai($id)
  {
    //persiapam
    $data['title'] = 'Complain';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();
    $data['complain'] = $this->db->get_where('tb_complain', ['id' => $id])->result_array();
    $data['izin'] = $this->db->get_where('tb_izin_kerja', ['id_complain' => $id])->result_array();
    $this->load->model('Profile_model', 'PM');
    $data['role_user'] = $this->PM->role_user()->result_array();

    //load view
    $this->load->view('templates/user_template/header_user', $data);
    $this->load->view('templates/user_template/navbar_user', $data);
    $this->load->view('workpermit/mulai_kerja.php', $data);
    $this->load->view('templates/user_template/sidebar_modal_user', $data);
    $this->load->view('templates/eksternal_user/footer_drop_awal');
  }

  //funcion Akhir pekerjaan
  public function akhir($id)
  {
    //persiapam
    $data['title'] = 'Complain';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();
    $data['complain'] = $this->db->get_where('tb_complain', ['id' => $id])->result_array();
    $data['izin'] = $this->db->get_where('tb_izin_kerja', ['id_complain' => $id])->result_array();
    $this->load->model('Profile_model', 'PM');
    $data['role_user'] = $this->PM->role_user()->result_array();

    //load view
    $this->load->view('templates/user_template/header_user', $data);
    $this->load->view('templates/user_template/navbar_user', $data);
    $this->load->view('workpermit/akhir_kerja.php', $data);
    $this->load->view('templates/user_template/sidebar_modal_user', $data);
    $this->load->view('templates/eksternal_user/footer_drop_akhir');
  }

  //add gambar awal Kerja
  public function upload_awal()
  {
    $config['upload_path']   = FCPATH . './assets/img/pekerjaan/awal/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('userfile')) {
      $token_awal = $this->input->post('token_foto');
      $id_izin = $this->input->post('id_izin_kerja');
      $nama_fotoawal = $this->upload->data('file_name');
      $this->db->insert('tb_mulai_kerja', array('gambar' => $nama_fotoawal, 'id_izin_kerja' => $id_izin, 'token' => $token_awal));
    }

    $id_comp = $this->input->post('id_complain');

    $this->db->set('status_complain', 'Sedang Dikerjakan');
    $this->db->where('id', $id_comp);
    $this->db->update('tb_complain');
  }

  //Untuk menghapus foto awal kerja
  public function remove_foto_awal()
  {
    //Ambil token foto
    $token = $this->input->post('token');
    $foto = $this->db->get_where('tb_mulai_kerja', array('token' => $token));

    if ($foto->num_rows() > 0) {
      $hasil = $foto->row();
      $nama_foto = $hasil->gambar;
      if (file_exists($file = FCPATH . './assets/img/pekerjaan/awal/' . $nama_foto)) {
        unlink($file);
      }
      $this->db->delete('tb_mulai_kerja', array('token' => $token));
    }
    echo "{}";
  }

  //add gambar akhir Kerja
  public function upload_akhir()
  {
    $config['upload_path']   = FCPATH . './assets/img/pekerjaan/akhir/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('userfile')) {
      $token = $this->input->post('token_foto');
      $id_izin = $this->input->post('id_izin_kerja');
      $nama = $this->upload->data('file_name');
      $this->db->insert('tb_akhir_kerja', array('gambar' => $nama, 'id_izin_kerja' => $id_izin, 'token' => $token));
    }
  }

  //Untuk menghapus foto
  public function remove_foto_akhir()
  {
    //Ambil token foto
    $token = $this->input->post('token');
    $foto = $this->db->get_where('tb_akhir_kerja', array('token' => $token));

    if ($foto->num_rows() > 0) {
      $hasil = $foto->row();
      $nama_foto = $hasil->gambar;
      if (file_exists($file = FCPATH . './assets/img/pekerjaan/akhir/' . $nama_foto)) {
        unlink($file);
      }
      $this->db->delete('tb_akhir_kerja', array('token' => $token));
    }
    echo "{}";
  }

  //ADD TTD
  public function upload_ttd()
  {
    $config['upload_path']   = FCPATH . './assets/img/ttd/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('ttd')) {
      $token = $this->input->post('token_foto_TTD');
      $nama_TTD = $this->upload->data('file_name');
      $this->db->update('tb_izin_kerja', array('ttd' => $nama_TTD, 'token_ttd' => $token));
    }

    $id_comp = $this->input->post('id_complain');
    $this->db->set('status_complain', 'Selesai Dikerjakan');
    $this->db->where('id', $id_comp);
    $this->db->update('tb_complain');
    $tgl = date("Y-m-d");
    $this->db->set('tanggal_akhir', $tgl);
    $this->db->where('id_complain', $id_comp);
    $this->db->update('tb_izin_kerja');
  }

  //Untuk menghapus foto
  public function remove_foto_TTD()
  {
    //Ambil token foto
    $token = $this->input->post('token');
    $foto = $this->db->get_where('tb_izin_kerja', array('token_ttd' => $token));

    if ($foto->num_rows() > 0) {
      $hasil = $foto->row();
      $nama_foto = $hasil->ttd;
      if (file_exists($file = FCPATH . './assets/img/ttd/' . $nama_foto)) {
        unlink($file);
      }
      $this->db->where('token_ttd', $token);
      $this->db->update('tb_izin_kerja', array('ttd' => '', 'token_ttd' => ''));
    }

    echo "{}";
  }
}
