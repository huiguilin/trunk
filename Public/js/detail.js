$(function(){

	$('#main #coupon_box div.business_detail_info_box div.business_location div.map_box ul li').click(function(event) {
		$('#main #coupon_box div.business_detail_info_box div.business_location div.map_box ul li div').hide();
		$('#main #coupon_box div.business_detail_info_box div.business_location div.map_box ul li').removeClass();
		$(this).removeClass().addClass('white').find('div').show();
	});
	$('#main #coupon_box div.business_detail_info_box ul.business_nav li').click(function(event) {
		var index = $(this).index();
		
		if(index ==0){
			$(this).addClass('no_bottom_border').siblings('li').removeClass('no_bottom_border');
			$('#main #coupon_box div.business_detail_info_box div.business_location').show();
			$('#main #coupon_box div.business_detail_info_box div.business_intro').hide();
			$('#main #coupon_box div.business_detail_info_box div.show_comment').hide();
		}
		else if(index ==1){
			$(this).addClass('no_bottom_border').siblings('li').removeClass('no_bottom_border');
			$('#main #coupon_box div.business_detail_info_box div.business_location').hide();
			$('#main #coupon_box div.business_detail_info_box div.business_intro').show();
			$('#main #coupon_box div.business_detail_info_box div.show_comment').hide();
		}
		else if(index ==2){
			$(this).addClass('no_bottom_border').siblings('li').removeClass('no_bottom_border');
			$('#main #coupon_box div.business_detail_info_box div.business_location').hide();
			$('#main #coupon_box div.business_detail_info_box div.business_intro').hide();
			$('#main #coupon_box div.business_detail_info_box div.show_comment').show();
		}
		return false;
	});
})