<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb="http://open.weibo.com/wb">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="百度地图,百度地图API，百度地图自定义工具，百度地图所见即所得工具" />
<meta name="description" content="百度地图API自定义地图，帮助用户在可视化操作下生成百度地图" />
<title>百度地图API自定义地图</title>
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
<script>
	var arr = new Array(3333,4444,5555);
	for(var i =0; i<arr.length;i++){
		if(arr[i] == 3333){
			delete arr[i];
		}

	}
	for(var i =0; i<arr.length;i++){
		alert(arr[i]);
	}
</script>
</head>
<style>
	div{
		height:200px;
		width: 200px;
		border:1px solid black;
		position: relative;
	}
	p{
		width: 50px;
		height:50px;
		background: red;
	}
	#p{
		height: 100px;
		width: 100px;
		background: yellow;
	}
	
</style>
<body>
	<div>
		<p></p>
		<a href=""></a>
	</div>
	<p id="p"></p>
</body>
</html>