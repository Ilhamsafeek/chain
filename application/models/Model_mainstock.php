<?php 

class Model_mainstock extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getMaterialData($materialId = null) 
	{
		if($materialId) {
			$sql = "SELECT * FROM materials WHERE id = ?";
			$query = $this->db->query($sql, array($materialId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM materials WHERE id != ? ORDER BY id DESC";
		$query = $this->db->query($sql, array(0));
		return $query->result_array();
	}

	

	public function createMaterial($data = '')
	{

		if($data) {
			$create = $this->db->insert('materials', $data);
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

	public function deleteMaterial($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('materials');
		return ($delete == true) ? true : false;
	}

	public function countTotalCustomers()
	{
		$sql = "SELECT * FROM customers WHERE id != ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}
	
}