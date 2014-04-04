<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 a//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>商家批量验证|惠桂林</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="惠桂林,huigl,优惠,优惠券,吃喝玩乐,惠享生活,折扣,划算,便宜,打折"> <!-- 向搜索引擎说明你的网页的关键词； --> 
<meta name="description" content=" 惠桂林网- 桂林最早，口碑最好的网络优惠平台！超省钱巨划算！惠桂林网为您精选自助餐、电影票、KTV、美发、足浴特色商家，享尽无敌优惠"> <!-- 告诉搜索引擎你的站点的主要内容；  -->
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/config.js"></script>
<script type="text/javascript" src="__PUBLIC__/admin/js/validatemanagement.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/global.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/multivalidate.css" />
</head>
<body>
	<!-- 顶部区域 -->
	<div id="top_content_box">
		<div id="top_middle_box">
			<a href="http://www.huigl.com" class="logoimg_box"><img src="__PUBLIC__/images/logo.png" alt="" /></a>
			<p>商家中心</p>
			
			<?php if(($_SESSION['user']['user_id']!= '') and ($templateName != 'login')): ?><a href="" class="one">您好，<?php echo ($_SESSION['user']['name']); ?></a>
				<a href="<?php echo U('Home/User/logout','','','');?>/type/0" class="two">退出</a>
			<?php else: ?>
				<a href="" class="one">登录</a>
				<a href="http://www.huigl.com" class="two">惠桂林首页</a><?php endif; ?>

		</div>
	</div>
	<!-- 顶部区域结束 -->
	<div id="main">
		<!-- 顶部区域 -->
		<div id="left_content_box">
			<div class="top_box">
				<p class="title">我的推广</p>
			</div>
			<div class="menu_box">
				<ul>
					<li>
						
						<a href="" class="bold">优惠券验证管理</a>
						<?php if($templateName == 'singlevalidate'): ?><a href="<?php echo U('Admin/ValidateManagement/singlevalidate');?>" class="normal currnet">单券验证</a>
							<a href="<?php echo U('Admin/ValidateManagement/multivalidate');?>" class="normal">批量验证</a>
							<a href="<?php echo U('Admin/ValidateManagement/viewvalidate');?>" class="normal">已验证优惠券</a>
						<?php elseif($templateName == multivalidate): ?>
							<a href="<?php echo U('Admin/ValidateManagement/singlevalidate');?>" class="normal">单券验证</a>
							<a href="<?php echo U('Admin/ValidateManagement/multivalidate');?>" class="normal currnet">批量验证</a>
							<a href="<?php echo U('Admin/ValidateManagement/viewvalidate');?>" class="normal">已验证优惠券</a>
						<?php else: ?>
							<a href="<?php echo U('Admin/ValidateManagement/singlevalidate');?>" class="normal">单券验证</a>
							<a href="<?php echo U('Admin/ValidateManagement/multivalidate');?>" class="normal">批量验证</a>
							<a href="<?php echo U('Admin/ValidateManagement/viewvalidate');?>" class="normal currnet">已验证优惠券</a><?php endif; ?>

					</li>
					<!-- <li>
						<a href="" class="bold">商家页面管理</a>
						<a href="" class="normal">上传商家照片</a>
						<a href="" class="normal">制作商家菜单</a>
						<a href="" class="normal">回复用户评论</a>
					</li>
					<li>
						<a href="" class="bold">财务管理</a>
						<a href="" class="normal">结算中心</a>
						<a href="" class="normal">财务数据</a>
					</li> -->
				</ul>
			</div>
		</div>
		<!-- 顶部区域结束 -->
		<div id="right_content_box">
			<div class="function_nav_box">
				<ul class="function_nav clearfix">
					<li><a href="<?php echo U('Admin/ValidateManagement/singlevalidate');?>" class="single">单券验证</a></li>
					<li><a href="<?php echo U('Admin/ValidateManagement/multivalidate');?>" class="multi current">批量验证</a></li>
					<li><a href="<?php echo U('Admin/ValidateManagement/viewvalidate');?>" class="view">已验证优惠券</a></li>
				</ul>
			</div>
			<div class="function_content_box">
				<form action="">
					<div class="coupon_code_box">
						<p class="title">请输入优惠券密码</p>
						<input type="text" name="coupon_code"/>
						<a href="" id="multi_add_btn">添加</a>
						<p class="error_tips"></p>
					</div>
					<div class="coupon_detail_box">
						<table id="validate_coupon_info">
							<tr>
								<th class="one">序号</th>
								<th class="two">操作</th>
								<th class="three">优惠券信息</th>
								<!--th class="four">门店</th-->
								<th class="five">有效期</th>
								<th class="six">优惠券密码</th>
							</tr>
                  
						</table>
						<input type="submit" name="multi_coupon_validate_confirm_btn" id="multi_coupon_validate_confirm_btn" value="确定消费" />
						<a href="" id="cancel_btn">取消</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>