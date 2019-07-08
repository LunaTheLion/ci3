<?php 
if(!defined('BASEPATH'))exit('No direct script allowed');

class Projects extends CI_CONTROLLER
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Project_Model','pm');
		$this->load->helper(array('form','url'));
	}

	public function create_project()
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
					$int += 1;
				}
				elseif(is_dir($dir))
				{
					move_uploaded_file($file_array[$i]['tmp_name'],$dir.$file_array[$i]['name']);
					// echo " <br> Amenities Upload Successfully";
					$int += 1;
				}
						
			}

			//LOCATION MAP
			if(isset($_FILES['locationMap']))
			{
				
				$file_array = reArrayFiles($_FILES['locationMap']);
				
				for($i=0; $i<count($file_array); $i++)
				{
					$spes = "uploads/".$title."/locationMap/";
					if(!is_dir($spes))
					{
						mkdir($spes,0755,true);
						move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
						
						$int += 1;
					}
					elseif(is_dir($spes))
					{
						move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
						// echo " <br> Amenities Upload Successfully";
						$int += 1;
					}
					
				}

				//Image DevMAP
				if(isset($_FILES['imageDevMap']))
				{
					// pre_r($_FILES);
					$file_array = reArrayFiles($_FILES['imageDevMap']);
					//pre_r($file_array);
					for($i=0; $i<count($file_array); $i++)
					{
						$spes = "uploads/".$title."/imageDevMap/";
						if(!is_dir($spes))
						{
							mkdir($spes,0755,true);
							move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
								// echo " <br> Developer's Map Upload Successfully";
							$int += 1;
						}
						elseif(is_dir($spes))
						{
							move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
							// echo " <br> Amenities Upload Successfully";
							$int += 1;
						}

					}
					//Image Unit
					if(isset($_FILES['imageUnit']))
					{
						
						$file_array = reArrayFiles($_FILES['imageUnit']);
						
						for($i=0; $i<count($file_array); $i++)
						{
							$spes = "uploads/".$title."/imageUnitLayout/";
							if(!is_dir($spes))
							{
								mkdir($spes,0755,true);
								move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
								
								$int += 1;
							}
							elseif(is_dir($spes))
							{
								move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
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
							//Floor Plan
							if(isset($_FILES['FloorPlan']))
							{
								
								$file_array = reArrayFiles($_FILES['FloorPlan']);
								
								for($i=0; $i<count($file_array); $i++)
								{
									$spes = "uploads/".$title."/FloorPlan/";
									if(!is_dir($spes))
									{
										mkdir($spes,0755,true);
										move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
										$int += 1;
									}
									elseif(is_dir($spes))
									{
										move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
										// echo " <br> Amenities Upload Successfully";
										$int += 1;
									}
									//Artists View
									if(isset($_FILES['imageArtist']))
									{
										
										$file_array = reArrayFiles($_FILES['imageArtist']);
										
										for($i=0; $i<count($file_array); $i++)
										{
											$spes = "uploads/".$title."/Artists/";
											if(!is_dir($spes))
											{
												mkdir($spes,0755,true);
												move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
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
									
								}
							}//image amenities
						}//image amenities
					}//imageunit
				}//image dev MAP
			}//LOCATION MAP


			$this->pm->add_project($facade);
			echo "<script>alert('Successfully Created a New Project')</script>";
			
			sleep(3);

			redirect('admin/mng_projects');

		}//FACADE
		
		

	}
	public function update_project($id)
	{	
		$title = urlencode($this->input->post('projectTitle'));
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
		$int = 0;
		//FACADE
		if(isset($_FILES['files']))
		{
			// pre_r($_FILES);
			$file_array = reArrayFiles($_FILES['files']);
			//pre_r($file_array);
			for($i=0; $i<count($file_array); $i++)
			{
				if($file_array[$i]['error'])
				{?> <div class="alert alert-danger">
					<?php echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']];
					 ?></div><?php
				}
				else
				{
					$extesions = array('jpg', 'png', 'gif', 'jpeg');
					$file_ext = explode('.', $file_array[$i]['name']);
					$file_ext = end($file_ext);
					//echo $file_ext;
					if(!in_array($file_ext, $extesions))
					{
						?><div class="alert alert-danger"><?php echo "{$file_array[$i]['name']} - Invalid file extension!" ?></div><?php
					}
					else
					{
						
						$dir = "uploads/".$title."/";
						$facade = $file_array[$i]['name'];
						move_uploaded_file($file_array[$i]['tmp_name'],$dir.$file_array[$i]['name']);
						// $msg ='Facade Upload Successfully';
						$int += 1;
						
						
						
					}
				}
			}
		}//FACADE

		//LOCATION MAP
		if(isset($_FILES['locationMap']))
		{
			// pre_r($_FILES);
			$file_array = reArrayFiles($_FILES['locationMap']);
			//pre_r($file_array);
			for($i=0; $i<count($file_array); $i++)
			{
				if($file_array[$i]['error'])
				{?> <div class="alert alert-danger">
					<?php echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']];
					 ?></div><?php
				}
				else
				{
					$extesions = array('jpg', 'png', 'gif', 'jpeg');
					$file_ext = explode('.', $file_array[$i]['name']);
					$file_ext = end($file_ext);
					//echo $file_ext;
					if(!in_array($file_ext, $extesions))
					{
						?><div class="alert alert-danger"><?php echo "{$file_array[$i]['name']} - Invalid file extension!" ?></div><?php
					}
					else
					{
						//$dir = "uploads/".$title."/";
						$spes = "uploads/".$title."/locationMap/";
						move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
						// echo  " Location Map Upload Successfully";
						$int += 1;
	
					}
				}
			}
		}//LOCATION MAP

		//Image DevMAP
		if(isset($_FILES['imageDevMap']))
		{
			// pre_r($_FILES);
			$file_array = reArrayFiles($_FILES['imageDevMap']);
			//pre_r($file_array);
			for($i=0; $i<count($file_array); $i++)
			{
				if($file_array[$i]['error'])
				{?> <div class="alert alert-danger">
					<?php echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']];
					 ?></div><?php
				}
				else
				{
					$extesions = array('jpg', 'png', 'gif', 'jpeg');
					$file_ext = explode('.', $file_array[$i]['name']);
					$file_ext = end($file_ext);
					//echo $file_ext;
					if(!in_array($file_ext, $extesions))
					{
						?><div class="alert alert-danger"><?php echo "{$file_array[$i]['name']} - Invalid file extension!" ?></div><?php
					}
					else
					{
						//$dir = "uploads/".$title."/";
						$spes = "uploads/".$title."/imageDevMap/";
						move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
							// echo " <br> Developer's Map Upload Successfully";
						$int += 1;
					}
				}
			}
		}//image dev MAP
		//Image Amenities
		if(isset($_FILES['imageAmenities']))
		{
			// pre_r($_FILES);
			$file_array = reArrayFiles($_FILES['imageAmenities']);
			//pre_r($file_array);
			for($i=0; $i<count($file_array); $i++)
			{
				if($file_array[$i]['error'])
				{?> <div class="alert alert-danger">
					<?php echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']];
					 ?></div><?php
				}
				else
				{
					$extesions = array('jpg', 'png', 'gif', 'jpeg');
					$file_ext = explode('.', $file_array[$i]['name']);
					$file_ext = end($file_ext);
					//echo $file_ext;
					if(!in_array($file_ext, $extesions))
					{
						?><div class="alert alert-danger"><?php echo "{$file_array[$i]['name']} - Invalid file extension!" ?></div><?php
					}
					else
					{
						//$dir = "uploads/".$title."/";
						$spes = "uploads/".$title."/amenities/";
						move_uploaded_file($file_array[$i]['tmp_name'],$spes.$file_array[$i]['name']);
						// echo " <br> Amenities Upload Successfully";
						$int += 1;
						
					}
				}
			}
		}//image amenities
		
		//echo $int;
		if($int == 4) 
		{
			sleep(3);
			echo "<script>alert('Successfully Updated a Project')</script>";
			$this->load->view('admin/template/header');
			$this->load->view('admin/admin-header');
			$this->load->view('admin/admin-main-sidebar');
			
			$this->load->view('admin/mng-projects');
			$this->load->view('admin/admin-footer');
			$this->load->view('admin/template/footer');
			$this->pm->update_project($facade,$id);
		}
		else
		{
			echo "<script>alert('Sorry Cannot Process update')</script>";
		}

		
	}
	public function products()
	{       
	    $this->load->library('upload');
	    $dataInfo = array();
	    $files = $_FILES;
	    $cpt = count($_FILES['userfile']['name']);
	    for($i=0; $i<$cpt; $i++)
	    {           
	        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
	        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
	        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
	        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
	        $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

	        $this->upload->initialize($this->set_upload_options());
	        $this->upload->do_upload();
	        $dataInfo[] = $this->upload->data();
	    }

	    $data = array(
	        'name' => $this->input->post('files'),
	        'prod_image' => $dataInfo[0]['file_name'],
	        'prod_image1' => $dataInfo[1]['file_name'],
	        'prod_image2' => $dataInfo[2]['file_name'],
	        'created_time' => date('Y-m-d H:i:s')
	     );
	     $result_set = $this->pm->insertUser($data);
	}

	private function set_upload_options()
	{   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = './resources/images/products/';
	    $config['allowed_types'] = 'gif|jpg|png';
	    $config['max_size']      = '0';
	    $config['overwrite']     = FALSE;

	    return $config;
	}
	public function multiple_files()
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


		 $file_array = reArrayFiles($_FILES['image_name']);
		 for($i=0; $i<count($file_array); $i++)
		 {
		 	$upload_path = "uploads/files";
		 	move_uploaded_file($file_array[$i]['tmp_name'],$upload_path.$file_array[$i]['name']);				
		 			
		 }


	  }
	
}


 ?>
