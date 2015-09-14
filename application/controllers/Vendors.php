<?php
class Vendors extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Vendors_model');
	}

	public function index()
	{
		$this->load->library('session');
		$this->load->helper('form');
		$data = array();
		$data['title'] = 'Vendor List';
		$data['vendors'] = $this->Vendors_model->get_vendors();

		$this->load->view('templates/header', $data);
		$this->load->view('vendors/index.php', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create Vendor';

		$this->form_validation->set_rules('vendor_name', 'Vendor Name', 'required');
		$this->form_validation->set_rules('vendor_address', 'Vendor Address', 'required');
		$this->form_validation->set_rules('vendor_city', 'Vendor City', 'required');
		$this->form_validation->set_rules('vendor_state', 'Vendor State', 'required');
		$this->form_validation->set_rules('vendor_zip', 'Vendor Zip', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('vendors/create', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->Vendors_model->set_vendor();

			$this->session->set_flashdata('msg', '<div class="alert alert-success no-print" role="alert">Vendor Created</div>');
			redirect('vendors');
			return TRUE;
		}
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$this->load->library('form_validation');
		$data['vendors_item'] = $this->Vendors_model->get_vendors($id);
		$data['title'] = 'Edit Vendor Address';

		$this->form_validation->set_rules('vendor_name', 'Vendor Name', 'required');
		$this->form_validation->set_rules('vendor_address', 'Vendor Address', 'required');
		$this->form_validation->set_rules('vendor_city', 'Vendor City', 'required');
		$this->form_validation->set_rules('vendor_state', 'Vendor State', 'required');
		$this->form_validation->set_rules('vendor_zip', 'Vendor Zip', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('vendors/edit', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->Vendors_model->set_vendor($id);

			$this->session->set_flashdata('msg', '<div class="alert alert-success no-print" role="alert">Vendor Updated</div>');
			redirect('vendors');
			return TRUE;
		}
	}

	public function delete()
	{
		$this->Vendors_model->delete_vendor();

		$this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Vendor Deleted</div>');
		redirect('vendors');
		return TRUE;
	}
}