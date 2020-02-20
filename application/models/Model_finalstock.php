<?php 

class Model_finalstock extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getProductData($productId = null)
	{
		if($productId) {
			$sql = "SELECT * FROM products WHERE id = ?";
			$query = $this->db->query($sql, array($productId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM products WHERE id != ? ORDER BY id DESC";
		$query = $this->db->query($sql, array(0));
		return $query->result_array();
	}

	

	public function createProduct($data = '')
	{

		if($data) {
			$create = $this->db->insert('products', $data);
			$this->db->insert_id();

			
			return ($create == true) ? true : false;
		}
	}

	public function edit($data = array(), $id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('materials', $data);

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