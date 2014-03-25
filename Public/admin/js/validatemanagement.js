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
					location.href = loginSucessURL+"/index.php/admin/validate_management/singlevalidate.html";
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
							$('#validate_coupon_info').append('<tr><td><span id="coupon_num"></span></td><td><a href="" id="coupon_operation" class="del_coupon"></a></td><td><a href="/index.php/Coupon/detail/1" id="coupon_name"></a></td><td><span id="coupon_date"></span></td><td><span class="bold" id="coupon_code"></span></td></tr>');
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
									$('#main #right_content_box div.function_content_box div.coupon_code_box p.error_tips').show().text('此验证码已经添加！');
									return false;
								}
							}
							couponCodesArray.push(code);
							$('#validate_coupon_info').append('<tr><td><span id="coupon_num"></span></td><td><a href="" id="coupon_operation" class="del_coupon"></a></td><td><a href="/index.php/Coupon/detail/1" id="coupon_name"></a></td><td><span id="coupon_date"></span></td><td><span class="bold" id="coupon_code"></span></td></tr>');
								coupon_num++;
								$('#coupon_num').text(coupon_num).removeAttr('id');
								$('#coupon_name').text(data.name).removeAttr('id');
								$('#coupon_date').text(data.stime+"  "+data.etime).removeAttr('id');
								$('#coupon_code').text(data.code).removeAttr('id');
								$('#coupon_operation').text('删除').removeAttr('id');
								$('#main #right_content_box div.function_content_box div.coupon_code_box p.error_tips').hide().text('');
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
					location.href = loginSucessURL+"/index.php/admin/validate_management/multivalidate.html";
				}
			});
		return false;
	});

	//删除优惠券
	$('#main #right_content_box div.function_content_box div.coupon_detail_box table tr td a.del_coupon').live('click',function(event) {
		var coupon_code = $(this).parent().next().next().next().find('span').text();
		Array.prototype.indexOf = function(val){
			for(var i=0;i<this.length;i++){
				if(this[i] == val){
					return i;
					break;
				}
			}
		}
		Array.prototype.remove = function(val){
			var index = this.indexOf(val);
			if(index > -1){
				this.splice(index,1);
			}
		}
		couponCodesArray.remove(coupon_code);
		$(this).parent().parent().remove();
		return false;
	});
	//批量验证结束

	//已验证优惠券
	$('#main #right_content_box div.function_content_box div.coupon_detail_box table tr th p select').change(function(event) {
		var couponid = $(this).find('option:selected').val();

		if(couponid == ""){
			location.href = loginSucessURL+"/index.php/admin/validate_management/viewvalidate.html";
		}
		else{
			location.href = loginSucessURL+"/index.php/admin/validate_management/viewvalidate/coupon_id/" + couponid;

		}
		
	});
	var couponids = $('#couponids').val();
	if (couponids == "") {
		$('#select_coupon').val(0);
	}else{
		$('#select_coupon').val(couponids);
	}



	//已验证优惠券结束
})