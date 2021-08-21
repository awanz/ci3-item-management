<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
    }

	private $data = array(
		"content" => "test",
		"title" => "Login - Item Management"
	);

	public function index()
	{
        $user = $this->session->userdata();

        if(isset($user['username'])){
            redirect('dashboard');
        }else{
		    $this->load->view('login');
        }
	}

	public function process()
	{
        $user = $this->session->userdata();
        print_r($user);
        if(isset($user['username'])){
            redirect('dashboard');
        }else{
            if(isset($_POST)){
                //proses login
                $user = $this->input->post('password');
                $pass = $this->input->post('password');

                $login = $this->AuthModel->login($user, $pass);

                if($login->num_rows() > 0){
                    $this->session->set_userdata('id', $login->result()[0]->idAdmin);
                    $this->session->set_userdata('username', $login->result()[0]->username);
                    $this->session->set_userdata('level', $login->result()[0]->level);
                    redirect('dashboard');
                }else{
                    redirect('login');
                }
            }else{
                redirect('login');
            }
        }
	}

    function logout(){
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->sess_destroy();
        redirect('login');
    }
}
