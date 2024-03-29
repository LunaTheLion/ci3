<?php 
if(!defined('BASEPATH'))exit('No direct script allowed');

class Property_Model extends CI_Model
{
	public function __construct(){
		parent::__construct();	
	}
	public function check_if_code_exist($code)
	{
		$this->db->select('*');
		$this->db->where('property_code', $code);
		$result = $this->db->get('property_tbl');
		if($result->num_rows() > 0)
		{	
			return true;
		}
		else
		{
			return true;
		}
	}
	public function add($arr)
	{
		// $info = array(
		// 	'property_code' => $this->input->post('property_code'),
		// 	'property_type' => $this->input->post('property_type'),
		// 	'property_address' => $this->input->post('property_address'),
		// 	'property_building' => $this->input->post('property_building'),
		// 	'property_category' => $this->input->post('property_category'),
		// 	'property_bath' =>$this->input->post('property_bath'),
		// 	'property_parking' =>$this->input->post('property_parking'),
		// 	'property_floor_area' => $this->input->post('property_floor_area'),
		// 	'property_lot_area' => $this->input->post('property_lot_area'),
		// 	'property_pet' => $this->input->post('property_pet'),
		// 	'property_garden' =>$this->input->post('property_garden'),
		// 	'property_date_posted' =>date('F j, Y  g:i'),
		// 	'property_facade' => $facade,
		// 	'property_additional_details'=> $this->input->post('property_additional_details'),
		// 	'property_price' => $this->input->post('property_price'),
		// 	'property_status' => $this->input->post('property_status'),
		// 	'property_title' => $this->input->post('property_title'),
		// 	'property_title_slug' => urlencode($this->input->post('property_title')),
		// 	'property_system_status' => $this->input->post('property_status'),
			
		// );
		return $this->db->insert('property_tbl', $arr);
	}
	public function info1()
	{
		$info = array(
			'property_code' => $this->session->userdata('property_code'),
			'property_type' => $this->session->userdata('property_type'),
			'property_address' => $this->session->userdata('property_address'),
			'property_building' => $this->session->userdata('property_building'),
			'property_category' => $this->session->userdata('property_category'),
			'property_bath' =>$this->session->userdata('property_bath'),
			'property_parking' =>$this->session->userdata('property_parking'),
			'property_floor_area' => $this->session->userdata('property_floor_area'),
			'property_lot_area' => $this->session->userdata('property_lot_area'),
			'property_pet' => $this->session->userdata('property_pet'),
			'property_garden' =>$this->session->userdata('property_garden'),
			
		);
		return $this->db->insert('property_tbl', $info);
	}
	public function add_property($facade, $title)
	{

		$propertydetails = array(
	
			'property_garden' => $this->session->userdata('property_garden'),
			'property_date_posted' =>date('F j, Y  g:i'),
			'property_facade' => $facade,
			'property_additional_details'=> $this->input->post('propertyDescription'),
			'property_price' => $this->input->post('propertyPrice'),
			'property_status' => $this->input->post('propertyStatus'),
			'property_title' => $this->input->post('propertyTitle'),
			'property_title_slug' => urlencode($this->input->post('propertyTitle')),
			'property_system_status' => $this->input->post('propertyStatus'),
		);
		// echo $title;

		// echo "<pre>";
		// print_r($propertydetails);
		// echo "</pre>";
		$this->db->where('property_code',$title);
		 $this->db->update('property_tbl', $propertydetails);
		if($this->db->affected_rows() == 1 )
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	public function add_sample_view($desc,$id)
	{
		$view = array(
			'property_sample_view' => $desc,
		);
		$this->db->where('property_id', $id);
		$this->db->update('property_tbl', $view);
		if($this->db->affected_rows() == 1 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function view_sample_view()
	{	
		$id = $this->input->get('id');
		$this->db->select('property_id,property_sample_view');
		$this->db->where('property_id', $id);
		$query = $this->db->get('property_tbl');
		if($query->num_rows() > 0)
		{
			 return $query->row();
		}
		else
		{
			return false;
		}
	}
	public function edit_sample_view($desc,$id)
	{
		$view = array(
			'property_sample_view' => $desc,
		);
		$this->db->where('property_id', $id);
		$this->db->update('property_tbl', $view);
		if($this->db->affected_rows() == 1 )
		{
			return true;
		}
		else
		{
			return false;
		}
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
			'property_date_posted' =>date('	M "-" DD "-" y g:i'),
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