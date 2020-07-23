<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Menu_model');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        // $data['id_menu'] = $this->db->get_where('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu ' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Menu Added !! </div>');
            redirect('menu');
        }
    }


    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubmenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New SubMenu Added !! </div>');
            redirect('menu/submenu');
        }
    }

    public function deletemenu($id)
    {
        $query = "DELETE FROM `user_menu` WHERE `id` = $id";
        $this->db->query($query);
        $this->session->set_flashdata('deleted', '<div class="alert alert-success" role="alert"> Menu has been deleted !! </div>');
        redirect('menu');

        // if (deletemenu($id) > 0) {
        //     $this->session->set_flashdata('deleted', '<div class="alert alert-success" role="alert"> Menu has been deleted !! </div>');
        //     redirect('menu');
        // } else {
        //     $this->session->set_flashdata('deleted', '<div class="alert alert-success" role="alert"> Menu is failed deleted !! </div>');
        //     redirect('menu');
        // }
    }


    public function getDetailMenu($id)
    {

        $get_Menu_By_Id = $this->Menu_model->getMenuById($id)->row();

        $data = array(
            'menu' => $get_Menu_By_Id->menu
        );

        echo json_encode($data);
    }

    public function editmenu()
    {

        $this->form_validation->set_rules('editmenu', 'Edit Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('menu/index');
            $this->load->view('templates/footer');
        } else {

            $id = $this->input->post('id-edit');
            $editmenu = $this->input->post('editmenu');
            $this->db->set('menu', $editmenu);
            $this->db->where('id', $id);
            $this->db->update('user_menu');
            $this->session->set_flashdata('edited', '<div class="alert alert-success" role="alert"> Menu has been edited !! </div>');
            redirect('menu');
        }
    }

    public function getDetailSubmenu($id)
    {
        $get_submenu_By_Id = $this->Menu_model->getSubmenuById($id)->row();

        $data = array(
            'title' => $get_submenu_By_Id->title,
            'menu_id' => $get_submenu_By_Id->menu_id,
            'url' => $get_submenu_By_Id->url,
            'icon' => $get_submenu_By_Id->icon,
            'is_active' => $get_submenu_By_Id->is_active
        );

        echo json_encode($data);
    }

    public function submenu_edit()
    {

        $this->form_validation->set_rules('title_edit', 'Title submenu', 'required');
        $this->form_validation->set_rules('menu_id_edit', 'Menu', 'required');
        $this->form_validation->set_rules('url_edit', 'URL', 'required');
        $this->form_validation->set_rules('icon_edit', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('menu/submenu');
            $this->load->view('templates/footer');
        } else {
            $id = [

                'id' => $this->input->post('id-edit')
            ];

            $data = [
                'title' => $this->input->post('title_edit'),
                'menu_id' => $this->input->post('menu_id_edit'),
                'url' => $this->input->post('url_edit'),
                'icon' => $this->input->post('icon_edit'),
                'is_active' => $this->input->post('is_active_edit')
            ];

            $this->db->set($data);
            $this->db->where($id);
            $this->db->update('user_sub_menu');
            $this->session->set_flashdata('edited_submenu', '<div class="alert alert-success" role="alert"> SubMenu has been edited !! </div>');
            redirect('menu/submenu');
        }
    }
}
