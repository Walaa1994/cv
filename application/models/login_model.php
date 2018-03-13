<?php

class Login_model extends CI_Model {
	public function can_login($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('user');
		if($query->num_rows() > 0){
			// stroge the seesion
			foreach ($query->result() as $value) {
			$session_data = array(
					'username' => $username
					
					);

				$this->session->set_userdata($session_data);
			}
			return true;
		}else{

			return false;
		}
		
	    
	
	
	
	}
}