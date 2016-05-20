<?php
class Help_center_model extends CI_Model{
	
	private $table = 'help_center';        
	 /**
	 * 根据分类来获取小标题
	 * @param unknown $category_id
	 */
	public function getHelpListByCategoryId($category_id){
		
		$this->db->where('help_category_id',$category_id);
		$this->db->where('flag',1);
		$this->db->order_by('sort','desc');
		return $this->db->get($this->table);
	}
	
	 /**
	 * 
	 * @param unknown $param
	 */
	public function total($param){
		
		$this->db->where('flag','1');
		return $this->db->count_all_results($this->table);
	}
	
	 /**
	 * 
	 * @param unknown $num
	 * @param unknown $page_num
	 * @param unknown $getData
	 */
	public function pg_list($page_num,$num,$getData){
		
		$this->db->where('flag','1');
		$this->db->limit($page_num,$num);
		return $this->db->get($this->table);
	}
	
	 /**
	 * 
	 * @param unknown $id
	 */
	public function findHelpById($id){
		
		$this->db->where('id',$id);
		return $this->db->get($this->table);
	}
}