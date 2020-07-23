<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function get_ticket_open()
    {
        return $this->db->query('SELECT * FROM `ticket` WHERE `status` = 6');
    }

    public function get_detail_ticket($id)
    {

        return $this->db->query("SELECT * FROM `ticket_detail` WHERE id = $id")->result();
    }

    public function getTicketById($id)
    {

        return $this->db->query("SELECT * FROM `ticket` WHERE id= $id ")->result();
    }

    public function get_id_ticket($get_id)
    {
        return $this->db->query("SELECT * FROM `ticket_detail` WHERE `id_ticket` = $get_id ")->result();
    }

    public function get_ticket_pending($where=array())
    {
        return $this->db->get_where('ticket',$where);
        // return $this->db->query("SELECT * FROM `ticket` WHERE `status` = 8");
    }

    public function get_ticket_closed()
    {
        return $this->db->query("SELECT * FROM `ticket` WHERE `status` = 7");
    }

    public function closed($id)
    {
        return $this->db->query("SELECT * FROM `ticket` WHERE `id` = $id");
    }

    public function user()
    {
        return $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
    }

    public function ticket_open($where = array())
    {
        return $this->db->get_where('ticket', $where);

        // $this->db->query("SELECT * FROM `ticket` WHERE `id` = 6 AND `user_id` = $user");
    }

    public function total_ticket_open()
    {
        // return $query = $this->db->get('ticket');
        // if ($query->num_rows() > 0) {
        //     return $query->num_rows();
        // } else {
        //     return 0;
        // }

        // $this->db->where('status', '6');
        // return $this->db->count_all('ticket');

        // $this->db->get('ticket');
        // $this->db->where('status', '6');
        // $this->db->
        $this->db->where('status', '6');
        $query = $this->db->get('ticket');
        return $query->num_rows();
        // $query= $this->db->query();
        // return $this->db->count_all_results($query);
        // $query->row();
    }

    public function total_ticket_closed()
    {
        $this->db->where('status', '8');
        $query = $this->db->get('ticket');
        return $query->num_rows();
    }

    public function total_ticket_pending()
    {
        $this->db->where('status', '5');
        $query = $this->db->get('ticket');
        return $query->num_rows();
    }
    function getPetugas(){
        return $this->db->get_where('user',array('role_id'=>3));
    }
}
