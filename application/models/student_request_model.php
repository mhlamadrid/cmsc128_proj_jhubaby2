<?php

	class Student_request_model extends CI_model{
		function studentShowNotifs($stud_no){
			$query = $this->db->query("SELECT * FROM notification WHERE receiver_id = '$stud_no'");
			if ($query->num_rows() != 0) {
				$data['msgs'] = $query->result();
			}
			else{
				$data['msgs'] = NULL;
			}

			return $data;
		}

		function approveRequest($msg_id, $stud_no){
			$this->db->query("DELETE FROM notification WHERE notif_id = '$msg_id';");
			$query = $this->db->query("SELECT * FROM student WHERE stud_no = '$stud_no'");
			foreach ($query->result() as $row) {
				$contactNo = $row->contact_no;
				$studentName = $row->name;
			}

			#get emp_id of adviser
			$adviserQuery = $this->db->query("SELECT * FROM student_adviser WHERE stud_no = '$stud_no'");
			foreach ($adviserQuery->result() as $row) {
				$adviserId = $row->emp_id;
			}

			$query1 = $this->db->query(
				"INSERT INTO notification(
		        notif_id, notif_body, receiver_id, sender_id)
		    	VALUES (nextval('notification_notif_id_seq'::regclass), '$studentName contact information is $contactNo', '$adviserId', '$stud_no');"
			);

		}

		function rejectRequest($msg_id){
			$this->db->query("DELETE FROM notification WHERE notif_id = '$msg_id';");
		}
	}
?>