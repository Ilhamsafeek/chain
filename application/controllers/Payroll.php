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

	public function edit_attendance($id = null)
	{

		if (!in_array('updateUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}


		// true case
		if (empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
			$data = array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'firstname' => $this->input->post('fname'),
				'lastname' => $this->input->post('lname'),
				'phone' => $this->input->post('phone'),
				'gender' => $this->input->post('gender'),
				'role_id' => $this->input->post('role'),
			);

			$update = $this->model_users->edit($data, $id, $this->input->post('roles'));
			if ($update == true) {
				$this->session->set_flashdata('success', 'Successfully created');
				redirect('users/', 'refresh');
			} else {
				$this->session->set_flashdata('errors', 'Error occurred!!');
				redirect('users/edit/' . $id, 'refresh');
			}
		} else {
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

			if ($this->form_validation->run() == TRUE) {

				$password = $this->password_hash($this->input->post('password'));

				$data = array(
					'username' => $this->input->post('username'),
					'password' => $password,
					'email' => $this->input->post('email'),
					'firstname' => $this->input->post('fname'),
					'lastname' => $this->input->post('lname'),
					'phone' => $this->input->post('phone'),
					'gender' => $this->input->post('gender'),
					'store_id' => $this->input->post('store'),
				);

				$update = $this->model_users->edit($data, $id, $this->input->post('roles'));
				if ($update == true) {
					$this->session->set_flashdata('success', 'Successfully updated');
					redirect('users/', 'refresh');
				} else {
					$this->session->set_flashdata('errors', 'Error occurred!!');
					redirect('users/edit/' . $id, 'refresh');
				}
			} else {
				// false case
				$user_data = $this->model_users->getUserData($id);
				$roles = $this->model_users->getUserRole($id);

				$this->data['user_data'] = $user_data;
				$this->data['user_role'] = $roles;

				$role_data = $this->model_roles->getRoleData();
				$this->data['role_data'] = $role_data;

				$this->render_template('users/edit', $this->data);
			}
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

	public function profile()
	{

		if (!in_array('viewProfile', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$user_id = $this->session->userdata('id');

		$user_data = $this->model_users->getUserData($user_id);
		$this->data['user_data'] = $user_data;

		$user_role = $this->model_users->getUserRole($user_id);
		$this->data['user_role'] = $user_role;

		$this->render_template('users/profile', $this->data);
	}

	public function setting()
	{
		if (!in_array('updateSetting', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$id = $this->session->userdata('id');

		if ($id) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('fname', 'First name', 'trim|required');


			if ($this->form_validation->run() == TRUE) {
				// true case
				if (empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
					$data = array(
						'username' => $this->input->post('username'),
						'email' => $this->input->post('email'),
						'firstname' => $this->input->post('fname'),
						'lastname' => $this->input->post('lname'),
						'phone' => $this->input->post('phone'),
						'gender' => $this->input->post('gender'),
					);

					$update = $this->model_users->edit($data, $id, $this->input->post('roles'));
					if ($update == true) {
						$this->session->set_flashdata('success', 'Successfully updated');
						redirect('users/setting/', 'refresh');
					} else {
						$this->session->set_flashdata('errors', 'Error occurred!!');
						redirect('users/setting/', 'refresh');
					}
				} else {
					$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if ($this->form_validation->run() == TRUE) {

						$password = $this->password_hash($this->input->post('password'));

						$data = array(
							'username' => $this->input->post('username'),
							'password' => $password,
							'email' => $this->input->post('email'),
							'firstname' => $this->input->post('fname'),
							'lastname' => $this->input->post('lname'),
							'phone' => $this->input->post('phone'),
							'gender' => $this->input->post('gender'),
						);

						$update = $this->model_users->edit($data, $id, $this->input->post('roles'));
						if ($update == true) {
							$this->session->set_flashdata('success', 'Successfully updated');
							redirect('users/setting/', 'refresh');
						} else {
							$this->session->set_flashdata('errors', 'Error occurred!!');
							redirect('users/setting/', 'refresh');
						}
					} else {
						// false case
						$user_data = $this->model_users->getUserData($id);
						$roles = $this->model_users->getUserRole($id);

						$this->data['user_data'] = $user_data;
						$this->data['user_role'] = $roles;

						$role_data = $this->model_roles->getRoleData();
						$this->data['role_data'] = $role_data;

						$this->render_template('users/setting', $this->data);
					}
				}
			} else {
				// false case
				$user_data = $this->model_users->getUserData($id);
				$roles = $this->model_users->getUserRole($id);

				$this->data['user_data'] = $user_data;
				$this->data['user_role'] = $roles;

				$role_data = $this->model_roles->getRoleData();
				$this->data['role_data'] = $role_data;

				$this->render_template('users/setting', $this->data);
			}
		}
	}
}
