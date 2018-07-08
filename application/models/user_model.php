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
                            'u_id'=>$value->u_id,
                            'username' => $username,
                            'email'=>$value->Email,
                            'type'=>$value->type
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

    /*public function add_seeker()
    {
        $data=array('seeker_id'=>null);
        $this->db->insert('seeker',$data);
        return $this->db->insert_id();
    }

    public function add_company()
    {
        $data=array('company_id'=>null);
        $this->db->insert('company',$data);
        return $this->db->insert_id();
    }*/
}