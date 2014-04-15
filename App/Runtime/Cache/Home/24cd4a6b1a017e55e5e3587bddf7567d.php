<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 a//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo ($partnerInfo[0]['name']); ?> | 惠校园</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/partnerdetail.css" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/global.css" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/index.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/M_sendCouponToCellphone.css">
	<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/bPopup.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/partner.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/index.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/header.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/config.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/M_sendCouponToCellphone.js"></script>
	<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>

	<script type="text/javascript" src="__PUBLIC__/js/baidumap.js"></script>
	
</head>
<body>
<!-- 顶部订阅分享区域+Logo区域 -->
       <!-- 顶部订阅分享区域 --> 
	<div id="top_box">
		<div id="top_function_box">
			
			<ul class="clearfix">
				<?php if($_SESSION['user']['user_id']== ''): ?><li><a href="" id="Userlogin" next="<?php echo (__SELF__); ?>">登录</a></li>
				<li><a href="" id="Userreg">快速注册</a></li>
				<?php else: ?>
				<li><a href="<?php echo U("Home/Account/mysetting");?>" class="no_border_right">您好,<?php echo ($_SESSION['user']['nickname']); ?></a></li>
				<li id="person_center_menu" class="person_center_menu">
					<a href="<?php echo U("Home/Account/mycoupon");?>" class="border_left" id="myhuigl">我的惠校园</a>
					<div id="login_dropdownlist_box">
						<ul id="login_dropdownlist">
							<li class="title"><a href="<?php echo U("Home/Account/mycoupon");?>">我的惠校园</a></li>
							<li><a href="<?php echo U("Home/Account/mycoupon");?>" class="one">我的券包</a></li>
							<li><a href="<?php echo U("Home/Account/myfavorite");?>" class="one">我的收藏</a></li>
							<li><a href="<?php echo U("Home/Account/mycommented");?>" class="one">我的评论</a></li>
							<li><a href="<?php echo U("Home/Account/mysubscription");?>" class="one">我的订阅</a></li>
							<li><a href="<?php echo U("Home/Account/mysetting");?>" class="one">个人设定</a></li>
							<li><a href="<?php echo U("Home/User/logout");?>" class="one">登出</a></li>
						</ul>
					</div>
				</li><?php endif; ?>
				<li><a href="<?php echo U("Home/Help/help");?>" target=_blank id="help_link">使用帮助</a></li>
				<li id="subscription" class="subscription">
					<a href="" class="bg_icon" id="subscription_link">订阅</a>
					<div id="subscription_box">

						<label for="subscription_email_textbox" class="subscription_default_content" id="subscription_default_contents">请输入订阅邮箱</label>
						<input type="text" id="subscription_email_textbox" value="" name="subscription_email_textbox"/>
						<input type="submit" value="订阅" name="subscription_email_btn" id="subscription_email_btn">
					</div>
				</li>
				<li id="share" class="share">
					<a href="" class="bg_icon">分享</a>
					<div id="share_box">
						<ul class="clearfix">
							<li><a href="http://weibo.com/huigl?topnav=1&wvr=5" class="weibo">惠校园新浪微博</a></li>
							<li><a href="http://user.qzone.qq.com/2042534770" class="qzone">惠校园QQ空间</a></li>
							<li><a href="http://t.qq.com/ihuigl?preview" class="QQweibo">惠校园腾讯微博</a></li>
						</ul>
					</div>
				</li>
				<li><a href="<?php echo U("Admin/Account/login");?>" target=_blank class="no_border_right">商家入口</a></li>
			</ul>
			<img src="__PUBLIC__/images/slogan2.png" alt="slogan" id="slogan">
		</div>
		<div id="top_logo_box">
			<a href="<?php echo U("Index/index");?>">
				<img src="__PUBLIC__/images/logo.png" alt="logo">
			</a>
		</div>
		<div id="top_nav_box">
			<div id="nav_search_box">
				<ul>
					<?php if($templateName == 'index'): ?><li class="border"><a href="<?php echo U("Index/index");?>">首页</a></li>
						<li><a href="<?php echo U("Coupon/specialcoupon");?>">限时优惠</a></li>
						<li><a href="<?php echo U("Coupon/coupon");?>">优惠券</a></li>
						<li><a href="<?php echo U("Partner/partner");?>">商户</a></li>
					<?php elseif(($templateName == 'coupon')): ?>
						<li><a href="<?php echo U("Index/index");?>">首页</a></li>
						<li><a href="<?php echo U("Coupon/specialcoupon");?>">限时优惠</a></li>
						<li class="border"><a href="<?php echo U("Coupon/coupon");?>">优惠券</a></li>
						<li><a href="<?php echo U("Partner/partner");?>">商户</a></li>
					<?php elseif(($templateName == 'partner')): ?>
						<li><a href="<?php echo U("Index/index");?>">首页</a></li>
						<li><a href="<?php echo U("Coupon/specialcoupon");?>">限时优惠</a></li>
						<li><a href="<?php echo U("Coupon/coupon");?>">优惠券</a></li>
						<li class="border"><a href="<?php echo U("Partner/partner");?>">商户</a></li>
					<?php elseif($templateName == 'specialcoupon'): ?>
						<li><a href="<?php echo U("Index/index");?>">首页</a></li>
						<li class="border"><a href="<?php echo U("Coupon/specialcoupon");?>">限时优惠</a></li>
						<li><a href="<?php echo U("Coupon/coupon");?>">优惠券</a></li>
						<li><a href="<?php echo U("Partner/partner");?>">商户</a></li>
					<?php elseif($templateName == ''): ?>
						<li class="border"><a href="<?php echo U("Index/index");?>">首页</a></li>
						<li><a href="<?php echo U("Coupon/specialcoupon");?>">限时优惠</a></li>
						<li><a href="<?php echo U("Coupon/coupon");?>">优惠券</a></li>
						<li><a href="<?php echo U("Partner/partner");?>">商户</a></li>
					<?php else: ?>
						<li><a href="<?php echo U("Index/index");?>">首页</a></li>
						<li><a href="<?php echo U("Coupon/specialcoupon");?>">限时优惠</a></li>
						<li><a href="<?php echo U("Coupon/coupon");?>">优惠券</a></li>
						<li><a href="<?php echo U("Partner/partner");?>">商户</a></li><?php endif; ?>
				</ul>
				<form id="search_box" method="get" action="<?php echo U("Home/Search/search");?>">
					<div>
						<label for="search_con" class="default_content" id="default_content">请输入您要查询的内容</label>
						<input id="search_con" type="text"  name="search_con"/>
						<input id="search_btn" type="submit" value="" name="search_btn"/>
					</div>
				</form>
			</div>
		</div>
		<div id="top_nav_classification_box">
			<ul>
				<li class="expand"><a href="" class="white">展开全部学校</a></li>
				<li><a href="<?php echo U('Coupon/coupon','','','');?>/tag/桂林电子科技大学" target=_blank>桂林电子科技大学</a></li>
				<li><a href="<?php echo U('Coupon/coupon','','','');?>/tag/广西师范大学" target=_blank>广西师范大学</a></li>
				<li><a href="<?php echo U('Coupon/coupon','','','');?>/tag/桂林理工大学" target=_blank>桂林理工大学</a></li>
				<li><a href="<?php echo U('Coupon/coupon','','','');?>/tag/桂林医学院" target=_blank>桂林医学院</a></li>
				<li><a href="<?php echo U('Coupon/coupon','','','');?>/tag/桂林航天工业学院" target=_blank>桂林航天工业学院</a></li>
				<li><a href="<?php echo U('Coupon/coupon','','','');?>/tag/桂林旅专" target=_blank>桂林旅专</a></li>
				<li class="no_border_bottom"><a href="<?php echo U('Coupon/coupon','','','');?>/tag/广艺桂林分校" target=_blank>广艺桂林分校</a></li>
				<li class="collapse"><a href="<?php echo U('Coupon/coupon','','','');?>/tag/桂林电子科技大学" class="red">收起全部学校</a></li>
			</ul>
		</div>
	</div>


		
<!-- 顶部订阅分享区域结束 -->

<div id="Userreg_box">
	<div id="u_top">
		<a id="a_closed2"><img src="__PUBLIC__/images/login_closed.png" alt="用户注册"></a>
		<p>用户注册</p>
	</div>
	<div id="u_bottom">
		<ul>
			<li class="one"><a href="" id="cellphone_reg">手机注册</a></li>
			<li><a href="" class="one" id="email_reg">邮箱注册</a></li>
		</ul>
		<div id="email_box">
			<form action="" method="post">
				<p class="one">邮箱</p>
				<input type="text" name="email" class="one"/>
				<p class="two">密码</p>
				<input type="password" name="pwd" class="two"/>
				<ul>
					<li id="pwd_low">弱</li>
					<li id="pwd_mid">中</li>
					<li id="pwd_high">强</li>
				</ul>	
				<p class="three">确认密码</p>
				<input type="password" name="pwd2" class="three"/>
				<p class="four">昵称</p>
				<input type="text" name="nickname" class="four"/>
				<p class="five">验证码</p>
				<input type="text" name="reg_vcode" class="five"/>
				<a href="" id="regemail_vcode_not_clear">看不清</a>
				<img src="<?php echo U("Home/User/verifyImg","","","");?>" class="one" alt="验证码">
				<input type="checkbox" name="license" class="six" checked="true">
				<p class="six">
					我已阅读并同意<a href="<?php echo U("Eula/eula");?>"><<惠校园用户条款>>.</a>
				</p>
				<input type="submit" name="email_reg_btn" id="email_reg_btn" value="注册" />
				<p class="seven">已经是惠校园的用户？点击<a href="" id="login_now_email">登录.</a></p>
				<p class="eight" id="reg_hidebox01">用于登录和找回密码，不会公开</p>
				<p class="nine" id="reg_hidebox02">密码由6-32位的字母、数字或符号组成</p>
				<p class="ten" id="reg_hidebox03">请再次输入密码</p>
				<p class="eleven" id="reg_hidebox04">昵称不能超过12个汉字或24个字符</p>
				<p class="twelve" id="reg_hidebox05"></p> 
				<p class="thirteen" id="reg_hidebox06">输入的信息不正确，请重新注册</p>
			</form>
		</div>
		<div id="cellphone_box" class="hide">
			<form action="" method="post">
				<p class="one">手机号码</p>
				<input type="text" name="cellphone" class="one"/>
				<a href="javascript:void(0)" id="sendcode" name="sendcode">免费获取验证码</a>
				<p class="tip_send_vcode">已发送，1分钟后可重新获取</p>
				<p class="seven">验证码</p>
				<input type="text" name="vcode" class="six"/>
				<p class="two">密码</p>
				<input type="password" name="pwd" class="two"/>
				<ul>
					<li id="cellphone_pwd_low">弱</li>
					<li id="cellphone_pwd_mid">中</li>
					<li id="cellphone_pwd_high">强</li>
				</ul>	
				<p class="three">确认密码</p>
				<input type="password" name="pwd2" class="three"/>
				<p class="four">昵称</p>
				<input type="text" name="nickname" class="four"/>
				<input type="checkbox" name="license" class="five" checked="true">
				<p class="five">
					我已阅读并同意<a href=""><<惠校园用户条款>>.</a>
				</p>
				<input type="submit" name="cellphone_reg_btn" id="cellphone_reg_btn" value="注册"/>
				<p class="thirteen">已经是惠校园的用户？点击<a href="" id="login_now_cellphone">登录.</a></p>
				<p class="eight" id="reg_hidebox01">用于登录和找回密码，不会公开</p>
				<p class="nine" id="reg_hidebox02">请输入手机收到的短信验证码</p>
				<p class="ten" id="reg_hidebox03">密码由6-32位的字母、数字或符号组成</p>
				<p class="eleven" id="reg_hidebox04">请再次输入密码</p>
				<p class="twelve" id="reg_hidebox05">昵称由1-16位的汉字、英文字母或数字组成</p>
				<p class="fourteen" id="cellphone_reg_final_error_tip">验证码错误</p>
			</form>
		</div>	
	</div>
	<div id="UserregSuccess_email">
		<div id="tips_box">
			<img src="__PUBLIC__/images/regsucess.png">
			<p class="one">注册成功并已登录惠校园网！</p>
			<p class="two">您可以关闭此窗口回到原来的页面，或者点击 <a href="" id="return_page">返回原来页面</a> 或去 <a href="<?php echo U("Index/index");?>">惠校园网首页</a></p>
		</div>
		<div id="bindingcellphone_box">
			<p class="one">30秒绑定手机号，更方便获取优惠券以及会员卡：</p>
			<ul class="one">
				<li>
					<p class="title">手机号码</p>
					<input class="one" type="text" name="bingdingcellphone_No" id="bingdingcellphone_No">
					<input class="two special" type="submit" value="获取验证码" id="get_vcode">
					<p class="validate" id="bingdingcellphone_No_hidden_tips"></p>
					<p class="errorTips">如果长时间没收到验证码，请在60秒后重试</p>
				</li>
				<li>
					<p class="title">验证码</p>
					<input class="one" type="text" name="bingdingcellphone_vcode" id="bingdingcellphone_vcode">
					<input class="two special2" type="submit" value="绑定手机号" id="validate_vcode" disabled="disabled">
					<p class="validate" id="bingdingcellphone_vcode_hidden_tips"></p>
				</li>
			</ul>
			<div id="bindingcellphone_tips">
				<p class="two">绑定手机号后，您可以</p>
				<ul>
					<li>直接使用手机号登录</li>
					<li>更容易找回被忘记的密码</li>
					<li>更方便快捷获取优惠券和会员卡</li>
				</ul>
				<p class="three">请惠粉们放心，我们会保密您的手机号，非经同意，是不会发送任何广告的~</p>
			</div>
			<div id="bingdingcellphone_success">
				<p class="one">已完成绑定,手机号为186****4143</p>
				<p class="two">如需修改，请到 个人中心-<a href="">我的设置</a> 修改</p>
			</div>
		</div>
	</div>
	<div id="UserregSuccess_cellphone">
		<div id="tips_box2">
			<img src="__PUBLIC__/images/regsucess.png">
			<p class="one">注册成功并已登录惠校园网！</p>
			<p class="two">您可以关闭此窗口回到原来的页面，或者点击 <a href="" id="return_page2">返回原来页面</a> 或去 <a href="<?php echo U("Index/index");?>">惠校园网首页</a></p>
		</div>
		<p class="count">如果没有选择，页面将在<span id="cellphone_reg_success_count_down">3秒</span>后自动关闭此窗口。</p>
	</div>
</div>
<div id="Userlogin_box">
	<div id="u_top_box">
		<a id="a_closed"><img src="__PUBLIC__/images/login_closed.png" alt="关闭"></a>
		<p>用户登录</p>
	</div>
	<div id="u_middle_box">
			<p class="one">账号</p>
			<input type="text" name="username" class="one" />
			<p class="two">密码</p>
			<input type="password" name="password" class="two"/>
			<p class="three">验证码</p>
			<input type="textbox" name="vcode" class="three"/>
			<a href="" id="vcode_not_clear">看不清</a>
			<img src="<?php echo U("Home/User/verifyImg","","","");?>" id="vcode_img" alt="验证码">
			<a href="" id="forgetpwd">忘记密码?</a>
			<input type="checkbox" name="rememberpwd" class="four">
			<p class="four">记住密码</p>
			<input type="checkbox" name="autologin" class="five">
			<p class="five">下次自动登录</p>
			<input type="submit" name="btn_login" id="btn_login" value="登录"/>
			<p class="six">还没有账户？<a href="" id="reg_now">立即注册</a></p>
			<p class="seven" id="login_hidebox01">请输入邮箱/手机号</p>
			<p class="eight" id="login_hidebox02">请输入密码</p>
			<p class="nine" id="login_hidebox03">请输入验证码</p>
			<p class="ten" id="login_hidebox04">用户名或密码有误，请重新输入</p>
			<input type="hidden" id="login_hidebox05" value="<?php echo U("Home/Login/verify");?>" />
	</div>
	<div id="u_bottom_box">
		<p>使用其他账户直接登陆</p>
		<ul>
			<li><a href="" class="one">新浪微博</a></li>
			<li><a href="" class="two">QQ</a></li>
			<li><a href="" class="three">人人网</a></li>
			<li><a href="" class="four">支付宝</a></li>
			<li><a href="" class="five">360</a></li>
		</ul>
	</div>
	<div id="UserForgetpwd_box">
		<ul>
			<li>
				<img src="__PUBLIC__/images/forget_cellphone.png" alt="手机绑定">
				<p class="one">绑定手机号<span>用户只能通过手机号找回</span></p>
				<p class="two">请输入您绑定的手机号，找回密码：</p>
				<form>
					<input type="text" name="cellphone_no" class="one" id="cellphone_no"/>
					<a href="" id="cellphone_send_btn">发送</a>
				</form>
				<p id="forgetpwd_hidebox01"></p>
			</li>
			<li>
				<img src="__PUBLIC__/images/forget_email.png" alt="邮箱绑定">
				<p class="one">未绑定手机号用户可以通过邮箱找</p>
				<p class="two">请输入您登录的邮箱地址，找回密码：</p>
				<form>
					<input type="text" name="email_no" class="one" id="email_no"/>
					<a href="" id="email_send_btn">发送</a>
				</form>
				<p id="forgetpwd_hidebox02"></p>
			</li>
		</ul>
		<a href="" id="return_userlogin">返回登录页面</a>
	</div>
	<div id="modify_pwd_box">
			<p class="one">新密码</p>
			<input type="password" name="username" class="one" id="one" />
			<span style="position:absolute;margin-left:365px;margin-top:35px;border:0px;color:red;display:none" type="text" id="hidden01"></span>
			<p class="two">请确认</p>
			<input type="password" name="password" class="two" id="two" />
			<span style="position:absolute;margin-left:365px;margin-top:95px;border:0px;color:red;display:none" type="text" id="hidden02"></span>
			<p class="three">验证码</p>
			<input type="textbox" name="vcode" class="three" id="three" />
			<span style="position:absolute;margin-left:365px;margin-top:152px;border:0px;color:red;display:none" type="text" id="hidden03"></span>
			<input type="submit" name="btn_login" id="btn_modify" value="修改密码"/>
	</div>
</div>
<div id="cellphone_version_box">
	<p class="one">惠校园手机客户端</p>	
	<p class="two">吃喝玩乐，惠享生活！</p>
	<a class="iphone" href="">iPhone</a>
	<a class="android" href="">Android</a>
	<a class="wp" href="">WP/Win8</a>
	<p class="version_comment_title">版本说明:</p>
	<p class="version_comment_content">该版本支持ios5.0、Android 2.1、WindowsPhone8及以上系统.</p>
	<div id="app_closed_box">
		<a class="app_closed"><img src="__PUBLIC__/images/login_closed.png" alt="关闭"></a>
	</div>
	<div id="apppics_box">
		<img id="phone_pic01" src="__PUBLIC__/images/pic/phone_pic01.png">
		<img id="phone_pic02" src="__PUBLIC__/images/pic/phone_pic02.png">
	</div>
	<div id="appbtn_box">	
		<a class="imgbtn_01" href="javascript:void(0)"><img src="__PUBLIC__/images/ico_19.jpg"></a>
		<a class="imgbtn_02" href="javascript:void(0)"><img src="__PUBLIC__/images/ico_19.jpg"></a>
	</div>
	<div id="iphone_box">
		<img src="__PUBLIC__/images/ico_15.png" alt="iphone版">
		<ul>
			<li>
				<p><span>方法一：</span><a href="">去AppStore下载</a></p>
			</li>
			<li>
				<p><span>方法二：</span>用手机在AppStore中搜索"惠校园"下载</p>
			</li>
			<li class="one">
				<p><span>方法三：</span>手机扫描二维码下载</p>
				<img src="__PUBLIC__/images/barcode.png">
				<p class="four">（或手机浏览器输入<a href="" >http://dpurl.cn/KjG下载）</a></p>
			</li>
		</ul>
	</div>
	<div id="android_box">
		<img src="__PUBLIC__/images/ico_16.png" alt="安卓版">
		<ul>
			<li>
				<p><span>方法一：</span><a href="">下载安装包</a></p>
			</li>
			<li>
				<p><span>方法二：</span>在Android Market中搜索"惠校园"下载</p>
			</li>
			<li class="one">
				<p><span>方法三：</span>手机扫描二维码下载</p>
				<img src="__PUBLIC__/images/barcode.png">
				<p class="four">（或手机浏览器输入<a href="" >http://dpurl.cn/KjG下载）</a></p>
			</li>
		</ul>
	</div>
	<div id="wp_box">
		<img src="__PUBLIC__/images/ico_17.png" alt="windowsphone版">
		<ul>
			<li>
				<p><span>方法一：</span><a href="">下载安装包</a></p>
			</li>
			<li>
				<p><span>方法二：</span>在Windows Market中搜索"惠校园"下载</p>
			</li>
			<li class="one">
				<p><span>方法三：</span>手机扫描二维码下载</p>
				<img src="__PUBLIC__/images/barcode.png">
				<p class="four">（或手机浏览器输入<a href="" >http://dpurl.cn/KjG下载）</a></p>
			</li>
		</ul>
	</div>
</div>

<script>
	var searchInput=document.getElementById("search_con");
	searchInput.onfocus = function(){
		document.getElementById("default_content").style.display = 'none';
	};
	searchInput.onblur = function(){
		var content = document.getElementById("search_con").value;
		if(content == ""){
			document.getElementById("default_content").style.display = '';
		}
	};

	var subscriptionInput = document.getElementById("subscription_email_textbox");
	var subscription_default_content = document.getElementById("subscription_default_contents");
	subscriptionInput.onfocus = function(){
		subscription_default_content.style.display = 'none';
	}
	subscriptionInput.onblur = function(){
		var subscriptionInputValue = subscriptionInput.value;
		if (subscriptionInputValue == "") {
			subscription_default_content.style.display = '';
		}
	}

</script>
<!-- 顶部订阅分享区域+Logo区域结束 -->
<!--  导航区域 -->
<div style="width:100%">
	<div id="partnermain" >
		<!-- 主要内容顶部区域 -->
			<div id="partnersitenav">
				<a href="" class="no_margin_left"><?php echo ($partner_tags[0]['pcat_name']); ?></a><span>></span><a href=""><?php echo ($partner_tags[0]['cat_name']); ?></a><span>></span><a href=""><?php echo ($partner_tags[0]['belong']); ?></a><span>></span><a href=""><?php echo ($partner_tags[0]['locationname']); ?></a><span>></span><a href="" class="gray"><?php echo ($partnerInfo[0]['name']); ?></a>
			</div>
			<!-- 主要内容顶部区域结束 -->
			<!-- 主要内容左边区域开始 -->
				<div id="partnerleft">
				<!-- 主要内容左边区域优商家信息部分开始 -->
				    <div id="partnerleft_top_box">
						<div id="partnerleft_top">
							<a href="#" class="partnertitle"><?php echo ($partnerInfo[0]['name']); ?></a><a href="#" class="otherstore" style="display:none">查看其他分店信息</a>
							<span class="rate_stars">
								<span style="width: <?php echo ($partner_rate[0]['rateValue']); ?>%;"></span>
							</span>
							<p><a href="#"><?php echo ($partner_rate[0]['rateCount']); ?></a>&nbsp条评论信息</p>
						</div>
						<div id="partnerleft_down_left">
							<p><span>地址：</span><?php echo ($location_desc); ?></p>
							<p><span>电话：</span><?php echo ($partnerInfo[0]['telephone']); ?></p>
							<p><span>营业时间：</span>10：00-22：30（ 周末、节假日不休）</p>
							<p class="tag_box">
								<span>标签：</span>
								<a target=_blank href="<?php echo U('Partner/partner','','','');?>/label_type/<?php echo ($partner_tags[0]['label_type']); ?>"><?php echo ($partner_tags[0]['pcat_name']); ?></a>
								<a target=_blank href="<?php echo U('Partner/partner','','','');?>/label_type/<?php echo ($partner_tags[0]['label_type']); ?>/cat_id/<?php echo ($partner_tags[0]['cat_id']); ?>"><?php echo ($partner_tags[0]['cat_name']); ?></a>
								<a target=_blank href="<?php echo U('Partner/partner','','','');?>/tag/<?php echo ($partner_tags[0]['belong']); ?>"><?php echo ($partner_tags[0]['belong']); ?></a>
							</p>
							<p class="tag_box2">
								<a target=_blank href="<?php echo U('Partner/partner','','','');?>/tag/<?php echo ($partner_tags[0]['belong']); ?>/location/<?php echo ($partner_tags[0]['location_id']); ?>"><?php echo ($partner_tags[0]['locationname']); ?></a>
							</p>
							<p><span>餐厅描述：</span>
								<p class="description" id="partner_desc_sort">
								<?php echo ($description); ?>
								<?php if (strlen($description) > 330) { echo "<a href='#' id='desc_out'>展开</a>"; } ?>
								</p>
								<p class="description" id="partner_desc_long" style="display:none;">
									<?php echo ($partnerInfo[0]['description']); ?><a href='#' id="desc_up">收起</a>
								</p>
							</p>
						</div>
						<div id="partnerleft_down_right">
							<a href=""><img src="__PUBLIC__/<?php echo ($partnerInfo[0]['header_path']); ?>" alt="gg" id="viewallpic_img"/></a>
							<p id="viewallpic_btn"><a href="" class="moreimg">查看全部<span><?php echo (count($partnerPictureInfo)); ?></span>张照片</a></p>
						</div>
					</div>
					<!-- 主要内容左边区域优商家信息部分结束 -->
					<!-- 主要内容左边区域优惠券信息部分开始 -->
					<div id="partnerleft_middle_box">
						<ul class="coupon_type_nav">
                        <?php if($get["off_time"] == 1): ?><li class=""><a href="<?php echo U('Partner/detail','','','');?>/pid/<?php echo ($partnerInfo[0]['partner_id']); ?>" class="">正在优惠</a></li>
							<li class="red"><a href="/index.php/partner/detail/pid/<?php echo ($partnerInfo[0]['partner_id']); ?>?off_time=1" class="red">过期优惠</a></li>
                        <?php else: ?>
							<li class="red"><a href="<?php echo U('Partner/detail','','','');?>/pid/<?php echo ($partnerInfo[0]['partner_id']); ?>" class="red">正在优惠</a></li>
							<li><a href="/index.php/partner/detail/pid/<?php echo ($partnerInfo[0]['partner_id']); ?>?off_time=1" class="normal">过期优惠</a></li><?php endif; ?>
						</ul>
						<div id="all_coupon_info">
                           <ul class="coupon_content clearfix">
                           		<?php if(is_array($partnerCouponInfo)): foreach($partnerCouponInfo as $k=>$partnercoupon): $i = $k%2; ?>
                           		<?php if($i == '0'): ?><li class="no_margin_left">
										<?php if($get["off_time"] == 1): ?><a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($partnercoupon["coupon_id"]); ?>" class="img_box"><img src="__PUBLIC__/<?php echo ($partnercoupon["header_path"]); ?>" alt="<?php echo ($partnercoupon["name"]); ?>"></a>
											<div class="one">已过期</div>
										<?php else: ?>
											<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($partnercoupon["coupon_id"]); ?>" class="img_box"><img src="__PUBLIC__/<?php echo ($partnercoupon["header_path"]); ?>" alt="<?php echo ($partnercoupon["name"]); ?>"></a><?php endif; ?>
										
										<?php if($get["off_time"] == 1): ?><a class="content_title" title="<?php echo ($partnercoupon["name"]); ?>"><?php echo ($partnercoupon["name"]); ?></a>
										<?php else: ?>
										<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($partnercoupon["coupon_id"]); ?>" class="content_title" title="<?php echo ($partnercoupon["name"]); ?>"><?php echo ($partnercoupon["name"]); ?></a><?php endif; ?>

										<p class="one" title="<?php echo ($partnercoupon["description"]); ?>"><?php echo ($partnercoupon["description"]); ?></p>
										<p class="two" title="<?php echo ($partnercoupon["title"]); ?>"><?php echo ($partnercoupon["title"]); ?></p>
										<p class="three">下载：<?php echo ($partnercoupon["download_times"]); ?>次</p>
										<?php if($get["off_time"] == 1): else: ?>
											<a href="" class="download" couponid="<?php echo ($partnercoupon["coupon_id"]); ?>">立即下载</a><?php endif; ?>
										

										<p class="hidden_location"><?php echo ($coupon["tag"]); ?></p>
									</li>
                           		<?php else: ?>
									<li class="no_margin_right">
										<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($partnercoupon["coupon_id"]); ?>" class="img_box"><img src="__PUBLIC__/<?php echo ($partnercoupon["header_path"]); ?>" alt="<?php echo ($partnercoupon["name"]); ?>"></a>
										<?php if($get["off_time"] == 1): ?><a class="content_title" title="<?php echo ($partnercoupon["name"]); ?>"><?php echo ($partnercoupon["name"]); ?></a>
										<?php else: ?>
										<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($partnercoupon["coupon_id"]); ?>" class="content_title" title="<?php echo ($partnercoupon["name"]); ?>"><?php echo ($partnercoupon["name"]); ?></a><?php endif; ?>
										<p class="one" title="<?php echo ($partnercoupon["description"]); ?>"><?php echo ($partnercoupon["description"]); ?></p>
										<p class="two" title="<?php echo ($partnercoupon["title"]); ?>"><?php echo ($partnercoupon["title"]); ?></p>
										<p class="three">下载：<?php echo ($partnercoupon["download_times"]); ?>次</p>

										<?php if($get["off_time"] == 1): else: ?>
										<a href="" class="download" couponid="<?php echo ($partnercoupon["coupon_id"]); ?>">立即下载</a><?php endif; ?>

										<p class="hidden_location"><?php echo ($coupon["tag"]); ?></p>
									</li><?php endif; endforeach; endif; ?>
                           </ul>
                        </div>  
					</div>
					<!-- 主要内容左边区域优惠券信息部分结束 -->
					<!-- 主要内容左边区域商家菜单部分开始 -->
					<div id="partnermenu">
						<p class="partner_menu_title">商家菜单</p>
						<div id="catlink">
							<ul class="clearfix">
								<li><a href="#">新品推荐</a></li>
								<li class="no_border_top"><a href="#">人气菜品</a></li>
								<li class="no_border_top"><a href="#">精品凉菜</a></li>
								<li class="no_border_top"><a href="#">海鲜</a></li>
								<li class="no_border_top"><a href="#">经典热菜</a></li>
								<li class="no_border_top"><a href="#">餐后甜点</a></li>
								<li class="no_border_top"><a href="#">酒水饮料</a></li>
							</ul>
						</div>
						<div id="menuinfo">
							<ul class="menuinfo_detail clearfix">
								<li>
									<a href="" class="img_box"><img src="__PUBLIC__/images/pic/ls_162_01.jpg" alt="" /></a>
									<a href="" class="title">Dish Name ￥99</a>
								</li>
								<li>
									<a href="" class="img_box"><img src="__PUBLIC__/images/pic/ls_162_01.jpg" alt="" /></a>
									<a href="" class="title">Dish Name ￥99</a>
								</li>
								<li>
									<a href="" class="img_box"><img src="__PUBLIC__/images/pic/ls_162_01.jpg" alt="" /></a>
									<a href="" class="title">Dish Name ￥99</a>
								</li>
								<li>
									<a href="" class="img_box"><img src="__PUBLIC__/images/pic/ls_162_01.jpg" alt="" /></a>
									<a href="" class="title">Dish Name ￥99</a>
								</li>
								<li>
									<a href="" class="img_box"><img src="__PUBLIC__/images/pic/ls_162_01.jpg" alt="" /></a>
									<a href="" class="title">Dish Name ￥99</a>
								</li>
								<li>
									<a href="" class="img_box"><img src="__PUBLIC__/images/pic/ls_162_01.jpg" alt="" /></a>
									<a href="" class="title">Dish Name ￥99</a>
								</li>
								<li>
									<a href="" class="img_box"><img src="__PUBLIC__/images/pic/ls_162_01.jpg" alt="" /></a>
									<a href="" class="title">Dish Name ￥99</a>
								</li>
								<li>
									<a href="" class="img_box"><img src="__PUBLIC__/images/pic/ls_162_01.jpg" alt="" /></a>
									<a href="" class="title">Dish Name ￥99</a>
								</li>
							</ul>
						</div>
						 <div style="clear:both"></div>
					</div>
					<!-- 主要内容左边区域商家菜单部分结束 -->
					<!-- 主要内容左边区域评论部分开始 -->
					<div id="alleva_box">
					    <div id="alleva_top_box">
							<p class="alleva_top_title">全部评价</p>
							<div id="select_p">
								<ul class="clearfix">
									<li><a href="#">默认</a></li>
									<li><a href="#" class="no_border_right">时间</a></li>
									<li><a href="#" class="no_border_right">评分</a></li>
								</ul>		
							</div>
						</div>
						<div class="evacontent_box">
							<?php if(is_array($partnerComments)): foreach($partnerComments as $k=>$partnerComment): ?><div class="evacontent">
								<div class="evacontent_top">
									<a class="username" href="#"><?php echo ($partnerComment["nickname"]); ?>**<?php echo ($partnerComment["createtime"]); ?></a>
									<span class="eva_rate_stars">
										<?php  $rate = $partnerComment['rate']*20; ?>
										<span style="width: <?php echo ($rate); ?>%;"></span>
									</span>
								</div>
								<p class="comment_desc"><?php echo ($partnerComment["evaluation"]); ?></p>
								<p class="storename"><?php echo ($partnerComment["couponname"]); ?>(<?php echo ($partnerComment["coupontitle"]); ?>)</p>
							</div><?php endforeach; endif; ?>
						</div>
						<ul class="page_box clearfix">
							<li class="one"><a href="<?php echo U('Partner/detail',array('pid'=>$partnerInfo[0]['partner_id'],'page'=>1),'','');?>" class="one">首页</a></li>
							<li><a href=""><</a></li>
							
							<?php $__FOR_START_9817__=1;$__FOR_END_9817__=$pageNums+1;for($i=$__FOR_START_9817__;$i < $__FOR_END_9817__;$i+=1){ if($i == $get_info): ?><li><a href="<?php echo U('Partner/detail',array('pid'=>$partnerInfo[0]['partner_id'],'page'=>$i),'','');?>" class="red"><?php echo ($i); ?></a></li>
								<?php else: ?>
									<li><a href="<?php echo U('Partner/detail',array('pid'=>$partnerInfo[0]['partner_id'],'page'=>$i),'','');?>"><?php echo ($i); ?></a></li><?php endif; } ?>

							<li><a href="">></a></li>
							<li class="one"><a href="<?php echo U('Partner/detail',array('pid'=>$partnerInfo[0]['partner_id'],'page'=>$pageNums),'','');?>" class="one">尾页</a></li>
						</ul>
					</div>
					<!-- 主要内容左边区域评论部分结束 -->
				</div>
				<!--左边部分内容结束-->
				<!-- 主要内容右边区域开始 -->
				<div id="partnerright">
					<div id="storemap">
						<div id="view_map"></div>
						<a href="" class="viewfullmap" id="viewfullmap">查看完整地图</a>
						<p class="partnerlocation"><?php echo trim($location_desc,'.'); ?></p>
					</div>

					<div id="hidden_detail_map">
						<div class="title_box">
							<p>查看全图</p>
							<a href="" class="close" id="close_box"></a>
						</div>
						<div class="detail_map_box" id="detail_map_box"></div>
				 	</div>

					<div class="nearcoupon">
					    <p class="title">热门优惠券推荐</p>
					    <?php if(is_array($hot_coupons)): foreach($hot_coupons as $k=>$hot_coupon): ?><div id="nearcoupon_detail_contents">
							<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hot_coupon["coupon_id"]); ?>" class="c_title"><?php echo ($hot_coupon["name"]); ?>}</a>
							<p class="c_desc"><?php echo ($hot_coupon["description"]); ?></p>
							<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hot_coupon["coupon_id"]); ?>"><img src="__PUBLIC__/<?php echo ($hot_coupon["header_path"]); ?>" align="优惠券" /></a>
						</div><?php endforeach; endif; ?>	
				    </div>
				    
				 </div>
			</div>
			<div id="view_partner_pics_hidden_box">
			
			   <a href="" class="closed" id="closed_btn">关闭</a>
			   <?php if(is_array($partnerPictureInfo)): foreach($partnerPictureInfo as $k=>$partnerPicture): ?><img class="content" src="__PUBLIC__/<?php echo ($partnerPicture["picture_path"]); ?>" alt="" /><?php endforeach; endif; ?>
			   <div class="bottom_box">
			   		<!-- <a href="http://www.huigl.com" class="index_link">惠校园</a> -->
			   		<img src="__PUBLIC__/images/news_n.jpg" alt="" class="p_bg"/>
			   		<a href="" class="prev" id="prev_btn" num="">PREV</a>
			   		<img src="__PUBLIC__/images/news_p.jpg" alt="" class="n_bg"/>
			   		<a href="" class="next" id="next_btn" num="">NEXT</a>
			   </div>
			</div>
				<a id="partner_hidden" style="display:none" value="<?php echo ($partner); ?>"><?php echo ($partner); ?></a>
				<a id="partner_pic_hidden" style="display:none" value="<?php echo ($partnerPicture); ?>"><?php echo ($partnerPicture); ?></a>
				<div id="download_coupon_hidden_box">	
	<div class="top_content_box">
		<p id="coupon_id_value">短信优惠券下载</p>
		<img src="__PUBLIC__/images/login_closed.png" id="closed_download_coupon_hidden_box" alt="关闭">
	</div>
	<div class="middle_content_box">
		<ul>
			<li>
				<p class="label">请输入手机号码</p>
				<input type="text" name="send_to_phone" id="send_to_phone" />
				<p class="hidden_error_tips" id="hidden_error_tips_phone"></p>
			</li>
			<li>
				<p class="label">验证码</p>
				<input type="text" name="cellphone_vcode" id="cellphone_vcode" class="shorter" />
				<a href="" id="send_to_phone_vcode_not_clear">看不清</a>
				<img src="<?php echo U("Home/User/verifyImg","","","");?>" alt="验证码">
				<p class="hidden_error_tips" id="hidden_error_tips_vcode"></p>
			</li>
		</ul>
		<input type="submit" value="发送" name="download_coupon_submit_btn" id="download_coupon_submit_btn">
	</div>
	<div class="middle_content_box_success">
		<div>
			<img src="__PUBLIC__/images/regsucess.png" alt="短息发送成功" />
			<p class="sucess_tip">短信已经成功发送至<span></span></p>
			<p class="hot_tip">系统繁忙时会有3-5分钟的发送延迟，请不要在短时间内重复下载</p>
		</div>
		<a href="" id="close_middle_content_box_success">关闭</a>
	</div>
</div>
				<!-- 最底部区域 -->
				<div id="bottom_info">
		<div id="bottom_box">
			<ul>
				<li><a href="<?php echo U("About/about");?>">关于我们</a></li>
				<li><a href="<?php echo U("Sitemap/sitemap");?>">网站地图</a></li>
				<li><a href="<?php echo U("Contactus/contactus");?>">联系我们</a></li>
				<li><a href="<?php echo U("Intention/intention");?>">商务合作</a></li>
				<li><a href="<?php echo U("Legalstatement/legalstatement");?>">法律声明</a></li>
				<li><a href="<?php echo U("Eula/eula");?>" class="no_border_right">用户协议</a></li>
			</ul>
			<div class="detail_box">
				<!-- <p class="one">版权归惠校园所有，未经书面授权禁止复制或建立镜像。 Email：<a href="mailto:huigl@outlook.com">service@huigl.com</a></p>
				<p class="two">惠校园网客服电话：（0773）8993520</p>
				<p class="three">地址：桂林市高新区桂磨大道互联网产业基地503室</p>
				<p class="four">经营许可证：桂ICP备 14000606号</p> -->
				<p class="one">
					<span>桂ICP备 14000606号</span><span class="padding_left">地址：桂林市高新区桂磨大道互联网产业基地503室</span><span class="padding_left">客服电话：（0773）8993520</span><span class="padding_left">邮箱:<a href="mailto:huigl@outlook.com">service@huixiaoyuan.com</a></span>
				</p>
				<p class="two">
					<span>Copyright @ 2014 Huixiaoyuan.com Inc.All Rights Reserved</span>
				</p>
			</div>
		</div>
</div>
				<!-- 最底部区域结束 -->
          
		<script type="text/javascript">
			
		   	  var partner_info = $('#partner_hidden').text();

			  var partner = jQuery.parseJSON(partner_info);
			  var mapBoxDetailId = "detail_map_box";
			  var mapBoxFullId = "view_map"; 
			    
		</script>
	</body>
</html>