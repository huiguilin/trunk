<?php if (!defined('THINK_PATH')) exit();?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>对不起，我迷路了 | 惠桂林</title>
    <style type="text/css">
       	* { margin:0; padding:0; }
       	body {
       		background: url(__PUBLIC__/images/404bg.png) repeat-x;
       	}
       	.main{
       		width:800px; 
       		height:615px; 
       		margin: 0 auto;
       	}
       	.main a.one{
       		display: block;
       		width:800px; 
       		height:615px; 
       		background:url(__PUBLIC__/images/404.png);
       	}
    </style>
</head>
<body>
    <div class="main">
       <a href="<?php echo U("Home/Index/index");?>" class="one"></a>
    </div>
</body>
</html>