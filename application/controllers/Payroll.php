<?php

class Payroll extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Users';


		$this->load->model('model_users');
		$this->load->model('model_roles');
		$this->load->model('model_employees');
		$this->load->model('model_payroll');
	}

	public function attendance()
	{

		if (!in_array('viewUser', $this->permission)) {
			echo $this->permission;
		}

		$user_data = $this->model_users->getUserData();

		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

			$role = $this->model_users->getUserRole($v['id']);
			$result[$k]['user_role'] = $role;
		}

		$this->data['user_data'] = $result;


		$attendance_data = $this->model_payroll->getAttendanceData();
		$result_att = array();
		foreach ($attendance_data as $key => $value) {

			$result_att[$key]['attendance_info'] = $value;
		}

		$this->data['attendance_data'] = $result_att;

		$this->data['employee_count'] =  $this->model_employees->countTotalEmployees();
		$this->data['ontime_percent'] =  $this->model_payroll->calculateOnTimePercentage();
		$this->data['ontime_today'] =  $this->model_payroll->onTimeToday();
		$this->data['late_today'] =  $this->model_payroll->lateToday();
		$this->render_template('payroll/attendance', $this->data);
	}

	public function createAttendance()
	{

		if (!in_array('createUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}


		$employee = $this->model_employees->getEmployeeData($this->input->post('employee'));
		if (!$employee) {
			$this->session->set_flashdata('error', 'Employee not found');
			redirect('payroll/attendance', 'refresh');
		} else {
			$attendance = $this->model_payroll->searchAttendanceById($employee['emp_id'], $this->input->post('date'));
			if ($attendance) {
				$this->session->set_flashdata('error', 'Employee attendance for the day exist');
				redirect('payroll/attendance', 'refresh');
			} else {
				$attendance = $this->model_payroll->createAttendance($employee['schedule_id']);
				if ($attendance == true) {
					$this->session->set_flashdata('success', 'Successfully created');
					redirect('payroll/attendance', 'refresh');
				} else {
					$this->session->set_flashdata('errors', 'Error occurred!!');
					redirect('payroll/attendance', 'refresh');
				}
			}
		}
	}

	public function editAttendance()
	{

		if (!in_array('createUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$attendance = $this->model_payroll->editAttendance();
		if ($attendance == true) {
			$this->session->set_flashdata('success', 'Successfully Edited');
			redirect('payroll/attendance', 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Error occurred!!');
			redirect('payroll/attendance', 'refresh');
		}
		
		
	}

	public function attendanceById()
	{

		if (isset($_POST['id'])) {
			$id = $_POST['id'];
			$attendance_data = $this->model_payroll->getAttendanceById($id);

			echo json_encode($attendance_data);
		}
	}

	public function password_hash($pass = '')
	{
		if ($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}

	
	public function deleteAttendance()
	{

		if (!in_array('deleteUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}


		if (isset($_POST['delete'])) {


			$delete = $this->model_payroll->deleteAttendance($this->input->post('id'));
			if ($delete == true) {
				$this->session->set_flashdata('success', 'Attendance deleted successfully');
				redirect('payroll/attendance/', 'refresh');
			} else {
				$this->session->set_flashdata('error', 'Error occurred!!');
				redirect('payroll/attendance/', 'refresh');
			}
		}
	}

	public function summary()
	{

		if (!in_array('viewUser', $this->permission)) {
			echo $this->permission;
		}

		$user_data = $this->model_users->getUserData();

		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

			$role = $this->model_users->getUserRole($v['id']);
			$result[$k]['user_role'] = $role;
		}

		$this->data['user_data'] = $result;


		$attendance_data = $this->model_payroll->getAttendanceData();
		$result_att = array();
		foreach ($attendance_data as $key => $value) {

			$result_att[$key]['attendance_info'] = $value;
		}

		$this->data['attendance_data'] = $result_att;
		$this->data['deduction'] =$this->model_payroll->getDeduction();
		$this->data['employee_count'] =  $this->model_employees->countTotalEmployees();
		$this->data['ontime_percent'] =  $this->model_payroll->calculateOnTimePercentage();
		$this->data['ontime_today'] =  $this->model_payroll->onTimeToday();
		$this->data['late_today'] =  $this->model_payroll->lateToday();
		$this->render_template('payroll/payroll_summary/index', $this->data);
	}




	public function schedule()
	{

		if (!in_array('viewUser', $this->permission)) {
			echo $this->permission;
		}

		$schedule_data = $this->model_payroll->getScheduleData();

		$result = array();
		foreach ($schedule_data as $k => $v) {

			$result[$k]['schedule_info'] = $v;

		}

		$this->data['schedule_data'] = $result;


		$this->render_template('payroll/schedule/index', $this->data);
	}

}
