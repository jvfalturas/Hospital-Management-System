<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Login_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function findUser($username, $password)
    {
        $query = $this->db->query("SELECT * FROM admin WHERE username ='$username' AND password='$password'")->row();
        return $query;
    }

    // funtion para sa total admin
    public function totalAdmin()
    {
        $queryAdmin = $this->db->query("SELECT COUNT(*) as total_admin FROM admin");
        return $queryAdmin;
    }


    //function para sa total doctors
    public function totalDoctors()
    {
        $queryDoctor = $this->db->query("SELECT COUNT(*) as total_doctor FROM doctor");
        return $queryDoctor;
    }

    // function para mag show sa uban admin   
    public function newAdmins()
    {
        $ad = $this->session->userdata('Admin');
        $queryNewAdmin = $this->db->query("SELECT * FROM admin WHERE username != '$ad' ORDER BY id ASC");
        return $queryNewAdmin;

    }

    //function para mag insert ug new admin

    // naay profile pic apil
    // public function addAdmin($username, $password, $profile) {
    //     $data = array(
    //         'username' => $username,
    //         'password' => $password,
    //         'profile' => $profile
    //     );

    //     return $this->db->insert('admin', $data);
    // }
    public function addAdmin($username, $password, $specialization)
    {
  
        $data = array(
            'username' => $username,
            'password' => $password,
            'specialization'=> $specialization
        );

        $add = $this->db->insert('admin', $data);
        return $add;
    
    }

    //function para mag check if nag exist naba na sya nga account sa admin nga table
    public function checkUsernameExists($username)
    {
        $existing_username = $this->db->get_where('admin', array('username' => $username))->row();
        return $existing_username;
    }
    

    //funtion para mag delete ug admin
    public function deleteAdmin($deleteId)
    {
        $this->db->where('id', $deleteId);
        $this->db->delete('admin');

        $this->db->where('id', $deleteId);
        $this->db->delete('doctor');
    }

    // function para mag update ug admin
    public function updateAdmin($newId, $newUsername, $newPassword, $newspecialization) {
        // Dito mo ilalagay ang logic para mag-update ng record sa iyong database
        // Halimbawa:
        $data = array(
            'username' => $newUsername,
            'password' => $newPassword,
            'specialization'=> $newspecialization
        );

        $this->db->where('id', $newId);
        $this->db->update('admin', $data);

        $this->db->where('id', $newId);
        $this->db->update('doctor', $data);
    }
    
 

    //search sa username
    public function searchUsername($searchUsername)
{
    $this->db->where('username', $searchUsername);
    $this->db->or_where('id', $searchUsername);
    $query = $this->db->get('admin');

    $this->db->where('username', $searchUsername);
    $this->db->or_where('id', $searchUsername);
    $query = $this->db->get('doctor');

    return $query->result_array(); // Maaring gamitin mo ang row_array depende sa iyong kailangan
}





}






