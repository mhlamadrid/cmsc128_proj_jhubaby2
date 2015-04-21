<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Adviser_request_model extends CI_model{

		public function checkMessage($adviser_id){

			$check_query =  $this->db->query("SELECT * FROM student_adviser WHERE emp_id = '$adviser_id';");
			foreach ($check->query() as $row) {
				if($check->has_contact){
					return true;
				}else return false;
			}
			//check in table student_adviser if column has_contact is set to true
			//if true = show student contact info
			//it false = show button for request
		}
		
		public function requestInfo($adviser_id, $student_no){
			// $query = $this->db->query("SELECT * FROM adviser WHERE emp_id = '$adviser_id';");
			// foreach ($query->result() as $row) {
			// 	$adviserId = $row->emp_id;
			// }
			//return $adviserId;
			// $query1 = $this->db->query("SELECT * FROM student_adviser WHERE adviser_id = '$adviserId';");
			// $studentId = $query1->result();
			// foreach ($query1->result() as $row) {
			// 	$studentId = $row->stud_no;
			// }
			//return $studentId;
			$query2 = $this->db->query(
				"INSERT INTO notification(
		        notif_id, notif_body, receiver_id, sender_id)
		    	VALUES (nextval('notification_notif_id_seq'::regclass), 'Your adviser request for your contact info', '$student_no', '$adviser_id');"
			);
			
			return null;
		}//requestInfo();

		public function adviserShowNotifs($adviser_id){

			$query = $this->db->query("SELECT * FROM notification WHERE receiver_id = '$adviser_id'");
			if ($query->num_rows() != 0) {
				$data['msgs'] = $query->result();
			}
			else{
				$data['msgs'] = NULL;
			}

			return $data;
		}
	}
?>