<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserType extends CI_Controller {

	private $allowed_permissions;

	function __construct()
	{
		parent::__construct();

		// Check is loggied in to system
		if ($this->session->is_loggedin == false) {
			redirect('login');
		}

		$this->load->model("UserTypeModel");
		$this->load->model("PermissionModel");
		$this->load->model("PermissionUserTypeModel");
	}

	public function index()
	{

		if(!$this->permission->has_permission("viewall_usertype")){
			echo "No permissions";
			return;
		}

		$usertypes = $this->UserTypeModel->GetAll();

		$data = array('usertype_list' => $usertypes);


		$this->layout->view("usertype/usertype", $data);

	}

	function create()
	{

		$has_permision = $this->permission->has_permission("create_usertype");

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
				$this->form_validation->set_rules("userTypeDesc", "User Type Description", "trim|required|max_length[250]");

				$valid = $this->form_validation->run();
				
				if ($valid == true) {
				// Save to database

				/// Get post data and assign to data array
					$post_data = array(
						'userTypeDesc' => $_POST["userTypeDesc"]
					);
					//if() - check
				// Save usertype in db
					$new_usertype_id = $this->UserTypeModel->Insert($post_data);

				// set flash message
					$this->session->set_flashdata('success', "User Type Created Successfully! New User Type ID: ". $new_usertype_id);

				// redirect to all usertype page
					redirect('usertype');

				}
			}

		// Load all usertype page
			$this->layout->view("usertype/create_usertype");
		}




		function set_permission()
		{

			$usertype_id =  $this->uri->segment(3);

			if ($_POST) {
				$selected_permissions = $_POST["permissions"];

				$this->PermissionUserTypeModel->DeleteByUserType($usertype_id);

				foreach ($selected_permissions as $key => $permission_id) {

					$data_set = array(
						'usertype_id' => $usertype_id, 
						'permission_id' => $permission_id,
						'createdUserId' => $this->session->user_id
					);

					$this->PermissionUserTypeModel->Insert($data_set);
				}
				$this->session->set_flashdata('success', "Permission Added Successfully!");
				redirect('usertype');

			}

		// load all permission list
			$permission_list = $this->PermissionModel->GetAll();


		// Load all existing permissions
			$selected_permissions = $this->PermissionUserTypeModel->GetPermissionIdByUserTypeId($usertype_id);

			$permission_id_array = array();
			foreach ($selected_permissions as $key => $permission) {
				array_push($permission_id_array, $permission->permission_id);
			}

			$data = array(
				'permission_list' => $permission_list,
				'permission_id_array' => $permission_id_array
			);

			$this->layout->view("usertype/set_permission", $data);


		}





		function delete()
		{
			// Check permissions for usertype delete page
			if(!$this->permission->has_permission("delete_usertype")){
				echo "No permissions";
				return;
			}

		// Get usertype id from url
			$usertype_id = $this->uri->segment(3);

			if($usertype_id){
				$isDeleted = $this->UserTypeModel->Delete($usertype_id);
				if($isDeleted){

				// set flash data
					$this->session->set_flashdata('success', 'User Type Deleted successfully!');

					redirect("usertype");
				}
			}

		}




	}

