<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->not_logged_in();

        $this->data['page_title'] = 'Task';

        $this->load->model('model_task');
        $this->load->model('model_mainstock');
            $this->load->model('model_finalstock');
    }

    /* 
    * It redirects to the company page and displays all the company information
    * It also updates the company information into the database if the 
    * validation for each input field is successfully valid
    */
    public function index()
    {
        if (!in_array('createOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }


        $task_data = $this->model_task->getTaskData();
        $result = array();
        foreach ($task_data as $k => $v) {

            $result[$k]['task_info'] = $v;

        }

        $this->data['task_data'] = $result;

        $this->data['materials'] = $this->model_mainstock->getMaterialData();
        $this->data['products'] = $this->model_finalstock->getProductData();

        $this->render_template('task/index', $this->data);



    }

    public function all()
    {
        if (!in_array('createOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }


        $task_data = $this->model_task->getTaskData();
        $result = array();
        foreach ($task_data as $k => $v) {

            $result[$k]['task_info'] = $v;

        }

        $this->data['task_data'] = $result;

        $this->render_template('task/alltask', $this->data);



    }

    public function createTask()
    {
        $response = array();

        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('material[]', 'Material Name', 'trim|required');
        $this->form_validation->set_rules('qty[]', 'Quantity', 'trim|required');

        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run() == TRUE) {

            $create = $this->model_task->createTask();
            if ($create == true) {
                $response['success'] = true;
                $response['messages'] = 'Succesfully created';

            } else {
                $response['success'] = false;
                $response['messages'] = 'Error in the database while creating the brand information';
            }
        } else {
            $response['success'] = false;
            foreach ($_POST as $key => $value) {
                $response['messages'][$key] = form_error($key);
            }
        }

        echo json_encode($response);

    }



    public function completeTask()
    {
        $response = array();

        $this->form_validation->set_rules('product[]', 'Product Name', 'trim|required');
        $this->form_validation->set_rules('material[]', 'Material Name', 'trim|required');
        $this->form_validation->set_rules('productqty[]', 'Quantity', 'trim|required');
        //$this->form_validation->set_rules('damageqty[]', 'Damage quantity', 'trim|required');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        echo $this->input->post('task_id');
        if ($this->form_validation->run() == TRUE) {

            $create = $this->model_task->completeTask();
            if ($create == true) {
                $response['success'] = true;
                $response['messages'] = 'Succesfully completed';

            } else {
                $response['success'] = false;
                $response['messages'] = 'Error in the database while creating the brand information';
            }
        } else {
            $response['success'] = false;
            foreach ($_POST as $key => $value) {
                $response['messages'][$key] = form_error($key);
            }
        }

        echo json_encode($response);

    }


    public function updateTask(){

        $task_id = $this->input->post('task_id');
        $status = $this->input->post('status');
        $response = array();
        if($task_id) {
            if ($this->input->post('status')=='todo') {

            $updated_data = array(
                'status' => $status,
                'date_time_issued' => ''

            );
        }else if ($this->input->post('status')=='progress') {
                $updated_data = array(
                    'status' => $status,
                    'date_time_issued' => date("h:i a d.m.Y"),
                    'production'=>'',
                    'damage'=>'',
                    'return_materials'=>'',
                    'date_time_completed' =>''

                );
            }
            $update = $this->model_task->updateTask($updated_data,$task_id);
            if($update == true) {
                $response['success'] = true;
                $response['messages'] = "Successfully issued";
                redirect('task', 'refresh');

            }
            else {
                $response['success'] = false;
                $response['messages'] = "Error in the database while removing the brand information";
            }
        }
        else {
            $response['success'] = false;
            $response['messages'] = "Refersh the page again!!";
        }
    }


    /*
* It gets the all the active material inforamtion from the product table
* This function is used in the order page, for the product selection in the table
* The response is returns on the json format.
*/
    public function getMaterialRow()
    {
        $materials = $this->model_mainstock->getMaterialData();

        echo json_encode($materials);
    }


    /*
* It gets the all the active product inforamtion from the product table
* This function is used in the order page, for the product selection in the table
* The response is returns on the json format.
*/
    public function getProductRow()
    {
        $products = $this->model_finalstock->getProductData();

        echo json_encode($products);
    }

    public function deleteTask()
    {

        $task_id = $this->input->post('task_id');

        $response = array();
        if($task_id) {
            $delete = $this->model_task->deleteTask($task_id);
            if($delete == true) {
                $response['success'] = true;
                $response['messages'] = "Successfully deleted";
                redirect('task', 'refresh');
            }
            else {
                $response['success'] = false;
                $response['messages'] = "Error in the database while removing the brand information";
            }
        }
        else {
            $response['success'] = false;
            $response['messages'] = "Refersh the page again!!";
        }

        echo json_encode($response);
    }



}