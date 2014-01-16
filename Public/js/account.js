$(function(){

	//邮件订阅修改按钮特效
	$('#main #left_content_box div.mycontent_box form div.binding_box a').click(function(event) {
		$('#main #left_content_box div.mycontent_box form div.binding_box p.hidden_error_tips').hide();
		var value = $(this).text();
		if(value =="修改"){
			$(this).text('保存').siblings('input.emailaddress').
			removeAttr('disabled').css('background', 'white').focus();
		}
		else{
			$(this).text('修改').siblings('input.emailaddress').attr('disabled', 'disabled')
			.css('background', '#F2F2F2');
		}
		return false;
	});
	//邮件订阅修改按钮特效结束
	//邮箱订阅保存提交验证
	$('#main #left_content_box div.mycontent_box form input.submit_btn').click(function(event) {
		var value=$('#main #left_content_box div.mycontent_box form div.binding_box input.emailaddress').val();
		var reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
		if(value ==""){
			$('#main #left_content_box div.mycontent_box form div.binding_box p.hidden_error_tips').show()
			.text('邮箱地址不能为空!');
			return false;
		}else{
			if(!reg.test(value)){
				$('#main #left_content_box div.mycontent_box form div.binding_box p.hidden_error_tips').show()
				.text('邮箱地址格式不正确!');
				return false;	
			}
		}
	});
	//邮箱订阅保存提交验证结束
	// 个人设置中所有弹窗效果
	$('#modify_cellphone').click(function(event) {
		$('#modify_cellphone_hidden_box').bPopup({
        });
		return false;
	});
	$('#closed_modiy_cellphono_box_btn').click(function(event) {
		$('#modify_cellphone_hidden_box').bPopup().close();
	});
	$('#modify_email').click(function(event) {
		$('#modify_email_hidden_box').bPopup({
        });
		return false;
	});
	$('#closed_modiy_email_box_btn').click(function(event) {
		$('#modify_email_hidden_box').bPopup().close();
	});
	$('#modify_nickname').click(function(event) {
		$('#modify_nickname_hidden_box').bPopup({
        });
		return false;
	});
	$('#closed_modiy_nickname_box_btn').click(function(event) {
		$('#modify_nickname_hidden_box').bPopup().close();
	});
	$('#modify_password').click(function(event) {
		$('#modify_password_hidden_box').bPopup({
        });
		return false;
	});
	$('#closed_modiy_password_box_btn').click(function(event) {
		$('#modify_password_hidden_box').bPopup().close();
	});
	// 个人设置中所有弹窗效果结束
	//修改邮箱地址验证码看不清特效
	$('#binding_email_vcode_not_clear').click(function(event) {
		var imgsrc=$('#binding_email_vcode_img').attr("src");
		imgsrc = imgsrc+ "/" + Math.random();
		$('#binding_email_vcode_img').attr("src",imgsrc);
		return false;
	});
	//修改邮箱地址验证码看不清特效结束
	// 个人设置中所有验证效果
		//nickname验证
	$('#binding_nickname_submit_btn').click(function(event) {
		var value =$(this).parent().find('input').val();
		if(value ==""){
			$('#modify_nickname_hidden_box div.middle_content_box ul li p.hidden_error_tips').show();
			return false;
		}
	});
		//密码验证
	$('#binding_password_submit_btn').click(function(event) {
		var oldpwd = $('#binding_old_password').val();
		var newpwd = $('#binding_new_password').val();
		var newpwd2 = $('#binding_new_password2').val();

		PWDValidate(oldpwd,'#old_pwd_tip');
		PWDValidate(newpwd,'#new_pwd_tip');
		PWDValidate(newpwd2,'#new_pwd2_tip');
		if(oldpwd == newpwd){
			$('#new_pwd_tip').show().text('新密码与旧密码一致');
			return false;
		}
		if(newpwd != newpwd2){
			$('#new_pwd2_tip').show().text('两次输入的新密码不一致');
			return false;
		}
	});
		//邮箱验证
	$('#binding_email_submit_btn').click(function(event) {
		var email = $('#binding_email').val();
		var vcode = $('#email_vcode').val();
		
		EmailValidate(email,'#email_error_tip');
		VcodeValidate(vcode,'#vcode_error_tip');
		
	});
		//手机验证
	$('#binding_cellphone_submit_btn').click(function(event) {
		var oldcellphone = $('#binding_old_phone').val();
		var newcellphone = $('#binding_new_phone').val();
		var cellphonevcode = $('#cellphone_vcode').val();
		
		CellphoneValidate(oldcellphone,'#old_phone_error_tip');
		CellphoneValidate(newcellphone,'#new_phone_error_tip');
		VcodeValidate(cellphonevcode,'#cellphone_vcode_error_tip');
		if(oldcellphone == newcellphone){
			$('#new_phone_error_tip').show().text('新手机号与旧手机号一致');
			return false;
		}
		return false;
	});
	
	// 个人设置中所有验证效果结束
	function PWDValidate(pwd,error_tip){
		if(pwd ==""){
			$(error_tip).show().text('输入的密码不能为空');
			return false;
		}
		else{
			if(pwd.length<6){
				$(error_tip).show().text('输入的密码不能少于6位');
				return false;
			}
			else if(pwd.length>32){
				$(error_tip).show().text('输入的密码不能高32位');
				return false;
			}
			else{
				$(error_tip).hide();
				
			}
		}
		return false;
	}
	function EmailValidate(email,error_tip){
		if(email ==""){
			$(error_tip).show().text('输入的邮箱地址不能为空');
			return false;
		}else{
			var reg=/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
			if(!reg.test(email)){
				$(error_tip).show().text('邮箱地址格式不正确');
				return false;
			}
			else{
				$(error_tip).hide();
				
			}
		}
	}
	function VcodeValidate(vcode,error_tip){
		if(vcode ==""){
			$(error_tip).show().text('输入的验证码不能为空');
		}else{
			if(vcode =="1234"){
				$(error_tip).hide();
			}
			else{
				$(error_tip).show().text('验证码输入不正确');
			}
		}
	}
	function CellphoneValidate(cellphone,error_tip){
		if(cellphone ==""){
			$(error_tip).show().text('输入的手机不能为空');
			return false;
		}else{
			var reg=/^(1)[0-9]{10}$/;
			if(!reg.test(cellphone)){
				$(error_tip).show().text('手机格式不正确');
				return false;
			}
			else{
				$(error_tip).hide();
				
			}
		}
	}



	//我的评论的所有特效
	$('#main #left_content_box div.mycontent_box ul.mycomment_show_box li div.display_content_box p.rate_star span').hover(function() {

		var index =$(this).index();
		for(i=0;i<=index;i++){
			$(this).parent().find('span').eq(i).css('background-position', '0px 0px');

		}
		for(i=4;i>index;i--){
			$(this).parent().find('span').eq(i).css('background-position', '0px 21px');
			
		}
	}, function() {
		var index =$(this).index();
		if(index =="0"){
			$(this).parent().find('span').css('background-position', '0px 21px');
		}
	});

	$('#main #left_content_box div.mycontent_box ul.mycomment_show_box li div.display_content_box p.rate_star span').click(function(event) {
		
		$(this).parent().parent().siblings('div.hidden_content_box').show();
		$(this).parent().siblings('p.finish_comment_content').hide();
		$(this).parent().siblings('p.modify_comment').hide();
		var comment_content = $(this).parent().siblings('p.finish_comment_content').text();
		$('#main #left_content_box div.mycontent_box ul.mycomment_show_box li div.hidden_content_box textarea').text(comment_content);
		var height =$('#main #left_content_box div.mycontent_box').height();	
		height = height+270;
		if(height >=1500){
			$('#main #left_content_box div.mycontent_box').css('height', '1510');
		}
		else{
			$('#main #left_content_box div.mycontent_box').css('height', height);
		}
		
	});

	$('#main #left_content_box div.mycontent_box ul.mycomment_show_box li div.display_content_box p.modify_comment').click(function(event) {
		
		$(this).hide().parent().siblings('div.hidden_content_box').show();
		$(this).siblings('p.finish_comment_content').hide();
		var comment_content = $(this).siblings('p.finish_comment_content').text();
		$('#main #left_content_box div.mycontent_box ul.mycomment_show_box li div.hidden_content_box textarea').text(comment_content);
		var height =$('#main #left_content_box div.mycontent_box').height();	
		height = height+270;
		if(height >=1500){
			$('#main #left_content_box div.mycontent_box').css('height', '1510');
		}
		else{
			$('#main #left_content_box div.mycontent_box').css('height', height);
		}
	});
	//我的评论的所有特效结束
	//我的券包弹窗特效
	$('#main #left_content_box div.mycontent_box div.myconpon_items table tbody tr td a.operation01').click(function(event) {
		$('#send_cellphone_hidden_box').bPopup({
        });
	});
	$('#closed_send_cellphono_box_btn').click(function(event) {
		$('#send_cellphone_hidden_box').bPopup().close();
	});
	//我的券包弹窗特效结束
	//发送到手机验证效果

	$('#send_cellphone_submit_btn').click(function(event) {
		var cellphone = $('#send_phone').val();
		var vcode = $('#send_cellphone_vcode').val();
		CellphoneValidate(cellphone,'#send_phone_error_tip');
		VcodeValidate(vcode,'#send_vcode_error_tip');
		return false;
	});
	//发送到手机验证效果结束
	//修改发送到手机验证码看不清特效
	$('#send_cellphone_vcode_not_clear').click(function(event) {
		var imgsrc=$('#send_cellphone_vcode_img').attr("src");
		imgsrc = imgsrc+ "/" + Math.random();
		$('#send_cellphone_vcode_img').attr("src",imgsrc);
		return false;
	});
	//修改发送到手机验证码看不清特效结束
	// 我的收藏删除弹窗效果
	$('#main #left_content_box div.mycontent_box div.myconpon_items table tbody tr td a.operation02').click(function(event) {
		window.confirm('确认删除该收藏？');
	});
	// 我的收藏删除弹窗效果结束
})