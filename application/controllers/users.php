<?php
	class users extends CI_Controller 
{
	 
	function __construct()
	 {
	   parent::__construct();
	   $this->load->model('user');
	 }
		 
	 function index()
	 {
	   if($this->session->userdata('logged_in'))
	   {
	     $session_data = $this->session->userdata('logged_in');
	     $data['username'] = $session_data['username'];
	     $data['users'] = $this->user->get_users();
	     $user = $this->user->get_user_by_id($session_data['id']);
	     $this->load->view('layouts/head', $data);
	     if ($user['rol'] != 1 )
	     	$this->load->view('users/for_current_user', $data);
	     else
	     	$this->load->view('users/index', $data);
	     $this->load->view('layouts/footer');
	   }
	   else
	   {
	     //If no session, redirect to login page
	     redirect('login', 'refresh');
	   }
	 }

	 function activate_account()
	 {
	 	$this->load->helper("url");
	 	if($this->session->userdata('logged_in'))
	   {
	   		$user_id = $this->uri->segment(3);
	   		$this->user->activate_account($user_id);
	   		redirect('/users');
	   }
	   else
	   {
	     //If no session, redirect to login page
	     redirect('login', 'refresh');
	   }
	 }

	 function disable_account()
	 {
	 	$this->load->helper("url");
	   if($this->session->userdata('logged_in'))
	   {
	   		$user_id = $this->uri->segment(3);
	   		$user = $this->user->disable_account($user_id);
	   		redirect('/users');
	   }
	   else
	   {
	     //If no session, redirect to login page
	     redirect('login', 'refresh');
	   }
	 }

	 function profile()
	 {
	 	if($this->session->userdata('logged_in'))
	   {
	     $session_data = $this->session->userdata('logged_in');
	     $data['username'] = $session_data['username'];
	     $userId = $this->uri->segment(3);
	     $data['user'] = $this->user->get_user($userId);
	     $this->load->view('layouts/head', $data);
	     $this->load->view('users/profile', $data);
	     $this->load->view('layouts/footer');
	   }
	   else
	   {
	     //If no session, redirect to login page
	     redirect('login', 'refresh');
	   }
	 }

	 function new()
	 {
	 	//cargas
	 	$this->load->helper("form");
	    $this->load->library('form_validation');
	 	if($this->session->userdata('logged_in'))
	   {
	   	 //sesiones
	     $session_data = $this->session->userdata('logged_in');
	     $data['username'] = $session_data['username'];
	     $user = $this->user->get_user_by_id($session_data['id']);
	     //muestreo
	     $this->load->view('layouts/head', $data);
	     if ($user['rol'] != 1 )
	     	$this->load->view('users/for_current_user', $data);
	     else
	     	$this->load->view('users/new', $data);
	     $this->load->view('layouts/footer');
	   }
	   else
	   {
	     //If no session, redirect to login page
	     redirect('login', 'refresh');
	   }
	 }

	 function create()
	 {
	 	//cargas
	 	$this->load->helper("url");
	 	$this->load->helper("form");
	    $this->load->library('form_validation');
	 	//validaciones
	 	$this->form_validation->set_rules('usernameTextBox','Username','required|min_length[5]|max_length[12]');
	 	$this->form_validation->set_rules('passwordTextBox', 'Password', 'required|min_length[5]|max_length[12]');
	 	$this->form_validation->set_rules('lastnameTextBox', 'Lastname', 'required|min_length[5]|max_length[12]');
	 	$this->form_validation->set_rules('nameTextBox', 'Name', 'required|min_length[5]|max_length[12]');
		//muestreo
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('layouts/head');
	     	$this->load->view('users/new');
	     	$this->load->view('layouts/footer');
	    }
	    else
	    {
	    	//post data
		 	$session_data = $this->session->userdata('logged_in');
			$username = $this->input->post('usernameTextBox');
			$password = $this->input->post('passwordTextBox');
			$lastname = $this->input->post('lastnameTextBox');
			$name = $this->input->post('nameTextBox');
			$rol = $this->input->post('rolSelectTag');
			//operacion
			$this->user->create_user($username,$name,$lastname,$rol,$password);
	    	redirect('/users');
	    }

	 }

	 function edit()
	 {
	 	//cargas
	 	$this->load->helper("url");
	 	$this->load->helper("form");
	    $this->load->library('form_validation');
	 	if($this->session->userdata('logged_in'))
	    {
		   	 //sesiones
		     $session_data = $this->session->userdata('logged_in');
		     $data['username'] = $session_data['username'];
		     //muestreo
		     $this->load->view('layouts/head', $data);
		     $this->load->view('users/edit', $data);
		     $this->load->view('layouts/footer');
	    }
	   else
	   {
	     //If no session, redirect to login page
	     redirect('login', 'refresh');
	   }
	 }

	  function update()
	 {
	 	//cargas
	 	$this->load->helper("url");
	 	$this->load->helper("form");
	    $this->load->library('form_validation');
	    //Variables
	 	$session_data = $this->session->userdata('logged_in');
	    $user_id = $session_data['id'];
	    //posts
		$last_password = $this->input->post('LastPasswordTextBox');
		$new_password = $this->input->post('NewPasswordTextBox');
	 	//validaciones
	 	$this->form_validation->set_rules('LastPasswordTextBox', 'Last Password', 'required|callback_check_password');
	 	$this->form_validation->set_rules('NewPasswordTextBox', 'New Password', 'required');
	 	//data
	 	$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		if($this->form_validation->run() == FALSE)
		{
			 $this->load->view('layouts/head', $data);
		     $this->load->view('users/edit', $data);
		     $this->load->view('layouts/footer');
		}
		else
		{
			$this->user->update_user($user_id,$new_password);
			redirect('/');
		}
	 }

	 function check_password($password)
	 {
	 	$session_data = $this->session->userdata('logged_in');
	    $user_id = $session_data['id'];
	    if($this->user->check_password($user_id,$password))
	    	return true;
	    else
    	{
    		$this->form_validation->set_message('check_password', 'Password does not match');
	     	return false;
    	}

	 }
}
?>