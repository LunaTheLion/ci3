<?php 
if(!defined('BASEPATH'))exit('No direct script allowed');

class Property extends CI_CONTROLLER
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Property_Model','pm');
		$this->load->helper(array('form','url'));
	}
	public function sample_upload()
	{
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
		
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

	public function ajax()
	{	
		sleep(3);
		if($_FILES["file"]["name"] != '')
		{
			$name = "erlona";
			echo json_encode($_FILES["file"]["name"]);
			// $output = '';
			// $config['upload_path'] = './upload/';
			// $config['allowed_types'] = 'gif|jpg|png|jpeg';
			// $this->load->library('upload', $config)
			// $this->upload->initialize($config);
			// if($count = 0 ; $count < count($_FILES['files']['name']); $count++)
			// {
			// 	$_FILES['file']['name'] = $_FILES['files']['name'][$count];
			// 	$_FILES['file']['type'] = $_FILES['files']['type'][$count];
			// 	$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$count];
			// 	$_FILES['file']['error'] = $_FILES['files']['error'][$count];
			// 	$_FILES['file']['size'] = $_FILES['files']['size'][$count];
			// 	if($this->upload->do_upload('file'))
			// 	{
			// 		$data = $this->upload->data();
			// 		$output .='
			// 			<div class="col-md-3">
			// 				<img src= "'.base_url().'upload/'.$data["file_name"].'" class="img-responsive img-thumbnail"/>
			// 			</div>
			// 		';
			// 	}
			// }
			// echo $output;

		}
			// $upload_path = 'uploads/';
			// for( $x = 0 ; $x < count($_FILES['files']['name']);  $x++)
			// {
			// 	 $tmp_name = $_FILES['files']['tmp_name'][$x];
			// 	 move_uploaded_file($tmp_name,$upload_path.$_FILES['files']['name']);
			// }
	}

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
