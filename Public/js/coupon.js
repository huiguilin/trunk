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
	//优惠劵位置信息隐藏特效结束
	// //分类+位置Hover特效
	// $('#main #classification_location_box #content_box #classification_box ul.parent_classification li').hover(function() {
	// 	var index=$(this).index();
	// 	var width=$(this).width();
	// 	if(index !="0"){
	// 		var bg_position_width = width*index+20;
	// 		var bg_position_width = bg_position_width + 'px 0px';
	// 		$('#main #classification_location_box #content_box #classification_box div').css('background-position', bg_position_width);
	// 	}
	// 	$(this).find('a').addClass('hover');
	// }, function() {
	// 	$(this).find('a').removeClass('hover');
	// });

	// $('#main #classification_location_box #content_box #location_box ul.parent_classification li').hover(function() {
	// 	var index=$(this).index();
	// 	var width=$(this).width();
	// 	if(index !="0"){
	// 		var bg_position_width = width*index+20;
	// 		var bg_position_width = bg_position_width + 'px 0px';
	// 		$('#main #classification_location_box #content_box #location_box div').css('background-position', bg_position_width);
	// 	}
	// 	$(this).find('a').addClass('hover');
	// }, function() {
	// 	$(this).find('a').removeClass('hover');
	// });
	// //分类+位置Hover特效结束
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
		return false;
	});
	$('#main #classification_location_box #content_box #location_box div ul.child_classification li a').click(function(event) {
		$('#main #classification_location_box #content_box #location_box div ul.child_classification li a').removeClass('current');
		$(this).addClass('current');
		return false;
	});
	//分类+位置Click特效结束

	


})
