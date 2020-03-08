<?php

class Model_payroll extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAttendanceData($employeeId = null)
	{
		if ($employeeId) {
			$sql = "SELECT * FROM employees WHERE id = ?";
			$query = $this->db->query($sql, array($employeeId));
			return $query->row_array();
		}

		$sql = "SELECT *, employees.emp_id AS emp_id, attendance.id AS attid FROM attendance LEFT JOIN employees ON employees.emp_id=attendance.employee_id ORDER BY attendance.date DESC, attendance.time_in DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getEmployeeRole($userId = null)
	{
		if ($userId) {
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

		if ($data) {
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

	public function calculateOnTimePercentage()
	{

		$sql = "SELECT * FROM attendance";
		$query = $this->db->query($sql);
		$total = $query->num_rows();


		$sql = "SELECT * FROM attendance WHERE status = 1";
		$query = $this->db->query($sql);
		$early = $query->num_rows;

		$percentage = ($early / $total) * 100;

		return number_format($percentage, 2);
	}

	public function onTimeToday()
	{
		$today = date('Y-m-d');
		$sql = "SELECT * FROM attendance WHERE date = '$today' AND status = 1";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	
	public function lateToday()
	{
		$today = date('Y-m-d');

		$sql = "SELECT * FROM attendance WHERE date = '$today' AND status = 0";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
}
