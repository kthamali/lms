<?php 

class BorrowedByModel extends CI_Model
{

	// Define Table Name
	private $tableName = "borrowedby";

	// Get all data
	function GetAll()
	{
		/* select * from tableName */
		$query = $this->db->get($this->tableName);
		return $query->result();
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

	// Get all data with details
	function GetAllWithDetails($user_id = null)
	{

		$this->db->select('borrowedby.*, user.username, user.fName, user.lName, book.bookDesc');
		$this->db->from($this->tableName);
		$this->db->join('user', 'borrowedby.user_id = user.id');
		$this->db->join('book', 'borrowedby.book_id = book.id', 'left');

		if ($user_id != null) {
			$this->db->where('borrowedby.user_id', $user_id);
		}

		$query = $this->db->get();

		return $query->result();
	}

}

?>