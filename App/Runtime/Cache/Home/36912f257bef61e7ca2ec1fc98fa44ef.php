<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/global.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/about_tpl.css">
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/bPopup.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/index.js"></script>
<title>会员卡</title>
<!--[if IE 6]>
<!--背景图片透明方法-->
<script src="__PUBLIC__/js/iepng.js" type="text/javascript"></script>
<!--插入图片透明方法-->
<script type="text/javascript">
   EvPNG.fix('div, ul, img, li, input');  //EvPNG.fix('包含透明PNG图片的标签'); 多个标签之间用英文逗号隔开。
</script>
<![endif]-->
</head>
<body>
<!-- 顶部订阅分享区域+Logo区域 -->
	<!-- 顶部订阅分享区域 -->
	<div id="top_rss">
		<div id="top_rss_box">
			<img src="__PUBLIC__/images/cellphone.png">
			<ul class="left_ul">
				<li class="one"><a href="" id="cellphone_version">手机版</a></li>
				<li class="two"><a href="<?php echo U("Help/help");?>">使用帮助</a></li>
			</ul>
			<ul class="right_ul">
				<li id="subscription_li">
					<a href="#" id="subscription">订阅</a>
				</li>
				<li id="share_li"><a id="share" href="" class="one">分享</a></li>
			</ul>
			<div id="subscription_box">
				<input type="text" placeholder="输入邮箱,订阅惠桂林信息"/>
				<a href="">订阅</a>
			</div>
			<div id="share_box">
				<ul>
					<li><a href="" class="weibo">分享到新浪微博</a></li>
					<li><a href="" class="qzone">分享到QQ空间</a></li>
					<li><a href="" class="renren">分享到人人网</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="cellphone_version_box">
		<p class="one">惠桂林手机手机客户端</p>	
		<p class="two">吃喝玩乐，惠享生活！</p>
		<a class="iphone" href="">iPhone</a>
		<a class="android" href="">Android</a>
		<a class="wp" href="">WP/Win8</a>
		<p class="version_comment_title">版本说明:</p>
		<p class="version_comment_content">该版本支持ios5.0、Android 2.1、WindowsPhone8及以上系统.</p>
		<div id="app_closed_box">
			<a class="app_closed" href=""><img src="__PUBLIC__/images/app_closed.png"></a>
		</div>
		<div id="apppics_box">
			<img id="phone_pic01" src="__PUBLIC__/images/pic/phone_pic01.png">
			<img id="phone_pic02" src="__PUBLIC__/images/pic/phone_pic02.png">
		</div>
		<div id="appbtn_box">	
			<a class="imgbtn_01" href="javascript:void(0)"><img src="__PUBLIC__/images/ico_19.png"></a>
			<a class="imgbtn_02" href="javascript:void(0)"><img src="__PUBLIC__/images/ico_19.png"></a>
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
			<li class="one"><a href="" class="one" id="Userlogin">登录</a></li>
			<li><a href="" class="two" id="Userreg">快速注册</a></li>
		</ul>
		<div id="Userreg_box">
			<div id="u_top">
				<a href="" id="a_closed2">X</a>
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
						<input type="checkbox" name="license" class="five" checked="true">
						<p class="five">
							我已阅读并同意<a href="<?php echo U("Eula/eula");?>"><<惠桂林用户条款>>.</a>
						</p>
						<a href="" id="login_btn">注册</a>
						<p class="six">已经是惠桂林的用户？点击<a href="" id="login_now">登录.</a></p>
						<p class="seven" id="reg_hidebox01"></p>
						<p class="eight" id="reg_hidebox02"></p>
						<p class="nine" id="reg_hidebox03"></p>
						<p class="ten" id="reg_hidebox04"></p>
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
						<a href="" id="login_btn">注册</a>
						<p class="six">已经是惠桂林的用户？点击<a href="">登录.</a></p>
					</form>
				</div>	
			</div>
		</div>
		<div id="Userlogin_box">
			<div id="u_top_box">
				<a href="" id="a_closed">X</a>
				<p>用户登录</p>
			</div>
			<div id="u_middle_box">
				<form action="" method="post">
					<p class="one">账号</p>
					<input type="text" name="username" class="one" />
					<p class="two">密码</p>
					<input type="password" name="password" class="two"/>
					<a href="" id="forgetpwd">忘记密码?</a>
					<input type="checkbox" name="rememberpwd" class="three">
					<p class="three">记住密码</p>
					<input type="checkbox" name="autologin" class="four">
					<p class="four">下次自动登录</p>
					<a href="" id="btn_login">登录</a>
					<p class="five">还没有账户？<a href="" id="reg_now">立即注册</a></p>
					<p class="six" id="login_hidebox01">请输入邮箱/手机号</p>
					<p class="seven" id="login_hidebox02">请输入密码</p>
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
						<input type="text" name="cellphone_no" class="one" id="cellphone_no"/>
						<a href="">发送</a>
						<p class="three" id="forgetpwd_hidebox01">请输入注册时填写的手机号码</p>
					</li>
					<li>
						<img src="__PUBLIC__/images/forget_email.png">
						<p class="one">未绑定手机号用户可以通过邮箱找</p>
						<p class="two">请输入您登录的邮箱地址，找回密码：</p>
						<input type="text" name="email_no" class="one" id="email_no"/>
						<a href="">发送</a>
						<p class="three" id="forgetpwd_hidebox02">请输入注册时填写的邮箱地址</p>
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
	<div id="top_nav_box">
		<div id="left_collection">
			<img class="left_img" src="__PUBLIC__/images/ico_02.png" alt="" />
			<span>全部分类</span>
		</div>
		<ul id="nav">
			<li style="background:#DA4453"><a href="<?php echo U("Index/index");?>">首页</a></li>
			<li><a href="<?php echo U("Coupon/coupon");?>">优惠券</a></li>
			<li><a href="<?php echo U("Card/card");?>">会员卡</a></li>
			<li class="border_right "><a href="">商户</a></li>
		</ul>
		<form action="" id="search_box">
			<input id="search_con" type="text" value="桂林环球美食节" />
			<input id="search_btn" type="button"/>
		</form>
	</div>
<!-- 导航区域结束-->
<!-- 导航区域结束-->
<!-- 内容区域 -->
	 	
	
	<!-- 主要内容区域 -->
	<div id="main">
		
		<!-- 左边内容区域 -->
		
		<!-- 左边内容区域结束 -->
		
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/intention.css" />
<!-- 关于我们页面的内容 -->
<div id="left_card">
	<p class="one">商务合作</p>
	<p class="two">如果您想与惠桂林合作，请花些时间填写一下信息</p>
	<ul>
		<li>
			<p class="title">您的称呼</p>
			<input type="text" name="nickname" class="one"/>
		</li>
		<li>
			<p class="title">您的电话</p>
			<input type="text" name="cellphone" class="one"/>
		</li>
		<li class="one">
			<p class="title">其他联系方式</p>
			<input type="text" name="othercommunication" class="one"/>
			<p class="othercommunication">请留下其他联系方式，如QQ, Email等。方便我们回复</p>
		</li>
		<li class="two">
			<p class="title title2">区域</p>
			<select name="area" class="one">
				<option value="">桂林</option>
				<option value="">南宁</option>
				<option value="">柳州</option>
				<option value="">梧州</option>
			</select>
		</li>
		<li>
			<p class="title">参与优惠商户名称</p>
			<input type="text" name="shopname" class="one"/>
		</li>
		<li>
			<p class="title">公司地址</p>
			<input type="text" name="company_address" class="one"/>
		</li>
		<li class="three">
			<p class="title title2">类别</p>
			<select name="classification" class="two">
				<option value="">美食</option>
				<option value="">休闲</option>
				<option value="">健康</option>
				<option value="">运动</option>
				<option value="">网购</option>
				<option value="">其他</option>
			</select>
		</li>
		<li class="four">
			<p class="title">优惠内容描述</p>
			<textarea cols="50" rows="8" class="one"></textarea>
		</li>
	</ul>
	<a href="" class="submit">提交</a>					
</div>
<!-- 关于我们页面的内容结束 -->

		<!-- 右边内容区域 -->
		<div id="main_right">
			<div id="app">
				<p>扫一下,关注惠桂林微信</p>
				<img src="__PUBLIC__/images/barcode.png" alt="二维码">
				<a>点击下载手机APP</a>
			</div>
			<div class="hot_box">
				<p class="rqw">人气王</p>
				<ul>
					<li>
						<a href="" class="title">李记米粉</a>
						<img class="ico" src="__PUBLIC__/images/ico_08.png" alt="" />
						<p class="yhj">优惠劵</p>
						<p class="hyk">会员卡</p>
						<p class="one">[8]</p>
						<p class="two">[2]</p>
						<p class="vip">VIP</p>
					</li>
					<li>
						<a href="" class="title">刘姥姥奶酪</a>
						<img class="ico" src="__PUBLIC__/images/ico_08.png" alt="" />
						<p class="yhj">优惠劵</p>
						<p class="hyk">会员卡</p>
						<p class="one">[8]</p>
						<p class="two">[2]</p>
						<p class="vip">VIP</p>
					</li>
					<li class="no_border_bottom">
						<a href="" class="title">大时代烤肉</a>
						<img class="ico" src="__PUBLIC__/images/ico_08.png" alt="" />
						<p class="yhj">优惠劵</p>
						<p class="hyk">会员卡</p>
						<p class="one">[8]</p>
						<p class="two">[2]</p>
						<p class="vip">VIP</p>
					</li>
				</ul>
			</div>
			<div class="hot_box">
				<p class="rqw">人气王</p>
				<ul>
					<li>
						<a href="" class="title">李记米粉</a>
						<img class="ico" src="__PUBLIC__/images/ico_08.png" alt="" />
						<p class="yhj">优惠劵</p>
						<p class="hyk">会员卡</p>
						<p class="one">[8]</p>
						<p class="two">[2]</p>
						<p class="vip">VIP</p>
					</li>
					<li>
						<a href="" class="title">刘姥姥奶酪</a>
						<img class="ico" src="__PUBLIC__/images/ico_08.png" alt="" />
						<p class="yhj">优惠劵</p>
						<p class="hyk">会员卡</p>
						<p class="one">[8]</p>
						<p class="two">[2]</p>
						<p class="vip">VIP</p>
					</li>
					<li class="no_border_bottom">
						<a href="" class="title">大时代烤肉</a>
						<img class="ico" src="__PUBLIC__/images/ico_08.png" alt="" />
						<p class="yhj">优惠劵</p>
						<p class="hyk">会员卡</p>
						<p class="one">[8]</p>
						<p class="two">[2]</p>
						<p class="vip">VIP</p>
					</li>
				</ul>
			</div>
			<div class="hot_box">
				<p class="rqw">热门优惠劵</p>
				<ul>
					<li>
						<a href="" class="title">李记米粉</a>
						<p class="content">消费满128，凭此券即刻享受8折优惠,全市26店通用，全场通兑！精品融合菜，食尚在青年！</p>
					</li>
					<li>
						<a href="" class="title">刘姥姥奶酪</a>
						<p class="content">消费满128，凭此券即刻享受8折优惠,全市26店通用，全场通兑！精品融合菜，食尚在青年！</p>
					</li>
					<li class="no_border_bottom">
						<a href="" class="title">大时代烤肉</a>
						<p class="content">消费满128，凭此券即刻享受8折优惠,全市26店通用，全场通兑！精品融合菜，食尚在青年！</p>
					</li>
				</ul>
			</div>
			<div class="hot_box">
				<p class="rqw">热门会员卡</p>
				<ul>
					<li>
						<a href="" class="title title2">李记米粉</a>
						<p class="six">会员专享8.8折</p>
						<div>
							<img class="ico2"src="__PUBLIC__/images/vip.png" alt="" />
						</div>
					</li>
					<li>
						<a href="" class="title title3">刘姥姥奶酪</a>
						<p class="seven">会员专享8.8折</p>
						<div class="blue">
							<img class="ico2"src="__PUBLIC__/images/vip.png" alt="" />
						</div>
					</li>
					<li class="no_border_bottom">
						<a href="" class="title title2">大时代烤肉</a>
						<p class="six">会员专享8.8折</p>
						<div class="purple">
							<img class="ico2"src="__PUBLIC__/images/vip.png" alt="" />
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!-- 右边内容区域结束 -->
	</div>
	<!-- 主要内容区域结束 -->
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
			<img src="__PUBLIC__/images/police.png" alt="" />
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