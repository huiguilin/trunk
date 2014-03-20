$(function(){

	var coupon_num =0;
	var couponCodesArray = new Array();
	var codesStr ="";
	//单个券验证
	$('#get_coupon_detail_btn').click(function(event) {
		var code = $('#main #right_content_box div.function_content_box div.coupon_code_box input').val();
		if(code == ""){
			$('#main #right_content_box div.function_content_box div.coupon_code_box p.error_tips').show().text('请输入优惠券验证码！')
			$('#single_validate_coupon_detail_box').hide();
			return false;
		}else{
			$.post(ajaxPostURL+"Admin/ValidateManagement/getCouponInfo", {code: code}, function(data) {
				if(data.status == 2){
					$('#main #right_content_box div.function_content_box div.coupon_code_box p.error_tips').show().text(data.info);  //验证码不存在错误信息
					$('#single_validate_coupon_detail_box').hide();
				}else if(data.status == 1){
					$('#main #right_content_box div.function_content_box div.coupon_code_box p.error_tips').hide();
					$('#single_validate_coupon_detail_box').show();
					$('#coupon_name').text(data.name);
					$('#coupon_title').text(data.title);
					$('#coupon_date').text(data.stime+"  "+data.etime);
					$('#coupon_code').text(data.code);
				}else if(data.status == 0){
					$('#main #right_content_box div.function_content_box div.coupon_code_box p.error_tips').show().text(data.info);  //验证失败错误信息
				}
			});
			return false;
		}
		
	});

	$('#coupon_validate_confirm_btn').click(function(event) {
		var code = $('#coupon_code').text();
		$.get(ajaxPostURL+"Admin/ValidateManagement/validateCouponCode", {codes: code}, function(data) {
				if(data.status ==1){
					alert(data.info);
					location.href="http://localhost/trunk/index.php/admin/validate_management/singlevalidate.html";
				}
			});
		return false;
	});
	//单券验证结束
	//批量验证
	$('#multi_add_btn').click(function(event) {

		var code = $('#main #right_content_box div.function_content_box div.coupon_code_box input').val();
		if(code == ""){
			$('#main #right_content_box div.function_content_box div.coupon_code_box p.error_tips').show().text('请输入优惠券验证码！')
			return false;
		}else{
			$.post(ajaxPostURL+"Admin/ValidateManagement/getCouponInfo", {code: code}, function(data) {

				if(data.status == 2){
					$('#main #right_content_box div.function_content_box div.coupon_code_box p.error_tips').show().text(data.info);  //验证码不存在错误信息
				}else if(data.status == 1){
					$('#main #right_content_box div.function_content_box div.coupon_code_box p.error_tips').hide();
						
						if(couponCodesArray == ""){
							couponCodesArray.push(code);
							$('#validate_coupon_info').append('<tr><td><span id="coupon_num"></span></td><td><a href="" id="coupon_operation"></a></td><td><a href="/index.php/Coupon/detail/1" id="coupon_name"></a></td><td><span id="coupon_date"></span></td><td><span class="bold" id="coupon_code"></span></td></tr>');
							coupon_num++;
							$('#coupon_num').text(coupon_num).removeAttr('id');
							$('#coupon_name').text(data.name).removeAttr('id');
							$('#coupon_date').text(data.stime+"  "+data.etime).removeAttr('id');
							$('#coupon_code').text(data.code).removeAttr('id');
							$('#coupon_operation').text('删除').removeAttr('id');
						}
						else{
							for(var i=0;i<couponCodesArray.length;i++){
								if(couponCodesArray[i] == code){
									return false;
								}
							}
							couponCodesArray.push(code);
							$('#validate_coupon_info').append('<tr><td><span id="coupon_num"></span></td><td><a href="" id="coupon_operation"></a></td><td><a href="/index.php/Coupon/detail/1" id="coupon_name"></a></td><td><span id="coupon_date"></span></td><td><span class="bold" id="coupon_code"></span></td></tr>');
								coupon_num++;
								$('#coupon_num').text(coupon_num).removeAttr('id');
								$('#coupon_name').text(data.name).removeAttr('id');
								$('#coupon_date').text(data.stime+"  "+data.etime).removeAttr('id');
								$('#coupon_code').text(data.code).removeAttr('id');
								$('#coupon_operation').text('删除').removeAttr('id');
						}
				}else if(data.status == 0){
					$('#main #right_content_box div.function_content_box div.coupon_code_box p.error_tips').show().text(data.info);  //验证失败错误信息
				}
			});
			return false;
		}
	});

	$('#multi_coupon_validate_confirm_btn').click(function(event) {
		if(couponCodesArray == ""){
			alert("请输入优惠券验证码！");
			return false;
		}else{
			for(var i=0;i<couponCodesArray.length;i++){
				codesStr+=couponCodesArray[i]+",";
			}
		}
		codesStr = codesStr.substring(0,codesStr.length-1);
		$.get(ajaxPostURL+"Admin/ValidateManagement/validateCouponCode", {codes: codesStr}, function(data) {
				if(data.status ==1){
					alert(data.info);
					location.href="http://localhost/trunk/index.php/admin/validate_management/multivalidate.html";
				}
			});
		return false;
	});
	//批量验证结束

	//已验证优惠券
	$('#main #right_content_box div.function_content_box div.coupon_detail_box table tr th p select').change(function(event) {
		var couponid = $(this).find('option:selected').val();
		if(couponid == ""){
			location.href = "http://localhost/trunk/index.php/admin/validate_management/viewvalidate";
		}
		else{
			location.href = "http://localhost/trunk/index.php/admin/validate_management/viewvalidate/coupon_id/" + couponid;
		}
		
	});

	//已验证优惠券结束
})