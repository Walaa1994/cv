<?php

class Register_model extends CI_Model {
	public function add_user($user)
	{
		$this->db->insert('user',$user);
		
	    
	
	
	
	}
}