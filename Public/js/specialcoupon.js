$(function(){
	var coupon_id;

     //优惠劵页面广告图片轮换版特效
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
     //优惠劵页面广告图片轮换版特效结束
     //优惠劵页面广告图片轮换版关闭特效
     $('#main #ad_box a').click(function(event) {
          $(this).parent().hide();
          return false;
     });
     //优惠劵页面广告图片轮换版关闭特效结束
     
	 //下载优惠券弹窗
	$('#main #coupon_box ul.coupon_content li a.download_btn').click(function(event) {
     var tag = $(this).attr('tag');
     if(tag == "0"){
        $('#download_coupon_hidden_box').bPopup({});
        coupon_id = $(this).attr('couponid');
        return false;
     }
     else if(tag == "3"){
         $('#Userlogin_box').bPopup({
            modalClose: false,
          opacity: 0.6,
          position: [330, 60],//x, y
        });
        return false;
     }
     else{
        return false;
     }
	 	
	 });

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


})