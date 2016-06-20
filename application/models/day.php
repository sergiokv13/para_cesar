<?php
Class Day extends CI_Model
{
  public function __construct()
  {
     $this->load->model('task');
    $this->load->database();
  }

  public function create_day()
  {
    $data = array(
       'date' => date("Y/m/d"),
       'finished' => 0,
       'deadline' => 0
    );
    $this->db->insert('days', $data);
    return $this->db->insert_id();
  }

  public function get_day_by_id($day_id)
  {
    if ($day_id!=0)
    {
      $predata = $this->db->where('id',$day_id)->get('days')->result_array();
      $data = array_values($predata)[0]; 
          return $data;
    }
  }

  public function get_current_day()
  {
    $last_day_id = $this->db->count_all('days');
    $last_day = $this->get_day_by_id($last_day_id);
    if(!$last_day['finished'])
      return $last_day;
  }

  public function get_all_finished_days()
  {
    $query = $this->db->where('finished',1)->get('days');
    return $query->result_array();
  }

  public function end_current_day()
  {
    $day_id = $this->get_current_day()['id'];
    $attributes=array(
    'finished'=> 1,
    'deadline'=> 0
    );
    return $this->db->where('id',$day_id)->update('days',$attributes);
  }

  public function deadline()
  {
    $day_id = $this->get_current_day()['id'];
    $attributes=array(
    'deadline'=> 1
    );
    return $this->db->where('id',$day_id)->update('days',$attributes);
  }

  public function tasks($day_id) {
    $data = $this->db->where('day_id',$day_id)->get('tasks')->result_array(); 
        return $data;
  }

  public function get_percentage_by_user($day_id,$user_id)
  {
    $tasks = $this->task->get_tasks_by_day_and_user($day_id,$user_id);
    $number_of_tasks = 0;
    $number_of_finished_tasks = 0;
    foreach ($tasks as $task)
    {
      $number_of_tasks +=1;
      if ($task['finished'])
        $number_of_finished_tasks +=1;
    }
    if ($number_of_tasks!=0)
      return ($number_of_finished_tasks/$number_of_tasks)*100;
    else
      return 0;
  }

  public function get_percentage($day_id)
  {
    $tasks = $this->tasks($day_id);
    $number_of_tasks = 0;
    $number_of_finished_tasks = 0;
    foreach ($tasks as $task)
    {
      $number_of_tasks +=1;
      if ($task['finished'])
        $number_of_finished_tasks +=1;
    }
    if ($number_of_tasks!=0)
      return ($number_of_finished_tasks/$number_of_tasks)*100;
    else
      return 0;
  }

  public function get_users_that_work_in_day($day_id)
  {
    $tasks = $this->tasks($day_id);
    $users = array();
    foreach ($tasks as $task)
    {
      $flag = false;
      foreach ($users as $user)
      {
        if ($user['id'] == $task['user_id'])
          $flag = true;
      }
      if (!$flag)
        array_push($users,$this->task->user($task['id']));
    }
    return $users;
  }

}
?>