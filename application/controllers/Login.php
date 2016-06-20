<?php
	class Login extends CI_Controller 
{
	 
	 function __construct()
	 {
	    parent::__construct();
   		$this->load->model('user','',TRUE);
	 }
	 
	 function index()
	 {
	   $this->load->helper(array('form'));
	   $this->load->view('layouts/head');
	   $this->load->view('login/login_view');
	   $this->load->view('layouts/footer');
	 }


	 function verify_login()
	 {
	   //This method will have the credentials validation
	   $this->load->library('form_validation');

	   $this->form_validation->set_rules('username', 'Username', 'trim|required');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

	   if($this->form_validation->run() == FALSE)
	   {
	   	 $this->load->view('layouts/head');
	     $this->load->view('login/login_view');
	     $this->load->view('layouts/footer');
	   }
	   else
	   {
	     //Go to private area
	     redirect('/');
	   }

	 }

	 function check_database($password)
	 {
	   //Field validation succeeded.  Validate against database
	   $username = $this->input->post('username');

	   //query the database
	   $result = $this->user->login($username, $password);

	   if($result)
	   {
	     $sess_array = array();
	     foreach($result as $row)
	     {
	       $sess_array = array(
	         'id' => $row->id,
	         'username' => $row->username
	       );
	       $this->session->set_userdata('logged_in', $sess_array);
	     }
	     return TRUE;
	   }
	   else
	   {
	     $this->form_validation->set_message('check_database', 'Invalid username or password or disabled account.');
	     return false;
	   }
	 }
	 
}
 
?>