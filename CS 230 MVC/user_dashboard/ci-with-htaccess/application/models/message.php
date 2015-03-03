<?php

class Message extends CI_Model{

	function post_message($message)
	{
		$query = "INSERT INTO messages (user_id, sender_user_id, message, created_at, updated_at) VALUES (?,?,?, NOW(), NOW())";
		$values = array($message['user_id'], $message['sender_id'], $message['message']);
		return $this->db->query($query, $values);
	}

	function post_comment($comment)
	{
		$query = "INSERT INTO comments (message_id, sender_user_id, comment, created_at, updated_at) VALUES (?,?,?, NOW(), NOW())";
		$values = array($comment['message_id'], $comment['sender_id'], $comment['comment']);
		return $this->db->query($query, $values);
	}

	function get_messages($id)
	{
		$query = "SELECT users2.id as message_sender_id, users2.first_name as message_sender_first_name, users2.last_name as message_sender_last_name, messages.id as message_id, messages.message as message, messages.created_at as message_created_at, users3.id as comment_sender_id, users3.first_name as comment_sender_first_name, users3.last_name as comment_sender_last_name, comments.message_id as comment_message_id, comments.comment as comment, comments.created_at as comment_created_at FROM users
			LEFT JOIN messages on users.id = messages.user_id
			LEFT JOIN comments on messages.id = comments.message_id
			LEFT JOIN users as users2 on users2.id = messages.sender_user_id
			LEFT JOIN users as users3 on users3.id = comments.sender_user_id
			WHERE messages.user_id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->result_array();
	}
}
?>