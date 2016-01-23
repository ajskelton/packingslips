<?php
class Archive extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('PackingSlips_model');
	}

	public function index()
	{
		$this->load->library('pagination');

		$config['base_url'] = site_url('archive/index');
		$config['total_rows'] = $this->PackingSlips_model->archive_count();
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = floor($choice);

		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		

		$this->pagination->initialize($config);

		$data['slips'] = $this->PackingSlips_model->get_slips(0, $config['per_page'], $this->uri->segment(3), false);

		$data['pagination'] = $this->pagination->create_links();
		$data['title'] = 'Archive Packing Slips';

		$this->load->view('templates/header', $data);
		$this->load->view('slips/archive.php', $data);
		$this->load->view('templates/footer');
	}
}