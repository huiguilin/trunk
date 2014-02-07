$(function(){
	//在线提交表单验证
	$('#main #left_card form #btn_submit').click(function(event) {
		var username=$('#online_submit_username');
		var cellphone=$('#online_submit_cellphone');
		var content=$('#online_submit_content');
		if(username.val() == ""){
			alert("请留下您的称呼!");
			username.focus(); //获取焦点
		}
		else{
			if(cellphone.val()==""){
				alert('请留下您的联系方式！');
				cellphone.focus(); //获取焦点
			}
			else{
				if($.trim(content.val())==""){
					alert('请留下您的意见！');
					content.focus(); //获取焦点
				}
				else{
					//ajax发送请求
					var handleURL = "/Trunk/index.php/home/Feedback/handle"; //外挂js文件不认识U方法
					$.post(handleURL, {feedback_username:username.val(),feedback_cellphone:cellphone.val(),feedback_content:content.val()}, function(data, textStatus, xhr){

					}, 'josn');
					//ajax发送请求结束
					$('#main #left_card p.three').css('display', 'block');
					$('#online_submit_form').addClass('one');
					$('#main #left_card form ul li input').val("");
					$('#main #left_card form ul li textarea').val("");
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
		var intention_content =$('#intention_content');
		if(intention_username.val() ==""){
			alert('请留下您的姓名!');
		}else{
			if(intention_cellphone.val() == ""){
				alert('请留下您的联系方式!');
			}else{
				if(intention_business.val() ==""){
					alert('请留下您公司名称');
				}else{
					if(intention_content.val() ==""){
						alert('请留下您的相关内容');
					}
					else{
						
						//ajax发送请求
						var handleURL = "/Trunk/index.php/home/Intention/handle"; //外挂js文件不认识U方法
						$.post(handleURL, {intention_username:intention_username.val(),intention_cellphone:intention_cellphone.val(),intention_business:intention_business.val(),intention_content:intention_content.val()}, function(data, textStatus, xhr){

						}, 'josn');
						//ajax发送请求结束
						$('#main #left_card p.three').css('display', 'block');
						$('#intention_sumbit_form').addClass('one');
						$('#main #left_card form ul li input').val("");
						$('#main #left_card form ul li textarea').val("");
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
		if(recommend_username.val() ==""){
			alert('请留下您的姓名!');
		}else{
			if(recommend_cellphone.val() == ""){
				alert('请留下您的联系方式!');
			}else{
				if(recommend_business.val() ==""){
					alert('请填写推荐商户名称');
				}else{
					if(recommend_address.val() ==""){
						alert('请填写推荐商户的店面地址');
					}
					else{
						if(recommend_product.val() ==""){
							alert('请填写推荐特色产品的名称');
						}
						else{
							if(recommend_content.val() ==""){
								alert('请填写相关备注信息');
							}
							else{
								//ajax发送请求
								var handleURL = "/Trunk/index.php/home/Intention/handle"; //外挂js文件不认识U方法
								$.post(handleURL, {recommend_username:recommend_username.val(),recommend_cellphone:recommend_cellphone.val(),
									recommend_business:recommend_business.val(),recommend_address:recommend_address.val(),
									recommend_product:recommend_product.val(),recommend_content:recommend_content.val()}, function(data, textStatus, xhr){
								}, 'josn');
								//ajax发送请求结束
								$('#main #left_card p.three').css('display', 'block');
								$('#recommend_sumbit_form').addClass('one');
								$('#main #left_card form ul li input').val("");
								$('#main #left_card form ul li textarea').val("");
							}
						}
					}
				}
			}
		}
		
	});
	//用户推荐合作意向表单验证结束
	
})