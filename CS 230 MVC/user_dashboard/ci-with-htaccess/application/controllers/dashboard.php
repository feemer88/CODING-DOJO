<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$users = $this->User->get_all_users();

		if($this->session->userdata('user_level') == 1)
		{
			$this->load->view('dashboard/index', array('users' => $users));
		}
		else
		{
			$this->load->view('dashboard/admin_index', array('users' => $users));
		}	
	}

	public function edit($id)
	{
		$user = $this->User->get_user_by_id($id);

		$this->load->view('dashboard/admin_edit', array('user' => $user));
	}

	public function newUser()
	{
		$this->load->view('dashboard/admin_new_user');
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
				redirect("/users/edit/" . $this->input->post('user_id'));
			}
			$user_info = array(
					'id' => $this->input->post('user_id'),
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'email' => $this->input->post('email'),
					'user_level' => $this->input->post('user_level'),
			);

			$this->User->update_user_contact_info_as_admin($user_info);
		}
		else if($this->input->post('action') == 'password_info')
		{
			$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]|matches[confirm_password]');
			$this->form_validation->set_rules('confirm_password', 'confirm password', 'trim|required');
			if($this->form_validation->run() === false)
			{
				$this->session->set_flashdata('errors', validation_errors());
				redirect("/users/edit/" . $this->input->post('user_id'));
			}
			$user_info = array(
				'id' => $this->input->post('user_id'),
				'password' => md5($this->input->post('password'))
			);

			$this->User->update_user_password($user_info);
		}
		redirect("/users/edit/" . $this->input->post('user_id'));
	}

	public function destroy($id)
	{
		$this->User->delete_user($id);

		redirect("/dashboard");
	}
}
