<?php 

class Roles extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Roles';
		

		$this->load->model('model_roles');
	}

	public function index()
	{
	
		$roles_data = $this->model_roles->getRoleData();
		$this->data['roles_data'] = $roles_data;

		$this->render_template('roles/index', $this->data);
	}

	public function create()
	{
		if(!in_array('createRole', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case
            $permission = serialize($this->input->post('permission'));
            
        	$data = array(
        		'role' => $this->input->post('role'),
        		'permission' => $permission
        	);

        	$create = $this->model_roles->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('roles/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('roles/create', 'refresh');
        	}
        }
        else {
            // false case
            $this->render_template('roles/create', $this->data);
        }	

		
	}

	public function edit($id = null)
	{
		if(!in_array('updateRole', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if($id) {

			$this->form_validation->set_rules('role', 'Role', 'required');

			if ($this->form_validation->run() == TRUE) {
	            // true case
	            $permission = serialize($this->input->post('permission'));
	            
	        	$data = array(
	        		'role' => $this->input->post('role'),
	        		'permission' => $permission
	        	);

	        	$update = $this->model_roles->edit($data, $id);
	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Successfully updated');
	        		redirect('roles/', 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('roles/edit/'.$id, 'refresh');
	        	}
	        }
	        else {
	            // false case
	            $role_data = $this->model_roles->getRoleData($id);
				$this->data['role_data'] = $role_data;
				$this->render_template('roles/edit', $this->data);	
	        }	
		}

		
	}

	public function delete($id)
	{
		if(!in_array('deleteRole', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
		if($id) {
			if($this->input->post('confirm')) {

				$check = $this->model_roles->existInUserRole($id);
				if($check == true) {
					$this->session->set_flashdata('error', 'Role exists in the users');
	        		redirect('roles/', 'refresh');
				}
				else {
					$delete = $this->model_roles->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('roles/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('roles/delete/'.$id, 'refresh');
		        	}
				}	
			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('roles/delete', $this->data);
			}	
		}
	}


}