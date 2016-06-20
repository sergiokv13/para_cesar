<?php
class Tasks extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('task');
	}
	
	
	public function create()
	{
		//cargas
	 	$this->load->helper("url");
	 	$this->load->helper("form");
	    $this->load->library('form_validation');
		$session_data = $this->session->userdata('logged_in');
		$name = $this->input->post('newNameTextBox');
		$this->form_validation->set_rules('newNameTextBox', 'Task Name', 'required');
		$day_id = $this->uri->segment(3);
		$user_id = $session_data['id'];
		
		$this->load->helper('url');
		if($this->form_validation->run() == FALSE)
		{
			
		    redirect('/days/show/'.$day_id);
		    
		}
		else
		{
			$this->task->create_task($name,$day_id,$user_id);
			redirect('/days/show/'.$day_id);
		}
	}

	public function delete()
	{
		//variables
		$task_id = $this->uri->segment(3);
		$day = $this->task->day($task_id);
		//operaciones
		$this->task->delete($task_id);
		//muestreo
		$this->load->helper('url');
		redirect('/days/show/'.$day['id']);
	}

	public function start()
	{
		$task_id = $this->uri->segment(3);
		$day = $this->task->day($task_id);
		$this->task->start($task_id);
		$user = $this->task->user($task_id);
		$tasks = $this->task->get_tasks_by_day_and_user($day['id'],$user['id']);
		foreach ($tasks as $task)
		{
			if ($task['start'] && $task['id']!=$task_id)
			{
				$this->task->stop($task['id']);
			}
		}
		redirect('/days/show/'.$day['id']);
	}

	public function stop()
	{
		$task_id = $this->uri->segment(3);
		$day = $this->task->day($task_id);
		$this->task->stop($task_id);
		redirect('/days/show/'.$day['id']);
	}
}
?>









