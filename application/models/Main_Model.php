<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Model extends CI_Model
{

	public function __construct(){
		parent::__construct();	
	}
	public function retrieve_properties()
	{
		$this->db->select('*');
		$this->db->where('property_system_status','1');// dont show hide and deleted properties
		$this->db->where('property_sample_view !=', NULL);//dont show properties without description
		$this->db->order_by('property_date_posted', 'DESC');
		$query = $this->db->get('property_tbl');
		return $query->result();
	}
	public function get_property_by_id($id)
	{
		
		$this->db->select('*');
		$this->db->Where('property_id', $id);
		$this->db->where('property_system_status','1');// dont show hide and deleted properties
		$query = $this->db->get('property_tbl');
		return $query->row();
	}
	public function property_viz()
	{
		$this->db->select('*');
		$this->db->where('property_status', 0);
		$this->db->where('location', 'Visayas');
		$this->db->order_by('date_posted', 'DESC');
		$query = $this->db->get('property_tbl');
		return $query->result();
	}
	public function viewproject($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('property_tbl');
		return $query->row();
	}
	public function get_articles()
	{
		$this->db->select('*');
		
		$this->db->where('property_status' , 0);
		$this->db->order_by('id','DESC');
		$query = $this->db->get('articles_tbl');
		return $query->result();
	}
	public function search_art($input)
	{
		$this->db->select('*');
		$this->db->where('property_status', 0);
		$this->db->like('title', $input);//search in title
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('articles_tbl');
		return $query->result_array();
	}
	public function view_article($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('articles_tbl');
		return $query->row();
	}
	public function save_inquiry($inquiry)
	{
		return $this->db->insert('inquiries_tbl', $inquiry);
	}
	
	public function count_art()
	{
		
		$this->db->select('*');
		$this->db->where('property_status', 0);
		$qry = $this->db->get('articles_tbl');
		return $qry->num_rows();

	}
	public function insert_subscriber($input)
	{
		$arr = array(
			'email' => $input,
			'date_sub' => date('Y-m-d, g:i'),
		);	
		return $this->db->insert('subscribed_tbl', $arr);
	}
	public function twin($slug)
	{
		$this->db->select('*');
		$this->db->where('title_slug', $slug);
		$this->db->where('twin_suite', '1');
		$this->db->where('property_status', 0);
		$qry = $this->db->get('property_tbl');
		return $qry->num_rows();
	}
	public function queen($slug)
	{
		$this->db->select('*');
		$this->db->where('title_slug', $slug);
		$this->db->where('queen_suite', '1');
		$this->db->where('property_status', 0);
		$qry = $this->db->get('property_tbl');
		return $qry->num_rows();
	}
	public function executive($slug)
	{
		$this->db->select('*');
		$this->db->where('title_slug', $slug);
		$this->db->where('executive_suite', '1');
		$this->db->where('property_status', 0);
		$qry = $this->db->get('property_tbl');
		return $qry->num_rows();
	}
	public function speciallyabled($slug)
	{
		$this->db->select('*');
		$this->db->where('title_slug', $slug);
		$this->db->where('executive_suite', '1');
		$this->db->where('property_status', 0);
		$qry = $this->db->get('property_tbl');
		return $qry->num_rows();
	}
	public function junior($slug)
	{
		$this->db->select('*');
		$this->db->where('title_slug', $slug);
		$this->db->where('junior_suite', '1');
		$this->db->where('property_status', 0);
		$qry = $this->db->get('property_tbl');
		return $qry->num_rows();
	}
	public function price($price)
	{	

		$this->db->select('*');
		$this->db->where('price2 <=', $price);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('property_tbl');
		return $query->result_array();
	}
	public function get_search($keyword, $price, $location, $unit)
	{		
		if($location != 'Location')
		{
			$this->db->select('*');
			$this->db->where('property_status', 0);
			$this->db->like('title', $location);//search in title
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('property_tbl');
			return $query->result_array();
		}
		else if($unit != 'Unit Type')
		{

			$this->db->select('*');
			$this->db->where('property_status', 0);
			$this->db->like('unit_type', $unit);//search in title
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('property_tbl');
			return $query->result_array();
		}
		else if ($price != 'Price Range')
		{
			
			// if( $price == '5000000')
			// {
				$this->db->select('*');
				$this->db->where('property_status', 0);
				$this->db->where('price2 <=' , 5000000);//search in title
				$this->db->order_by('id', 'DESC');
				$query = $this->db->get('property_tbl');
				return $query->result_array();
			// }
			
			
		}
		
		

		
	}
}