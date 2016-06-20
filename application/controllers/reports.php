<?php
class Reports extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
		$this->load->model('day');
		$this->load->model('task');
	}
	
	public function index()
	{
		if($this->session->userdata('logged_in'))
   		{
   			$session_data = $this->session->userdata('logged_in');
		    $user = $this->user->get_user_by_id($session_data['id']);
		    $data['username'] = $session_data['username'];
		    $data['user_id'] = $session_data['id'];
		    $data['finished_days'] = $this->day->get_all_finished_days();
		   	$data['worked_days'] = $this->user->get_all_worked_days($data['user_id']);
		    $this->load->view('layouts/head', $data);
		    if ($user['rol']==1)
		    	$this->load->view('reports/index', $data);
			else
				$this->load->view('reports/index_user', $data);
		    $this->load->view('layouts/footer');
		    $this->load->view('layouts/footer');
   		}
   		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}

	public function profile()
	{
		if($this->session->userdata('logged_in'))
   		{
   			$session_data = $this->session->userdata('logged_in');
		    $user = $this->user->get_user_by_id($session_data['id']);
		    $data['rol'] = $user['rol'];
		    $data['username'] = $session_data['username'];
   			$day_id = $this->uri->segment(3);
   			$day = $this->day->get_day_by_id($day_id);
   			$data['day'] = $day;
   			$data['users'] = $this->day->get_users_that_work_in_day($day_id);
   			$this->load->view('layouts/head', $data);
		    $this->load->view('reports/report_profile', $data);
		    $this->load->view('layouts/footer');
   		}
   		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}


	public function report()
	{
		 if($this->session->userdata('logged_in'))
   		{
		    $session_data = $this->session->userdata('logged_in');
		    $user = $this->user->get_user_by_id($session_data['id']);
		    $data['rol'] = $user['rol'];
		    $data['username'] = $session_data['username'];
			$day_id = $this->uri->segment(3);
			$user_id = $this->uri->segment(4);
			$user = $this->user->get_user_by_id($user_id);
			$day = $this->day->get_day_by_id($day_id);
			$data['user'] = $user;
			$data['day'] = $day;
			$data['percentage'] = $this->day->get_percentage_by_user($day_id,$user_id);
			$tasks = $this->task->get_tasks_by_day_and_user($day_id,$user_id);
			$data['tasks'] = $tasks;
			foreach ($tasks as $t)
		     {
		        $n = $this->task->notes($t['id']);
		        $notes[$t['id']] = $n;
		        $sub = $this->task->sub_tasks($t['id']);
		        $sub_tasks[$t['id']] = $sub;
		        $time = $this->task_time->get_time_worked_in_task($t['id']);
        		$time_spent_in[$t['id']] = $time;
		     }
		   	

		    if(isset($sub_tasks))
     		{
       			$data['sub_tasks'] = $sub_tasks;
     		}
		    if(isset($notes))
		    {
		        $data['notes'] = $notes;
		    }
     		if(isset($time_spent_in))
     		{
      		$data['time_spent_in'] = $time_spent_in;
     		}
		    if(isset($time_spent_in))
		    {
		    	$data['time_spent_in'] = $time_spent_in;
		    }
			$this->load->view('layouts/bootsrap');
		    $this->load->view('reports/report', $data);
		 }
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
}
?>









