<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Course');
		$this->load->helper('url');	
		$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$view_data['courses'] = $this->Course->get_all_courses();
		$this->load->view('courses_view', $view_data);
	}

	public function add()
	{	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Course Name', 'required|min_length[15]');

		if($this->form_validation->run() == TRUE)
		{
			$course_data = array(
							'title' => $this->input->post('name'),
							'description' => $this->input->post('description')
						);

			$this->Course->add_course($course_data);
			$this->session->set_flashdata('message', 'Course is added successfully');
		}

		else
		{
			$this->session->set_flashdata('message', validation_errors());
		}

		redirect(base_url('courses/'));
	}

	public function destroy($course_id=NULL)
	{
		$view_data['course'] = $this->Course->get_specific_course($course_id);
		$this->load->view('delete_course_view', $view_data);

		$course_id = $this->input->post('course_id');
		if($this->input->post('action') == 'cancel')
		{
			$this->session->set_flashdata('message', 'Course is retained.');
			redirect(base_url('courses/'));
		}
		
		if($this->input->post('action') == 'delete')
		{
			$this->Course->remove_course($course_id);
			$this->session->set_flashdata('message', 'Course is deleted.');
			redirect(base_url('courses/'));
		}
	}

}