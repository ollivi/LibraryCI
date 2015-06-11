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
			$id = $this->session->userdata('user_id');
			$info = array('id' => $id);

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
		$foldername = $this->input->post('nom');

		$path = "./public/uploads/" . $username . "/" . $foldername;

		$create = mkdir($path, 0777);

		redirect("/folders/".$this->session->userdata('username'));
	}
}