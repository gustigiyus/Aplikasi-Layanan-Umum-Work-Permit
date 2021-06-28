<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Workpermit_model extends CI_Model
{
  public function addizin($id_comp, $na_kon, $na_pen, $no_tel, $desk, $tanggal, $wak_mu, $wak_ak)
  {

    $query = "INSERT INTO tb_izin_kerja(id_complain,nama_kontraktor,nama_penanggung_jawab,no_telp_kantor,deskripsi_pekerjaan,tanggal_dikerjakan,waktu_mulai,waktu_akhir)
              VALUES ('$id_comp','$na_kon','$na_pen','$no_tel','$desk','$tanggal','$wak_mu','$wak_ak')";


    $this->db->trans_start();
    $this->db->query($query);
    $this->db->trans_complete();
    if ($this->db->trans_status() == true)
      return true;
    else
      return false;
  }

  public function detailcomplain()
  {
    $username = $this->session->userdata('name');
    $query = "SELECT `tb_complain`.*,`tb_izin_kerja`.* FROM `tb_complain` join `tb_izin_kerja` ON `tb_complain`.`id` = `tb_izin_kerja`.`id_complain` WHERE `tb_izin_kerja`.`nama_kontraktor`= '$username' AND `tb_complain`.`status_complain` != 'Selesai' AND `tb_complain`.`status_complain` != 'Pending' AND `tb_complain`.`status_complain` != 'Complain Disetujui' AND `tb_complain`.`status_complain` != 'Meminta Izin Kerja'";
    return $this->db->query($query)->result_array();
  }

  public function detailizin()
  {
    $query = "SELECT `tb_complain`.`id`,`tb_izin_kerja`.* FROM `tb_complain` join `tb_izin_kerja` ON `tb_complain`.`id` = `tb_izin_kerja`.`id_complain`";

    return $this->db->query($query)->result_array();
  }

  public function detailpekerja()
  {
    $query = "SELECT `tb_tenaga_kerja`.*,`tb_izin_kerja`.`id` FROM `tb_tenaga_kerja` join `tb_izin_kerja` ON `tb_tenaga_kerja`.`id_izin_kerja` = `tb_izin_kerja`.`id`";

    return $this->db->query($query)->result_array();
  }

  public function detailizinsatuan($id)
  {
    $query = "SELECT `tb_complain`.`id`,`tb_izin_kerja`.* FROM `tb_complain` join `tb_izin_kerja` ON `tb_complain`.`id` = `tb_izin_kerja`.`id_complain` WHERE `tb_izin_kerja`.`id_complain` = $id ";

    return $this->db->query($query)->result_array();
  }

  public function getallJP()
  {
    $query = "SELECT * FROM `tb_master_jenis_potensi`";
    return $this->db->query($query)->result_array();
  }

  public function getallTP()
  {
    $query = "SELECT * FROM `tb_master_tindak_pencegahan`";
    return $this->db->query($query)->result_array();
  }

  public function getallAPD()
  {
    $query = "SELECT * FROM `tb_master_apd`";
    return $this->db->query($query)->result_array();
  }

  public function getviewJP()
  {
    $query = "SELECT `tb_master_jenis_potensi`.nama_jenis_potensi,`tb_jenis_potensi`.* FROM `tb_master_jenis_potensi` JOIN `tb_jenis_potensi` ON `tb_master_jenis_potensi`.id_master_JP = `tb_jenis_potensi`.id_JP";
    return $this->db->query($query)->result_array();
  }
}
