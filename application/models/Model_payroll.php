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

		$sql = "SELECT *, attendance.id as attid FROM attendance LEFT JOIN employees ON employees.emp_id=attendance.employee_id WHERE attendance.id = '$id'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function searchAttendanceById($emp_id, $date)
	{

		$sql = "SELECT * FROM attendance WHERE employee_id = '$emp_id' AND date = '$date'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function createAttendance($schedule_id)
	{
		$employee = $_POST['employee'];
		$date = $_POST['date'];
		$time_in = $_POST['time_in'];
		$time_in = date('H:i:s', strtotime($time_in));
		$time_out = $_POST['time_out'];
		$time_out = date('H:i:s', strtotime($time_out));


		$sql = "SELECT * FROM schedules WHERE id = ?";
		$query = $this->db->query($sql, array($schedule_id));
		$scherow = $query->row_array();

		$logstatus = ($time_in > $scherow['time_in']) ? 0 : 1;

		$id = $this->db->insert_id();
    	$data = array(

            'employee_id' => $employee,
            'date' => $date,
            'time_in' => $time_in,
            'time_out' => $time_out,
            'status' => $logstatus,
            
    	);

		$insert = $this->db->insert('attendance', $data);

		if ($insert) {
			
			$sql = "SELECT * FROM employees LEFT JOIN schedules ON schedules.id=employees.schedule_id WHERE employees.emp_id = '$employee'";
			
			$query = $this->db->query($sql);
			$srow = $query->row_array();

			if ($srow['time_in'] > $time_in) {
				$time_in = $srow['time_in'];
			}

			if ($srow['time_out'] < $time_out) {
				$time_out = $srow['time_out'];
			}

			$time_in = new DateTime($time_in);
			$time_out = new DateTime($time_out);
			$interval = $time_in->diff($time_out);
			$hrs = $interval->format('%h');
			$mins = $interval->format('%i');
			$mins = $mins / 60;
			$int = $hrs + $mins;
			if ($int > 4) {
				$int = $int - 1;
			}

			$data2 = array(

				'num_hr' => $int	
			);

			$this->db->where('id', $id);
			$update = $this->db->update('attendance', $data2);

			return ($update == true) ? true : false;
		}
	}
	public function searchSceduleById($id)
	{

		$sql = "SELECT * FROM schedules WHERE id = '$id'";
		$query = $this->db->query($sql);
		return $query->row_array();
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
