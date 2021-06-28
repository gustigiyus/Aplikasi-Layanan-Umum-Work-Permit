<?php
defined('BASEPATH') or exit('No direct script access allowed');


class UserRole_model extends CI_Model
{
    public function getUserRole()
    {
        $query = "SELECT `user_role`.`role`, `user`.*
        FROM `user_role` JOIN `user`
        ON `user_role`.`id` = `user`.`role_id`
        ";

        return $this->db->query($query)->result_array();
    }
}
