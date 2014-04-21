$(function(){

	$('#closed_download_coupon_hidden_box').click(function(event) {
    	$('#download_coupon_hidden_box').bPopup().close();
    	
    });

    //点击下载手机优惠劵弹窗中验证码看不清特效
	$('#send_to_phone_vcode_not_clear').click(function(event) {
		var imgsrc=$('#download_coupon_hidden_box div.middle_content_box ul li img').attr("src");
		imgsrc = imgsrc+ "/" + Math.random();
		$('#download_coupon_hidden_box div.middle_content_box ul li img').attr("src",imgsrc);
		return false;
	});
	//点击下载手机优惠劵弹窗中验证码看不清特效结束

	//关闭发送成功弹窗
	$('#close_middle_content_box_success').click(function(event) {
    	$('#download_coupon_hidden_box').bPopup().close();
    	
    
    });
	//关闭发送成功弹窗结束
})