<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_account_model extends CI_Controller {
	
	public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }
	
	public function insert_admin($data){
		$query = $this->db->query("SELECT * FROM admin where username = '{$data['username']}'");
		
		if($query->num_rows() == 0){
			$this->db->query("INSERT INTO admin VALUES (
				'{$data['username']}',
				'{$data['passencrypted']}',
				'{$data['role']}')");
			return true;
		}

		return false;
	}

	public function get_admin_data($username){
		$query=$this->db->query("SELECT password FROM admin WHERE username='{$username}'");
		return $query->result();
	}
}