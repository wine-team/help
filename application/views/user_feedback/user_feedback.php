<?php $this->load->view('layout/header');?>
<div class="w" id="content">
		<div class="w" id="content">
			<div class="bgwd mt35">
				<div class="bl_red fB">意见反馈</div>
				<p class="bline"></p>
				<p class="lh30">&nbsp;</p>
				<form id="feedback_form" method="post" action="">
					<table width="100%" border="0" class="td_p f14">
						<tr>
							<td valign="top" width="90">您的意见</td>
							<td><textarea class="mb10 required" wrap="virtual" name="ms_content" id="msg" style="border: 1px solid #e5e5e5;line-height: 28px;height: 100px;width: 400px;" maxlength=1000 placeholder="请在这里留下您的意见，10-1000字"></textarea></td>
						</tr>
						<tr>
							<td valign="top" width="90">手机号码</td>
							<td><input type="text" name="ms_tel" id="mobile" value="" style="padding-left: 0;" placeholder="手机号" maxlength="15" class="ipt" /></td>
						</tr>
						<tr>
							<td>验证码</td>
							<td><input name="captcha" id="captcha" type="text" maxlength="4" size="5" class="ipt required" style="width: 60px;margin-top: 3px;" onclick="this.value='';" /><span class="captcha"><?php echo $captcha['image'];?>看不清点我</span></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><input type="hidden" name="back_url" value="<?php echo isset($backurl) ? $backurl:'';?>"/><input type="submit" class="b_sub" value="提 交" /></td>
						</tr>
					</table>
				</form>
				<p class="lh30">&nbsp;</p>
			</div>
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
