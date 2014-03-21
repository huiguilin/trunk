$(function(){

	var coupon_id;
	//商家页面广告图片轮换版特效
	var timer = setInterval(autoRun,5000);
	var sta = 0;//记录当前展示到哪张图片了
	function autoRun(){
	 	sta++;//sta自增
	 	sta = (sta == 3)?0:sta;//判断是不是到最后一张了，如果是，就切换到第一张
	 	change(sta);//切换效果
	 }
	 $('#main #ad_box li').hover(function(){
	 	clearInterval(timer);//清理定时器
	 	sta = $(this).index();//获得鼠标移入到第几个li上了
	 	change(sta);//切换效果
	 },function(){
	 	timer = setInterval(autoRun,5000);//恢复定时器
	 })
	 function change(num){//用来控制切换图片和下标样式的函数
	 	$('#main #ad_box img').hide();//先把所有的图片隐藏
	 	$('#main #ad_box img').eq(num).fadeIn(200);//让对应的图片显示出来
	 	$('#main #ad_box li').removeClass('hover');//移除掉所有li上面的hover样式
	 	$('#main #ad_box li').eq(num).addClass('hover');//给对应的li加上hover样式
	 }
	//商家页面广告图片轮换版特效结束

	//下载优惠券弹窗
	$('#main #partner_content_box div.partner_coupon_info_box ul li a.download_btn').click(function(event) {
	 	$('#download_coupon_hidden_box').bPopup({});
	 	coupon_id = $(this).attr('couponid');
	 	return false;
	 });
	//下载优惠券弹窗结束

	var hidden_type_value = $('#hidden_type_value').val();
	$('#partner_box').css('height', hidden_type_value);
	
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

     //detail页面的js

     $('#desc_out').click(function(event) {
		$('#partner_desc_sort').css('display', 'none');
		$('#partner_desc_long').css('display', 'block');
	});
	$('#desc_up').click(function(event) {
		$('#partner_desc_long').css('display', 'none');
		$('#partner_desc_sort').css('display', 'block');
	});
	$('#viewallpic_btn').click(function(event){
		var pictureNum = $('#viewallpic_btn').find('span').text();
		if (pictureNum == 0 || pictureNum == 1) {
			alert("无更多照片");
			return false;
		}
	    $('#viewallpic_hidden_box').bPopup({});
	});
	$('#close_viewallpic_hidden_box').click(function(event){
	     $('#viewallpic_hidden_box').bPopup({}).close();
		 return true;
	});


    $('#viewallpic_btn').click(function(event) {
    	$('#view_partner_pics_hidden_box').bPopup({});
    	return false;
    });

    $('#prev_btn').click(function(event) {
      	var num = $(this).attr('num');
      	if(num == "" || num== 0){
      		var index = parseInt($('#view_partner_pics_hidden_box img.content').index());
      		$(this).attr('num',index);
      		index = index-2
      		$('#view_partner_pics_hidden_box img.content').hide();
      		$('#view_partner_pics_hidden_box img.content').eq(index).fadeIn(200);
      	}
      	else{
      		num--;
  			$(this).attr('num',num);
  			$('#view_partner_pics_hidden_box img.content').hide();
  			$('#view_partner_pics_hidden_box img.content').eq(num).fadeIn(200);
      	}
      	return false;
    });
    $('#next_btn').click(function(event) {
      	var num = $(this).attr('num');
      	if(num == "" || num== 0){
      		var index = parseInt($('#view_partner_pics_hidden_box img.content').index());
      		$(this).attr('num',index);
      		index = index-2
      		$('#view_partner_pics_hidden_box img.content').hide();
      		$('#view_partner_pics_hidden_box img.content').eq(index).fadeIn(200);
      	}
      	else{
      		num--;
  			$(this).attr('num',num);
  			$('#view_partner_pics_hidden_box img.content').hide();
  			$('#view_partner_pics_hidden_box img.content').eq(num).fadeIn(200);
      	}
      	return false;
    });
    $('#closed_btn').click(function(event) {
    	$('#view_partner_pics_hidden_box').bPopup().close();
    	return false;
    });

    //点击下载到手机弹窗
    $('#partnermain #partnerleft_middle_box #all_coupon_info ul.coupon_content li a.download').click(function(event) {
      coupon_id = $(this).attr('couponid');
      $('#download_coupon_hidden_box').bPopup({});
      return false;

    });
    //点击下载到手机弹窗结束

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

      //查看完整地图弹窗
     $('#viewfullmap').click(function(event) {
        $('#hidden_detail_map').bPopup({});
        return false;
     });
     //查看完整地图弹窗结束
     $('#close_box').click(function(event) {
        $('#hidden_detail_map').bPopup({}).close();
        return false;
     });
    
	//detail页面的js结束
})