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

	public function getAttendanceById($id)
	{
		if(isset($_POST['id'])){
			$id = $_POST['id'];
			$sql = "SELECT *, attendance.id as attid FROM attendance LEFT JOIN employees ON employees.emp_id=attendance.employee_id WHERE attendance.id = '$id'";
			$query = $this->db->query($sql);
			return $query->row_array();
	
		
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

	public function deleteAttendance($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('attendance');
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
