$(function(){
	$('#submit_btn').click(function(event) {
		var username = $('#main div.content_box div.left_box input.username').val();
		var password = $('#main div.content_box div.left_box input.password').val();
		if(username ==""){
			$('#main div.content_box div.left_box p.error_tips_01').show().text('用户名不能为空！');
			return false;
		}else if(password ==""){
			$('#main div.content_box div.left_box p.error_tips_02').show().text('密码不能为空！');
			return false;
		}else{
			$('#main div.content_box div.left_box p.error_tips_01').hide();
			$('#main div.content_box div.left_box p.error_tips_02').hide();
		}
		
	});



})