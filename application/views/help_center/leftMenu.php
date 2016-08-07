<div class="help-left">
    <ul class="help-click">
        <?php foreach ($category->result() as $item):?>
        <li>
            <div class="help-trade trade-none" >
                <p><?php echo $item->help_category_name;?></p>
                <!-- <i class="iconfont">&#xe600;</i> -->
            </div>
            <dl class="help-dl help-gwzn">
                <?php $helpList = $this->help_center->getHelpListByCategoryId($item->category_id);?>
                <?php if($helpList->num_rows()>0):?>
                	<?php foreach ($helpList->result() as $val):?>
	                <dd <?php if($val->id==$id):?>class="active"<?php endif;?>>
	                    <a href="<?php echo site_url('Help_center/index/'.$val->id);?>" title="<?php echo $val->sub_title;?>">◎ <?php echo $val->sub_title;?></a>
	                </dd>
	                <?php endforeach;?>
	             <?php endif;?>
            </dl>
         </li>
         <?php endforeach;?>
    </ul>
</div>
