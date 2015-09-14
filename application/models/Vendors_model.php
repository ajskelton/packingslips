<?php
class Vendors_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_vendors($id = 0)
	{
		if($id === 0)
		{
			$query = $this->db->get('vendors');
			return $query->result_array();
		}

		$query = $this->db->get_where('vendors', array('vendor_id' => $id));
		return $query->row_array();
				
	}

	public function set_vendor($id = 0)
	{
		$this->load->helper('url');

		$data = array(
			'vendor_id' 			=> 		$this->input->post('vendor_id'),
			'vendor_name'			=> 		$this->input->post('vendor_name'),
			'vendor_address' 	=> 		$this->input->post('vendor_address'),
			'vendor_city' 		=> 		$this->input->post('vendor_city'),
			'vendor_state' 		=> 		$this->input->post('vendor_state'),
			'vendor_zip' 			=> 		$this->input->post('vendor_zip')
		);

		if ($id === 0)
		{
			return $this->db->insert('vendors', $data);
		}
		else
		{
			$this->db->where('vendor_id', $data['vendor_id']);
			return $this->db->update('vendors', $data);
		}
	}

	public function delete_vendor()
	{
		$this->db->where('vendor_id', $this->uri->segment(3));
		$this->db->delete('vendors');
	}

}