<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Newlogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('form_validation');
        $this->load->model('doctor_model');
    }

    public function loginpage()
    {
        $this->load->view('login');
    }
    // function sa total admin
    public function adminpage()
{
    if ($this->session->userdata('hms_logged_in') !== TRUE) {
        redirect('newlogin/loginpage');
    }
    

    $totalA = $this->login_model->totalAdmin()->row()->total_admin;
    $totalD = $this->login_model->totalDoctors()->row()->total_doctor;
    $data['queryAdmin'] = $totalA;
    $data['queryDoctor'] = $totalD;


    $this->load->view('admin', $data);
}

    // dashboard button
    public function dashboard()
    {
        // Check if the user is logged in
        if ($this->session->userdata('hms_logged_in') !== TRUE) {
            // If not logged in, redirect to login page
            redirect('newlogin/loginpage');
        }

        // If logged in, proceed to load dashboard
        $this->load->view('header');
        $this->load->view('admin');
        $this->load->view('footer');
    }


    // //function para sa pag display sa all admin sa view
    // public function getNewAdmins()
    // {
    //     if ($this->session->userdata('hms_logged_in') !== TRUE) {
    //         // If not logged in, redirect to login page
    //         redirect('newlogin/loginpage');
    //     }

    //     $this->load->view('header');
    //     $newAdmins = $this->login_model->newAdmins()->result_array();     // Get new admins from the model
    //     $data['newAdmins'] = $newAdmins;                                 // Pass the new admins data to the view
    //     $this->load->view('admindash', $data);                           // Load the view and pass the data

    // }


    //function para edit ug admin
    public function editAdmin()
    {
        $editId = $this->input->post('editId');
        $editUsername = $this->input->post('editUsername');
        $editPassword = $this->input->post('editPassword');
        $editspecialization = $this->input->post('editspecialization');

        $data = array(
            'editId' => $editId,
            'editUsername' => $editUsername,
            'editPassword' => $editPassword,
            'editspecialization'         => $editspecialization
        );
        // $newAdmins = $this->login_model->newAdmins()->result_array();     // Get new admins from the model
        // $data['newAdmins'] = $newAdmins;
        $this->load->view('editadmin', $data);

    }


    // public function updateAdmin() {
    //     $newId = $this->input->post('newId');
    //     $newUsername = $this->input->post('newUsername');
    //     $newPassword = $this->input->post('newPassword');
    //     $this->login_model->updateAdmin($newId, $newUsername, $newPassword);
    //     redirect('newlogin/addAdmin');
    // }
    public function updateAdmin()
    {
        $newId = $this->input->post('newId');
        $newUsername = $this->input->post('newUsername');
        $newPassword = $this->input->post('newPassword');
        $newspecialization = $this->input->post('newspecialization');

        // Update admin in the model
        $updateResult = $this->login_model->updateAdmin($newId, $newUsername, $newPassword, $newspecialization);

        if ($updateResult) {
            // Return success response
            echo json_encode(['status' => 'success']);
        } else {
            // Return error response
            echo json_encode(['status' => 'error']);
        }
    }





    //function para mag add sa admin
// public function addAdminControllerMethod() {
//     $username = $this->input->post('username');
//     $password = $this->input->post('password');
//     $profile = $this->input->post('profile');

    //     // Validate input
//     if (!empty($username)) {
//         // Insert data into the database
//         $addAdminResult = $this->your_model_name->addAdmin($username, $password, $profile);

    //         // Check if the insertion was successful
//         if($addAdminResult) {
//             echo "Admin successfully added!";
//         } else {
//             echo "Error adding admin. Please try again.";
//         }
//     } else {
//         echo "Username cannot be empty!";
//     }
// }

    //function para mag add sa admin pero way labot ang picture
    public function addAdmin()
    {
        if ($this->session->userdata('hms_logged_in') !== TRUE) {
            // If not logged in, redirect to login page
            redirect('newlogin/loginpage');
        }

        // Kunin ang mga input mula sa form
        $this->load->view('header');
        $newAdmins = $this->login_model->newAdmins()->result_array();
        $doctors = $this->doctor_model->getDoctorsForAdmin();
        $data['newAdmins'] = array_merge($newAdmins, $doctors);
        $this->load->view('admindash', $data);
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $specialization = $this->input->post('specialization');

        // Tsekin kung mayroong laman ang username field
        if (!empty ($username)) {


            // $existing_username = $this->login_model->checkUsernameExists($username);
            // Tawagin ang function sa iyong model para magdagdag ng bagong admin
            $addAdminResult = $this->login_model->addAdmin($username, $password, $specialization);
            // Tignan kung ang pagdagdag ng admin ay matagumpay
            if ($addAdminResult) {
                // Return a success response for AJAX
                $response['status'] = 'success';
                $response['message'] = 'Admin successfully added.';
            } else {
                // Return an error response for AJAX
                $response['status'] = 'error';
                $response['message'] = 'Error adding admin. Please try again.';
            }

        }
        // else if($username == $this->login_model->checkUsernameExists($username) ){
        //     // echo json_encode(['status' => 'error']);
        //    echo "admin already exist";
        // }
        else if($username != $this->login_model->checkUsernameExists($username) ){
            // echo json_encode(['status' => 'error']);
           echo "admin added";
        }

    }


//funtion para search ug username
public function searchUsername()
{

    if ($this->session->userdata('hms_logged_in') !== TRUE) {
        // If not logged in, redirect to login page
        redirect('newlogin/loginpage');
    }

    $this->load->view('header');
    $searchUsername = $this->input->post('searchUsername');

    // Query sa iyong database upang hanapin ang eksaktong username
    $searchResult = $this->login_model->searchUsername($searchUsername);

    // I-return ang resulta sa iyong view
    // $data['searchResult'] = $result;
    // $this->load->view('admindash', $data);
    $this->load->view('admindash', ['searchResult' => $searchResult]);
    
}








    
    //function controller para delete ug admin
    // public function deleteAdminControllerMethod()
    // {
    //     if ($this->session->userdata('hms_logged_in') !== TRUE) {
    //         // If not logged in, redirect to login page
    //         redirect('newlogin/loginpage');
    //     }

    //     // $this->load->view('header');
    //     // $newAdmins = $this->login_model->newAdmins()->result_array();     
    //     // $data['newAdmins'] = $newAdmins;  
    //     // $this->load->view('admindash', $data);
    //     // Kunin ang id ng admin na gusto mong burahin
    //     $adminId = $this->input->post('deleteId');
    //     // echo $adminId;

    //     // Tawagin ang function sa model para burahin ang admin
    //     $deleteAdminResult = $this->login_model->deleteAdmin($adminId);


    //     // Redirect o magpakita ng mensahe ng tagumpay;
    //     redirect('newlogin/addAdmin'); // Palitan ang 'admin_page' ng tamang URL kung saan mo gustong bumalik matapos burahin ang admin
    // }
    public function deleteAdminControllerMethod()
    {
        if ($this->session->userdata('hms_logged_in') !== TRUE) {
            // If not logged in, redirect to login page
            redirect('newlogin/loginpage');
        }

        $adminId = $this->input->post('deleteId');

        // Tignan kung may laman ang $adminId at tawagin ang function sa model para mag-delete
        if (!empty ($adminId)) {
            $deleteAdminResult = $this->login_model->deleteAdmin($adminId);
            if ($deleteAdminResult) {
                // Return success message
                echo json_encode(array('status' => 'success', 'message' => 'Admin successfully deleted.'));
            } else {
                // Return error message
                echo json_encode(array('status' => 'error', 'message' => 'Error deleting admin.'));
            }
        } else {
            // Return error message if adminId is empty
            echo json_encode(array('status' => 'error', 'message' => 'Admin ID cannot be empty.'));
        }
    }











    //logout
    // public function logout(){
    //     $user = array(
    //         'username'      =>  '',
    //         'password'      =>  '',
    //         'hms_logged_in' =>  TRUE
    //     );

    //     $this->session->set_userdata($user); 
    //     $this->load->view('header');
    // 	$this->load->view('home');
    // 	$this->load->view('footer');
    // }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['Admin']);
        redirect(base_url());
    }

    //login    
    // public function login()
    // {
    // 	$data = $this->input->post(null);
    //     if(!empty($data))
    //     {
    //         $login = $this->login_model->findUser($data['username'],$data['password']);
    //         if(!empty($login))
    //         {
    //             $user = array
    //             (
    //                 'username'      =>  $login->username,
    //                 'password'      =>  $login->password,
    //                 'hms_logged_in' =>  TRUE
    //             );
    //             $this->session->set_userdata($user); 
    //             $totalA = $this->login_model->totalAdmin()->row()->total_admin; 
    //             $data['queryAdmin'] = $totalA;           
    //             $this->load->view('admin',$data);
    //             $this->load->view('footer');   
    //         }else{
    //             echo "<script>alert('Invalid Username or Password')</script>";
    //             echo "<script>window.location.href = 'http://localhost/projectsample/index.php/newlogin/loginpage'; </script>";
    //              }
    //     }
    // }
    public function login()
    {
        $data = $this->input->post(null);
        if (!empty ($data)) {
            $login = $this->login_model->findUser($data['username'], $data['password']);
            if (!empty ($login)) {  
                $user = array(
                    'username' => $login->username,
                    'password' => $login->password,
                    'hms_logged_in' => TRUE
                );
                $this->session->set_userdata($user);
                $totalA = $this->login_model->totalAdmin()->row()->total_admin;
                $data['queryAdmin'] = $totalA;
                $this->load->view('admin', $data);

                $this->load->view('footer');
            } else {
                echo "<script>alert('Invalid Username or Password')</script>";
                echo "<script>window.location.href = 'http://localhost/projectsample/index.php/newlogin/loginpage'; </script>";
            }
        } else {
            // Check if the session status is 'invalid' or empty
            if ($this->session->userdata('status') == 'invalid' || empty ($this->session->userdata('status'))) {
                $this->session->set_userdata('status', 'invalid');

                // Unset the username session variable
                $this->session->unset_userdata('username');
            }
        }
    }











}
