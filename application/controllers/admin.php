<?php 
	class admin extends CI_CONTROLLER{
		public function view()
		{
			$this->load->view('templates/header');
			echo "View";
			echo $this->input->post('email');
			echo $this->input->post('pword');
			echo "<a href='".base_url('')."'>back</a>";
			$this->load->view('templates/footer');
		}
		public function signin()
		{
			$this->load->view('templates/header');
			echo "Signin";
			echo $this->input->post('email');
			echo $this->input->post('pword');
			echo "<a href='".base_url('')."'>back</a>";
			$this->load->view('templates/footer');
		}
		public function register()
		{
			$this->load->view('templates/header');
			echo "Register";
			echo $this->input->post('char');
			echo $this->input->post('email');
			echo $this->input->post('pword');
			echo "<a href='".base_url('')."'>back</a>";
			$this->load->view('templates/footer');
		}
	}

 ?>