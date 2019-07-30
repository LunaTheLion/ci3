<?php 
if(!defined('BASEPATH'))exit('No direct script allowed');

class Property_Model extends CI_Model
{
	public function __construct(){
		parent::__construct();	
	}
	public function add_property($facade)
	{
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

		$propertydetails = array(
			'property_type'=> $this->input->post('propertyType'),
			'property_facade' => $facade,
			'property_title' => $this->input->post('projectTitle'),
			'property_title_slug' =>urlencode($this->input->post('projectTitle')),
			'property_title_slug'=>urlencode($this->input->post('projectTitle')),
			'property_address'=>$this->input->post('projectAddress'),
			'property_location'=> $this->input->post('projectLocation'),
			'property_bath' => $this->input->post('propertyBath'),
			'property_building'=>$this->input->post('projectBuilding'),
			'property_price' => $this->input->post('projectPrice'),
			'property_garden' =>$this->input->post('propertyGarden'),
			'property_pet' => $this->input->post('propertyPet'),
			'property_parking' => $this->input->post('propertyParking'),
			'property_bed' => $this->input->post('propertyBed'),
			'property_lot_area' =>$this->input->post('propertyLotArea'),
			'property_floor_area'=>$this->input->post('propertyFloorArea'),
			'property_code'=> strtoupper($pass),
			'property_additional_details'=> $this->input->post('propertyDescription'),
			'property_date_posted' =>date('Y-m-d g:i'),
			'property_status' => $this->input->post('propertyStatus'),
		);
		// echo "<pre>";
		// print_r($propertydetails);
		// echo "</pre>";
		return $this->db->insert('property_tbl', $propertydetails);
	}
	public function update_project($facade,$id)
	{
		
		
		$project = array(
			'property_id' => $id,
			'property_type'=> $this->input->post('propertyType'),
			'property_facade' => $facade,
			'property_title' => $this->input->post('projectTitle'),
			'property_title_slug' =>urlencode($this->input->post('projectTitle')),
			'property_title_slug'=>urlencode($this->input->post('projectTitle')),
			'property_address'=>$this->input->post('projectAddress'),
			'property_location'=> $this->input->post('projectLocation'),
			'property_bath' => $this->input->post('propertyBath'),
			'property_building'=>$this->input->post('projectBuilding'),
			'property_price' => $this->input->post('projectPrice'),
			'property_garden' =>$this->input->post('propertyGarden'),
			'property_pet' => $this->input->post('propertyPet'),
			'property_parking' => $this->input->post('propertyParking'),
			'property_bed' => $this->input->post('propertyBed'),
			'property_lot_area' =>$this->input->post('propertyLotArea'),
			'property_floor_area'=>$this->input->post('propertyFloorArea'),
			'property_additional_details'=> $this->input->post('propertyDescription'),
			'property_date_edited' =>date('Y-m-d g:i'),
			'property_status' => $this->input->post('propertyStatus'),
			
		);
		$this->db->where('property_id', $id);
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

}
?>