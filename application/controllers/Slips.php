<?php
class Slips extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('PackingSlips_model');
	}

	public function index()
	{
		$this->load->library('session');
		$this->load->helper('form');
		$data = array();
		$data['slips'] = $this->PackingSlips_model->get_slips();
		$data['title'] = 'Packing Slip Archive';

		$this->load->view('templates/header', $data);
		$this->load->view('slips/index.php', $data);
		$this->load->view('templates/footer');
	}

	public function view()
	{
		$id = $this->uri->segment(2);
		$data['slips_item'] = $this->PackingSlips_model->get_slips($id);

		if (empty($id))
		{
			show_404();
		}

		$data['title'] = 'Packing Slip: #'.$data['slips_item']['slip_id'];
		// $data['slips_item'] = $this->PackingSlips_model->get_slips($id);

		$this->load->view('templates/header', $data);
		$this->load->view('slips/view', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create a Packing Slip';
		$data['vendors'] = $this->PackingSlips_model->get_the_vendors();

		// $this->form_validation->set_rules('item_assetTag', 'Asset Tag', 'required');
		// $this->form_validation->set_rules('item_manufacturer', 'Manufacturer', 'required');
		// $this->form_validation->set_rules('item_deviceName', 'Device Name', 'required');
		// $this->form_validation->set_rules('item_modelNumber', 'Model Number');
		// $this->form_validation->set_rules('item_quantity', 'Quantity', 'required');


		// $this->form_validation->set_rules('slip_shipName', 'Ship Name', 'required');
		// $this->form_validation->set_rules('slip_shipAddress', 'Ship Address', 'required');
		// $this->form_validation->set_rules('slip_shipCity', 'Ship City', 'required');
		// $this->form_validation->set_rules('slip_shipState', 'Ship State', 'required');
		// $this->form_validation->set_rules('slip_shipZip', 'Ship Zip', 'required');
		// $this->form_validation->set_rules('slip_fedexTracking', 'FedEx Tracking Number');
		// $this->form_validation->set_rules('slip_rmaNumber', 'RMA Number');
		// $this->form_validation->set_rules('slip_customerContact', 'Customer Contact', 'required');
		// $this->form_validation->set_rules('slip_customerPhone', 'Customer Phone', 'required');
		// $this->form_validation->set_rules('slip_comments', 'Comments');
		// $this->form_validation->set_rules('slip_description', 'Description', 'required');

		$validations = array(
			array(
				'field' => 'item_assetTag[]',
				'label' => 'Asset Tag',
				'rules' => 'required',
			),
			array(
				'field' => 'item_manufacturer[]',
				'label' => 'Manufacturer',
				'rules' => 'required',
			),
			array(
				'field' => 'item_deviceName[]',
				'label' => 'Device Name',
				'rules' => 'required',
			),
			array(
				'field' => 'item_modelNumber[]',
				'label' => 'Model Number',
			),
			array(
				'field' => 'item_serialNumber[]',
				'label' => 'Serial Number',
			),
			array(
				'field' => 'item_quantity[]',
				'label' => 'Quantity',
				'rules' => 'required',
			),

			array(
				'field' => 'slip_shipName',
				'label' => 'Ship Name',
				'rules' => 'required',
			),
			array(
				'field' => 'slip_shipAddress',
				'label' => 'Address',
				'rules' => 'required',
			),
			array(
				'field' => 'slip_shipCity',
				'label' => 'City',
				'rules' => 'required',
			),
			array(
				'field' => 'slip_shipState',
				'label' => 'State',
				'rules' => 'required',
			),
			array(
				'field' => 'slip_shipZip',
				'label' => 'Zip',
				'rules' => 'required',
			),
			array(
				'field' => 'slip_fedexTracking',
				'label' => 'FedEx Tracking Number',
			),
			array(
				'field' => 'slip_rmaNumber',
				'label' => 'RMA Number',
			),
			array(
				'field' => 'slip_customerContact',
				'label' => 'Customer Contact',
				'rules' => 'required',
			),
			array(
				'field' => 'slip_customerPhone',
				'label' => 'Customer Phone',
				'rules' => 'required',
			),
			array(
				'field' => 'slip_comments',
				'label' => 'Comments',
			),
			array(
				'field' => 'slip_description',
				'label' => 'Description',
				'rules' => 'required',
			),
		);
		
		$this->form_validation->set_rules($validations);

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('slips/create');
			$this->load->view('templates/footer');
		}
		else
		{
			$this->PackingSlips_model->set_slip();

			$this->load->library('session');

			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Packing Slip Created</div>');
			redirect('slips');
			return TRUE;

		}
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$this->load->library('form_validation');
		$data['slips_item'] = $this->PackingSlips_model->get_slips($id);
		$data['title'] = 'Edit Packing Slip # '.$data['slips_item']['slip_id'];

		$this->form_validation->set_rules('slip_assetTag', 'Asset Tag', 'required');
		$this->form_validation->set_rules('slip_manufacturer', 'Manufacturer', 'required');
		$this->form_validation->set_rules('slip_deviceName', 'Device Name', 'required');
		$this->form_validation->set_rules('slip_modelNumber', 'Model Number');
		$this->form_validation->set_rules('slip_quantity', 'Quantity', 'required');
		$this->form_validation->set_rules('slip_shipName', 'Ship Name', 'required');
		$this->form_validation->set_rules('slip_shipAddress', 'Ship Address', 'required');
		$this->form_validation->set_rules('slip_shipCity', 'Ship City', 'required');
		$this->form_validation->set_rules('slip_shipState', 'Ship State', 'required');
		$this->form_validation->set_rules('slip_shipZip', 'Ship Zip', 'required');
		$this->form_validation->set_rules('slip_fedexTracking', 'FedEx Tracking Number');
		$this->form_validation->set_rules('slip_rmaNumber', 'RMA Number');
		$this->form_validation->set_rules('slip_customerContact', 'Customer Contact', 'required');
		$this->form_validation->set_rules('slip_customerPhone', 'Customer Phone #', 'required');
		$this->form_validation->set_rules('slip_comments', 'Comments');
		$this->form_validation->set_rules('slip_status', 'Status');

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('slips/edit', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->PackingSlips_model->set_slip($id);

			$this->session->set_flashdata('msg', '<div class="alert alert-success no-print" role="alert">Packing Slip Updated</div>');
			$referred_from = $this->session->userdata('referred_from');
			redirect($referred_from, 'refresh');
			return TRUE;
		}

	}

	public function delete()
	{
		$this->PackingSlips_model->delete_slip();

		$this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Packing Slip Deleted</div>');
		redirect('slips');
		return TRUE;
	}

	public function search()
	{
		$this->load->helper('form');
		$keyword = $this->input->post('keyword');
		$data['results'] = $this->PackingSlips_model->search($keyword);
		$this->load->view('results_view', $data);
	}
}
