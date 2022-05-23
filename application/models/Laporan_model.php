<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Laporan_model extends CI_Model
{
  public function getallJP($id)
  {
    foreach ($id as $i) {
      $id_izin = $i['id'];
    }

    $query = "SELECT * FROM `tb_jenis_potensi` join `tb_master_jenis_potensi`
    ON `tb_jenis_potensi`.`id_JP` = `tb_master_jenis_potensi`.`id_master_JP` WHERE `tb_jenis_potensi`.`id_izin_kerja` = $id_izin";
    return $this->db->query($query);
  }

  public function getallTP($id)
  {
    foreach ($id as $i) {
      $id_izin = $i['id'];
    }
    $query = "SELECT * FROM `tb_tindak_pencegahan`join `tb_master_tindak_pencegahan`
    ON `tb_tindak_pencegahan`.`id_tindak_pencegahan` = `tb_master_tindak_pencegahan`.`id_master_TP` WHERE `id_izin_kerja` = $id_izin";
    return $this->db->query($query)->result_array();
  }

  public function getallAPD($id)
  {
    foreach ($id as $i) {
      $id_izin = $i['id'];
    }
    $query = "SELECT * FROM `tb_apd` join `tb_master_apd`
    ON `tb_apd`.`id_APD` = `tb_master_apd`.`id_master_APD` WHERE `id_izin_kerja` = $id_izin";
    return $this->db->query($query)->result_array();
  }

  public function getPekerja($id)
  {
    foreach ($id as $i) {
      $id_izin = $i['id'];
    }
    $query = "SELECT * FROM `tb_tenaga_kerja` WHERE `id_izin_kerja` = $id_izin";
    return $this->db->query($query)->result_array();
  }

  public function jmlPekerja($id)
  {
    foreach ($id as $i) {
      $id_izin = $i['id'];
    }
    $query = "SELECT * FROM `tb_tenaga_kerja` WHERE `id_izin_kerja` = $id_izin";
    return $this->db->query($query)->num_rows();
  }

  public function getfotomulai($id)
  {
    foreach ($id as $i) {
      $id_izin = $i['id'];
    }
    $query = "SELECT * FROM `tb_mulai_kerja` WHERE `id_izin_kerja` = $id_izin";
    return $this->db->query($query)->result_array();
  }

  public function getfotoakhir($id)
  {
    foreach ($id as $i) {
      $id_izin = $i['id'];
    }
    $query = "SELECT * FROM `tb_akhir_kerja` WHERE `id_izin_kerja` = $id_izin";
    return $this->db->query($query)->result_array();
  }

  public function laporan_izin_kerja_tenant()
  {
    $nama = $this->session->userdata('name');
    $query = "SELECT `tb_complain`.*,`tb_izin_kerja`.* 
              FROM `tb_complain` 
              JOIN `tb_izin_kerja` 
              ON `tb_complain`.`id` = `tb_izin_kerja`.`id_complain` 
              WHERE `tb_izin_kerja`.`nama_kontraktor` = '$nama' 
              AND `tb_izin_kerja`.`status_izin_kerja`= 'Selesai'
              AND `tb_complain`.`status_complain`= 'Selesai'
              ORDER BY `tb_izin_kerja`.`status_izin_kerja`
            ";
    return $this->db->query($query)->result_array();
  }

  public function laporan_data_complain()
  {
    $username = $this->session->userdata('name');
    $query = "SELECT `tb_complain`.*,`tb_izin_kerja`.`id_complain` FROM `tb_complain` join `tb_izin_kerja` ON `tb_complain`.`id` = `tb_izin_kerja`.`id_complain` WHERE `tb_izin_kerja`.`nama_kontraktor`= '$username' AND `tb_izin_kerja`.`status_izin_kerja`= 'Selesai'  AND `tb_complain`.`status_complain`= 'Selesai'";
    return $this->db->query($query)->result_array();
  }
}
