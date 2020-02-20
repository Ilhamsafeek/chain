<?php

class Sales extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->not_logged_in();

        $this->data['page_title'] = 'Sales';


        $this->load->model('model_finalstock');
        $this->load->model('model_customers');
        $this->load->model('model_quotation');
        $this->load->model('model_invoice');
        $this->load->model('model_payment');
        $this->load->model('model_salesorder');
        $this->load->model('model_products');
        $this->load->model('model_company');
        $this->load->model('model_sales');
        $this->load->model('model_users');

    }
    //Sales Receipt
    public function salesreceipt()
    {

        if(!in_array('viewCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $this->data['customer_data'] = $this->model_customers->getCustomerData();
        $this->data['products'] = $this->model_finalstock->getProductData();
        $company = $this->model_company->getCompanyData(1);
        $this->data['company_data'] = $company;
        $this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
        $this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;


        $this->render_template('transactions/salesandpurchase/sales', $this->data);
    }

    public function createsalesreceipt()
    {

        if(!in_array('createCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

//        $this->form_validation->set_rules('customer', 'Customer', 'trim|required');
//        $this->form_validation->set_rules('material[]', 'Material', 'required');
//        $this->form_validation->set_rules('qty[]', 'Quantity', 'trim|required|number');
//        $this->form_validation->set_rules('cost[]', 'Cost', 'trim|required|number');


//        if ($this->form_validation->run() == TRUE) {
        // true case

        $create = $this->model_sales->create();
        if($create == true) {
            $this->session->set_flashdata('success', 'Successfully created');
            redirect('sales/salesreceipt', 'refresh');
        }
        else {
            $this->session->set_flashdata('errors', 'Error occurred!!');
            redirect('sales/salesreceipt', 'refresh');
        }
//        } else {
//            // false case
//            $this->render_template('transactions/salesandpurchase/purchase', $this->data);
//        }


    }

    public function invoice(){

        if(!in_array('viewCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $this->data['customer_data'] = $this->model_customers->getCustomerData();
        $this->data['products'] = $this->model_finalstock->getProductData();
        $company = $this->model_company->getCompanyData(1);
        $this->data['company_data'] = $company;
        $this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
        $this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;

        $this->render_template('transactions/salesandpurchase/invoice', $this->data);
    }

    public function createinvoice()
    {

        if(!in_array('createCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

//        $this->form_validation->set_rules('customer', 'Customer', 'trim|required');
//        $this->form_validation->set_rules('material[]', 'Material', 'required');
//        $this->form_validation->set_rules('qty[]', 'Quantity', 'trim|required|number');
//        $this->form_validation->set_rules('cost[]', 'Cost', 'trim|required|number');


//        if ($this->form_validation->run() == TRUE) {
        // true case

        $create = $this->model_invoice->create();
        if($create == true) {
            $this->session->set_flashdata('success', 'Successfully created');
            redirect('sales/invoice', 'refresh');
        }
        else {
            $this->session->set_flashdata('errors', 'Error occurred!!');
            redirect('sales/invoice', 'refresh');
        }
//        } else {
//            // false case
//            $this->render_template('transactions/salesandpurchase/purchase', $this->data);
//        }


    }

    public function quotation(){

        if(!in_array('viewCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $this->data['products'] = $this->model_finalstock->getProductData();
        $this->data['customer_data'] = $this->model_customers->getCustomerData();

        $company = $this->model_company->getCompanyData(1);
        $this->data['company_data'] = $company;
        $this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
        $this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;


        $this->render_template('transactions/salesandpurchase/quotation', $this->data);
    }

    public function createquotation(){

        if(!in_array('createCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

//        $this->form_validation->set_rules('customer', 'Customer', 'trim|required');
//        $this->form_validation->set_rules('material[]', 'Material', 'required');
//        $this->form_validation->set_rules('qty[]', 'Quantity', 'trim|required|number');
//        $this->form_validation->set_rules('cost[]', 'Cost', 'trim|required|number');


//        if ($this->form_validation->run() == TRUE) {
        // true case

        $create = $this->model_quotation->create();
        if($create == true) {
            $this->session->set_flashdata('success', 'Successfully created');
            redirect('sales/quotation', 'refresh');
        }
        else {
            $this->session->set_flashdata('errors', 'Error occurred!!');
            redirect('sales/quotation', 'refresh');
        }
//        } else {
//            // false case
//            $this->render_template('transactions/salesandpurchase/purchase', $this->data);
//        }

    }

    public function payment(){

        if(!in_array('viewCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $this->data['customer_data'] = $this->model_customers->getCustomerData();

        $this->render_template('transactions/salesandpurchase/payment', $this->data);
    }

    public function createpayment(){

        if(!in_array('createCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

//        $this->form_validation->set_rules('customer', 'Customer', 'trim|required');
//        $this->form_validation->set_rules('material[]', 'Material', 'required');
//        $this->form_validation->set_rules('qty[]', 'Quantity', 'trim|required|number');
//        $this->form_validation->set_rules('cost[]', 'Cost', 'trim|required|number');


//        if ($this->form_validation->run() == TRUE) {
        // true case

        $create = $this->model_payment->create();
        if($create == true) {
            $this->session->set_flashdata('success', 'Successfully created');
            redirect('sales/payment', 'refresh');
        }
        else {
            $this->session->set_flashdata('errors', 'Error occurred!!');
            redirect('sales/payment', 'refresh');
        }
//        } else {
//            // false case
//            $this->render_template('transactions/salesandpurchase/purchase', $this->data);
//        }

    }

    public function salesorder()
    {
        if (!in_array('createOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $this->data['page_title'] = 'Create Order';


        $this->form_validation->set_rules('customer', 'Customer', 'trim|required');
        $this->form_validation->set_rules('product[]', 'Product name', 'trim|required');
        $this->form_validation->set_rules('qty[]', 'Quantity', 'trim|numeric|required');



        if ($this->form_validation->run() == TRUE) {

            $order_id = $this->model_salesorder->create();

            if ($order_id) {
                $this->session->set_flashdata('success', 'Successfully created');
                redirect('sales/salesorder/' . $order_id, 'refresh');
            } else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('sales/salesorder/', 'refresh');
            }
        } else {
            $this->data['customer_data'] = $this->model_customers->getCustomerData();
            $this->data['products'] = $this->model_finalstock->getProductData();

            $this->render_template('transactions/salesandpurchase/salesorder', $this->data);
        }


    }

    public function createsalesorder()
    {
        if (!in_array('createOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $this->data['page_title'] = 'Add Order';

        $this->form_validation->set_rules('product[]', 'Product name', 'trim|required');


       // if ($this->form_validation->run() == TRUE) {

            $order_id = $this->model_salesorder->create();

            if ($order_id) {
                $this->session->set_flashdata('success', 'Successfully created');
                redirect('sales/salesorder/' . $order_id, 'refresh');
            } else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('sales/salesorder/', 'refresh');
            }
//        } else {
//            // false case
//            $this->data['table_data'] = $this->model_tables->getActiveTable();
//            $company = $this->model_company->getCompanyData(1);
//            $this->data['company_data'] = $company;
//            $this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
//            $this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;
//
//            $this->data['products'] = $this->model_products->getActiveProductData();
//
//            $this->render_template('orders/create', $this->data);
//        }
    }


    public function history()
    {
        if (!in_array('createOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }


        $sales_data = $this->model_sales->getSalesData();
        $result = array();
        foreach ($sales_data as $k => $v) {

            $result[$k]['sales_info'] = $v;

        }

        $this->data['sales_data'] = $result;

        $this->render_template('transactions/salesandpurchase/saleshistory', $this->data);

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


                $delete = $this->model_sales->delete($id);
                if($delete == true) {
                    $this->session->set_flashdata('success', 'Successfully removed');
                    redirect('sales/history', 'refresh');
                }
                else {
                    $this->session->set_flashdata('error', 'Error occurred!!');
                    redirect('sales/delete/'.$id, 'refresh');
                }

            }
            else {
                $this->data['id'] = $id;
                $this->render_template('transactions/salesandpurchase/saleshistory', $this->data);
            }
        }
    }


}