<?php
class Notes extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('note');
		$this->load->model('task');
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
		$note = $this->input->post('newNoteTextBox');
		$this->form_validation->set_rules('newNoteTextBox', 'Note', 'required');
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
		$this->note->create_note($note,$task_id);
			redirect('/days/show/'.$day['id']);
		}
	}

	public function delete()
	{
		//variables
		$note_id = $this->uri->segment(3);
		$task = $this->note->task($note_id);
		$day = $this->task->day($task['id']);
		//operaciones
		$this->note->delete($note_id);
		//muestreo
		$this->load->helper('url');
		redirect('/days/show/'.$day['id']);
	}

}
?>









