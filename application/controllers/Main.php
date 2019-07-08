<?php 
if(!defined('BASEPATH'))exit('No direct script allowed');

class Main extends CI_CONTROLLER
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Main_Model','mm');
	}
	public function projects()
	{
		// echo "This is Projects";
		$projects = $this->mm->projects();
		echo json_encode($projects);
	}
	public function luzon()
	{
		// echo "This is Projects";
		$projects = $this->mm->projects_luz();
		echo json_encode($projects);
	}
	public function visayas()
	{
		// echo "This is Projects";
		$projects = $this->mm->projects_viz();
		echo json_encode($projects);
	}
	  public function view_project($id)
	{
		
		 $proj = $this->mm->viewproject($id);
		 $asd = array(
		 	'title' =>$proj->title,
		 	'title_slug' =>$proj->title_slug,
		 	'address' => $proj->address,
		 	'location' =>$proj->location,
		 	'amenities' =>$proj->amenities,
		 	'about' =>$proj->about,
		 	'facade' => $proj->facade,
		 	'landmarks' => $proj->nearby_establishments,
		 	'unit_type' => $proj->unit_type,
		 	'price' => $proj->price,
		 	'url'=>$proj->URL,
		 	'features' =>$proj->features_dev_hghlts,
		 	'turn-over' => $proj->Turn_over,
		 	'twin_size' => $proj->twin_size,
		 	'queen_size' => $proj->queen_size,
		 	'executive_size' => $proj->executive_size,
		 	'spec_size' => $proj->special_size,
		 	'junior_size' => $proj->junior_size,
		 	'twin_price' => $proj->twin_price,
		 	'queen_price' => $proj->queen_price,
		 	'executive_price' => $proj->executive_price,
		 	'spec_price' => $proj->spec_price,
		 	'roommenities' => $proj->room_amenities,
		 	'junior_price' => $proj->junior_price,
		 );
		 $this->session->set_flashdata($asd);
		// $ar = array(
		// 	'proj' => $this->mm->viewproject($project),
		// );
		$data['title'] = "Hotel Profile";
		$this->load->view('templates/header',$data);
		$this->load->view('pages/hotel-profile');
		$this->load->view('templates/footer');		
	}	

	public function get_articles()
	{
		$articles = $this->mm->get_articles();
		echo json_encode($articles);
	}
	
	
	public function article()
	{
		$count = $this->mm->count_art();
		//echo $count;
		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost/Megaworld_Condotel/Main/view_article/';
		$config['total_rows'] = $this->mm->count_art();
		$config['per_page'] = 1;
			
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination" >';
		 $config['full_tag_close'] = '</ul></nav></div>';
		 $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		 $config['num_tag_close'] = '</span></li>';
		 $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		 $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
		 $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		 $config['next_tag_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
		 $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		 $config['prev_tag_close'] = '</span></li>';
		 $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		 $config['first_tag_close'] = '</span></li>';
		 $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		 $config['last_tag_close'] = '</span></li>';
		$this->pagination->initialize($config);
		$data['title'] = "Articles";
		$this->load->view('templates/header', $data);
		$this->load->view('pages/articles');
		$this->load->view('templates/footer');		
	}
	public function articlepage($num)
	{
		
	}
	public function view_article($id)
	{	

		$art = $this->mm->view_article($id);
		$qwer = array(
			'title' => $art->title,
			'url' =>$art->url,
			'img' => $art->img,
			'content' =>$art->content,
		);
		$this->session->set_flashdata($qwer);
		$data['title'] = "Articles";
		$this->load->view('templates/header', $data);
		$this->load->view('pages/view-article');
		$this->load->view('templates/footer');
	}
	// public function view_project($id)
	// {
	// 	echo "Project id is ".$id;
	// }
	public function l1()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/hotel-profile-2');
		$this->load->view('templates/footer');
	}
	
	public function unit_type1()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/hotel-profile-2-1');
		$this->load->view('templates/footer');
	}
	public function check_twin()
	{
		$slug =$this->input->get('slug');
		$check = $this->mm->twin($slug);
		echo json_encode($check);
	}
	public function check_queen()
	{
		$slug =$this->input->get('slug');
		$check = $this->mm->queen($slug);
		echo json_encode($check);
	}
	public function check_executive()
	{
		$slug =$this->input->get('slug');
		$check = $this->mm->executive($slug);
		echo json_encode($check);
	}
	public function check_speciallyabled()
	{
		$slug =$this->input->get('slug');
		$check = $this->mm->speciallyabled($slug);
		echo json_encode($check);
	}
	public function check_junior()
	{
		$slug =$this->input->get('slug');
		$check = $this->mm->junior($slug);
		echo json_encode($check);
	}
	public function search()
	{
		
		$price = $this->input->post('price');
		$location = $this->input->post('location');
		$unit = $this->input->post('unittype');
		//  $result = $this->mm->get_search($keyword, $price, $location, $unit);
		
		 $result = $this->mm->get_search( $price, $location, $unit);
		echo json_encode($result);
	}

	public function search_articles()
	{
		$input = $this->input->post('searcharticle');
		$result = $this->mm->search_art($input);
		echo json_encode($result);
	}
	public function subscribe()
	{
		$input = $this->input->post('subemail');
		$result = $this->mm->insert_subscriber($input);
		//$result = "Hello";
		echo json_encode($result);
	}
}
 ?>

