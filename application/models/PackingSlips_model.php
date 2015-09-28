<?php
class PackingSlips_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function record_count()
	{
		return $this->db->count_all("slip_id");
	}

	public function get_slips($id = 0)
	{
		if ($id === 0)
		{
			$this->db->select('*');
			$this->db->from('slips');
			$query = $this->db->get();

			return $query->result_array();
		}

		$this->db->select('*');
		$this->db->from('slips');
		$this->db->join('items', 'items.slip_id_fk = slips.slip_id');
		$this->db->where('slips.slip_id', $id);
		$query = $this->db->get();

		return $query->result();
	}

	public function get_the_vendors()
	{
		$query = $this->db->get('vendors');
		return $query->result_array();
	}

	public function set_slip($id = 0)
	{
		// $this->load->helper('url');
		// $this->load->helper('date');

		// $item_data = array(
		// 	'item_assetTag' => $this->input->post('item_assetTag'),
		// 	'item_manufacturer' => $this->input->post('item_manufacturer'),
		// 	'item_deviceName' => $this->input->post('item_deviceName'),
		// 	'item_modelNumber' => $this->input->post('item_modelNumber'),
		// 	'item_serialNumber' => $this->input->post('item_serialNumber'),
		// 	'item_quantity' => $this->input->post('item_quantity')
		// )

		// $slip_data = array(
		// 	'slip_assetTag' => $this->input->post('slip_assetTag'),
		// 	'slip_manufacturer' => $this->input->post('slip_manufacturer'),
		// 	'slip_deviceName' => $this->input->post('slip_deviceName'),
		// 	'slip_modelNumber' => $this->input->post('slip_modelNumber'),
		// 	'slip_serialNumber' => $this->input->post('slip_serialNumber'),
		// 	'slip_quantity' => $this->input->post('slip_quantity'),
		// 	'slip_shipName' => $this->input->post('slip_shipName'),
		// 	'slip_shipAddress' => $this->input->post('slip_shipAddress'),
		// 	'slip_shipCity' => $this->input->post('slip_shipCity'),
		// 	'slip_shipState' => $this->input->post('slip_shipState'),
		// 	'slip_shipZip' => $this->input->post('slip_shipZip'),
		// 	'slip_fedexTracking' => $this->input->post('slip_fedexTracking'),
		// 	'slip_rmaNumber' => $this->input->post('slip_rmaNumber'),
		// 	'slip_comments' => $this->input->post('slip_comments'),
		// 	'slip_status' => $this->input->post('slip_status'),
		// 	'slip_id' => $this->input->post('slip_id'),
		// 	'slip_customerContact' => $this->input->post('slip_customerContact'),
		// 	'slip_customerPhone' => $this->input->post('slip_customerPhone'),
		// 	'slip_lastModified' => date('F j, Y g:i a')
		// );
	

		// if ($id === 0 )
		// {
		// 	return $this->db->insert('slips', $slip_data);
		// 	return $this->db->insert('slips_item', $item_data)
		// }
		// else
		// {
		// 	$this->db->where('slip_id', $data['slip_id']);
		// 	return $this->db->update('slips', $data);
		// }

	}

	// public function delete_slip()
	// {
	// 	$this->db->where('slip_id', $this->uri->segment(3));
	// 	$this->db->delete('slips');
	// }

	// public function search($keyword)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('slips');
	// 	$this->db->like('slip_deviceName', $keyword);

	// 	$query = $this->db->get();
	// 	return $query->result();
	// }
}