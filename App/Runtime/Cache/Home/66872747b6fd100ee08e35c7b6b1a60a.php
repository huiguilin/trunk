<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 a//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/global.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/account_tmp.css">
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/bPopup.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery-placeholder.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/modernizr-2.6.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/header.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/account.js"></script>
<!--[if IE 6]>
<!--背景图片透明方法-->
<script src="__PUBLIC__/js/iepng.js" type="text/javascript"></script>
<!--插入图片透明方法-->
<script type="text/javascript">
   EvPNG.fix('div, ul, img, li, input');  //EvPNG.fix('包含透明PNG图片的标签'); 多个标签之间用英文逗号隔开。
  
</script>
<!-- <![endif]-->

<title>我的惠桂林-我的评论</title>
</head>
<body>
<!-- 顶部订阅分享区域+Logo区域 -->
	<!-- 顶部订阅分享区域 --> 
	<div id="top_rss">
		<div id="top_rss_box">
			<img src="__PUBLIC__/images/cellphone.png">
			<ul class="left_ul">
				<li class="one"><a id="cellphone_version">手机版</a></li>
				<li class="two"><a href="<?php echo U("Help/help");?>">使用帮助</a></li>
			</ul>
			<ul class="right_ul">
				<li id="subscription_li">
					<a href="#" id="subscription">订阅</a>
				</li>
				<li id="share_li"><a id="share" href="" class="one">关注</a></li>
			</ul>
			<div id="subscription_box">
				<form>
					<input type="text" id="subscription_email_textbox" value="" name="subscription_email_textbox"/>
					<input type="submit" value="订阅" name="subscription_email_btn" id="subscription_email_btn">
				</form>
			</div>
			<div id="share_box">
				<ul>
					<li><a href="http://www.baidu.com" class="weibo">惠桂林新浪微博</a></li>
					<li><a href="http://www.baidu.com" class="qzone">惠桂林QQ空间</a></li>
					<li><a href="http://www.baidu.com" class="renren">惠桂林人人主页</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="cellphone_version_box">
		<p class="one">惠桂林手机客户端</p>	
		<p class="two">吃喝玩乐，惠享生活！</p>
		<a class="iphone" href="">iPhone</a>
		<a class="android" href="">Android</a>
		<a class="wp" href="">WP/Win8</a>
		<p class="version_comment_title">版本说明:</p>
		<p class="version_comment_content">该版本支持ios5.0、Android 2.1、WindowsPhone8及以上系统.</p>
		<div id="app_closed_box">
			<a class="app_closed"><img src="__PUBLIC__/images/login_closed.png"></a>
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
			<img src="__PUBLIC__/images/ico_15.png">
			<ul>
				<li>
					<p><span>方法一：</span><a href="">去AppStore下载</a></p>
				</li>
				<li>
					<p><span>方法二：</span>用手机在AppStore中搜索"惠桂林"下载</p>
				</li>
				<li class="one">
					<p><span>方法三：</span>手机扫描二维码下载</p>
					<img src="__PUBLIC__/images/barcode.png">
					<p class="four">（或手机浏览器输入<a href="" >http://dpurl.cn/KjG下载）</a></p>
				</li>
			</ul>
		</div>
		<div id="android_box">
			<img src="__PUBLIC__/images/ico_16.png">
			<ul>
				<li>
					<p><span>方法一：</span><a href="">下载安装包</a></p>
				</li>
				<li>
					<p><span>方法二：</span>在Android Market中搜索"惠桂林"下载</p>
				</li>
				<li class="one">
					<p><span>方法三：</span>手机扫描二维码下载</p>
					<img src="__PUBLIC__/images/barcode.png">
					<p class="four">（或手机浏览器输入<a href="" >http://dpurl.cn/KjG下载）</a></p>
				</li>
			</ul>
		</div>
		<div id="wp_box">
			<img src="__PUBLIC__/images/ico_17.png">
			<ul>
				<li>
					<p><span>方法一：</span><a href="">下载安装包</a></p>
				</li>
				<li>
					<p><span>方法二：</span>在Windows Market中搜索"惠桂林"下载</p>
				</li>
				<li class="one">
					<p><span>方法三：</span>手机扫描二维码下载</p>
					<img src="__PUBLIC__/images/barcode.png">
					<p class="four">（或手机浏览器输入<a href="" >http://dpurl.cn/KjG下载）</a></p>
				</li>
			</ul>
		</div>
	</div>
<!-- 顶部订阅分享区域结束 -->
<!-- Logo区域 -->
	<div id="top_logo_box">
		<a href="<?php echo U("Index/index");?>"><img src="__PUBLIC__/images/logo.png" alt="惠桂林" id="logo" /></a>
		<a href="<?php echo U("Index/index");?>"><img src="__PUBLIC__/images/slogan.png" alt="吃喝玩乐，惠享生活" id="slogan" /></a>
		<ul id="login">
			<li class="one"><a class="one" id="Userlogin">登录</a></li>
			<li><a class="two" id="Userreg">快速注册</a></li>
		</ul>
		<div id="Userreg_box">
			<div id="u_top">
				<a id="a_closed2"><img src="__PUBLIC__/images/login_closed.png"></a>
				<p>用户注册</p>
			</div>
			<div id="u_bottom">
				<ul>
					<li class="one"><a href="" class="one" id="email_reg">邮箱注册</a></li>
					<li><a href="" id="cellphone_reg">手机注册</a></li>
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
						<img src="<?php echo U("Home/Login/verifyImg");?>" class="one">
						<input type="checkbox" name="license" class="six" checked="true">
						<p class="six">
							我已阅读并同意<a href="<?php echo U("Eula/eula");?>"><<惠桂林用户条款>>.</a>
						</p>
						<input type="submit" name="email_reg_btn" id="email_reg_btn" value="注册" />
						<p class="seven">已经是惠桂林的用户？点击<a href="" id="login_now">登录.</a></p>
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
						<input type="text" name="email" class="one"/>
						<a href="" id="sendcode">点击发送验证码</a>
						<p class="seven">验证码</p>
						<input type="text" name="vcode" class="six"/>
						<p class="two">密码</p>
						<input type="password" name="pwd" class="two"/>
						<ul>
							<li>弱</li>
							<li>中</li>
							<li>强</li>
						</ul>	
						<p class="three">确认密码</p>
						<input type="password" name="pwd2" class="three"/>
						<p class="four">昵称</p>
						<input type="text" name="nickname" class="four"/>
						<input type="checkbox" name="license" class="five">
						<p class="five">
							我已阅读并同意<a href=""><<惠桂林用户条款>>.</a>
						</p>
						<input type="submit" name="cellphone_reg_btn" id="cellphone_reg_btn" value="注册"/>
						<p class="eight" id="reg_hidebox01">用于登录和找回密码，不会公开</p>
						<p class="nine" id="reg_hidebox02">请输入手机收到的短信验证码</p>
						<p class="ten" id="reg_hidebox03">密码由6-32位的字母、数字或符号组成</p>
						<p class="eleven" id="reg_hidebox04">请再次输入密码</p>
						<p class="twelve" id="reg_hidebox05">昵称由1-16位的汉字、英文字母或数字组成</p> 
					</form>
				</div>	
			</div>
			<div id="UserregSuccess_email">
				<div id="tips_box">
					<img src="__PUBLIC__/images/regsucess.png">
					<p class="one">注册成功并已登录惠桂林网！</p>
					<p class="two">您可以关闭此窗口回到原来的页面，或者点击 <a href="" id="return_page">返回原来页面</a> 或去 <a href="<?php echo U("Index/index");?>">惠桂林网首页</a></p>
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
					<p class="one">注册成功并已登录惠桂林网！</p>
					<p class="two">您可以关闭此窗口回到原来的页面，或者点击 <a href="" id="return_page2">返回原来页面</a> 或去 <a href="<?php echo U("Index/index");?>">惠桂林网首页</a></p>
				</div>
				<p class="count">如果没有选择，页面将在<span>10秒</span>后自动关闭此窗口。</p>
			</div>
		</div>
		<div id="Userlogin_box">
			<div id="u_top_box">
				<a id="a_closed"><img src="__PUBLIC__/images/login_closed.png"></a>
				<p>用户登录</p>
			</div>
			<div id="u_middle_box">
				<form>
					<p class="one">账号</p>
					<input type="text" name="username" class="one" />
					<p class="two">密码</p>
					<input type="password" name="password" class="two"/>
					<p class="three">验证码</p>
					<input type="textbox" name="vcode" class="three"/>
					<a href="" id="vcode_not_clear">看不清</a>
					<img src="<?php echo U("Home/Login/verifyImg");?>" id="vcode_img">
					<a href="" id="forgetpwd">忘记密码?</a>
					<input type="checkbox" name="rememberpwd" class="four">
					<p class="four">记住密码</p>
					<input type="checkbox" name="autologin" class="five">
					<p class="five">下次自动登录</p>
					<input type="submit" name="btn_login" id="btn_login" value="登录" disabled="disabled"/>
					<p class="six">还没有账户？<a href="" id="reg_now">立即注册</a></p>
					<p class="seven" id="login_hidebox01">请输入邮箱/手机号</p>
					<p class="eight" id="login_hidebox02">请输入密码</p>
					<p class="nine" id="login_hidebox03">请输入验证码</p>
					<p class="ten" id="login_hidebox04">用户名或密码有误，请重新输入</p>
					<input type="hidden" id="login_hidebox05" value="<?php echo U("Home/Login/verify");?>" />
				</form>
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
						<img src="__PUBLIC__/images/forget_cellphone.png">
						<p class="one">绑定手机号<span>用户只能通过手机号找回</span></p>
						<p class="two">请输入您绑定的手机号，找回密码：</p>
						<form>
							<input type="text" name="cellphone_no" class="one" id="cellphone_no"/>
							<a href="" id="cellphone_send_btn">发送</a>
						</form>
						<p id="forgetpwd_hidebox01"></p>
					</li>
					<li>
						<img src="__PUBLIC__/images/forget_email.png">
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
		</div>
	</div>
<!-- Logo区域结束 -->

<!-- 顶部订阅分享区域+Logo区域结束 -->
<!--  导航区域 -->
	<!--  导航区域 -->
	<div id="top_nav">
		<div id="top_nav_box">
			<div id="left_collection">
				<img class="left_img" src="__PUBLIC__/images/classification/menu.png" alt="" />
				<span>全部分类</span>
			</div>
			<ul id="nav">
				<li><a href="<?php echo U("Index/index");?>">首页</a></li>
				<li><a href="<?php echo U("Coupon/coupon");?>">优惠券</a></li>
				<li><a href="<?php echo U("Card/card");?>">会员卡</a></li>
				<li class="border_right "><a href="">商户</a></li>
			</ul>
			<form id="search_box">
				<input id="search_con" type="text" placeholder="桂林环球美食节" name="search_con"/>
				<input id="search_btn" type="submit" value="" name="search_btn"/>
			</form>
		</div>
	</div>
<!-- 导航区域结束-->
<!-- 导航区域结束-->
<!-- 内容区域 -->
	<div id="main">
		<div id="left_content_box">
			<div class="mycontent_box">
				<p class="title">我的惠桂林</p>
				<ul class="my_classification clearfix">
					<li><a href="<?php echo U("Home/Account/mycoupon");?>" class="one">我的券包</a></li>
					<li><a href="<?php echo U("Home/Account/mytocomment");?>" class="two">我的评论</a></li>
					<li><a href="<?php echo U("Home/Account/myfavorite");?>" class="three">我的收藏</a></li>
					<li><a href="<?php echo U("Home/Account/mysetting");?>" class="four">个人信息设置</a></li>
					<li><a href="<?php echo U("Home/Account/mysubscription");?>" class="five">邮件订阅</a></li>
				</ul>
			
		

<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/mycommented.css" />
	<ul class="expire_filter_box">
		<li><a href="<?php echo U('Home/Account/mytocomment');?>" >待评价</a></li>
		<li><a href="<?php echo U('Home/Account/mycommented');?>" class="hover">已评价</a></li>
	</ul>
	<ul class="mycomment_show_box clearfix">
		<li>
			<form method="post" action="<?php echo U("Home/Account/handlePostCouponComment");?>">
				<div class="display_content_box">
					<img src="__PUBLIC__/images/pic/1.png" class="thumb">
					<p class="coupon_title">江上人家(中山路37号店） 10元优惠券</p>
					<p class="coupon_question">你为本优惠券打多少分？</p>
					<p class="myrate">我的总体评价:</p>
					<p class="rate_star">
						<span ></span>
						<span ></span>
						<span ></span>
						<span ></span>
						<span ></span>
					</p>
					<p class="finish_comment_content">不错，分量不是很多，味道不错</p>
					<p class="modify_comment">修改评论</p>
					<input type="hidden" name="ratevalue" value="1"> 
				</div>
				<div class="hidden_content_box">
					<p class="comment_desc">说说本优惠券的“亮点”与“不足”吧，您的评价将是其他会员非常重要的参考！建议30字以上。赶快告诉其他用户吧</p>
					<label class="choose_branch">选择分店:</label>
					<select name="choose_branch">
						<option value="0">宝山路三里湖门店</option>
						<option value="1">宝山路三里湖门店</option>
						<option value="2">宝山路三里湖门店</option>
					</select>
					<textarea cols="56" rows="8" name="mycomment_content"></textarea>
				<input type="submit" name="post_comment" value="发表评论" class="post_comment">
					<p class="post_comment_hidden_error_tips">评论内容不能为空</p>
				</div>
			</form>
		</li>
		<li>
			<form method="post" action="<?php echo U("Home/Account/handlePostCouponComment");?>">
				<div class="display_content_box">
					<img src="__PUBLIC__/images/pic/1.png" class="thumb">
					<p class="coupon_title">江上人家(中山路37号店） 10元优惠券</p>
					<p class="coupon_question">你为本优惠券打多少分？</p>
					<p class="myrate">我的总体评价:</p>
					<p class="rate_star">
						<span ></span>
						<span ></span>
						<span ></span>
						<span ></span>
						<span ></span>
					</p>
					<p class="finish_comment_content">不错，分量不是很多，味道不错</p>
					<p class="modify_comment">修改评论</p>
					<input type="hidden" name="ratevalue" value="1"> 
				</div>
				<div class="hidden_content_box">
					<p class="comment_desc">说说本优惠券的“亮点”与“不足”吧，您的评价将是其他会员非常重要的参考！建议30字以上。赶快告诉其他用户吧</p>
					<label class="choose_branch">选择分店:</label>
					<select name="choose_branch">
						<option value="0">宝山路三里湖门店</option>
						<option value="1">宝山路三里湖门店</option>
						<option value="2">宝山路三里湖门店</option>
					</select>
					<textarea cols="56" rows="8" name="mycomment_content"></textarea>
				<input type="submit" name="post_comment" value="发表评论" class="post_comment">
					<p class="post_comment_hidden_error_tips">评论内容不能为空</p>
				</div>
			</form>
		</li>
		<li>
			<form method="post" action="<?php echo U("Home/Account/handlePostCouponComment");?>">
				<div class="display_content_box">
					<img src="__PUBLIC__/images/pic/1.png" class="thumb">
					<p class="coupon_title">江上人家(中山路37号店） 10元优惠券</p>
					<p class="coupon_question">你为本优惠券打多少分？</p>
					<p class="myrate">我的总体评价:</p>
					<p class="rate_star">
						<span ></span>
						<span ></span>
						<span ></span>
						<span ></span>
						<span ></span>
					</p>
					<p class="finish_comment_content">不错，分量不是很多，味道不错</p>
					<p class="modify_comment">修改评论</p>
					<input type="hidden" name="ratevalue" value="1"> 
				</div>
				<div class="hidden_content_box">
					<p class="comment_desc">说说本优惠券的“亮点”与“不足”吧，您的评价将是其他会员非常重要的参考！建议30字以上。赶快告诉其他用户吧</p>
					<label class="choose_branch">选择分店:</label>
					<select name="choose_branch">
						<option value="0">宝山路三里湖门店</option>
						<option value="1">宝山路三里湖门店</option>
						<option value="2">宝山路三里湖门店</option>
					</select>
					<textarea cols="56" rows="8" name="mycomment_content"></textarea>
				<input type="submit" name="post_comment" value="发表评论" class="post_comment">
					<p class="post_comment_hidden_error_tips">评论内容不能为空</p>
				</div>
			</form>
		</li>
	</ul>
	<ul class="page_box">
		<li class="one"><a href="" class="one">首页</a></li>
		<li><a href=""><</a></li>
		<li><a href="" class="red">1</a></li>
		<li><a href="">2</a></li>
		<li><a href="">3</a></li>
		<li><a href="">></a></li>
		<li class="one"><a href="" class="one">尾页</a></li>
	</ul>
	
	</div>
</div>
		<div id="right_content_box">
			<div class="account_photo">
				<p class="title_box">Hi, 尊敬的<span>用户昵称</span><a href="<?php echo U("Home/Account/mysetting");?>">编辑个人资料</a></p>
				<img src="__PUBLIC__/images/person_photo.png" class="photo">
				<img src="__PUBLIC__/images/ico_sheng.png" class="sheng">
				<p class="cost_time">您已经使用优惠券<span>28</span>张</p>
				<p class="save_money">共节省<span>480</span>元</p>
			</div>
			<div class="hotline_number">
				<p class="title">惠桂林客户服务热线</p>
				<p class="hotline">400-0088-8888</p>
			</div>
			<div class="comment_tips">
				<p class="title">惠桂林温馨提示</p>
				<p class="tips_title">1.绑定手机号的好处</p>
				<ul>
					<li>手机号可直接登录惠桂林;</li>
					<li>惠桂林优惠券将直接发送到该手机;</li>
					<li>可通过手机短信找回密码;</li>
				</ul>
				<p class="tips_title">2.如何撰写优质评价？</p>
				<ul>
					<li>说明喜欢与不喜欢本次优惠的原因;</li>
					<li>具体地从不同角度(如环境，服务态度等)描述本次优惠是否满足您的期望;</li>
				</ul>
				<p class="tips_title">3.评价须知</p>
				<ul>
					<li>请真实、客观的评价本次优惠，您的评价将是其它用户的重要参考</li>
					<li>请勿发布含非法、广告、恶意、人身攻击等内容的评价，否则会被删除;</li>
				</ul>
			</div>
		</div>
		<div id="clear_float_div"></div>
	</div>
<!-- 内容区域结束 -->
<!-- 最底部区域 -->
	<div id="bottom_info">
		<div id="bottom_box">
			<div class="p_box">
				<p>版权归惠桂林所有，未经书面授权禁止复制或建立镜像。 Email：<a href="mailto:service@huigl.com">service@huigl.com</a></p>
				<p>惠桂林网客服电话：（0773）2853120 2852488 传真：（0773）2853265 </p>
				<p>地址：桂林市中山中路39号南方大厦9-5号</p>
				<p>经营许可证：桂B2-20040001</p>
			</div>
			<img src="__PUBLIC__/images/footer_ico01.png" alt="" class="one"/>
			<img src="__PUBLIC__/images/footer_ico02.png" alt="" class="two" />
			<img src="__PUBLIC__/images/footer_ico03.png" alt="" class="three" />
			<img src="__PUBLIC__/images/footer_ico04.png" alt="" class="four" />
			<img src="__PUBLIC__/images/footer_ico05.png" alt="" class="five" />
			<ul>
				<li class="one"><a href="<?php echo U("About/about");?>">关于我们</a></li>
				<li><a href="<?php echo U("Sitemap/sitemap");?>">网站地图</a></li>
				<li><a href="<?php echo U("Contactus/contactus");?>">联系我们</a></li>
				<li><a href="<?php echo U("Intention/intention");?>">商务合作</a></li>
				<li><a href="<?php echo U("Legalstatement/legalstatement");?>">法律声明</a></li>
				<li class="six"><a href="<?php echo U("Eula/eula");?>">用户协议</a></li>
			</ul>
		</div>
</div>
<!-- 最底部区域结束 -->

</body>
</html>