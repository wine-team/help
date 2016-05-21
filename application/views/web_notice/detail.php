<?php $this->load->view('layout/header');?>

<div id="content" class="w">
    <div class="s_tl">当前位置：<a href="<?php echo $this->config->passport_url?>">首页</a><code class="lr3">></code><a href="<?php echo $this->config->help_url.'/Web_notice/notice_list';?>">站内公告</a><code class="lr3">></code><?php echo $res->title;?></div>
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
                <h1 class="f18"><?php echo $res->title;?></h1>
                <p class="c9"><?php if($res->author) echo '作者：'.$res->author.'，';?> 发布时间：<?php echo $res->time;?></p>
            </div>
            <div class="ainfo ov"><?php echo $res->notice_info;?></div>
            <p class="lh30">&nbsp;</p>
            <p class="bline"></p>
            <p class="lh30">&nbsp;</p>
            <p><?php if($prev_one) :?><a href="<?php echo $this->config->help_url.'Web_notice/notice_detail/'.$prev_one->id;?>"><?php echo '上一篇:'.$prev_one->title;?></a><em class="vline">|</em><?php endif;?> <?php if($next_one) :?><a href="<?php echo $this->config->help_url.'Web_notice/notice_detail/'.$next_one->id;?>" class="pl10"><?php echo '下一篇:'.$next_one->title;?></a><?php endif;?></p>
        <div class="clear"></div>
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
</div>


<?php $this->load->view('layout/footer');?>