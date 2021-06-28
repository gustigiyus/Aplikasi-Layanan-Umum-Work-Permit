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
}
