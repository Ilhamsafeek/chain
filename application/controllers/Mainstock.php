<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mainstock extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->not_logged_in();

        $this->data['page_title'] = 'Main Stock';

        $this->load->model('model_mainstock');
        $this->load->model('model_category');
        $this->load->model('model_customers');
    }

    /* 
    * It only redirects to the manage product page
    */
    public function index()
    {
        if (!in_array('createProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $material_data = $this->model_mainstock->getMaterialData();

        $result = array();
        foreach ($material_data as $k => $v) {

            $result[$k]['material_info'] = $v;
        }

        $this->data['material_data'] = $result;
        $this->render_template('mainstock/index', $this->data);

    }


    public function create()
    {
        $create = $this->model_mainstock->createMaterial();
        if ($create == true) {
            $this->session->set_flashdata('success', 'Successfully created');
            redirect('mainstock/', 'refresh');
        } else {
            $this->session->set_flashdata('errors', 'Error occurred!!');
            redirect('mainstock/', 'refresh');
        }
    }
    /*
    * It Fetches the products data from the product table 
    * this function is called from the datatable ajax function
    */
    public function fetchProductData()
    {
        if (!in_array('viewProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $result = array('data' => array());

        $data = $this->model_products->getProductData();

        foreach ($data as $key => $value) {
            $store_ids = json_decode($value['store_id']);


            $store_name = array();
            foreach ($store_ids as $k => $v) {
                $store_data = $this->model_stores->getStoresData($v);
                $store_name[] = $store_data['name'];
            }

            $store_name = implode(', ', $store_name);


            // button
            $buttons = '';
            if (in_array('updateProduct', $this->permission)) {
                $buttons .= '<a href="' . base_url('products/update/' . $value['id']) . '" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
            }

            if (in_array('deleteProduct', $this->permission)) {
                $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
            }


            $img = '<img src="' . base_url($value['image']) . '" alt="' . $value['name'] . '" class="img-circle" width="50" height="50" />';

            $availability = ($value['active'] == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';

            $result['data'][$key] = array(
                $img,
                $value['name'],
                $value['price'],
                $store_name,
                $availability,
                $buttons
            );
        } // /foreach

        echo json_encode($result);
    }


    /*
    * If the validation is not valid, then it redirects to the edit product page 
    * If the validation is successfully then it updates the data into the database 
    * and it stores the operation message into the session flashdata and display on the manage product page
    */
    public function editMaterial($id = null)
    {

        if ($id) {

            $edit = $this->model_mainstock->editMaterial($id);
            if ($edit == true) {
                $this->session->set_flashdata('success', 'Successfully removed');
                redirect('mainstock/', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Error occurred!!');
                redirect('mainstock/', 'refresh');
            }
        }
    }

    /*
    * It removes the data from the database
    * and it returns the response into the json format
    */
    public function deletematerial($id = null)
    {

        if (!in_array('deleteCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        if ($id) {

            $delete = $this->model_mainstock->deleteMaterial($id);
            if ($delete == true) {
                $this->session->set_flashdata('success', 'Successfully removed');
                redirect('mainstock/', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Error occurred!!');
                redirect('mainstock/', 'refresh');
            }
        }
    }
}
