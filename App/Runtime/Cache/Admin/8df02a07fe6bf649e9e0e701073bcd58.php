<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 a//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>商家查看验证|惠校园</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="惠桂林,huigl,优惠,优惠券,吃喝玩乐,惠享生活,折扣,划算,便宜,打折"> <!-- 向搜索引擎说明你的网页的关键词； --> 
<meta name="description" content=" 惠桂林网- 桂林最早，口碑最好的网络优惠平台！超省钱巨划算！惠桂林网为您精选自助餐、电影票、KTV、美发、足浴特色商家，享尽无敌优惠"> <!-- 告诉搜索引擎你的站点的主要内容；  -->
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/config.js"></script>
<script type="text/javascript" src="__PUBLIC__/admin/js/validatemanagement.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/global.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/viewvalidate.css" />
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
					<li><a href="<?php echo U('Admin/ValidateManagement/multivalidate');?>" class="multi">批量验证</a></li>
					<li><a href="<?php echo U('Admin/ValidateManagement/viewvalidate');?>" class="view current">已验证优惠券</a></li>
				</ul>
			</div>
			<div class="function_content_box">
				<form action="">
					<div class="coupon_detail_box">
						<table>
							<tr>
								<th class="one">序号</th>
								<th class="three">
									<p>

										<select name="" id="select_coupon">
											<option value="0">全部优惠券</option>
                                            <?php if(is_array($couponTypes)): foreach($couponTypes as $key=>$couponType): ?><option value="<?php echo ($couponType["coupon_id"]); ?>"><?php echo ($couponType["description"]); ?></option><?php endforeach; endif; ?>
										</select>
									</p>
								</th>
								<th class="four">消费时间</th>
								<th class="five">手机号</th>
								<th class="six">优惠券密码</th>
							</tr>
                            <?php if(is_array($coupon_info)): foreach($coupon_info as $key=>$coupon): ?><tr>
								<td><span><?php echo ($key+1); ?></span></td>
								<td><a href="/index.php/Coupon/detail/<?php echo ($coupon["coupon_id"]); ?>"><?php echo ($coupon["description"]); ?></a></td>
								<td><a href=""><?php echo ($coupon["updatetime"]); ?></a></td>
								<td><span><?php echo ($coupon["telephone"]); ?></span></td>
								<td><span class="bold"><?php echo ($coupon["code"]); ?></span></td>
							</tr><?php endforeach; endif; ?>
						</table>
						<input type="hidden" value="<?php echo ($couponids); ?>" id="couponids" />
						<ul class="page_box clearfix">
							<!-- <li class="one"><a href="" class="one">首页</a></li>
							<li><a href=""><</a></li>
							<li><a href="" class="red">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">></a></li>
							<li class="one"><a href="" class="one">尾页</a></li> -->
							<li class="one"><a href="/trunk<?php echo ($pageArrayInfo["url"]); ?>?pageNow=1" class="one">首页</a></li>
							<?php echo ($pageArrayInfo["previous"]); ?>
							<?php $__FOR_START_9035__=$pageArrayInfo["start"];$__FOR_END_9035__=$pageArrayInfo["end"];for($i=$__FOR_START_9035__;$i < $__FOR_END_9035__;$i+=1){ if(($pageNow == $i)): ?><li><a class="red" href="/trunk<?php echo ($pageArrayInfo["url"]); ?>?pageNow=<?php echo ($i); ?>"><?php echo ($i); ?></a></li>
					               <?php else: ?>
					               <li><a href="/trunk<?php echo ($pageArrayInfo["url"]); ?>?pageNow=<?php echo ($i); ?>"><?php echo ($i); ?></a></li><?php endif; } ?>
							<?php echo ($pageArrayInfo["nexts"]); ?>
							
							<li class="one"><a href="/trunk<?php echo ($pageArrayInfo["url"]); ?>?pageNow=<?php echo ($pageAll); ?>" class="one">尾页</a></li>
						</ul>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>