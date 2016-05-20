<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_feedback extends MJ_Controller {
	public function _init()
	{
		$this->load->library('pagination');
		$this->load->model('user_feedback_model','user_feedback');
		$this->load->model('help_center_model', 'help_center');
		$this->load->model('cms_block_model', 'cms_block');
	}

	/**
	 * 意见反馈
	 * */
	public function index()
	{
		if (isset($_SERVER['HTTP_REFERER'])) {
			$parseUrl = parse_url($_SERVER['HTTP_REFERER']);
			if (isset($parseUrl['query']) && strpos($parseUrl['query'], 'backurl') !== false) {
				$data['backurl'] = urldecode(strstr($parseUrl['query'], 'http'));
			} else {
				$data['backurl'] = $_SERVER['HTTP_REFERER'];
			}
		} else {
			$data['backurl'] = $this->config->main_base_url;
		}
		$data['cms_block'] = $this->cms_block->findByBlockIds(array('foot_recommend_img','foot_speed_key'));
		$data['captcha'] = $this->getCaptcha(22, 100, 36, 4);
		$this->load->view('user_feedback/user_feedback' ,$data);
	}

	/**
	 * 获取验证码
	 * */
	public function ajax_captcha()
	{
		echo json_encode($this->getCaptcha(22, 100, 36, 4));exit;
	}

	/**
	 * 意见反馈表单提交
	 * */
	public function feedback_post()
	{
		$postData = $this->input->post();
		if (!$postData['captcha'] || strtoupper($postData['captcha'])!=strtoupper(get_cookie('captcha')))
		{
			$this->jsonMessage('请输入正确的图形验证码');
		}
		if ($this->validateParam($postData['ms_content']))
		{
			$this->jsonMessage('请输入您的意见');
		}
		if (trim($postData['ms_tel']))
		{
			if (!valid_mobile($postData['ms_tel']))
			{
				$this->jsonMessage('请输入正确的手机号');
			}
		}
		$data['ms_content'] = $postData['ms_content'];
		$data['ms_tel'] = $postData['ms_tel'];
		$data['ms_type'] = 1;
		$res = $this->user_feedback->insert($data);
		if ($res)
		{
			$backUrl = empty($postData['back_url']) ? $this->config->main_base_url : $postData['back_url'];
			$this->jsonMessage('',$backUrl);
		}else{
			$this->jsonMessage('网络繁忙，请稍后再试');
		}
	}
}
