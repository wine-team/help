<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help_center extends MW_Controller {

    public function _init()
    {
        $this->load->library('pagination');
        $this->load->model('cms_block_model', 'cms_block');
        $this->load->model('help_center_model', 'help_center');
        $this->load->model('help_category_model','help_category');
        $this->load->model('mall_cart_goods_model','mall_cart_goods');
    }
    
     /**
     * 帮助中心
     * @param number $pg
     */
    public function help_list($num=0){
    	
    	$page_num = 20;
    	$getData = $this->input->get();
    	$config['first_url']   = base_url('Help_center/help_list').$this->pageGetParam($getData);
    	$config['suffix']      = $this->pageGetParam($getData);
    	$config['base_url']    = base_url('Help_center/help_list');
    	$config['total_rows']  = $this->help_center->total($getData);
    	$config['per_page']    = $page_num;
    	$config['uri_segment'] = 3;
    	$this->pagination->initialize($config);
    	$data['pg_link'] = $this->pagination->create_links();
    	$data['help_center'] = $this->help_center->pg_list($page_num,$num,$getData);
    	$data['all_rows'] = $config['total_rows'];
    	$data['category'] = $this->help_category->getResultByFlag($flag=1);//左边栏显示 
        $data['cms_block'] = $this->cms_block->findByBlockIds(array('home_keyword','foot_recommend_img','foot_speed_key'));
        $data['cart_num'] = ($this->uid) ? $this->mall_cart_goods->getCartGoodsByUid($this->uid)->num_rows() : 0;
        $data['pg'] = ($num/$page_num) + 1;
        $data['head_menu'] = 'on';
        $this->load->view('help_center/list', $data);
    }

	public function detail($id)
	{
	    $result = $this->help_center->findHelpById($id);
	    if ($result->num_rows()<=0) {
	       $this->error('Help_center/help_list','','无结果');
        }
	    $data['category'] = $this->help_category->getResultByFlag($flag=1);
	    $data['helpResult'] = $result->row(0);
	    $data['help_id'] = $id;
	    $data['cms_block'] = $this->cms_block->findByBlockIds(array('home_keyword','foot_recommend_img','foot_speed_key'));
        $data['cart_num'] = ($this->uid) ? $this->mall_cart_goods->getCartGoodsByUid($this->uid)->num_rows() : 0;
        $data['head_menu'] = 'on';
	    $this->load->view('help_center/detail', $data);
	}

}
