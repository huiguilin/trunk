<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 a//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="惠桂林,huigl,优惠,优惠券,吃喝玩乐,惠享生活,折扣,划算,便宜,打折"> <!-- 向搜索引擎说明你的网页的关键词； --> 
<meta name="description" content=" 惠桂林网- 桂林最早，口碑最好的网络优惠平台！超省钱巨划算！惠桂林网为您精选自助餐、电影票、KTV、美发、足浴特色商家，享尽无敌优惠"> <!-- 告诉搜索引擎你的站点的主要内容；  -->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/global.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/detail.css">
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/bPopup.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery-placeholder.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/modernizr-2.6.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/header.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/detail.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>

<!--[if IE 6]-->
<!--背景图片透明方法-->
<script src="__PUBLIC__/js/iepng.js" type="text/javascript"></script>
<!--插入图片透明方法-->
<script type="text/javascript">
   EvPNG.fix('div, ul, img, li, input');  //EvPNG.fix('包含透明PNG图片的标签'); 多个标签之间用英文逗号隔开。
  
</script>
<!-- <![endif]-->

<title>惠桂林优惠劵</title>
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
					<li><a href="http://weibo.com/huigl?topnav=1&wvr=5" class="weibo">惠桂林新浪微博</a></li>
					<li><a href="http://user.qzone.qq.com/2042534770" class="qzone">惠桂林QQ空间</a></li>
					<li><a href="http://t.qq.com/ihuigl?preview" class="QQweibo">惠桂林腾讯微博</a></li>
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
		<!-- 判断登录Session,来显示不同的ul -->
		<?php if($_SESSION['user_id']== ''): ?><ul id="No_login_box">
				<li class="one"><a class="one" id="Userlogin">登录</a></li>
				<li><a class="two" id="Userreg">快速注册</a></li>
			</ul>
			<?php else: ?>
			<ul id="login_box">
				<li><a>您好,effie</a></li>
				<li class="no_right_border"><a href="">我的惠桂林</a></li>
			</ul><?php endif; ?>
		<div id="Userreg_box">
			<div id="u_top">
				<a id="a_closed2"><img src="__PUBLIC__/images/login_closed.png"></a>
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
						<img src="/index.php/User/verifyImg" class="one">
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
						<a href="javascript:void(0)" id="sendcode" name="sendcode">点击发送验证码</a>
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
				<p class="count">如果没有选择，页面将在<span>3秒</span>后自动关闭此窗口。</p>
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
					<img src="/index.php/User/verifyImg" id="vcode_img">
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
<!-- Logo区域结束

<!-- 顶部订阅分享区域+Logo区域结束 -->
<!--  导航区域 -->
	<!--   导航区域 -->
	<div id="top_nav">
		<div id="top_nav_box">
			<div id="left_collection">
				<img class="left_img" src="__PUBLIC__/images/classification/menu.png" alt="" />	
				<span>全部分类</span>
			</div>
			<ul id="nav">
				<li><a href="<?php echo U("Index/index");?>">首页</a></li>
				<li style="background:#DA4453;font-weight:bold"><a href="<?php echo U("Coupon/coupon");?>">优惠券</a></li>
				<!-- <li><a href="<?php echo U("Card/card");?>">会员卡</a></li>
				<li class="border_right "><a href="">商户</a></li> -->
			</ul>
			<form id="search_box" method="get" action="<?php echo U("Home/Search/search");?>">
				<input id="search_con" type="text" placeholder="桂林环球美食节" name="search_con"/>
				<input id="search_btn" type="submit" value="" name="search_btn"/>
			</form>
		</div>
	</div>
<!-- 导航区域结束
<!-- 导航区域结束-->
<!-- 内容区域 -->
	<div id="main">
		<div id="sub_nav_box">
			<div class="content_box">
				<a href="">桂林优惠</a><span>></span><a href="">美食</a><span>></span><a href="">火锅</a><span>></span><a href="" class="gray">海底捞</a>
			</div>
		</div>
		<div id="coupon_box">
			<div class="coupon_detail_info_box">
				<div class="effective_date_box">
					<p class="effective_date">优惠券有效期： <?php echo ($coupon["start_time"]); ?> - <?php echo ($coupon["end_time"]); ?></p>
					<p class="download_number">下载次数：<span><?php echo ($coupon["download_times"]); ?></span></p>
					<p class="view_number">查看次数：<span>431234</span></p>
				</div>
				<div class="coupon_desc_box">
					<p class="coupon_title"><?php echo ($coupon["title"]); ?><span><?php echo ($coupon["title"]); ?></span></p>
				</div>
				<a href="javascript:print();" class="print_coupon_btn">打印此优惠券</a>
				<a href="javascript:void(0);" class="download_coupon_btn" id="download_coupon_btn">下载到手机</a>
				<img src="__PUBLIC__/<?php echo ($coupon["picture_path"]); ?>" class="coupon_pic">
				<div class="coupon_detail_desc_box">
					<p class="desc_title">详细介绍</p>
					<p class="desc_content"><span><?php echo ($coupon["description"]); ?></span></p>
					<div>
						<p>使用须知</p>
						<p>有效期：<span>2013.6.22 至 2014.6.22</span></p>
						<p>不可用日期：<span>2013年10月1日至10月3日、10月30日至10月31日、11月1日、12月24日至12月25日、2014年1月1日、2月14日、5月1日至5月3日、6月1日</span></p>
						<p>使用时间：<span>11:30-14:00,17:30-21:30</span></p>
						<p>预约提醒：<span>无需预约</span></p>
						<p>使用规则：</p>
						<ul>
							<li>凭惠桂林券到店消费不可同时享受店内其他优惠</li>
							<li>本单在惠桂林券使用时间内不限用餐时长</li>
							<li>儿童无优惠</li>
							<li>每张惠桂林券限1桌使用</li>
							<li>仅限堂食，不提供餐前外带及餐后打包</li>
							<li>仅限大厅就餐，不可使用包间</li>
							<li class="bottom">部分菜品因时令原因有所不同，请以店内当日实际供应为准</li>
						</ul>
					</div>
				</div>
				<a href="" class="print_coupon_btn print_coupon_btn2">打印此优惠券</a>
				<a href="javascript:void(0);" class="download_coupon_btn" id="download_coupon_btn_two">下载到手机</a>
				<a id="download_coupon_id" style="visibility:hidden" value="<?php echo ($coupon["coupon_id"]); ?>"><?php echo ($coupon["coupon_id"]); ?></a>
			</div>
			<div class="share">
				<a href="" class="add_favorite">收藏到我的券包</a>
				<p>分享到</p>
				<ul>
					<li><a href="" class="one"></a></li>
					<li><a href="" class="two"></a></li>
					<li><a href="" class="three"></a></li>
					<li><a href="" class="four"></a></li>
					<li><a href="" class="five"></a></li>
					<li><a href="" class="six"></a></li>
				</ul>
			</div>
			<div class="other_coupons_box">
				<p class="other_coupon_title">本商户其他优惠券</p>
                <?php if(is_array($other_coupon)): foreach($other_coupon as $key=>$ocoupon): ?><p class="other_coupon_content">[<?php echo ($partner["name"]); ?>]<span><?php echo ($ocoupon["title"]); ?></span></p><?php endforeach; endif; ?>
			</div>
			<div class="business_detail_info_box">
				<ul class="business_nav clearfix">
					<li class="no_bottom_border"><a href="" >商家介绍</a></li>
					<li><a href="">商家位置</a></li>
					<li><a href="">评价晒单(15)</a></li>
				</ul>
				<div class="business_location">
					<p class="title">商家位置</p>
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
							<div class="shop_box">
								<p>同一首歌KTV(6家分店)</p>
								<select>
									<option>同一首歌KTV(西直门分店)</option>
									<option>同一首歌KTV(东直门分店)</option>
									<option>同一首歌KTV(三元桥分店)</option>
									<option>同一首歌KTV(望京分店)</option>
									<option>同一首歌KTV(天安门分店)</option>
								</select>
							</div>
							<div class="detail_map_box" id="detail_map_box"></div>
						</div>
						<ul>
							<li class="white">
								<p class="address_title">多乐之日(北京南站店)</p>
								<div>
									<p class="subway">地铁：距离北京南站约66米</p>
									<p class="telephone">电话：010-51331101</p>
									<p class="address">地址：丰台区北京南站商业高架底商D102号</p>
								</div>
							</li>
							<li>
								<p class="address_title">多乐之日(北京南站店)</p>
								<div class="hidden">
									<p class="subway">地铁：距离北京南站约66米</p>
									<p class="telephone">电话：010-51331101</p>
									<p class="address">地址：丰台区北京南站商业高架底商D102号</p>
								</div>
							</li>
							<li>
								<p class="address_title">多乐之日(北京南站店)</p>
								<div class="hidden">
									<p class="subway">地铁：距离北京南站约66米</p>
									<p class="telephone">电话：010-51331101</p>
									<p class="address">地址：丰台区北京南站商业高架底商D102号</p>
								</div>
							</li>
							<li>
								<p class="address_title">多乐之日(北京南站店)</p>
								<div class="hidden">
									<p class="subway">地铁：距离北京南站约66米</p>
									<p class="telephone">电话：010-51331101</p>
									<p class="address">地址：丰台区北京南站商业高架底商D102号</p>
								</div>
							</li>
							<a href="" class="summary_number">查看全部分店(共22家)</a>
						</ul>
					</div>
				</div>
				<div class="business_intro">
					<p class="title">商户介绍</p>
					<p class="business_name"><?php echo ($partner["name"]); ?></p>
					<p class="business_intro_detail"><?php echo ($partner["decription"]); ?></p>
				</div>
				<div class="show_comment">
					<div class="comment_performance">
						<p class="title">晒单点评</p>
						<ul>
							<li>
								<p class="three">4.6<span>分</span></p>
								<span class="rate_stars">
									<span style="width: 80%;"></span>
								</span>
							</li>
							<li>
								<p class="one">已有<span>143</span>人对本优惠券做出评价</p>
								<p class="two"><span>97.12%</span>的会员满意本优惠券</p>
							</li>
							<li class="no_border_right">
								<p>我在惠桂林下载过此优惠券</p>
								<a href="">我要评论</a>
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
                        <?php if(is_array($evaluation)): foreach($evaluation as $key=>$eva): ?><li>
								<p class="one"><?php echo ($eva["nickname"]); ?><span class="red"><?php echo ($partner["name"]); ?></span><span><?php echo ($eva["createtime"]); ?></span><span class="rate_stars"><span style="width: 80%;"></span></span></p>
								<p class="two"><?php echo ($eva["evaluation"]); ?></p>
								<p class="three">小肥羊（ 三里店分店）</p>
							</li><?php endforeach; endif; ?>
						</ul>
						<ul class="page_box clearfix">
							<li><a href="" class="one">首页</a></li>
							<li><a href=""><</a></li>
							<li><a href="" class="red">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">></a></li>
							<li><a href="" class="one">尾页</a></li>
						</ul>
					</div>	
				</div>
			</div>
			<div id="webchat_box">
				<p>扫一下，关注惠桂林微信</p>
				<img src="__PUBLIC__/images/barcode.png">
			</div>
			<div id="hot_tips_box">
				<p class="title">温馨提示</p>
				<ul>
					<li>相同的信息，一个手机号24小时内只能接收5条；</li>
					<li>24小时内，您最多可接收10条来自惠桂林的短信；若注册成为惠桂林会员可享受无限制接收短信的服务</li>
				</ul>
			</div>
		</div>
		
	</div>
<!-- 内容区域结束 -->
<!-- 最底部区域 -->
	<div id="bottom_info">
		<div id="bottom_box">
			<div class="p_box">
				<p>版权归惠桂林所有，未经书面授权禁止复制或建立镜像。 Email：<a href="mailto:huigl@outlook.com">service@huigl.com</a></p>
				<p>惠桂林网客服电话：（0773）8993520</p>
				<p>地址：桂林市高新区桂磨大道互联网产业基地503室</p>
				<p>经营许可证：桂ICP备 14000606号</p>
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

<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图中添加缩放控件
        // addMarker();//向地图中添加marker
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("map");
        map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);// 创建地址解析器实例已天安门为中心
        var myGeo = new BMap.Geocoder();// 将地址解析结果显示在地图上，并调整地图视野
        myGeo.getPoint("桂林第十八中学", function(point){
        if (point) {
                map.centerAndZoom(point, 12);
                map.addOverlay(new BMap.Marker(point));
            }
        }, "桂林市");
         myGeo.getPoint("象山公园", function(point){
        if (point) {
                map.centerAndZoom(point, 12);
                map.addOverlay(new BMap.Marker(point));
            }
        }, "桂林市");
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
	var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
	map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
	var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:0}); //0代表缩略图控件折起来，1代表展开
	map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
	var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
	map.addControl(ctrl_sca);
    }
    
 
    initMap();//创建和初始化地图
</script>

</html>