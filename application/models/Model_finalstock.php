<?php

class Model_finalstock extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getProductData($product_id = null)
	{
		if ($product_id) {
			$sql = "SELECT * FROM products WHERE id = ?";
			$query = $this->db->query($sql, array($product_id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM products WHERE id != ? ORDER BY id DESC";
		$query = $this->db->query($sql, array(0));
		return $query->result_array();
	}



	public function create()
	{
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}
		$create = $this->db->insert('products', $data);
		$this->db->insert_id();


		return ($create == true) ? true : false;
	}

	public function edit($id = null)
	{
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}
		$this->db->where('id', $id);
		$update = $this->db->update('products', $data);

		return ($update == true) ? true : false;
	}

	public function deleteProduct($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('products');
		return ($delete == true) ? true : false;
	}

	public function countTotalCustomers()
	{
		$sql = "SELECT * FROM customers WHERE id != ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}
}
