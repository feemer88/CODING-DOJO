<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->view('users/index');
	}

	public function signin()
	{
		$this->load->view('users/signin');
	}

	public function register()
	{
		$this->load->view('users/register');
	}

	public function create()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'confirm password', 'trim|required');

		$this->form_validation->set_message('is_unique', 'The user already exists.');

		if($this->form_validation->run() === false)
		{
			$this->session->set_flashdata('errors', validation_errors());

			//if admin is adding user 
			if($this->input->post('action') == 'admin')
			{
				redirect('/users/new');
			}
			else
			{
				redirect('/register');
			}
		}
		else
		{
			$new_user = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'user_level' => 1
				);
			$this->User->add_user($new_user);

			//if admin is adding user
			if($this->input->post('action') == 'admin')
			{
				$this->session->set_flashdata('success', 'User successfully added.');
				redirect('/users/new');
			}

			$user = $this->User->get_last_entry();

			$user_info = array(
				'id' => $user['id'],
				'first_name' => $user['first_name'],
				'last_name' => $user['last_name'],
				'email' => $user['email'],
				'user_level' => $user['user_level'],
				'description' => $user['description'],
				'is_logged_in' => true
				);

			$this->session->set_userdata($user_info);
			redirect('/dashboard');
		}
	}

	public function show($id)
	{
		$user = $this->User->get_user_by_id($id);
		$messages = $this->Message->get_messages($id);
		// var_dump($messages);
		// die();

		$this->load->view('users/show', array('user' => $user, 'messages' => $messages));
	}

	public function edit()
	{
		$id = $this->session->userdata('id');
		$user = $this->User->get_user_by_id($id);
		$this->load->view('users/profile', array('user' => $user));
	}

	public function update()
	{
		$this->load->library('form_validation');
		if($this->input->post('action') == 'contact_info')
		{
			$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
			$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
			$this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[users.email]|valid_email');

			$this->form_validation->set_message('is_unique', 'The email is already taken.');
			if($this->form_validation->run() === false)
			{
				$this->session->set_flashdata('errors', validation_errors());
			}
			else
			{
				$user_info = array(
					'id' => $this->session->userdata('id'),
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'email' => $this->input->post('email')
				);

				$this->User->update_user_contact_info($user_info);
			}			
		}
		else if($this->input->post('action') == 'password_info')
		{
			$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]|matches[confirm_password]');
			$this->form_validation->set_rules('confirm_password', 'confirm password', 'trim|required');
			if($this->form_validation->run() === false)
			{
				$this->session->set_flashdata('errors', validation_errors());
			}
			else
			{
				$user_info = array(
					'id' => $this->session->userdata('id'),
					'password' => md5($this->input->post('password'))
				);

				$this->User->update_user_password($user_info);
			}
		}
		else if($this->input->post('action') == 'description_info')
		{
			$user_info = array(
				'id' => $this->session->userdata('id'),
				'description' => $this->input->post('description')
			);

			$this->User->update_user_description($user_info);
		}
		redirect("/users/edit");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */