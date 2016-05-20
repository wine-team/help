<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Help_center extends MJ_Controller {

    public function _init()
    {
        $this->load->library('pagination');
        $this->load->model('cms_block_model', 'cms_block');
        $this->load->model('help_center_model', 'help_center');
        $this->load->model('help_category_model','help_category');
    }

    public function help_list($pg = 1)
    {

    	$page_num = 20;
    	$num = ($pg-1)*$page_num;
    	$getData = $this->input->get();
    	$config['first_url']   = base_url('Help_center/help_list').$this->pageGetParam($getData);
    	$config['suffix']      = $this->pageGetParam($getData);
    	$config['base_url']    = base_url('Help_center/help_list');
    	$config['total_rows']  = $this->help_center->total($getData);
    	$config['per_page'] = $page_num;
    	$config['uri_segment'] = 3;
    	$this->pagination->initialize($config);
    	$data['pg_link'] = $this->pagination->create_links();
    	$data['help_center'] = $this->help_center->pg_list($page_num,$num,$getData);
    	$data['all_rows'] = $config['total_rows'];
    	$data['cms_block'] = $this->cms_block->findByBlockIds(array('foot_recommend_img','foot_speed_key'));
    	$data['category'] = $this->help_category->getReult();
        $this->load->view('help_center/list', $data);

    }

	public function detail($id)
	{
	    $result = $this->help_center->findHelpById($id);
	    if ($result->num_rows()<=0) {
	       $this->error('Help_center/help_list','','无结果');
        }
	    $data['category'] = $this->help_category->getReult();
	    $data['helpResult'] = $result->row(0);
	    $data['help_id'] = $id;
	    $data['cms_block'] = $this->cms_block->findByBlockIds(array('foot_recommend_img','foot_speed_key'));
	    $this->load->view('help_center/detail', $data);
	}
}
