<?php $this->load->view('layout/header') ?>
	<div class="consult-list">
		<div class="consult-auto">
			<div class="list-title">
				<a href="javascript:void(0)">首页</a>>
				<a href="javascript:void(0)" ><?php echo $class_name?></a>>
				<a href="javascript:void(0)" class="active"><?php echo $detail['title']?></a>
			</div>
			<div class="list-content clearfix specific">
			    <?php if ($class) :?>
				<div class="nav pull-left">
					<ul>
					<?php foreach ($class as $k => $v) : ?>   
					   <li class="<?php echo $detail['class_id'] == $k ? 'active' : ''?>"><a href="<?php echo site_url('notice/index/'.$k); ?>"><?php echo $v?></a></li>
					<?php endforeach;?>
					</ul>
				</div>
				<div class="content pull-left">
					<div class="title"><?php echo $detail['title']?></div>
					<p class="tip clearfix">
						<span>时间：<?php echo date('Y-m-d', $detail['create_time'])?></span>
						<span>浏览次数：<?php echo $detail['pv']?></span>
						<span>文章来源：<?php echo $detail['author']?></span>
                        <a href="javascript:;" class="bds_more bdsharebuttonbox" data-cmd="more" data-tag="share-more" >
	                        <img src="help/images/fx.png"/>我要分享<img src="help/images/xl.png"/>
                        </a>
					</p>
					<div class="details">
						<p>
	    					<?php echo $detail['content']?>
						</p>
					</div>
				</div>
				<?php endif;?>
			</div>
		</div>
	</div>	

<?php $this->load->view('layout/footer') ?>