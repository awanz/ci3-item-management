<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
    
    private $data = array(
		"content" => "produk/list",
		"title" => "Produk - Item Management",
	);

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProdukModel');
        $this->load->model('MerekModel');
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
        $result = $this->ProdukModel->getAll();
        $this->data['data'] = $result->result();
        $this->load->view('master', $this->data);   
	}
	
    public function create()
	{
        $this->data['kategori'] = $this->KategoriModel->getAll()->result();
        $this->data['merek'] = $this->MerekModel->getAll()->result();
        $this->data['content'] = "produk/create";
        $this->load->view('master', $this->data);   
	}
	
    public function create_process()
	{
        $this->form_validation->set_rules('namaProduk','Nama Produk','trim|required', array('required' => '%s Wajib diisi.'));
        $this->form_validation->set_rules('harga','Harga','trim|required', array('required' => '%s Wajib diisi.'));
        $this->form_validation->set_rules('stok','Stok','trim|required', array('required' => '%s Wajib diisi.'));
        $this->form_validation->set_rules('idKategori','Kategori','trim|required', array('required' => '%s Wajib diisi.'));
        $this->form_validation->set_rules('idMerek','Merek','trim|required', array('required' => '%s Wajib diisi.'));
        $this->form_validation->set_rules('status','Status','trim|required', array('required' => '%s Wajib diisi.'));
        // $this->form_validation->set_rules('foto','Foto','required', array('required' => '%s Wajib diisi.'));
 
		if($this->form_validation->run() != false){
            // UPLOAD FILE
            $config['upload_path'] = './assets/images/produk/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']	= '2048';
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('foto')){
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('alert_status', "error");
                $this->session->set_flashdata('alert_message', $error['error']);
                redirect('/produk/create', 'refresh');
            }else {
                $data = array('upload_data' => $this->upload->data());
                $dataku = $data['upload_data'];
                $gambar = $dataku['file_name'];
            }
            // END UPLOAD FILE

            $dataPost = $_POST;
            $dataPost['foto'] = $gambar;
			$result = $this->ProdukModel->insert($dataPost);
            $this->session->set_flashdata('alert_status', "success");
            $this->session->set_flashdata('alert_message', 'Produk berhasil ditambahkan.');
            redirect('/produk/create', 'refresh');
		}else{
            $this->data['content'] = "produk/create";
            $this->load->view('master', $this->data);
		}
	}
    
    public function delete($id = null)
	{
        $where = array(
            'idProduk' => $id
        );
        $result = $this->ProdukModel->delete($where);
        if ($result) {
            $this->session->set_flashdata('alert_status', true);
            $this->session->set_flashdata('alert_message', 'Produk berhasil didelete.');
        }
        redirect('/produk', 'refresh');
	}

    public function edit($id = null)
	{
        $this->data['kategori'] = $this->KategoriModel->getAll()->result();
        $this->data['merek'] = $this->MerekModel->getAll()->result();
        $where = array(
            'idProduk' => $id
        );
        $result = $this->ProdukModel->getBy($where);
        $this->data['data'] = $result->row();
        $this->data['content'] = "produk/edit";
        $this->load->view('master', $this->data);   
	}
	
    public function edit_process($id = null)
	{
        $this->form_validation->set_rules('namaProduk','Nama Produk','trim|required', array('required' => '%s Wajib diisi.'));
        $this->form_validation->set_rules('harga','Harga','trim|required', array('required' => '%s Wajib diisi.'));
        $this->form_validation->set_rules('stok','Stok','trim|required', array('required' => '%s Wajib diisi.'));
        $this->form_validation->set_rules('idKategori','Kategori','trim|required', array('required' => '%s Wajib diisi.'));
        $this->form_validation->set_rules('idMerek','Merek','trim|required', array('required' => '%s Wajib diisi.'));
        $this->form_validation->set_rules('status','Status','trim|required', array('required' => '%s Wajib diisi.'));
        
		if($this->form_validation->run() != false){
            $where = array(
                'idProduk' => $id
            );
			$result = $this->ProdukModel->update($where, $_POST);
            $this->session->set_flashdata('alert_status', "success");
            $this->session->set_flashdata('alert_message', 'Produk berhasil diedit.');
            redirect('/produk/'.$id.'/edit', 'refresh');
		}else{
            $where = array(
                'idProduk' => $id
            );
            $this->data['kategori'] = $this->KategoriModel->getAll()->result();
            $this->data['merek'] = $this->MerekModel->getAll()->result();
            $result = $this->ProdukModel->getBy($where);
            $this->data['data'] = $result->row();
            $this->data['content'] = "produk/edit";
            $this->load->view('master', $this->data);
		}
	}
}