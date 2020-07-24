<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // check jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|png|jpg';
                $config['max_size'] = '20148';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your profile has been updated !! </div>');
            redirect('user');
        }
    }

    public function changepassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $curren_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($curren_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Password !! </div>');
                redirect('user/changepassword');
            } else {
                if ($curren_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New password cannot be the same as current password </div>');
                    redirect('user/changepassword');
                } else {
                    //password sudah OK 
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);


                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password Changed !! </div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function ticket()
    {
        $data['title'] = 'Ticket';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($this->session->userdata("role_id") == 3) {
            $where = array(
                "petugas_id" => $this->session->userdata("user_id"),
                "status" => 5
            );
            $or_where = array("status"=>8);
            $where_close = array(
                "petugas_id" => $this->session->userdata("user_id"),
                "status" => 7
            );
        } else {
            $where = array(
                "status" => 5
            );
            $where_close = array(
                "status" => 7
            );
            $or_where = array("status"=>8);
        }
        $data['role_id'] = $this->session->userdata("role_id");

        $data['ticket_open'] = $this->User_model->get_ticket_open()->result();
        $data['ticket_pending'] = $this->User_model->get_ticket_pending($where,$or_where)->result();
        $data['ticket_closed'] = $this->User_model->get_ticket_closed($where_close)->result();
        var_dump($this->db->last_query());

        $this->form_validation->set_rules('problem', 'Problem', 'required|trim');
        $this->form_validation->set_rules('report_by', 'Report By', 'required|trim');
        $this->form_validation->set_rules('action', 'Action', 'required|trim');
        // $this->form_validation->set_rules('category', 'Category', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['create'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ticket', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'problem' => $this->input->post('problem'),
                'report_by' => $this->input->post('report_by'),
                // 'category' => $this->input->post('category'),
                'status' => $this->input->post('status')
            ];
            // return var_dump($data);
            $this->db->insert('ticket', $data);

            $data2 = [
                'id_ticket' => $this->db->insert_id(),
                'action' => $this->input->post('action')
            ];

            // return var_dump($data2);
            $this->db->insert('ticket_detail', $data2);
            $this->session->set_flashdata('message_add', '<div class="alert alert-success" role="alert"> New Ticket Added !! </div>');

            redirect('user/ticket');
        }
    }

    public function ticket_detail($id)
    {
        $id = $id;
        $get_id = $this->uri->segment(3);
        $data['title'] = 'Ticket Detail';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ticket'] = $this->User_model->getTicketById($id);
        $data['detail'] = $this->User_model->get_detail_ticket($id);
        $data['get_id_ticket'] = $this->User_model->get_id_ticket($get_id);
        $data['closed'] = $this->User_model->closed($id)->row();
        $data['role_id'] = $this->session->userdata("role_id");

        $this->form_validation->set_rules('action_update', 'Action', 'required|trim');
        $this->form_validation->set_rules('status_update', 'Status', 'required|trim');
        $this->form_validation->set_rules('category_update', 'Category', 'required');

        if (!$this->form_validation->run()) {
            $data['petugas'] = $this->User_model->getPetugas();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ticket_detail', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'id_ticket' => $this->input->post('idd'),
                'action' => $this->input->post('action_update')
            ];

            $data2 = [
                'status' => $this->input->post('status_update'),
                "category" => $this->input->post("category_update", true)
            ];
            if($this->input->post("petugas_update")!=""){
                $data2["petugas_id"] = $this->input->post('petugas_update');
            }

            $this->db->insert('ticket_detail', $data);
            $this->db->where(array("id"=>$id));
            $this->db->update('ticket', $data2);
            $this->session->set_flashdata('message_update', '<div class="alert alert-success" role="alert"> Ticket updated !! </div>');
            redirect("user/ticket_detail/$id");
        }
    }

    public function closed($id)
    {

        $data = [
            'id' => $id,
            'status' => $this->input->post('closed')
        ];
        $this->db->where('id', $id);
        $this->db->update('ticket', $data);
        $this->session->set_flashdata('message_closed', '<div class="alert alert-success" role="alert"> Ticket Closed !! </div>');
        redirect("user/ticket_detail/" . $id);
    }

    public function tickets()
    {
        $data['title'] = 'Tickets';
        $data['user'] = $this->User_model->user()->row_array();
        $data['create'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array(
            "user_id" => $data['user']['id'],
            "status" => 6
        );
        $data['ticket'] = $this->User_model->ticket_open($where)->result();
        $data['ticket_pending'] = $this->User_model->get_ticket_pending()->result();
        $data['ticket_closed'] = $this->User_model->get_ticket_closed()->result();
        $this->form_validation->set_rules('problem', 'Problem', 'required|trim');
        $this->form_validation->set_rules('report_by', 'Report By', 'required|trim');
        $this->form_validation->set_rules('action', 'Action', 'required|trim');
        // $this->form_validation->set_rules('category', 'Category', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/tickets', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'problem' => $this->input->post('problem'),
                'report_by' => $this->input->post('report_by'),
                // 'category' => $this->input->post('category'),
                'status' => $this->input->post('status'),
                'user_id' => $this->input->post('user_id')
            ];
            // return var_dump($data);
            $result = $this->db->insert('ticket', $data);
            $data2 = [
                'id_ticket' => $this->db->insert_id(),
                'action' => $this->input->post('action')
            ];
            // return var_dump($data2);
            $this->db->insert('ticket_detail', $data2);
            // $this->session->set_flashdata('message_add', '<div class="alert alert-success" role="alert"> New Ticket Added !! </div>');

            if ($result) {


                // echo"
                // <script  type='text/javascript'>
                // $(document).ready(function(){
                //     $('button').click(function(){
                //       $('p').slideToggle();
                //     });
                //   });
                // <script>

                // ";

                // echo "

                // <audio id='suara' src='http://192.168.1.231/wpu-login/assets/sound/ping.mp3'></audio>

                // <script  type='text/javascript'>
                // var a1 = get.ElemetById('#suara');
                //     .play(a1);
                // <script>

                // ";


                // echo "
                //     <script type='text/javascript'>
                //         function play_sound() {
                //             var audioElement = document.createElement('audio');
                //             audioElement.setAttribute('src', 'http://192.168.1.231/wpu-login/assets/sound/ping.mp3');
                //             audioElement.setAttribute('autoplay', 'autoplay');
                //             audioElement.load();
                //             audioElement.play();
                //         }
                //     </script>        
                // ";

                // echo "<script type='text/javascript'>play_sound();</script>";

                // echo "
                // <embed name='sound_file' src='/assets/sound/ping.mp3' loop='true' hidden='true' autostart='true'/>
                // ";
                //     echo "
                //     <audio id='suara'>
                //     <source src='http://192.168.1.231/wpu-login/assets/sound/ping.mp3' type='audio/mpeg'>
                //     <source src='http://192.168.1.231/wpu-login/assets/sound/ping.ogg' type='audio/ogg'>
                //     Your browser does not support HTML5 video.
                //   </audio>

                //     ";
                //     echo "



                //   <script> 


                //   function playVid() { 
                //     var test = document.getElementById('#suara');
                //     test.play(); 
                //   } 
                //   </script> 

                //     ";
                $message = 'Ada ticket baru';
                echo "<script type='text/javascript'>alert('$message'); </script>";
                echo "<script>window.location.assign('tickets')</script>";
            }

            // redirect('user/tickets');
        }
    }

    public function ticket_details($id)
    {
        $id = $id;
        $get_id = $this->uri->segment(3);
        $data['title'] = 'Ticket Detail';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ticket'] = $this->User_model->getTicketById($id);
        // $data['detail'] = $this->User_model->get_detail_ticket($id);
        $data['get_id_ticket'] = $this->User_model->get_id_ticket($get_id);
        // $data['closed'] = $this->User_model->closed($id)->row();

        // $this->form_validation->set_rules('action_update', 'Action', 'required|trim');
        // $this->form_validation->set_rules('status_update', 'Status', 'required|trim')

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/ticket_details', $data);
        $this->load->view('templates/footer');
    }
}
