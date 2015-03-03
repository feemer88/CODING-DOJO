<?php

class User extends CI_Model{

	function get_all_users()
	{
		return $this->db->query("SELECT * FROM users")->result_array();
	}

	function add_user($user)
	{
		$query = "INSERT INTO users (first_name, last_name, email, password, user_level, created_at, updated_at) VALUES (?,?,?,?,?, NOW(), NOW())";
		$values = array($user['first_name'], $user['last_name'], $user['email'], $user['password'], $user['user_level']);
		return $this->db->query($query, $values);
	}

	function get_user_by_email($email)
	{
		return $this->db->query("SELECT * FROM users WHERE email = ?", array($email))->row_array();
	}

	function get_last_entry()
	{
		return $this->db->query("SELECT * FROM users ORDER BY id DESC LIMIT 1")->row_array();
	}

	function get_user_by_id($id)
	{
		return $this->db->query("SELECT * FROM users WHERE id = ?", array($id))->row_array();
	}

	function update_user_contact_info_as_admin($user)
	{
		$query = "UPDATE users SET first_name = ?, last_name = ?, email = ?, user_level = ? WHERE id = ?";
		$values = array($user['first_name'], $user['last_name'], $user['email'], $user['user_level'], $user['id']);
		return $this->db->query($query, $values);
	}

	function update_user_contact_info($user)
	{
		$query = "UPDATE users SET first_name = ?, last_name = ?, email = ? WHERE id = ?";
		$values = array($user['first_name'], $user['last_name'], $user['email'], $user['id']);
		return $this->db->query($query, $values);
	}

	function update_user_password($user)
	{
		$query = "UPDATE users SET password = ? WHERE id = ?";
		$values = array($user['password'], $user['id']);
		return $this->db->query($query, $values);
	}

	function update_user_description($user)
	{
		$query = "UPDATE users SET description = ? WHERE id = ?";
		$values = array($user['description'], $user['id']);
		return $this->db->query($query, $values);
	}

	function delete_user($id)
	{
		return $this->db->query("DELETE FROM users WHERE id = ?", array($id));
	}
}

?>