<?php
class Help_category_model extends CI_Model{
	
	private $table = 'help_category';        
	
	/**
	 * 
	 * @param unknown $param
	 */
	public function getReult(){
		
		return $this->db->get($this->table);
	}
}