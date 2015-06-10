<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('upload_model');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
	}


	//function to display the upload page
	public function ShowUpload()
	{
		//if the user is logged
		if($this->session->userdata('logged') == true)
		{
			//display the upload view
			$this->load->view('upload_view');
		}
	}


	//function to upload a file
	public function new_file()
	{
		//if the array $_FILES is not empty
		if(!empty($_FILES))
		{
			$tempFile = $_FILES['file']['tmp_name'];
			$name = $_FILES['file']['name'];

			//set a random name to avoid duplicates
			$tmp_name = rand(0, 999).time().$_FILES['file']['name'];

			//path for miniatures
			$min_path = 'public/uploads/' . $tmp_name;

			//set the path where the file will be put
			$targetPath = $_SERVER['DOCUMENT_ROOT'] . 'libraryci/public/uploads/';

			$targetFile = $targetPath . $tmp_name;

			//move the file in the upload folder
			move_uploaded_file($tempFile, $targetFile);

			$this->upload_model->add_file($tmp_name, $name, $min_path);
		}
	}


	//function to display files of a user
	public function files($username)
	{
		//if the user is logged and his username if the same as the profile he's trying to access
		if($this->session->userdata('logged') == true && $this->session->userdata('username') == $username)
		{
			$data = $this->upload_model->user_files();
			$info = array('info' => $data);

			//show the files view
			$this->load->view('files_view', $info);
		}
		else
		{
			//else redirect to the index
			redirect();
		}
	}
}