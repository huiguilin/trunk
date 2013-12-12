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
		
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/eula.css" />
<!-- 关于我们页面的内容 -->
<div id="left_card">
	<p class="one">惠桂林用户协议</p>

	<p class="two">
		惠桂林网（www.huigl.com）所提供的各项服务的所有权和运作权均归桂林惠桂林网络科技有限公司（以下简称“惠桂林”）所有。惠桂林用户使用协议（以下简称“本协议”）系由惠桂林网用户与惠桂林就惠桂林网的各项服务所订立的相关权利义务规范。用户通过访问和/或使用本网站，即表示接受并同意本协议的所有条件和条款。惠桂林作为惠桂林网（www.huigl.com）的运营者依据本协议为用户提供服务。不愿接受本协议条款的，不得访问或使用本网站。
	</p>
	<p class="three">
		惠桂林有权对本协议条款进行修改，修改后的协议一旦公布即有效代替原来的协议。用户可随时查阅最新协议。《知识产权声明》及《商户收录声明》为本协议不可分割的组成部分。用户参与惠桂林网团购时，还须同意及遵守《团购用户协议》，并遵守相关团购规则。
	</p>
	<p class="four">
		一、服务内容</br></br>
		1、惠桂林网运用自己的系统，通过互联网络等方式为用户提供商户信息、点评信息、消费信息、优惠信息、电子会员卡、团购等网络服务。</br>
		2、用户必须自行准备如下设备和承担如下开支：</br>（1）上网设备，包括并不限于电脑或者其他上网终端、调制解调器及其他上网装置;</br>（2）上网开支，包括并不限于网络接入费、上网设备租用费、手机流量费等。</br>
		3、用户提供的注册资料，用户同意：</br>（1）提供合法、真实、准确、详尽的个人资料； </br>（2）如有变动，及时更新用户资料。如果用户提供的注册资料不合法、不真实、不准确、不详尽的，用户需承担因此引起的相应责任及后果，并且四和保留终止用户使用惠桂林网各项服务的权利。</br>
		</br>
		二、服务的提供、修改及终止</br></br>
		1、用户在接受惠桂林网各项服务的同时，同意接受惠桂林网提供的各类信息服务。用户在此授权四和可以向其电子邮件、手机、通信地址等发送商业信息。用户有权选择不接受惠桂林网提供的各类信息服务，并进入惠桂林网相关页面进行更改。</br>
		2、惠桂林网保留随时修改或中断服务而不需通知用户的权利。惠桂林网有权行使修改或中断服务的权利，不需对用户或任何无直接关系的第三方负责。</br>
		3、用户对本协议的修改有异议，或对惠桂林网的服务不满，可以行使如下权利：</br>
		（1）停止使用惠桂林网的网络服务；</br>
		（2）通过客服等渠道告知惠桂林网停止对其服务。 结束服务后，用户使用惠桂林网络服务的权利立即终止。在此情况下，惠桂林网没有义务传送任何未处理的信息或未完成的服务给用户或任何无直接关系的第三方。
		</br>
		</br>
		三、用户信息的保密</br></br>
		1、本协议所称之惠桂林网用户信息是指符合法律、法规及相关规定，并符合下述范围的信息：</br>
		（1）用户注册惠桂林网或申请惠桂林网会员卡时，向惠桂林网提供的个人信息；</br>
		（2）用户在使用惠桂林网服务、参加网站活动或访问网站网页时，惠桂林网自动接收并记录的用户浏览器端或手机客户端数据，包括但不限于IP地址、网站Cookie中的资料及用户要求取用的网页记录；</br>
		（3）惠桂林网从商业伙伴处合法获取的用户个人信息；</br>
		（4）其它惠桂林网通过合法途径获取的用户个人信息。</br>
		2、惠桂林网承诺：</br>
		非经法定原因或用户事先许可，惠桂林网不会向任何第三方透露用户的密码、姓名、手机号码等非公开信息</br>
		3、在下述法定情况下，用户的个人信息将会被部分或全部披露：</br>
		（1）经用户同意向用户本人或其他第三方披露；</br>
		（2）根据法律、法规等相关规定，或行政机构要求，向行政、司法机构或其他法律规定的第三方披露；</br>
		（3）其它惠桂林网根据法律、法规等相关规定进行的披露。</br>
		</br>
		四、用户权利</br></br>
		1、用户的用户名、密码和安全性</br>
		（1）用户有权选择是否成为惠桂林网会员，用户选择成为惠桂林网注册用户的，可自行创建、修改昵称。用户名和昵称		的命名及使用应遵守相关法律法规并符合网络道德。用户名和昵称中不能含有任何侮辱、威胁、淫秽、谩骂等侵害他人合法权益的文字。</br>
		（2）用户一旦注册成功，成为惠桂林网的会员，将得到用户名（用户邮箱）和密码，并对以此组用户名和密码登入系统后所发生的所有活动和事件负责，自行承担一切使用该用户名的言语、行为等而直接或者间接导致的法律责任。</br>
		（3）用户有义务妥善保管惠桂林网账号、用户名和密码，用户将对用户名和密码安全负全部责任。因用户原因导致用户名或密码泄露而造成的任何法律后果由用户本人负责。</br>
		（4）用户密码遗失的，可以通过注册电子邮箱发送的链接重置密码，以手机号码注册的用户可以凭借手机号码找回原密码。用户若发现任何非法使用用户名或存在其他安全漏洞的情况，应立即告知惠桂林网。</br>
		2、用户有权在注册并登陆后对站内商户发布客观、真实、亲身体验的点评信息和图片；</br>
		3、用户有权在注册并登陆后自行添加商户、完善站内商户的营业时间、交通等信息；</br>
		4、用户有权根据网站相关规定，在发布点评信息等贡献后，取得惠桂林网给予的奖励；</br>
		5、用户有权修改其个人账户中各项可修改信息，自行选择昵称和录入介绍性文字，自行决定是否提供非必填项的内容；</br>
		6、用户有权参加惠桂林网社区，并发表符合国家法律规定，并符合惠桂林网社区规则的文章及观点；</br>
		7、用户有权根据网站相关规定，获得惠桂林网给与的奖励；</br>
		8、用户有权参加惠桂林网组织提供的各项线上、线下活动；</br>
		9、用户在取得惠桂林网发放的会员卡后，有权至所在城市会员卡商户进行消费、获得折扣或积分、并根据网站相关规定进行积分兑换等。据国家工商总局颁布的《合同违法行为监督处理办法》，自2010年11月起，惠桂林网现行有效、各种形式的会员卡（包括但不限于各种商户联名卡等），“最终解释权归惠桂林网所有”、“惠桂林网拥有此卡内容的最终解释权及变更权”等内容一概废止。
		10、用户有权在惠桂林网上自行浏览、下载和使用优惠券。</br>
		11、用户有权下载安装惠桂林网手机客户端并使用其功能。</br>
		12、用户有权根据《团购用户协议》及相关团购规则，参加惠桂林网团购；</br>
		13用户有权根据惠桂林网网站规定，享受惠桂林网提供的其它各类服务。</br>
		</br>
		五、用户义务</br></br>
		1、不得利用本站危害国家安全、泄露国家秘密，不得侵犯国家社会集体的和公民的合法权益，不得利用本站制作、复制和传播下列信息：</br>
		（1）煽动抗拒、破坏宪法和法律、行政法规实施的；</br>
		（2）煽动颠覆国家政权，推翻社会主义制度的；</br>
		（3）煽动分裂国家、破坏国家统一的；</br>
		（4）煽动民族仇恨、民族歧视，破坏民族团结的；</br>
		（5）捏造或者歪曲事实，散布谣言，扰乱社会秩序的；</br>
		（6）宣扬封建迷信、淫秽、色情、赌博、暴力、凶杀、恐怖、教唆犯罪的；</br>
		（7）公然侮辱他人或者捏造事实诽谤他人的，或者进行其他恶意攻击的；</br>
		（8）损害国家机关信誉的；</br>
		（9）其他违反宪法和法律行政法规的；</br>
		（10）进行商业广告行为的。</br>
		2、用户不得通过任何手段恶意注册惠桂林网站账号，包括但不限于以牟利、炒作、套现、获奖等为目的多个账号注册。用户亦不得盗用其他用户账号。如用户违反上述规定，则惠桂林网有权直接采取一切必要的措施，包括但不限于删除用户发布的内容、取消用户在网站获得的星级、荣誉以及虚拟财富，暂停或查封用户账号，取消因违规所获利益，乃至通过诉讼形式追究用户法律责任等。</br>
		3、用户需维护点评的客观、真实性，不得利用惠桂林网用户身份进行违反诚信的任何行为，包括但不限于：炒作商户，并向商户收取费用或获取利益；为获得利益或好处，参与或组织撰写及发布虚假点评；以差评威胁，要求商户提供额外的利益或好处；进行其他其它影响点评真实性、客观性、干扰扰乱网站正常秩序的违规行为等。如用户违反上述规定，则惠桂林网有权采取一切必要的措施，包括但不限于：删除用户发布的内容、取消用户在网站获得的星级、荣誉以及虚拟财富，暂停或查封用户帐号，取消因违规所获利益，乃至通过诉讼形式追究用户法律责任等。</br>
		4、禁止用户将惠桂林网以任何形式作为从事各种非法活动的场所、平台或媒介。未经惠桂林网的授权或许可，用户不得借用本站的名义从事任何商业活动，也不得以任何形式将惠桂林网作为从事商业活动的场所、平台或媒介。如用户违反上述规定，则惠桂林网有权直接采取一切必要的措施，包括但不限于删除用户发布的内容、取消用户在网站获得的星级、荣誉以及虚拟财富，暂停或查封用户帐号，取消因违规所获利益，乃至通过诉讼形式追究用户法律责任等。</br>
		5、用户在惠桂林网以各种形式发布的一切信息，均应符合国家法律法规等相关规定及网站相关规定，符合社会公序良俗，并不侵犯任何第三方主体的合法权益，否则用户自行承担因此产生的一切法律后果，且汉涛因此受到的损失，有权向用户追偿。
		</br>
		</br>
		六、知识产权及其它权利</br></br>
		1、用户已经明确阅读，并明确了解本网站的《知识产权声明》。</br>
		2、任何用户接受本协议，即表明该用户主动将其在任何时间段在本站发表的任何形式的信息的著作财产权，包括并不限于：复制权、发行权、出租权、展览权、表演权、放映权、广播权、信息网络传播权、摄制权、改编权、翻译权、汇编权等，以及应当由著作权人享有的其他可转让权利无偿独家转让给惠桂林网运营商所有，同时表明该用户许可惠桂林网有权利就任何主体侵权而单独提起诉讼，并获得全部赔偿。 本协议已经构成《著作权法》第二十五条所规定的书面协议，其效力及于用户在惠桂林网发布的任何受著作权法保护的作品内容，无论该内容形成于本协议签订前还是本协议签订后。</br>
		3、四和是惠桂林网的制作者,拥有此网站内容及资源的版权,受国家知识产权保护,享有对本网站各种协议、声明的修改权；未经四和的明确书面许可，任何第三方不得为任何非私人或商业目的获取或使用本网站的任何部分或通过本网站可直接或间接获得的任何内容、服务或资料。任何第三方违反本协议的规定以任何方式，和/或以任何文字对本网站的任何部分进行发表、复制、转载、更改、引用、链接、下载或以其他方式进行使用，或向任何其他第三方提供获取本网站任何内容的渠道，则对本网站的使用权将立即终止，且任何第三方必须按照本公司的要求，归还或销毁使用本网站任何部分的内容所创建的资料的任何副本。</br>
		4、惠桂林网未向任何第三方转让本网站或其中的任何内容所相关的任何权益或所有权，且一切未明确向任何第三方授予的权利均归四和所有。未经本协议明确允许而擅自使用本网站任何内容、服务或资料的，构成对本协议的违约行为，且可能触犯著作权、商标、专利和/或其他方面的法律法规，四和保留对任何违反本协议规定的第三方（包括单位或个人等）提起法律诉讼的权利。</br>
		5、本公司可按自身判断随时对本协议进行修改及更新。对本协议的所有改动一经发布即产生法律效力，并适用于改动发布后对本网站的一切访问和使用行为。如用户在修改后的本协议发布后继续使用本网站的，即代表用户接受并同意了这些改动。用户应定期查看本网页，了解对用户具有约束力的本协议的任何改动。
		</br></br>
		七、拒绝担保与免责</br></br>
		1、惠桂林网作为“网络服务提供者”的第三方平台，不担保网站平台上的信息及服务能充分满足用户的需求。对于用户在接受惠桂林网的服务过程中可能遇到的错误、侮辱、诽谤、不作为、淫秽、色情或亵渎事件，惠桂林网不承担法律责任。</br>
		2、基于互联网的特殊性，惠桂林网也不担保服务不会受中断，对服务的及时性、安全性都不作担保，不承担非因惠桂林网导致的责任。惠桂林网力图使用户能对本网站进行安全访问和使用，但惠桂林网不声明也不保证本网站或其服务器是不含病毒或其它潜在有害因素的；因此用户应使用业界公认的软件查杀任何自惠桂林网下载文件中的病毒。</br>
		3、惠桂林网不对用户所发布信息的保存、修改、删除或储存失败负责。对网站上的非因惠桂林网故意所导致的排字错误、疏忽等不承担责任。惠桂林网有权但无义务，改善或更正本网站任何部分之疏漏、错误。</br>
		4、除非惠桂林网以书面形式明确约定，惠桂林网对于用户以任何方式（包括但不限于包含、经由、连接或下载）从本网站所获得的任何内容信息，包括但不限于广告、商户信息、点评内容等，不保证其准确性、完整性、可靠性；对于用户因本网站上的内容信息而购买、获取的任何产品、服务、信息或资料，惠桂林网不承担责任。用户自行承担使用本网站信息内容所导致的风险。</br>
		5、惠桂林网内所有用户所发表的用户点评，仅代表用户个人观点，并不表示本网站赞同其观点或证实其描述，本网站不承担用户点评引发的任何法律责任。</br>
		6、四和有权删除惠桂林网站内各类不符合法律或协议规定的点评，而保留不通知用户的权利。</br>
		7、所有发给用户的通告，惠桂林网都将通过正式的页面公告、站内信、电子邮件、客服电话、手机短信或常规的信件送达。任何非经惠桂林网正规渠道获得的中奖、优惠等活动或信息，惠桂林网不承担法律责任。</br>
		</br>

		八、侵权投诉</br></br>
		1、据《中华人民共和国侵权责任法》第三十六条，任何第三方认为，用户利用惠桂林网平台侵害本人民事权益或实施侵权行为的，包括但不限于侮辱、诽谤等，被侵权人有权书面通知惠桂林网采取删除、屏蔽、断开链接等必要措施。</br>
		2、据《信息网络传播权保护条例》，任何第三方认为，惠桂林网所涉及的作品、表演、录音录像制品，侵犯自己的信息网络传播权或者被删除、改变了自己的权利管理电子信息的，可以向惠桂林网提交书面通知，要求惠桂林网删除该侵权作品，或者断开链接。通知书应当包含下列内容：</br>
		（一）权利人的姓名（名称）、联系方式和地址；</br>
		（二）要求删除或者断开链接的侵权作品、表演、录音录像制品的名称和网络地址；</br>
		（三）构成侵权的初步证明材料。</br>
		权利人应当对通知书的真实性负责。</br>
		此外，为使惠桂林网能及时、准确作出判断，还请侵权投诉人一并提供以下材料：</br>
		3、任何第三方（包括但不限于企业、公司、单位或个人等）认为惠桂林网用户发布的任何信息侵犯其合法权益的，包括但不限于以上两点，在有充分法律法规及证据足以证明的情况下，均可以通过下列联系方式通知惠桂林网：</br></br>
		邮寄地址：广西省桂林市高新区桂磨大道互联网产业基地503</br></br>
		邮政编码：541000</br></br>
		收件人：惠桂林网客服部</br></br>
		客服信箱：________________</br></br>
		4、侵权投诉必须包含下述信息：</br>
		（1）被侵权人的证明材料，或被侵权作品的原始链接及其它证明材料。</br>
		（2）侵权信息或作品在惠桂林网上的具体链接。</br>
		（3）侵权投诉人的联络方式，以便惠桂林网相关部门能及时回复您的投诉，最好包括电子邮件地址、电话号码或手机等。</br>
		（4）投诉内容须纳入以下声明：“本人本着诚信原则，有证据认为该对象侵害本人或他人的合法权益。本人承诺投诉全部信息真实、准确，否则自愿承担一切后果。”</br>
		（5）本人亲笔签字并注明日期，如代理他人投诉的，必须出具授权人签字的授权书。</br>
		5、惠桂林网建议用户在提起投诉之前咨询法律顾问或律师。我们提请用户注意：如果对侵权投诉不实，则用户可能承担法律责任。</br>
		</br>
		九、适用法律和裁判地点</br></br>
		1、因用户使用惠桂林网站而引起或与之相关的一切争议、权利主张或其它事项，均受中华人民共和国法律的管辖。</br>
		2、用户和惠桂林网发生争议的，应首先本着诚信原则通过协商加以解决。如果协商不成，则应向四和所在地人民法院提起诉讼。</br>
		</br>
		十、可分性</br></br>
		如果本协议的任何条款被视为不合法、无效或因任何原因而无法执行，则此等规定应视为可分割，不影响任何其它条款的法律效力。
		</br></br>
		十一、冲突选择</br></br>
		本协议是惠桂林网与用户注册成为惠桂林网用户，使用惠桂林网服务之间的重要法律文件，惠桂林网或者用户的任何其他书面或者口头意思表示与本协议不一致的，均应当以本协议为准。
	</p>		
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