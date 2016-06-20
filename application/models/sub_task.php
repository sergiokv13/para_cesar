<?php
Class Sub_task extends CI_Model
{
  public function __construct()
  {
    $this->load->model('task');
    $this->load->database();
  }

  public function create_sub_task($name,$task_id)
  {
    $data = array(
       'name' => $name,
       'task_id' => $task_id,
       'finished' => 0
    );
    $this->db->insert('sub_tasks', $data);
    $this->task->set_percentage($task_id);
    return $this->db->insert_id();
  }

  public function get_sub_task_by_id($sub_task_id)
  {
    $query = $this->db->where('id',$sub_task_id)->get('sub_tasks')->result_array();
    $sub_task = array_values($query)[0]; 
    return $sub_task;
  }


  public function task($sub_task_id)
  {
    $sub_task = $this->get_sub_task_by_id($sub_task_id);
    $task_id = $sub_task['task_id'];
    return $this->task->get_task_by_id($task_id);
  }

  public function delete($sub_task_id)
  {
    $sub_task = $this->get_sub_task_by_id($sub_task_id);
    $this->db->where('id', $sub_task_id);
    $this->db->delete('sub_tasks');
    $this->task->set_percentage($sub_task['task_id']);
  }

  public function finish($sub_task_id)
  {
    $sub_task = $this->get_sub_task_by_id($sub_task_id);
    $attributes=array(
      'finished'=> 1
    );
    $this->db->where('id',$sub_task_id)->update('sub_tasks',$attributes);
    $this->task->set_percentage($sub_task['task_id']);
  }

}
?>