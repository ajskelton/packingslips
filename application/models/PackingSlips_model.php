<?php
class PackingSlips_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_slips($id = FALSE)
	{
		if ($id === FALSE)
		{
			$query = $this->db->get('slips');
			return $query->result_array();
		}

		$query = $this->db->get_where('slips', array('slip_id' => $id));
		return $query->row_array();
	}

	public function set_slip()
	{
		$this->load->helper('url');

		$data = array(
			'slip_assetTag' => $this->input->post('slip_assetTag'),
			'slip_manufacturer' => $this->input->post('slip_manufacturer'),
			'slip_deviceName' => $this->input->post('slip_deviceName'),
			'slip_modelNumber' => $this->input->post('slip_modelNumber'),
			'slip_serialNumber' => $this->input->post('slip_serialNumber'),
			'slip_quantity' => $this->input->post('slip_quantity'),
			'slip_shipAddress' => $this->input->post('slip_shipAddress'),
			'slip_shipCity' => $this->input->post('slip_shipCity'),
			'slip_shipState' => $this->input->post('slip_shipState'),
			'slip_shipZip' => $this->input->post('slip_shipZip'),
			'slip_fedexTracking' => $this->input->post('slip_fedexTracking'),
			'slip_rmaNumber' => $this->input->post('slip_rmaNumber'),
			'slip_comments' => $this->input->post('slip_comments'),
			'slip_status' => 'Created',
		);

		return $this->db->insert('slips', $data);
	}
	public function update_slip($data)
	{
		$this->load->helper('url');

		$data = array(
			'slip_assetTag' => $this->input->post('slip_assetTag'),
			'slip_manufacturer' => $this->input->post('slip_manufacturer'),
			'slip_deviceName' => $this->input->post('slip_deviceName'),
			'slip_modelNumber' => $this->input->post('slip_modelNumber'),
			'slip_serialNumber' => $this->input->post('slip_serialNumber'),
			'slip_quantity' => $this->input->post('slip_quantity'),
			'slip_shipAddress' => $this->input->post('slip_shipAddress'),
			'slip_shipCity' => $this->input->post('slip_shipCity'),
			'slip_shipState' => $this->input->post('slip_shipState'),
			'slip_shipZip' => $this->input->post('slip_shipZip'),
			'slip_fedexTracking' => $this->input->post('slip_fedexTracking'),
			'slip_rmaNumber' => $this->input->post('slip_rmaNumber'),
			'slip_comments' => $this->input->post('slip_comments'),
			'slip_status' => $this->input->post('slip_status')
		);
		$this->db->where('slip_id', $this->uri->segment(3));
		$this->db->update('slips', $data);
	}

	public function delete_slip()
	{
		$this->db->where('slip_id', $this->uri->segment(3));
		$this->db->delete('slips');
	}
}