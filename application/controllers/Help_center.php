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
    public function index($id=1){
    	
    	$result = $this->help_center->findHelpById($id);
    	if ($result->num_rows()<=0) {
    		$this->error('help_center','','无结果');
    	}
    	$data['id'] = $id;
    	$data['head_menu'] = 'on';
    	$data['helpResult'] = $result->row(0);
    	$data['category'] = $this->help_category->getResultByFlag($flag=1);//左边栏显示 
        $data['cms_block'] = $this->cms_block->findByBlockIds(array('home_keyword','foot_recommend_img','foot_speed_key'));
        $data['cart_num'] = ($this->uid) ? $this->mall_cart_goods->getCartGoodsByUid($this->uid)->num_rows() : 0;
        $this->load->view('help_center/list', $data);
    }
    
}
