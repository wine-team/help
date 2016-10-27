<?php
class News_content_model extends CI_Model
{
    private $table = 'news_content';
    protected $w = array();
    
    
    public function get_data($data=array())
    {
        $list = array();
        if (isset($data['class_id']) && $data['class_id']) {
            $this->w['class_id'] = $data['class_id'];
        }
        $this->w['status'] = 1; //上线
        $list['all_rows'] = $this->db->where($this->w)->count_all_results($this->table);
        $list['list'] = $this->db->select(array('id', 'title', 'content', 'pv', 'author', 'create_time'))
                ->where($this->w)
                ->limit($data['size'], ($data['p'] - 1) * $data['size'])
                ->order_by('id', 'DESC')
                ->get($this->table)
                ->result_array();
        
        if ($list['list']) {
            foreach ($list['list'] as &$v) {
                $v['_content'] = mb_strlen(trim(strip_tags($v['content'])) < 50) ? trim(strip_tags($v['content'])) :mb_substr(trim(strip_tags($v['content'])), 0, 140, 'utf-8').'...';
                $is_match = preg_match('/<img.*?src="(.*?)"/', $v['content'], $match);
                if ($is_match && isset($match[1]) && $match[1]) {
                    $v['image'] = $match[1];
                }
            }
        }
        return $list;
    }
    
    public function detail($data=array())
    {
        if (!isset($data['id']) || !is_numeric($data['id']) || !is_int($data['id'] * 1)) {
            return false;
        }
        $this->w = array(
            'id' => $data['id'],
            'status' => 1
        );
        $res = $this->db->select(array('id', 'title', 'content', 'pv', 'author', 'create_time', 'class_id'))
                    ->where($this->w)
                    ->get($this->table)
                    ->row_array();
        return $res;
    }
    
    //浏览量统计
    public function update_pv($id)
    {
        if (!isset($id) || !is_numeric($id) || !is_int($id * 1)) {
            return false;
        }
        $ip = $this->input->ip_address();
        if (!$this->input->valid_ip($ip)) {
            return false;
        }
        $w = array(
            'id' => $id
        );
        $res = $this->db->set('pv', 'pv+1', FALSE)
                        ->where($w)
                        ->update($this->table);
        return $res;
    }
    
    
    
    
    
    
}