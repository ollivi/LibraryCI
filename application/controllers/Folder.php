<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Folder extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('folder_model');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
	}


	//function to display the folder list
	public function showFolders($username)
	{
		//if the user is logged and his username if the same as the profile he's trying to access
		if($this->session->userdata('logged') == true && $this->session->userdata('username') == $username)
		{
			//get the list of folder already existing
			$data = $this->folder_model->get_folders($this->session->userdata('user_id'));
			$info = array('info' => $data);

			//show the folder view
			$this->load->view('folder_view', $info);
		}
		else
		{
			//else redirect to the index
			redirect();
		}
	}


	//function to create a folder
	public function makeFolder($user_id)
	{
		$username = $this->session->userdata('username');
		$subfolder = $this->input->post('folder');
		$foldername = $this->input->post('nom');

		//check if a sub folder was specified
		if($subfolder != "")
		{
			//set the path where the folder will be created
			$path = "./public/uploads/" . $username . "/" . $subfolder . "/" . $foldername;
		}
		else
		{
			$path = "./public/uploads/" . $username . "/" . $foldername;
		}

		//create the folder
		$create = mkdir($path, 0777);

		//add the folder information to the database
		$this->folder_model->add_folder($this->session->userdata('user_id'), $foldername);

		redirect("/folders/".$this->session->userdata('username'));
	}
}