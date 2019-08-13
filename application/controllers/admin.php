<?php 
if(!defined('BASEPATH'))exit('No direct script allowed');

class Admin extends CI_CONTROLLER
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Admin_Model','mm');
		$this->load->helper(array('form', 'url'));	

	}
	public function setup_db()
	{
		$this->load->dbutil();
		if($this->dbutil->database_exists('rentandsales_db'))
		{
						
			$this->load->model('db_model');
			$this->db_model->create_property_table();
			$this->db_model->create_admin_table();
			$this->db_model->create_owner_table();
			$this->db_model->create_inquiries_table();
			$this->db_model->insert_default_admin();

						//print success page
			$this->load->view('admin/templates/header');
			$this->load->view('admin/success_setup');
			$this->load->view('admin/templates/footer');
			}			
	}
	public function vregistration()
	{
		$data['title'] = "Account Registration";
		$namepart = $this->session->userdata('useremail');
		$get = $this->mm->acc($namepart);
		$admin = array(
		'admin_id' => $get->admin_id,
		'admin_username'=>$get->admin_username,
		'admin_type'=>$get->admin_type,
		'admin_email' => $get->admin_email,
		'admin_status' =>$get->admin_status, 
		);
		$this->session->set_userdata($admin);
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');		
		$this->form_validation->set_error_delimiters('<label class="text-danger">', '</label>');
		$this->form_validation->set_rules('username','Username', 'required');
		$this->form_validation->set_rules('email','Email', 'required');
		$this->form_validation->set_rules('password','Password', 'required');
		$this->form_validation->set_rules('cpassword',' Confirm Password', 'required|matches[password]');

		if($this->form_validation->run() == False)
		{	
			
			$data['error'] = validation_errors();
			$data['title'] = "Add New Account";
			$namepart = $this->session->userdata('useremail');
			$get = $this->mm->acc($namepart);
			$admin = array(
			'admin_id' => $get->admin_id,
			'admin_username'=>$get->admin_username,
			'admin_type'=>$get->admin_type,
			'admin_email' => $get->admin_email,
			'admin_status' =>$get->admin_status, 
			);
			$this->session->set_userdata($admin);
			$this->load->view('admin/templates/header', $admin);
			$this->load->view('admin/main-header',$data);
			$this->load->view('admin/main-sidebar');
			$this->load->view('admin/manage_accounts/add-new-account');
			// $this->load->view('admin/admin-footer');
			$this->load->view('admin/templates/footer');
		}
		else
		 {
		 		
			$this->load->library('encryption');
			$encryptedPass = $this->encryption->encrypt($this->input->post('password'));
			$encryptedPass = md5($this->input->post('password'));

					$email = $this->input->post('email');
					$password = $this->input->post('password');
					$config = Array(
						'protocol' => 'smtp',
						'smtp_host' => 'ssl://smtp.googlemail.com',
						'smtp_port' => '465',
						'smtp_user' => 'iassistumak',//@gmail.com
						'smtp_pass' => 'iassistumakdeveloper',
						'mailtype' => 'html',
						'charset' => 'iso-8859-1',
						'wordwrap' => TRUE
					);


					$chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
					srand((double)microtime()*1000000); 
					$i = 0; 
					$pass = '' ; 

					while ($i <= 7) { 
					    $num = rand() % 33; 
					    $tmp = substr($chars, $num, 1); 
					    $pass = $pass . $tmp; 
					    $i++; 
					} 

					$this->load->library('email', $config);
					$this->email->from('iassistumak@gmail.com');
					$this->email->to($email);
					$this->email->subject('Signed as Sale and Rentals Admin!');
					
					$msg = 'Thank you for signing up ! <a href="'.base_url().'admin/verify_admin/'.$email.'/'.$pass.'">Click me to Verify this email to Sale and Rentals as Admin</a>';

					$this->email->message($msg);
					$this->email->set_newline("\r\n");

					if($this->email->send())
					{
						$info = array(	
							'admin_email' => $this->input->post('email'),
							'admin_username' => $this->input->post('username'),
							'admin_password' => $encryptedPass,
							'admin_type' =>'admin',
							'admin_date_joined' => date('Y-m-d'),
							'admin_code' =>$pass,
						);
						// echo "<pre>";
						// print_r($info);
						// echo "</pre><br>";
						$this->mm->register_account($info);
						redirect('admin/mng_view_accounts');
					    //$this->session->sess_destroy();
					  }  
					   else{
					    show_error($this->email->print_debugger());
				    }
			
		}
	}



	public function vinfo()
	{
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<label class="text-danger">','</label>');
		$this->form_validation->set_rules('fname', 'required');
		$this->form_validation->set_rules('sname', 'required');
		$this->form_validation->set_rules('birthdate', 'required');
		if($this->form_validation->run() == FALSE)
		{
			
			if($this->mm->register_info())
			{
				redirect('admin/dashboard/'.$this->session->userdata('username'));
			}
			else
			{
				echo "<script>alert('Cannot Process your data, please try again after a few minutes')</script>";
				$this->load->view('admin/template/header');
				$this->load->view('admin/admin-info');
				$this->load->view('admin/template/footer');		
			}
		}
		else
		{
			$this->load->view('admin/template/header');
			$this->load->view('admin/admin-info');
			$this->load->view('admin/template/footer');		
		}
	}
	// public function admin_info($email, $pass)
	// {
	// 	// echo "register more admin information";
	// 	//register birthday
	// 	//register password
	// 	//upload picture
	// 	// $data['title'] = "Admin Info";
	// 	// $namepart = $this->session->userdata('useremail');
	// 	// $get = $this->mm->acc($namepart);
	// 	// $admin = array(
	// 	// 'admin_id' => $get->admin_id,
	// 	// 'admin_username'=>$get->admin_username,
	// 	// 'admin_type'=>$get->admin_type,
	// 	// 'admin_email' => $get->admin_email,
	// 	// 'admin_status' =>$get->admin_status, 
	// 	// );
	// 	// $this->session->set_userdata($admin);
	// 	// $this->load->view('admin/templates/header', $admin);
	// 	// $this->load->view('admin/main-header');
	// 	// $this->load->view('admin/main-sidebar');
	// 	// $this->load->view('admin/manage_accounts/add-new-account');
	// 	// $this->load->view('admin/templates/footer');
	// }
	public function view_inquiry()
	{
		if($this->mm->check_inquiry())//check if the inquiry is new
		{
			if($this->mm->update_inquiry())//new inquiry
			{
				$result = $this->mm->read_inquiry();//update inquiry to not new
				echo json_encode($result);
			}
		}
		else
		{	//not new inquiry
			$result = $this->mm->read_inquiry();
			echo json_encode($result);
		}

	}
	public function count_unread_inquiry()
	{
		$result = $this->mm->count_new_inquiry();
		echo json_encode($result);
	}
	public function count_inquiry()
	{
		$result = $this->mm->count_inq();
		echo json_encode($result);
	}
	public function count_unread_owner()
	{
		$result = $this->mm->count_new_owner();
		echo json_encode($result);
	}
	public function new_admin($email,$pass)
	{	
		if($this->mm->update_acc($email, $pass))
		{
			redirect('admin/admin_info/'.$email.'/'.$pass);
		}
		else
		{
			echo "Looks like you already verified your previous account.";
		}
	}
	public function verify_admin($email, $pass)
	{
		if($this->mm->update_acc($email, $pass))
		{
			echo 'Your email is now verified you can proceed to this link to register as an Admin: <br> <a href="'.base_url().'login">Click me to register to Sale and Rentals as Admin</a>';
		}
		else
		{
			echo "Looks like you already verified your previous account.";
		}
	}
	public function register()
	{
		$this->load->view('login');
		
	}
	public function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<label class="text-danger">', '</label>');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() == False)
		{
			$this->load->view('admin/templates/header');
			$this->load->view('admin/login');
			$this->load->view('admin/templates/footer');
		}
		else
		{
			//check if it has an account
			//check if it is verified
			if($this->mm->check_account_exist())
			{// check if account exist
				if($this->mm->check_verified())
				{		
					//check for credentials , if password matches the username
					if($this->mm->login())
					{
						//get info of the Account Holder
						$email = $this->input->post('email');
						$qwr = $this->mm->get_email($email);
						$part = explode('@', $qwr);
						$namepart = $part[0];
						$this->session->set_userdata('useremail', $namepart);
						redirect('admin/dashboard/'.$namepart);
					}
					else
					{
						$data['error'] =  "Password and Username doesn't match";
						 // echo "Password and Username doesn't match";
						$this->load->view('admin/templates/header', $data);
						$this->load->view('admin/login');
						$this->load->view('admin/templates/footer');
					}
				}
				
				else
				{
					//ask to open email for verification
					// echo "CHECK YOUR EMAIL";
					$data['error'] = "Please Check your email";
					$this->load->view('admin/templates/header', $data);
					$this->load->view('admin/check-your-email');
					$this->load->view('admin/templates/footer');	
				}
				//if no record found
			}
			else
			{
				$data['error'] =  "Account doesn't exist to the database";
				 // ECHO "ACCOUNT DOESN'T EXIST";
				$this->load->view('admin/templates/header', $data);
				$this->load->view('admin/login');
				$this->load->view('admin/templates/footer');
			}

			
		}
	}
	public function dashboard($namepart)
	{	
		$data['title'] = "Dashboard";

		$get = $this->mm->acc($namepart);
		$admin = array(
			'admin_id' => $get->admin_id,
			'admin_username'=>$get->admin_username,
			'admin_type'=>$get->admin_type,
			'admin_email' => $get->admin_email,
			'admin_status' =>$get->admin_status, 
		);
		$data['fetch_data'] = $this->mm->all_properties();
		$this->session->set_userdata('useremail', $namepart);
		$this->session->set_userdata($admin);
		$this->session->set_userdata('namepart', $namepart);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/main-header');
		$this->load->view('admin/main-sidebar');
		$this->load->view('admin/dashboard', $data);
		// $this->load->view('admin/admin-footer');
		$this->load->view('admin/templates/footer');
	}

	public function send_message()
	{
		// echo $this->input->post('to');
		redirect(base_url('admin/mng_inquiries'));

	}
	public function mng_photos()
	{
		$data['title'] = "Manage Pictures";
		$namepart = $this->session->userdata('useremail');
		$get = $this->mm->acc($namepart);
		$admin = array(
		'admin_id' => $get->admin_id,
		'admin_username'=>$get->admin_username,
		'admin_type'=>$get->admin_type,
		'admin_email' => $get->admin_email,
		'admin_status' =>$get->admin_status, 
		);
		$this->session->set_userdata($admin);
		$this->load->view('admin/templates/header', $admin);
		$this->load->view('admin/main-header');
		$this->load->view('admin/main-sidebar');
		$this->load->view('admin/manage_home/featured-pictures');
		// $this->load->view('admin/admin-footer');
		$this->load->view('admin/templates/footer');
	}

	public function mng_owners()
	{
		$data['title'] = "Manage Owners";
		$namepart = $this->session->userdata('useremail');
		$get = $this->mm->acc($namepart);
		$admin = array(
		'admin_id' => $get->admin_id,
		'admin_username'=>$get->admin_username,
		'admin_type'=>$get->admin_type,
		'admin_email' => $get->admin_email,
		'admin_status' =>$get->admin_status, 
		);
		$this->session->set_userdata($admin);
		$data['fetch_data'] = $this->mm->all_owners();
		$this->load->view('admin/templates/header', $admin);
		$this->load->view('admin/main-header');
		$this->load->view('admin/main-sidebar');
		$this->load->view('admin/manage-owners' , $data);
		$this->load->view('admin/templates/footer');
	}
	public function mng_inquiries()
	{
		$data['title'] = "Manage Inquiries";
		$namepart = $this->session->userdata('useremail');
		$get = $this->mm->acc($namepart);
		$admin = array(
		'admin_id' => $get->admin_id,
		'admin_username'=>$get->admin_username,
		'admin_type'=>$get->admin_type,
		'admin_email' => $get->admin_email,
		'admin_status' =>$get->admin_status, 
		);
		$this->session->set_userdata($admin);
		 $data['fetch_data'] = $this->mm->all_inquiries();
		$this->load->view('admin/templates/header', $admin);
		$this->load->view('admin/main-header');
		$this->load->view('admin/main-sidebar');
		$this->load->view('admin/manage-inquiries-sidebar');
		$this->load->view('admin/manage-inquiries', $data);
		$this->load->view('admin/templates/footer');
	}
	public function mng_inquiries_sent_items()
	{
		$data['title'] = "Manage Inquiries";
		$namepart = $this->session->userdata('useremail');
		$get = $this->mm->acc($namepart);
		$admin = array(
		'admin_id' => $get->admin_id,
		'admin_username'=>$get->admin_username,
		'admin_type'=>$get->admin_type,
		'admin_email' => $get->admin_email,
		'admin_status' =>$get->admin_status, 
		);
		$this->session->set_userdata($admin);
		 //$data['fetch_data'] = $this->mm->all_inquiries_sent_items();
		$this->load->view('admin/templates/header', $admin);
		$this->load->view('admin/main-header');
		$this->load->view('admin/main-sidebar');
		$this->load->view('admin/manage-inquiries-sidebar');
		$this->load->view('admin/manage-inquiries-sent-items');
		$this->load->view('admin/templates/footer');
	}
	public function mng_inquiries_draft()
	{
		$data['title'] = "Manage Inquiries";
		$namepart = $this->session->userdata('useremail');
		$get = $this->mm->acc($namepart);
		$admin = array(
		'admin_id' => $get->admin_id,
		'admin_username'=>$get->admin_username,
		'admin_type'=>$get->admin_type,
		'admin_email' => $get->admin_email,
		'admin_status' =>$get->admin_status, 
		);
		$this->session->set_userdata($admin);
		 //$data['fetch_data'] = $this->mm->all_inquiries_sent_items();
		$this->load->view('admin/templates/header', $admin);
		$this->load->view('admin/main-header');
		$this->load->view('admin/main-sidebar');
		$this->load->view('admin/manage-inquiries-sidebar');
		$this->load->view('admin/manage-inquiries-drafts');
		$this->load->view('admin/templates/footer');
	}
	public function mng_inquiries_trash()
	{
		$data['title'] = "Manage Inquiries";
		$namepart = $this->session->userdata('useremail');
		$get = $this->mm->acc($namepart);
		$admin = array(
		'admin_id' => $get->admin_id,
		'admin_username'=>$get->admin_username,
		'admin_type'=>$get->admin_type,
		'admin_email' => $get->admin_email,
		'admin_status' =>$get->admin_status, 
		);
		$this->session->set_userdata($admin);
		 //$data['fetch_data'] = $this->mm->all_inquiries_sent_items();
		$this->load->view('admin/templates/header', $admin);
		$this->load->view('admin/main-header');
		$this->load->view('admin/main-sidebar');
		$this->load->view('admin/manage-inquiries-sidebar');
		$this->load->view('admin/manage-inquiries-trash');
		$this->load->view('admin/templates/footer');
	}
	public function mng_contact_us()
	{
		$data['title'] = "Manage Contact Us";
		$namepart = $this->session->userdata('useremail');
		$get = $this->mm->acc($namepart);
		$admin = array(
		'admin_id' => $get->admin_id,
		'admin_username'=>$get->admin_username,
		'admin_type'=>$get->admin_type,
		'admin_email' => $get->admin_email,
		'admin_status' =>$get->admin_status, 
		);
		$this->session->set_userdata($admin);
		$this->load->view('admin/templates/header', $admin);
		$this->load->view('admin/main-header');
		$this->load->view('admin/main-sidebar');
		$this->load->view('admin/manage-contact-us');
		$this->load->view('admin/templates/footer');
	}
	public function mng_view_accounts()
	{
		$data['title'] = "View Accounts";
		$namepart = $this->session->userdata('useremail');
		$get = $this->mm->acc($namepart);
		$admin = array(
		'admin_id' => $get->admin_id,
		'admin_username'=>$get->admin_username,
		'admin_type'=>$get->admin_type,
		'admin_email' => $get->admin_email,
		'admin_status' =>$get->admin_status, 
		);
		$this->session->set_userdata($admin);
		$data['fetch_data'] = $this->mm->all_accounts();
		$this->load->view('admin/templates/header', $admin);
		$this->load->view('admin/main-header');
		$this->load->view('admin/main-sidebar');
		$this->load->view('admin/manage_accounts/view-accounts', $data);
		$this->load->view('admin/templates/footer');
	}
	public function add_new_account()
	{
		$data['title'] = "Add New Accounts";
		$namepart = $this->session->userdata('useremail');
		$get = $this->mm->acc($namepart);
		$admin = array(
		'admin_id' => $get->admin_id,
		'admin_username'=>$get->admin_username,
		'admin_type'=>$get->admin_type,
		'admin_email' => $get->admin_email,
		'admin_status' =>$get->admin_status, 
		);
		$this->session->set_userdata($admin);
		$this->load->view('admin/templates/header', $admin);
		$this->load->view('admin/main-header');
		$this->load->view('admin/main-sidebar');
		$this->load->view('admin/manage_accounts/add-new-account');
		$this->load->view('admin/templates/footer');
	}
	public function create_listing()
	{
		$data['title'] = "Create Listing";
		$namepart = $this->session->userdata('useremail');
		$get = $this->mm->acc($namepart);
		$admin = array(
		'admin_id' => $get->admin_id,
		'admin_username'=>$get->admin_username,
		'admin_type'=>$get->admin_type,
		'admin_email' => $get->admin_email,
		'admin_status' =>$get->admin_status, 
		);
		$this->session->set_userdata($admin);
		$this->load->view('admin/templates/header', $admin);
		$this->load->view('admin/main-header');
		$this->load->view('admin/main-sidebar');
		$this->load->view('admin/create-listing');
		$this->load->view('admin/templates/footer');	
	}
	public function create_owner()
	{
		$owner_details = array(
			'owner_contact_no' => $this->input->post('contact'),
			'owner_email' => $this->input->post('email'),
			'owner_name'=> $this->input->post('name'),
			'owner_property' => $this->input->post('property'),
			'owner_message' => $this->input->post('message'),
		);
		if($this->mm->add_owner($owner_details))
		{
			redirect(base_url('admin/mng_owners'));
		}
		else
		{
			echo "Cannot Create Owners";
			redirect(base_url('admin/mng_owners'));
		}
	}
	public function view_owner()
	{
		$result = $this->mm->see_owner();
		echo json_encode($result);
	}
	public function update_owner()
	{
		 $id = $this->input->post('ownerID');
		 $data = array(
		 		
				'owner_name' => $this->input->post('name'),
				'owner_email' => $this->input->post('email'),
				'owner_contact_no' => $this->input->post('contact'),
				'owner_property' => $this->input->post('property'),
				'owner_message' => $this->input->post('message'),
				'owner_email' =>$this->input->post('email'),
			);	
		$result = $this->mm->update_owner($id,$data);

		if(json_encode($result))
		{
			redirect(base_url('admin/mng_owners'));
		}
		else 
		{
			redirect(base_url('admin/mng_owners'));
		}
	}
	public function delete_owner()
	{
		$result = $this->mm->del_owner();
		$msg['success'] = false;
		if($result)
		{
			$msg['success'] = true;
		}
		echo json_encode($result);
		
	}
	public function delete_account()
	{
		$result = $this->mm->del_account();
		$msg['success'] = false;
		if($result)
		{
			$msg['success'] = true;
		}
		echo json_encode($msg);
		
	}

	public function get_inquiries()
	{
		$inquiries = $this->mm->inquiries();
		echo json_encode($inquiries);
	}
	public function delete_property()
	{
		$result = $this->mm->del_prop();
		$msg['success'] = false;
		if($result)
		{
			$msg['success'] = true;
		}
		echo json_encode($msg);
		redirect(base_url('admin/mng_listing'));
	}
	public function get_bel()
	{
		$inquiries = $this->mm->bel_inquiries();
		
		echo json_encode($inquiries);
	}
	public function get_cha()
	{
		$inquiries = $this->mm->cha_inquiries();
		
		echo json_encode($inquiries);
	}
	public function get_kin()
	{
		$inquiries = $this->mm->kin_inquiries();
		
		echo json_encode($inquiries);
	}
	public function get_gra()
	{
		$inquiries = $this->mm->gra_inquiries();
		
		echo json_encode($inquiries);
	}

	public function get_properties()
	{
		$properties = $this->mm->properties();
		echo json_encode($properties);
	}
	public function all_properties()
	{
		


	}
	public function add_project()
	{
		$this->load->view('admin/template/header');
		$this->load->view('admin/admin-header');
		$this->load->view('admin/admin-main-sidebar');
		$this->load->view('admin/add-project', array('error' =>''));
		$this->load->view('admin/admin-footer');
		$this->load->view('admin/template/footer');	
	}
	public function get_articles()
	{
		$articles = $this->mm->articles();
		echo json_encode($articles);
	}
	public function view_article()
	{
		$view = $this->mm->view_art();
		echo json_encode($view);
	}
	public function view_project()
	{
		$view = $this->mm->view_proj();
		echo json_encode($view);
	}
	public function add_article()
	{
		$this->load->view('admin/template/header');
		$this->load->view('admin/admin-header');
		$this->load->view('admin/admin-main-sidebar');
		$this->load->view('admin/add-article');
		$this->load->view('admin/admin-footer');
		$this->load->view('admin/template/footer');	
	}
	public function delete_article()
	{
		//echo "Delete Article";
		$result = $this->mm->delete_art();
		$msg['success'] = false;
		if($result)
		{
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
	public function hide_property()
	{
		//echo "Delete Article";
		$result = $this->mm->hide_prop();
		$msg['success'] = false;
		if($result)
		{
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
	public function unhide_property()
	{
		//echo "Delete Article";
		$result = $this->mm->unhide_prop();
		$msg['success'] = false;
		if($result)
		{
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
	public function edit_article($id,$slug)
	{
		$get = $this->mm->edit_article($id);
		$article = array(
			"id" =>$get->id,
			"title" =>$get->title,
			"body" =>$get->content,
			"image" => $get->img,
			"url" =>$get->url,
		);
		$this->session->set_userdata($article);

		$this->load->view('admin/template/header');
		$this->load->view('admin/admin-header');
		$this->load->view('admin/admin-main-sidebar');
		$this->load->view('admin/add-article',$article);
		$this->load->view('admin/admin-footer');
		$this->load->view('admin/template/footer');	
	}
	public function edit_property($id,$slug)
	{
		$get = $this->mm->get_property_by_id($id);
		
		$property_details = array(
			"id" =>$get->property_id,
			"title" =>$get->property_title,
			"title_slug"=>$get->property_title_slug,
			"facade" => $get->property_facade,
			"price" =>$get->property_price,
			"sample_view" => $get->property_sample_view,
			"address" =>$get->property_address,
			'building' =>$get->property_building,
			"details" =>$get->property_additional_details,
			"facade" => $get->property_facade,
			"bed" => $get->property_bed,
			"pet" => $get->property_pet,
			"property_type" =>$get->property_type,
			"property_status" =>$get->property_status,
			"garden" =>$get->property_garden,
			"parking" =>$get->property_parking,
			"bath" => $get->property_bath,
			"floor_area" => $get->property_floor_area,
			"lot_area" => $get->property_lot_area,
			"code" => $get->property_code,
		);
		$this->session->set_flashdata($property_details);
		$this->load->view('admin/templates/header');
		$this->load->view('admin/main-header');
		$this->load->view('admin/main-sidebar');
		$this->load->view('admin/create-listing', $property_details);
		// $this->load->view('admin/admin-footer');
		$this->load->view('admin/templates/footer');
	}
	
	public function upload_featured_pictures()
	{
		$replace = $this->input->post('replace');//delete this file first before you continue
		if(unlink("uploads/featured-pictures/".$replace))
		{
			$directory = "uploads/featured-pictures/";
			$foto = $directory. basename($_FILES['file']['name']);

			if(move_uploaded_file($_FILES['file']['tmp_name'],$foto))
			{
				redirect(base_url('admin/mng_photos'));
			}
			else
			{
				
				redirect(base_url('admin/mng_photos'));
			}
		}
		else
		{
			redirect(base_url('admin/mng_photos'));
		}
		
	}
	public function validate_update($id)
	{	
		
				$config['upload_path']          = './uploads/articles';
		        $config['allowed_types']        = 'gif|jpg|png|jpeg';
		        $config['max_size']             = 10000;
		        $config['max_width']            = 100024;
		        $config['max_height']           = 70068;

		        $this->load->library('upload', $config);
		        if ( ! $this->upload->do_upload())
		          	{
		                $error = array('error' => $this->upload->display_errors());

		                        //$this->load->view('pages/upload_form', $error);
		                $this->load->view('admin/template/header');
		                $this->load->view('admin/admin-header');
		                $this->load->view('admin/admin-main-sidebar');
		                $this->load->view('admin/add-article', $error);
		                $this->load->view('admin/admin-footer');
		                $this->load->view('admin/template/footer');	
		            }
		        else
		        {
		           $file_data = $this->upload->data();
		           $data['img'] = $file_data['file_name'];
		           $image =  $file_data['file_name'];

		           if($this->mm->update_article($image,$id))
		           {
		           		
		           		$this->session->sess_destroy();
		            	echo "<script>alert('Your Article is Updated!')</script>";
		            	redirect(base_url('admin/mng_articles'));
		           }
		           else
		           {
		                echo "<script>alert('Sorry Article could not be saved!')</script>";
		                $this->load->view('admin/template/header');
		                $this->load->view('admin/admin-header');
		                $this->load->view('admin/admin-main-sidebar');
		                $this->load->view('admin/add-article');
		                $this->load->view('admin/admin-footer');
		                $this->load->view('admin/template/footer');	
		            }
		                     
		        }
	}
	public function logo()
	{
		$this->load->view('admin/template/header');
		$this->load->view('admin/admin-header');
		$this->load->view('admin/admin-main-sidebar');
		$this->load->view('admin/hotel-logo');
		$this->load->view('admin/admin-footer');
		$this->load->view('admin/template/footer');	
	}
	public function add_logo()
	{
		$this->load->view('admin/template/header');
		$this->load->view('admin/admin-header');
		$this->load->view('admin/admin-main-sidebar');
		$this->load->view('admin/add-hotel-logo');
		$this->load->view('admin/admin-footer');
		$this->load->view('admin/template/footer');	
	}
	
	
	public function logout()
	{
		$admin = array(
			'id' => '',
			'username'=>'',
			'email' => '',
		);
		$article = array(
			"id" =>'',
			"title" => '',
			"body" =>'',
			"image" => '',
			"url" =>'',
		);
		$this->session->unset_userdata($article);
		$this->session->unset_userdata($admin);
		$this->session->sess_destroy();
		redirect(base_url('login'),'refresh');
	}
	public function profile()
	{
		$data['title'] = "Profile";
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/admin-header');
		$this->load->view('admin/admin-main-sidebar');
		$this->load->view('admin/admin-profile');
		$this->load->view('admin/admin-footer');
		$this->load->view('admin/template/footer');	
	}

	public function get_admin_info()
	{
		$info = $this->mm->get_admin_info();
		echo json_encode($info);
	}
	public function chart()
	{
		$this->load->view('admin/charts');
	}
	public function graph()
	{
		$result = $this->mm->inquiries_graph();
		//print_r($result);
		echo json_encode($result);
	}


}
 ?>