<?php 
	class db extends CI_CONTROLLER{
		public function createdb($dbname)
		{
			$string = "CREATE DATABASE IF NOT EXIST $dbname " ;
			$query = $this->db->query($string);
			if(!$query)
			{
				throw new Exception($this->db->_error_message(), $this->db->_error_number());
				return false;

			}
			else
			{
				return true;
			}
		}
	}
 ?>