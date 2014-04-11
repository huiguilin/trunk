$(function(){
	var coupon_id;
	//民以食为天Hover效果
	$('#foot_new_ul li').hover(function() {
		var index=$(this).index();
		sort_mouseover_animate('#foot_new_ul li',index);
	}, function() {
		var num=$(this).index();
		sort_mouseout_animate('#foot_new_ul','#foot_new_ul li',num);
	});

	$('#foot_hot_ul li').hover(function() {
		var index=$(this).index();
		sort_mouseover_animate('#foot_hot_ul li',index);
	}, function() {
		var num=$(this).index();
		sort_mouseout_animate('#foot_hot_ul','#foot_hot_ul li',num);
	});
	//民以食为天Hover效果结束
	//休闲娱乐Hover效果
	$('#ent_new_ul li').hover(function() {
		var index=$(this).index();
		sort_mouseover_animate('#ent_new_ul li',index);
	}, function() {
		var num=$(this).index();
		sort_mouseout_animate('#ent_new_ul','#ent_new_ul li',num);
	});

	$('#ent_hot_ul li').hover(function() {
		var index=$(this).index();
		sort_mouseover_animate('#ent_hot_ul li',index);
	}, function() {
		var num=$(this).index();
		sort_mouseout_animate('#ent_hot_ul','#ent_hot_ul li',num);
	});
	//休闲娱乐Hover效果结束
	//生活服务Hover效果
	$('#life_new_ul li').hover(function() {
		var index=$(this).index();
		sort_mouseover_animate('#life_new_ul li',index);
	}, function() {
		var num=$(this).index();
		sort_mouseout_animate('#life_new_ul','#life_new_ul li',num);
	});

	$('#life_hot_ul li').hover(function() {
		var index=$(this).index();
		sort_mouseover_animate('#life_hot_ul li',index);
	}, function() {
		var num=$(this).index();
		sort_mouseout_animate('#life_hot_ul','#life_hot_ul li',num);
	});
	//生活服务Hover效果结束
	//民以食为天区域排序Tap切换
	$('#foot_new_title').click(function(event) {
		sort_click_tap('#foot_new_title','#foot_hot_title','title','title2','#foot_hot_ul','#foot_new_ul');
	});

	$('#foot_hot_title').click(function(event) {
		sort_click_tap('#foot_hot_title','#foot_new_title','title','title2','#foot_new_ul','#foot_hot_ul');
	});
	//民以食为天区域排序Tap切换结束
	//休闲娱乐区域排序Tap切换
	$('#ent_new_title').click(function(event) {
		sort_click_tap('#ent_new_title','#ent_hot_title','title','title2','#ent_hot_ul','#ent_new_ul');
	});

	$('#ent_hot_title').click(function(event) {
		sort_click_tap('#ent_hot_title','#ent_new_title','title','title2','#ent_new_ul','#ent_hot_ul');
	});
	//休闲娱乐区域排序Tap切换结束
	//生活服务区域排序Tap切换
	$('#life_new_title').click(function(event) {
		sort_click_tap('#life_new_title','#life_hot_title','title','title2','#life_hot_ul','#life_new_ul');
	});

	$('#life_hot_title').click(function(event) {
		sort_click_tap('#life_hot_title','#life_new_title','title','title2','#life_new_ul','#life_hot_ul');
	});
	//生活服务区域排序Tap切换结束
	function sort_click_tap(title_id,title_id2,cname,cname2,ulname,ulname2){
		$(title_id).removeClass();
		$(title_id).addClass(cname);
		$(title_id).addClass(cname2);
		$(title_id2).removeClass();
		$(title_id2).addClass(cname);
		$(ulname).hide();
		$(ulname2).show();
	}
	function sort_mouseover_animate(liname,index){
		$(liname).removeClass('hover').find('.one').show();
		$(liname).find('.two').hide();
		$(liname).find('img').hide();
		$(liname).eq(index).addClass('hover').find('.one').hide();
		$(liname).eq(index).find('.two').show();
		$(liname).eq(index).find('img').show();
	}
	function sort_mouseout_animate(ulname,liname,index){
		$(liname).eq(index).removeClass('hover').find('.one').show();
		$(liname).eq(index).find('.two').hide();
		$(liname).eq(index).find('img').hide();
		$(ulname).mouseleave(function(event) {
			$(liname).removeClass('hover').find('.one').show();
			$(liname).find('.two').hide();
			$(liname).find('img').hide();
			$(liname).eq(index).addClass('hover').find('.one').hide();
			$(liname).eq(index).find('.two').show();
			$(liname).eq(index).find('img').show();
		});
	}
	//首页图片轮换版特效
	var timer = setInterval(autoRun,5000);
	var sta = 0;//记录当前展示到哪张图片了
	function autoRun(){
	 	sta++;//sta自增
	 	sta = (sta == 4)?0:sta;//判断是不是到最后一张了，如果是，就切换到第一张
	 	change(sta);//切换效果
	 }
	 $('#main #main_content_top_box #ad_box ul li').hover(function(){
	 	clearInterval(timer);//清理定时器
	 	sta = $(this).index();//获得鼠标移入到第几个li上了
	 	change(sta);//切换效果
	 },function(){
	 	timer = setInterval(autoRun,5000);//恢复定时器
	 })
	 function change(num){//用来控制切换图片和下标样式的函数
	 	$('#main #main_content_top_box #ad_box img').hide();//先把所有的图片隐藏
	 	$('#main #main_content_top_box #ad_box img').eq(num).fadeIn(200);//让对应的图片显示出来
	 	$('#main #main_content_top_box #ad_box ul li').removeClass('hover');//移除掉所有li上面的hover样式
	 	$('#main #main_content_top_box #ad_box ul li').eq(num).addClass('hover');//给对应的li加上hover样式
	 }
	 //首页图片轮换版特效结束

	 // $('#main #foot_and_footsort_box div.foot_box ul.content li').hover(function() {
	 // 	$(this).find('p.hidden_location').show();
	 // }, function() {
	 // 	$(this).find('p.hidden_location').hide();
	 // });
	 $('#main #hot_and_new_brand_box div.hot_brand_box li').hover(function() {
	 	$(this).find('a').css('text-decoration', 'underline');
	 }, function() {
	 	$(this).find('a').css('text-decoration', 'none');
	 });
	 //下载优惠券弹窗
	
	$('#main #foot_and_footsort_box div.foot_box ul.content li a.download').click(function(event) {
     var tag = $(this).attr('tag');
     if(tag == "0"){
        $('#Userlogin_box').bPopup({
        
        });
        return false;
     }
     else{
     	$('#download_coupon_hidden_box').bPopup({});
        coupon_id = $(this).attr('couponid');
        return false;
     }
	 	
	 });

	 //下载优惠券弹窗结束
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
					 		$('#hidden_error_tips_vcode').show().text(data.info);
					 	}else if(data.status == 0){
					 		$('#hidden_error_tips_phone').show().text(data.info);
					 	}else if(data.status ==1){
					 		$("#download_coupon_hidden_box div.middle_content_box").hide().siblings('#download_coupon_hidden_box div.middle_content_box_success').show();
					 	}else if(data.status == 3){
					 		$('#hidden_error_tips_phone').show().text(data.info);
					 	}
					},"json");
     		 	}
     		 }
     	}
     	return false;
     });

})
