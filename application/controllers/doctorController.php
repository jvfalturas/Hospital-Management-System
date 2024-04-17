<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class DoctorController extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct ();
        $this->load->model('login_model');
        $this->load->model('doctor_model');
    }

    public function dashboard()
    {

        if ($this->session->userdata('hms_logged_in') !== TRUE) {
            // If not logged in, redirect to login page
            redirect('newlogin/loginpage');
        }

        $this->load->view('header');
        
        $doctor = $this->doctor_model->getDoctors();
        $data['doctors'] = $doctor;
        $this->load->view('doctor/dashboard', $data);
       
    }

    public function docprofile()
    {
        if ($this->session->userdata('hms_logged_in') !== TRUE) {
            // If not logged in, redirect to login page
            redirect('newlogin/loginpage');
        }

        $this->load->view('header');


        $viewfname = $this->input->post('viewfname');
        $lname = $this->input->post('lname');
        $mname = $this->input->post('mname');
        $bday = $this->input->post('bday');
        $gender = $this->input->post('gender');
        $cstatus = $this->input->post('cstatus');
        $religion = $this->input->post('religion');
        $contact = $this->input->post('contact');
        $email = $this->input->post('email');
        $weight = $this->input->post('weight');
        $height = $this->input->post('height');
        $course = $this->input->post('course');
        $specialization = $this->input->post('specialization');
        $username = $this->input->post('username');

        $data = array(
            'viewfname' => $viewfname,
            'lname'     => $lname,
            'mname'     => $mname,
            'bday'      => $bday,
            'gender'    => $gender,
            'cstatus'   => $cstatus,
            'religion'  => $religion,
            'contact'   => $contact,
            'email'     => $email,
            'weight'    => $weight,
            'height'    => $height,
            'course'    => $course,
            'specialization' => $specialization,
            'username'  => $username

        );
        $this->load->view('doctor/docprofile', $data);
    }

    
}