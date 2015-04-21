<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Student_control extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('student_request_model');
        $this->load->helper(array('url', 'array'));
    }
	
	function index(){
		if(!$this->session->userdata('logged_in')) redirect('main_control', 'refresh');
		$this->view(null);

	}	

	function view($result){
		$session_data = $this->session->userdata('logged_in');
		
		//DATA
		$data['username'] = $session_data['username'];
		$data['role'] = $session_data['role'];
		$data['notifications'] = null;
		$data['result'] = $result;
		
		$this->load->view($session_data['role'].'/'.$session_data['role'].'_logged_in_view', $data);
	}

	/* Request Contact info approve/reject request */
    public function studentShowNotifs(){
    	$session_data = $this->session->userdata('logged_in');
		$this->view($this->student_request_model->studentShowNotifs($session_data['username']));
	}

	public function approveRequest(){
		$session_data = $this->session->userdata('logged_in');
		$this->view($this->student_request_model->approveRequest($this->input->post('msg_id'), $session_data['username']));
	}

	public function rejectRequest(){
		$this->view($this->student_request_model->rejectRequest($this->input->post('msg_id')));
	}
	// end of request contact info
    //
}
/* End of file verify_login.php */
/* Location: ./application/controllers/verify_login.php */