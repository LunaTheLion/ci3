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
	public function view_sample()
	{
		$result = $this->pm->view_sample_view();
		echo json_encode($result);
	}
	public function create_sample_view()
	{
		$desc = $this->input->post('sampledescription');
		$id = $this->input->post('data');
		if($this->pm->add_sample_view($desc,$id))
		{
			redirect(base_url('admin/dashboard/'.$this->session->userdata('useremail')));
		}
		else
		{
			redirect(base_url('admin/mng_dashboard/'.$this->session->userdata('useremail')));
		}
	}
	public function update_sample_view()
	{

		$desc = $this->input->post('sampledescription');
		$id = $this->input->post('data');
		if($this->pm->edit_sample_view($desc,$id))
		{
			redirect(base_url('admin/dashboard/'.$this->session->userdata('useremail')));
		}
		else
		{
			redirect(base_url('admin/mng_dashboard/'.$this->session->userdata('useremail')));
		}
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
				
			


			$this->pm->add_property($facade);
			echo "<script>alert('Successfully Created a New Property')</script>";
			
			sleep(3);

			redirect('admin/dashboard/'.$this->session->userdata('useremail'));

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
