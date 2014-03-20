$(function(){
	//单个券验证
	$('#get_coupon_detail_btn').click(function(event) {
		var code = $('#main #right_content_box div.function_content_box div.coupon_code_box input').val();
		if(code == ""){
			$('#main #right_content_box div.function_content_box div.coupon_code_box p.error_tips').show().text('请输入优惠券验证码！')
			return false;
		}else{
			$.get(ajaxPostURL+"Admin/ValidateManagement/getCouponInfo", {code: code}, function(data) {
				
				if(data.status == 2){
					$('#main #right_content_box div.function_content_box div.coupon_code_box p.error_tips').show().text(data.info);  //验证码不存在错误信息
				}else if(data.status == 1){
					$('#main #right_content_box div.function_content_box div.coupon_code_box p.error_tips').hide();
					$('#single_validate_coupon_detail_box').show();
				}else if(data.status == 0){
					$('#main #right_content_box div.function_content_box div.coupon_code_box p.error_tips').show().text(data.info);  //验证失败错误信息
				}
			});
			return false;
		}
		
	});
	//单券验证结束
	//批量验证
	$('#multi_add_btn').click(function(event) {
		var code = $('#main #right_content_box div.function_content_box div.coupon_code_box input').val();
		if(code == ""){
			$('#main #right_content_box div.function_content_box div.coupon_code_box p.error_tips').show().text('请输入优惠券验证码！')
			return false;
		}else{
			
		}
		return false;
	});
	//批量验证结束
})