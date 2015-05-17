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
		$data['slips'] = $this->PackingSlips_model->get_slips();
		// $data['success'] = false;
		$data['title'] = 'Packing Slip Archive';

		$this->load->view('templates/header', $data);
		$this->load->view('slips/index.php', $data);
		$this->load->view('templates/footer');
	}

	public function view($id = NULL)
	{
		$this->load->helper('form');
		$data['slips_item'] = $this->PackingSlips_model->get_slips($id);

		if (empty($data['slips_item']))
		{
			show_404();
		}

		$data['title'] = 'Packing Slip: #'.$data['slips_item']['slip_id'];

		$this->load->view('templates/header', $data);
		$this->load->view('slips/view', $data);
		$this->load->view('templates/footer');
	}

	public function edit($id = NULL)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['slips_item'] = $this->PackingSlips_model->get_slips($id);
		// $data['slips_item'] = $this->PackingSlips_model->get_slips($id);

		if (empty($data['slips_item']))
		{
			show_404();
		}

		$this->form_validation->set_rules('slip_assetTag', 'Asset Tag', 'required');
		$this->form_validation->set_rules('slip_manufacturer', 'Manufacturer', 'required');
		$this->form_validation->set_rules('slip_deviceName', 'Device Name', 'required');
		$this->form_validation->set_rules('slip_modelNumber', 'Model Number');
		$this->form_validation->set_rules('slip_quantity', 'Quantity', 'required');
		$this->form_validation->set_rules('slip_shipAddress', 'Ship Address', 'required');
		$this->form_validation->set_rules('slip_shipCity', 'Ship City', 'required');
		$this->form_validation->set_rules('slip_shipState', 'Ship State', 'required');
		$this->form_validation->set_rules('slip_shipZip', 'Ship Zip', 'required');
		$this->form_validation->set_rules('slip_fedexTracking', 'FedEx Tracking Number');
		$this->form_validation->set_rules('slip_rmaNumber', 'RMA Number');
		$this->form_validation->set_rules('slip_comments', 'Comments');

		$data['title'] = 'Update Packing Slip';

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('slips/edit', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->PackingSlips_model->update_slip();

			// $this->load->library('session');

			// $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Packing Slip Updated</div>');
			// redirect('slips');
			// $this->load->view('slips');
			redirect('slips');
			
			return TRUE;
		}

	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create a Packing Slip';

		$this->form_validation->set_rules('slip_assetTag', 'Asset Tag', 'required');
		$this->form_validation->set_rules('slip_manufacturer', 'Manufacturer', 'required');
		$this->form_validation->set_rules('slip_deviceName', 'Device Name', 'required');
		$this->form_validation->set_rules('slip_modelNumber', 'Model Number');
		$this->form_validation->set_rules('slip_quantity', 'Quantity', 'required');
		$this->form_validation->set_rules('slip_shipAddress', 'Ship Address', 'required');
		$this->form_validation->set_rules('slip_shipCity', 'Ship City', 'required');
		$this->form_validation->set_rules('slip_shipState', 'Ship State', 'required');
		$this->form_validation->set_rules('slip_shipZip', 'Ship Zip', 'required');
		$this->form_validation->set_rules('slip_fedexTracking', 'FedEx Tracking Number');
		$this->form_validation->set_rules('slip_rmaNumber', 'RMA Number');
		$this->form_validation->set_rules('slip_comments', 'Comments');

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
			redirect('slips/index');
			return TRUE;

		}
	}

	// public function update() {
	// 	$this->load->helper('form');
	// 	$this->load->library('form_validation');

	// 	$data['title'] = 'Updating Packing Slip';

	// 	$this->form_validation->set_rules('slip_assetTag', 'Asset Tag', 'required');
	// 	$this->form_validation->set_rules('slip_manufacturer', 'Manufacturer', 'required');
	// 	$this->form_validation->set_rules('slip_deviceName', 'Device Name', 'required');
	// 	$this->form_validation->set_rules('slip_modelNumber', 'Model Number');
	// 	$this->form_validation->set_rules('slip_quantity', 'Quantity', 'required');
	// 	$this->form_validation->set_rules('slip_shipAddress', 'Ship Address', 'required');
	// 	$this->form_validation->set_rules('slip_shipCity', 'Ship City', 'required');
	// 	$this->form_validation->set_rules('slip_shipState', 'Ship State', 'required');
	// 	$this->form_validation->set_rules('slip_shipZip', 'Ship Zip', 'required');
	// 	$this->form_validation->set_rules('slip_fedexTracking', 'FedEx Tracking Number');
	// 	$this->form_validation->set_rules('slip_rmaNumber', 'RMA Number');
	// 	$this->form_validation->set_rules('slip_comments', 'Comments');
	// 	$this->form_validation->set_rules('slip_status', 'Status');

	// 	if($this->form_validation->run() === FALSE)
	// 	{
	// 		$this->load->view('templates/header', $data);
	// 		$this->load->view('slips/edit', $data);
	// 		$this->load->view('templates/footer');
	// 	}
	// 	else
	// 	{
	// 		$this->PackingSlips_model->update_slip();

	// 		$this->load->library('session');

	// 		$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Packing Slip Updated');
	// 		redirect('slips');
	// 		return TRUE;
	// 	}
	// }
	
	// public function modify($id = null) {
	// 	if ($id == null)
	// 	{
	// 		show_error('No identifier provided', 500);
	// 	}
	// 	else
	// 	{
	// 		$data['title'] = "Update Packing Slip";
	// 		$data['view_name'] = 'slips/edit';
	// 		$data['view_data'] = $this->slips->get($slip_id);

	// 		$this->load->view('edit', $data);
	// 	}
	// }


	public function delete()
	{
		$this->PackingSlips_model->delete_slip();
		redirect('slips');
	}
}































