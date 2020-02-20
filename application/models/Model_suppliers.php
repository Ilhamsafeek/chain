<?php 

class Model_suppliers extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getSupplierData($supplierId = null)
	{
		if($supplierId) {
			$sql = "SELECT * FROM suppliers WHERE id = ?";
			$query = $this->db->query($sql, array($supplierId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM suppliers WHERE id != ? ORDER BY id DESC";
		$query = $this->db->query($sql, array(0));
		return $query->result_array();
	}

    public function getSupplierReviewData($supplierId = null)
    {
        if($supplierId) {
            $sql = "SELECT * FROM supplier_review WHERE supplier_id = ? ORDER BY id DESC";
            $query = $this->db->query($sql, array($supplierId));
            return $query->result_array();
        }


    }


    public function getSupplierSampleData($supplierId = null)
    {
        if($supplierId) {
            $sql = "SELECT * FROM supplier_sample WHERE supplier_id = ? ORDER BY id DESC";
            $query = $this->db->query($sql, array($supplierId));
            return $query->result_array();
        }


    }

	public function create($data = '')
	{

		if($data) {
			$create = $this->db->insert('suppliers', $data);
			$this->db->insert_id();

			
			return ($create == true) ? true : false;
		}
	}

    public function createReview($data = '')
    {

        if($data) {
            $create = $this->db->insert('supplier_review', $data);
            $this->db->insert_id();


            return ($create == true) ? true : false;
        }
    }

    public function createSample($data = '')
    {

        if($data) {
            $create = $this->db->insert('supplier_sample', $data);
            $this->db->insert_id();


            return ($create == true) ? true : false;
        }
    }

    public function edit($data = array(), $id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('suppliers', $data);

		return ($update == true) ? true : false;	
	}


	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('suppliers');
		return ($delete == true) ? true : false;
	}

    public function deleteReview($id)
    {
        $this->db->where('id', $id);
        $delete = $this->db->delete('supplier_review');
        return ($delete == true) ? true : false;
    }

	public function countTotalCustomers()
	{
		$sql = "SELECT * FROM customers WHERE id != ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}
	
}