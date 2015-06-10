<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
	}


	//fonction qui affiche la page d'upload
	public function ShowUpload()
	{
		//si l'utilisateur est bien connecté
		if($this->session->userdata('logged') == true)
		{
			//on montre la vue upload
			$this->load->view('upload_view');
		}
	}


	//fonction d'affichage des fichiers de l'utilisateur
	public function files($username)
	{
		//si l'utilisateur est connecté et son nom d'utiliateur correspond a celui du profil auquel il essaie d'acceder
		if($this->session->userdata('logged') == true && $this->session->userdata('username') == $username)
		{
			//on montre la vue files
			$this->load->view('files_view');
		}
		else
		{
			//sinon on redirige vers l'accueil
			redirect();
		}
	}
}