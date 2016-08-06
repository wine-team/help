<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_feedback extends MW_Controller {
	
	public function _init() {
		
		$this->load->library('pagination');
		$this->load->model('user_feedback_model','user_feedback');
		$this->load->model('help_center_model', 'help_center');
		$this->load->model('cms_block_model', 'cms_block');
		$this->load->model('mall_cart_goods_model','mall_cart_goods');
	}

	/**
	 * 意见反馈
	**/
	public function index() {
		
		$data['cms_block'] = $this->cms_block->findByBlockIds(array('home_keyword','foot_recommend_img','foot_speed_key'));
		$data['cart_num'] = ($this->uid) ? $this->mall_cart_goods->getCartGoodsByUid($this->uid)->num_rows() : 0;
		$data['captcha'] = $this->getCaptcha(22, 100, 36, 4);
		$data['head_menu'] = 'on';
		$this->load->view('user_feedback/index' ,$data);
	}

	 /**
	 * 获取验证码
	 **/
	public function ajax_captcha() {
		
		echo json_encode($this->getCaptcha(22, 100, 36, 4));exit;
	}

	/**
	 * 意见反馈表单提交
	**/
	public function feedback(){
		
		$tel     = $this->input->post('tel',true);
		$content = $this->input->post('content',true);
		if ($this->validateParam($content)) {
			$this->jsonMessage('请输入您的意见');
		}
		if (mb_strlen($content) < 6 ||  mb_strlen($content) > 100) {
			$this->jsonMessage('意见字数在6到100个字');
		}
		if ($this->validateParam($tel)) {
			$this->jsonMessage('请输入您的手机号码');
		}
		if (!valid_mobile($tel)) {
			$this->jsonMessage('请输入正确的手机号码');
		}
		$data['ms_type'] = 1;
		$data['ms_tel'] = $tel;
		$data['ms_content'] = $content;
		$res = $this->user_feedback->insert($data);
		if ($res) {
			$backUrl = empty($postData['back_url']) ? $this->config->main_base_url : $postData['back_url'];
			$this->jsonMessage('',$backUrl);
		}
		$this->jsonMessage('网络繁忙，请稍后再试');
	}
}
