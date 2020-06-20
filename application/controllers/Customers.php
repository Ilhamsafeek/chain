<?php 

class Customers extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Customers';
		

		$this->load->model('model_customers');
		$this->load->model('model_users');
		
	}

	public function index()
	{

		if(!in_array('viewCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$customer_data = $this->model_customers->getCustomerData();

		$result = array();
		foreach ($customer_data as $k => $v) {

			$result[$k]['customer_info'] = $v;


		}

		$this->data['customer_data'] = $result;

		$this->render_template('customers/index', $this->data);

		
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
        	);

        	$create = $this->model_customers->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('customers/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('customers/create', 'refresh');
        	}
        }
        else {
            // false case
           

            $this->render_template('customers/create', $this->data);
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
			        	);

			        	$update = $this->model_customers->edit($data, $id);
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('customers/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('customers/edit/'.$id, 'refresh');
			        	}
					}
			        else {
			            // false case
			        	$customer_data = $this->model_customers->getCustomerData($id);
			        	
			        	$this->data['customer_data'] = $customer_data;
			        
						$this->render_template('customers/edit', $this->data);	
			        }	

		        
	        }
	        else {
	            // false case
	        	$customer_data = $this->model_customers->getCustomerData($id);

	        	$this->data['customer_data'] = $customer_data;

				$this->render_template('customers/edit', $this->data);	
	        }	
		}	
	}

	public function delete($id)
	{

		if(!in_array('deleteCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if($id) {
			if($this->input->post('confirm')) {

				
					$delete = $this->model_customers->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('customers/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('customers/delete/'.$id, 'refresh');
		        	}

			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('customers/delete', $this->data);
			}	
		}
	}



}