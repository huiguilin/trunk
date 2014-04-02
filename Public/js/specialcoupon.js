$(function(){
	var coupon_id;

	 //下载优惠券弹窗
	$('#main #coupon_box ul.coupon_content li a.download_btn').click(function(event) {
	 	$('#download_coupon_hidden_box').bPopup({});
	 	coupon_id = $(this).attr('couponid');
	 	return false;
	 });

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

     //点击下载手机优惠劵弹窗中发送按钮结束


})