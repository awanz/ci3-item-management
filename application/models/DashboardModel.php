<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DashboardModel extends CI_Model {

    function countProduk() // function untuk login cek user dan pass
	{
        $this->db->select('count(idProduk) as total');
		$result = $this->db->get('produk');
        return $result;
	}

    function countKategori() // function untuk login cek user dan pass
	{
        $this->db->select('count(idKategori) as total');
		$result = $this->db->get('kategori');
        return $result;
	}

    function countMerek() // function untuk login cek user dan pass
	{
        $this->db->select('count(idMerek) as total');
		$result = $this->db->get('merek');
        return $result;
	}

    function countAdmin() // function untuk login cek user dan pass
	{
        $this->db->select('count(idAdmin) as total');
		$result = $this->db->get('admin');
        return $result;
	}
	
}