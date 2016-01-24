<?php
class Pagination_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	// get slips
	function get_slips($limit, $start, $st = NULL)
	{
		if ($st == 'NIL') $st = "";
		$this->db->select('*');
		$this->db->from('slips');
		$this->db->join('items', 'items.slip_id_fk = slips.slip_id');
		$this->db->like('slip_description', $st);
		$this->db->or_like('slip_customerContact', $st);
		$this->db->or_like('slip_customerPhone', $st);
		$this->db->or_like('slip_shipName', $st);
		$this->db->or_like('slip_shipAddress', $st);
		$this->db->or_like('slip_shipCity', $st);
		$this->db->or_like('slip_fedexTracking', $st);
		$this->db->or_like('item_manufacturer', $st);
		$this->db->or_like('item_assetTag', $st);
		$this->db->or_like('item_deviceName', $st);
		$this->db->or_like('item_modelNumber', $st);
		$this->db->or_like('item_serialNumber', $st);
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_slips_count($st = NULL)
	{
		if($st == "NIL") $st = "";
		$this->db->select('*');
		$this->db->from('slips');
		$this->db->join('items', 'items.slip_id_fk = slips.slip_id');
		$this->db->like('slip_description', $st);
		$this->db->or_like('slip_customerContact', $st);
		$this->db->or_like('slip_customerPhone', $st);
		$this->db->or_like('slip_shipName', $st);
		$this->db->or_like('slip_shipAddress', $st);
		$this->db->or_like('slip_shipCity', $st);
		$this->db->or_like('slip_fedexTracking', $st);
		$this->db->or_like('item_manufacturer', $st);
		$this->db->or_like('item_assetTag', $st);
		$this->db->or_like('item_deviceName', $st);
		$this->db->or_like('item_modelNumber', $st);
		$this->db->or_like('item_serialNumber', $st);
		$query = $this->db->get();
		return $query->num_rows();
	}
}
