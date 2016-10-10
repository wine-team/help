<?php $this->load->view('layout/header');?>
<div id="content" class="w">
	<div class="s_tl">当前位置：<a href="<?php echo $this->config->main_base_url;?>">首页</a><code class="lr3">></code><a href="<?php echo $this->config->help_url.'/Help_center';?>">帮助中心</a></div>
	<div class="help-soicn screen-width">
	    <div class="help-inside clearfix">
			<?php $this->load->view('help_center/leftMenu');?>
			<div class="help-right">
	            <div class="sub-titile"><?php echo $helpResult->sub_title;?></div>
            	<div class="help-clause">
            	    <?php echo $helpResult->help_info;?>
            	</div>
	        </div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="fa_l clearfix mt35">
		<?php echo $cms_block['foot_speed_key'];?>
	</div>
</div>
<?php $this->load->view('layout/footer');?>