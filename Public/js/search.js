$(function(){
	
	//搜索位置信息隐藏特效
	$('#main #coupon_box ul.coupon_content li').hover(function() {
		$(this).find('p.hidden_location').show();
	}, function() {
		$(this).find('p.hidden_location').hide();
	});
	//搜索位置信息隐藏特效结束
	var hidden_type_value = $('#hidden_type_value').val();
	$('#coupon_box').css('height', hidden_type_value);

})