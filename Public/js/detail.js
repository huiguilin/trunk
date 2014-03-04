$(function(){
	var coupon_id;
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
    	coupon_id = $(this).attr('couponid');
    	$('#download_coupon_hidden_box').bPopup({
           
        });

    });
    //点击下载到手机弹窗结束

    //点击下载手机优惠劵弹窗中发送按钮
     $('#download_coupon_submit_btn').click(function(event) {
     	var phone = $('#send_to_phone').val();
     	var vcode = $('#cellphone_vcode').val();
     	var reg_cellphone= /^(1)[0-9]{10}$/;
     	if(phone == ""){
     		$('#hidden_error_tips_phone').show().text('手机号码不能为空');
     	}else{
     		 if(!reg_cellphone.test(phone)){
     		 	$('#hidden_error_tips_phone').show().text('手机号码格式不正确');
     		 }else{
     		 	if(vcode ==""){
     		 		$('#hidden_error_tips_phone').hide();
     		 		$('#hidden_error_tips_vcode').show().text('验证码不能为空');
     		 	}else{

     		 		$.post(ajaxPostURL+"Coupon/sendCouponCode", { phone_number: phone, 
						vcode: vcode,coupon_id:coupon_id},function(data){

					 	if(data.status == 2){
					 		$('#hidden_error_tips_vcode').show().text('验证码错误');
					 	}else if(data.status == 0){
					 		$('#hidden_error_tips_phone').show().text('手机号码不能为空');
					 	}else if(data.status ==1){
					 		$('#download_coupon_hidden_box div.middle_content_box_success div p.sucess_tip span').text(phone);
					 		$("#download_coupon_hidden_box div.middle_content_box").hide().siblings('#download_coupon_hidden_box div.middle_content_box_success').show();
					 	}
					},"json");
     		 	}
     		 }
     	}
     	return false;
     });

})
