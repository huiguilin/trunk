<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/global.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/about.css">
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/index.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/bPopup.js"></script>
<title>会员卡</title>
<!--[if IE 6]>
<!--背景图片透明方法-->
<script src="__PUBLIC__/js/iepng.js" type="text/javascript"></script>
<!--插入图片透明方法-->
<script type="text/javascript">
   EvPNG.fix('div, ul, img, li, input');  //EvPNG.fix('包含透明PNG图片的标签'); 多个标签之间用英文逗号隔开。
</script>
<![endif]-->

<script>
$().ready(function() {
 	$("#signupForm").validate({
 		 rules: {
 		 	firstname: "required",
 		 	email: {
    			required: true,
    			email: true
   			},


 		 },
 		 messages: {

 		 	firstname: "请输入姓名",
 		 }


 	});
});
</script>
<style type="text/css">
input{
	border:1px solid black;
}
input.error{
	border:1px solid red;
}
label.error{
	background: red;
	border:1px solid black;
  margin-left: 20px;
}
</style>
</head>
<body>
<form id="signupForm" method="get" action="">
    <p>
        <label for="firstname">Firstname</label>
        <input id="firstname" name="firstname" />
    </p>
 <p>
  <label for="email">E-Mail</label>
  <input id="email" name="email"/>
 </p>
 <p>
  <label for="password">Password</label>
  <input id="password" name="password" type="password" />
 </p>
 <p>
  <label for="confirm_password">确认密码</label>
  <input id="confirm_password" name="confirm_password" type="password" />
 </p>
    <p>
        <input class="submit" type="submit" value="Submit"/>
    </p>
</form>
</body>
</html>