<?php $this->load->view('layout/header');?>
<div id="content" class="w">
<div class="s_tl">当前位置：<a href="<?php echo $this->config->main_base_url;?>">首页</a><code class="lr3">></code><a href="article_cat-12.html">站内公告</a><code class="lr3">></code>趣网商城用户协议</div>
<div class="ubg">
	<div class="u_l left">
	    <?php foreach ($category->result() as $item):?>
		<dl class="udl">
			<dt><?php echo $item->help_category_name;?></dt>
			<dd>
			    <?php $helpList = $this->help_center->getHelpListByCategoryId($item->category_id);?>
				<?php if($helpList->num_rows()>0):?>
					<?php foreach ($helpList->result() as $val):?>
					<a href="<?php echo base_url('Help_center/detail/'.$val->id);?>" title="<?php echo $val->sub_title;?>" rel="nofollow" >
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
			<h1 class="f18">网店帮助分类</h1>
		</div>
		<?php if($help_center->num_rows()>0):?>
		<ul class="article">
		    <?php foreach ($help_center->result() as $item):?>
			<li>
				<a href="<?php echo base_url('Help_center/detail/'.$item->id);?>" title="<?php echo $item->sub_title?>">
					<em class="left"><?php echo $item->sub_title?>订购</em>
					<em class="c9 right"><?php echo date('Y-m-d',strtotime($item->time));?></em>
				</a>
			</li>
			<?php endforeach;?>
		</ul>
		<?php endif;?>
	</div>
	<div class="clear"></div>
</div>
<div id="pager" class="page">
	<span class="yemr">总计<b><?php echo $all_rows;?></b>条记录</span>
	<?php echo $pg_link;?>
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