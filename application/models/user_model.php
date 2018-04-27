<?php

class User_model extends CI_Model {
    
    public function get_user($username,$password)
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

    public function add_user($user)
    {
        $this->db->insert('user',$user);
    }
}