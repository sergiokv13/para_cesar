<?php 
class Days extends CI_Controller 
{

 function __construct()
 {
  parent::__construct();
  $this->load->model('day');
  $this->load->model('task');
  $this->load->model('task_time');
  $this->load->model('user');
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $user = $this->user->get_user_by_id($session_data['id']);
     $data['rol'] = $user['rol'];
     $data['username'] = $session_data['username'];
     $data['current_day'] = $this->day->get_current_day();
     $data['finished_days'] = $this->day-> get_all_finished_days();
     $this->load->view('layouts/head', $data);
     $this->load->view('days/index', $data);
     $this->load->view('layouts/footer');
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function begin_day()
 {
  $this->day->create_day();
  $this->load->helper('url');
  redirect('/days');
 }

 function end_day()
 {
  $this->day->end_current_day();
  $this->load->helper('url');
  redirect('/days');
 }


 function deadline()
 {
  $this->day->deadline();
  $this->load->helper('url');
  redirect('/days');
 }

 function show()
 {
  if($this->session->userdata('logged_in'))
   {
    $this->load->helper("form");
    $this->load->library('form_validation');
     //sesiones
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['rol'] = $this->user->get_rol_by_id($session_data['id']);
     //variables
     $day_id = $this->uri->segment(3);
     $day = $this->day->get_day_by_id($day_id);
     $tasks = $this->day->tasks($day_id);
     $percentage_user_in_day = $this->day->get_percentage_by_user($day_id,$session_data['id']);
     $total_percentage = $this->day->get_percentage($day_id);

     foreach ($tasks as $t)
     {
        $n = $this->task->notes($t['id']);
        $notes[$t['id']] = $n;
        $sub = $this->task->sub_tasks($t['id']);
        $sub_tasks[$t['id']] = $sub;
        $users[$t['id']] = $this->task->user($t['id'])['username'];
        if ($t['start'])
        {
          $this->task->stop($t['id']);
          $this->task->start($t['id']);
        }
        $time = $this->task_time->get_time_worked_in_task($t['id']);
        $time_spent_in[$t['id']] = $time;
     }
     //data
     if ($data['rol']==1)
     {
        $data['tasks'] = $tasks;
     }
     else
     {
       $data['tasks'] = $this->task->get_tasks_by_day_and_user($day_id,$session_data['id']);
     }
     if(isset($sub_tasks))
     {
       $data['sub_tasks'] = $sub_tasks;
     }
     if(isset($notes))
     {
       $data['notes'] = $notes;
     }
     if(isset($users))
     {
       $data['users'] = $users;
     }
     if(isset($time_spent_in))
     {
      $data['time_spent_in'] = $time_spent_in;
     }
     $data['day'] = $day;
     $data['percentage'] = $percentage_user_in_day;
     $data['total_percentage'] = $total_percentage;
     $data['user_id'] = $session_data['id'];
     //muestreo
     $this->load->view('layouts/head', $data);
     if ($data['rol'] == 1)
     {
      $this->load->view('days/_tasks_show_admin.php', $data);
     }
     else
     {
      $this->load->view('days/_tasks_show_user.php', $data);
     }
     $this->load->view('layouts/footer');
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }
}

?>