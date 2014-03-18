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

  	//创建和初始化地图函数：
    function initMap(partner){
        createMap(partner);//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMarker();//向地图中添加marker
    }
    
    //创建地图函数：
    function createMap(partner){
        var map = new BMap.Map("view_map");//在百度地图容器中创建一个地图
        var point = new BMap.Point(partner.GPS_X, partner.GPS_Y);//定义一个中心点坐标
        map.centerAndZoom(point,14);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
	var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
	map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
	var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:0});
	map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
	var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
	map.addControl(ctrl_sca);
    }
    
    //标注点数组
    var markerArr = [{title:partner.name,content:partner.title,point:partner.GPS_X+"|"+partner.GPS_Y,isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
    ];
    //创建marker
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){
            var json = markerArr[i];
            var p0 = json.point.split("|")[0];
            var p1 = json.point.split("|")[1];
            var point = new BMap.Point(p0,p1);
			var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point,{icon:iconImg});
			var iw = createInfoWindow(i);
			var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
			marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                        borderColor:"#808080",
                        color:"#333",
                        cursor:"pointer"
            });
			
			(function(){
				var index = i;
				var _iw = createInfoWindow(i);
				var _marker = marker;
				_marker.addEventListener("click",function(){
				    this.openInfoWindow(_iw);
			    });
			    _iw.addEventListener("open",function(){
				    _marker.getLabel().hide();
			    })
			    _iw.addEventListener("close",function(){
				    _marker.getLabel().show();
			    })
				label.addEventListener("click",function(){
				    _marker.openInfoWindow(_iw);
			    })
				if(!!json.isOpen){
					label.hide();
					_marker.openInfoWindow(_iw);
				}
			})()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i){
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json){
        var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
        return icon;
    }
    initMap(partner);//创建和初始化地图

	//detail页面的js结束
})