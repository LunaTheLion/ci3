<?php 
	class Admin_Model extends CI_MODEL
	{
		public function __construct(){
			parent::__construct();	
		}
		
		public function acc_signin($email, $pass)
		{
			//check if email is the default email 
			$this->db->select('*');
			$this->db->where('admin_email', $email);
			$this->db->where('admin_password', md5($pass));
			$get_account = $this->db->get('admin_tbl');
			if(!empty($get_account) && $get_account->num_rows() > 0)
			{
				return $get_account->row();
			}
			else
			{
				return false;
			}
			//else check  if account is verified.

		}
	}
 ?>