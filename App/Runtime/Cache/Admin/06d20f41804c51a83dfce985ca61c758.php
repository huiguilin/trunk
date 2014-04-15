<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 a//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>商家登录|惠校园</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="惠桂林,huigl,优惠,优惠券,吃喝玩乐,惠享生活,折扣,划算,便宜,打折"> <!-- 向搜索引擎说明你的网页的关键词； --> 
<meta name="description" content=" 惠桂林网- 桂林最早，口碑最好的网络优惠平台！超省钱巨划算！惠桂林网为您精选自助餐、电影票、KTV、美发、足浴特色商家，享尽无敌优惠"> <!-- 告诉搜索引擎你的站点的主要内容；  -->
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/admin/js/login.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/config.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/global.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/login.css" />
</head>
<body>
	<!-- 顶部区域 -->
	<div id="top_content_box">
		<div id="top_middle_box">
			<a href="<?php echo U('Home/Index/index');?>" class="logoimg_box"><img src="__PUBLIC__/images/logo.png" alt="" /></a>
			<p>商家中心</p>
			
			<?php if(($_SESSION['user']['user_id']!= '') and ($templateName != 'login')): ?><a href="" class="one">您好，<?php echo ($_SESSION['user']['name']); ?></a>
				<a href="<?php echo U('Home/User/logout','','','');?>/type/0" class="two">退出</a>
			<?php else: ?>
				<a href="" class="one">登录</a>
				<a href="<?php echo U('Home/Index/index');?>" class="two">惠校园首页</a><?php endif; ?>

		</div>
	</div>
	<!-- 顶部区域结束 -->
	<div id="main">
		<div class="top_box">
			<p class="title">商家登录</p>
		</div>
		<div class="content_box">
			<div class="left_box">
				<form>
					<label for="username" class="username">账号<input type="text" name="username" class="username" placeholder="用户名"/></label>
					<label for="password" class="password">密码<input type="password" name="password" class="password" placeholder="密码"/></label>
					<label for="rememberPWD" class="rememberPWD"><input type="checkbox" name="rememberPWD" class="rememberPWD" >记住密码</label>
					<a href="" class="forgetPWD">忘记密码？</a>
					<input type="submit" name="submit_btn" value="登录" id="submit_btn" vcodeMark="no"/>
					<p class="error_tips_01"></p>
					<p class="error_tips_02"></p>
				</form>
			</div>
			<div class="right_box">
				<p class="one">用心铸造一流商家后台</p>
				<img src="__PUBLIC__/images/bg_img.png" alt="" class="bg"/>
				<img src="__PUBLIC__/images/weibo_barcode.png" alt="" class="barcode"/>
				<p class="two">扫描二维码关注“惠校园”官方微博</p>
			</div>
		</div>
	</div>
</body>
</html>