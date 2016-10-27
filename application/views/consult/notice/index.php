<?php $this->load->view('layout/header') ?>
    <div class="consult-list">
    	<div class="consult-auto">
			<div class="list-title">
				<a href="javascript:void(0)">首页</a>>
				<a href="javascript:void(0)" class="active"><?php echo $class_name?></a>
			</div>
			<div class="list-content clearfix">
			    <?php if ($class) :?>
				<div class="nav pull-left">
					<ul>
					<?php foreach ($class as $k => $v) : ?>   
					   <li class="<?php echo $class_id == $k ? 'active' : ''?>"><a href="<?php echo site_url('notice/index/'.$k); ?>"><?php echo $v?></a></li>
					<?php endforeach;?>
					</ul>
				</div>
				<div class="content pull-left">
				    <?php if ($all_rows) : ?>
					<ul class="list">
					    <?php foreach ($list as $v) : ?>
						<li><a href="<?php echo site_url('notice/detail/' . $v['id']) ?>">
							<div class="title"><?php echo trim($v['title'])?></div>
							<p class="tip">
								<span>时间：<?php echo date('Y-m-d', $v['create_time'])?></span>
								<span>浏览次数：<?php echo $v['pv']?></span>
								<span>文章来源：<?php echo $v['author']?></span>
							</p>
							<p class="details">
							<?php echo isset($v['image']) ? '<img src="'. $v['image']. '" />' : ''?>
							<?php echo $v['_content']?>
							</p>
						</a></li>
						<?php endforeach;?>
					</ul>
	                <?php $this->load->view('consult/notice/pagination');?>
	                <?php else :?>
	                     <div class="no-data">
	                        <img src="help/images/panda.jpg"/>
	                        <p>暂无资讯</p>
	                    </div>
	                <?php endif;?>
				</div>
				<?php endif;?>
			</div>
		</div>
	</div>
<?php $this->load->view('layout/footer') ?>