<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $allowed_permissions;

	function __construct()
	{
		parent::__construct();

		// Check is loggied in to system
		if ($this->session->is_loggedin == false) {
			redirect('login');
		}

		$this->load->model("BookModel");
	}

	public function index()
	{
		
		$book = $this->BookModel->GetAll();

		$data = array(
			'book' => $book
		);

		$this->layout->view('dashboard',$data);
	}
}
