<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
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

	public function showRegister()
	{
		if($this->session->userdata('logged') == false)
		{
			$this->load->view('inscription_view');
		}
		else
		{
			redirect();
		}
	}

	public function showLogin()
	{
		if($this->session->userdata('logged') == false)
		{
			$this->load->view('connexion_view');
		}
		else
		{
			redirect();
		}
	}

	public function showProfile($username)
	{
		if($this->session->userdata('logged') == true && $this->session->userdata('username') == $username)
		{
			$data = $this->user_model->user_info();
			$info = array('info' => $data);
			$this->load->view('profile_view', $info);
		}
		else
		{
			redirect();
		}
	}

	public function showUpdate($username)
	{
		if($this->session->userdata('logged') == true && $this->session->userdata('username') == $username)
		{
			$this->load->view('update_view');
		}
		else
		{
			redirect();
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('nom', 'Name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('prenom', 'First name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password_conf', 'Password confirmation', 'trim|required|matches[password]');

		$username = $this->session->userdata('username');

		if($this->form_validation->run() == FALSE)
		{
			$this->showUpdate($username);
		}
		else
		{
			$this->user_model->update_user();
			redirect("/profile/".$username."");
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('nom', 'Name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('prenom', 'First name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password_conf', 'Password confirmation', 'trim|required|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
	}

	public function register_complete()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('nom', 'Name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('prenom', 'First name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password_conf', 'Password confirmation', 'trim|required|matches[password]');

		if($this->form_validation->run() == TRUE)
		{
			$this->user_model->add_user();
		}
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = crypt($this->input->post('password'), "sejzo0zm3kd4kLK3klk1");

		$result = $this->user_model->login($username, $password);

		if($result)
		{
			$data['username'] = $username;
			$this->load->view('accueil', $data);
		}
		else
		{
			$this->showLogin();
		}
	}

	public function logout()
	{
		{
			$newdata = array(
				'user_id'	=>'',
				'username'	=>'',
				'email'		=> '',
				'logged'	=> FALSE,
				);

			$this->session->unset_userdata($newdata);
			$this->session->sess_destroy();
			redirect('user/showlogin');
		}
	}
}