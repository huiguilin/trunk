$(function(){
	//优惠劵页面广告图片轮换版特效
	var timer = setInterval(autoRun,5000);
	var sta = 0;//记录当前展示到哪张图片了
	function autoRun(){
	 	sta++;//sta自增
	 	sta = (sta == 3)?0:sta;//判断是不是到最后一张了，如果是，就切换到第一张
	 	change(sta);//切换效果
	 }
	 $('#main #ad_box li').hover(function(){
	 	clearInterval(timer);//清理定时器
	 	sta = $(this).index();//获得鼠标移入到第几个li上了
	 	change(sta);//切换效果
	 },function(){
	 	timer = setInterval(autoRun,5000);//恢复定时器
	 })
	 function change(num){//用来控制切换图片和下标样式的函数
	 	$('#main #ad_box img').hide();//先把所有的图片隐藏
	 	$('#main #ad_box img').eq(num).fadeIn(200);//让对应的图片显示出来
	 	$('#main #ad_box li').removeClass('hover');//移除掉所有li上面的hover样式
	 	$('#main #ad_box li').eq(num).addClass('hover');//给对应的li加上hover样式
	 }
	//优惠劵页面广告图片轮换版特效结束
	//优惠劵页面广告图片轮换版关闭特效
	$('#main #ad_box a').click(function(event) {
		$(this).parent().hide();
		return false;
	});
	//优惠劵页面广告图片轮换版关闭特效结束
	//优惠劵位置信息隐藏特效
	$('#main #coupon_box ul.coupon_content li').hover(function() {
		$(this).find('p.hidden_location').show();
	}, function() {
		$(this).find('p.hidden_location').hide();
	});
		 //下载优惠券弹窗
	$('#main #coupon_box ul.coupon_content li a.download').click(function(event) {
	 	$('#download_coupon_hidden_box').bPopup({});
	 	return false;
	 });
	 
	//分类+位置Click特效
	$('#main #classification_location_box #content_box #classification_box ul.parent_classification li a').click(function(event) {
		$('#main #classification_location_box #content_box #classification_box ul.parent_classification li a').removeClass('current');
		$(this).addClass('current');
		$('#main #classification_location_box #content_box #classification_box div').show();
		return false;
	});
	$('#main #classification_location_box #content_box #location_box ul.parent_classification li a').click(function(event) {
		$('#main #classification_location_box #content_box #location_box ul.parent_classification li a').removeClass('current');
		$(this).addClass('current');
		$('#main #classification_location_box #content_box #location_box div').show();
		return false;
	});
	$('#main #classification_location_box #content_box #classification_box div ul.child_classification li a').click(function(event) {
		$('#main #classification_location_box #content_box #classification_box div ul.child_classification li a').removeClass('current');
		$(this).addClass('current');
		
	});
	$('#main #classification_location_box #content_box #location_box div ul.child_classification li a').click(function(event) {
		$('#main #classification_location_box #content_box #location_box div ul.child_classification li a').removeClass('current');
		$(this).addClass('current');
		
	});
	//分类+位置Click特效结束
	var hidden_type_value = $('#hidden_type_value').val();
	$('#coupon_box').css('height', hidden_type_value);


	


})
