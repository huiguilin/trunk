$(function(){
	
	//搜索位置信息隐藏特效
	$('#main #coupon_box ul.coupon_content li').hover(function() {
		$(this).find('p.hidden_location').show();
	}, function() {
		$(this).find('p.hidden_location').hide();
	});
	//搜索位置信息隐藏特效结束
	//分类+位置Hover特效
	$('#main #classification_location_box #content_box #classification_box ul.parent_classification li').hover(function() {
		var index=$(this).index();
		var width=$(this).width();
		if(index !="0"){
			var bg_position_width = width*index+20;
			var bg_position_width = bg_position_width + 'px 0px';
			$('#main #classification_location_box #content_box #classification_box div').css('background-position', bg_position_width);
		}
		$(this).find('a').addClass('hover');
	}, function() {
		$(this).find('a').removeClass('hover');
	});

	$('#main #classification_location_box #content_box #location_box ul.parent_classification li').hover(function() {
		var index=$(this).index();
		var width=$(this).width();
		if(index !="0"){
			var bg_position_width = width*index+20;
			var bg_position_width = bg_position_width + 'px 0px';
			$('#main #classification_location_box #content_box #location_box div').css('background-position', bg_position_width);
		}
		$(this).find('a').addClass('hover');
	}, function() {
		$(this).find('a').removeClass('hover');
	});

	//分类+位置Hover特效结束

	


})