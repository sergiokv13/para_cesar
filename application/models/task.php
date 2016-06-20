<?php
Class Task extends CI_Model
{
  public function __construct()
  {
    $this->load->model('day');
    $this->load->model('task_time');
    $this->load->database();
  }

  public function create_task($name,$day_id,$user_id)
  {
    $data = array(
       'name' => $name,
       'day_id' => $day_id,
       'user_id' => $user_id,
       'finished' => 0,
       'percentage' => 0,
       'start' => 0
    );
    $this->db->insert('tasks', $data);
    return $this->db->insert_id();
  }

  public function get_task_by_id($task_id)
  {
    $query = $this->db->where('id',$task_id)->get('tasks')->result_array();
    $task = array_values($query)[0]; 
    return $task;
  }

  public function get_tasks_by_day_and_user($day_id,$user_id)
  {
    $query = $this->db->where('day_id',$day_id)->where('user_id',$user_id)->get('tasks');
    return $query->result_array();
  }

    public function get_tasks_by_user($user_id)
  {
    $query = $this->db->where('user_id',$user_id)->get('tasks');
    return $query->result_array();
  }

  public function day($task_id)
  {
    $day_id = $this->get_task_by_id($task_id)['day_id'];
    $query = $this->db->where('id',$day_id)->get('days')->result_array();
    $day = array_values($query)[0]; 
    return $day;
  }

  public function user($task_id)
  {
    $user_id = $this->get_task_by_id($task_id)['user_id'];
    $query = $this->db->where('id',$user_id)->get('users')->result_array();
    $user = array_values($query)[0]; 
    return $user;
  }

  public function sub_tasks($task_id)
  {
    $query = $this->db->where('task_id',$task_id)->get('sub_tasks')->result_array(); 
    return $query;
  }

  public function notes($task_id)
  {
    $query = $this->db->where('task_id',$task_id)->get('notes')->result_array(); 
    return $query;
  }

  public function delete($task_id)
  {
    $this->db->where('id', $task_id);
    $this->db->delete('tasks');
    $this->db->where('task_id', $task_id);
    $this->db->delete('sub_tasks');
    $this->db->where('task_id', $task_id);
    $this->db->delete('notes');
    $this->db->where('task_id', $task_id);
    $this->db->delete('task_times');
  }



  public function unfinish($task_id)
  {
    $task = $this->get_task_by_id($task_id);
    if ($task['finished'])
    {
      $attributes=array(
        'finished'=> 0
      );
      $this->db->where('id',$task_id)->update('tasks',$attributes);
    }
  }

  public function set_percentage($task_id)
  {
    $sub_tasks = $this->sub_tasks($task_id);
    $number_of_sub_tasks = 0;
    $number_of_finished_sub_tasks = 0;
    foreach ($sub_tasks as $sub_task)
    {
      $number_of_sub_tasks += 1;
      if ($sub_task['finished']==1)
      {
        $number_of_finished_sub_tasks+=1;
      }
    }
    if ($number_of_sub_tasks!=0)
    {
      $percentage = ($number_of_finished_sub_tasks/$number_of_sub_tasks)*100;
    }
    else
    {
      $percentage = 0;
    }
    $attributes=array(
      'percentage'=> $percentage
    );
    $this->db->where('id',$task_id)->update('tasks',$attributes);
    if ($percentage == 100)
      $this->finish($task_id);
    if ($percentage != 100)
      $this->unfinish($task_id);
  }

  public function finish($task_id)
  {
    $attributes=array(
      'finished'=> 1
    );
    $this->db->where('id',$task_id)->update('tasks',$attributes);
    $this->stop($task_id);
  }

  public function start($task_id)
  {
    $attributes=array(
      'start'=> 1
    );
    $this->db->where('id',$task_id)->update('tasks',$attributes);
    $this->task_time->create_task_time($task_id,1);
  }

  public function stop($task_id)
  {
    $attributes=array(
      'start'=> 0
    );
    $this->db->where('id',$task_id)->update('tasks',$attributes);
    $this->task_time->create_task_time($task_id,0);
  }
}
?>