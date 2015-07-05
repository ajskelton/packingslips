<?php
class Search_model extends CI_Model {

	public function get_results($search_term='default')
	{
		// use the active record class for safer queries
		$this->db->select("*");
		$this->db->from('slips');
		$this->db->like('name', $search_term);

		// Execute the query
		$query = $this->db->get();

		return $query->results_array();
	}
	
}