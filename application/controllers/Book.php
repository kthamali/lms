<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

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

		// Check permissions for book view page
		if(!$this->permission->has_permission("viewall_book")){
			echo "No permissions";
			return;
		}

		// Get all book from db
		$book = $this->BookModel->GetAll();

		// Define data array
		$data = array(
			"book_list" => $book
		);

		// Load book view
		$this->layout->view('book/book',$data);

	}


	function delete()
	{
			// Check permissions for book view page
		if(!$this->permission->has_permission("delete_book")){
			echo "No permissions";
			return;
		}

		// Get book id from url
		$book_id = $this->uri->segment(3);

		if($book_id){
			$isDeleted = $this->BookModel->Delete($book_id);
			if($isDeleted){

				// set flash data
				$this->session->set_flashdata('success', 'Book Deleted successfully!');

				redirect("book");
			}
		}

	}


	function create()
	{

		// Check permissions for book view page
		if(!$this->permission->has_permission("create_book")){
			echo "No permissions";
			return;
		}

		if ($_POST) {

			// set validation rules
			$this->form_validation->set_rules('bookDesc','Book Description', 'trim|required|max_length[250]');

			$valid = $this->form_validation->run();

			if ($valid) {

				$image_name = '';

				// check image is selected
				if (isset($_FILES['userfile']) && is_uploaded_file($_FILES['userfile']['tmp_name'])) {

					$image_name = uniqid() . ".jpg";

					$config = array(
						'upload_path' => "./uploads/",
						'allowed_types' => "gif|jpg|png",
						'overwrite' => TRUE,
						'image_name' => $image_name
					);
					$this->load->library('upload', $config);
					if($this->upload->do_upload())
					{
						$data = array('upload_data' => $this->upload->data());
						//var_dump($data);
					}
				}

				// save data into appeal form table
				$form_data = array(
					'bookDesc' => $_POST["bookDesc"],
					'bookImage' => $image_name
				);

				$new_book_id = $this->BookModel->Insert($form_data);

				/// set flash message
				$this->session->set_flashdata('success', "Book Created Successfully! Book ID: ". $new_book_id);

 				/// redirect to all permission page
				redirect('book');
			}

		}

		// Load book view
		$this->layout->view('book/create_book');

	}




















}
