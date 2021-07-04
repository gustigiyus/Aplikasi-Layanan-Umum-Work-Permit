<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
        FROM `user_sub_menu` JOIN `user_menu`
        ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        ";

        return $this->db->query($query)->result_array();
    }
	
	public function getSSubMenu()
    {
        $query = "SELECT `user_ss_menu`.*, `user_menu`.`menu`
        FROM `user_ss_menu` JOIN `user_menu`
        ON `user_ss_menu`.`menu_id` = `user_menu`.`id`
        ";

        return $this->db->query($query)->result_array();
    }

    public function getTreeMenu()
    {
        $query = "SELECT `user_tree_menu`.*, `user_ss_menu`.`title` AS 'judul', `user_menu`.`menu`
        FROM `user_tree_menu` JOIN `user_ss_menu` JOIN `user_menu`
        ON `user_tree_menu`.`menu_tree` = `user_ss_menu`.`id` AND `user_tree_menu`.`menu_id` = `user_menu`.`id`
        ORDER BY `user_ss_menu`.`title`";

        return $this->db->query($query)->result_array();
    }

    public function getSSNameMenu($id)
    {
        $this->db->from('user_ss_menu');
        $this->db->where('menu_id', $id);
        $query = $this->db->get();

        return $query->result_array();
    }
}
