	<?php 
		class Admin extends CI_CONTROLLER{
			public function __construct()
			{
				parent:: __construct();
				//$this->load->model('Admin_Model','mm');
				$this->load->model('db_model');
				$this->load->model('admin_model','am' );
				$this->load->helper(array('form','url'));	

			}
			public function setup_db()
			{
				$this->load->dbutil();
				if($this->dbutil->database_exists('salesandrentals_db'))
				{
					
					$this->load->model('db_model');
					$this->db_model->create_admin_table();
					$this->db_model->create_owner_table();
					$this->db_model->create_inquiries_table();
					$this->db_model->create_project_table();
					$this->db_model->insert_default_admin();
					//print success page
					$this->load->view('templates/header');
					$this->load->view('success_setup');
					$this->load->view('templates/footer');
					
				}
				else
				{
					echo "Database do not exist, let's create one ! First Create a database named 'salesandrentals_db' in the localhost dashboard";

				}
			}
			public function delete_tables_db()
			{
				$this->db_model->drop_tables();
			}
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
				$this->load->library('form_validation');
				$email = $this->input->post('email');
				$pass =  $this->input->post('password');

				if($this->am->acc_signin($email, $pass))
				{
					echo "Hello Super Admin!";
				}
				else
				{
					echo "Cannot find account";
				}
			}
		}

	 ?>