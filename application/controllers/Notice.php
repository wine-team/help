<?php
/**
 * 资讯列表功能
 * cyl
 */

class Notice extends CS_Controller
{
    protected $size = 10;

    public function _init()
    {
        $this->load->library('pagination');
        $this->load->model('news_content_model', 'news_content');
        $this->load->model('news_class_model', 'news_class');
        $this->load->helper('common');
    }
    
    //资讯列表
    public function index($class_id=1)
    {
        $p = $this->input->get('p');
        if (!$p || !is_numeric($p) || !is_int($p * 1)) {
            $p = 1;
        }
        $data = array(
            'class_id' => $class_id,
            'p' => $p,
            'size' => $this->size,
        );
        $res = $this->news_content->get_data($data);
        $news_class = $this->news_class->get_class_name();
        $config['base_url'] = base_url('consult/notice/index/' . $class_id . '?');
        $config['num_links'] = 2;
        $config['query_string_segment'] = 'p';
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $res['all_rows'];
        $config['per_page'] = $this->size;
        $this->pagination->initialize($config);
        $res['pg_link'] =   $this->pagination->create_links();
        $res['class'] = $news_class;
        $res['class_name'] = isset($news_class[$class_id]) ? $news_class[$class_id] : '贝竹公告';
        $res['pg_now'] = $p;
        $res['pg_num'] = $this->size;
        $res['class_id'] = $class_id;
        $this->load->view('consult/notice/index', $res);
    }
	
	//资讯详情
	public function detail($id=1)
	{
	    $data = array(
            'id' => $id
        );
	    $res['detail'] = $this->news_content->detail($data);
	    $news_class = $this->news_class->get_class_name();
	    $res['class'] = $news_class;
	    $res['class_name'] = isset($news_class[$res['detail']['class_id']]) ? $news_class[$res['detail']['class_id']] : '贝竹公告';
	    $this->news_content->update_pv($id);
	    $res['headTitle'] = isset($res['detail']['title']) ? $res['detail']['title'] :'贝竹资讯';
	    $this->load->view('consult/notice/detail', $res);
	}
	
	
	
	
   
}