$(function(){
	//在线提交表单验证
	$('#feedback_btn_submit').click(function(event) {
		var username=$('#online_submit_username');
		var cellphone=$('#online_submit_cellphone');
		var content=$('#online_submit_content');
		var type =$('#hidden_type_value')
		if(username.val() == ""){
			alert("请留下您的称呼!");
			username.focus(); //获取焦点
			return false;
		}
		else{
			if(cellphone.val()==""){
				alert('请留下您的联系方式！');
				cellphone.focus(); //获取焦点
				return false;
			}
			else{
				if($.trim(content.val())==""){
					alert('请留下您的意见！');
					content.focus(); //获取焦点
					return false;
				}
				else{
					$.post(ajaxPostURL+'Intention/handle',{ nickname:username.val(),othercommunication:cellphone.val(),content:content.val(),type:type.val() }, function(returnData) {
							if(returnData.status == 0){
								alert(returnData.info);
							}else if(returnData.status == 1){
								$('#main #left_card p.three').css('display', 'block');
								$('#online_submit_form').addClass('one');
								$('#main #left_card form ul li input').val("");
								$('#main #left_card form ul li textarea').val("");
							}else if(returnData.status == 2){
								alert(returnData.info);
							}

					},'json');
					return false;
				}
			}
		}
	});
	
	//在线提交表单验证结束
	//商务合作意向表单验证
	$('#intention_btn_submit').click(function(event) {
		var intention_username =$('#intention_username');
		var intention_cellphone =$('#intention_cellphone');
		var intention_business =$('#intention_business');
		var intention_content =$('#intention_contents');
		var type =$('#hidden_type_value')
		var intention_address = $('#intention_address');
		var area = $('#intention_area option:selected');
		var classification = $('#intention_classification option:selected');
		if(intention_username.val() ==""){
			alert('请留下您的姓名!');
			intention_username.focus(); //获取焦点
			return false;
		}else{
			if(intention_cellphone.val() == ""){
				alert('请留下您的联系方式!');
				intention_cellphone.focus(); //获取焦点
				return false;
			}else{
				if(intention_business.val() ==""){
					alert('请留下您公司名称');
					intention_business.focus(); //获取焦点
					return false;
				}else{
					if($.trim(intention_content.val())==""){
						alert('请留下您的相关内容');
						intention_content.focus(); //获取焦点
						return false;
					}
					else{
						$.post(ajaxPostURL+'Intention/handle',{ nickname:intention_username.val(),cellphone:intention_cellphone.val(),content:intention_content.val(),type:type.val(),shopname: intention_business.val(),companyaddress:intention_address.val(),area:area.val(),classification:classification.val()}, function(returnData) {
							if(returnData.status == 0){
								alert(returnData.info);
							}else if(returnData.status == 1){
								alert('提交成功！')
								$('#main #left_card p.three').css('display', 'block');
								$('#intention_sumbit_form').addClass('one');
								$('#main #left_card form ul li input').val("");
								$('#main #left_card form ul li textarea').val("");
							}else if(returnData.status == 2){
								alert(returnData.info);
							}

						},'json');
						return false;
					}
				}
			}
		}
		
	});
	//商务合作意向表单验证结束

	//用户推荐合作意向表单验证
	$('#recommend_btn_submit').click(function(event) {
		var recommend_username =$('#recommend_username');
		var recommend_cellphone =$('#recommend_cellphone');
		var recommend_business =$('#recommend_business');
		var recommend_address =$('#recommend_address');
		var recommend_product =$('#recommend_product');
		var recommend_content =$('#recommend_content');
		var recommend_address =$('#recommend_address');
		var recommend_product =$('#recommend_product');
		var classification = $('#recommend_classification option:selected');
		var type =$('#hidden_type_value')
		if(recommend_username.val() ==""){
			alert('请留下您的姓名!');
			recommend_username.focus(); //获取焦点
			return false;
		}else{
			if(recommend_cellphone.val() == ""){
				alert('请留下您的联系方式!');
				recommend_cellphone.focus(); //获取焦点
				return false;
			}else{
				if(recommend_business.val() ==""){
					alert('请填写推荐商户名称');
					recommend_business.focus(); //获取焦点
					return false;
				}else{
					if(recommend_address.val() ==""){
						alert('请填写推荐商户的店面地址');
						recommend_address.focus(); //获取焦点
						return false;
					}
					else{
						if(recommend_product.val() ==""){
							alert('请填写推荐特色产品的名称');
							recommend_product.focus(); //获取焦点
							return false;
						}
						else{
							if($.trim(recommend_content.val())==""){
								alert('请填写相关备注信息1');
								recommend_content.focus(); //获取焦点
								return false;
							}
							else{
								$.post(ajaxPostURL+'Intention/handle',{ nickname:recommend_username.val(),cellphone:recommend_cellphone.val(),content:recommend_content.val(),type:type.val(),shopname: recommend_business.val(),specialproduct:recommend_product.val(),companyaddress:recommend_address.val(),classification:classification.val()}, function(returnData) {
										if(returnData.status == 0){
											alert(returnData.info);
										}else if(returnData.status == 1){
											$('#main #left_card p.three').css('display', 'block');
											$('#recommend_sumbit_form').addClass('one');
											$('#main #left_card form ul li input').val("");
											$('#main #left_card form ul li textarea').val("");
										}else if(returnData.status == 2){
											alert(returnData.info);
										}
								},'json');
								return false;
							}
						}
					}
				}
			}
		}
		
	});
	//用户推荐合作意向表单验证结束
	
})