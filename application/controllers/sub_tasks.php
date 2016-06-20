<?php
class Sub_tasks extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sub_task');
	}
	
	
	public function create()
	{
		//cargas
	 	$this->load->helper("url");
	 	$this->load->helper("form");
	    $this->load->library('form_validation');
		//sesion
		$session_data = $this->session->userdata('logged_in');
		//variables
		$name = $this->input->post('newNameTextBox');
		$this->form_validation->set_rules('newNameTextBox', 'SubTaskName', 'required');
		$task_id = $this->uri->segment(3);
		$day = $this->task->day($task_id);
		//muestreo
		$this->load->helper('url');
		if($this->form_validation->run() == FALSE)
		{
			 redirect('/days/show/'.$day['id']);
		}
		else
		{
			//operaciones
			$sub_task_id = $this->sub_task->create_sub_task($name,$task_id);
			redirect('/days/show/'.$day['id']);
		}
	}


	public function finish()
	{
		//variables
		$sub_task_id = $this->uri->segment(3);
		$task = $this->sub_task->task($sub_task_id);
		$day = $this->task->day($task['id']);
		//operaciones
		$this->sub_task->finish($sub_task_id);
		//muestreo
		$this->load->helper('url');
		redirect('/days/show/'.$day['id']);
	}

}
?>









