<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    
    private $data = array(
		"content" => "kategori/list",
		"title" => "Kategori - Item Management",
	);

    public function __construct()
    {
        parent::__construct();
        $this->load->model('KategoriModel');
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
        $result = $this->KategoriModel->getAll();
        $this->data['data'] = $result->result();
        $this->load->view('master', $this->data);   
	}
	
    public function create()
	{
        $this->data['content'] = "kategori/create";
        $this->load->view('master', $this->data);   
	}
	
    public function create_process()
	{
        $this->form_validation->set_rules('namaKategori','Nama Kategori','trim|required', array('required' => '%s Wajib diisi.'));
 
		if($this->form_validation->run() != false){
			$result = $this->KategoriModel->insert($_POST);
            $this->session->set_flashdata('alert_status', true);
            $this->session->set_flashdata('alert_message', 'Kategori berhasil ditambahkan.');
            redirect('/kategori/create', 'refresh');
		}else{
            $this->data['content'] = "kategori/create";
            $this->load->view('master', $this->data);
		}
	}
    
    public function delete($id = null)
	{
        $where = array(
            'idKategori' => $id
        );
        
        $result = $this->KategoriModel->delete($where);
        if ($result) {
            $this->session->set_flashdata('alert_status', true);
            $this->session->set_flashdata('alert_message', 'Kategori berhasil didelete.');
        }
        redirect('/kategori', 'refresh');
	}

    public function edit($id = null)
	{
        $where = array(
            'idKategori' => $id
        );
        $result = $this->KategoriModel->getBy($where);
        $this->data['data'] = $result->row();
        $this->data['content'] = "kategori/edit";
        $this->load->view('master', $this->data);   
	}
	
    public function edit_process($id = null)
	{
        $this->form_validation->set_rules('namaKategori','Nama Kategori','trim|required', array('required' => '%s Wajib diisi.'));
 
		if($this->form_validation->run() != false){
            $where = array(
                'idKategori' => $id
            );
			$result = $this->KategoriModel->update($where, $_POST);
            $this->session->set_flashdata('alert_status', true);
            $this->session->set_flashdata('alert_message', 'Kategori berhasil diedit.');
            redirect('/kategori/'.$id.'/edit', 'refresh');
		}else{
            $where = array(
                'idKategori' => $id
            );
            $result = $this->KategoriModel->getBy($where);
            $this->data['data'] = $result->row();
            $this->data['content'] = "kategori/edit";
            $this->load->view('master', $this->data);
		}
	}
}