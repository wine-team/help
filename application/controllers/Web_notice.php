<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_notice extends MJ_Controller {

    public function _init()
    {
        $this->load->library('pagination');
        $this->load->model('web_notice_model', 'web_notice');
        $this->load->model('help_center_model', 'help_center');
        $this->load->model('help_category_model','help_category');
        $this->load->model('cms_block_model', 'cms_block');
    }
    
    /**
     * 帮助中心列表
     * */
    public function notice_list($pg = 1)
    {
        $getData = $this->input->get();
        $perpage = 20;
        $config['first_url']   = base_url('Web_notice/notice_list').$this->pageGetParam($this->input->get());
        $config['suffix']      = $this->pageGetParam($getData);
        $config['base_url']    = base_url('Web_notice/notice_list');
        $config['total_rows']  = $this->web_notice->web_notice_list(null, null, $getData)->num_rows();
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $data['pg_link']   = $this->pagination->create_links();
        $data['res_list'] = $this->web_notice->web_notice_list($pg-1, $perpage, $getData)->result();  
        $data['all_rows']  = $config['total_rows'];
        $data['pg_now']    = $pg;
        $data['category'] = $this->help_category->getReult();
        $data['cms_block'] = $this->cms_block->findByBlockIds(array('foot_recommend_img','foot_speed_key'));
        $this->load->view('web_notice/list', $data);
    }
	
	/**
	 * 条款详情  
	 * */
	public function notice_detail($id = 1)
	{
	    $help_detail = $this->web_notice->findById(array('id'=>$id));
	    if($help_detail->num_rows() > 0)
	    {
	        $prev_one = $this->web_notice->findById(array('id <'=>$id), 'id DESC', 1);
	        $next_one = $this->web_notice->findById(array('id >'=>$id), 'id ASC', 1);
	        $data['category'] = $this->help_category->getReult();
	        $data['prev_one'] = $prev_one->num_rows()>0 ? $prev_one->row() : '';
	        $data['next_one'] = $next_one->num_rows()>0 ? $next_one->row() : '';
	        $data['res'] = $help_detail->row();
    	    $data['cms_block'] = $this->cms_block->findByBlockIds(array('foot_recommend_img','foot_speed_key'));
	        $this->load->view('web_notice/detail', $data);
	    }else{
	        $this->redirect('Web_notice/list');
	    }
	}
	
	
}
