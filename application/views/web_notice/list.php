<?php $this->load->view('layout/header');?>

<div id="content" class="w">
    <div class="s_tl">当前位置：<a href="<?php echo $this->config->passport_url?>">首页</a><code class="lr3">></code><a href="<?php echo $this->config->help_url.'/Web_notice/notice_list';?>">站内公告</a></div>
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
        <div class="ah1 alC yahei"><h1 class="f18">站内公告</h1></div>
        <ul class="article">
            <?php foreach ($res_list as $r) :?>
            <li><a href="<?php echo $this->config->help_url.'Web_notice/notice_detail/'.$r->id;?>" title="<?php echo $r->title;?>"><em class="left"><?php echo $r->title;?></em><em class="c9 right"><?php echo $r->time;?></em></a></li>
            <?php endforeach;?>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<div class="w"><div class="page" id="pager">
    <span class="yemr">总计<b><?php echo $all_rows?></b> 条记录</span><?php echo $pg_link ?> </div>
</div>
<p class="lh30">&nbsp;</p>
    <div class="tpk over">
        <?php echo $cms_block['foot_recommend_img'];?>
    </div>
    <p class="alC"><a href="/topic/" class="hbtn c9 mt15" target="_blank" rel="nofollow">查看更多活动</a></p>
    
    
    <div class="fa_l clearfix mt35" style="border-left:0;margin-bottom: -5px;">
        <?php echo $cms_block['foot_speed_key'];?>
    </div>
    
</div>

<?php $this->load->view('layout/footer');?>