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
	$('#email_subscription_submit_btn').click(function(event) {
		var email=$('#subscription_email_address').val();
		var frequency=$('input:radio[name="email_frequency"]:checked').val(); 
		var rv01=EmailValidate(email,'#subscription_email_address_hidden_error_tips');
		if(rv01 ==1){
			$.post(ajaxPostURL+'Account/handleEmailSubscription', { email:email,frequency:frequency }, function(data) {
			
				if(data.status == 0){
						$('#subscription_email_address_hidden_error_tips').show().text(data.info);
					}else if(data.status == 1){
						location.href = "http://localhost/trunk/index.php/home/account/mysubscription.html";
					}else if(data.status == 2){
						$('#subscription_email_address_hidden_error_tips').show().text(data.info);
					}else if(data.status == 3){
						$('#subscription_email_address_hidden_error_tips').show().text(data.info);
					}

			},'json');
		}
		return false;
		
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
		var newnickname =$(this).parent().find('input').val();
		var oldnickname =$('#old_nickname').text();
		if(newnickname ==""){
			$('#modify_nickname_hidden_box div.middle_content_box ul li p.hidden_error_tips').show();
		}
		else{
			$.post(ajaxPostURL+'Account/handleChangeNickname', { oldnickname:oldnickname,newnickname:newnickname}, function(data) {
				if(data.status == 2){
					$('#modify_nickname_hidden_box div.middle_content_box ul li p.hidden_error_tips').show().text(data.info);
				}else if(data.status ==1){
					location.href = "http://localhost/trunk/index.php/home/account/mysetting.html";
				}else{
					$('#modify_nickname_hidden_box div.middle_content_box ul li p.hidden_error_tips').show().text(data.info);
				}
			},'json');
		}
		return false;
	});
		//密码验证
	$('#binding_password_submit_btn').click(function(event) {
		var oldpwd = $('#binding_old_password').val();
		var newpwd = $('#binding_new_password').val();
		var newpwd2 = $('#binding_new_password2').val();

		var rv01=PWDValidate(oldpwd,'#old_pwd_tip');
		var rv02=PWDValidate(newpwd,'#new_pwd_tip');
		var rv03=PWDValidate(newpwd2,'#new_pwd2_tip');
		var rv = rv01+rv02+rv03;
		if(rv == 3){
			var rv04=PasswordDifferenceValidate(oldpwd,newpwd,'#new_pwd_tip');
			var rv05=PasswordDoubleCheckValidate(newpwd,newpwd2,'#new_pwd2_tip');
			var frv = rv04+rv05;
			if(frv ==2){
				$.post(ajaxPostURL+'Account/handleChangePassword', { oldpwd:oldpwd,newpwd:newpwd,newpwd2:newpwd2}, function(data) {

					if(data.status == 0){
						$('#old_pwd_tip').show().text(data.info);
					}else if(data.status == 1){
						location.href = "http://localhost/trunk/index.php/home/account/mysetting.html";
					}else if(data.status == 2){
						$('#old_pwd_tip').show().text(data.info);
					}
					else if(data.status == 3){
						$('#new_pwd_tip').show().text(data.info);
					}
					else if(data.status == 4){
						$('#new_pwd2_tip').show().text(data.info);
					}
					else if(data.status == 5){
						$('#new_pwd_tip').show().text(data.info);
					}
					else if(data.status == 6){
						$('#new_pwd2_tip').show().text(data.info);
					}
				},'json');
			}
		}
		
		
		if(rv == 5){
			return true;
		}
		else{
			return false;	
		}
	});
		//邮箱验证
	$('#binding_email_submit_btn').click(function(event) {
		var email = $('#binding_email').val();
		var vcode = $('#email_vcode').val();
		var username = $('#lable_username').val();
		var rv01=EmailValidate(email,'#email_error_tip');
		var rv02=VcodeValidate(vcode,'#vcode_error_tip');
		var rv = rv01+rv02;
		if(rv == 2){
			$.post(ajaxPostURL+'Account/handleChangeEmail', { email:email,vcode:vcode,username:username}, function(data) {
					if(data.status == 0){
						$('#username_error_tip').show().text(data.info);
					}else if(data.status == 1){
						location.href = "http://localhost/trunk/index.php/home/account/mysetting.html";
					}else if(data.status == 2){
						$('#email_error_tip').show().text(data.info);
					}
					else if(data.status == 3){
						$('#vcode_error_tip').show().text(data.info);
					}
					else if(data.status == 4){
						$('#vcode_error_tip').show().text(data.info);
					}
					else if(data.status == 5){
						$('#email_error_tip').show().text(data.info);
					}
				},'json');
		}
		return false;
		
	});
		//手机验证
	$('#binding_cellphone_submit_btn').click(function(event) {
		var oldcellphone = $('#check_oldphone').val();
		var nickname = $('#nickname').val();
		var newcellphone = $('#binding_new_phone').val();
		var cellphonevcode = $('#cellphone_vcode').val();
		if (oldcellphone == 0) {
                      
						$.post(ajaxPostURL+'Account/handleChangeCellphone', {nickname: nickname,newcellphone:newcellphone,vcode:cellphonevcode}, function(data) {
						if(data.status == 0){
							$('#old_phone_error_tip').show().text(data.info);
						}else if(data.status == 1){
							alert(data.info);
							location.href = "http://localhost/trunk/index.php/home/account/mysetting.html";
						}else if(data.status == 2){
							$('#old_phone_error_tip').show().text(data.info);
						}
						else if(data.status == 3){
							$('#new_phone_error_tip').show().text(data.info);
						}
						else if(data.status == 4){
							$('#cellphone_vcode_error_tip').show().text(data.info);
						}
						else if(data.status == 5){
							$('#new_phone_error_tip').show().text(data.info);
						}
						else if(data.status == 6){
							$('#cellphone_vcode_error_tip').show().text(data.info);
						}
						else if(data.status == 7){
							$('#new_phone_error_tip').show().text(data.info);
						}
					},'json');
        }else{
        	var oldcellphone = $('#binding_old_phone').val();
			var rv01=CellphoneValidate(oldcellphone,'#old_phone_error_tip');
			var rv02=CellphoneValidate(newcellphone,'#new_phone_error_tip');
			var rv03=VcodeValidate(cellphonevcode,'#cellphone_vcode_error_tip');
			var rv = rv01+rv02+rv03;
			if(rv ==3){
				var rv04 = CellPhoneDifferenceValidate(oldcellphone,newcellphone,'#new_phone_error_tip');
				if(rv04 ==1){

						$.post(ajaxPostURL+'Account/handleChangeCellphone', { oldcellphone:oldcellphone,newcellphone:newcellphone,vcode:cellphonevcode}, function(data) {
						if(data.status == 0){
							$('#old_phone_error_tip').show().text(data.info);
						}else if(data.status == 1){
							location.href = "http://localhost/trunk/index.php/home/account/mysetting.html";
						}else if(data.status == 2){
							$('#old_phone_error_tip').show().text(data.info);
						}
						else if(data.status == 3){
							$('#new_phone_error_tip').show().text(data.info);
						}
						else if(data.status == 4){
							$('#cellphone_vcode_error_tip').show().text(data.info);
						}
						else if(data.status == 5){
							$('#new_phone_error_tip').show().text(data.info);
						}
						else if(data.status == 6){
							$('#cellphone_vcode_error_tip').show().text(data.info);
						}
						else if(data.status == 7){
							$('#new_phone_error_tip').show().text(data.info);
						}
					},'json');

			    }
			}
		}
		return false;
		// var oldcellphone = $('#binding_old_phone').val();
		// var newcellphone = $('#binding_new_phone').val();
		// var cellphonevcode = $('#cellphone_vcode').val();
		
		// var rv01=CellphoneValidate(oldcellphone,'#old_phone_error_tip');
		// var rv02=CellphoneValidate(newcellphone,'#new_phone_error_tip');
		// var rv03=VcodeValidate(cellphonevcode,'#cellphone_vcode_error_tip');
		// var rv = rv01+rv02+rv03;
		// if(rv ==3){
		// 	var rv04 = CellPhoneDifferenceValidate(oldcellphone,newcellphone,'#new_phone_error_tip');
		// 	if(rv04 ==1){
				
		// 		$.post(ajaxPostURL+'Account/handleChangeCellphone', { oldcellphone:oldcellphone,newcellphone:newcellphone,vcode:cellphonevcode}, function(data) {
		// 			if(data.status == 0){
		// 				$('#old_phone_error_tip').show().text(data.info);
		// 			}else if(data.status == 1){
		// 				location.href = "http://localhost/trunk/index.php/home/account/mysetting.html";
		// 			}else if(data.status == 2){
		// 				$('#old_phone_error_tip').show().text(data.info);
		// 			}
		// 			else if(data.status == 3){
		// 				$('#new_phone_error_tip').show().text(data.info);
		// 			}
		// 			else if(data.status == 4){
		// 				$('#cellphone_vcode_error_tip').show().text(data.info);
		// 			}
		// 			else if(data.status == 5){
		// 				$('#new_phone_error_tip').show().text(data.info);
		// 			}
		// 			else if(data.status == 6){
		// 				$('#cellphone_vcode_error_tip').show().text(data.info);
		// 			}
		// 		},'json');
		// 	}
		// }
		// return false;
	});
	//获取验证码
	$('#get_change_cellphone_vcode').click(function(event) {
		var newcellphone = $('#binding_new_phone').val();
		
		var rv01=CellphoneValidate(newcellphone,'#new_phone_error_tip');
		if(rv01 ==1){
			$.post(ajaxPostURL+'Account/handleSendVcodeToCellphone', { newcellphone:newcellphone}, function(data) {
					if(data.status == 0){
						$('#new_phone_error_tip').text(data.info);
					}else if(data.status ==1){
						$('#get_change_cellphone_vcode').text('已发送');
						$('#binding_note').text(data.info);
					}
				},'json');
		}
		return false;
	});
	//获取验证码结束
	// 个人设置中所有验证效果结束
	function PWDValidate(pwd,error_tip){
		if(pwd ==""){
			$(error_tip).show().text('输入的密码不能为空');
			return 0;
		}
		else{
			if(pwd.length<6){
				$(error_tip).show().text('输入的密码不能少于6位');
				return 0;
			}
			else if(pwd.length>32){
				$(error_tip).show().text('输入的密码不能高32位');
				return 0;
			}
			else{
				$(error_tip).hide();
				return 1;
			}
		}
	}
	function EmailValidate(email,error_tip){
		if(email ==""){
			$(error_tip).show().text('输入的邮箱地址不能为空');
			return 0;
		}else{
			var reg=/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
			if(!reg.test(email)){
				$(error_tip).show().text('邮箱地址格式不正确');
				return 0;
			}
			else{
				$(error_tip).hide();
				return 1;
			}
		}
	}
	function VcodeValidate(vcode,error_tip){
		if(vcode ==""){
			$(error_tip).show().text('输入的验证码不能为空');
			return 0;
		}else{
			$(error_tip).hide();
			return 1;
		}
		
	}
	function CellphoneValidate(cellphone,error_tip){
		if(cellphone ==""){
			$(error_tip).show().text('输入的手机不能为空');
			return 0;
		}else{
			var reg=/^(1)[0-9]{10}$/;
			if(!reg.test(cellphone)){
				$(error_tip).show().text('手机格式不正确');
				return 0;
			}
			else{
				$(error_tip).hide();
				return 1;
			}
		}
		
	}
	function CellPhoneDifferenceValidate(cellphone01,cellphone02,error_tip){
		if(cellphone01 == cellphone02){
			$(error_tip).show().text('新手机号与旧手机号一致');
			return 0;
		}
		else{
			return 1;
		}
	}
	function PasswordDifferenceValidate(pwd01,pwd02,error_tip){
		if(pwd01 == pwd02){
			$(error_tip).show().text('新密码与旧密码一致');
			return 0;
		}
		else{
			return 1;
		}
	}
	function PasswordDoubleCheckValidate(pwd01,pwd02,error_tip){
		if(pwd01 != pwd02){
			$(error_tip).show().text('两次输入的新密码不一致');
			return 0;
		}
		else{
			return 1;
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
		var index =$(this).index();
		$(this).parent().siblings('input').val(index+1);
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
		$('#main #left_content_box div.mycontent_box ul.mycomment_show_box li div.display_content_box p.rate_star').show();
		$('#main #left_content_box div.mycontent_box ul.mycomment_show_box li div.display_content_box span.rate_stars').hide();
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
		var rv01=CellphoneValidate(cellphone,'#send_phone_error_tip');
		var rv02=VcodeValidate(vcode,'#send_vcode_error_tip');
		var rv = rv01+rv02;
		if(rv == 2){
			return true;
		}
		else{
			return false;	
		}
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
	$('#main #left_content_box div.mycontent_box div.myconpon_items table tbody tr td a.operation02_del').click(function(event) {
		window.confirm('确认删除该收藏？');
	});
	// 我的收藏删除弹窗效果结束
	//优惠劵发表评论验证
	$('#main #left_content_box div.mycontent_box ul.mycomment_show_box li div.hidden_content_box input.post_comment').click(function(event) {
		var comment = $(this).siblings('textarea').val();
		if(comment ==""){
			$(this).siblings('p.post_comment_hidden_error_tips').show().text('评论内容不能为空');
			return false;
		}else{
			$(this).siblings('p.post_comment_hidden_error_tips').hide();
		}
		
	});
	//优惠劵发表评论验证结束
})