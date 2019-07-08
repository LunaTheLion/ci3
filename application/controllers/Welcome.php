<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function view($page = 'login')
	{

		if(!file_exists(APPPATH.'views/admin/'.$page.'.php'))
		{
			show_404();
		}
		
		else
		{
			$data['title'] = ucfirst($page);
			//echo "Hello";
			$this->load->view('admin/templates/header');
			$this->load->view('admin/'.$page,$data);
			$this->load->view('admin/templates/footer');
		}
		
	}
}
