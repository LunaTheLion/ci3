<?php
 if(!defined('BASEPATH'))exit('No direct script access allowed');

class Inquiry extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->model('Main_Model','mm');
	}

	function send_email(){

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => '465',
			'smtp_user' => 'megaworldcondotel',//@gmail.com
			'smtp_pass' => 'megaworld101',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);

		$this->load->library('email', $config);
		$this->email->from($this->input->post('email'), $this->input->post('name'));
		$this->email->to('megaworldcondotel@gmail.com');
		$this->email->subject('Inquiry! for "'.$this->input->post('project').'"');
		//$verification_code = "AAABBB";
		//$msg = 'Click on this link to sign in - <a></a>'
		$msg = '<b>Megaworld Condotel Projects</b><br> Name: <b>'.$this->input->post('name').'</b><br>Contact: <b>'.$this->input->post('contact').'</b><br> Email: <b>'.$this->input->post('email').'</b><br> Interested in: <b>'.$this->input->post('project').'</b><br> Message: '.$this->input->post('message').'';
		//http://localhost/iAssist/users/general/
		$this->email->message($msg);
		$this->email->set_newline("\r\n");

		if($this->email->send()){
			$inquiry = array(
				'contact_no' => $this->input->post('contact'),
				'email' => $this->input->post('email'),
				'name' => $this->input->post('name'),
				'project' => $this->input->post('project'),
				'message' => $this->input->post('message'),
				'date_received' => date('Y-m-d g:i')
				);

			$this->mm->save_inquiry($inquiry);
			//send autoreply

			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => '465',
				'smtp_user' => 'megaworldcondotel',//@gmail.com
				'smtp_pass' => 'megaworld101',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$this->load->library('email', $config);
			$this->email->from('megaworldcondotel@gmail.com');
			$this->email->to($this->input->post('email'));
			$this->email->subject('Thank you for your inquiry!');
		
			$msg = 'Thank you for your inquiry ! We will get back to you as soon as possible.';
			//http://localhost/iAssist/users/general/
			$this->email->message($msg);
			$this->email->set_newline("\r\n");

			if($this->email->send())
			{
				$this->session->sess_destroy();
			}
			else
			{
				show_error($this->email->print_debugger());
			}

			redirect('Inquiry/confirmation_email');
		    $this->session->sess_destroy();
		    }  
		     else{
		        show_error($this->email->print_debugger());
		    }
		
		
	}
	
		function confirmation_email()
		{
				$this->load->view('templates/header');
			    $this->load->view('pages/email-sent');
			    $this->load->view('templates/footer');
		}




	}


	?>