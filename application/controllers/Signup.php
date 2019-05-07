<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model("AuthModel");
		$this->load->model("UserModel");
	}

	public function index()
	{

		// Check logged in to system
		if ($this->session->is_loggedin == true) {
			redirect('dashboard');
		}

		if ($_POST) {

			// If form submitted
			$this->form_validation->set_rules("username", "Username", "trim|required|max_length[50]|is_unique[user.username]");
			$this->form_validation->set_rules('fName', 'First Name', 'required|trim|max_length[200]');
			$this->form_validation->set_rules('lName', 'Last Name', 'required|trim|max_length[200]');
			$this->form_validation->set_rules("password", "Password", "trim|required");
			$this->form_validation->set_rules("conf_password", "Confirm Password", "trim|required|matches[password]'");

			$isvalid = $this->form_validation->run();

			if ($isValid==true) {
				$data = array(
					'username' => $_POST["username"],
					'fName' => $_POST["fName"],
					'lName' => $_POST["lName"],
					'userPassword' => md5($_POST["password"])
				);

				$new_user_id = $this->UserModel->Insert($post_data);

				$this->session->set_flashdata('success', "User Created Successfully!");

				redirect('login');

			}else{
				$this->session->set_flashdata('error_messages', 'Invalid Details');
			}

		}

		$this->load->view('signup');

	}
}


