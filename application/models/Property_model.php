<?php 
if(!defined('BASEPATH'))exit('No direct script allowed');

class Property_Model extends CI_Model
{
	public function __construct(){
		parent::__construct();	
	}
	public function add_property($facade)
	{
		echo $this->input->post('propertyDescription');
		echo "<br>";
		echo $this->input->post('propertyGarden');
		echo "<br>";
		echo $this->input->post('propertyPet');
		echo "<br>";
		echo $this->input->post('propertyParking');
		echo "<br>";
		echo $this->input->post('propertyBath');
		echo "<br>";
		echo $this->input->post('propertyBed');
		echo "<br>";
		echo $this->input->post('propertyFloorArea');
		echo "<br>";
		echo $this->input->post('propertyLotArea');
		echo "<br>";
		echo $this->input->post('projectPrice');
		echo "<br>";
		echo $this->input->post('projectAddress');
		echo "<br>";
		echo $this->input->post('projectBuilding');
		echo "<br>";
		echo $this->input->post('projectLocation');
		echo "<br>";
		echo $this->input->post('projectTitle');
		echo "<br>";
		echo $this->input->post('propertyStatus');
		echo "<br>";
		echo $this->input->post('propertyType');
		
		// $project = array(
		// 	'title' => $this->input->post('projectTitle'),
		// 	'title_slug' =>urlencode($this->input->post('projectTitle')),
			
			
			
		// );
		
		// echo "<pre>";
		// print_r($project);
		// echo "</pre>";
		// return $this->db->insert('project_tbl', $project);
;	}
	public function update_project($facade,$id)
	{
		
		
		$project = array(
			'title' => $this->input->post('projectTitle'),
			'title_slug' =>urlencode($this->input->post('projectTitle')),
			
		);
		$this->db->where('id', $id);
		$this->db->where('status', 0);
		 $this->db->update('project_tbl', $project);
		if($this->db->affected_rows() == 1 )
		{
			return true;
		}
		else
		{
			return false;
		}
		//echo "<script>alert('Hello')</script>";
		// echo "<pre>";
		// print_r($project);
		// echo "</pre>";
	}
	public function insertUser($data)
	{
		print_r($data);
	}
	public function multiple_images($image = array())
	{
		print_r($image);
	    //return $this->db->insert_batch('profile_images',$image);
	}
	public function trial($sample)
	{
		// $sql = "INSERT INTO image_tbl  VALUES('".$sample."')";
		// $this->db->query($sql);s
		//print_r($sample);
		$this->db->insert('image_tbl', $sample);
		//Save to the database please

	}
}
?>