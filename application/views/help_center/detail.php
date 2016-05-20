<?php $this->load->view('layout/header');?>
<div id="content" class="w">
<div class="s_tl">当前位置：<a href="<?php echo $this->config->main_base_url;?>">首页</a><code class="lr3">></code><a href="article_cat-12.html">站内公告</a><code class="lr3">></code>妙网商城用户协议</div>
<div class="ubg">
	<div class="u_l left">
	    <?php foreach ($category->result() as $item):?>
		<dl class="udl">
			<dt><?php echo $item->help_category_name;?></dt>
			<dd>
			    <?php $helpList = $this->help_center->getHelpListByCategoryId($item->category_id);?>
				<?php if($helpList->num_rows()>0):?>
					<?php foreach ($helpList->result() as $val):?>
					<a href="<?php echo base_url('Help_center/detail/'.$val->id);?>" title="<?php echo $val->sub_title;?>" rel="nofollow" <?php if($help_id==$val->id):?>class="on"<?php endif;?>>
						<span><?php echo $val->sub_title;?></span>
					</a>
					<?php endforeach;?>
				<?php endif;?>
			</dd>
		</dl>
	    <?php endforeach;?>
	</div>
	<div class="u_r">
		<div class="ah1 alC yahei">
			<h1 class="f18"><?php echo $helpResult->sub_title;?></h1>
			<p class="c9">作者：<?php echo empty($helpResult->author) ? '妙网商城': $helpResult->author;?> ,发布时间：<?php echo date('Y-m-d',strtotime($helpResult->time));?></p>
		</div>
		<div class="ainfo ov">
		    <?php echo $helpResult->help_info;?> 
		</div>
		<p class="lh30">&nbsp;</p>
		<p class="bline"></p>
		<p class="lh30">&nbsp;</p>
	</div>
	<div class="clear"></div>
</div>
<p class="lh30">&nbsp;</p>
<div class="tpk over">
     <?php echo $cms_block['foot_recommend_img'];?>
</div>
<p class="alC">
	<a href="javascript:;" class="hbtn c9 mt15" target="_blank" rel="nofollow">查看更多活动</a>
</p>
<div class="fa_l clearfix mt35">
	<?php echo $cms_block['foot_speed_key'];?>
</div>
</div>
<?php $this->load->view('layout/footer');?>