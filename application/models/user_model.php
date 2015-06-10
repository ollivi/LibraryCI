<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	function login($username, $password)
	{
		$this->db->where("username", $username);
		$this->db->where("password", $password);

		$query = $this->db->get("users");

		if($query->num_rows() > 0)
		{
			foreach($query->result() as $rows)
			{
				$newdata = array(
					'user_id'	=> $rows->id,
					'username'	=> $rows->username,
					'email'		=> $rows->email,
					'logged'	=> TRUE,
					);
			}
			$this->session->set_userdata($newdata);
			return true;
		}
		return false;
	}

	public function add_user()
	{
		$username = $this->input->post('username');
		$email = $this->input->post('email');

		$this->db->where('username', $username);
		$query = $this->db->get("users");

		if($query->num_rows() <= 0)
		{
			$data = array(
				'username'	=> $this->input->post('username'),
				'email'		=> $this->input->post('email'),
				'password'	=> crypt($this->input->post('password'), "sejzo0zm3kd4kLK3klk1"),
				'nom'		=> $this->input->post('nom'),
				'prenom'	=> $this->input->post('prenom')
				);

			$this->db->insert('users', $data);
		}
	}

	public function user_info()
	{
		$username = $this->session->userdata('username');

		$this->db->where("username", $username);

		$query = $this->db->get("users");

		return $query->result();
	}

	public function update_user()
	{
		$data = array(
			'username'	=> $this->session->userdata('username'),
			'email'		=> $this->input->post('email'),
			'password'	=> md5($this->input->post('password')),
			'nom'		=> $this->input->post('nom'),
			'prenom'	=> $this->input->post('prenom')
			);

		$id = $this->session->userdata('user_id');

		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}
}
?>