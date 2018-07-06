<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {
    
    public function AddCompany()
    {
    	$this->data['pageTitle']='Add Company';
        $this->data['subview'] = 'company_form';
        $this->load->view('layouts/layout', $this->data);
    }

    public function AddAnnouncement()
    {
    	$this->data['pageTitle']='Add Announcement';
        $this->data['subview'] = 'announcement_form';
        $this->load->view('layouts/layout', $this->data);
    }

    public function AnnouncementInfo()
    {
        $job_title = $this->input->post('job_title');
        $employment_type = $this->input->post('employment_type');
        $working_hours = $this->input->post('working_hours');
        $hours_per = $this->input->post('hours_per');
        $salary = $this->input->post('salary');
        $salary_per = $this->input->post('salary_per');
        $skill_name = $this->input->post('skill_name');
        $year_exp = $this->input->post('year_exp');
        $characteristic = $this->input->post('characteristic');
        $characteristic_degree = $this->input->post('characteristic_degree');
    }

}

