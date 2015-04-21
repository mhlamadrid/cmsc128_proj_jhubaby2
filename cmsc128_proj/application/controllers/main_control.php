<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Main_control extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->model('login_model','login',TRUE);
		$this->load->model('announcement_model','announce_mdl', TRUE);
    }
 
    function index() {
		if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
			redirect($session_data['role'].'_control', 'refresh');
			
        } else {
        //If no session, redirect to login page
			$data['announcements'] = $this->announce_mdl->get_all();
            $this->load->view('login_view', $data);
        }
    }
	 
	function login(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
        if($this->form_validation->run() == FALSE) {
			$data['announcements'] = $this->announce_mdl->get_all();
            $this->load->view('login_view', $data);
        } else {
            //Go to private area
			$session_data = $this->session->userdata('logged_in');
			redirect($session_data['role'].'_control', 'refresh');
        }
	}
 
    function check_database($password) {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');
        //query the database
        $result = $this->login->login($username, $password);
		if($result) {
			$sess_array = array();
			foreach($result as $row) {
				//create the session
				$sess_array = array('username' => $row->username, 'role' => $row->role);
				//set session with value from database
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		} else {
			//if form validate false
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return FALSE;
		}
	}
	
	function logout() {
        //remove all session data
		if($this->session->userdata('logged_in')) {
			$this->session->unset_userdata('logged_in');
			$this->session->sess_destroy();
		}
		redirect('main_control', 'refresh');
		//$this->refresh_page();
	}
	  
	function refresh_page() {  
		redirect('a_123456789', 'refresh');		  	  
	}
}
/* End of file verify_login.php */
/* Location: ./application/controllers/verify_login.php */