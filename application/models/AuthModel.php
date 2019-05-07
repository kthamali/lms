<?php 

class AuthModel extends CI_Model
{
	function Login($username, $password)
	{

		$encrypted_password = md5($password);

		$this->db->where('username', $username);
		$this->db->where('userPassword', $encrypted_password);
		$this->db->select('id,fName, lName, username');
		$result = $this->db->get('user');

		if ($result->num_rows() == 1) {
			return $result->row();
		}else{
			return null;
		}
	}
}