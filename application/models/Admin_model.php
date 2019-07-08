<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

	public function __construct(){
		parent::__construct();	
	}
	
	public function register($info)
	{
		$this->db->insert('admin_tbl',$info);
		return true;
	}
	public function login()
	{
		$qry = $this->db->select('*')->from('admin_tbl')
		        ->group_start()
		                ->where('admin_username', $this->input->post('email'))
		                ->or_group_start()
		                        ->where('admin_email', $this->input->post('email'))
		                        
		                ->group_end()
		        ->group_end()
		        ->where('admin_verified', 'verified')
		        ->where('admin_password', md5($this->input->post('password')))
		->get();
		if($qry->num_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}

	}
	public function check_account_exist()
	{
		$qry = $this->db->select('*')->from('admin_tbl')
		        ->group_start()
		                ->where('admin_username', $this->input->post('email'))
		                ->or_group_start()
		                        ->where('admin_email', $this->input->post('email'))             
		                ->group_end()
		        ->group_end()
		        
		->get();
		if($qry->num_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function get_email()
	{
		$qry = $this->db->select('admin_email')->from('admin_tbl')
		        ->group_start()
		                ->where('admin_username', $this->input->post('email'))
		                ->or_group_start()
		                        ->where('admin_email', $this->input->post('email'))             
		                ->group_end()
		        ->group_end()
		        
		->get();
		if(!empty($qry) && $qry->num_rows() > 0)
		 {
			return $qry->row('admin_email');
		}
		else
		{
			"No Result";
		}
	}
	public function check_verified()
	{	
		$qry = $this->db->select('*')->from('admin_tbl')
		        ->group_start()
		                ->where('admin_username', $this->input->post('email'))
		                ->or_group_start()
		                        ->where('admin_email', $this->input->post('email'))
		                        
		                ->group_end()
		        ->group_end()
		        ->where('admin_verified', 'verified')
		->get();
		if($qry->num_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function get_acc($email)
	{
		$this->db->select('*');
		$this->db->where('admin_email',$email);
		$query = $this->db->get('admin_tbl');
	 		if(!empty($query) && $query->num_rows() > 0)
	 		{
				return $query->row();

			}
			else
			{
			"No Result";
			}
	}
	public function register_info()
	{
		$new = array(
			'date_created' => date('Y-m-d g:i'),
			'birthdate' => $this->input->post('birthdate'),
		);
		$this->db->where('id', $this->session->userdata('id'));
		$qry =$this->db->update('admin_tbl', $new);
		
		if($this->db->affected_rows() == 1 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function acc($namepart)
	{
		$this->db->select('*');
		$this->db->like('admin_email',$namepart,'both');
		$this->db->or_like('admin_username', $namepart);
		$query = $this->db->get('admin_tbl');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}

	}

	public function inquiries()
	{
		$this->db->select('*');
		$this->db->order_by('date_received','DESC');
		$query = $this->db->get('inquiries_tbl');
		return $query->result();
	}

	public function sav_inquiries()
	{
		
		$this->db->select('*');
		$this->db->like('project', 'Savoy','both');
		$query = $this->db->get('inquiries_tbl');
		return $query->num_rows();
	}
	public function bel_inquiries()
	{
		
		$this->db->select('*');
		$this->db->like('project', 'Belmont','both');
		$query = $this->db->get('inquiries_tbl');
		return $query->num_rows();
	}
	public function cha_inquiries()
	{
		
		$this->db->select('*');
		$this->db->like('project', 'Chancellor','both');
		$query = $this->db->get('inquiries_tbl');
		return $query->num_rows();
	}
	public function kin_inquiries()
	{
		
		$this->db->select('*');
		$this->db->like('project', 'King','both');
		$query = $this->db->get('inquiries_tbl');
		return $query->num_rows();
	}
	public function gra_inquiries()
	{
		
		$this->db->select('*');
		$this->db->like('project', 'Grand','both');
		$query = $this->db->get('inquiries_tbl');
		return $query->num_rows();
	}

	public function projects()
	{
		$this->db->select('*');
		$this->db->order_by('date_posted', 'DESC');
		$this->db->where('status', 0);
		$query = $this->db->get('project_tbl');
		return $query->result();
	}
	public function articles()
	{
		$this->db->select('id,img,title,title_slug,date_uploaded');
		$this->db->order_by('id', 'DESC');
		$this->db->where('status', 0);
		$query = $this->db->get('articles_tbl');
		return $query->result();
	}
	public function add_article($image)
	{
		$article = array(

			'img' => $image,
			'title' => $this->input->post('projectTitle'),
			'title_slug' => urlencode($this->input->post('projectTitle')),
			'content' =>$this->input->post('articleAbout'),
			'date_uploaded' => date('Y-m-d g:i'),
			'status' => 0,
			'url' => $this->input->post('projectURL'),

		);
		// echo "<pre>";
		// print_r($article);
		// echo "</pre>";
		return $this->db->insert('articles_tbl',$article);

		if($this->db->affected_rows() == 1 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function multiple_images($image = array()){

	     return $this->db->insert_batch('profile_images',$image);
	             }
//Figure if it works

	public function insertUser($data)
	{
		print_r($data);
	}
	public function edit_article($id)
	{
		$this->db->select('id,img,url,title,content,title_slug,date_uploaded');
		$this->db->Where('id', $id);
		$this->db->where('status', 0);
		$query = $this->db->get('articles_tbl');
		return $query->row();
	}
	public function edit_project($id)
	{
		
		$this->db->select('*');
		$this->db->Where('id', $id);
		$this->db->where('status', 0);
		$query = $this->db->get('project_tbl');
		return $query->row();
	}
	public function update_article($image, $id)
	{
		$article = array(
			'img' => $image,
			'title' => $this->input->post('projectTitle'),
			'title_slug' => urlencode($this->input->post('projectTitle')),
			'content' =>$this->input->post('articleAbout'),
			'date_uploaded' => date('Y-m-d g:i'),
			'admin_name' => "Elona Mae",
		);
		// echo "<pre>";
		// print_r($article);
		// echo "</pre>";
		$this->db->where('id', $id);
		$this->db->where('status', 0);
		$this->db->update('articles_tbl',$article);
		

		if($this->db->affected_rows() == 1 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function update_project($image, $id)
	{
		$article = array(
			'facade' => $image,
			'title' => $this->input->post('projectTitle'),
			'title_slug' => urlencode($this->input->post('projectTitle')),
			'about' =>$this->input->post('articleAbout'),
			'date_uploaded' => date('Y-m-d g:i'),
			'admin_name' => "Elona Mae",
		);
		// echo "<pre>";
		// print_r($article);
		// echo "</pre>";
		$this->db->where('id', $id);
		$this->db->where('status', 0);
		$this->db->update('project_tbl',$article);
		

		if($this->db->affected_rows() == 1 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function view_art()
	{
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$this->db->where('status', 0);
		$query = $this->db->get('articles_tbl');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	public function view_proj()
	{
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$this->db->where('status', 0);
		$query = $this->db->get('project_tbl');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	public function delete_art()
	{
		$id= $this->input->get('id');
		//echo $id;
		
		$stat = array(
			'status' => 1,
			'date_deleted' =>date(' Y-m-d g:i'),
		);
		$this->db->where('id', $id);
		$this->db->update('articles_tbl',$stat);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function delete_proj()
	{
		$id= $this->input->get('id');
		//echo $id;
		
		$stat = array(
			'status' => 1,
			'date_deleted' =>date(' Y-m-d g:i'),
		);
		$this->db->where('id', $id);
		$this->db->update('project_tbl',$stat);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function save_logo($image)
	{
		$array = array(
			'logo_img' => $image,
			'date_posted' => date('Y-m-d g:i'),
			'posted_by'=> 'Elona Mae',
			'status' => 0,

		);
		
		return $this->db->insert('logo_tbl', $array);
	}
	public function get_logo()
	{
		$this->db->select('*');
		$this->db->order_by('date_posted', 'DESC');
		$this->db->where('status', 0);
		$query = $this->db->get('logo_tbl');
		return $query->result();
	}

	public function update_acc($email, $pass)
	{
		$ver = array(
			'verified'=> 'verified',
			'date_verified' => date('Y-m-d g:i'),
		);
		$this->db->select('*');
		$this->db->where('email', $email);
		$this->db->where('code', $pass);
		$this->db->where('verified', '');
		$this->db->update('admin_tbl', $ver);
		
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}

	}
	public function get_admin_info()
	{
		$this->db->select('*');
		$this->db->where('username', $this->session->userdata('username'));
		$qry = $this->db->get('admin_tbl');
		return $qry->result();
	}
	public function inquiries_graph()
	{
		$this->db->select('*');
		$this->db->order_by('date_received','DESC');
		$query = $this->db->get('inquiries_tbl');
		return $query->result();
	}
}
  

?>