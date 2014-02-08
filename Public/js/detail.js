$(function(){

	$('#main #coupon_box div.business_detail_info_box div.business_location div.map_box ul li').click(function(event) {
		$('#main #coupon_box div.business_detail_info_box div.business_location div.map_box ul li div').hide();
		$('#main #coupon_box div.business_detail_info_box div.business_location div.map_box ul li').removeClass();
		$(this).removeClass().addClass('white').find('div').show();
	});
	$('#main #coupon_box div.business_detail_info_box ul.business_nav li').click(function(event) {
		var index = $(this).index();
		
		if(index ==0){
			$(this).addClass('no_bottom_border').siblings('li').removeClass('no_bottom_border');
			$('#main #coupon_box div.business_detail_info_box div.business_location').show();
			$('#main #coupon_box div.business_detail_info_box div.business_intro').hide();
			$('#main #coupon_box div.business_detail_info_box div.show_comment').hide();
		}
		else if(index ==1){
			$(this).addClass('no_bottom_border').siblings('li').removeClass('no_bottom_border');
			$('#main #coupon_box div.business_detail_info_box div.business_location').hide();
			$('#main #coupon_box div.business_detail_info_box div.business_intro').show();
			$('#main #coupon_box div.business_detail_info_box div.show_comment').hide();
		}
		else if(index ==2){
			$(this).addClass('no_bottom_border').siblings('li').removeClass('no_bottom_border');
			$('#main #coupon_box div.business_detail_info_box div.business_location').hide();
			$('#main #coupon_box div.business_detail_info_box div.business_intro').hide();
			$('#main #coupon_box div.business_detail_info_box div.show_comment').show();
		}
		return false;
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
	//创建和初始化地图函数：
	function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图中添加缩放控件
        // addMarker();//向地图中添加marker
    }
	  //创建地图函数：
	 function createMap(){
        var map = new BMap.Map("detail_map_box");
        map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);// 创建地址解析器实例已天安门为中心
        var myGeo = new BMap.Geocoder();// 将地址解析结果显示在地图上，并调整地图视野
        myGeo.getPoint("桂林第十八中学", function(point){
        if (point) {
                map.centerAndZoom(point, 12);
                map.addOverlay(new BMap.Marker(point));
            }
        }, "桂林市");
        myGeo.getPoint("象山公园", function(point){
        if (point) {
                map.centerAndZoom(point, 12);
                map.addOverlay(new BMap.Marker(point));
            }
        }, "桂林市");
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
		var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:0}); //0代表缩略图控件折起来，1代表展开
		map.addControl(ctrl_ove);
	        //向地图中添加比例尺控件
		var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
		map.addControl(ctrl_sca);
    }
	// 查查完整地图弹窗结束
})