<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session extends CI_Controller {

	public function create()
	{
		$password = md5($this->input->post('password'));
		$email = $this->input->post('email');
		$user = $this->User->get_user_by_email($email);

		if($user && $user['password'] == $password)
		{
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
		else
		{
			if(!$user)
			{
				$this->session->set_flashdata('errors', 'That user does not exist.');
			}
			else if($user['password'] != $password)
			{
				$this->session->set_flashdata('errors', 'Email and password do not match.');
			}
			redirect('/signin');
		}
	}

	public function show()
	{
		if($this->session->userdata('is_logged_in') == true)
		{
			redirect('/dashboard');
		}
		else
		{
			redirect('/signin');
		}
	}

	public function destroy()
	{
		$this->session->sess_destroy();
		redirect('/signin');
	}

}