<?php
class News_class_model extends CI_Model
{
    private $table = 'news_class';
    
    public function get_class_name()
    {
        $news_class = array();
        $w['status'] = 1;
        
        $res = $this->db->select('class_id, class_name')
                    ->where($w)
                    ->order_by('sort', 'DESC')
                    ->get($this->table)
                    ->result_array();
        if ($res) {
            foreach ($res as $v) {
                $news_class[$v['class_id']] = $v['class_name'];
            }
        }
        return $news_class;
    }
    
}