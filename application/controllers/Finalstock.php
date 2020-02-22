<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Finalstock extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->not_logged_in();

        $this->data['page_title'] = 'Main Stock';

        $this->load->model('model_mainstock');
        $this->load->model('model_finalstock');
        $this->load->model('model_category');
        $this->load->model('model_customers');
    }

    /*
    * It only redirects to the manage product page
    */
    public function index()
    {
        if(!in_array('createProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('name', 'Product Name', 'trim|required|is_unique[materials.name]');
        $this->form_validation->set_rules('unit', 'Unit', 'trim|required');
        $this->form_validation->set_rules('reorderlevel', 'Re Order Level', 'trim|required|numeric');
        $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');


        if ($this->form_validation->run() == TRUE) {
            // true case

            $data = array(
                'name' => $this->input->post('name'),
                'unit' => $this->input->post('unit'),
                'reorderlevel' => $this->input->post('reorderlevel'),
                'price' => $this->input->post('price'),

            );

            $create = $this->model_finalstock->createProduct($data);
            if($create == true) {
                $this->session->set_flashdata('success', 'Successfully created');
                redirect('finalstock/', 'refresh');
            }
            else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('finalstock/', 'refresh');
            }
        }
        else {
            // false case
            $product_data = $this->model_finalstock->getProductData();

            $product = array();
            foreach ($product_data as $k => $v) {

                $product[$k]['product_info'] = $v;
            }

            $this->data['product_data'] = $product;

            $material_data = $this->model_mainstock->getMaterialData();

            $material = array();
            foreach ($material_data as $k => $v) {

                $material[$k]['material_info'] = $v;
            }

            $this->data['$material_data'] = $material;
            $this->render_template('finalstock/index', $this->data);
        }
    }

    /*
    * It Fetches the products data from the product table
    * this function is called from the datatable ajax function
    */
    public function fetchProductData()
    {
        if(!in_array('viewProduct', $this->permission)) {
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
            if(in_array('updateProduct', $this->permission)) {
                $buttons .= '<a href="'.base_url('products/update/'.$value['id']).'" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
            }

            if(in_array('deleteProduct', $this->permission)) {
                $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
            }


            $img = '<img src="'.base_url($value['image']).'" alt="'.$value['name'].'" class="img-circle" width="50" height="50" />';

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
    public function update($product_id)
    {
        if(!in_array('updateProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        if(!$product_id) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('product_name', 'Product name', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('active', 'active', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // true case

            $data = array(
                'name' => $this->input->post('product_name'),
                'price' => $this->input->post('price'),
                'description' => $this->input->post('description'),
                'category_id' => json_encode($this->input->post('category')),
                'store_id' => json_encode($this->input->post('store')),
                'active' => $this->input->post('active'),
            );


            if($_FILES['product_image']['size'] > 0) {
                $upload_image = $this->upload_image();
                $upload_image = array('image' => $upload_image);

                $this->model_products->update($upload_image, $product_id);
            }

            $update = $this->model_products->update($data, $product_id);
            if($update == true) {
                $this->session->set_flashdata('success', 'Successfully updated');
                redirect('products/', 'refresh');
            }
            else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('products/update/'.$product_id, 'refresh');
            }
        }
        else {

            $this->render_template('mainstock/edit', $this->data);
        }
    }

    /*
    * It removes the data from the database
    * and it returns the response into the json format
    */
    public function deleteproduct($id = null)
    {

        if(!in_array('deleteCustomer', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        if($id) {
            if($this->input->post('confirm')) {


                $delete = $this->model_finalstock->deleteProduct($id);
                if($delete == true) {
                    $this->session->set_flashdata('success', 'Successfully removed');
                    redirect('finalstock/', 'refresh');
                }
                else {
                    $this->session->set_flashdata('error', 'Error occurred!!');
                    redirect('finalstock/deleteproduct/'.$id, 'refresh');
                }

            }
            else {
                $this->data['id'] = $id;
                $this->render_template('finalstock/deleteproduct', $this->data);
            }
        }




    }

}