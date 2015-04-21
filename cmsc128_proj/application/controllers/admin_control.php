<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_control extends CI_Controller {
    function __construct() {
        parent::__construct();
		$this->load->model('filtered_search_adviser_model', 'adviser_mdl', TRUE);
		$this->load->model('filtered_search_student_model', 'student_mdl', TRUE);
		$this->load->model('announcement_model', 'ann_mdl', TRUE);
		$this->load->model('admin_account_model', 'admin_acct_mdl', TRUE);
    }
	
	function index(){
		if(!$this->session->userdata('logged_in')) redirect('main_control', 'refresh');
		
		$session_data = $this->session->userdata('logged_in');
		
		//DATA
		$data['username'] = $session_data['username'];
		$data['role'] = $session_data['role'];
		$data['notifications'] = array("Notif 1", "Notif 2");
		
		$this->load->view($session_data['role'].'/'.$session_data['role'].'_logged_in_view', $data);
	}
	
	/*
	*	ANNOUNCEMENT related FUNCTIONS
	*/
	public function get_announcements()
	{
		$data['announcements'] = $this->ann_mdl->get_all();
		$this->load->view('admin/search_results_announcement', $data);
	}
	
	public function add_announcement()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[6]|max_length[20]|is_unique[announcement.title]');
		$this->form_validation->set_rules('details', 'Details', 'trim|required|min_length[6]|max_length[300]');
		$this->form_validation->set_rules('date', 'Date', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			redirect('Admin_control', 'refresh');
		}
		else
		{
			$this->ann_mdl->insert_entry(
						$this->input->post('date'),
						$this->input->post('title'),
						$this->input->post('details')
						);
			redirect('Admin_control', 'refresh');
		}
	}
	
	public function edit_announcement()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[6]|max_length[20]|callback_checkExist');
		$this->form_validation->set_rules('details', 'Details', 'trim|required|min_length[6]|max_length[300]');
		$this->form_validation->set_rules('date', 'Date', 'required');
		
		$this->form_validation->set_message('checkExist', "{field} already exist.");
		
		if ($this->form_validation->run() == FALSE)
		{
			redirect('Admin_control', 'refresh');
		}
		else
		{
			$this->ann_mdl->update_entry(
						$this->input->post('id'),
						$this->input->post('date'),
						$this->input->post('title'),
						$this->input->post('details')
						);
						
			redirect('Admin_control', 'refresh');
		}
	}
	
	function checkExist()
	{
		return $this->ann_mdl->checkExistExcept(
									$this->input->post('title'),
									$this->input->post('id')
									);
	}
	
	public function del_announcement()
	{	
		$this->ann_mdl->remove_entry(
						$this->input->post('id')
					);
		
		redirect('Admin_control', 'refresh');
	}
	
	/*
	*	ACCOUNT GENERATION related FUNCTIONS
	*/
	function generateUsername(){
		/*
		$data['username'] = filter_var($_POST['generate_username'], FILTER_SANITIZE_STRING);
		$data['passencrypted'] = md5($this->generateRandomString(20));
		$data['role'] = 'adviser';
		$result = $this->admin_acct_mdl->insert_admin($data);
		redirect('Admin_control', 'refresh');
		*/
	}
	
	function generateRandomString($length) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}			
		return $randomString;
	}
    
	/*
	*	STUDENT TAB related FUNCTIONS
	*/
	public function get_students()
	{
		$data['search_param'] = null;
		$data['students'] = $this->student_mdl->get_all();
		$this->load->view('admin/search_results_student', $data);
	}
	
	function search_student(){
		$srch_param = $this->input->post('srch_param');
		
		$data['search_param'] = $srch_param;
		$data['students'] = $this->student_mdl->get_all();
		$this->load->view('admin/search_results_student', $data);
	}
	
	/*
	*	ADVISER TAB related FUNCTIONS
	*/
	public function get_advisers()
	{
		$data['search_param'] = null;
		$data['advisers'] = $this->adviser_mdl->get_all();
		$this->load->view('admin/search_results_adviser', $data);
	}
	
	function search_adviser(){
		$srch_param = $this->input->post('srch_param');
		
		$data['search_param'] = $srch_param;
		$data['advisers'] = $this->adviser_mdl->get_all();
		$this->load->view('admin/search_results_adviser', $data);
	}
	
}
/* End of file verify_login.php */
/* Location: ./application/controllers/verify_login.php */