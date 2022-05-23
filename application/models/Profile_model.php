<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Profile_model extends CI_Model
{
    public function detailuser()
    {
        $email = $this->session->userdata('email');

        $query = "SELECT * FROM `user`JOIN `detail_user` ON `user`.`email` = `detail_user`.`email` WHERE `user`.`email` = '$email'";
        return $this->db->query($query);
    }
    public function role_user()
    {
        $id_role = $this->session->userdata('role_id');

        $query = "SELECT * FROM `user` JOIN `user_role` ON `user`.`role_id` = `user_role`.`id` where `user`.`role_id`= '$id_role'";
        return $this->db->query($query);
    }

    public function get_data_atasan($cari_nama_atasan)
    {
        $hasil =  $this->db->query("SELECT * FROM tb_master_atasan WHERE nama_atasan='$cari_nama_atasan'");
        if ($hasil->num_rows() > 0) {
            foreach ($hasil->result_array() as $hsl) {
                $data1 = array(
                    'nama_atasan' =>  $hsl['nama_atasan'],
                    'email' =>  $hsl['email'],
                    'divisi' =>  $hsl['divisi'],
                    'kode_atasan' =>  $hsl['kode_atasan'],
                );
            }
        }
        return $data1;
    }
}
