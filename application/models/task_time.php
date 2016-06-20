<?php
Class Task_time extends CI_Model
{
  public function __construct()
  {
    $this->load->model('task');
    $this->load->database();
  }

  public function create_task_time($task_id,$start)
  {
  	date_default_timezone_set('UTC');
  	$current_time = date('Y-m-d H:i:s');
    $data = array(
       'start' => $start,
       'task_id' => $task_id,
       'time' => $current_time
    );
    $this->db->insert('task_times', $data);
    return $this->db->insert_id();
  }

  public function get_time_worked_in_task($task_id)
  {
  	$data['hour']=0;
  	$data['minutes']=0;
  	$data['seconds']=0;
  	
  	$query = $this->db->where('task_id',$task_id)->order_by("time", "desc")->get('task_times')->result_array(); 

  	if (sizeof($query)<2)
  		return $data;

  	if (sizeof(($query))%2==0)
  	{
  		for ($c=0;$c<sizeof($query);$c+=2)
  		{
  			$stop_pre = array_values($query)[$c]['time'];
  			$stop = new DateTime($stop_pre);
  			$start_pre = array_values($query)[$c+1]['time'];
  			$start = new DateTime($start_pre);
  			$deff = $stop->diff($start);
  			$data['hour'] += $deff->format('%h');
  			$data['minutes'] += $deff->format('%i');
  			$data['seconds'] += $deff->format('%s');
  		}
  	}
  	else
  	{
  		for ($c=1;$c<sizeof($query);$c+=2)
  		{
  			$stop_pre = array_values($query)[$c]['time'];
  			$stop = new DateTime($stop_pre);
  			$start_pre = array_values($query)[$c+1]['time'];
  			$start = new DateTime($start_pre);
  			$deff = $stop->diff($start);
  			$data['hour'] += $deff->format('%h');
  			$data['minutes'] += $deff->format('%i');
  			$data['seconds'] += $deff->format('%s');
  		}
  	}
  	$data = $this->correct_date($data);
  	return $data;
  }

  public function correct_date($time)
  {
  	$minutes = 0;
  	$hour = 0;
  	if ($time['seconds']>=60)
  	{
  		$minutes = intdiv($time['seconds'],60);
  		$time['seconds'] = ($time['seconds']%60);
  	}
  	$time['minutes']+=$minutes;
  	if ($time['minutes']>=60)
  	{
  		$hour = intdiv($time['minutes'],60);
  		$time['minutes'] = ($time['minutes']%60);
  	}
  	$time['hour']+=$hour; 
  	return $time;
  }

}
?>