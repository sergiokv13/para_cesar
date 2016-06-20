<?php
Class User extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
    $this->load->model('task');
  }


  public function get_user_by_id($user_id)
  {
    $predata = $this->db->where('id',$user_id)->get('users')->result_array();
    $data = array_values($predata)[0]; 
        return $data;
  }

  public function check_password($user_id,$password)
  {
      $user = $this->get_user_by_id($user_id);
      return MD5($password)==$user["password"];
  }

  public function check_enable($user_id)
  {
      $user = $this->get_user_by_id($user_id);
      return $user['active'];
  }

 public function create_user($username,$name,$lastname,$rol,$password)
  {
    $data = array(
       'username' => $username,
       'name' => $name,
       'rol' => $rol,
       'password' => MD5($password),
       'lastname' => $lastname,
       'active' => 1
    );
    $this->db->insert('users', $data);
    return $this->db->insert_id();
  }

  public function activate_account($user_id)
  {
    $attributes=array(
      'active'=> 1
    );
    $this->db->where('id',$user_id)->update('users',$attributes);
  }

  public function disable_account($user_id)
  {
    $attributes=array(
      'active'=> 0
    );
    $this->db->where('id',$user_id)->update('users',$attributes);
  }

  public function update_user($user_id,$new_password)
  {
    $attributes=array(
      'password'=> MD5($new_password)
    );
    $this->db->where('id',$user_id)->update('users',$attributes);
  }

 function login($username, $password)
 {
   $this -> db -> select('id, username, password');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('active', 1);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

function get_users()
   {
    $query = $this->db->get('users');
    return $query->result_array();
   }

   function get_user($userId)
   {
    $predata = $this-> db -> where('id', $userId)->get('users')->result_array();
    $data = array_values($predata)[0]; 
        return $data;
   }

   function get_rol_by_id($userId)
   {
      return $this->get_user($userId)['rol'];
   }

  public function get_all_worked_days($user_id)
  {
    $tasks = $this->task->get_tasks_by_user($user_id);
    $days = array();
    foreach ($tasks as $task)
    {
      $current_day = $this->task->day($task['id']);
      $flag = false;
      foreach ($days as $day)
      {
        if ($day['id'] == $current_day['id'] )
          $flag = true;
      }
      if (!$flag)
        array_push($days,$current_day);
    }
    return $days;
  }
}
?>