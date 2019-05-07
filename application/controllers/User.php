<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	private $allowed_permissions;

	function __construct()
	{
		parent::__construct();

		// Check is loggied in to system
		if ($this->session->is_loggedin == false) {
			redirect('login');
		}

		$this->load->model("UserModel");
		$this->load->model("UserTypeUserModel");
		$this->load->model("UserTypeModel");
	}

	public function index()
	{

		// Check permissions for user view page
		if(!$this->permission->has_permission("viewall_usermanagement")){
			echo "No permissions";
			return;
		}

		// Get all user from db
		$user = $this->UserModel->GetAll();

		// Define data array
		$data = array(
			"user_list" => $user
		);

		// Load user view
		$this->layout->view('user/user',$data);

	}




	function create()
	{

		$has_permision = $this->permission->has_permission("create_user");

		if(!$has_permision){
			echo "No permissions";
			return;
		}

		// Check is form submitted or not
		if ($_POST) {
/*
				$this->form_validation->set_message('required', 'CUSTOM NESSAGE:  %s is required!');
*/
			// Set validaiton rules
				$this->form_validation->set_rules("username", "Username", "trim|required|max_length[50]|is_unique[user.username]");
				$this->form_validation->set_rules("fName", "First Name", "trim|required|max_length[200]");
				$this->form_validation->set_rules("lName", "Last Name", "trim|max_length[200]");
				

				$valid = $this->form_validation->run();
				
				if ($valid == true) {
				// Save to database

				/// Get post data and assign to data array
					$post_data = array(
						'username' => $_POST["username"],
						'fName' => $_POST["fName"],
						'lName' => $_POST["lName"]
					);
					//if() - check
				// Save uomuser in db
					$new_user_id = $this->UserModel->Insert($post_data);

				// set flash message
					$this->session->set_flashdata('success', "User Created Successfully! New User ID: ". $new_user_id);

				// redirect to all uomuser page
					redirect('user');

				}
			}

		/// Load all uomuser page
			$this->layout->view("user/create_user");
		}


		function delete()
		{
			// Check permissions for user view page
			if(!$this->permission->has_permission("delete_user")){
				echo "No permissions";
				return;
			}

		// Get user id from url
			$user_id = $this->uri->segment(3);

			if($user_id){
				$isDeleted = $this->UserModel->Delete($user_id);
				if($isDeleted){

				// set flash data
					$this->session->set_flashdata('success', 'User Deleted successfully!');

					redirect("user");
				}
			}

		}

		function set_usertype()
		{

			$user_id =  $this->uri->segment(3);

			if ($_POST) {
				$selected_usertypes = $_POST["usertypes"];

				$this->UserTypeUserModel->DeleteByUser($user_id);

				foreach ($selected_usertypes as $key => $usertype_id) {

					$data_set = array(
						'user_id' => $user_id,
						'usertype_id' => $usertype_id, 
						'createdUserId' => $this->session->user_id
					);

					$this->UserTypeUserModel->Insert($data_set);
				}
				$this->session->set_flashdata('success', "User Type Added Successfully!");
				redirect('user');

			}

		// load all user type
			$usertype_list = $this->UserTypeModel->GetAll();


		// Load all existing usertypes
			$selected_usertypes = $this->UserTypeUserModel->GetUserTypeIdByUserId($user_id);

			$usertype_id_array = array();
			foreach ($selected_usertypes as $key => $usertype) {
				array_push($usertype_id_array, $usertype->userType_id);
			}

			$data = array(
				'usertype_list' => $usertype_list,
				'usertype_id_array' => $usertype_id_array
			);

			$this->layout->view("user/set_usertype", $data);


		}























	}
