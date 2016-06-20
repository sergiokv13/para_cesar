<?php
Class Note extends CI_Model
{
  public function __construct()
  {
    $this->load->model('task');
    $this->load->database();
  }


  public function get_note_by_id($note_id)
  {
    $query = $this->db->where('id',$note_id)->get('notes')->result_array();
    $note = array_values($query)[0]; 
    return $note;
  }

  public function create_note($note,$task_id)
  {
    $data = array(
       'note' => $note,
       'task_id' => $task_id
    );
    $this->db->insert('notes', $data);
    return $this->db->insert_id();
  }

  public function delete($note_id)
  {
    $this->db->where('id', $note_id);
    $this->db->delete('notes');
  }

  public function task($note_id)
  {
  	$note = $this->get_note_by_id($note_id);
  	$task_id = $note['task_id'];
  	$task = $this->task->get_task_by_id($task_id);
  	return $task;
  }

}
?>