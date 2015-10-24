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
		$data['title'] = 'Active Packing Slips';

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

		$data['title'] = 'Packing Slip: '.$data['slips_item'][0]->slip_description;

		$this->load->view('templates/header', $data);
		$this->load->view('slips/view', $data);
		$this->load->view('templates/footer');
	}

	public function archive()
	{
		$data = array();
		$data['slips'] = $this->PackingSlips_model->get_slips();
		$data['title'] = 'Packing Slip Archive';

		$this->load->view('templates/header', $data);
		$this->load->view('slips/archive.php', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create a Packing Slip';
		$data['vendors'] = $this->PackingSlips_model->get_the_vendors();
		
		if ($this->form_validation->run('packing-slip') === FALSE)
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
		$this->load->helper('form');
		$this->load->library('form_validation');

		$id = $this->uri->segment(3);

		$data['slips_item'] = $this->PackingSlips_model->get_slips($id);
		$data['vendors'] = $this->PackingSlips_model->get_the_vendors();
		$data['title'] = 'Edit Packing Slip: '.$data['slips_item'][0]->slip_description;

		if($post = $this->input->post()){
			
			if($this->form_validation->run('packing-slip') === FALSE)
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
		else
	 	{
			$this->load->view('templates/header', $data);
			$this->load->view('slips/edit', $data);
			$this->load->view('templates/footer');
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
