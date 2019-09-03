<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

	public function __construct(){
		parent::__construct();	
	}
	
	public function register_account($info)
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

	
	public function properties()
	{
		$this->db->select('*');
		$this->db->order_by('property_date_edited', 'DESC');
		$this->db->where('property_system_status !=', 'Deleted');
		$query = $this->db->get('property_tbl');
		return $query->result();
	}
	public function all_properties()
	{
		$this->db->select('*');
		$this->db->order_by('property_date_edited', 'DESC');
		$this->db->where('property_system_status !=', 'Deleted');
		$query = $this->db->get('property_tbl');
		return $query;
	}
	public function all_sales()
	{
		$this->db->select('*');
		$this->db->order_by('property_date_edited', 'DESC');
		$this->db->where('property_system_status !=', 'Deleted');
		$this->db->where('property_status', 'Sale Only');
		$query = $this->db->get('property_tbl');
		return $query;
	}
	public function all_rents()
	{
		$this->db->select('*');
		$this->db->order_by('property_date_edited', 'DESC');
		$this->db->where('property_system_status !=', 'Deleted');
		$this->db->where('property_status', 'Rent Only');
		$query = $this->db->get('property_tbl');
		return $query;
	}
	public function all_owners()
	{
		$this->db->select('*');
		$this->db->order_by('owner_date_received', 'DESC');
		$this->db->where('owner_property_status', 1 );
		$query = $this->db->get('owner_tbl');
		return $query;
	}
	public function all_accounts()
	{
		$this->db->select('*');
		$this->db->order_by('admin_date_joined', 'DESC');
		$this->db->where('admin_type', 'admin' );
		$this->db->where('admin_status', 1 );
		$query = $this->db->get('admin_tbl');
		return $query;
	}
	public function all_inquiries()
	{
		$this->db->select('*');
		$this->db->order_by('inquiry_date_received', 'DESC');
		$this->db->where('inquiry_status !=', 3 );
		$query = $this->db->get('inquiries_tbl');
		return $query;
	}
	public function count_new_inquiry()
	{
		$this->db->select('*');
		$this->db->order_by('inquiry_date_received', 'DESC');
		$this->db->where('inquiry_status', 1 );
		$query = $this->db->get('inquiries_tbl');
		return $query->num_rows();
	}
	public function count_inq()
	{
		$this->db->select('*');
		$this->db->order_by('inquiry_date_received', 'DESC');
		$this->db->where('inquiry_status !=', 3 );
		$query = $this->db->get('inquiries_tbl');
		return $query->num_rows();
	}
	public function count_own()
	{
		$this->db->select('*');
		$this->db->order_by('owner_date_received', 'DESC');
		$this->db->where('owner_property_status !=', 3 );
		$query = $this->db->get('owner_tbl');
		return $query->num_rows();
	}
	public function count_art()
	{
		$this->db->select('*');
		$this->db->order_by('article_date_uploaded', 'DESC');
		$this->db->where('article_system_status !=', 3 );
		$query = $this->db->get('article_tbl');
		return $query->num_rows();
	}
	public function count_prop()
	{
		$this->db->select('*');
		$this->db->order_by('property_date_posted', 'DESC');
		$this->db->where('property_system_status !=', 'Deleted' );
		$query = $this->db->get('property_tbl');
		return $query->num_rows();
	}
	public function count_new_owner()
	{
		$this->db->select('*');
		$this->db->order_by('owner_date_received', 'DESC');
		$this->db->where('owner_property_status', 1 );
		$query = $this->db->get('owner_tbl');
		return $query->num_rows();
	}
	public function check_inquiry()
	{
		//check the inquiry if it is new or not
		$id = $this->input->get('id');

		$this->db->where('inquiry_id', $id);
		$this->db->where('inquiry_status', 1);
		$query = $this->db->get('inquiries_tbl');
		return $query->row();
	}
	public function update_inquiry()
	{
		$id = $this->input->get('id');
			$data = array(
				'inquiry_status' => 2,
			);
			$this->db->where('inquiry_id',$id);
			$this->db->update('inquiries_tbl',$data);
			if($this->db->affected_rows() > 0)
			{
				return true;
			} 
			else
			{
				return false;
			}
	}
	public function read_inquiry()//if new inquiry
	{
		//check if status 2
		$id = $this->input->get('id');

		$this->db->where('inquiry_id', $id);
		$this->db->where('inquiry_status !=', 3);
		$query = $this->db->get('inquiries_tbl');
		return $query->row();
	}
	public function all_inquiries_sent_items()
	{
		
	}
	public function add_owner($owner_details)
	{
		$this->db->insert('owner_tbl', $owner_details);
		if($this->db->affected_rows() == 1 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function see_owner()
	{
		$id = $this->input->get('id');
		$this->db->where('owner_id', $id);
		$query = $this->db->get('owner_tbl');
		if($query->num_rows() > 0)
		{
			 return $query->row();
		}
		else
		{
			return false;
		}
	}
	public function update_owner( $id, $data)
	{
		$this->db->where('owner_id',$id);
		$this->db->update('owner_tbl',$data);
		if($this->db->affected_rows() > 0)
		{
			return true;
		} 
		else
		{
			return false;
		}
	}
	public function add_article()
	{
		// echo $this->input->post('articletitle');
		// echo $this->input->post('articlelink');
		// echo $this->input->post('articlebody');
		$data = array(
			'article_title' => $this->input->post('articletitle'),
			'article_title_slug' => urlencode($this->input->post('articletitle')),
			'article_link' => $this->input->post('articlelink'),
			'article_body' => $this->input->post('articlebody'),
			'artcile_status' => 1,
		);

		$this->db->insert('article_tbl', $data);
		if($this->db->affected_rows() == 1 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function all_articles()
	{
		
		$this->db->select('*');
		$this->db->order_by('article_date_uploaded', 'DESC');
		//$this->db->where('article_system_status !=',3);
		$query = $this->db->get('article_tbl');
		return $query;
	}



	public function edit_article($id)
	{
		$this->db->select('id,img,url,title,content,title_slug,date_uploaded');
		$this->db->Where('id', $id);
		$this->db->where('status', 0);
		$query = $this->db->get('articles_tbl');
		return $query->row();
	}
	public function get_property_by_id($id)
	{
		
		$this->db->select('*');
		$this->db->Where('property_id', $id);
		$this->db->where('property_system_status !=', 'Deleted');
		$query = $this->db->get('property_tbl');
		return $query->row();
	}
	public function get_article_by_id($id)
	{
		
		$this->db->select('*');
		$this->db->Where('article_id', $id);
		//$this->db->where("(article_system_status='1' OR article_system_status='2')");
		$query = $this->db->get('article_tbl');
		return $query->row();
	}
	public function update_article($image, $id)
	{
		$article = array(
			'img' => $image,
			'title' => $this->input->post('projectTitle'),
			'title_slug' => urlencode($this->input->post('projectTitle')),
			'content' =>$this->input->post('articleAbout'),
			'date_uploaded' => date('M "-" DD "-" y g:i'),
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
			'date_uploaded' => date('M "-" DD "-" y g:i'),
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
	public function hide_prop()
	{
		$id= $this->input->get('id');
		//echo $id;
		
		$stat = array(
			'property_system_status' => 2,
		);
		$this->db->where('property_id', $id);
		$this->db->update('property_tbl',$stat);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function unhide_prop()
	{
		$id= $this->input->get('id');
		//echo $id;
		
		$stat = array(
			'property_system_status' => 1,
		);
		$this->db->where('property_id', $id);
		$this->db->update('property_tbl',$stat);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function hide_art()
	{
		$id= $this->input->get('id');
		//echo $id;
		
		$stat = array(
			'article_system_status' => 2,
		);
		$this->db->where('article_id', $id);
		$this->db->update('article_tbl',$stat);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function unhide_art()
	{
		$id= $this->input->get('id');
		//echo $id;
		
		$stat = array(
			'article_system_status' => 1,
		);
		$this->db->where('article_id', $id);
		$this->db->update('article_tbl',$stat);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function del_prop()
	{
		$id= $this->input->get('id');
		//echo $id;
		
		$stat = array(
			'property_system_status' => 'Deleted',
			'property_date_deleted' => date('M "-" DD "-" y g:i'),
		);
		$this->db->where('property_id', $id);
		$this->db->update('property_tbl',$stat);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function del_art()
	{
		$id= $this->input->get('id');
		//echo $id;
		
		$stat = array(
			'article_system_status' => "Deleted",
			'article_date_deleted' => date('M "-" DD "-" y g:i'),
		);
		$this->db->where('article_id', $id);
		$this->db->update('article_tbl',$stat);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function del_owner()
	{
		$id = $this->input->get('id');
		 $data = array(
				'owner_status'=> 2,
			);	
		$this->db->where('owner_id', $id );
		$this->db->update('owner_tbl',$data);
		if($this->db->affected_rows() > 0)
		{
			return true;
		} 
		else
		{                                                                                             
			return false;
		}
	}
	public function del_account()
	{
		$id = $this->input->get('id');
		$data = array(
			'admin_status' => 2,
		);
		$this->db->where('admin_id', $id);
		$this->db->update('admin_tbl', $data);
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
			'date_posted' => date('	M "-" DD "-" y g:i'),
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
		$verified = array(
			'admin_verified'=> 'verified',
			'admin_date_joined' => date('	M "-" DD "-" y g:i'),

		);
		$this->db->select('*');
		$this->db->where('admin_email', $email);
		$this->db->where('admin_code', $pass);
		$this->db->update('admin_tbl', $verified);
		
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