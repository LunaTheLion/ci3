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
						admin_username VARCHAR(30) NOT NULL,
						admin_verified VARCHAR(30) NOT NULL,
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
					'admin_email' =>'rentsandsale@gmail.com',
					'admin_password' =>'f6fdffe48c908deb0f4c3bd36c032e72',
					'admin_type'=>'super_admin',
					'admin_username' => 'rentsandsale',
					'admin_verified' => 'verified',
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
		public function create_property_table()
		{
			$check_property_tbl = $this->db->query("SHOW TABLES LIKE 'property_tbl';");
			if ($check_property_tbl->num_rows()==0)
			{
				// create table if not exist
				$this->db->query("
					CREATE TABLE IF NOT EXISTS property_tbl (
						property_id INT(11) AUTO_INCREMENT PRIMARY KEY,
						property_type VARCHAR(10) NOT NULL,
						property_facade VARCHAR(100) NOT NULL,
						property_title VARCHAR(40) NOT NULL,
						property_title_slug VARCHAR(40) NOT NULL,
						property_address VARCHAR(150) NOT NULL,
						property_location VARCHAR(100) NOT NULL,
						property_building VARCHAR(100) NOT NULL,
						property_price INT(20) NOT NULL,
						property_garden TINYINT(1) NOT NULL DEFAULT 0,
						property_pet TINYINT(1) NOT NULL DEFAULT 0,
						property_parking TINYINT(1) NOT NULL DEFAULT 0,
						property_bath TINYINT(1) NOT NULL DEFAULT 0,
						property_bed TINYINT(1) NOT NULL DEFAULT 0,
						property_lot_area INT(10) NOT NULL,
						property_floor_area INT(10) NOT NULL,
						property_code VARCHAR(15) NOT NULL,
						property_additional_details VARCHAR(10000) NOT NULL,
						property_date_posted DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
						property_date_edited DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
						property_status TINYINT(1) NOT NULL DEFAULT 1 ,
						property_system_status TINYINT(1) NOT NULL DEFAULT 1
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