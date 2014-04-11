<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 a//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="惠校园,huigl,优惠,优惠券,吃喝玩乐,惠享生活,折扣,划算,便宜,打折"> <!-- 向搜索引擎说明你的网页的关键词； --> 
<meta name="description" content=" 惠校园网- 桂林最早，口碑最好的网络优惠平台！超省钱巨划算！惠校园网为您精选自助餐、电影票、KTV、美发、足浴特色商家，享尽无敌优惠"> <!-- 告诉搜索引擎你的站点的主要内容；  -->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/print.css">
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
<title><?php echo ($couponInfo['name']); ?> | 打印优惠劵</title>
</head>
<body>
	<div id="top_logo_box">
		<a href="<?php echo U("Index/index");?>" class="logoimg_box"><img src="__PUBLIC__/images/logo2.png" alt="惠校园" id="logo" /></a>
		<a href="<?php echo U("Index/index");?>" class="sloganimg_box"><img src="__PUBLIC__/images/slogan.png" alt="吃喝玩乐，惠享生活" id="slogan" /></a>
	</div>
	<div id="main_box">
		<div class="title_box">
			<span class="left"><?php echo ($couponInfo['name']); ?></span>
			<span class="right"><?php echo ($couponInfo['use_time']); ?></span>
		</div>
		<div class="content_box">
			<p class="one">短信优惠券：下载以下短信使用同样有效 <span>(短信下载完全免费，我们会严格保密您的手机号码)</span></p>
			<p class="two"><?php echo ($couponInfo['name']); ?>:凭此短信<a style="text-decoration:none;color:#ED5565" href="#"><?php echo ($couponInfo[0]); ?></a><?php echo ($couponInfo['description']); ?>
			</p>
			<p style="color:#ED5565;" class="three four">*请将此优惠打印或下载到手机上使用；</p>
			<?php if($errno == 1): ?><p style="font-weight:bold;color:#ED5565" class="three"> *抱歉，暂无描述信息；</p>
				<?php else: ?>
			<p class="three"> *<?php echo ($couponInfo['exception_time']); ?>；</p>
			<p class="three"> *<?php echo ($couponUseRule); ?>；</p><?php endif; ?>
			<p style="color:#ED5565;" class="three"> *本优惠请务必从惠校园网或其授权网站下载使用，否则无效。 </p>
			<img src="__PUBLIC__/<?php echo ($couponInfo['picture_path']); ?>" />
			<p style="font-weight:bold;color:#ED5565;" class="seven"><?php echo ($couponInfo[0]); ?>:</p>
			<p class="eight"><?php echo ($couponInfo[1]); ?></p>
		</div>
	</div>
</body>
<script type="text/javascript">
	document.onload = window.print();
</script>
</html>