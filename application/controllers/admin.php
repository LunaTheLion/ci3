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
		if($this->dbutil->database_exists('salesandrentals_db'))
		{
						
			$this->load->model('db_model');
			$this->db_model->create_admin_table();
			$this->db_model->create_owner_table();
			$this->db_model->create_inquiries_table();
			$this->db_model->create_property_table();
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
			// $data['title'] = "Register Admin";
			// $this->load->view('admin/template/header', $data);
			// $this->load->view('admin/admin-register');
			// $this->load->view('admin/template/footer');	

			

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
						'smtp_user' => 'megaworldcondotel',//@gmail.com
						'smtp_pass' => 'megaworld101',
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
					$this->email->from('megaworldcondotel@gmail.com');
					$this->email->to($email);
					$this->email->subject('Signed as Sale and Rentals Admin!');
					
					$msg = 'Thank you for signing up ! <a href="'.base_url().'admin/new_admin/'.$email.'/'.$pass.'">Click me to register to Sale and Rentals as Admin</a>';

					$this->email->message($msg);
					$this->email->set_newline("\r\n");


					$info = array(	
						'email' => $this->input->post('email'),
						'username' => $this->input->post('username'),
						'password' => $encryptedPass,
						'code' => $pass,
					);
					if($this->email->send())
					{
						$this->mm->register($info);
						redirect('admin/thankyou');
					    //$this->session->sess_destroy();
					  }  
					   else{
					    show_error($this->email->print_debugger());
				    }
			
		}
	}
	public function thankyou()
	{
		$this->load->view('admin/template/header');
		$this->load->view('admin/check-your-email');
		$this->load->view('admin/template/footer');	
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
	public function admin_info($email, $pass)
	{
		$get = $this->mm->get_acc($email);
		$admin = array(
			'admin_id' => $get->admin_id,
			'admin_username'=>$get->admin_username,
			'admin_type'=>$get->admin_type,
			'admin_email' => $get->admin_email,
			'admin_status' =>$get->admin_status, 
		);
		$this->session->set_userdata($admin);
		$this->load->view('admin/template/header');
		$this->load->view('admin/admin-info');
		$this->load->view('admin/template/footer');	
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
	public function register()
	{
		$title = "Megaworld | Condotel | Register";
		$this->load->view('admin/template/header');
		$this->load->view('admin/admin-register');
		$this->load->view('admin/template/footer');
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
						$data['error'] =  Validation_errors();
						// echo "Password and Username doesn't match";
						$this->load->view('admin/templates/header',$data);
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
		$this->session->set_userdata('useremail', $namepart);
		$this->session->set_userdata($admin);
		$this->session->set_userdata('namepart', $namepart);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/main-header');
		$this->load->view('admin/main-sidebar');
		$this->load->view('admin/dashboard');
		// $this->load->view('admin/admin-footer');
		$this->load->view('admin/templates/footer');
	}

	public function send_message()
	{
		echo $this->input->post('name');
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
	public function mng_sales()
	{
		$data['title'] = "Manage Sates";
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
		$this->load->view('admin/manage_home/manage-sales');
		// $this->load->view('admin/admin-footer');
		$this->load->view('admin/templates/footer');
	}
	public function mng_rent()
	{
		$data['title'] = "Manage Rent";
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
		$this->load->view('admin/manage_home/manage-rent');
		// $this->load->view('admin/admin-footer');
		$this->load->view('admin/templates/footer');
	}
	public function mng_listing()
	{
		$data['title'] = "Manage Listing";
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
		$this->load->view('admin/manage-listings');
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
		$this->load->view('admin/templates/header', $admin);
		$this->load->view('admin/main-header');
		$this->load->view('admin/main-sidebar');
		$this->load->view('admin/manage-owners');
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
		$this->load->view('admin/templates/header', $admin);
		$this->load->view('admin/main-header');
		$this->load->view('admin/main-sidebar');
		$this->load->view('admin/manage-inquiries');
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
		$this->load->view('admin/templates/header', $admin);
		$this->load->view('admin/main-header');
		$this->load->view('admin/main-sidebar');
		$this->load->view('admin/manage_accounts/view-accounts');
		$this->load->view('admin/templates/footer');
	}
	public function add_new_account()
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

	public function get_inquiries()
	{
		$inquiries = $this->mm->inquiries();
		echo json_encode($inquiries);
	}
	public function get_sav()
	{
		$inquiries = $this->mm->sav_inquiries();
		
		echo json_encode($inquiries);
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

	public function get_projects()
	{
		$projects = $this->mm->projects();
		echo json_encode($projects);
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
	public function delete_project()
	{
		//echo "Delete Article";
		$result = $this->mm->delete_proj();
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
	public function edit_project($id,$slug)
	{
		$get = $this->mm->edit_project($id);
		
		$project = array(
			"id" =>$get->id,
			"title" =>$get->title,
			"price" =>$get->price,
			"url" =>$get->URL,
			"address" =>$get->address,
			"location" =>$get->location,
			"about" =>$get->about,
			"facade" => $get->facade,
			"amenities" =>$get->amenities,
			"unit type" =>$get->unit_type,
			"features" =>$get->features_dev_hghlts,
			"nearby" =>$get->nearby_establishments,
			// "url" =>$get->url,
		);
		$this->session->set_flashdata($project);

		$this->load->view('admin/template/header');
		$this->load->view('admin/admin-header');
		$this->load->view('admin/admin-main-sidebar');
		$this->load->view('admin/add-project',$project);
		$this->load->view('admin/admin-footer');
		$this->load->view('admin/template/footer');	
	}
	
	public function mng_featured_photos()
	{
		$this->load->view('admin/template/header');
		$this->load->view('admin/admin-header');
		$this->load->view('admin/admin-main-sidebar');
		$this->load->view('admin/home-featured-photos');
		$this->load->view('admin/admin-footer');
		$this->load->view('admin/template/footer');	
	}
	
	public function validate_add_art()
	{

		$config['upload_path']          = './uploads/articles';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 100024;
        $config['max_height']           = 70068;

        $this->load->library('upload', $config);
        if ( !$this->upload->do_upload())
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
          // $this->mm->add_article($image);
           if($this->mm->add_article($image))
           {
            	echo "<script>alert('Your Article is saved!')</script>";
            	redirect(base_url('admin/mng_articles'));
           }
           else
           {
                echo "<script>alert('Sorry Article could not be saved!')</script>";
                redirect(base_url('admin/mng_articles'));
            }
          // $data = array('upload_data' => $this->upload->data());
        }
	}
	public function landmark()
	{
		echo $this->input->post('projectTitle');
		echo $this->input->post('projectPrice');
		echo $this->input->post('projectAbout');
	}

	public function sample_upload()
	{
		$this->load->view('admin/template/header');
		$this->load->view('admin/admin-header');
		$this->load->view('admin/admin-main-sidebar');
		$this->load->view('admin/add-article');
		$this->load->view('admin/admin-footer');
		$this->load->view('admin/template/footer');	

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
	public function val_add_logo()
	{
		$phpFileUploadErrors = array(
			0=>'There is no error, the file uploaded with success',
			1=>'The uploaded file exceeds the upload_max_filesize directive in php.ini',
			2=>'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
			3=>'The uploaded file was only partially uploaded',
			4=>'No file was uploaded',
			5=>'Missing temporary folder',
			6=>'Failed to write file to disk.',
			7=>'A PHP extension stopped the file upload',
		);

		function reArrayFiles( $file_post)
		{
			$file_ary = array();
			$file_count = count($file_post['name']);
			$file_keys = array_keys($file_post);

			for($i=0; $i<$file_count; $i++)
			{
				foreach($file_keys as $key)
				{
					$file_ary[$i][$key] = $file_post[$key][$i];
				}
			}
			return $file_ary;
		}



		if(isset($_FILES['userfile']))
		{
			$file_array = reArrayFiles($_FILES['userfile']);
			
			for($i=0; $i<count($file_array); $i++)
			{
				
				$dir = "uploads/featured_logo/";
				$facade = $file_array[$i]['name'];
				if(!is_dir($dir))
				{
					mkdir($dir,0755,true);
					move_uploaded_file($file_array[$i]['tmp_name'],$dir.$file_array[$i]['name']);
					
					$image = $file_array[$i]['name'];
					$this->mm->save_logo($image);
					echo "<script>alert('".$image." is saved')</script>";
				}
				elseif(is_dir($dir))
				{
					move_uploaded_file($file_array[$i]['tmp_name'],$dir.$file_array[$i]['name']);
					
					$image = $file_array[$i]['name'];
					
					$this->mm->save_logo($image);
					echo "<script>alert('Image ".$image." is saved')</script>";
					// echo " <br> Amenities Upload Successfully";
					
				}
						
			}
		}
		redirect('admin/logo');
	}
	public function get_logos()
	{
		$logo =	$this->mm->get_logo();
		echo json_encode($logo);

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