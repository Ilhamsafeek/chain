<?php 

class Suppliers extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Customers';
		

		$this->load->model('model_suppliers');
		$this->load->model('model_users');
		
	}

	public function index()
	{

		if(!in_array('viewCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $supplier_data = $this->model_suppliers->getSupplierData();

		$result = array();
		foreach ($supplier_data as $k => $v) {

			$result[$k]['supplier_info'] = $v;

		}

		$this->data['supplier_data'] = $result;


        $this->render_template('suppliers/index', $this->data);
	}

	public function create()
	{

		if(!in_array('createCustomer', $this->permission)) {
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
                'web' => $this->input->post('web'),
                'source' => $this->input->post('source'),
                'overview' => $this->input->post('overview'),
                'status' => 'pending',
        	);

        	$create = $this->model_suppliers->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('suppliers/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('suppliers/create', 'refresh');
        	}
        }
        else {
            // false case
           

            $this->render_template('suppliers/create', $this->data);
        }	

		
	}


	public function edit($id = null)
	{

		if(!in_array('updateCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if($id) {
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[10]');


			if ($this->form_validation->run() == TRUE) {
	            // true case
		        

					if($this->form_validation->run() == TRUE) {

					
						$data = array(
                            'name' => $this->input->post('name'),
                            'email' => $this->input->post('email'),
                            'address' => $this->input->post('address'),
                            'phone' => $this->input->post('phone'),
                            'web' => $this->input->post('web'),
                            'source' => $this->input->post('source'),
                            'overview' => $this->input->post('overview'),
			        	);

			        	$update = $this->model_suppliers->edit($data, $id);
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('suppliers/profile/'.$id, 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('suppliers/edit/'.$id, 'refresh');
			        	}
					}
			        else {
			            // false case
			        	$supplier_data = $this->model_suppliers->getSupplierData($id);
			        	
			        	$this->data['supplier_data'] = $supplier_data;
			        
						$this->render_template('suppliers/edit', $this->data);
			        }	

		        
	        }
	        else {
	            // false case
	        	$supplier_data = $this->model_suppliers->getSupplierData($id);

	        	$this->data['supplier_data'] = $supplier_data;

				$this->render_template('suppliers/edit', $this->data);
	        }	
		}	
	}

    public function updateStatus($id)
    {

        if(!in_array('updateCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

                    $data = array(
                        'status' => $this->input->post('status'),

                        );

                    $update = $this->model_suppliers->edit($data, $id);
                    if($update == true) {
                        $this->session->set_flashdata('success', 'Successfully updated');
                        redirect('suppliers/profile/'.$id, 'refresh');
                    }
                    else {
                        $this->session->set_flashdata('errors', 'Error occurred!!');
                        redirect('suppliers/profile/'.$id, 'refresh');
                    }



    }

    public function createReview($id)
    {

        if(!in_array('createCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('source', 'Source', 'trim|required');
        $this->form_validation->set_rules('review', 'Review', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case

            $data = array(
                'supplier_id' => $id,
                'source' => $this->input->post('source'),
                'review' => $this->input->post('review'),
                'date_time' =>date("h:i a d.m.Y"),

            );

            $create = $this->model_suppliers->createReview($data);
            if($create == true) {
                $this->session->set_flashdata('success', 'Successfully created');
                redirect('suppliers/profile/'.$id, 'refresh');
            }
            else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('suppliers/profile/'.$id, 'refresh');
            }
        }
        else {
            // false case


            redirect('suppliers/profile/'.$id, 'refresh');
        }


    }

    public function createSample($id)
    {

        if(!in_array('createCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('item', 'Item', 'trim|required');
        $this->form_validation->set_rules('note', 'Note', 'required');


        if ($this->form_validation->run() == TRUE) {
            // true case

            $data = array(
                'supplier_id' => $id,
                'item' => $this->input->post('item'),
                'note' => $this->input->post('note'),
                'date_time' =>date("h:i a d.m.Y"),
                'status' => 'Requested',


            );

            $create = $this->model_suppliers->createSample($data);
            if($create == true) {
                $this->session->set_flashdata('success', 'Successfully created');
                redirect('suppliers/profile/'.$id, 'refresh');
            }
            else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('suppliers/profile/'.$id, 'refresh');
            }
        }
        else {
            // false case


            redirect('suppliers/profile/'.$id, 'refresh');
        }


    }


    public function delete($id)
	{

		if(!in_array('deleteCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if($id) {
			if($this->input->post('confirm')) {

				
					$delete = $this->model_suppliers->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('suppliers/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('suppliers/delete/'.$id, 'refresh');
		        	}

			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('suppliers/delete', $this->data);
			}	
		}
	}

    public function deleteReview($id,$supplier_id)
    {

        if(!in_array('deleteCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        if($id) {

                $delete = $this->model_suppliers->deleteReview($id);
                if($delete == true) {
                    $this->session->set_flashdata('success', 'Successfully removed');
                    redirect('suppliers/profile/'.$supplier_id, 'refresh');
                }
                else {
                    $this->session->set_flashdata('error', 'Error occurred!!');
                    redirect('suppliers/profile/'.$supplier_id, 'refresh');
                }


        }
    }

    public function profile($id)
	{

		if(!in_array('viewProfile', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        // false case
        $supplier_data = $this->model_suppliers->getSupplierData($id);
        $this->data['supplier_data'] = $supplier_data;

        $supplier_review_data = $this->model_suppliers->getSupplierReviewData($id);
        $result = array();
        foreach ($supplier_review_data as $k => $v) {

            $result[$k]['supplier_review_info'] = $v;

        }


        $this->data['supplier_review_data'] = $result;


        $supplier_sample_data = $this->model_suppliers->getSupplierSampleData($id);
        $result_sample = array();
        foreach ($supplier_sample_data as $k => $v) {

            $result_sample[$k]['supplier_sample_info'] = $v;

        }


        $this->data['supplier_sample_data'] = $result_sample;

        $this->render_template('suppliers/profile', $this->data);
	}

	public function setting()
	{
		if(!in_array('updateSetting', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
		$id = $this->session->userdata('id');

		if($id) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('fname', 'First name', 'trim|required');


			if ($this->form_validation->run() == TRUE) {
	            // true case
		        if(empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
		        	$data = array(
		        		'username' => $this->input->post('username'),
		        		'email' => $this->input->post('email'),
		        		'firstname' => $this->input->post('fname'),
		        		'lastname' => $this->input->post('lname'),
		        		'phone' => $this->input->post('phone'),
		        		'gender' => $this->input->post('gender'),
		        	);

		        	$update = $this->model_customers->edit($data, $id, $this->input->post('roles'));
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully updated');
		        		redirect('customers/setting/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('customers/setting/', 'refresh');
		        	}
		        }
		        else {
		        	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if($this->form_validation->run() == TRUE) {

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

			        	$update = $this->model_customers->edit($data, $id, $this->input->post('roles'));
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('customers/setting/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('customers/setting/', 'refresh');
			        	}
					}
			        else {
			            // false case
			        	$user_data = $this->model_customers->getUserData($id);
			        	$roles = $this->model_customers->getUserRole($id);

			        	$this->data['user_data'] = $user_data;
			        	$this->data['user_role'] = $roles;

			            $role_data = $this->model_roles->getRoleData();
			        	$this->data['role_data'] = $role_data;

						$this->render_template('customers/setting', $this->data);	
			        }	

		        }
	        }
	        else {
	            // false case
	        	$user_data = $this->model_customers->getUserData($id);
	        	$roles = $this->model_customers->getUserRole($id);

	        	$this->data['user_data'] = $user_data;
	        	$this->data['user_role'] = $roles;

	            $role_data = $this->model_roles->getRoelData();
	        	$this->data['role_data'] = $role_data;

				$this->render_template('customers/setting', $this->data);	
	        }	
		}
	}


}