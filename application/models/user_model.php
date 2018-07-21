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


    public function add_company()
    {
        $company=array(
        'user_id' =>$this->session->userdata('u_id'),
        'ar_name' => $this->input->post('ar_com_name'),
        'en_name' => $this->input->post('en_com_name'),
        'description' => $this->input->post('com_desc'),
        'prof_field' => $this->input->post('com_field'),
        'foundation_year' => $this->input->post('com_year'),
        'owner' => $this->input->post('com_owner'),
        'country' => $this->input->post('com_country'),
        'city' => $this->input->post('com_city'),
        'address' => $this->input->post('com_address'),
        'phone' => $this->input->post('com_phone'),
        'email' => $this->input->post('com_email'),
        'website' => $this->input->post('com_website'),
        );
        $this->db->insert('company',$company);
    }

    public function get_company($company_id)
    {
        $this->db->select('en_name');
        $this->db->where('user_id',$company_id);
        $query = $this->db->get('company');
        return  $query->row();
    }

    public function get_company_profile($company_id)
    {
        $this->db->select('*');
        $this->db->where('user_id',$company_id);
        $query = $this->db->get('company');
        return  $query->result_array();
    }
}