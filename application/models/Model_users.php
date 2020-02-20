<?php 

class Model_users extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getUserData($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM users WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM users WHERE id != ? ORDER BY id DESC";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getUserRole($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM users WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			$result = $query->row_array();

			$role_id = $result['role_id'];
			$g_sql = "SELECT * FROM roles WHERE id = ?";
			$g_query = $this->db->query($g_sql, array($role_id));
			$q_result = $g_query->row_array();
			return $q_result;
		}
	}

	public function create($data = '')
	{

		if($data) {
			$create = $this->db->insert('users', $data);

			$user_id = $this->db->insert_id();

		
			return ($create == true) ? true : false;
		}
	}

	public function edit($data = array(), $id = null, $role_id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('users', $data);

		if($role_id) {
			// user group
			$update_user_role = array('role_id' => $role_id);
			$this->db->where('id', $id);
			$user_role = $this->db->update('users', $update_user_role);
			return ($update == true && $user_role == true) ? true : false;	
		}
			
		return ($update == true) ? true : false;	
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('users');
		return ($delete == true) ? true : false;
	}

	public function countTotalUsers()
	{
		$sql = "SELECT * FROM users WHERE id != ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}
	
}