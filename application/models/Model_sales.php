<?php

class Model_sales extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_users');
	}

	/* get the orders data */
	public function getSalesData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM sales WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}


		$sql = "SELECT * FROM sales ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// get the orders item data
	public function getOrdersItemData($order_id = null)
	{
		if ($order_id) {
			$sql = "SELECT * FROM sales_detail WHERE order_id = ?";
			$query = $this->db->query($sql, array($order_id));
			return $query->result_array();
		}

		$sql = "SELECT * FROM sales_detail";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create()
	{
		$user_id = $this->session->userdata('id');

		//Get Next id
		$sql = "SELECT no FROM sales WHERE no IS NOT NULL ORDER BY id ASC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		$sales_no = null;
		if ($result) {

			foreach ($result as $k => $v) :
				$sales_no = $v['no'] + 1;
			endforeach;
		} else {
			$sales_no = 1000;
		}

		$sales_id = $this->db->insert_id();
		$data = array(
			'date_time' => $this->input->post('bill_date'),
			'customer' => $this->input->post('customer'),
			'no' => $sales_no,
			'type' => 'Sales Receipt',
			'paid_status' => 'paid',
			'user_id' => $user_id,
			'gross_amount' => $this->input->post('gross_amount'),
			'charge' => $this->input->post('charge'),
			'vat_charge' => $this->input->post('vat_charge'),
			'discount' => $this->input->post('discount'),
			'total' => $this->input->post('net_amount'),
			'balance' => '0',
		);

		$insert = $this->db->insert('sales', $data);

		$count_product = count($this->input->post('product'));
		for ($x = 0; $x < $count_product; $x++) {
			$items = array(
				'sales_order_no' => $sales_no,
				'product_id' => $this->input->post('product')[$x],
				'quantity' => $this->input->post('qty')[$x],
				'price' => $this->input->post('cost')[$x],
				'amount' => $this->input->post('amount')[$x],
			);

			$this->db->insert('sales_detail', $items);
		}


		return ($sales_id) ? $sales_id : false;
	}

	public function createreturn()
	{
		$user_id = $this->session->userdata('id');

		//Get Next id
		$sql = "SELECT no FROM sales WHERE no IS NOT NULL ORDER BY id ASC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		$sales_no = null;
		if ($result) {

			foreach ($result as $k => $v) :
				$sales_no = $v['no'] + 1;
			endforeach;
		} else {
			$sales_no = 1000;
		}

		$sales_id = $this->db->insert_id();
		$data = array(
			'date_time' => $this->input->post('bill_date'),
			'customer' => $this->input->post('customer'),
			'no' => $sales_no,
			'type' => 'Sales Return',
			'paid_status' => 'paid',
			'user_id' => $user_id,
			'gross_amount' => $this->input->post('gross_amount'),
			'charge' => $this->input->post('charge'),
			'vat_charge' => $this->input->post('vat_charge'),
			'discount' => $this->input->post('discount'),
			'total' => $this->input->post('net_amount'),
			'balance' => '0',
		);

		$insert = $this->db->insert('sales', $data);

		$count_product = count($this->input->post('product'));
		for ($x = 0; $x < $count_product; $x++) {
			$items = array(
				'sales_order_no' => $sales_no,
				'product_id' => $this->input->post('product')[$x],
				'quantity' => $this->input->post('qty')[$x],
				'price' => $this->input->post('cost')[$x],
				'amount' => $this->input->post('amount')[$x],
			);

			$this->db->insert('sales_detail', $items);
		}


		return ($sales_id) ? $sales_id : false;
	}
	public function countOrderItem($order_id)
	{
		if ($order_id) {
			$sql = "SELECT * FROM order_items WHERE order_id = ?";
			$query = $this->db->query($sql, array($order_id));
			return $query->num_rows();
		}
	}

	public function update($id)
	{
		if ($id) {
			$user_id = $this->session->userdata('id');
			$user_data = $this->model_users->getUserData($user_id);
			$store_id = $user_data['store_id'];
			// update the table info

			$order_data = $this->getOrdersData($id);
			$data = $this->model_tables->update($order_data['table_id'], array('available' => 1));

			if ($this->input->post('paid_status') == 1) {
				$this->model_tables->update($this->input->post('table_name'), array('available' => 1));
			} else {
				$this->model_tables->update($this->input->post('table_name'), array('available' => 2));
			}

			$data = array(
				'gross_amount' => $this->input->post('gross_amount_value'),
				'service_charge_rate' => $this->input->post('service_charge_rate'),
				'service_charge_amount' => ($this->input->post('service_charge_value') > 0) ? $this->input->post('service_charge_value') : 0,
				'vat_charge_rate' => $this->input->post('vat_charge_rate'),
				'vat_charge_amount' => ($this->input->post('vat_charge_value') > 0) ? $this->input->post('vat_charge_value') : 0,
				'net_amount' => $this->input->post('net_amount_value'),
				'discount' => $this->input->post('discount'),
				'paid_status' => $this->input->post('paid_status'),
				'user_id' => $user_id,
				'table_id' => $this->input->post('table_name'),
				'store_id' => $store_id
			);

			$this->db->where('id', $id);
			$update = $this->db->update('Salesorder', $data);

			// now remove the order item data 
			$this->db->where('order_id', $id);
			$this->db->delete('order_items');

			$count_product = count($this->input->post('product'));
			for ($x = 0; $x < $count_product; $x++) {
				$items = array(
					'order_id' => $id,
					'product_id' => $this->input->post('product')[$x],
					'qty' => $this->input->post('qty')[$x],
					'rate' => $this->input->post('rate_value')[$x],
					'amount' => $this->input->post('amount_value')[$x],
				);
				$this->db->insert('order_items', $items);
			}




			return true;
		}
	}



	public function delete($id)
	{
		if ($id) {
			$sales_order_no = $this->getSalesData($id)['no'];
			$this->db->where('id', $id);
			$delete = $this->db->delete('sales');

			$this->db->where('sales_order_no', $sales_order_no);
			$delete1 = $this->db->delete('sales_detail');

			return ($delete == true && $delete1 == true) ? true : false;
		}
	}

	public function countTotalPaidOrders()
	{
		$sql = "SELECT * FROM orders WHERE paid_status = ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}
}
