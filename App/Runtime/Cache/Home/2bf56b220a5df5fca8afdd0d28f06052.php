<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/global.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/card.css">
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
				<li class="one"><a href="">手机版</a></li>
				<li class="two"><a href="">使用帮助</a></li>
			</ul>
			<ul class="right_ul">
				<li><a href="#">订阅</a></li>
				<li class="two"><a href="">分享</a></li>
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
			<li class="one" style="background:#ED5565"><a href="<?php echo U("Index/index");?>" class="one">首页</a></li>
			<li><a href="<?php echo U("Coupon/coupon");?>" class="one">优惠券</a></li>
			<li style="background:#DB4453"><a href="<?php echo U("Card/card");?>">会员卡</a></li>
			<li class="four"><a href="" class="one">商户</a></li>
		</ul>
		<form action="" id="search_box">
			<input id="search_con" type="text" value="桂林环球美食节" />
			<input id="search_btn" type="button"/>
		</form>
	</div>
<!-- 导航区域结束-->
<!-- 导航区域结束-->
<!-- 内容区域 -->
	<!-- 图片轮换板区域 -->
	<div id="advertising">
		<img src="__PUBLIC__/images/flash/c_1.png" alt="" />
		<img src="__PUBLIC__/images/flash/c_2.png" alt="" />
		<img src="__PUBLIC__/images/flash/c_3.png" alt="" />
		<ul>
			<li>1</li>
			<li>2</li>
			<li>3</li>
		</ul>
		<a href="">x</a>
	</div>
	<!-- 图片轮换板区域结束 -->
	<!-- 热门标签+地点区域 -->
	<div id="classcification">
		<ul id="lable">
			<li class="one"><p>热门标签</p></li>
			<li><a href="" class="one">江上人家</a></li>
			<li><a href="" class="two">巴山蜀水</a></li>
			<li><a href="" class="three">印象漓江</a></li>
			<li><a href="" class="four">李记米粉</a></li>
			<li><a href="" class="five">果粉甜品</a></li>
			<li><a href="" class="six">门前小馆</a></li>
		</ul>
		<ul id="location">
			<li class="one"><p>地点</p></li>
			<li><a href="" class="one">全部</a></li>
			<li><a href="">秀峰区</a></li>
			<li><a href="">景山区</a></li>
			<li><a href="">叠彩区</a></li>
			<li><a href="">雁山区</a></li>
			<li><a href="">七星区</a></li>
		</ul>
		<ul id="type" style="border:none">
			<li class="one"><p>类型</p></li>
			<li><a href="" class="one">全部</a></li>
			<li><a href="">美食</a></li>
			<li><a href="">KTV</a></li>
			<li><a href="">电影</a></li>
			<li><a href="">酒吧</a></li>
			<li><a href="">桌游</a></li>
			<li><a href="">美发美体</a></li>
			<li><a href="">旅游</a></li>
			<li><a href="">酒店</a></li>
		</ul>
	</div>
	<!-- 热门标签+地点区域结束 -->
	<!-- 排序+价格范围区域 -->
	<div id="sort">
		<p class="one">排序</p>
		<p class="two">价格范围</p>
		<ul>
			<li><a href="" class="one">默认</a></li>
			<li><a href="">人气</a></li>
			<li><a href="">折扣</a></li>
		</ul>
		<select name="price" id="price_id">
			<option value="">全部</option>
			<option value="">100-200</option>
			<option value="">200-300</option>
			<option value="">300-400</option>
			<option value="">400-500</option>
		</select>
		<input type="checkbox" name="booking" value="" id="booking_id">
		<p class="three">只显示没有成为会员的商户</p>
	</div>
	<!-- 排序+价格范围区域结束 -->
	<!-- 主要内容区域 -->
	<div id="main">
		<!-- 左边内容区域 -->
		<div id="left_card">
			<ul>
				<li class="one">
					<a class="one" href="">漓江盛宴会所</a>
					<a class="two" href="">去看看</a>
					<p>会员专享8.8~9.5折</p>
					<img src="__PUBLIC__/images/vipcard.png" alt="" />
				</li>
				<li class="two">
					<a class="one" href="">漓江盛宴会所</a>
					<a class="two" href="">去看看</a>
					<p>会员专享8.8~9.5折</p>
					<img src="__PUBLIC__/images/vipcard.png" alt="" />
				</li>
				<li class="three">
					<a class="one" href="">漓江盛宴会所</a>
					<a class="two" href="">去看看</a>
					<p>会员专享8.8~9.5折</p>
					<img src="__PUBLIC__/images/vipcard.png" alt="" />
				</li>
				<li class="four">
					<a class="one" href="">漓江盛宴会所</a>
					<a class="two" href="">去看看</a>
					<p>会员专享8.8~9.5折</p>
					<img src="__PUBLIC__/images/vipcard.png" alt="" />
				</li>
				<li class="five">
					<a class="one" href="">漓江盛宴会所</a>
					<a class="two" href="">去看看</a>
					<p>会员专享8.8~9.5折</p>
					<img src="__PUBLIC__/images/vipcard.png" alt="" />
				</li>
				<li class="six">
					<a class="one" href="">漓江盛宴会所</a>
					<a class="two" href="">去看看</a>
					<p>会员专享8.8~9.5折</p>
					<img src="__PUBLIC__/images/vipcard.png" alt="" />
				</li>
				<li class="seven">
					<a class="one" href="">漓江盛宴会所</a>
					<a class="two" href="">去看看</a>
					<p>会员专享8.8~9.5折</p>
					<img src="__PUBLIC__/images/vipcard.png" alt="" />
				</li>
				<li class="eight">
					<a class="one" href="">漓江盛宴会所</a>
					<a class="two" href="">去看看</a>
					<p>会员专享8.8~9.5折</p>
					<img src="__PUBLIC__/images/vipcard.png" alt="" />
				</li>
			</ul>
		</div>
		<!-- 左边内容区域结束 -->
		<!-- 右边内容区域 -->
		<div id="right">
			<p class="one">热门商家</p>
			<div id="hot_business">
				<p>李记米粉</p>
				<img class="one" src="__PUBLIC__/images/pic/2.png" alt="" />
				<a href="">桂林米粉产生于秦代，上面的“离合器”完完全全就是秦时的农具“耒”的形象。</a>
				<img class="two" src="__PUBLIC__/images/ico_08.png" alt="" />
				<img class="three" src="__PUBLIC__/images/ico_08.png" alt="" />
				<span class="one">优惠劵</span>
				<span class="two">会员卡</span>
				<span class="three">[ 8 ]</span>
				<span class="four">[ 2 ]</span>
			</div>
			<div id="hot_business_02">
				<p>李记米粉</p>
				<img class="one" src="__PUBLIC__/images/pic/2.png" alt="" />
				<a href="">桂林米粉产生于秦代，上面的“离合器”完完全全就是秦时的农具“耒”的形象。</a>
				<img class="two" src="__PUBLIC__/images/ico_08.png" alt="" />
				<img class="three" src="__PUBLIC__/images/ico_08.png" alt="" />
				<span class="one">优惠劵</span>
				<span class="two">会员卡</span>
				<span class="three">[ 8 ]</span>
				<span class="four">[ 2 ]</span>
			</div>
			<div id="hot_business_03">
				<p>李记米粉</p>
				<img class="one" src="__PUBLIC__/images/pic/2.png" alt="" />
				<a href="">桂林米粉产生于秦代，上面的“离合器”完完全全就是秦时的农具“耒”的形象。</a>
				<img class="two" src="__PUBLIC__/images/ico_08.png" alt="" />
				<img class="three" src="__PUBLIC__/images/ico_08.png" alt="" />
				<span class="one">优惠劵</span>
				<span class="two">会员卡</span>
				<span class="three">[ 8 ]</span>
				<span class="four">[ 2 ]</span>
			</div>
			<div id="hot_business_04">
				<p>李记米粉</p>
				<img class="one" src="__PUBLIC__/images/pic/2.png" alt="" />
				<a href="">桂林米粉产生于秦代，上面的“离合器”完完全全就是秦时的农具“耒”的形象。</a>
				<img class="two" src="__PUBLIC__/images/ico_08.png" alt="" />
				<img class="three" src="__PUBLIC__/images/ico_08.png" alt="" />
				<span class="one">优惠劵</span>
				<span class="two">会员卡</span>
				<span class="three">[ 8 ]</span>
				<span class="four">[ 2 ]</span>
			</div>
		</div>
		<!-- 右边内容区域结束 -->
		<!-- 中间内容区域 -->
		<div id="middle_card">
			<ul>
				<li class="one">
					<a class="one" href="">漓江盛宴会所</a>
					<a class="two" href="">去看看</a>
					<p>会员专享8.8~9.5折</p>
					<img src="__PUBLIC__/images/vipcard.png" alt="" />
				</li>
				<li class="two">
					<a class="one" href="">漓江盛宴会所</a>
					<a class="two" href="">去看看</a>
					<p>会员专享8.8~9.5折</p>
					<img src="__PUBLIC__/images/vipcard.png" alt="" />
				</li>
				<li class="three">
					<a class="one" href="">漓江盛宴会所</a>
					<a class="two" href="">去看看</a>
					<p>会员专享8.8~9.5折</p>
					<img src="__PUBLIC__/images/vipcard.png" alt="" />
				</li>
				<li class="four">
					<a class="one" href="">漓江盛宴会所</a>
					<a class="two" href="">去看看</a>
					<p>会员专享8.8~9.5折</p>
					<img src="__PUBLIC__/images/vipcard.png" alt="" />
				</li>
				<li class="five">
					<a class="one" href="">漓江盛宴会所</a>
					<a class="two" href="">去看看</a>
					<p>会员专享8.8~9.5折</p>
					<img src="__PUBLIC__/images/vipcard.png" alt="" />
				</li>
				<li class="six">
					<a class="one" href="">漓江盛宴会所</a>
					<a class="two" href="">去看看</a>
					<p>会员专享8.8~9.5折</p>
					<img src="__PUBLIC__/images/vipcard.png" alt="" />
				</li>
			</ul>
		</div>
		<!-- 中间内容区域结束 -->
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