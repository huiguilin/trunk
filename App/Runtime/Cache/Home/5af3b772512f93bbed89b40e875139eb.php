<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 a//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="惠桂林,huigl,优惠,优惠券,吃喝玩乐,惠享生活"> <!-- 向搜索引擎说明你的网页的关键词； --> 
<meta name="description" content=" 惠桂林网- 桂林最早，口碑最好的网络优惠平台！超省钱巨划算！惠桂林网为您精选自助餐、电影票、KTV、美发、足浴特色商家，享尽无敌优惠"> <!-- 告诉搜索引擎你的站点的主要内容；  -->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/global.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/index.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/M_sendCouponToCellphone.css">
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/bPopup.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery-placeholder.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/modernizr-2.6.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/index.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/header.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/config.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/M_sendCouponToCellphone.js"></script>
<title>惠桂林首页</title>
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
					<a href="<?php echo U("Home/Account/mycoupon");?>" class="border_left" id="myhuigl">我的惠桂林</a>
					<div id="login_dropdownlist_box">
						<ul id="login_dropdownlist">
							<li class="title"><a href="<?php echo U("Home/Account/mycoupon");?>">我的惠桂林</a></li>
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
						<input type="text" id="subscription_email_textbox" value="" name="subscription_email_textbox"/>
						<input type="submit" value="订阅" name="subscription_email_btn" id="subscription_email_btn">
					</div>
				</li>
				<li id="share" class="share">
					<a href="" class="bg_icon">分享</a>
					<div id="share_box">
						<ul class="clearfix">
							<li><a href="http://weibo.com/huigl?topnav=1&wvr=5" class="weibo">惠桂林新浪微博</a></li>
							<li><a href="http://user.qzone.qq.com/2042534770" class="qzone">惠桂林QQ空间</a></li>
							<li><a href="http://t.qq.com/ihuigl?preview" class="QQweibo">惠桂林腾讯微博</a></li>
						</ul>
					</div>
				</li>
				<li><a href="<?php echo U("Admin/Account/login");?>" target=_blank class="no_border_right">商家入口</a></li>
			</ul>
			<img src="__PUBLIC__/images/slogan2.png" alt="slogan">
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
					<?php elseif($templateName == 'coupon'): ?>
						<li><a href="<?php echo U("Index/index");?>">首页</a></li>
						<li><a href="<?php echo U("Coupon/specialcoupon");?>">限时优惠</a></li>
						<li class="border"><a href="<?php echo U("Coupon/coupon");?>">优惠券</a></li>
						<li><a href="<?php echo U("Partner/partner");?>">商户</a></li>
					<?php elseif($templateName == 'partner'): ?>
						<li><a href="<?php echo U("Index/index");?>">首页</a></li>
						<li><a href="<?php echo U("Coupon/specialcoupon");?>">限时优惠</a></li>
						<li><a href="<?php echo U("Coupon/coupon");?>">优惠券</a></li>
						<li class="border"><a href="<?php echo U("Partner/partner");?>">商户</a></li>
					<?php elseif($templateName == 'specialcoupon'): ?>
						<li><a href="<?php echo U("Index/index");?>">首页</a></li>
						<li class="border"><a href="<?php echo U("Coupon/specialcoupon");?>">限时优惠</a></li>
						<li><a href="<?php echo U("Coupon/coupon");?>">优惠券</a></li>
						<li><a href="<?php echo U("Partner/partner");?>">商户</a></li>
					<?php else: ?>
						<li class="border"><a href="<?php echo U("Index/index");?>">首页</a></li>
						<li><a href="<?php echo U("Coupon/specialcoupon");?>">限时优惠</a></li>
						<li><a href="<?php echo U("Coupon/coupon");?>">优惠券</a></li>
						<li><a href="<?php echo U("Partner/partner");?>">商户</a></li><?php endif; ?>
				</ul>
				<form id="search_box" method="get" action="<?php echo U("Home/Search/search");?>">
					<div>
						<input id="search_con" type="text"  name="search_con"/>
						<input id="search_btn" type="submit" value="" name="search_btn"/>
					</div>
				</form>
			</div>
		</div>
		<div id="top_nav_classification_box">
			<!-- <ul class="clearfix">
				<li><a href="">桂林电子科技大学</a></li>
				<li><a href="">广西师范大学</a></li>
				<li><a href="">桂林理工大学</a></li>
				<li><a href="">桂林医学院</a></li>
				<li><a href="">桂林航天工业学院</a></li>
				<li><a href="">桂林旅专</a></li>
				<li><a href="">广艺桂林分校</a></li>
				<li><a href="">收起全部学校</a></li>
			</ul> -->
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
					我已阅读并同意<a href="<?php echo U("Eula/eula");?>"><<惠桂林用户条款>>.</a>
				</p>
				<input type="submit" name="email_reg_btn" id="email_reg_btn" value="注册" />
				<p class="seven">已经是惠桂林的用户？点击<a href="" id="login_now_email">登录.</a></p>
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
					我已阅读并同意<a href=""><<惠桂林用户条款>>.</a>
				</p>
				<input type="submit" name="cellphone_reg_btn" id="cellphone_reg_btn" value="注册"/>
				<p class="thirteen">已经是惠桂林的用户？点击<a href="" id="login_now_cellphone">登录.</a></p>
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
	<p class="one">惠桂林手机客户端</p>	
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
		<img src="__PUBLIC__/images/ico_16.png" alt="安卓版">
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
		<img src="__PUBLIC__/images/ico_17.png" alt="windowsphone版">
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
<!-- 顶部订阅分享区域+Logo区域结束 -->
<!-- 内容区域 -->
	<div id="right_function_box"><a href="">回到顶部</a></div>
	<div id="main">
		<!-- 主要内容顶部区域 -->
		<div id="main_content_top_box">
			<!-- 广告区域 -->
			<div id="ad_box">
				<img src="__PUBLIC__/images/flash/1.png" alt="广告图片">
				<img src="__PUBLIC__/images/flash/2.png" alt="广告图片">
				<img src="__PUBLIC__/images/flash/3.png" alt="广告图片">
				<img src="__PUBLIC__/images/flash/4.png" alt="广告图片">
				<ul>
					<li>1</li>
					<li>2</li>
					<li>3</li>
					<li>4</li>
				</ul>
			</div>
			<!-- 广告区域结束 -->
			<!-- 热门分类区域 -->
			<ul class="hot_navigation">
				<li>
					<span>热门分类</span>
                    <?php if(is_array($categories)): foreach($categories as $key=>$category): if($key == 0): ?><a href="<?php echo U('Coupon/coupon',array('label_type'=>$category['label_type'],'cat_id'=>$category['cat_id']),'','');?>" class="one"><?php echo ($category["cat_name"]); ?></a>
                    <?php else: ?>
					<a href="<?php echo U('Coupon/coupon',array('label_type'=>$category['label_type'],'cat_id'=>$category['cat_id']),'','');?>"><?php echo ($category["cat_name"]); ?></a><?php endif; endforeach; endif; ?>
				</li>
				<li>
					<span>热门学校</span>
					<a href="<?php echo U('Coupon/coupon',array('tag'=>'桂林电子科技大学'),'','');?>" class="one" >桂林电子科技大学</a>
					<a href="<?php echo U('Coupon/coupon',array('tag'=>'广西师范大学'),'','');?>">广西师范大学</a>
					<a href="<?php echo U('Coupon/coupon',array('tag'=>'桂林理工大学'),'','');?>">桂林理工大学</a>
					<a href="<?php echo U('Coupon/coupon',array('tag'=>'桂林医学院'),'','');?>">桂林医学院</a>
					<a href="<?php echo U('Coupon/coupon',array('tag'=>'桂林旅专'),'','');?>">桂林旅专</a>
				</li>
				<li class="no_bottom_border">
					<span>热门校区</span>
                    <?php if(is_array($locations)): foreach($locations as $key=>$location): if($key == 0): ?><a href="<?php echo U('Coupon/coupon',array('tag'=>$location['belong'],'location'=>$location['id']),'','');?>" class="one"><?php echo ($location["name"]); ?></a>
                    <?php else: ?>
					<a href="<?php echo U('Coupon/coupon',array('tag'=>$location['belong'],'location'=>$location['id']),'','');?>"><?php echo ($location["name"]); ?></a><?php endif; endforeach; endif; ?>
				</li>
			</ul>
			<!-- 热门分类区域结束 -->
			<!-- 微信区域 -->
			<div class="QRcode_box">
				<p>扫描我,关注惠桂林官方微博</p>
				<img src="__PUBLIC__/images/weibo_barcode.png" alt="二维码">
			</div>
			<!-- 微信区域结束 -->
			
		</div>
		<!-- 主要内容顶部区域结束 -->
		<!-- 热门品牌+新入驻品牌区域 -->
		<div id="hot_and_new_brand_box">
			<div class="hot_brand_box">
				<p>热门品牌</p>
				<ul>
                <?php if(is_array($hot_partners)): foreach($hot_partners as $key=>$hpartner): ?><li>
						<a class="title" href="<?php echo U('partner/detail','','','');?>/pid/<?php echo ($hpartner["partner_id"]); ?>" target=_blank ><?php echo ($hpartner["name"]); ?></a>
						<a href="<?php echo U('partner/detail','','','');?>/pid/<?php echo ($hpartner["partner_id"]); ?>" class="img_box" target=_blank>
							<img src="__PUBLIC__/<?php echo ($hpartner["header_path"]); ?>" alt="<?php echo ($hpartner["name"]); ?>">
						</a>
					</li><?php endforeach; endif; ?>
				</ul>
			</div>
			<div class="new_brand_box">
				<p>新入驻品牌</p>
				<ul>
               <?php if(is_array($partners)): foreach($partners as $key=>$partner): ?><li>
						<a target=_blank href="<?php echo U('partner/detail','','','');?>/pid/<?php echo ($partner["partner_id"]); ?>" class="img_box">
							<img src="__PUBLIC__/<?php echo ($partner["header_path"]); ?>" alt="<?php echo ($partner["name"]); ?>">
						</a>
						<a class="title" target=_blank href="<?php echo U('partner/detail','','','');?>/pid/<?php echo ($partner["partner_id"]); ?>"><?php echo ($partner["name"]); ?></a>
                    </li><?php endforeach; endif; ?> 
				</ul>
			</div>
		</div>
		<!-- 热门品牌+新入驻品牌区域结束 -->
		<!-- 民以食为天+排行榜区域 -->
		<div id="foot_and_footsort_box">
			<div class="foot_box">
				<p class="title">民以食为天</p>
				<ul class="title_content">
                    <?php if(is_array($eat_cat)): foreach($eat_cat as $k=>$e_cat): if($k < 4): ?><li><a href="<?php echo U('Coupon/coupon',array('label_type'=>1,'cat_id'=>$e_cat['cat_id']),'','');?>"><?php echo ($e_cat["cat_name"]); ?></a></li>

                    <?php else: ?>
					<li><a href="<?php echo U('Coupon/coupon',array('label_type'=>1,'cat_id'=>$e_cat['cat_id']),'','');?>" class="no_right_border"><?php echo ($e_cat["cat_name"]); ?></a></li><?php endif; endforeach; endif; ?>
				</ul>
				<ul class="content">
                <?php if(is_array($eat_coupons)): foreach($eat_coupons as $k=>$coupon): if($k > 3): else: ?>
						<li>
						<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($coupon["coupon_id"]); ?>" class="img_box" target=_blank><img src="__PUBLIC__/<?php echo ($coupon["picture_path"]); ?>" alt="<?php echo ($coupon["name"]); ?>"></a>
						<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($coupon["coupon_id"]); ?>" target=_blank class="content_title" title="<?php echo ($coupon["name"]); ?>"><?php echo ($coupon["name"]); ?></a>
						<p class="one" title="<?php echo ($coupon["description"]); ?>"><?php echo ($coupon["description"]); ?></p>
						<p class="two" title="<?php echo ($coupon["title"]); ?>"><?php echo ($coupon["title"]); ?></p>
						<p class="three" >下载：<?php echo ($coupon["download_times"]); ?>次</p>
						<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($coupon["coupon_id"]); ?>" couponid="<?php echo ($coupon["coupon_id"]); ?>" class="download">立即下载</a>
						<p class="hidden_location"><?php echo ($coupon["tag"]); ?></p>
					</li><?php endif; endforeach; endif; ?>
				</ul>
				<a href="<?php echo U('Coupon/coupon',array('label_type'=>1),'','');?>" class="foot_type_more" target=_blank>查看更多</a>
			</div>
			<div class="footsort_box">
				<!-- <p class="title title2" id="foot_hot_title">最热优惠劵排行</p><p class="title" id="foot_new_title">最新优惠劵排行</p> -->
				<span class="title title2" id="foot_hot_title">最热优惠劵排行</span><span class="title" id="foot_new_title">最新优惠劵排行</span>
				<ul id="foot_hot_ul">
                <?php if(is_array($eat_coupons)): foreach($eat_coupons as $k=>$hcoupon): if($k == 0): ?><li class="hover" id="footsort_box_fisrt_li">
							<a class="two" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<p class="two"><?php echo ($hcoupon["description"]); ?></p>
							<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($coupon["coupon_id"]); ?>" class="img_box" target=_blank><img src="__PUBLIC__/<?php echo ($hcoupon["picture_path"]); ?>" title="<?php echo ($hcoupon["description"]); ?>" alt="<?php echo ($coupon["name"]); ?>"></a>
							<a class="one hidden" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<span class="one hidden"><?php echo ($hcoupon["title"]); ?></span>
						</li>
						<?php else: ?>
						<li id="footsort_box_fisrt_li">
							<a class="two hidden" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<p class="two hidden"><?php echo ($hcoupon["description"]); ?></p>
							<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>" target=_blank class="img_box"><img src="__PUBLIC__/<?php echo ($hcoupon["picture_path"]); ?>" title="<?php echo ($hcoupon["description"]); ?>" class="hidden" alt="<?php echo ($coupon["name"]); ?>"></a>
							<a class="one sort_id_<?php echo ($k+1); ?>" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<span class="one"><?php echo ($hcoupon["title"]); ?></span>
						</li><?php endif; endforeach; endif; ?>
				</ul>
				<ul id="foot_new_ul" class="hidden" >
				<?php if(is_array($eat_coupons)): foreach($eat_coupons as $k=>$hcoupon): if($k == 0): ?><li class="hover" id="footsort_box_fisrt_li">
							<a class="two" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<p class="two"><?php echo ($hcoupon["description"]); ?></p>
							<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>" target=_blank class="img_box"><img src="__PUBLIC__/<?php echo ($hcoupon["picture_path"]); ?>" title="<?php echo ($hcoupon["description"]); ?>" alt="<?php echo ($coupon["name"]); ?>"></a>
							<a class="one hidden" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<span class="one hidden"><?php echo ($hcoupon["title"]); ?></span>
						</li>
						<?php else: ?>
						<li id="footsort_box_fisrt_li">
							<a class="two hidden" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<p class="two hidden"><?php echo ($hcoupon["description"]); ?></p>
							<a target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>" class="img_box"><img src="__PUBLIC__/<?php echo ($hcoupon["picture_path"]); ?>" title="<?php echo ($hcoupon["description"]); ?>" class="hidden" alt="<?php echo ($coupon["name"]); ?>"></a>
							<a target=_blank class="one sort_id_<?php echo ($k+1); ?>" href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<span class="one"><?php echo ($hcoupon["title"]); ?></span>
						</li><?php endif; endforeach; endif; ?>
				</ul>
			</div>
		</div>
		<!-- 民以食为天+排行榜区域结束 -->
		<!-- 休闲娱乐+排行榜区域 -->
		<div id="foot_and_footsort_box">
			<div class="foot_box">
				<p class="title">休闲娱乐</p>
				<ul class="title_content">
                    <?php if(is_array($play_cat)): foreach($play_cat as $k=>$p_cat): if($k < 4): ?><li><a href="<?php echo U('Coupon/coupon',array('label_type'=>2,'cat_id'=>$p_cat['cat_id']),'','');?>"><?php echo ($p_cat["cat_name"]); ?></a></li>
                    <?php else: ?>
					<li><a href="<?php echo U('Coupon/coupon',array('label_type'=>2,'cat_id'=>$p_cat['cat_id']),'','');?>" class="no_right_border"><?php echo ($p_cat["cat_name"]); ?></a></li><?php endif; endforeach; endif; ?>
				</ul>
				<ul class="content">
                <?php if(is_array($play_coupons)): foreach($play_coupons as $k=>$coupon): if($k > 3 ): else: ?>
						<li>
						<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($coupon["coupon_id"]); ?>" target=_blank class="img_box"><img src="__PUBLIC__/<?php echo ($coupon["picture_path"]); ?>" alt="<?php echo ($coupon["name"]); ?>"></a>
						<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($coupon["coupon_id"]); ?>" target=_blank class="content_title" title="<?php echo ($coupon["name"]); ?>"><?php echo ($coupon["name"]); ?></a>
						<p class="one" title="<?php echo ($coupon["description"]); ?>"><?php echo ($coupon["description"]); ?></p>
						<p class="two" title="<?php echo ($coupon["title"]); ?>"><?php echo ($coupon["title"]); ?></p>
						<p class="three">下载：<?php echo ($coupon["download_times"]); ?>次</p>
						<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($coupon["coupon_id"]); ?>" couponid="<?php echo ($coupon["coupon_id"]); ?>" class="download">立即下载</a>
						<p class="hidden_location"><?php echo ($coupon["tag"]); ?></p>
					</li><?php endif; endforeach; endif; ?>
				</ul>
				<a href="<?php echo U('Coupon/coupon',array('label_type'=>2),'','');?>" class="foot_type_more">查看更多</a>
			</div>
			<div class="footsort_box">
				<!-- <p class="title title2" id="ent_hot_title">最热优惠劵排行</p><p class="title" id="ent_new_title">最新优惠劵排行</p> -->
				<span class="title title2" id="ent_hot_title">最热优惠劵排行</span><span class="title" id="ent_new_title">最新优惠劵排行</span>
				<ul id="ent_hot_ul">
                <?php if(is_array($play_coupons)): foreach($play_coupons as $k=>$hcoupon): if($k == 0): ?><li class="hover" id="footsort_box_fisrt_li">
							<a class="two" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<p class="two"><?php echo ($hcoupon["description"]); ?></p>
							<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>" target=_blank class="img_box"><img src="__PUBLIC__/<?php echo ($hcoupon["picture_path"]); ?>" title="<?php echo ($hcoupon["description"]); ?>" alt="<?php echo ($coupon["name"]); ?>"></a>
							<a class="one hidden" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<span class="one hidden"><?php echo ($hcoupon["title"]); ?></span>
						</li>
						<?php else: ?>
						<li id="footsort_box_fisrt_li">
							<a class="two hidden" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<p class="two hidden"><?php echo ($hcoupon["description"]); ?></p>
							<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>" target=_blank class="img_box"><img src="__PUBLIC__/<?php echo ($hcoupon["picture_path"]); ?>" title="<?php echo ($hcoupon["description"]); ?>" class="hidden" alt="<?php echo ($coupon["name"]); ?>"></a>
							<a class="one sort_id_<?php echo ($k+1); ?>" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<span class="one"><?php echo ($hcoupon["title"]); ?></span>
						</li><?php endif; endforeach; endif; ?>
				</ul>
				<ul id="ent_new_ul" class="hidden" >
                <?php if(is_array($play_coupons)): foreach($play_coupons as $k=>$hcoupon): if($k == 0): ?><li class="hover" id="footsort_box_fisrt_li">
							<a class="two" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<p class="two"><?php echo ($hcoupon["description"]); ?></p>
							<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>" target=_blank class="img_box"><img src="__PUBLIC__/<?php echo ($hcoupon["picture_path"]); ?>" title="<?php echo ($hcoupon["description"]); ?>" alt="<?php echo ($coupon["name"]); ?>"></a>
							<a class="one hidden" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<span class="one hidden"><?php echo ($hcoupon["title"]); ?></span>
						</li>
						<?php else: ?>
						<li id="footsort_box_fisrt_li">
							<a class="two hidden" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<p class="two hidden"><?php echo ($hcoupon["description"]); ?></p>
							<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>" target=_blank class="img_box"><img src="__PUBLIC__/<?php echo ($hcoupon["picture_path"]); ?>" title="<?php echo ($hcoupon["description"]); ?>" class="hidden" alt="<?php echo ($coupon["name"]); ?>"></a>
							<a class="one sort_id_<?php echo ($k+1); ?>" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<span class="one"><?php echo ($hcoupon["title"]); ?></span>
						</li><?php endif; endforeach; endif; ?>
				</ul>
			</div>
		</div>
		<!-- 休闲娱乐+排行榜区域结束 -->
		<!-- 生活服务+排行榜区域 -->
		<div id="foot_and_footsort_box">
			<div class="foot_box">
				<p class="title">生活服务</p>
				<ul class="title_content">
                    <?php if(is_array($life_cat)): foreach($life_cat as $k=>$l_cat): if($k < 3): ?><li><a href="<?php echo U('Coupon/coupon',array('label_type'=>3,'cat_id'=>$l_cat['cat_id']),'','');?>"><?php echo ($l_cat["cat_name"]); ?></a></li>
                    <?php else: ?>
					<li><a href="<?php echo U('Coupon/coupon',array('label_type'=>3,'cat_id'=>$l_cat['cat_id']),'','');?>" class="no_right_border"><?php echo ($l_cat["cat_name"]); ?></a></li><?php endif; endforeach; endif; ?>
				</ul>
				<ul class="content">
                <?php if(is_array($life_coupons)): foreach($life_coupons as $k=>$coupon): if($k > 3 ): else: ?>
						<li>
						<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($coupon["coupon_id"]); ?>" target=_blank class="img_box"><img src="__PUBLIC__/<?php echo ($coupon["picture_path"]); ?>" alt="<?php echo ($coupon["name"]); ?>"></a>
						<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($coupon["coupon_id"]); ?>" target=_blank class="content_title" title="<?php echo ($coupon["name"]); ?>"><?php echo ($coupon["name"]); ?></a>
						<p class="one" title="<?php echo ($coupon["description"]); ?>"><?php echo ($coupon["description"]); ?></p>
						<p class="two" title="<?php echo ($coupon["title"]); ?>"><?php echo ($coupon["title"]); ?></p>
						<p class="three">下载：<?php echo ($coupon["download_times"]); ?>次</p>
						<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($coupon["coupon_id"]); ?>" couponid="<?php echo ($coupon["coupon_id"]); ?>" class="download">立即下载</a>
						<p class="hidden_location"><?php echo ($coupon["tag"]); ?></p>
					</li><?php endif; endforeach; endif; ?>
				</ul>
				<a href="<?php echo U('Coupon/coupon',array('label_type'=>3),'','');?>" class="foot_type_more">查看更多</a>
			</div>
			<div class="footsort_box">
		<!-- 		<p class="title title2" id="life_hot_title">最热优惠劵排行</p><p class="title" id="life_new_title">最新优惠劵排行</p> -->
				<span class="title title2" id="life_hot_title">最热优惠劵排行</span><span class="title" id="life_new_title">最新优惠劵排行</span>
				<ul id="life_hot_ul">
                <?php if(is_array($life_coupons)): foreach($life_coupons as $k=>$hcoupon): if($k == 0): ?><li class="hover" id="footsort_box_fisrt_li">
							<a class="two" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<p class="two"><?php echo ($hcoupon["description"]); ?></p>
							<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>" target=_blank class="img_box"><img src="__PUBLIC__/<?php echo ($hcoupon["picture_path"]); ?>" title="<?php echo ($hcoupon["description"]); ?>" alt="<?php echo ($coupon["name"]); ?>"></a>
							<a class="one hidden" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<span class="one hidden"><?php echo ($hcoupon["title"]); ?></span>
						</li>
						<?php else: ?>
						<li id="footsort_box_fisrt_li">
							<a class="two hidden" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<p class="two hidden"><?php echo ($hcoupon["description"]); ?></p>
							<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>" target=_blank class="img_box"><img src="__PUBLIC__/<?php echo ($hcoupon["picture_path"]); ?>" title="<?php echo ($hcoupon["description"]); ?>" class="hidden" alt="<?php echo ($coupon["name"]); ?>"></a>
							<a class="one sort_id_<?php echo ($k+1); ?>" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<span class="one"><?php echo ($hcoupon["title"]); ?></span>
						</li><?php endif; endforeach; endif; ?>
				</ul>
				<ul id="life_new_ul" class="hidden" >
                <?php if(is_array($life_coupons)): foreach($life_coupons as $k=>$hcoupon): if($k == 0): ?><li class="hover" id="footsort_box_fisrt_li">
							<a class="two" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<p class="two"><?php echo ($hcoupon["description"]); ?></p>
							<a target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>" class="img_box"><img src="__PUBLIC__/<?php echo ($hcoupon["picture_path"]); ?>" title="<?php echo ($hcoupon["description"]); ?>" alt="<?php echo ($coupon["name"]); ?>"></a>
							<a class="one hidden" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<span class="one hidden"><?php echo ($hcoupon["title"]); ?></span>
						</li>
						<?php else: ?>
						<li id="footsort_box_fisrt_li">
							<a class="two hidden" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<p class="two hidden"><?php echo ($hcoupon["description"]); ?></p>
							<a href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>" target=_blank class="img_box"><img src="__PUBLIC__/<?php echo ($hcoupon["picture_path"]); ?>" title="<?php echo ($hcoupon["description"]); ?>" class="hidden" alt="<?php echo ($coupon["name"]); ?>"></a>
							<a class="one sort_id_<?php echo ($k+1); ?>" target=_blank href="<?php echo U("Coupon/detail","","","");?>/<?php echo ($hcoupon["coupon_id"]); ?>"><?php echo ($hcoupon["name"]); ?></a>
							<span class="one"><?php echo ($hcoupon["title"]); ?></span>
						</li><?php endif; endforeach; endif; ?>
				</ul>
			</div>
		</div>
		<!-- 生活服务+排行榜区域结束 -->
	</div>
<!-- 内容区域结束 -->
<!-- 右侧回到顶部区域 -->
	<!-- <div id="right_function_box">
		
	</div> -->
<!-- 右侧回到顶部区域结束 -->
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
				<!-- <p class="one">版权归惠桂林所有，未经书面授权禁止复制或建立镜像。 Email：<a href="mailto:huigl@outlook.com">service@huigl.com</a></p>
				<p class="two">惠桂林网客服电话：（0773）8993520</p>
				<p class="three">地址：桂林市高新区桂磨大道互联网产业基地503室</p>
				<p class="four">经营许可证：桂ICP备 14000606号</p> -->
				<p class="one">
					<span>桂ICP备 14000606号</span><span class="padding_left">地址：桂林市高新区桂磨大道互联网产业基地503室</span><span class="padding_left">客服电话：（0773）8993520</span><span class="padding_left">邮箱:<a href="mailto:huigl@outlook.com">service@huigl.com</a></span>
				</p>
				<p class="two">
					<span>Copyright @ 2014 Huixiaoyuan.com Inc.All Rights Reserved</span>
				</p>
			</div>
		</div>
</div>
<!-- 最底部区域结束 -->

</body>
</html>