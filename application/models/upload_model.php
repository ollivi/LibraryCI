<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	//function to add the file informations to the database
	public function add_file($tmp_name, $name, $targetFile)
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
				'url'       => $targetFile
				);

			$this->db->insert('files', $data);
		}
	}


	//function to get the files of a user from the database
	public function user_files()
	{
		//retrieve the user_id from the session
		$user_id = $this->session->userdata('user_id');

		$this->db->where("user_id", $user_id);

		//find all the results from the table "files" with the user_id corresponding to the user logged
		$query = $this->db->get("files");

		return $query->result();
	}

	//function to rename a file
	public function update_file()
	{

	}
}
?>