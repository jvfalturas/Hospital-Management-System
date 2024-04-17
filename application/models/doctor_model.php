<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doctor_model extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getDoctors()
    {
        $query = $this->db->get('doctor'); 
        return $query->result();  
    }
    public function getDoctorsForAdmin()
{
    $this->db->order_by('id', 'ASC');
    $query = $this->db->get('doctor');
    return $query->result_array();
}


    public function newAdmins()
    {
        $ad = $this->session->userdata('Admin');
        $queryNewAdmin = $this->db->query("SELECT * FROM admin WHERE username != '$ad' ORDER BY id ASC");
        return $queryNewAdmin;

    }
}