<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AuthModel extends CI_Model {

    function login($username, $password) // function untuk login cek user dan pass
	{
		$result = $this->db->get_where('admin', array('username'=> $username, 'password'=> md5($password)));
        return $result;
	}
	
}