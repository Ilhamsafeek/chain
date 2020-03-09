<?php 

class Model_employees extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getEmployeeData($employeeId = null) 
	{
		if($employeeId) {
			$sql = "SELECT * FROM employees WHERE emp_id = ?";
			$query = $this->db->query($sql, array($employeeId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM employees WHERE id != ? ORDER BY id DESC";
		$query = $this->db->query($sql, array(0));
		return $query->result_array();
	}

	public function getEmployeeRole($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM employees WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			$result = $query->row_array();

			$role_id = $result['role'];
			$g_sql = "SELECT * FROM roles WHERE id = ?";
			$g_query = $this->db->query($g_sql, array($role_id));
			$q_result = $g_query->row_array();
			return $q_result;
		}
	}

	public function create($data = '')
	{

		if($data) {
			$create = $this->db->insert('employees', $data);
			$this->db->insert_id();

			
			return ($create == true) ? true : false;
		}
	}

	public function edit($data = array(), $id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('employees', $data);

		return ($update == true) ? true : false;	
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('employees');
		return ($delete == true) ? true : false;
	}

	public function countTotalEmployees()
	{
		$sql = "SELECT * FROM employees";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
}