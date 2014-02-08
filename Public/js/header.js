$(function(){
	
	//订阅Hover特效
	$('#subscription_li').hover(function() {
		$('#subscription_box').show();
		$(this).addClass('hover');
		$('#subscription').css('border-right', 'none');
	}, function() {
		$('#subscription_box').hide();
		$(this).removeClass('hover');
		$('#subscription').css('border-right', '1px solid black');
	});

	$('#subscription_box').hover(function() {
		$('#subscription_box').show();
		$('#subscription_li').addClass('hover');
		$('#subscription').css('border-right', 'none');
	}, function() {
		$('#subscription_box').hide();
		$('#subscription_li').removeClass('hover');
		$('#subscription').css('border-right', '1px solid black');
	});
	//订阅Hover特效结束
	//点击订阅按钮提交验证
	$('#top_rss #top_rss_box #subscription_box form #subscription_email_btn').click(function(event) {
		var email= $('#top_rss #top_rss_box #subscription_box form #subscription_email_textbox');
		var reg= /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
		if(email.val() ==""){
			alert('请输入邮箱地址！');
		}
		else{
			if(!reg.test(email.val())){
				alert('邮箱地址格式不正确，请重新输入！');
			}
			else{
				alert('邮箱' +email.val()+'订阅已成功，我们将定期给您推送最实惠的内容与信息。');
			}
		}
	});
	//点击订阅按钮提交验证结束
	//关注Hover特效
	$('#share_li').hover(function() {
		$('#share_box').show();
		$(this).addClass('hover');
		$('#subscription').css('border-right', 'none');
	}, function() {
		$('#share_box').hide();
		$(this).removeClass('hover');
		$('#subscription').css('border-right', '1px solid black');
	});

	$('#share_box').hover(function() {
		$('#share_box').show();
		$('#share_li').addClass('hover');
		$('#subscription').css('border-right', 'none');
	}, function() {
		$('#share_box').hide();
		$('#share_li').removeClass('hover');
		$('#subscription').css('border-right', '1px solid black');
	});
	//关注Hover特效结束

	////////////////////////用户注册+用户登录+忘记密码特效全部代码区域////////////////////
	//用户注册弹框效果
	$('#Userreg').click(function(event) {
		$('#Userreg_box').bPopup({
           	modalClose: false,
	        opacity: 0.6,
	        position: [320, 15],//x, y
        });
		return false;
	});
	// 用户注册弹框效果结束
	//用户登录弹窗效果
	$('#Userlogin').click(function(event) {
		$('#Userlogin_box').bPopup({
           	modalClose: false,
	        opacity: 0.6,
	        position: [330, 60],//x, y
        });
		return false;
	});
	//用户登录弹窗效果结束
	//用户注册弹框关闭特效
	$('#a_closed2').click(function(event) {
		$('#Userreg_box').bPopup().close();
	});
	//用户注册弹框关闭特效结束结束
	//用户登录弹框关闭特效
	$('#a_closed').click(function(event) {
		$('#Userlogin_box').bPopup().close();
	});
	//用户登录弹框关闭特效结束
	//用户登录弹窗中所有验证
	$('#Userlogin_box #u_middle_box form input').blur(function(event) {
		var input= $(this);
		var name= $(this).attr('name');
		var username =$('#Userlogin_box #u_middle_box form input.one').val();
		var password =$('#Userlogin_box #u_middle_box form input.two').val();
		var vcode =$('#Userlogin_box #u_middle_box form input.three').val();
		if(input.val()==""){
			if(name =="username"){
				$('#login_hidebox01').css('display', 'block');
			}
			else if(name =="password"){
				$('#login_hidebox02').css('display', 'block');
			}
			else{
				$('#login_hidebox03').css('display', 'block');
			}
		}
		else{
			if(name=="username"){
				$('#login_hidebox01').css('display', 'none');
			}
			else if(name=="password"){
				$('#login_hidebox02').css('display', 'none');
			}
			else{
				$('#login_hidebox03').css('display', 'none');
				
			}
		}
		//控制登录按钮禁用启用的
		if(username!="" && password !="" && vcode !=""){
			$('#Userlogin_box #u_middle_box form #btn_login').removeAttr('disabled')
			$('#Userlogin_box #u_middle_box form #btn_login').css('background', '#ED5565');
			$('#Userlogin_box #u_middle_box form #btn_login').css('cursor', 'pointer');
		}
		else{
			$('#Userlogin_box #u_middle_box form #btn_login').attr('disabled', 'disabled');
			$('#Userlogin_box #u_middle_box form #btn_login').css('background', '#F3F3F3');
			$('#Userlogin_box #u_middle_box form #btn_login').css('cursor', 'auto');
		}
		//控制登录按钮禁用启用结束
	});
	
	$('#Userlogin_box #u_middle_box form #btn_login').click(function(event) {
		var verifyURL = $("#login_hidebox05").val();
		var username =$('#Userlogin_box #u_middle_box form input.one').val();
		var password =$('#Userlogin_box #u_middle_box form input.two').val();
		var vcode =$('#Userlogin_box #u_middle_box form input.three').val();
		$.post("/index.php/user/checkLogin", { username: username, password: password, vcode: vcode },function(data){
            if (data.status == 1) {
                $('#Userlogin_box').bPopup().close();
            }
			
		},"json");
		return false;
		
	});
	//用户登录弹窗中所有验证结束

	//用户登录验证码看不清特效
	$('#Userlogin_box #u_middle_box form #vcode_not_clear').click(function(event) {
		var imgsrc=$('#Userlogin_box #u_middle_box form #vcode_img').attr("src");
		imgsrc = imgsrc+ "/" + Math.random();
		$('#Userlogin_box #u_middle_box form #vcode_img').attr("src",imgsrc);
		return false;
	});
	//用户登录验证码看不清特效结束

	//忘记密码弹窗切换
	$('#forgetpwd').click(function(event) {
		$('#u_middle_box').css('display', 'none');
		$('#u_bottom_box').css('display', 'none');
		$('#Userlogin_box #u_top_box p').text("忘记密码");
		$('#UserForgetpwd_box').css('display', 'block');
		return false;
	});
	//忘记密码弹窗切换结束
	//忘记密码操作后返回登录界面
	$('#return_userlogin').click(function(event) {
		$('#u_middle_box').css('display', 'block');
		$('#u_bottom_box').css('display', 'block');
		$('#Userlogin_box #u_top_box p').text("用户登录");
		$('#UserForgetpwd_box').css('display', 'none');
		return false;
	});
	//忘记密码操作后返回登录界面结束
	//忘记密码页面的验证
	$('#cellphone_send_btn').click(function(event) {
		var cellphone=$('#cellphone_no').val();
		if(cellphone ==""){
			$('#forgetpwd_hidebox01').css('display', 'block');
			$('#forgetpwd_hidebox01').text('请输入注册时填写的手机号码');
		}
		else{
			var reg= /^(1)[0-9]{10}$/;
			if(!reg.test(cellphone)){
				$('#forgetpwd_hidebox01').css('display', 'block');
				$('#forgetpwd_hidebox01').text('输入的手机号格式不正确，请重新输入');
			}else{
				alert('跳转到输入手机验证码页面');
			}
		}
		return false;
	});
	$('#email_send_btn').click(function(event) {
		var email=$('#email_no').val();
		if(email ==""){
			$('#forgetpwd_hidebox02').css('display', 'block');
			$('#forgetpwd_hidebox02').text('请输入注册时填写的邮箱地址');
		}
		else{
			var reg= /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
			if(!reg.test(email)){
				$('#forgetpwd_hidebox02').css('display', 'block');
				$('#forgetpwd_hidebox02').text('输入的邮箱格式不正确，请重新输入');
			}else{
				alert('跳转到邮箱地址页面');
			}
		}
		return false;
	});
	//用户注册验证码看不清特效
	$('#Userreg_box #u_bottom #email_box form #regemail_vcode_not_clear').click(function(event) {
		var imgsrc=$('#Userreg_box #u_bottom #email_box form img.one').attr("src");
		imgsrc = imgsrc+ "/" + Math.random();
		$('#Userreg_box #u_bottom #email_box form img.one').attr("src",imgsrc);
		return false;
	});
	//用户注册验证码看不清特效结束
	//用户注册成功页面特效
	$('#Userreg_box #UserregSuccess_email #bindingcellphone_box ul li #get_vcode').click(function(event) {
		var cellphone =$('#Userreg_box #UserregSuccess_email #bindingcellphone_box ul li #bingdingcellphone_No');
		var reg= /^(1)[0-9]{10}$/;
		if(cellphone.val() ==""){
			$('#bingdingcellphone_No_hidden_tips').css('display', 'block');
			$('#bingdingcellphone_No_hidden_tips').text('请输入手机号');
		}else{
			if(!reg.test(cellphone.val())){
				$('#bingdingcellphone_No_hidden_tips').css('display', 'block');
				$('#bingdingcellphone_No_hidden_tips').text('输入手机号格式不对');
			}
			else{
				$('#bingdingcellphone_No_hidden_tips').css('display', 'none');
				$(this).removeClass('special').addClass('special2').val('已发送');
				$('#validate_vcode').removeClass('special2').addClass('special');
				$('#Userreg_box #UserregSuccess_email #bindingcellphone_box ul li p.errorTips').css('display', 'block');
				$('#Userreg_box #UserregSuccess_email #bindingcellphone_box ul li #validate_vcode').removeAttr('disabled');
			}
		}
	});
	$('#Userreg_box #UserregSuccess_email #bindingcellphone_box ul li #validate_vcode').click(function(event) {
		var vcode =$('#Userreg_box #UserregSuccess_email #bindingcellphone_box ul li #bingdingcellphone_vcode');
		if(vcode.val() ==""){
			$('#bingdingcellphone_vcode_hidden_tips').css('display', 'block');
			$('#bingdingcellphone_vcode_hidden_tips').text('请输入验证码');
		}else{
			if(vcode.val() =="1234"){
				$('#Userreg_box #UserregSuccess_email #bindingcellphone_box ul.one').css('display', 'none');
				$('#Userreg_box #UserregSuccess_email #bindingcellphone_box #bingdingcellphone_success').css('display', 'block');
			}
			else{
				$('#bingdingcellphone_vcode_hidden_tips').css('display', 'block');
				$('#bingdingcellphone_vcode_hidden_tips').text('输入的验证码有误');
			}
		}

	});
	//用户注册成功页面特效结束
	//返回原来页面特效
	$('#return_page').click(function(event) {
		$('#Userreg_box').bPopup().close();
		return false;
	});
	$('#return_page2').click(function(event) {
		$('#Userreg_box').bPopup().close();
		return false;
	});
	//返回原来页面特效结束
	//邮箱注册和手机注册tap切换
	$('#cellphone_reg').click(function(event) {
		$('#email_box').css('display', 'none');
		$('#cellphone_box').css('display', 'block');
		$('#Userreg_box #u_bottom ul li').removeClass('one');
		$('#Userreg_box #u_bottom ul li a').removeClass('one');
		$(this).parent().addClass('one');
		$(this).addClass('one');
		return false;
	});
	$('#email_reg').click(function(event) {
		$('#email_box').css('display', 'block');
		$('#cellphone_box').css('display', 'none');
		$('#Userreg_box #u_bottom ul li').removeClass('one');
		$('#Userreg_box #u_bottom ul li a').removeClass('one');
		$(this).parent().addClass('one');
		$(this).addClass('one');
		return false;
	});
	//邮箱注册和手机注册tap切换结束
	//用户邮箱注册全部页面验证
	//邮箱地址验证
	$('#Userreg_box #u_bottom #email_box form input.one').blur(function(event) {
		var email_account = $(this);
		var backgroundURL='url("http://localhost/Trunk/Public/images/ico_12.png")'
		var backgroundURL_error= backgroundURL.replace("ico_12.png","ico_13.png");
		var backgroundURL_success= backgroundURL.replace("ico_12.png","ico_14.png");
		if(email_account.val() ==""){
			$('#Userreg_box #u_bottom #email_box form p.eight').text('请输入电子邮箱地址').css('color', '#F14B2B')
			.css('background-image', backgroundURL_error);
		}else{
			var reg=/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
			if(!reg.test(email_account.val())){
				$('#Userreg_box #u_bottom #email_box form p.eight').text('输入邮箱地址不正确').css('color', '#F14B2B')
				.css('background-image', backgroundURL_error);
			}
			else{
				$('#Userreg_box #u_bottom #email_box form p.eight').text('OK').css('color', '#999')
				.css('background-image', backgroundURL_success);
			}
		}
	});
	//密码验证
	$('#Userreg_box #u_bottom #email_box form input.two').blur(function(event) {
		var email_pwd = $(this).val();
		var backgroundURL='url("http://localhost/Trunk/Public/images/ico_12.png")'
		var backgroundURL_error= backgroundURL.replace("ico_12.png","ico_13.png");
		var backgroundURL_success= backgroundURL.replace("ico_12.png","ico_14.png");
		if(email_pwd ==""){
			$('#Userreg_box #u_bottom #email_box form p.nine').text('请输入密码').css('color', '#F14B2B')
			.css('background-image', backgroundURL_error);
		}else{
			if(email_pwd.length<6){
				$('#Userreg_box #u_bottom #email_box form p.nine').text('密码至少6位').css('color', '#F14B2B')
				.css('background-image', backgroundURL_error);
			}
			else if(email_pwd.length>32){
				$('#Userreg_box #u_bottom #email_box form p.nine').text('密码不能超过32位').css('color', '#F14B2B')
				.css('background-image', backgroundURL_error);
			}
			else{
				$('#Userreg_box #u_bottom #email_box form p.nine').text('OK').css('color', '#999')
				.css('background-image', backgroundURL_success);
			}
		}	
	});
	//密码复杂度判断
	$('#Userreg_box #u_bottom #email_box form input.two').keyup(function(event) {
		var pwd =$(this).val();
		var backgroundURL='url("http://localhost/Trunk/Public/images/ico_12.png")';
		var backgroundURL_error= backgroundURL.replace("ico_12.png","ico_13.png");
		var backgroundURL_success= backgroundURL.replace("ico_12.png","ico_14.png");
		var reg_04 =/\d{1,}/;  
		var reg_05 =/[a-zA-Z]{1,}/; 
		var reg_06 =/[-`=\\\[\];',.~!@#$%^&*()_+|{}:"<>?]{1,}/;
		if(pwd.length<6){
			$('#pwd_low').addClass('red');
		}
		else{
			if(pwd.length>=6 && pwd.length<12){
				if((reg_04.test(pwd) && reg_05.test(pwd)) || (reg_04.test(pwd) && reg_06.test(pwd)) || (reg_05.test(pwd) && reg_06.test(pwd))){
					$('#pwd_mid').addClass('red');
					if(reg_04.test(pwd) && reg_05.test(pwd) && reg_06.test(pwd)){
						$('#pwd_high').addClass('red');
					}
				}	
			}
			else{
				if(pwd.length>=12 && pwd.length<32){
					$('#pwd_mid').addClass('red');
					if((reg_04.test(pwd) && reg_05.test(pwd)) || (reg_04.test(pwd) && reg_06.test(pwd)) || (reg_05.test(pwd) && reg_06.test(pwd))){
						$('#pwd_high').addClass('red');
					}
				}
			}
		}
	});
	//重复密码验证
	$('#Userreg_box #u_bottom #email_box form input.three').blur(function(event) {
		var email_pwd = $('#Userreg_box #u_bottom #email_box form input.two').val();
		var email_vpwd = $(this).val();
		var backgroundURL='url("http://localhost/Trunk/Public/images/ico_12.png")'
		var backgroundURL_error= backgroundURL.replace("ico_12.png","ico_13.png");
		var backgroundURL_success= backgroundURL.replace("ico_12.png","ico_14.png");
		if(email_vpwd ==""){
			$('#Userreg_box #u_bottom #email_box form p.ten').text('请输入确认密码').css('color', '#F14B2B')
			.css('background-image', backgroundURL_error);
		}else{
			if(email_vpwd != email_pwd){
				$('#Userreg_box #u_bottom #email_box form p.ten').text('两次输入的密码不一致').css('color', '#F14B2B')
				.css('background-image', backgroundURL_error);
			}
			else{
				$('#Userreg_box #u_bottom #email_box form p.ten').text('OK').css('color', '#999')
				.css('background-image', backgroundURL_success);
			}
		}	
	});
	//昵称验证
	$('#Userreg_box #u_bottom #email_box form input.four').blur(function(event) {
		var email_nickname = $(this).val();
		var backgroundURL='url("http://localhost/Trunk/Public/images/ico_12.png")'
		var backgroundURL_error= backgroundURL.replace("ico_12.png","ico_13.png");
		var backgroundURL_success= backgroundURL.replace("ico_12.png","ico_14.png");
		if(email_nickname ==""){
			$('#Userreg_box #u_bottom #email_box form p.eleven').text('请输入您的昵称').css('color', '#F14B2B')
			.css('background-image', backgroundURL_error);
		}else{
			var reg_01 =/[-`=\\\[\];',.~!@#$%^&*()_+|{}:"<>?]{1,}/;
			var reg_02 =/^[\u2E80-\u9FFF]+$/;
			if(email_nickname.length>24){
				$('#Userreg_box #u_bottom #email_box form p.eleven').text('昵称不能超过12个汉字或24个字符').css('color', '#F14B2B')
				.css('background-image', backgroundURL_error);
			}
			else{
				if(reg_01.test(email_nickname)){
					$('#Userreg_box #u_bottom #email_box form p.eleven').text('昵称不能包含特殊字符').css('color', '#F14B2B')
					.css('background-image', backgroundURL_error);
				}
				else{
					if(reg_02.test(email_nickname)){
						if(email_nickname.length>12){
							$('#Userreg_box #u_bottom #email_box form p.eleven').text('昵称不能超过12个汉字或24个字符').css('color', '#F14B2B')
							.css('background-image', backgroundURL_error);
						}
						else{
							$('#Userreg_box #u_bottom #email_box form p.eleven').text('OK').css('color', '#999')
							.css('background-image', backgroundURL_success);
						}
					}
					else{
						$('#Userreg_box #u_bottom #email_box form p.eleven').text('OK').css('color', '#999')
						.css('background-image', backgroundURL_success);
					}
				}
			}
		}	
	});
	//验证码验证
	$('#Userreg_box #u_bottom #email_box form input.five').blur(function(event) {
		var email_vcode = $(this).val();
		var backgroundURL='url("http://localhost/Trunk/Public/images/ico_12.png")'
		var backgroundURL_error= backgroundURL.replace("ico_12.png","ico_13.png");
		var backgroundURL_success= backgroundURL.replace("ico_12.png","ico_14.png");
		if(email_vcode ==""){
			$('#Userreg_box #u_bottom #email_box form p.twelve').text('请输入验证码').css('color', '#F14B2B')
			.css('background-image', backgroundURL_error);
		}else{
			if(email_vcode =="1234"){
				$('#Userreg_box #u_bottom #email_box form p.twelve').text('OK').css('color', '#999')
				.css('background-image', backgroundURL_success);
			}
			else{
				$('#Userreg_box #u_bottom #email_box form p.twelve').text('验证码输入不正确').css('color', '#F14B2B')
				.css('background-image', backgroundURL_error);
			}
		}

	});
	
	//手机号码验证
	$('#Userreg_box #u_bottom #cellphone_box form input.one').blur(function(event) {
		var cellphone_account = $(this).val();
		var backgroundURL='url("http://localhost/Trunk/Public/images/ico_12.png")'
		var backgroundURL_error= backgroundURL.replace("ico_12.png","ico_13.png");
		var backgroundURL_success= backgroundURL.replace("ico_12.png","ico_14.png");
		if(cellphone_account ==""){
			$('#Userreg_box #u_bottom #cellphone_box form p.eight').text('请输入手机号码').css('color', '#F14B2B')
			.css('background-image', backgroundURL_error);
		}else{
			var reg_cellphone= /^(1)[0-9]{10}$/;
			if(!reg_cellphone.test(cellphone_account)){
				$('#Userreg_box #u_bottom #cellphone_box form p.eight').text('输入手机格式不正确').css('color', '#F14B2B')
				.css('background-image', backgroundURL_error);
			}
			else{
				$('#Userreg_box #u_bottom #cellphone_box form p.eight').text('OK').css('color', '#999')
				.css('background-image', backgroundURL_success);
			}
		}	
	});


	//短信验证码验证
	$('#Userreg_box #u_bottom #cellphone_box form input.six').blur(function(event) {
		var cellphone_msgcode = $(this).val();
		var backgroundURL='url("http://localhost/Trunk/Public/images/ico_12.png")'
		var backgroundURL_error= backgroundURL.replace("ico_12.png","ico_13.png");
		var backgroundURL_success= backgroundURL.replace("ico_12.png","ico_14.png");
		if(cellphone_msgcode ==""){
			$('#Userreg_box #u_bottom #cellphone_box form p.nine').text('请输入短信验证码').css('color', '#F14B2B')
			.css('background-image', backgroundURL_error);
		}else{
			$('#Userreg_box #u_bottom #cellphone_box form p.nine').text('OK').css('color', '#999')
				.css('background-image', backgroundURL_success);
		}	
	});

	//密码验证
	$('#Userreg_box #u_bottom #cellphone_box form input.two').blur(function(event) {
		var cellphone_pwd = $(this).val();
		var backgroundURL='url("http://localhost/Trunk/Public/images/ico_12.png")'
		var backgroundURL_error= backgroundURL.replace("ico_12.png","ico_13.png");
		var backgroundURL_success= backgroundURL.replace("ico_12.png","ico_14.png");
		if(cellphone_pwd ==""){
			$('#Userreg_box #u_bottom #cellphone_box form p.ten').text('请输入密码').css('color', '#F14B2B')
			.css('background-image', backgroundURL_error);
		}else{
			if(cellphone_pwd.length<6){
				$('#Userreg_box #u_bottom #cellphone_box form p.ten').text('密码至少6位').css('color', '#F14B2B')
				.css('background-image', backgroundURL_error);
			}
			else if(cellphone_pwd.length>32){
				$('#Userreg_box #u_bottom #cellphone_box form p.ten').text('密码不能超过32位').css('color', '#F14B2B')
				.css('background-image', backgroundURL_error);
			}
			else{
				$('#Userreg_box #u_bottom #cellphone_box form p.ten').text('OK').css('color', '#999')
				.css('background-image', backgroundURL_success);
			}
		}	
	});
	//密码复杂度判断
	$('#Userreg_box #u_bottom #cellphone_box form input.two').keyup(function(event) {
		var pwd =$(this).val();
		var backgroundURL='url("http://localhost/Trunk/Public/images/ico_12.png")';
		var backgroundURL_error= backgroundURL.replace("ico_12.png","ico_13.png");
		var backgroundURL_success= backgroundURL.replace("ico_12.png","ico_14.png");
		var reg_04 =/\d{1,}/;  
		var reg_05 =/[a-zA-Z]{1,}/; 
		var reg_06 =/[-`=\\\[\];',.~!@#$%^&*()_+|{}:"<>?]{1,}/;
		if(pwd.length<6){
			$('#cellphone_pwd_low').addClass('red');
		}
		else{
			if(pwd.length>=6 && pwd.length<12){
				if((reg_04.test(pwd) && reg_05.test(pwd)) || (reg_04.test(pwd) && reg_06.test(pwd)) || (reg_05.test(pwd) && reg_06.test(pwd))){
					$('#cellphone_pwd_mid').addClass('red');
					if(reg_04.test(pwd) && reg_05.test(pwd) && reg_06.test(pwd)){
						$('#cellphone_pwd_high').addClass('red');
					}
				}	
			}
			else{
				if(pwd.length>=12 && pwd.length<32){
					$('#cellphone_pwd_mid').addClass('red');
					if((reg_04.test(pwd) && reg_05.test(pwd)) || (reg_04.test(pwd) && reg_06.test(pwd)) || (reg_05.test(pwd) && reg_06.test(pwd))){
						$('#cellphone_pwd_high').addClass('red');
					}
				}
			}
		}
	});
	//重复密码验证
	$('#Userreg_box #u_bottom #cellphone_box form input.three').blur(function(event) {
		var cellphone_pwd = $('#Userreg_box #u_bottom #cellphone_box form input.two').val();
		var cellphone_vpwd = $(this).val();
		var backgroundURL='url("http://localhost/Trunk/Public/images/ico_12.png")'
		var backgroundURL_error= backgroundURL.replace("ico_12.png","ico_13.png");
		var backgroundURL_success= backgroundURL.replace("ico_12.png","ico_14.png");
		if(cellphone_pwd ==""){
			$('#Userreg_box #u_bottom #cellphone_box form p.eleven').text('请输入确认密码').css('color', '#F14B2B')
			.css('background-image', backgroundURL_error);
		}else{
			if(cellphone_vpwd != cellphone_pwd){
				$('#Userreg_box #u_bottom #cellphone_box form p.eleven').text('两次输入的密码不一致').css('color', '#F14B2B')
				.css('background-image', backgroundURL_error);
			}
			else{
				$('#Userreg_box #u_bottom #cellphone_box form p.eleven').text('OK').css('color', '#999')
				.css('background-image', backgroundURL_success);
			}
		}	
	});

	//昵称验证
	$('#Userreg_box #u_bottom #cellphone_box form input.four').blur(function(event) {
		var cellphone_nickname = $(this).val();
		var backgroundURL='url("http://localhost/Trunk/Public/images/ico_12.png")'
		var backgroundURL_error= backgroundURL.replace("ico_12.png","ico_13.png");
		var backgroundURL_success= backgroundURL.replace("ico_12.png","ico_14.png");
		if(cellphone_nickname ==""){
			$('#Userreg_box #u_bottom #cellphone_box form p.twelve').text('请输入您的昵称').css('color', '#F14B2B')
			.css('background-image', backgroundURL_error);
		}else{
			var reg_01 =/[-`=\\\[\];',.~!@#$%^&*()_+|{}:"<>?]{1,}/;
			var reg_02 =/^[\u2E80-\u9FFF]+$/;
			if(cellphone_nickname.length>24){
				$('#Userreg_box #u_bottom #cellphone_box form p.twelve').text('昵称不能超过12个汉字或24个字符').css('color', '#F14B2B')
				.css('background-image', backgroundURL_error);
			}
			else{
				if(reg_01.test(cellphone_nickname)){
					$('#Userreg_box #u_bottom #cellphone_box form p.twelve').text('昵称不能包含特殊字符').css('color', '#F14B2B')
					.css('background-image', backgroundURL_error);
				}
				else{
					if(reg_02.test(cellphone_nickname)){
						if(cellphone_nickname.length>12){
							$('#Userreg_box #u_bottom #cellphone_box form p.twelve').text('昵称不能超过12个汉字或24个字符').css('color', '#F14B2B')
							.css('background-image', backgroundURL_error);
						}
						else{
							$('#Userreg_box #u_bottom #cellphone_box form p.twelve').text('OK').css('color', '#999')
							.css('background-image', backgroundURL_success);
						}
					}
					else{
						$('#Userreg_box #u_bottom #cellphone_box form p.twelve').text('OK').css('color', '#999')
						.css('background-image', backgroundURL_success);
					}
				}
			}
		}	
	});
	

	//密码复杂度判断结束
	// $('#Userreg_box #u_bottom #email_box form input').focus(function(event) {
	// 	var name= $(this).attr('name');

	// 	if(name == "email"){
	// 		$('#reg_hidebox01').removeClass();
	// 		$('#reg_hidebox01').addClass('seven');
	// 		$('#reg_hidebox01').text("用于登录和找回密码，不会公开").addClass('twelve');
	// 	}
	// 	else if(name == "pwd"){
	// 		$('#reg_hidebox02').removeClass();
	// 		$('#reg_hidebox02').addClass('eight');
	// 		$('#reg_hidebox02').text("密码由6-20位的字母、数字或符号组成").addClass('twelve');
	// 	}
	// 	else if(name == "pwd2"){
	// 		$('#reg_hidebox03').removeClass();
	// 		$('#reg_hidebox03').addClass('nine');
	// 		$('#reg_hidebox03').text("请再次输入密码").addClass('twelve');
	// 	}
	// 	else{
	// 		$('#reg_hidebox04').removeClass();
	// 		$('#reg_hidebox04').addClass('ten');
	// 		$('#reg_hidebox04').text("昵称由1-16位的汉字、英文字母或数字组成").addClass('twelve');
	// 	}

	// });

	// $('#Userreg_box #u_bottom #email_box form input').blur(function(event) {
	// 	var name= $(this).attr('name');
	// 	var value= $(this).val();
	// 	if(value =="")
	// 	{
	// 		if(name == "email"){
	// 			$('#reg_hidebox01').text("").removeClass();
	// 			$('#reg_hidebox01').addClass('seven');
	// 			$('#reg_hidebox01').text("请输入邮箱").addClass('eleven');
	// 		}
	// 		else if(name == "pwd"){

	// 			$('#reg_hidebox02').text("").removeClass();
	// 			$('#reg_hidebox02').addClass('eight');
	// 			$('#reg_hidebox02').text("请输入密码").addClass('eleven');

	// 		}
	// 		else if(name == "pwd2"){
	// 			$('#reg_hidebox03').text("").removeClass();
	// 			$('#reg_hidebox03').addClass('nine');
	// 			$('#reg_hidebox03').text("请输入确认密码").addClass('eleven');
	// 		}
	// 		else{

	// 			$('#reg_hidebox04').text("").removeClass();
	// 			$('#reg_hidebox04').addClass('ten');
	// 			$('#reg_hidebox04').text("昵称至少1字符").addClass('eleven');
	// 		}
	// 	}
	// 	else{
	// 		if(name == "email"){
 // 				var reg= /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
 // 				if(!reg.test(value)){        
 //             		$('#reg_hidebox01').text("").removeClass();
	// 				$('#reg_hidebox01').addClass('seven');
	// 				$('#reg_hidebox01').text("请输入邮箱(邮箱的格式不正确)!").addClass('eleven');
	// 	        }
	// 	        else{
	// 	           	$('#reg_hidebox01').text("OK").removeClass();
	// 				$('#reg_hidebox01').addClass('seven');
	// 				$('#reg_hidebox01').addClass('thirteen');

	// 	        }   
	// 		}
	// 		else if(name == "pwd"){
	// 			var reg = /^[a-z0-9_-]{6,20}$/;
	// 			if(!reg.test(value)){     
 //             		$('#reg_hidebox02').text("").removeClass();
	// 				$('#reg_hidebox02').addClass('eight');
	// 				$('#reg_hidebox02').text("密码为6-20位字符（请输入密码）").addClass('eleven');
	// 	        }
	// 	        else{
	// 	           	$('#reg_hidebox02').text("OK").removeClass();
	// 				$('#reg_hidebox02').addClass('eight');
	// 				$('#reg_hidebox02').addClass('thirteen');
	// 	        }   
	// 		}
	// 		else if(name == "pwd2"){
	// 			var pwd = $('#Userreg_box #u_bottom #email_box form input.two').val();
	// 			var pwd2 = $('#Userreg_box #u_bottom #email_box form input.three').val();
	// 			if(pwd != pwd2){
	// 				$('#reg_hidebox03').text("").removeClass();
	// 				$('#reg_hidebox03').addClass('nine');
	// 				$('#reg_hidebox03').text("两次输入的密码不一致（请输入确认密码）").addClass('eleven');
	// 			}
	// 			else{
	// 				$('#reg_hidebox03').text("OK").removeClass();
	// 				$('#reg_hidebox03').addClass('nine');
	// 				$('#reg_hidebox03').addClass('thirteen');
	// 			}
	// 		}
	// 		else{

	// 			// 昵称正则验证
	// 		}
	// 	}

	// });
	

	
	//用户邮箱注册页面验证结束
	$('#reg_now').click(function(event) {
		var reg_zindex = $('#Userreg_box').css('z-index');
		var login_zindex = $('#Userlogin_box').css('z-index');
		var temp;
		if(reg_zindex == "auto" || login_zindex =="auto"){
			$('#Userreg_box').bPopup({
           		modalClose: false,
	        	opacity: 0.6,
	        	position: [320, 15],//x, y  
        	});
        	
		}
  		else{
  			temp = reg_zindex;
  			reg_zindex = login_zindex;
  			login_zindex =temp;
  			$('#Userlogin_box').css('z-index', login_zindex);
  			$('#Userreg_box').css('z-index', reg_zindex);
  			$('#Userreg_box').css('display', 'block');
  			$('#Userlogin_box').css('display', 'none');
  			
  		}
  		return false;
	});

	$('#login_now').click(function(event) {
		var reg_zindex = $('#Userreg_box').css('z-index');
		var login_zindex = $('#Userlogin_box').css('z-index');
		var temp;
		if(reg_zindex == "auto" || login_zindex =="auto"){
			$('#Userlogin_box').bPopup({
           		modalClose: false,
	        	opacity: 0.6,
	        	position: [320, 15],//x, y  
        	});
        	
		}
		else{
			temp = reg_zindex;
  			reg_zindex = login_zindex;
  			login_zindex =temp;
  			$('#Userlogin_box').css('z-index', login_zindex);
  			$('#Userreg_box').css('z-index', reg_zindex);
  			$('#Userreg_box').css('display', 'none');
  			$('#Userlogin_box').css('display', 'block');
		}
  		return false;
	});
	//用户注册弹框效果结束
	
	//用户登录弹框关闭结束
	//邮箱注册注册button特效
	$('#Userreg_box #u_bottom #email_box form #email_reg_btn').click(function(event) {

		var emailreg_email =$('#Userreg_box #u_bottom #email_box form input.one').val();
		var emailreg_pwd =$('#Userreg_box #u_bottom #email_box form input.two').val();
		var emailreg_pwd2 =$('#Userreg_box #u_bottom #email_box form input.three').val();
		var emailreg_nickname =$('#Userreg_box #u_bottom #email_box form input.four').val();
		var emailreg_vcode =$('#Userreg_box #u_bottom #email_box form input.five').val();
		var email_reg=/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;

		if((emailreg_email != "" && email_reg.test(emailreg_email)) && 
			(emailreg_pwd != "" && emailreg_pwd.length>=6 && emailreg_pwd.length<32) && 
			(emailreg_pwd2 != "" && emailreg_pwd==emailreg_pwd2) &&
			(emailreg_nickname != "") &&
			(emailreg_vcode != ""))
		{
			$.post("/index.php/user/register", { email: emailreg_email, 
			pwd: emailreg_pwd, pwd2: emailreg_pwd2,nickname:emailreg_nickname,
			 vcode:emailreg_vcode},function(data){
			 	//做个判断，返回成功执行下面的代码，跳转到注册成功页面
			 	if(data.status == 1){
			 		$('#Userreg_box #u_bottom').css('display', 'none');
					$('#Userreg_box #UserregSuccess_email').css('display', 'block');
			 	}
			},"json");

		}
		return false;

		
	});
	//邮箱注册注册button特效结束
	//手机注册注册button特效
	$('#Userreg_box #u_bottom #cellphone_box form #cellphone_reg_btn').click(function(event) {
		var cellphonereg_cellphone =$('#Userreg_box #u_bottom #cellphone_box form input.one').val();
		var cellphonereg__pwd =$('#Userreg_box #u_bottom #cellphone_box form input.two').val();
		var cellphonereg__pwd2 =$('#Userreg_box #u_bottom #cellphone_box form input.three').val();
		var cellphonereg__nickname =$('#Userreg_box #u_bottom #cellphone_box form input.four').val();
		var cellphonereg__vcode =$('#Userreg_box #u_bottom #cellphone_box form input.six').val();
		var reg_cellphone= /^(1)[0-9]{10}$/;

		if((cellphonereg_cellphone != "" && reg_cellphone.test(cellphonereg_cellphone)) && 
			(cellphonereg__pwd != "" && cellphonereg__pwd.length>=6 && cellphonereg__pwd.length<32) && 
			(cellphonereg__pwd2 != "" && cellphonereg__pwd==cellphonereg__pwd2) &&
			(cellphonereg__nickname != "") &&
			(cellphonereg__vcode != ""))
		{
			$.post("/index.php/user/register", { cellphone: cellphonereg_cellphone, 
			pwd: cellphonereg__pwd, pwd2: cellphonereg__pwd2,nickname:cellphonereg__nickname,
			 vcode:cellphonereg__vcode},function(data){
			 	//做个判断，返回成功执行下面的代码，跳转到注册成功页面
			 	if(data.status == 1){
			 		$('#Userreg_box #u_bottom').css('display', 'none');
					$('#Userreg_box #UserregSuccess_cellphone').css('display', 'block');
			 	}
			},"json");

		}
		return false;
	});
	
	//手机注册注册button特效结束
	// ////////////////////////用户注册+用户登录+忘记密码特效全部代码区域结束////////////////////
	////////////////////////手机版弹窗中的全部特效代码区域////////////////////////////////
	//手机版弹窗效果
	$('#cellphone_version').click(function(event) {
		$('#cellphone_version_box').bPopup({
           	modalClose: false,
	        opacity: 0.6,
	        position: [250, 20],//x, y
        });
		// $('#cellphone_version_box').show();
		return false;
	});
	//手机版弹窗效果结束

	//手机APP弹窗区域中下载区域切换效果
	$('#cellphone_version_box a.iphone').click(function(event) {
		$(this).css('background-color', '#FABAC0');
		$('#cellphone_version_box a.android').css('background-color', '#98E606');
		$('#cellphone_version_box a.wp').css('background-color', '#3399FF');
		$('#cellphone_version_box #wp_box').hide();
		$('#cellphone_version_box #iphone_box').show();
		$('#cellphone_version_box #android_box').hide();
		return false;
	});
	$('#cellphone_version_box a.android').click(function(event) {
		$(this).css('background-color', '#C1FB57');
		$('#cellphone_version_box a.iphone').css('background-color', '#ED5565');
		$('#cellphone_version_box a.wp').css('background-color', '#3399FF');
		$('#cellphone_version_box #iphone_box').hide();
		$('#cellphone_version_box #android_box').show();
		$('#cellphone_version_box #wp_box').hide();
		return false;
	});
	$('#cellphone_version_box a.wp').click(function(event) {
		$(this).css('background-color', '#7DBEFF');
		$('#cellphone_version_box a.iphone').css('background-color', '#ED5565');
		$('#cellphone_version_box a.android').css('background-color', '#98E606');
		$('#cellphone_version_box #iphone_box').hide();
		$('#cellphone_version_box #wp_box').show();
		$('#cellphone_version_box #android_box').hide();
		return false;
	});
	//手机APP弹窗区域中下载区域切换效果结束

	//手机APP弹窗区域中图片轮换特效
	var app_timer = setInterval(app_autoRun,5000);
	var app_sta = 0;//记录当前展示到哪张图片了
	function app_autoRun(){
	 	app_sta++;//sta自增
	 	app_sta = (app_sta == 2)?0:app_sta;//判断是不是到最后一张了，如果是，就切换到第一张
	 	app_change(app_sta);//切换效果
	 }
	 $('#cellphone_version_box #appbtn_box a img').hover(function(){
	 	clearInterval(app_timer);//清理定时器
	 	app_sta = $(this).index('#cellphone_version_box #appbtn_box a img');//获得鼠标移入到第几个li上了
	 	app_change(app_sta);//切换效果
	 },function(){
	 	app_timer = setInterval(app_autoRun,5000);//恢复定时器
	 })
	 function app_change(num){//用来控制切换图片和下标样式的函数
	 	$('#cellphone_version_box #apppics_box img').hide();//先把所有的图片隐藏
	 	$('#cellphone_version_box #apppics_box img').eq(num).fadeIn(200);//让对应的图片显示出来
	 	$('#cellphone_version_box #appbtn_box a img').attr('src', '/HuiGL/Public/images/ico_19.png');
	 	$('#cellphone_version_box #appbtn_box a img').eq(num).attr('src', '/HuiGL/Public/images/ico_18.png');
	 	
	 }
	//手机APP弹窗区域中图片轮换特效结束

	//手机APP弹窗区域中关闭特效
	$('#cellphone_version_box #app_closed_box a').click(function(event) {
		$('#cellphone_version_box').bPopup().close();
	});
	//手机APP弹窗区域中关闭特效结束
	////////////////////////手机版弹窗中的全部特效代码区域结束////////////////////////////
})