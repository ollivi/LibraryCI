<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper("file");
	}

	//function to add the file informations to the database
	public function add_file($tmp_name, $name, $min_path)
	{
		//check if a file with this name is already in the database
		$this->db->where('temp_name', $tmp_name);
		$query = $this->db->get("files");

		//if the file name has no duplicates we insert it's informations in the DB
		if($query->num_rows() <= 0)
		{
			$data = array(
				'user_id'  	=> $this->session->userdata('user_id'),
				'temp_name' => $tmp_name,
				'file_name' => $name,
				'url'       => $min_path
				);

			$this->db->insert('files', $data);
		}
	}


	//function to get the files of a user from the database
	public function user_files()
	{
		//retrieve the user_id from the session
		$user_id = $this->session->userdata('user_id');

		$this->db->select("id, file_name, url");
		$this->db->where("user_id", $user_id);

		//find all the results from the table "files" with the user_id corresponding to the user logged
		$query = $this->db->get("files");

		return $query->result();
	}

	//function to rename a file
	public function update_file($user_id, $id)
	{
		$this->db->where('id', $id);
		$this->db->where('user_id', $user_id);

		//check if there is a row corresponding to the user_id of the user and of the id of the file
		$query = $this->db->get("files");

		if($query->num_rows() > 0)
		{
			$data = array(
				'file_name'  	=> $this->input->post('nom')
				);

			$this->db->where('id', $id);
			$this->db->update('files', $data);
			redirect("/files/".$this->session->userdata("username"));
		}
		else
		{
			redirect();
		}
	}

	//function to delete a file
	public function remove_file($user_id, $id)
	{
		$this->db->where('id', $id);
		$this->db->where('user_id', $user_id);

		//check if there is a row corresponding to the user_id of the user and of the id of the file
		$query = $this->db->get("files");

		if($query->num_rows() > 0)
		{
			$path = $query->result();

			//get the path of the file
			$path = $_SERVER['DOCUMENT_ROOT'] . "libraryci/" .$path[0]->url;

			//delete the file from the folder
			unlink($path);

			//delete the file informations from the database
			$this->db->where('id', $id);
			$this->db->delete('files');

			redirect("/files/".$this->session->userdata("username"));
		}
		else
		{
			redirect();
		}
	}
}
?>