<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Folder_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper("file");
	}


	//function to add the folder in the database
	public function add_folder($user_id, $foldername)
	{
		//check if a folder with this name is already in the database
		$this->db->where('folder_name', $foldername);
		$query = $this->db->get("folders");

		//if the folder name has no duplicates we insert it's informations in the DB
		if($query->num_rows() <= 0)
		{
			$data = array(
				'user_id'  	=> $this->session->userdata('user_id'),
				'folder_name' => $foldername
				);

			$this->db->insert('folders', $data);
		}
	}

	//function to get the folders of the user from the DB
	public function get_folders($user_id)
	{
		//get the list of folder belonging to this user in the DB
		$this->db->where('user_id', $user_id);
		$query = $this->db->get("folders");

		return $query->result();
	}
}
?>