$(function(){

	//图片轮换板特效
	var timer = setInterval(autoRun,5000);
	var sta = 0;//记录当前展示到哪张图片了
	function autoRun(){
	 	sta++;//sta自增
	 	sta = (sta == 5)?0:sta;//判断是不是到最后一张了，如果是，就切换到第一张
	 	change(sta);//切换效果
	 }

	 $('#main #main_middle #ad ul li').hover(function(){
	 	clearInterval(timer);//清理定时器
	 	sta = $(this).index();//获得鼠标移入到第几个li上了
	 	change(sta);//切换效果
	 },function(){
	 	timer = setInterval(autoRun,5000);//恢复定时器
	 })

	 function change(num){//用来控制切换图片和下标样式的函数
	 	$('#main #main_middle #ad img').hide();//先把所有的图片隐藏
	 	$('#main #main_middle #ad img').eq(num).fadeIn(200);//让对应的图片显示出来
	 	$('#main #main_middle #ad ul li').removeClass('hover');//移除掉所有li上面的hover样式
	 	$('#main #main_middle #ad ul li').eq(num).addClass('hover');//给对应的li加上hover样式
	 }
	//图片轮换板特效结束

	//惠字头小分队特效
	var autobus_timer=setInterval(autobus,1000);
	var i = 0;
	var index=0;
	function autobus(){
		i++;
		i = (i == 9)?0:i;
		autochange(i);
	}
	function autochange(i){
		$('#main #main_middle #map #map_imgs img').removeClass('display');
		$('#main #main_middle #map #map_imgs img').eq(i).addClass('display');
		$('#main #main_middle #map a').removeClass('hover');
		$('#main #main_middle #map a').eq(i).addClass('hover');
	}
	$('#main #main_middle #map a').hover(function() {
		clearInterval(autobus_timer);//清理定时器
		$('#main #main_middle #map a').removeClass('hover');
		$('#main #main_middle #map #map_imgs img').removeClass('display');
	}, function() {
		autobus_timer=setInterval(autobus,1000);
	});
	//惠字头小分队特效结束

	//小编推荐内容特效
	$('#main #main_middle #tj_content ul li').hover(function() {
		$(this).find('p').css('color', '#4FC1E9');
		$(this).find('p').css('text-decoration', 'underline');
		$(this).find('a').css('color', '#4FC1E9');
		$(this).find('div').addClass('display')
		$(this).addClass('hide')
	}, function() {
		$(this).find('a').css('color', '#ED5565');
		$(this).find('p').css('color', '#434A54');
		$(this).find('div').removeClass('display')
		$(this).removeClass('hide')
	});
	//小编推荐内容特效结束

	//搜索框特效
	$('#top_nav_box #search_box #search_con').focus(function(){
		$(this).val('');
	})
	$('#top_nav_box #search_box #search_con').blur(function(){
		$(this).val('桂林环球美食节');
	})
	//搜索框特效结束

	// 优惠劵页面左边主要内容特效
	$('#main #left ul li').hover(function() {
		$(this).find('div').addClass('display')
		$(this).find('a.content').css('color', '#4466A3');
		$(this).find('a.content').css('text-decoration', 'underline');
		$(this).find('a.title').css('color', '#4466A3');
	}, function() {
		$(this).find('div').removeClass('display')
		$(this).find('a.content').css('color', 'black');
		$(this).find('a.content').css('text-decoration', 'none');
		$(this).find('a.title').css('color', '#ED5565');
		
	});
	$('#main #left ul li a.btn').hover(function() {
		$(this).css('background', '#F6808B');
	}, function() {
		$(this).css('background', '#ED5565');
	});
	// 优惠劵页面左边主要内容特效结束
	// 优惠劵页面中间主要内容特效
	$('#main #middle ul li').hover(function() {
		$(this).find('a.content').css('color', '#4466A3');
		$(this).find('a.content').css('text-decoration', 'underline');
		$(this).find('a.title').css('color', '#4466A3');
		$(this).find('div').addClass('display')
	}, function() {
		$(this).find('a.content').css('color', 'black');
		$(this).find('a.content').css('text-decoration', 'none');
		$(this).find('a.title').css('color', '#ED5565');
		$(this).find('div').removeClass('display')
	});
	$('#main #middle ul li a.btn').hover(function() {
		$(this).css('background', '#F6808B');
	}, function() {
		$(this).css('background', '#ED5565');
	});
	// 优惠劵页面中间主要内容特效结束
	// 优惠劵页面图片轮换板特效
	$('#advertising a').click(function() {
		$('#advertising').hide();
		return false;
	});

	var timer_coupon = setInterval(autoRun_coupon,5000);
	var sta_coupon = 0;//记录当前展示到哪张图片了
	function autoRun_coupon(){
	 	sta_coupon++;//sta自增
	 	sta_coupon = (sta_coupon == 3)?0:sta_coupon;//判断是不是到最后一张了，如果是，就切换到第一张
	 	change_coupon(sta_coupon);//切换效果
	 }

	 $('#advertising ul li').hover(function(){
	 	clearInterval(timer_coupon);//清理定时器
	 	sta_coupon = $(this).index();//获得鼠标移入到第几个li上了
	 	change_coupon(sta_coupon);//切换效果
	 },function(){
	 	timer_coupon = setInterval(autoRun_coupon,5000);//恢复定时器
	 })

	 function change_coupon(num){//用来控制切换图片和下标样式的函数
	 	$('#advertising img').hide();//先把所有的图片隐藏
	 	$('#advertising img').eq(num).fadeIn(200);//让对应的图片显示出来
	 	$('#advertising ul li').removeClass('hover');//移除掉所有li上面的hover样式
	 	$('#advertising ul li').eq(num).addClass('hover');//给对应的li加上hover样式
	 }
	// 优惠劵页面图片轮换板特效结束
	// 会员卡左边内容区域hover特效
	$('#main #left_card ul li').hover(function() {
		$(this).addClass('hover');
		$(this).find('a.two').css('display', 'block');
	}, function() {
		$(this).removeClass('hover');
		$(this).find('a.two').css('display', 'none');
	});
	$('#main #left_card ul li a.two').hover(function() {
		$(this).css('background', '#F6808B');
	}, function() {
		$(this).css('background', '#ED5565');
	});
	// 会员卡左边内容区域hover特效结束

	// 会员卡中间内容区域hover特效
	$('#main #middle_card ul li').hover(function() {
		$(this).addClass('hover');
		$(this).find('a.two').css('display', 'block');
	}, function() {
		$(this).removeClass('hover');
		$(this).find('a.two').css('display', 'none');
	});

	$('#main #middle_card ul li a.two').hover(function() {
		$(this).css('background', '#F6808B');
	}, function() {
		$(this).css('background', '#ED5565');
	});
	// 会员卡中间内容区域hover特效结束

	//用户注册弹框效果
	$('#Userreg').click(function(event) {
		$('#Userreg_box').bPopup({
           	modalClose: false,
	        opacity: 0.6,
	        position: [320, 15],//x, y
        });
		return false;
	});
	//用户注册弹框效果结束
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
	//用户注册页面验证

	//密码复杂度判断
	$('#Userreg_box #u_bottom #email_box form input.two').keyup(function(event) {

		var value = $(this).val();
		//中等密码复杂度规则：10位以上，字母+数字+符号
		//高级密码复杂度规则：6位以上，字母+数字+符号
		var strongRegex = new RegExp("^(?!(?:[^a-zA-Z]|\D|[a-zA-Z0-9])$).{10,}$");
     	var mediumRegex = new RegExp("^(?!(?:[^a-zA-Z]|\D|[a-zA-Z0-9])$).{6,10}$");
		if(value ==""){
			$('#pwd_low').removeClass('red');
			$('#pwd_mid').removeClass('red');
			$('#pwd_high').removeClass('red');
		}
		else{
			if(mediumRegex.test(value)){
				$('#pwd_low').addClass('red');
				$('#pwd_mid').addClass('red');
			}
			else if(strongRegex.test(value)){
				$('#pwd_low').addClass('red');
				$('#pwd_mid').addClass('red');
				$('#pwd_high').addClass('red');
			}
			else{
				$('#pwd_low').addClass('red');
			}
		}
	});
	//密码复杂度判断结束

	$('#Userreg_box #u_bottom #email_box form input').focus(function(event) {
		var name= $(this).attr('name');

		if(name == "email"){
			$('#reg_hidebox01').removeClass();
			$('#reg_hidebox01').addClass('seven');
			$('#reg_hidebox01').text("用于登录和找回密码，不会公开").addClass('twelve');
		}
		else if(name == "pwd"){
			$('#reg_hidebox02').removeClass();
			$('#reg_hidebox02').addClass('eight');
			$('#reg_hidebox02').text("密码由6-20位的字母、数字或符号组成").addClass('twelve');
		}
		else if(name == "pwd2"){
			$('#reg_hidebox03').removeClass();
			$('#reg_hidebox03').addClass('nine');
			$('#reg_hidebox03').text("请再次输入密码").addClass('twelve');
		}
		else{
			$('#reg_hidebox04').removeClass();
			$('#reg_hidebox04').addClass('ten');
			$('#reg_hidebox04').text("昵称由1-16位的汉字、英文字母或数字组成").addClass('twelve');
		}

	});

	$('#Userreg_box #u_bottom #email_box form input').blur(function(event) {
		var name= $(this).attr('name');
		var value= $(this).val();
		if(value =="")
		{
			if(name == "email"){
				$('#reg_hidebox01').text("").removeClass();
				$('#reg_hidebox01').addClass('seven');
				$('#reg_hidebox01').text("请输入邮箱").addClass('eleven');
			}
			else if(name == "pwd"){

				$('#reg_hidebox02').text("").removeClass();
				$('#reg_hidebox02').addClass('eight');
				$('#reg_hidebox02').text("请输入密码").addClass('eleven');

			}
			else if(name == "pwd2"){
				$('#reg_hidebox03').text("").removeClass();
				$('#reg_hidebox03').addClass('nine');
				$('#reg_hidebox03').text("请输入确认密码").addClass('eleven');
			}
			else{

				$('#reg_hidebox04').text("").removeClass();
				$('#reg_hidebox04').addClass('ten');
				$('#reg_hidebox04').text("昵称至少1字符").addClass('eleven');
			}
		}
		else{
			if(name == "email"){
 				var reg= /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
 				if(!reg.test(value)){        
             		$('#reg_hidebox01').text("").removeClass();
					$('#reg_hidebox01').addClass('seven');
					$('#reg_hidebox01').text("请输入邮箱(邮箱的格式不正确)!").addClass('eleven');
		        }
		        else{
		           	$('#reg_hidebox01').text("OK").removeClass();
					$('#reg_hidebox01').addClass('seven');
					$('#reg_hidebox01').addClass('thirteen');

		        }   
			}
			else if(name == "pwd"){
				var reg = /^[a-z0-9_-]{6,20}$/;
				if(!reg.test(value)){     
             		$('#reg_hidebox02').text("").removeClass();
					$('#reg_hidebox02').addClass('eight');
					$('#reg_hidebox02').text("密码为6-20位字符（请输入密码）").addClass('eleven');
		        }
		        else{
		           	$('#reg_hidebox02').text("OK").removeClass();
					$('#reg_hidebox02').addClass('eight');
					$('#reg_hidebox02').addClass('thirteen');
		        }   
			}
			else if(name == "pwd2"){
				var pwd = $('#Userreg_box #u_bottom #email_box form input.two').val();
				var pwd2 = $('#Userreg_box #u_bottom #email_box form input.three').val();
				if(pwd != pwd2){
					$('#reg_hidebox03').text("").removeClass();
					$('#reg_hidebox03').addClass('nine');
					$('#reg_hidebox03').text("两次输入的密码不一致（请输入确认密码）").addClass('eleven');
				}
				else{
					$('#reg_hidebox03').text("OK").removeClass();
					$('#reg_hidebox03').addClass('nine');
					$('#reg_hidebox03').addClass('thirteen');
				}
			}
			else{

				// 昵称正则验证
			}
		}

	});
	
	//用户注册页面验证结束
	//用户登录页面的验证
	$('#Userlogin_box #u_middle_box form input').focus(function(event) {
		var name= $(this).attr('name');
		if(name =="username"){
			$('#login_hidebox01').css('display', 'none');
		}
		else{
			$('#login_hidebox02').css('display', 'none');
		}
			
	});
	$('#Userlogin_box #u_middle_box form input').blur(function(event) {
		var value= $(this).val();
		var name= $(this).attr('name');
		if(value==""){
			if(name =="username"){
				$('#login_hidebox01').css('display', 'block');
			}
			else{
				$('#login_hidebox02').css('display', 'block');
			}
		}
	});
	//用户登录页面的验证结束
	//忘记密码页面的验证
	$('#UserForgetpwd_box ul li input').focus(function(event) {
		var name= $(this).attr('name');
		if(name =="cellphone_no"){
			$('#forgetpwd_hidebox01').css('display', 'none');
		}
		else{
			$('#forgetpwd_hidebox02').css('display', 'none');
		}
			
	});
	$('#UserForgetpwd_box ul li input').blur(function(event) {
		var value= $(this).val();
		var name= $(this).attr('name');
		if(value==""){
			if(name =="cellphone_no"){
				$('#forgetpwd_hidebox01').css('display', 'block');
			}
			else{
				$('#forgetpwd_hidebox02').css('display', 'block');
			}
		}
	});
	//忘记密码页面的验证结束

	$('#reg_now').click(function(event) {
		
  		var login_zindex = $('#Userlogin_box').css('z-index');
  		var reg_zindex = $('#Userreg_box').css('z-index');
  		var display = $('#Userreg_box').css('display');
  		if(display == "none"){
  			$('#Userreg_box').bPopup({
           		modalClose: false,
	        	opacity: 0.6,
	        	position: [320, 15],//x, y  
        	});
  		}
  		else{
  			$('#Userlogin_box').hide();
        	$('#Userreg_box').bPopup({
           		modalClose: false,
	        	opacity: 0.6,
	        	position: [320, 15],//x, y 
	        	
        	});
        	var v = parseInt(login_zindex)+2000;
        	$('#Userreg_box').css('z-index', v);
  		}
  		return false;
		
	});

	$('#login_now').click(function(event) {
		var login_zindex = $('#Userlogin_box').css('z-index');
  		var reg_zindex = $('#Userreg_box').css('z-index');
  		var display = $('#Userlogin_box').css('display');
  		if(display == "none"){
  			$('#Userlogin_box').bPopup({
           		modalClose: false,
	        	opacity: 0.6,
	        	position: [320, 15],//x, y  
        	});
  		}
  		else{
  			$('#Userreg_box').hide();
        	$('#Userlogin_box').bPopup({
           		modalClose: false,
	        	opacity: 0.6,
	        	position: [320, 15],//x, y  
        	});
        	var v = parseInt(reg_zindex)+1000;
        	$('#Userlogin_box').css('z-index', v);
  		}
  		return false;
	});

	//用户注册弹框效果结束
})