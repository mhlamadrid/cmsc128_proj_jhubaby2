<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class Filtered_search_student_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
    }
	/*
	* FUNCTIONS FOR SEARCHING STUDENTS
	* sorted alphabetically
	*/
	public function get_all()
	{
		$query = $this->db->get('student');
		return $query->result();
	}
	
	public function get_by_name($stud_name)
	{
		return null;
	}
	
	public function get_by_adviser($adviser_id)
	{

	}
	
	public function get_by_adviser_by_name($adviser_id, $stud_name)
	{

	}
	
	public function get_registered_by_adviser($adviser_id)
	{
		return null;
	}
	
	public function get_graduated_by_adviser_by_year($adviser_id, $year)
	{
		return null;
	}
	
	public function get_previous_by_adviser($adviser_id)
	{

	}
	
	public function get_dismissed_by_adviser($adviser_id)
	{

	}
	
}
  
/* End of file admin_login_model.php */
/* Location: ./application/models/admin_login_model.php */