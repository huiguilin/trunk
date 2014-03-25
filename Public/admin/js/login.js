$(function(){
	$('#submit_btn').click(function(event) {
		var username = $('#main div.content_box div.left_box input.username').val();
		var password = $('#main div.content_box div.left_box input.password').val();
		var vcodemark = $(this).attr('vcodeMark');
		if(username ==""){
			$('#main div.content_box div.left_box p.error_tips_01').show().text('用户名不能为空！');
			return false;
		}else if(password ==""){
			$('#main div.content_box div.left_box p.error_tips_02').show().text('密码不能为空！');
			return false;
		}else{
			$('#main div.content_box div.left_box p.error_tips_01').hide();
			$('#main div.content_box div.left_box p.error_tips_02').hide();
			$.post(ajaxPostURL+"User/checkLogin",{ username:username,password:password,vcodemark:vcodemark }, function(data) {

					
					if(data.status == 4){
						$('#main div.content_box div.left_box p.error_tips_02').show().text(data.info);
					}else if(data.status == 2){
						$('#main div.content_box div.left_box p.error_tips_01').show().text(data.info);
					}else if(data.status == 0){
						$('#main div.content_box div.left_box p.error_tips_02').show().text(data.info);
					}else if(data.status ==1){
						if(data.url == ""){
							$('#main div.content_box div.left_box p.error_tips_01').show().text("此用户不是商家用户！");
						}else{
							location.href = loginSucessURL+data.url;
						}
						
					}else if(data.status ==5){
						$('#main div.content_box div.left_box p.error_tips_01').show().text(data.info);
					}
				},'json');
			return false;
		}
	});



})