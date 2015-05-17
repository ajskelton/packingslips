<?php
class Pages extends CI_Controller {

	public function view($page = 'home')
	{
		if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
		{
			// Page doesn't exist
			show_404();
		}

		redirect('slips');
	}
}