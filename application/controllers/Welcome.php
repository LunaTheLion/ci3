<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function view($page = 'login')
	{
		if(!file_exists(APPPATH.'views/'.$page.'.php'))
		{
			show_404();
		}
		else
		{
			$data['title'] = ucfirst($page);
			//echo "Hello";
			$this->load->view('templates/header');
			$this->load->view($page,$data);
			$this->load->view('templates/footer');
		}
		
	}
}
