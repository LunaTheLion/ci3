<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	Class db_model extends CI_MODEL{
		public function __construct()
		{
			parent::__construct();
			$this->load->dbforge();
		}
	
		public function create_admin_table()
		{
			$check_admin_tbl = $this->db->query("SHOW TABLES LIKE 'admin_tbl';");
			if ($check_admin_tbl->num_rows()==0)
			{
				// create table if not exist
				
				$this->db->query("
					CREATE TABLE IF NOT EXISTS admin_tbl (
						admin_id INT(7) AUTO_INCREMENT PRIMARY KEY,
						admin_email VARCHAR(50) NOT NULL,
						admin_password VARCHAR(32) NOT NULL,
						admin_type CHAR(11) NOT NULL,
						admin_date_joined DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
						admin_status TINYINT(1) NOT NULL DEFAULT 1
					);
				");
				return True;
			}
		}
		public function insert_default_admin()
		{
			$admin_check = $this->db->select()->where('admin_id',1)->get('admin_tbl');
			if ($admin_check->num_rows()!=1)
			{
				$admin_data = array(
					'admin_email' =>'saleandrentals@gmail.com',
					'admin_password' =>'f6fdffe48c908deb0f4c3bd36c032e72',
					'admin_type'=>'super_admin',
				);
				$this->db->insert('admin_tbl',$admin_data);
				return true;
			}
		}
		public function create_inquiries_table()
		{
			$check_inquiries_tbl = $this->db->query("SHOW TABLES LIKE 'inquiries_tbl';");
			if ($check_inquiries_tbl->num_rows()==0)
			{
				// create table if not exist
				$this->db->query("
					CREATE TABLE IF NOT EXISTS inquiries_tbl (
						inquiry_id INT(11) AUTO_INCREMENT PRIMARY KEY,
						inquiry_contact_no VARCHAR(15) NOT NULL,
						inquiry_email VARCHAR(30) NOT NULL,
						inquiry_name VARCHAR(30) NOT NULL,
						inquiry_project VARCHAR(30) NOT NULL,
						inquiry_message VARCHAR(8000) NOT NULL,
						inquiry_date_received DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
						inquiry_status TINYINT(1) NOT NULL DEFAULT 1
					);
				");
				return True;
			}

		}
		public function create_project_table()
		{
			$check_project_tbl = $this->db->query("SHOW TABLES LIKE 'project_tbl';");
			if ($check_project_tbl->num_rows()==0)
			{
				// create table if not exist
				$this->db->query("
					CREATE TABLE IF NOT EXISTS project_tbl (
						project_id INT(11) AUTO_INCREMENT PRIMARY KEY,
						project_title VARCHAR(40) NOT NULL,
						project_title_slug VARCHAR(40) NOT NULL,
						project_about VARCHAR(8000) NOT NULL,
						project_address VARCHAR(150) NOT NULL,
						project_location VARCHAR(100) NOT NULL,
						project_price INT(20) NOT NULL,
						project_unit_status INT(3) NOT NULL,
						project_lot_area INT(10) NOT NULL,
						project_floor_area INT(10) NOT NULL,
						project_property_code VARCHAR(15) NOT NULL,
						project_additional_details VARCHAR(800) NOT NULL,
						project_date_posted DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
						project_date_edited DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
						project_status TINYINT(1) NOT NULL DEFAULT 1 
					);
				");
				return True;
			}

		}
		public function create_owner_table()
		{
			$check_owner_tbl = $this->db->query("SHOW TABLES LIKE 'owner_tbl';");
			if ($check_owner_tbl->num_rows()==0)
			{
				// create table if not exist
				$this->db->query("
					CREATE TABLE IF NOT EXISTS owner_tbl (
						owner_id INT(11) AUTO_INCREMENT PRIMARY KEY,
						owner_contact_no VARCHAR(15) NOT NULL,
						owner_email VARCHAR(30) NOT NULL,
						owner_name VARCHAR(30) NOT NULL,
						owner_project VARCHAR(30) NOT NULL,
						owner_message VARCHAR(8000) NOT NULL,
						owner_date_received DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
						owner_status TINYINT(1) NOT NULL DEFAULT 1
					);
				");
				return True;
			}

		}
		public function getTableStructure($table_name)
		{
			$fields = $this->db->field_data($table_name);
			return $fields;
		}
		

	}
 ?>