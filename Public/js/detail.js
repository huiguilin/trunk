$(function(){
	var coupon_id;
    var all_li;

    $(window).scroll( function() {

        var n1 = parseInt($(window).scrollTop());
        var n2 = parseInt($(window).height());
        var n3 = parseInt($(document).height());
        var middle_val = n3/2;
        var business_nav_y = parseInt($('#business_nav').position().top)+190;
        var business_location_y = parseInt($('#business_location').position().top)+135;
        var business_intro_y = parseInt($('#business_intro').position().top)+85;
        var comment_performance_y = parseInt($('#comment_performance').position().top)+115;     

        if (n1 >= business_nav_y) {

            $('#jquery_business_nav').css('display','block');
            $('#jquery_business_nav').css('z-index', '1999');
        }
        if (n1 <= business_nav_y) {

            $('#jquery_business_nav').css('display','none');
        }
        
        switchBusinessNav(n1,business_location_y,business_intro_y,comment_performance_y);
        all_li.first().find('a').attr('href', '#back_business_location');
        all_li.first().next('li').find('a').attr('href', '#back_business_intro');
        all_li.last().find('a').attr('href', '#back_comment_performance');

        // back_top_bottom(n1,middle_val);
    });

    // function back_top_bottom(n1,middle_val){
    //     if (n1 >= middle_val) {
    //         $('#main #top_bottom a').text('到顶部');
    //         $('#main #top_bottom a').attr('href', '#top');
    //     }
    //     if (n1 <= middle_val) {
    //         $('#main #top_bottom a').text('到底部');
    //         $('#main #top_bottom a').attr('href', '#bottom');
    //     }
    // }
     function switchBusinessNav(n1,business_location_y,business_intro_y,comment_performance_y){
        all_li = $('#main #coupon_box div.business_detail_info_box ul.jquery_business_nav').find('li');
        if (n1 >= business_location_y && n1 <= business_intro_y) {
            all_li.first().addClass('no_bottom_border').siblings('li').removeClass('no_bottom_border');
        }
        if (n1 >= business_intro_y && n1 <= comment_performance_y) {
            all_li.first().next('li').addClass('no_bottom_border').siblings('li').removeClass('no_bottom_border');
        }
        if (n1 >= comment_performance_y) {
            all_li.last().addClass('no_bottom_border').siblings('li').removeClass('no_bottom_border');
        }
    }

    //下载优惠券弹窗
    $('#download_coupon_btn').add('#download_coupon_btn_two').click(function(event) {
         var tag = $(this).attr('tag');
         if(tag == "0"){
             $('#Userlogin_box').bPopup({
                modalClose: false,
              opacity: 0.6,
              position: [330, 60],//x, y
            });
            return false;
         }
         else{
             $('#download_coupon_hidden_box').bPopup({});
            coupon_id = $(this).attr('couponid');
            return false;
         } 
     });
    
	$('#main #coupon_box div.business_detail_info_box div.business_location div.map_box ul li').click(function(event) {
		$('#main #coupon_box div.business_detail_info_box div.business_location div.map_box ul li div').hide();
		$('#main #coupon_box div.business_detail_info_box div.business_location div.map_box ul li').removeClass();
		$(this).removeClass().addClass('white').find('div').show();
	});

	$('#main #coupon_box div.business_detail_info_box ul.business_nav li').click(function(event) {
		var index = $(this).index();

        if(index == 1){
            $(this).addClass('no_bottom_border').siblings('li').removeClass('no_bottom_border');
        }
        if(index == 2){
            $(this).addClass('no_bottom_border').siblings('li').removeClass('no_bottom_border');
        }
        if(index == 3){
            $(this).addClass('no_bottom_border').siblings('li').removeClass('no_bottom_border');
        }
	});

	// 查看完整地图弹窗
	$('#view_full_map').click(function(event) {
		$('#hidden_detail_map').bPopup({
           
        });
		initMap();//创建和初始化地图
		
	});
	//查看完整地图弹窗关闭
	$('#hidden_detail_map div.title_box a').click(function(event) {
		$('#hidden_detail_map').bPopup().close();
	});

	//查看完整地图弹窗关闭结束

    $('#download_coupon_btn').add('#download_coupon_btn_two').click(function(event){
        var phone_number = 18600500862;
        var coupon_id = $("#download_coupon_id").text();
        $.post("/index.php/Coupon/sendCouponCode", { phone_number : phone_number, coupon_id : coupon_id
            },function(data){
            //做个判断，返回成功执行下面的代码，跳转到注册成功页面
            if(data.status == 1){
                alert('验证码已经发送');
            }
            
            },"json");
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

    $('#add_favorite_btn').click(function(event){
        var coupon_id = $("#download_coupon_id").text();
        var checklogin = $('#checklogin').val();
    	if (checklogin == "") {
    		alert('请先登录，谢谢！');
    		return false;
    	}
        $.post(ajaxPostURL+"Coupon/addFavorite", { coupon_id : coupon_id
            },function(data){
            if(data.status == 1){
                alert('已经添加到我的收藏');
            }
            
            },"json");
        });

})
