$(function(){

/**************************************************************************
     * Header部分js

***************************************************************************/
	//订阅Hover特效
	$('#subscription').hover(function() {
		$('#subscription_box').show();
		$(this).css('background','#FBE5E7').addClass('current').find('a').css('color', 'black').addClass('hover_bg_icon');
		$('#help_link').css('border-right', 'none');
	}, function() {
		$('#subscription_box').hide();
		$(this).css({'background': '#ED5565','border-bottom': '2px solid white','height': '29px'}).removeClass('current').find('a').css('color', 'white').removeClass('hover_bg_icon');
		$('#help_link').css('border-right', '1px solid white');
	});

	$('#subscription_box').hover(function() {
		$('#subscription_box').show();
	}, function() {
		$('#subscription_box').hide();
	});
	//订阅Hover特效结束
	//关注Hover特效
	$('#share').hover(function() {
		$('#share_box').show();
		$(this).css('background','#FBE5E7').addClass('current').find('a').css('color', 'black').addClass('hover_bg_icon');
		$('#subscription_link').css('border-right', 'none');
	}, function() {
		$('#share_box').hide();
		$(this).css({'background': '#ED5565','border-bottom': '2px solid white','height': '29px'}).removeClass('current').find('a').css('color', 'white').removeClass('hover_bg_icon');
		$('#subscription_link').css('border-right', '1px solid white');
	});
	$('#share_box').hover(function() {
		$('#share_box').show();
	}, function() {
		$('#share_box').hide();
	});
	//关注Hover特效结束
	//我的惠桂林Hover效果
	$('#person_center_menu').hover(function() {
		$('#login_dropdownlist_box').show();
		$('#myhuigl').css('color', '#ED5565');
	}, function() {
		$('#login_dropdownlist_box').hide();
		$('#myhuigl').css('color', 'white');
	});
	$('#top_logo_box #login_dropdownlist').hover(function() {
		$(this).show();
	}, function() {
		$(this).hide();
	});
	//我的惠桂林Hover效果结束
	//点击订阅按钮提交验证
	$('#subscription_email_btn').click(function(event) {
		var email= $('#top_rss #top_rss_box #subscription_box  #subscription_email_textbox').val();
		var frequency= "";
		var reg= /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
		if(email ==""){
			alert('请输入邮箱地址！');
		}
		else{
			if(!reg.test(email)){
				alert('邮箱地址格式不正确，请重新输入！');
			}
			else{
				$.post(ajaxPostURL+'Account/handleEmailSubscription',{ email:email }, function(data) {
				if(data.status == 0){
						alert(data.info);
					}else if(data.status == 1){
						alert(data.info);
					}else if(data.status == 2){
						alert(data.info);
					}else if(data.status == 3){
						alert(data.info);
					}

				},'json');
			}
		}
		return false;
	});
	//点击订阅按钮提交验证结束
	//左右学校导航收起和展开特效
	$('#top_nav_classification_box ul li.expand').click(function(event) {
		$('#top_nav_classification_box ul li').slideDown('fast');
		$(this).hide();
		return false;
	});
	$('#top_nav_classification_box ul li.collapse').click(function(event) {
		$('#top_nav_classification_box ul li').hide();
		$('#top_nav_classification_box ul li.expand').show();
		return false;
	});
	//左右学校导航收起和展开特效结束

	/**************************************************************************
     * 用户注册+用户登录+忘记密码特效全部代码区域
	***************************************************************************/
	//用户注册弹框效果
	$('#Userreg').click(function(event) {
		$('#Userreg_box').bPopup({
     
        });
		return false;
	});
	// 用户注册弹框效果结束
	//用户登录弹窗效果
	$('#Userlogin').click(function(event) {
		$('#m_bottom_box').css('display', 'none');  //隐藏修改密码界面
		$('#Userlogin_box').bPopup({
           	
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
    $('#Userlogin_box #u_middle_box input.two').click(function(event){
        var record_password = getCookie('until_last_moment');
        if (record_password != "") {
            var number = Math.random() * 1000;
            $('#Userlogin_box #u_middle_box input.two').val(record_password);
        }
        })
	$('#Userlogin_box #u_middle_box input').blur(function(event) {
		var input= $(this);
		var name= $(this).attr('name');
		var username =$('#Userlogin_box #u_middle_box input.one').val();
		var password =$('#Userlogin_box #u_middle_box input.two').val();
		var vcode =$('#Userlogin_box #u_middle_box input.three').val();
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
	});
	
	$('#btn_login').click(function(event) {
		var tag = $('#login_hidebox05').attr('tag');

		var verifyURL = $("#login_hidebox05").val();
		var username =$('#Userlogin_box #u_middle_box input.one').val();
		var password =$('#Userlogin_box #u_middle_box input.two').val();
		var vcode =$('#Userlogin_box #u_middle_box input.three').val();
        var record_password = document.getElementById('rememberpwd').checked
        var autologin = document.getElementById('autologin').checked
		var next= $('#Userlogin').attr('next');
		if(vcode != "" && username != "" && password != ""){
			$.post(ajaxPostURL+"User/checkLogin", { username: username, password: password, vcode: vcode, autologin: autologin, record_password: record_password },function(data){
            	if(data.status == 1){
            		if (tag == 0) {
            			$('#Userlogin_box').bPopup().close();
            			$('#download_coupon_hidden_box').bPopup({});
                        return false;
            		}else{
            			location.href = loginSucessURL+next;
            		}
            	}else if(data.status == 0){
            		$('#login_hidebox04').show().text(data.info);
            		return false;
            	}
            	else if(data.status == 3){
            		$('#login_hidebox04').show().text(data.info);
            		return false;
            	}
            	else if(data.status == 4){
            		$('#login_hidebox04').show().text(data.info);
            		return false;
            	}
            	else{
            		$('#login_hidebox04').show().text(data.info);
            		return false;
            	}
			},"json");
		}
		else{
			$('#login_hidebox04').show().text("用户名,密码和者验证码不能为空");
		}
		return false;
		
	});
	//用户登录弹窗中所有验证结束
	//用户登录验证码看不清特效
	$('#Userlogin_box #u_middle_box  #vcode_not_clear').click(function(event) {
		var imgsrc=$('#Userlogin_box #u_middle_box  #vcode_img').attr("src");
		imgsrc = imgsrc+ "/" + Math.random();
		$('#Userlogin_box #u_middle_box  #vcode_img').attr("src",imgsrc);
		return false;
	});
	//用户登录验证码看不清特效结束
	//忘记密码弹窗切换
	$('#forgetpwd').click(function(event) {
		$('#u_middle_box').css('display', 'none');
		$('#u_bottom_box').css('display', 'none');
		$('#Userlogin_box #u_top_box p').text("忘记密码");
		$('#UserForgetpwd_box').css('display', 'block');
		$('#modify_pwd_box').css('display', 'none');
		return false;
	});
	//忘记密码弹窗切换结束
	//忘记密码操作后返回登录界面
	$('#return_userlogin').click(function(event) {
		$('#u_middle_box').css('display', 'block');
		$('#u_bottom_box').css('display', 'block');
		$('#Userlogin_box #u_top_box p').text("用户登录");
		$('#UserForgetpwd_box').css('display', 'none');
		$('#modify_pwd_box').css('display', 'none');
		return false;
	});
	//忘记密码操作后返回登录界面结束
	//验证用户修改密码信息以及执行修改
    $('#btn_modify').click(function(event) {
    	var password = $('#one').val();
    	var password1 = $('#two').val();
    	var inputCode = $('#three').val();
    	if (password == "") {
    		$('#hidden01').css('display','block');
    		$('#hidden01').text('密码为空');
    		return false;
    	}if (password1 == "") {
    		$('#hidden02').css('display','block');
    		$('#hidden02').text('确认密码为空');
    		return false;
    	}if (password != password1) {
    		$('#hidden02').css('display','block');
    		$('#hidden02').text('两次密码输入不一致');
    		return false;
    	}if (inputCode == "") {
    		$('#hidden03').css('display','block');
    		$('#hidden03').text('验证码为空');
    		return false;
    	}if ($('#one').val().length < 6 || $('#two').val().length < 6) {
    		$('#hidden01').css('display','block');
    		$('#hidden01').text('密码至少6位');
    		return false;
    	}
    		$.post(ajaxPostURL+"User/modifyPwd", {password: password,password1: password1,checkCode: inputCode}, function(data) {
    		
    			if (data.status == 6) {
    				$('#hidden01').css('display','block');
    				$('#hidden01').text(data.info);
    			}if (data.status == 7) {
    				$('#hidden01').css('display','block');
    				$('#hidden01').text(data.info);
    			}if (data.status == 8) {
    				$('#hidden03').css('display','block');
    				$('#hidden03').text(data.info);
    			}
    			if (data.status == 9) {
    				$('#hidden03').css('display','block');
    				$('#hidden03').text(data.info);
    			}if (data.status == 10) {
    				$('#hidden01').css('display','block');
    				alert(data.info+",返回登录窗口");
    				//修改密码弹窗效果结束,返回登录窗口
    				$('#u_middle_box').css('display', 'block');
			    	$('#u_bottom_box').css('display', 'block');
			    	$('#UserForgetpwd_box').css('display', 'none');
			    	$('#Userlogin_box #u_top_box p').text("用户登录");
			    	$('#modify_pwd_box').css('display', 'none');
    			}if (data.status == 11) {
    				$('#hidden01').css('display','block');
    				alert(data.info);
    			}if (data.status == 12) {
    				$('#hidden01').css('display','block');
    				$('#hidden01').text(data.info);
    			}
    		});
    	return false;
    });

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

				$.post(ajaxPostURL+"User/forgetPwd", {user_cellphone: cellphone}, function(data) {
					
					//判断手机号是否注册，没注册则不跳转到修改密码页面
					if (data.status == 12) {
						$('#forgetpwd_hidebox01').css('display', 'block');
						$('#forgetpwd_hidebox01').text(data.info);
						return false;
					}else{
						if (data.status == 1) {
							alert(data.info);
							$('#u_middle_box').css('display', 'none');
							$('#u_bottom_box').css('display', 'none');
							$('#m_bottom_box').css('display','none');
							$('#UserForgetpwd_box').css('display', 'none');
							$('#Userlogin_box #u_top_box p').text("修改密码");
							$('#modify_pwd_box').css('display', 'block');				
						}
								
					}
					
				});
			}
		}
		return false;
	});
	$('#email_send_btn').click(function(event) {
		var email=$('#email_no').val();
		if(email == ""){
			$('#forgetpwd_hidebox02').css('display', 'block');
			$('#forgetpwd_hidebox02').text('请输入注册时填写的邮箱地址');
	
			return false;
		}
		else{
			var reg= /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
			if(!reg.test(email)){
				$('#forgetpwd_hidebox02').css('display', 'block');
				$('#forgetpwd_hidebox02').text('输入的邮箱格式不正确，请重新输入');
				return false;
			}else{
				$.post(ajaxPostURL+"User/forgetPwd", {user_email: email}, function(data) {
					
					//判断邮箱是否注册，没注册则不跳转到修改密码页面
					if (data.status == 5) {
						$('#forgetpwd_hidebox02').css('display', 'block');
						$('#forgetpwd_hidebox02').text(data.info);
						return false;
					}else{
						if (data.status == 13) {
							alert(data.info);
						}
						$('#u_middle_box').css('display', 'none');
						$('#u_bottom_box').css('display', 'none');
						$('#m_bottom_box').css('display','none');
						$('#UserForgetpwd_box').css('display', 'none');
						$('#Userlogin_box #u_top_box p').text("修改密码");
						$('#modify_pwd_box').css('display', 'block');
					}
					
				});
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
			return false;
		}else{
			if(!reg.test(cellphone.val())){
				$('#bingdingcellphone_No_hidden_tips').css('display', 'block');
				$('#bingdingcellphone_No_hidden_tips').text('输入手机号格式不对');
				return false;
			}
			else{
                $.post(ajaxPostURL+"User/sendCheckCode", { phone_number :cellphone.val()
                    },function(data){
                    //做个判断，返回成功执行下面的代码，跳转到注册成功页面
                   
                    if(data.status == 1){
	                   		$('#bingdingcellphone_No_hidden_tips').css('display', 'none');
							$("#Userreg_box #UserregSuccess_email #bindingcellphone_box ul li #get_vcode").removeClass('special').addClass('special2').val('已发送');
							$('#validate_vcode').removeClass('special2').addClass('special');
							$('#Userreg_box #UserregSuccess_email #bindingcellphone_box ul li p.errorTips').css('display', 'block');
							$('#Userreg_box #UserregSuccess_email #bindingcellphone_box ul li #validate_vcode').removeAttr('disabled');
                    	}
                    },"json");
			}
		}
	});
	$('#Userreg_box #UserregSuccess_email #bindingcellphone_box ul li #validate_vcode').click(function(event) {
		var vcode =$('#Userreg_box #UserregSuccess_email #bindingcellphone_box ul li #bingdingcellphone_vcode');
		var cellphone =$('#Userreg_box #UserregSuccess_email #bindingcellphone_box ul li #bingdingcellphone_No');
		if(vcode.val() ==""){
			$('#bingdingcellphone_vcode_hidden_tips').css('display', 'block');
			$('#bingdingcellphone_vcode_hidden_tips').text('请输入验证码');
		}else{
			if(cellphone.val() ==""){
				$('#bingdingcellphone_vcode_hidden_tips').css('display', 'block');
				$('#bingdingcellphone_vcode_hidden_tips').text('请输入手机号');
			}
			else{
				$.post(ajaxPostURL+"User/bindPhone",{vcode:vcode.val(),cellphone_number:cellphone.val()},function(data){
					if(data.status ==1){
						$('#Userreg_box #UserregSuccess_email #bindingcellphone_box ul.one').css('display', 'none');
						$('#Userreg_box #UserregSuccess_email #bindingcellphone_box #bingdingcellphone_success').css('display', 'block');
					}else{
						$('#bingdingcellphone_vcode_hidden_tips').text('验证码错误');
					}
				},"json");
			}
		}
	});
	//用户注册成功页面特效结束
    $('#sendcode').click(function(event){
        var phone_number = $('#Userreg_box #u_bottom #cellphone_box form input.one').val();
		var username =$('#Userlogin_box #u_middle_box form input.one').val();
		var reg= /^(1)[0-9]{10}$/;
        if (phone_number == "") {
        	$('#Userreg_box #u_bottom #cellphone_box form p.tip_send_vcode').show().text('手机号码不能为空！');
            return false;
        }
        if(!reg.test(phone_number)){
        	 $('#Userreg_box #u_bottom #cellphone_box form p.tip_send_vcode').show().text('手机号码格式不正确！');
        	return false;
        }
        var sta = 60;
        $(this).text("重新获取");
        $('#Userreg_box #u_bottom #cellphone_box form p.tip_send_vcode').show();
       	var timer = setInterval(autoRun,1000);
       
		function autoRun(){
		 	if(sta == 0){
		 		 $('#sendcode').text("重新获取");
		 		 $('#Userreg_box #u_bottom #cellphone_box form p.tip_send_vcode').hide();
		 		 clearInterval(timer);
		 	}
		 	else{
		 		sta--;//sta自减
		 		$('#sendcode').text("重新获取("+sta+")");
		 	}
		}
        $.post(ajaxPostURL+"User/sendCheckCode", { phone_number : phone_number
            },function(data){
            //做个判断，返回成功执行下面的代码，跳转到注册成功页面
            if(data.status == 1){
                 clearInterval(timer);
                 $('#sendcode').text("重新获取");
                 $('#Userreg_box #u_bottom #cellphone_box form p.tip_send_vcode').show().text('验证码已经发送');
            }
            else{
            	 clearInterval(timer);
                 $('#sendcode').text("重新获取");
                 $('#Userreg_box #u_bottom #cellphone_box form p.tip_send_vcode').show().text(data.info).css('color', '#F14B2B');
            }
            },"json");

        });

    $('#validate_vcode').click(function(event){
        var phone_number = $('#bingdingcellphone_No').val();
		var vcode =$('#bingdingcellphone_vcode').val();
        if (phone_number == "") {
            return;
        }
        $.post("/index.php/User/bindPhone", { cellphone_number : phone_number, vcode:vcode
            },function(data){
            //做个判断，返回成功执行下面的代码，跳转到注册成功页面
            if(data.status == 1){
                alert('绑定成功');
            }
            },"json");

        });

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
			$('#Userreg_box #u_bottom #email_box form p.twelve').text('').css('color', '#999')
			.css('background-image', backgroundURL_success);
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
	//用户邮箱注册页面验证结束
	//登录弹窗和注册弹窗互相切换
	$('#reg_now').click(function(event) {
		$('#Userlogin_box').bPopup().close();
		$('#Userreg_box').bPopup({
         
        });
        return false;
	});

	$('#login_now_cellphone').click(function(event) {
		$('#Userreg_box').bPopup().close();
		$('#Userlogin_box').bPopup({
         
        });
  		return false;
	});

	$('#login_now_email').click(function(event) {
		$('#Userreg_box').bPopup().close();
		$('#Userlogin_box').bPopup({
         
        });
  		return false;
	});
	//登录弹窗和注册弹窗互相切换结束
	//邮箱注册注册button特效
	$('#Userreg_box #u_bottom #email_box form #email_reg_btn').click(function(event) {
		var tag = $(this).attr('tag');
		var backgroundURL='url("http://localhost/Trunk/Public/images/ico_12.png")'
		var backgroundURL_error= backgroundURL.replace("ico_12.png","ico_13.png");

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
			$.post(ajaxPostURL+"User/register", { email: emailreg_email, 
			pwd: emailreg_pwd, pwd2: emailreg_pwd2,nickname:emailreg_nickname,
			 vcode:emailreg_vcode},function(data){

			 	// 做个判断，返回成功执行下面的代码，跳转到注册成功页面
			 	if(data.status == 1){
			 		if (tag == 0) {
			 			$('#Userreg_box').bPopup().close();
			 			$('#download_coupon_hidden_box').bPopup({});
				        return false;
			 		}
			 		if (tag == 1) {
			 			$('#Userreg_box #u_bottom').css('display', 'none');
					    $('#Userreg_box #UserregSuccess_email').css('display', 'block');
			 		}
			 	}
			 	else if(data.status ==0){
			 		$('#Userreg_box #u_bottom #email_box form p.twelve').show().text(data.info).css('color', '#F14B2B')
					.css('background-image', backgroundURL_error);
			 	}else if(data.status ==2){
			 		$('#Userreg_box #u_bottom #email_box form p.twelve').show().text(data.info).css('color', '#F14B2B')
					.css('background-image', backgroundURL_error);
			 	}
			},"json");

		}
		return false;
	});
	//邮箱注册注册button特效结束
	//手机注册注册button特效
	$('#Userreg_box #u_bottom #cellphone_box form #cellphone_reg_btn').click(function(event) {
		var tag = $(this).attr('tag');
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
			$.post(ajaxPostURL+"User/register", { cellphone: cellphonereg_cellphone, 
			pwd: cellphonereg__pwd, pwd2: cellphonereg__pwd2,nickname:cellphonereg__nickname,
			 vcode:cellphonereg__vcode},function(data){
			 	//做个判断，返回成功执行下面的代码，跳转到注册成功页面
			 	if(data.status == 1){

			 		if (tag == 0) {
			 			$('#Userreg_box').bPopup().close();
			 			$('#download_coupon_hidden_box').bPopup({});
				        return false;
			 		}
			 		if (tag == 1) {
			 			$('#Userreg_box #u_bottom').css('display', 'none');
				 		$('#Userreg_box #UserregSuccess_cellphone').css('display', 'block');
				 		var sta =3;
							setInterval(function(){
							sta--;
							if(sta == 0){
								$('#cellphone_reg_success_count_down').text(sta+"秒");	
								location.href = "http://www.huixiaoyuan.com/index.php/index/index.html";
							}
							else{
								$('#cellphone_reg_success_count_down').text(sta+"秒");	
							}
						},1000)
			 		}
			 	}
			 	if(data.status == 0){
			 		$('#cellphone_reg_final_error_tip').show();
			 	}
			});
		}
		return false
	});
	/**************************************************************************
     * 手机版弹窗中的全部特效代码区域
	***************************************************************************/
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



	//学校导航特效
	window_change();
	$(window).resize(window_change);


/**************************************************************************
     * footer部分js
     
***************************************************************************/
	//在线提交表单验证
	$('#feedback_btn_submit').click(function(event) {
		var username=$('#online_submit_username');
		var cellphone=$('#online_submit_cellphone');
		var content=$('#online_submit_content');
		var type =$('#hidden_type_value')
		if(username.val() == ""){
			alert("请留下您的称呼!");
			username.focus(); //获取焦点
			return false;
		}
		else{
			if(cellphone.val()==""){
				alert('请留下您的联系方式！');
				cellphone.focus(); //获取焦点
				return false;
			}
			else{
				if($.trim(content.val())==""){
					alert('请留下您的意见！');
					content.focus(); //获取焦点
					return false;
				}
				else{
					$.post(ajaxPostURL+'Intention/handle',{ nickname:username.val(),othercommunication:cellphone.val(),content:content.val(),type:type.val() }, function(returnData) {
							if(returnData.status == 0){
								alert(returnData.info);
							}else if(returnData.status == 1){
								$('#main #left_card p.three').css('display', 'block');
								$('#online_submit_form').addClass('one');
								$('#main #left_card form ul li input').val("");
								$('#main #left_card form ul li textarea').val("");
							}else if(returnData.status == 2){
								alert(returnData.info);
							}

					},'json');
					return false;
				}
			}
		}
	});
	//在线提交表单验证结束
	//商务合作意向表单验证
	$('#intention_btn_submit').click(function(event) {
		var intention_username =$('#intention_username');
		var intention_cellphone =$('#intention_cellphone');
		var intention_business =$('#intention_business');
		var intention_content =$('#intention_contents');
		var type =$('#hidden_type_value')
		var intention_address = $('#intention_address');
		var area = $('#intention_area option:selected');
		var classification = $('#intention_classification option:selected');
		if(intention_username.val() ==""){
			alert('请留下您的姓名!');
			intention_username.focus(); //获取焦点
			return false;
		}else{
			if(intention_cellphone.val() == ""){
				alert('请留下您的联系方式!');
				intention_cellphone.focus(); //获取焦点
				return false;
			}else{
				if(intention_business.val() ==""){
					alert('请留下您公司名称');
					intention_business.focus(); //获取焦点
					return false;
				}else{
					if($.trim(intention_content.val())==""){
						alert('请留下您的相关内容');
						intention_content.focus(); //获取焦点
						return false;
					}
					else{
						$.post(ajaxPostURL+'Intention/handle',{ nickname:intention_username.val(),cellphone:intention_cellphone.val(),content:intention_content.val(),type:type.val(),shopname: intention_business.val(),companyaddress:intention_address.val(),area:area.val(),classification:classification.val()}, function(returnData) {
							if(returnData.status == 0){
								alert(returnData.info);
							}else if(returnData.status == 1){
								alert('提交成功！')
								$('#main #left_card p.three').css('display', 'block');
								$('#intention_sumbit_form').addClass('one');
								$('#main #left_card form ul li input').val("");
								$('#main #left_card form ul li textarea').val("");
							}else if(returnData.status == 2){
								alert(returnData.info);
							}

						},'json');
						return false;
					}
				}
			}
		}
		
	});
	//商务合作意向表单验证结束
	//用户推荐合作意向表单验证
	$('#recommend_btn_submit').click(function(event) {
		var recommend_username =$('#recommend_username');
		var recommend_cellphone =$('#recommend_cellphone');
		var recommend_business =$('#recommend_business');
		var recommend_address =$('#recommend_address');
		var recommend_product =$('#recommend_product');
		var recommend_content =$('#recommend_content');
		var recommend_address =$('#recommend_address');
		var recommend_product =$('#recommend_product');
		var classification = $('#recommend_classification option:selected');
		var type =$('#hidden_type_value')
		if(recommend_username.val() ==""){
			alert('请留下您的姓名!');
			recommend_username.focus(); //获取焦点
			return false;
		}else{
			if(recommend_cellphone.val() == ""){
				alert('请留下您的联系方式!');
				recommend_cellphone.focus(); //获取焦点
				return false;
			}else{
				if(recommend_business.val() ==""){
					alert('请填写推荐商户名称');
					recommend_business.focus(); //获取焦点
					return false;
				}else{
					if(recommend_address.val() ==""){
						alert('请填写推荐商户的店面地址');
						recommend_address.focus(); //获取焦点
						return false;
					}
					else{
						if(recommend_product.val() ==""){
							alert('请填写推荐特色产品的名称');
							recommend_product.focus(); //获取焦点
							return false;
						}
						else{
							if($.trim(recommend_content.val())==""){
								alert('请填写相关备注信息1');
								recommend_content.focus(); //获取焦点
								return false;
							}
							else{
								$.post(ajaxPostURL+'Intention/handle',{ nickname:recommend_username.val(),cellphone:recommend_cellphone.val(),content:recommend_content.val(),type:type.val(),shopname: recommend_business.val(),specialproduct:recommend_product.val(),companyaddress:recommend_address.val(),classification:classification.val()}, function(returnData) {
										if(returnData.status == 0){
											alert(returnData.info);
										}else if(returnData.status == 1){
											$('#main #left_card p.three').css('display', 'block');
											$('#recommend_sumbit_form').addClass('one');
											$('#main #left_card form ul li input').val("");
											$('#main #left_card form ul li textarea').val("");
										}else if(returnData.status == 2){
											alert(returnData.info);
										}
								},'json');
								return false;
							}
						}
					}
				}
			}
		}
		
	});
	//用户推荐合作意向表单验证结束
	
/**************************************************************************
     * 全局Search页面js

***************************************************************************/
	//搜索位置信息隐藏特效
	$('#main #coupon_box ul.coupon_content li').hover(function() {
		$(this).find('p.hidden_location').show();
	}, function() {
		$(this).find('p.hidden_location').hide();
	});
	//搜索位置信息隐藏特效结束
	var hidden_type_value = $('#hidden_type_value').val();
	$('#coupon_box').css('height', hidden_type_value);

	


/**************************************************************************
     * 发送优惠券到手机通用js

***************************************************************************/
	$('#closed_download_coupon_hidden_box').click(function(event) {
    	$('#download_coupon_hidden_box').bPopup().close();
    	
    });
    //点击下载手机优惠劵弹窗中验证码看不清特效
	$('#send_to_phone_vcode_not_clear').click(function(event) {
		var imgsrc=$('#download_coupon_hidden_box div.middle_content_box ul li img').attr("src");
		imgsrc = imgsrc+ "/" + Math.random();
		$('#download_coupon_hidden_box div.middle_content_box ul li img').attr("src",imgsrc);
		return false;
	});
	//点击下载手机优惠劵弹窗中验证码看不清特效结束
	//关闭发送成功弹窗
	$('#close_middle_content_box_success').click(function(event) {
    	$('#download_coupon_hidden_box').bPopup().close();
    	
    });
	//关闭发送成功弹窗结束
})



/**************************************************************************
     * 全局函数和变量

***************************************************************************/

//Ajax提交URL全局变量
var ajaxPostURL = "http://test.huiguilin.com/index.php/";
//登录成功跳转URL全部变量
var loginSucessURL = "http://test.huiguilin.com/";

//Ajax提交URL和登录成功跳转URL
// var Current_URL = window.location.href;
// var ajaxPostURL;
// var loginSucessURL;
// Current_URL=Current_URL.substr(7,1);//截取从首个字符开始的15个字符 
// if(Current_URL == "w" || Current_URL == "W"){
// 	ajaxPostURL = "http://www.huixiaoyuan.com/index.php/";
// 	loginSucessURL = "http://www.huixiaoyuan.com";
// }else{
// 	ajaxPostURL = "http://huixiaoyuan.com/index.php/";
// 	loginSucessURL = "http://huixiaoyuan.com";
// }
//Ajax提交URL和登录成功跳转URL结束



var jump_box_left;
function window_change(){//用来计算top和left值的函数
		
	// var jump_box_top = parseInt(($(window).height()-$('#top_nav_classification_box').height())/2);//计算top值
	jump_box_left = parseInt(($(window).width()-$('#main').width())/2 - $('#top_nav_classification_box').width() - 10);//计算left值
 	// $('#top_nav_classification_box').css({'top':jump_box_top+'px','left':jump_box_left + 'px'})
 	$('#top_nav_classification_box').css({'top':'194px','left':jump_box_left + 'px'});

 	//计算右边浮动导航的Left
 	top_bottom_box_left = parseInt(($(window).width()+$('#main').width())/2 + $('div.right_back_top_bottom_box').width() - 75);
 	$('div.right_back_top_bottom_box').css('left', top_bottom_box_left+'px');
}
$(window).scroll( function() {
	var n1 = parseInt($(window).scrollTop());
  	if(n1 > 194){
  		$('#top_nav_classification_box').css({'top':'0px','left':jump_box_left+'px'});
  	}else{
  		var top = 194-n1;
  		$('#top_nav_classification_box').css({'top':top+'px','left':jump_box_left+'px'});
  	}
  	
 	var n2 = parseInt($(window).height());
    var n3 = parseInt($(document).height());
    var middle_val = n3/2;
    var middle_n2 = n2/2;
    var flag = n1 + middle_n2;
    if (flag > middle_val) {
    	$('#back').attr('href', '#backtop').removeClass('backbottom').addClass('back');
    	$('#back').hover(function() {
    		$('#back').removeClass('backbottomhover').addClass('backtophover');
    	
    	}, function() {
    		$('#back').removeClass('backbottomhover').removeClass('backtophover');
    	});
    }else{
    	$('#back').attr('href', '#backbottom').removeClass('back').addClass('backbottom');
    	$('#back').hover(function() {
    		$('#back').removeClass('backtophover').addClass('backbottomhover');
    	
    	}, function() {
    		$('#back').removeClass('backtophover').removeClass('backbottomhover');
    	});
    }
});
    function getCookie(c_name)
    {
        if (document.cookie.length>0)
        {
            c_start=document.cookie.indexOf(c_name + "=")
                if (c_start!=-1)
                { 
                    c_start=c_start + c_name.length+1 
                        c_end=document.cookie.indexOf(";",c_start)
                        if (c_end==-1) c_end=document.cookie.length
                            return unescape(document.cookie.substring(c_start,c_end))
                } 
        }
        return ""
    }
//优惠券天，小时，分，秒倒计时函数
function Test(dayid, hourid, minid, secid) {
    var day = parseInt($('#' + dayid).text());
    var hour = parseInt($('#' + hourid).text());
    var min = parseInt($('#' + minid).text());
    var sec = parseInt($('#' + secid).text());
    var ctimer = setInterval(countdown, 1000);

	function countdown(){
		if(sec != 0){
			sec--;
			changeSec(sec,secid);
		}else{
			if(min != 0){
				min--;
				changeMin(min,minid);
				sec = 60;
				changeSec(sec,secid);
			}else{
				if(hour != 0 ){
					hour--;
					changeHr(hour,hourid);
					min = 60;
					changeSec(sec,secid);
				}else{
					if(day != 0){
						day--;
						changeDay(day,dayid);
						hour = 24;
						changeSec(sec,secid);
					}else{
						clearInterval(ctimer);
					}
				}
			}
		}
	}
	 function changeSec(sec, secid) {
        $('#' + secid).text(sec);
    }
    function changeMin(min, minid) {
        $('#' + minid).text(min);
    }
    function changeHr(hour, hourid) {
        $('#' + hourid).text(hour);
    }
    function changeDay(day, dayid) {
        $('#' + dayid).text(day);
    }


}

