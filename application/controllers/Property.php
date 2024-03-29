<?php 
if(!defined('BASEPATH'))exit('No direct script allowed');

class Property extends CI_CONTROLLER
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Property_Model','pm');
		$this->load->helper(array('form','url'));
		$this->load->library('image_lib');
	}
	public function remove_img()
	{
		$data =  $this->input->post('file_name').$this->input->post('property_code');
		$file_name = $this->input->post('file_name');
		$property_code = $this->input->post('property_code');
		$directory = "uploads/".$property_code."/amenities/";
		unlink($directory.$file_name);
	}
	public function ajax()
	{
		// if(isset($_FILES['files']['name']))
		// {
		// 	$greeting = "Hello";
		// 	echo json_encode($greeting);
		// }

		$title = $this->input->post('property_code');

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

		function reArrayFiles($file_post)
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

			if(isset($_FILES['amenities']))
			{
						// pre_r($_FILES);
						$file_array = reArrayFiles($_FILES['amenities']);
						//pre_r($file_array);
						for($i=0; $i<count($file_array); $i++)
						{
							$spes = "uploads/".$title."/amenities/";
							if(!is_dir($spes))
							{
								mkdir($spes,0755,true);
								move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
								$config = array();
									$config['image_library'] = 'GD2';
									$config['source_image'] = $spes.$file_array[$i]['name'];
									$config['wm_overlay_path'] = 'assets/img/wmlogo.png';
									$config['wm_type'] = 'overlay';
									// $config['wm_opacity'] = '0.2';
									$config['wm_vrt_alignment'] = 'middle';
									$config['wm_hor_alignment'] = 'center';
									$this->load->library('image_lib', $config);
									$this->image_lib->initialize($config);
									$this->image_lib->watermark();  
							}
							elseif(is_dir($spes))
							{
								move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
								$config = array();
									$config['image_library'] = 'GD2';
									$config['source_image'] = $spes.$file_array[$i]['name'];
									$config['wm_overlay_path'] = 'assets/img/wmlogo.png';
									$config['wm_type'] = 'overlay';
									// $config['wm_opacity'] = '0.2';
									$config['wm_vrt_alignment'] = 'middle';
									$config['wm_hor_alignment'] = 'center';
									$this->load->library('image_lib', $config);
									$this->image_lib->initialize($config);
									$this->image_lib->watermark();  
							}
						}
		
			}

			if(isset($_FILES['facade']))
			{
						// pre_r($_FILES);
						$file_array = reArrayFiles($_FILES['facade']);

						//pre_r($file_array);
						for($i=0; $i<count($file_array); $i++)
						{
							$spes = "uploads/".$title."/facade/";
							$facade = $file_array[$i]['name'];
							if(!is_dir($spes))
							{
								mkdir($spes,0755,true);
								move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
								$config = array();
								$config['image_library'] = 'GD2';
								$config['source_image'] = $spes.$file_array[$i]['name'];
								$config['wm_overlay_path'] = 'assets/img/wmlogo.png';
								$config['wm_type'] = 'overlay';
								// $config['wm_opacity'] = '0.2';
								$config['wm_vrt_alignment'] = 'middle';
								$config['wm_hor_alignment'] = 'center';
								$this->load->library('image_lib', $config);
								$this->image_lib->initialize($config);
								$this->image_lib->watermark();  
							}
							elseif(is_dir($spes))
							{
								move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
								$config = array();
								$config['image_library'] = 'GD2';
								$config['source_image'] = $spes.$file_array[$i]['name'];
								$config['wm_overlay_path'] = 'assets/img/wmlogo.png';
								$config['wm_type'] = 'overlay';
								// $config['wm_opacity'] = '0.2';
								$config['wm_vrt_alignment'] = 'middle';
								$config['wm_hor_alignment'] = 'center';
								$this->load->library('image_lib', $config);
								$this->image_lib->initialize($config);
								$this->image_lib->watermark();  
							}
						}
			
			}
			else
			{
				$facade = $this->input->flashdata('facade');
			}


		$arr = array(
			'property_code' => $this->input->post('property_code'),
			'property_type' => $this->input->post('property_type'),
			'property_category' => $this->input->post('property_category'),
			'property_address' => $this->input->post('property_address'),
			'property_building' => $this->input->post('property_building'),
			'property_facade' => $facade,
			'property_bed' => $this->input->post('property_bed'),
			'property_bath' => $this->input->post('property_bath'),
			'property_parking' => $this->input->post('property_parking'),
			'property_floor_area' => $this->input->post('property_floor_area'),
			'property_lot_area' => $this->input->post('property_lot_area'),
			'property_pet' => $this->input->post('property_pet'),
			'property_garden' => $this->input->post('property_garden'),
			'property_price' => $this->input->post('property_price'),
			'property_title' => $this->input->post('property_title'),
			'property_title_slug' => urlencode($this->input->post('property_title')),
			'property_additional_details' => $this->input->post('property_additional_details'),
			'property_status' => $this->input->post('property_status'),
			'property_system_status' => $this->input->post('property_status'),
		);
		
		if($this->pm->check_if_code_exist($title))
		{
			echo "Code already Exists";
			echo json_encode('Code already Exists');
		}
		else
		{
			$this->pm->add($arr);
		}

		

		// echo "<pre>";
		// print_r($arr);
		// echo "</pre>";
		
		// $data['title'] = "Create Listing";
		// $namepart = $this->session->userdata('useremail');
		// $get = $this->mm->acc($namepart);
		// $admin = array(
		// 'admin_id' => $get->admin_id,
		// 'admin_username'=>$get->admin_username,
		// 'admin_type'=>$get->admin_type,
		// 'admin_email' => $get->admin_email,
		// 'admin_status' =>$get->admin_status, 
		// );
		// $this->session->set_userdata($admin);
		// $this->load->view('admin/templates/header', $admin);
		// $this->load->view('admin/main-header');
		// $this->load->view('admin/main-sidebar');
		// $this->load->view('admin/uploadimageusingajax');
		// $this->load->view('admin/templates/footer');
	}

	public function upload_amenities()
	{
			$title = $this->session->userdata('property_code');
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

			function reArrayFiles($file_post)
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

				if(isset($_FILES['imageAmenities']))
				{
							// pre_r($_FILES);
							$file_array = reArrayFiles($_FILES['imageAmenities']);
							//pre_r($file_array);
							for($i=0; $i<count($file_array); $i++)
							{
								$spes = "uploads/".$title."/amenities/";
								if(!is_dir($spes))
								{
									mkdir($spes,0755,true);
									move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
									
								}
								elseif(is_dir($spes))
								{
									move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
								
								}
							}
				$this->pm->info1();
				redirect('admin/configure_display');	
			}
	}
	public function upload_facade()
	{

		if(isset($_FILES['fileToUpload']))
		{
			$title = $this->session->userdata('property_code');
			// $target_dir = "uploads/".$title."/facade/";
			$facade = $_FILES['fileToUpload']['name'];
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$file = $_FILES["fileToUpload"]["name"];
			//check if there is an existing folder
			$dir = "uploads/".$title."/facade/";
			
				if(!is_dir($dir))
				{
					mkdir($dir,0755,true);
					move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

				}
				elseif(is_dir($dir))
				{
					move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file); 
				}	

			$this->pm->add_property($facade, $title);
			// echo "<script>alert('Successfully Created a New Property')</script>";
			
			sleep(3);

			redirect('admin/dashboard/'.$this->session->userdata('useremail'));
		}
		
	}

	public function sample_upload()
	{
		$code = $this->input->post("property_code");

		// echo json_encode($code);
		// $facade = "sample.jpg";
		// $arr = array(
		// 	'property_code' => $this->input->post('property_code'),
		// 	'property_type' => $this->input->post('property_type'),
		// 	'property_category' => $this->input->post('property_category'),
		// 	'property_address' => $this->input->post('property_address'),
		// 	'property_building' => $this->input->post('property_building'),
		// 	'property_facade' => $facade,
		// 	'property_bed' => $this->input->post('property_bed'),
		// 	'property_bath' => $this->input->post('property_bath'),
		// 	'property_parking' => $this->input->post('property_parking'),
		// 	'property_floor_area' => $this->input->post('property_floor_area'),
		// 	'property_lot_area' => $this->input->post('property_lot_area'),
		// 	'property_pet' => $this->input->post('property_pet'),
		// 	'property_garden' => $this->input->post('property_garden'),
		// 	'property_price' => $this->input->post('property_price'),
		// 	'property_title' => $this->input->post('property_title'),
		// 	'property_title_slug' => urlencode($this->input->post('property_title')),
		// 	'property_additional_details' => $this->input->post('property_additional_details'),
		// 	'property_status' => $this->input->post('property_status'),
		// 	'property_system_status' => $this->input->post('property_status'),
		// );
		
		// $this->pm->add($arr);
	}
	public function read_all()
	{
		$data = array(
			'property_code' => $this->session->userdata('property_code'),
			'property_type' => $this->session->userdata('property_type'),
			'property_address' => $this->session->userdata('property_address'),
			'property_building' => $this->session->userdata('property_building'),
			
			
			'property_bath' => $this->session->userdata('property_bath'),
			'property_parking' => $this->session->userdata('property_parking'),
			'property_floor_area' => $this->session->userdata('property_floor_area'),
			'property_lot_area' => $this->session->userdata('property_lot_area'),
			'property_pet' => $this->session->userdata('property_pet'),
			'property_garden' => $this->session->userdata('property_garden'),

			'property_amenities' => $this->session->userdata('property_amenities'),
			'property_date_posted' =>date('F j, Y  g:i'),

			'property_additional_details'=> $this->input->post('property_additional_details'),
			'property_price' => $this->input->post('property_price'),
			'property_status' => $this->input->post('property_status'),
			'property_title' => $this->input->post('propertyTitle'),
			'property_title_slug' => urlencode($this->input->post('propertyTitle')),
		);

		$facade = $this->input->post('files');
		$amenities = $this->session->userdata('property_amenities');

		// if(isset($_FILES['files']))
		// {
		// 	echo "ELONA LABS YU";
		// }



		// if(!empty($facade))
		// {
		// 	echo $facade;
		// 	$directory = '/uploads/';
		// 	if(move_uploaded_file($facade, $directory))
		// 	{
		// 		echo "Move success";
		// 	}
		// 	else
		// 	{
		// 		echo "Move fail";
		// 	}

		// 	if(!empty($amenities))
		// 	{
		// 		echo "<pre>";
		// 		print_r($amenities);
		// 		echo "</pre>";
		// 	}
		// }


		//make an array to place all the image in array and place it in the directory



		 
	}
	public function view_sample()
	{
		$result = $this->pm->view_sample_view();
		echo json_encode($result);
	}

	// public function ajax()
	// {	
	// 	sleep(3);
	// 	if($_FILES["file"]["name"] != '')
	// 	{
	// 		$name = "erlona";
	// 		echo json_encode($_FILES["file"]["name"]);
	// 		// $output = '';
	// 		// $config['upload_path'] = './upload/';
	// 		// $config['allowed_types'] = 'gif|jpg|png|jpeg';
	// 		// $this->load->library('upload', $config)
	// 		// $this->upload->initialize($config);
	// 		// if($count = 0 ; $count < count($_FILES['files']['name']); $count++)
	// 		// {
	// 		// 	$_FILES['file']['name'] = $_FILES['files']['name'][$count];
	// 		// 	$_FILES['file']['type'] = $_FILES['files']['type'][$count];
	// 		// 	$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$count];
	// 		// 	$_FILES['file']['error'] = $_FILES['files']['error'][$count];
	// 		// 	$_FILES['file']['size'] = $_FILES['files']['size'][$count];
	// 		// 	if($this->upload->do_upload('file'))
	// 		// 	{
	// 		// 		$data = $this->upload->data();
	// 		// 		$output .='
	// 		// 			<div class="col-md-3">
	// 		// 				<img src= "'.base_url().'upload/'.$data["file_name"].'" class="img-responsive img-thumbnail"/>
	// 		// 			</div>
	// 		// 		';
	// 		// 	}
	// 		// }
	// 		// echo $output;

	// 	}
	// 		// $upload_path = 'uploads/';
	// 		// for( $x = 0 ; $x < count($_FILES['files']['name']);  $x++)
	// 		// {
	// 		// 	 $tmp_name = $_FILES['files']['tmp_name'][$x];
	// 		// 	 move_uploaded_file($tmp_name,$upload_path.$_FILES['files']['name']);
	// 		// }
	// }

	public function create_project()
	{
			$result = array(
			'property_type'=> $this->input->post('property_type'),
			'property_title' => $this->input->post('property_title'),
			'property_title_slug' =>urlencode($this->input->post('property_title')),
			'property_address'=>$this->input->post('property_address'),
			'property_bath' => $this->input->post('property_bath'),
			'property_building'=>$this->input->post('property_building'),
			'property_price' => $this->input->post('property_price'),
			'property_garden' =>$this->input->post('property_garden'),
			'property_pet' => $this->input->post('property_pet'),
			'property_parking' => $this->input->post('property_parking'),
			'property_bed' => $this->input->post('property_bed'),
			'property_lot_area' =>$this->input->post('property_lot_area'),
			'property_floor_area'=>$this->input->post('property_floor_area'),
			'property_code'=> strtoupper($this->input->post('property_code')),
			'property_additional_details'=> $this->input->post('property_additional_details'),
			'property_date_posted' =>date('F j, Y  g:i'),
			'property_status' => $this->input->post('property_status'),
			); 



			
		
		$title = urlencode($this->input->post('propertyTitle'));
		
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

		function reArrayFiles($file_post)
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
		 $int = 0;

		//FACADE
		if(isset($_FILES['files']))
		{

			$file_array = reArrayFiles($_FILES['files']);			
			for($i=0; $i<count($file_array); $i++)
			{
				
				$dir = "uploads/".$title."/facade/";
				$facade = $file_array[$i]['name'];
				
				if(!is_dir($dir))
				{
					mkdir($dir,0755,true);
					move_uploaded_file($file_array[$i]['tmp_name'],$dir.$file_array[$i]['name']);
					// echo " <br> Amenities Upload Successfully";
					$int += 1;
				}
				elseif(is_dir($dir))
				{
					move_uploaded_file($file_array[$i]['tmp_name'],$dir.$file_array[$i]['name']);
					// echo " <br> Amenities Upload Successfully";
					$int += 1;
				}			
			}
			

		//Image Amenities
				if(isset($_FILES['imageAmenities']))
				{
							// pre_r($_FILES);
							$file_array = reArrayFiles($_FILES['imageAmenities']);
							//pre_r($file_array);
							for($i=0; $i<count($file_array); $i++)
							{
								$spes = "uploads/".$title."/amenities/";
								if(!is_dir($spes))
								{
									mkdir($spes,0755,true);
									move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
									// echo " <br> Amenities Upload Successfully";
									$int += 1;
								}
								elseif(is_dir($spes))
								{
									move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
									// echo " <br> Amenities Upload Successfully";
									$int += 1;
								}

								
							}
							
				}//image amenities
				
			


			// if($this->pm->add_property($facade))
			// {
			// 	$result = "okay";
			// 	echo json_encode($result);
			// }

			// echo "<script>alert('Successfully Created a New Property')</script>";
			
			// sleep(3);

			// redirect('admin/dashboard/'.$this->session->userdata('useremail'));

		}//FACADE
		

	}
	public function update_project($id)
	{
		
		
		$title = urlencode($this->input->post('projectTitle'));
		
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

		function reArrayFiles($file_post)
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
		 $int = 0;

		//FACADE
		if(isset($_FILES['model']))
		{

			$file_array = reArrayFiles($_FILES['model']);

			for($i=0; $i<count($file_array); $i++)
			{
				
				$dir = "uploads/".$title."/facade/";
				$facade = $file_array[$i]['name'];
				
				if(!is_dir($dir))
				{
					mkdir($dir,0755,true);
					move_uploaded_file($file_array[$i]['tmp_name'],$dir.$file_array[$i]['name']);
					// echo " <br> Amenities Upload Successfully";
					$int += 1;
				}
				elseif(is_dir($dir))
				{
					move_uploaded_file($file_array[$i]['tmp_name'],$dir.$file_array[$i]['name']);
					// echo " <br> Amenities Upload Successfully";
					$int += 1;
				}			
			}
			

		//Image Amenities
				if(isset($_FILES['imageAmenities']))
				{
							// pre_r($_FILES);
							$file_array = reArrayFiles($_FILES['imageAmenities']);
							//pre_r($file_array);
							for($i=0; $i<count($file_array); $i++)
							{
								$spes = "uploads/".$title."/amenities/";
								if(!is_dir($spes))
								{
									mkdir($spes,0755,true);
									move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
									// echo " <br> Amenities Upload Successfully";
									$int += 1;
								}
								elseif(is_dir($spes))
								{
									move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
									// echo " <br> Amenities Upload Successfully";
									$int += 1;
								}

								
							}
							
				}//image amenities
				
			


			$this->pm->update_property($facade,$id);
			echo "<script>alert('Successfully Created a New Property')</script>";
			
			sleep(3);

			redirect('admin/dashboard/'.$this->session->userdata('useremail'));

		}//FACADE
		

	}
	



	
}


 ?>
