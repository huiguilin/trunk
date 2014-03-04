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

	// 查看完整地图弹窗
	$('#view_full_map').click(function(event) {
		$('#hidden_detail_map').bPopup({
           
        });
		initMap();//创建和初始化地图
		
	});
	//查看完整地图弹窗关闭
	$('#hidden_detail_map div.title_box a').click(function(event) {
		$('#hidden_detail_map').bPopup().close();
	});

	//查看完整地图弹窗关闭结束

    $('#download_coupon_btn').add('#download_coupon_btn_two').click(function(event){
        var phone_number = 18600500862;
        var coupon_id = $("#download_coupon_id").text();
        $.post("/index.php/Coupon/sendCouponCode", { phone_number : phone_number, coupon_id : coupon_id
            },function(data){
            //做个判断，返回成功执行下面的代码，跳转到注册成功页面
            if(data.status == 1){
                alert('验证码已经发送');
            }
            
            },"json");
        });

    //点击下载到手机弹窗
    $('#download_coupon_btn').add('#download_coupon_btn_two').click(function(event) {
    	$('#download_coupon_hidden_box').bPopup({
           
        });

    });
    //点击下载到手机弹窗结束

})
