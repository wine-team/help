<?php $this->load->view('layout/header');?>
<div class="w" id="content">
	<div class="bgwd mt35 feedback">
		<form class="feedback-form">
		    <div class="step step-hd">
			    <p>功能操作不方便？使用时遇到系统问题？或有更好的功能建议？欢迎您随时提出来！</p>
		        <p>如需投诉，请联系  <a  class="hd-link">在线客服</a> , 您会获得更专业快速的解决方案！</p>
	        </div> 
	        <div class="step step-content">
	            <h3 class="clearfix">
	                <span class="title-must">*</span>
	                <i class="title-icon">1.</i>
	                <span class="title-span">我们存在哪些不足</span>
	            </h3>
	            <textarea class="text-area step-cont" placeholder="请将您的建议或您遇到的问题告诉我们，我们会认真听取并及时反馈，最多输入100个字" name="content"></textarea>
	        </div>
            <div class="step cus-info">
	            <h3 class="clearfix fine-tips">
	                <span class="title-must">*</span>
	                <i class="title-icon">2.</i>
	                <span class="title-span">请留下您的信息，以便我们及时反馈</span>
	            </h3>
	            <dl class="contact  step-cont">
	                <dt class="js-contact-title">您的手机： </dt>
	                <dd class="controls">
	                    <input  class="cover-input tel"  placeholder="请输入你的手机号码"  maxlength="50"  type="text" name="tel"/>
	                </dd>
	            </dl>
	            <div class="clear"></div>
	            <button class="submit-btn  step-cont" type="submit">提交</button>
        	</div>
		</form>
	</div>
	<p class="lh30">&nbsp;</p>
	<div class="tpk over">
	    <?php echo $cms_block['foot_recommend_img'];?>
	</div>
	<div class="fa_l clearfix mt35">
		<?php echo $cms_block['foot_speed_key'];?>
	</div>
</div>
<?php $this->load->view('layout/footer');?>
