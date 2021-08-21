<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merek extends CI_Controller {
    
    private $data = array(
		"content" => "merek/list",
		"title" => "Merek - Item Management",
	);

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MerekModel');
        $this->data['user'] = $this->session->userdata();

        if(empty($this->data['user']['level'])){
            redirect('login');
        }else{
            if ($this->data['user']['level'] != "admin") {
                redirect('dashboard');
            }            
        }
    }

	public function index()
	{
        $result = $this->MerekModel->getAll();
        $this->data['data'] = $result->result();
        $this->load->view('master', $this->data);   
	}
	
    public function create()
	{
        $this->data['content'] = "merek/create";
        $this->load->view('master', $this->data);   
	}
	
    public function create_process()
	{
        $this->form_validation->set_rules('namaMerek','Nama Merek','trim|required', array('required' => '%s Wajib diisi.'));
 
		if($this->form_validation->run() != false){
			$result = $this->MerekModel->insert($_POST);
            $this->session->set_flashdata('alert_status', true);
            $this->session->set_flashdata('alert_message', 'Merek berhasil ditambahkan.');
            redirect('/merek/create', 'refresh');
		}else{
            $this->data['content'] = "merek/create";
            $this->load->view('master', $this->data);
		}
	}
    
    public function delete($id = null)
	{
        $where = array(
            'idMerek' => $id
        );
        $result = $this->MerekModel->delete($where);
        if ($result) {
            $this->session->set_flashdata('alert_status', true);
            $this->session->set_flashdata('alert_message', 'Merek berhasil didelete.');
        }
        redirect('/merek', 'refresh');
	}

    public function edit($id = null)
	{
        $where = array(
            'idMerek' => $id
        );
        $result = $this->MerekModel->getBy($where);
        $this->data['data'] = $result->row();
        $this->data['content'] = "merek/edit";
        $this->load->view('master', $this->data);   
	}
	
    public function edit_process($id = null)
	{
        $this->form_validation->set_rules('namaMerek','Nama Merek','trim|required', array('required' => '%s Wajib diisi.'));
 
		if($this->form_validation->run() != false){
            $where = array(
                'idMerek' => $id
            );
			$result = $this->MerekModel->update($where, $_POST);
            $this->session->set_flashdata('alert_status', true);
            $this->session->set_flashdata('alert_message', 'Merek berhasil diedit.');
            redirect('/merek/'.$id.'/edit', 'refresh');
		}else{
            $where = array(
                'idMerek' => $id
            );
            $result = $this->MerekModel->getBy($where);
            $this->data['data'] = $result->row();
            $this->data['content'] = "merek/edit";
            $this->load->view('master', $this->data);
		}
	}
}