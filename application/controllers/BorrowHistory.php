<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BorrowHistory extends CI_Controller {

	private $allowed_permissions;

	function __construct()
	{
		parent::__construct();

		// Check is loggied in to system
		if ($this->session->is_loggedin == false) {
			redirect('login');
		}

		$this->load->model("BorrowedByModel");
		$this->load->model("BookModel");
		$this->load->model("UserModel");
	}

	public function index()
	{
		// Check permissions for borrow history view page
		if(!$this->permission->has_permission("viewall_borrow")){
			echo "No permissions";
			return;
		}

		$user_id = $this->session->userdata('user_id');

		$borrowhistory = array();
		if ($this->permission->has_permission("view_all_borrow_history")) {
			// Get all form from db
			$borrowhistory = $this->BorrowedByModel->GetAllWithDetails();
		}

		$my_borrowhistory = $this->BorrowedByModel->GetAllWithDetails($user_id);

		$data = array(
			"borrowhistory_list" => $borrowhistory,
			"my_borrowhistory_list" => $my_borrowhistory
		);

		// Load appeal form view
		$this->layout->view('borrow/borrowedby',$data);

	}


	function create()
	{
		$has_permision = $this->permission->has_permission("create_borrow");

		if(!$has_permision){
			echo "No permissions";
			return;
		}

		$user_id = $this->session->userdata('user_id');



		if ($_POST) {
/*
				$this->form_validation->set_message('required', 'CUSTOM NESSAGE:  %s is required!');
*/
			// Set validaiton rules
				$this->form_validation->set_rules("userId", "Username", "trim|required|max_length[20]");
				$this->form_validation->set_rules("bookId", "Book", "trim|required|max_length[20]");
				

				$valid = $this->form_validation->run();
				
				if ($valid == true) {
				// Save to database

				/// Get post data and assign to data array
					$post_data = array(
						'user_id' => $_POST["userId"],
						'book_id' => $_POST["bookId"]
					);
					
					$new_borrow_id = $this->BorrowedByModel->Insert($post_data);

				// set flash message
					$this->session->set_flashdata('success', "Borrow Created Successfully! New Borrow ID: ". $new_borrow_id);

				// redirect to all uomuser page
					redirect('borrowhistory');

				}
			}

			// Get user details
			$allUser = $this->UserModel->GetAll();
			$user_dropdown = array();
			$user_dropdown[''] = '-- Select User --';
			foreach ($allUser as $key => $User) {
				$user_dropdown[$User->id] = $User->fName;
			}

			$allBook = $this->BookModel->GetAll();
			$book_dropdown = array();
			$book_dropdown[''] = '-- Select Book --';
			foreach ($allBook as $key => $Book) {
				$book_dropdown[$Book->id] = $Book->bookDesc;
			}

			$data = array(
				'user_dropdown' => $user_dropdown,
				'book_dropdown' => $book_dropdown
			);

 		/// Load all appeal form page
			$this->layout->view("borrow/create_borrow", $data);

		}







	}
