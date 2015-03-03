<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends CI_Controller {

	public function index()
	{
		
	}

	public function create()
	{
		$message = array(
			"user_id" => $this->input->post("user_id"),
			"sender_id" => $this->input->post("sender_id"),
			"message" => $this->input->post("message")
			);

		$this->Message->post_message($message);

		redirect("users/show/" . $this->input->post("user_id"));
	}

	public function create_comment()
	{
		$comment = array(
			"sender_id" => $this->input->post("sender_id"),
			"message_id" => $this->input->post("message_id"),
			"comment" => $this->input->post("comment")
			);

		$this->Message->post_comment($comment);

		redirect("users/show/" . $this->input->post("user_id"));
	}
}