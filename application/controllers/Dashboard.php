<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    private $data = array(
		"content" => "dashboard",
		"title" => "Dashboard - Item Management"
	);

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DashboardModel');
        $user = $this->session->userdata();

        if(empty($user['username'])){
            redirect('login');
        }else{
            $this->data["user"] = $user;
        }
    }

	
	public function index()
	{
        $this->data['produk'] = $this->DashboardModel->countProduk()->row()->total;
        $this->data['kategori'] = $this->DashboardModel->countKategori()->row()->total;
        $this->data['merek'] = $this->DashboardModel->countMerek()->row()->total;
        $this->data['admin'] = $this->DashboardModel->countAdmin()->row()->total;
        $this->load->view('master', $this->data);      
	}
}