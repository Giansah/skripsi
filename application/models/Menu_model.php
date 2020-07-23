<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.* , `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id` 
                ";
        return $this->db->query($query)->result_array();
    }

    public function getMenuById($data)
    {
        $this->db->where('id', $data);
        return $this->db->get('user_menu');
    }

    public function getSubmenuById($data)
    {
        $this->db->where('id', $data);
        return $this->db->get('user_sub_menu');
    }
}
