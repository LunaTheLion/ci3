<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function view($page ='home')
	{
		if($page === 'login')
		{
			$data['title'] = ucfirst($page);
			$this->load->view('admin/templates/header');
			$this->load->view('admin/'.$page,$data);
			$this->load->view('admin/templates/footer');

		}else
		{
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php'))
			{
				show_404();
			}
			else
			{
				$data['title'] = ucfirst($page);
				$this->load->view('template/header');
				$this->load->view('pages/'.$page,$data);
				$this->load->view('template/footer');

			}
		}
		
	}
}
