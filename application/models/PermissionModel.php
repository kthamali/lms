<?php 

class PermissionModel extends CI_Model
{

	// Define Table Name
	private $tableName = "permission";

	// Get all data
	function GetAll()
	{
		/* select * from tableName */
		$query = $this->db->get($this->tableName);
		return $query->result();
	}

	// Get By Id
	function GetById($id)
	{
		/* select * from tableName where id = para */
		$this->db->where("id", $id);
		$query = $this->db->get($this->tableName);

		return $query->row();
	}

	// Insert Data
	function Insert($data)
	{
		/* Insert into 'tablename' values (1,2,3,4) */
		$this->db->insert($this->tableName, $data);
		return $this->db->insert_id();
	}

	// Update Data
	function Update($id, $data)
	{
		/*UPDATE table_name SET column1 = value1, column2 = value2, ... WHERE condition;*/
		try {
			$this->db->where("id", $id);
			$this->db->Update($this->tableName, $data);
			return true;
		} catch (Exception $e) {
			return false;
		}
		
	}

	// Delete Data
	function Delete($id)
	{
		/* delete from 'table' where id = $id */
		try {
			$this->db->where('id', $id);
			$this->db->delete($this->tableName);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	function GetPermissionCodesByUserId($user_id)
	{
		/*
			select distinct(permission.permissionCode) from permission
			join permission_has_usertype on permission.id = permission_has_usertype.permission_id
			where permission_has_usertype.userType_id in (select usertype_has_user.userType_id from usertype_has_user where usertype_has_user.user_id = 1)
		*/

			$this->db->where("user_id" , $user_id);
			$this->db->select("userType_id");
			$this->db->from("usertype_has_user");

			$sub_query = $this->db->get_compiled_select();


			$this->db->where("permission_has_usertype.usertype_id in ($sub_query)");
			$this->db->select("permission.permissionCode");
			$this->db->distinct("permission.permissionCode");
			$this->db->from("permission");
			$this->db->join("permission_has_usertype", "permission.id = permission_has_usertype.permission_id");
			$q = $this->db->get();


			$code_array = array();

			foreach ($q->result() as $key => $value) {
				array_push($code_array,$value->permissionCode);
			}

			return $code_array;
		}
	}


	?>