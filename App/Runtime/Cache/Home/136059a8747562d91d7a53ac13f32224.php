<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 a//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb="http://open.weibo.com/wb">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="惠校园,huigl,优惠,优惠券,吃喝玩乐,惠享生活,折扣,划算,便宜,打折"> <!-- 向搜索引擎说明你的网页的关键词； --> 
<meta name="description" content=" 惠校园网- 桂林最早，口碑最好的网络优惠平台！超省钱巨划算！惠校园网为您精选自助餐、电影票、KTV、美发、足浴特色商家，享尽无敌优惠"> <!-- 告诉搜索引擎你的站点的主要内容；  -->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/global.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/detail.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/M_sendCouponToCellphone.css">
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/bPopup.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/header.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/detail.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/config.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/M_sendCouponToCellphone.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
<script type="text/javascript" src="__PUBLIC__/js/baidumap.js"></script>
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="__PUBLIC__/js/M_countDownForSpecicalCoupon.js"></script>


<title><?php echo ($coupon["name"]); ?> | 惠校园</title>
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
							<li><a href="http://weibo.com/huixy" class="weibo">惠校园新浪微博</a></li>
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
		<div class="bottom_box"></div>
		
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
				<input type="submit" name="email_reg_btn" tag="1" id="email_reg_btn" value="注册" />
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
				<input type="submit" name="cellphone_reg_btn" tag="1" id="cellphone_reg_btn" value="注册"/>
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
			<input type="hidden" id="login_hidebox05" value="<?php echo U("Home/Login/verify");?>" tag="1" />
	</div>
	<div id="u_bottom_box" style="display:none">
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
<!-- 内容区域 -->
	<div id="main">
		<div id="sub_nav_box">
			<div class="content_box">
				<a href="/" class="one">桂林优惠</a><span>></span><a href="/index.php/Coupon/coupon?label_type=<?php echo ($coupon["label_type"]); ?>"><?php echo ($label_info); ?></a><span>></span><a href="/index.php/Coupon/coupon?cat_id=<?php echo ($cat_info["cat_id"]); ?>"><?php echo ($cat_info["cat_name"]); ?></a><span>></span><a href="" class="gray"><?php echo ($coupon["name"]); ?></a>
			</div>
		</div>
		<div id="coupon_box">
			<div class="coupon_detail_info_box">
				<div class="effective_date_box">
					<p class="effective_date">优惠券有效期： <?php echo ($coupon["start_time"]); ?> - <?php echo ($coupon["end_time"]); ?></p>
					<p class="download_number">下载次数：<span><?php echo ($coupon["download_times"]); ?></span></p>
				</div>
				<div class="coupon_desc_box">
					<p class="coupon_title"><?php echo ($coupon["name"]); ?><!-- <span><?php echo ($coupon["title"]); ?></span> --></p>
					<?php if(($coupon['Countdown_label'] == 1) AND ($coupon['coupon_type'] == 2)): ?><p class="coupon_count">即将上线:<span id="countdown_day_<?php echo ($k); ?>"><?php echo ($coupon['Countdown_time']['day']); ?></span>天<span id="countdown_hour_<?php echo ($k); ?>"><?php echo ($coupon['Countdown_time']['hour']); ?></span>时<span id="countdown_min_<?php echo ($k); ?>"><?php echo ($coupon['Countdown_time']['min']); ?></span>分<span id="countdown_sec_<?php echo ($k); ?>"><?php echo ($coupon['Countdown_time']['sec']); ?></span>秒</p>

					<?php elseif(($coupon['left_times'] == 0) AND ($coupon['coupon_type'] == 2)): ?>
						<p class="coupon_count">已经卖光啦，下次早点哦！</p>
					<?php else: ?>
						<?php if(($_SESSION['user']['user_id']== '') AND ($coupon['coupon_type'] == 2)): ?><p class="coupon_count">抢购之前需要先登录哦！</p>
						<?php elseif($coupon['coupon_type'] == 2): ?>
							<p class="coupon_count">限量抢购中，还剩<span><?php echo ($coupon["left_times"]); ?></span>份</p>
						<?php else: endif; endif; ?>
					<p class="coupon_description"><?php echo ($coupon["description"]); ?></p>
				</div>
				<?php if(($coupon['Countdown_label'] == 1) AND ($coupon['coupon_type'] == 2) OR ($coupon['left_times'] == 0)): else: ?>
				    <?php if(($_SESSION['user']['user_id']== '') AND ($coupon['coupon_type'] == 2)): ?><a href="<?php echo U("Coupon/printCoupon","","","");?>/<?php echo ($coupon["coupon_id"]); ?>" class="print_coupon_btn">打印此优惠券</a>
						<a class="download_coupon_btn" tag="0" id="download_coupon_btn" couponid="<?php echo ($coupon["coupon_id"]); ?>">下载到手机</a>
				    <?php else: ?>
						<a href="<?php echo U("Coupon/printCoupon","","","");?>/<?php echo ($coupon["coupon_id"]); ?>" class="print_coupon_btn">打印此优惠券</a>
						<a class="download_coupon_btn" tag="1" id="download_coupon_btn" couponid="<?php echo ($coupon["coupon_id"]); ?>">下载到手机</a><?php endif; endif; ?>


				
				<img src="__PUBLIC__/<?php echo ($coupon["picture_path"]); ?>" class="coupon_pic" alt="<?php echo ($coupon["name"]); ?>">
				<?php if(($coupon['download_times'] == $coupon['limit_times']) AND ($coupon['download_times'] != '0') AND ($coupon['limit_times'] != '0')): ?><div class="sellAll"><img src="__PUBLIC__/images/sell_all.png" alt="抢光啦"></div><?php endif; ?>
				<div class="coupon_detail_desc_box">
					<p class="desc_title">详细介绍</p>
					<p class="desc_content"><span><?php echo ($coupon["message"]); ?></span></p>
					<div>
						<p>使用须知</p>
						<p>有效期：<span><?php echo ($coupon["start_time"]); ?>——<?php echo ($coupon["end_time"]); ?></span></p>
						<p>不可用日期：<span><?php echo ($coupon["exception_time"]); ?></span></p>
						<p>使用时间：<span><?php echo ($coupon["use_time"]); ?></span></p>
						<p>预约提醒：
                        <span>
                        <?php if($coupon["need_booking"] == 1): ?>需要预约
                        <?php else: ?>
                        无需预约<?php endif; ?>
                        </span>
                        </p>
						<p>使用规则：</p>
						<ul>
                        <?php echo ($use_rule); ?>
						</ul>
					</div>
				</div>
				<?php if(($coupon['Countdown_label'] == 1) AND ($coupon['coupon_type'] == 2) OR ($coupon['left_times'] == 0)): else: ?>
				    <?php if(($_SESSION['user']['user_id']== '') AND ($coupon['coupon_type'] == 2)): ?><a href="<?php echo U("Coupon/printCoupon","","","");?>/<?php echo ($coupon["coupon_id"]); ?>" class="print_coupon_btn print_coupon_btn2">打印此优惠券</a>
					    <a href="javascript:void(0);" class="download_coupon_btn download_coupon_btn2" id="download_coupon_btn_two" couponid="<?php echo ($coupon["coupon_id"]); ?>" tag="0">下载到手机</a>
				    <?php else: ?>
						<a href="<?php echo U("Coupon/printCoupon","","","");?>/<?php echo ($coupon["coupon_id"]); ?>" class="print_coupon_btn print_coupon_btn2">打印此优惠券</a>
					    <a href="javascript:void(0);" class="download_coupon_btn download_coupon_btn2" id="download_coupon_btn_two" couponid="<?php echo ($coupon["coupon_id"]); ?>" tag="1">下载到手机</a><?php endif; endif; ?>

				<a id="download_coupon_id" style="visibility:hidden" couponid="<?php echo ($coupon["coupon_id"]); ?>"><?php echo ($coupon["coupon_id"]); ?></a>
			</div>
			<div class="share">
				<a href="javascript:void(0)" class="add_favorite" id="add_favorite_btn">收藏到我的券包</a>
				<input type="hidden" id="checklogin" value="<?php echo ($_SESSION['user']['nickname']); ?>" />
				<p>分享到</p>
				<ul>
					<!-- <li><a href="" class="one"></a></li> -->
				<!-- 	<li><a href="" class="two"></a></li> -->
				<!-- 	<li><a href="" class="three"></a></li>
					<li><a href="" class="four"></a></li>
					<li><a href="" class="five"></a></li>
					<li><a href="" class="six"></a></li> -->


					<li><wb:share-button addition="simple" type="icon" ralateUid="3977849998" default_text="<?php echo ($coupon["name"]); ?> <?php echo ($coupon["title"]); ?>" pic="http://www.huigl.com/Public/<?php echo ($coupon["picture_path"]); ?>||http://www.huigl.com/Public/<?php echo ($coupon["header_path"]); ?>"></wb:share-button></li>
				</ul>
			</div>
			<div class="other_coupons_box">
				<p class="other_coupon_title">本商户其他优惠券</p>
                <?php if(is_array($other_coupon)): foreach($other_coupon as $key=>$ocoupon): ?><p class="other_coupon_content"><a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($ocoupon["coupon_id"]); ?>" class="other_coupon_title" target="_blank"><?php echo ($ocoupon["name"]); ?></a><a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($ocoupon["coupon_id"]); ?>" class="other_coupon_description" target="_blank">：<?php echo ($ocoupon["description"]); ?></a></p><?php endforeach; endif; ?>
			</div>
			<div class="business_detail_info_box">
				<ul class="business_nav clearfix" id="business_nav">
					<li class="no_bottom_border"><a href="#back_business_location" >商家位置</a></li>
					<li><a href="#back_business_intro">商家介绍</a></li>
					<li><a href="#back_comment_performance">评价晒单</a></li>
				</ul>
				<!-- 隐藏商家导航菜单 -->
				<ul class="jquery_business_nav clearfix" id="jquery_business_nav">
				    <a name="business_nav"></a>
					<li class="no_bottom_border"><a href="">商家位置</a></li>
					<li><a href="">商家介绍</a></li>
					<li><a href="">评价晒单</a></li>
				</ul>

				<div class="business_location">
					<p class="title">商家位置<a name="back_business_location" id="business_location"></a></p>
					<div class="map_box">
						<div class="map" id="map">
						</div>
						<div class="view_map">
							<a id="view_full_map">查看完整地图</a>
						</div>
						<div id="hidden_detail_map">
							<div class="title_box">
								<p>查看全图</p>
								<a></a>
							</div>
							<div class="detail_map_box" id="detail_map_box"></div>
						</div>
						<ul>
							<li class="white">
								<a href="<?php echo U('Partner/detail','','','');?>/pid/<?php echo ($partner["partner_id"]); ?>" class="address_title"><?php echo ($partner["name"]); ?></a>
								<div>
									<p class="subway"></p>
									<p class="telephone">电话：<?php echo ($partner["telephone"]); ?></p>
									<p class="address">地址：<?php echo ($partner["location_desc"]); ?></p>
								</div>
							</li>
							<a href="" class="summary_number">查看全部分店(共1家)</a>
						</ul>
					</div>
				</div>
				<div class="business_intro">
					<p class="title">商家介绍<a name="back_business_intro" id="business_intro"></p>
					<p class="business_name"><?php echo ($partner["name"]); ?></p>
					<p class="business_intro_detail"><?php echo ($partner["description"]); ?></p>
					 <?php if(is_array($partnerPictures)): foreach($partnerPictures as $key=>$partnerPicture): ?><p class="business_img"><img src="__PUBLIC__/<?php echo ($partnerPicture["picture_path"]); ?>" alt="商家介绍" /></p><?php endforeach; endif; ?>
					

				</div>
				<a name="back_comment_performance" id="comment_performance"></a>
				<div class="show_comment">
					<div class="comment_performance">
						<p class="title">晒单点评</p>
						<ul>
							<li>
								
								<p class="three"><?php echo ($rateInfo[1]); ?><span>分</span></p>
								<span class="rate_stars">
									<span style="width: <?php echo ($rateInfo[0]); ?>"></span>
								</span>
							</li>
							<li>
								<p class="one">已有<span><?php echo ($rateInfo[2]); ?></span>人对本优惠券做出评价</p>
								<p class="two"><span><?php echo ($rateInfo[0]); ?></span>的会员满意本优惠券</p>
							</li>
							<li class="no_border_right">
								<p>我在惠校园下载过此优惠券</p>
								<?php if($_SESSION['user']['user_id']== ''): else: ?>
								<a href="<?php echo U('Home/Account/mytocomment');?>">我要评论</a><?php endif; ?>

							</li>
						</ul>
					</div>
					<div class="all_comment">
						<div>	
							<p>全部评论</p>
							<ul>
								<li><a href="">默认</a></li>
								<li><a href="">评分</a></li>
							</ul>
						</div>
						<ul class="comment_ul">
                        <?php if(is_array($evaluation)): foreach($evaluation as $key=>$eva): $rate_vaule = $eva['rate']; $rate_vaule = $rate_vaule*20; ?>
							<li>
								<p class="one"><?php echo ($eva["nickname"]); ?><a class="red">@<?php echo ($partner["name"]); ?></a><span><?php echo ($eva["createtime"]); ?></span><span class="rate_stars"><span style="width: <?php echo ($rate_vaule); ?>%;"></span></span></p>
								<p class="two"><?php echo ($eva["evaluation"]); ?></p>
								
							</li><?php endforeach; endif; ?>
						</ul>
						<!-- <ul class="page_box clearfix">
							<li><a href="" class="one">首页</a></li>
							<li><a href=""><</a></li>
							<li><a href="" class="red">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">></a></li>
							<li><a href="" class="one">尾页</a></li>
						</ul> -->
						<div class="page_div">
							<ul class="clearfix page_box">
								<?php echo ($show["first"]); echo ($show["upPage"]); if(is_array($linkPage)): foreach($linkPage as $key=>$lp): ?><li><?php echo ($lp); ?></li><?php endforeach; endif; echo ($show["downPage"]); echo ($show["end"]); ?>
							</ul>
						</div>
					</div>	
				</div>
			</div>
			<div id="webchat_box">
				<p>扫一下，关注惠校园微博</p>
				<img src="__PUBLIC__/images/weibo_barcode.png" alt="微博icon">
			</div>
			<div id="hot_tips_box">
				<p class="title">温馨提示</p>
				<ul>
					<li>未注册用户每天只能下载相同优惠券2条；</li>
					<li>未注册用户累计只能下载5条优惠券；</li>
					<li>未注册用户不能下载限时优惠券；</li>
					<li>注册用户无以上限制，可自由下载和使用优惠券。</li>
				</ul>
			</div>
		</div>
        <a id="partner_hidden" style="visibility:hidden" value="<?php echo ($partnerInfo); ?>"><?php echo ($partnerInfo); ?></a>
		
	</div>
<!-- 内容区域结束 -->
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
					<span class="cnzz"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1000372030'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s22.cnzz.com/z_stat.php%3Fid%3D1000372030%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script></span>
				</p>

			</div>
		</div>
</div>
<!-- 最底部区域结束 -->
	<script type="text/javascript">
	   	var partner_info = $('#partner_hidden').text();
		var partner = jQuery.parseJSON(partner_info);
		var mapBoxDetailId = "detail_map_box";
		var mapBoxFullId = "map";	    
	</script>
	<script type="text/javascript">
	var ps = $('#main #coupon_box div.coupon_detail_info_box div.coupon_desc_box p.coupon_count');
	for(var i =0;i<ps.length;i++){
		var p = ps[i].children;
		var dayid;
		var hourid;
		var minid;
		var secid;
		for(var j =0;j<p.length;j++){
			if(j == 0){
				dayid = p[j].id;
			}else if(j == 1){
				hourid = p[j].id;
			}else if(j == 2){
				minid = p[j].id;
			}else if(j == 3){
				secid = p[j].id;
			}
		}
		Test(dayid,hourid,minid,secid);
	}
</script>
</body>

</html>