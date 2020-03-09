<?php

class Employees extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'employees';


		$this->load->model('model_employees');
		$this->load->model('model_users');
		$this->load->model('model_roles');
	}

	public function index()
	{

		if (!in_array('viewCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$employee_data = $this->model_employees->getEmployeeData();

		$result = array();
		foreach ($employee_data as $k => $v) {

			$result[$k]['employee_info'] = $v;
			$role = $this->model_employees->getEmployeeRole($v['id']);
			$result[$k]['user_role'] = $role;
		}


		$this->data['employee_data'] = $result;

		$this->render_template('employees/index', $this->data);
	}

	public function create()
	{

		if (!in_array('createCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[10]');


		if ($this->form_validation->run() == TRUE) {
			// true case

			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'phone' => $this->input->post('phone'),
				'gender' => $this->input->post('gender'),
				'basic' => $this->input->post('basic'),
				'emp_id' => $this->input->post('emp_id'),
				'role' => $this->input->post('role'),
				'allowance' => $this->input->post('allowance'),
				'ot' => $this->input->post('ot'),
			);

			$create = $this->model_employees->create($data);
			if ($create == true) {
				$this->session->set_flashdata('success', 'Successfully created');
				redirect('employees/', 'refresh');
			} else {
				$this->session->set_flashdata('errors', 'Error occurred!!');
				redirect('employees/create', 'refresh');
			}
		} else {
			// false case
			$role_data = $this->model_roles->getRoleData();
			$this->data['role_data'] = $role_data;


			$this->render_template('employees/create', $this->data);
		}
	}



	public function edit($id = null)
	{

		if (!in_array('updateCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if ($id) {
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[10]');


			if ($this->form_validation->run() == TRUE) {
				// true case


				if ($this->form_validation->run() == TRUE) {


					$data = array(
						'name' => $this->input->post('name'),
						'email' => $this->input->post('email'),
						'address' => $this->input->post('address'),
						'phone' => $this->input->post('phone'),
						'gender' => $this->input->post('gender'),
						'basic' => $this->input->post('basic'),
						'emp_id' => $this->input->post('emp_id'),
						'role' => $this->input->post('role'),
						'allowance' => $this->input->post('allowance'),
						'ot' => $this->input->post('ot'),
					);

					$update = $this->model_employees->edit($data, $id);
					if ($update == true) {
						$this->session->set_flashdata('success', 'Successfully updated');
						redirect('employees/', 'refresh');
					} else {
						$this->session->set_flashdata('errors', 'Error occurred!!');
						redirect('employees/edit/' . $id, 'refresh');
					}
				} else {
					// false case
					$employee_data = $this->model_employees->getEmployeeData($id);

					$this->data['employee_data'] = $employee_data;

					$this->render_template('employees/edit', $this->data);
				}
			} else {
				// false case
				$employee_data = $this->model_employees->getEmployeeData($id);

				$this->data['employee_data'] = $employee_data;

				$roles = $this->model_users->getUserRole($id);


				$this->data['user_role'] = $roles;

				$role_data = $this->model_roles->getRoleData();
				$this->data['role_data'] = $role_data;
				$this->render_template('employees/edit', $this->data);
			}
		}
	}

	public function delete($id)
	{

		if (!in_array('deleteCustomer', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if ($id) {
			if ($this->input->post('confirm')) {


				$delete = $this->model_employees->delete($id);
				if ($delete == true) {
					$this->session->set_flashdata('success', 'Successfully removed');
					redirect('employees/', 'refresh');
				} else {
					$this->session->set_flashdata('error', 'Error occurred!!');
					redirect('employees/delete/' . $id, 'refresh');
				}
			} else {
				$this->data['id'] = $id;
				$this->render_template('employees/delete', $this->data);
			}
		}
	}
}
