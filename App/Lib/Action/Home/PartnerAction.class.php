<?php
// 本类由系统自动生成，仅供测试用途
class PartnerAction extends Action {
     private $labelType = array(
        '1' => '美食',
        '2' => '休闲娱乐',
        '4' => '生活服务',
        '8' => '酒店',
        '16' => '旅游',
    );
    public function _empty($name){
        $this->error("非法提交！");
    }
    public function partner(){
        $params = array(
                'limit' => '',
            );
        if (!empty($_GET['cat_id'])) {
            $params['cat_id'] = $_GET['cat_id'];
        }
        if (!empty($_GET['location'])) {
            $params['location_id'] = $_GET['location'];
        }
        if (!empty($_GET['label_type'])) {
            $params['label_type'] = $_GET['label_type'];
        }
        if (!empty($_GET['tag'])) {
            $params['tag'] = $_GET['tag'];
        }
        if (!empty($_GET['sort'])) {
            $orderBy = $_GET['sort'];
            switch($orderBy) {
                case 'times_a':
                    $params['order_by'] = "download_times ASC";
                    break;
                case 'times_d':
                    $params['order_by'] = "download_times DESC";
                    break;
                case 'rate_a':
                    $params['order_by'] = "rate ASC";
                    break;
                case 'rate_d':
                    $params['order_by'] = "rate DESC";
                    break;
                case 'price_a':
                    $params['order_by'] = "price ASC";
                    break;
                case 'price_d':
                    $params['order_by'] = "price DESC";
                    break;
                case 'likes_num_a':
                    $params['order_by'] = "likes_num ASC";
                    break;
                case 'likes_num_d':
                    $params['order_by'] = "likes_num DESC";
                    break;
                case 'time_a':
                    $params['order_by'] = "ctime ASC";
                    break;
                case 'time_d':
                    $params['order_by'] = "ctime DESC";
                    break;
            }
        }
         $time = date("Y-m-d H:i:s");
        $partnerHelper = new PartnerModel();
    	$couponHelper = new CouponModel();
    	$Evaluationhelper = new CouponEvaluationModel();
        $partnerTagshelper = new PartnerTagsModel();
        if (!empty($params['order_by'])) {
            if (stristr($params['order_by'], 'rate')) {
                $orderPartner= $Evaluationhelper->getPartnerRate($params['order_by']);
            }
            else if (stristr($params['order_by'], 'download_times')) {
                $orderPartner = $couponHelper->getPartnerCouponOrderBy($params['order_by']);
            }
            unset($params['order_by']);

        }

    	//获取热门优惠券
        $hotparams = array(
            'limit' => '0,5',
            'order_by' => "weight DESC",
            'coupon_type' => 1,
            'start_time_lt' => $time,
            'end_time_gt' => $time,
        );

        $hotCouponInfo = $couponHelper->getCoupon($hotparams);
        $hotCouponInfo = $this->cutCouponWords($hotCouponInfo);

        //获取全部优惠券
        $param = array();
        $param['limit'] = '';
        $param['coupon_type'] = 1;
       
        $param['start_time_lt'] = $time;
        $param['end_time_gt'] = $time;
        $couponInfo = $couponHelper->getCoupon($param);
        $couponInfo = $this->cutCouponWords($couponInfo);

        $param = array();
        $param['limit'] = '';
        $param['coupon_type'] = 2;
        $ScouponInfo = $couponHelper->getCoupon($param);
        $ScouponInfo = $this->cutCouponWords($ScouponInfo);
        foreach ($ScouponInfo as $k => $v) {

            if (strtotime($v['start_time'])-strtotime($time) >= 0 && strtotime($v['start_time'])-strtotime($time) < (3600*48)) {
               $newcouponInfo[] = $v;
            }
             if (strtotime($time) >= strtotime($v['start_time']) && strtotime($time) <= strtotime($v['end_time'])) {
               $newcouponInfo[] = $v;
            }
        }
        if(!empty($newcouponInfo)){
            foreach ($newcouponInfo AS $key => $value) {
                $newcouponInfo[$key]['left_times'] = (int)($newcouponInfo[$key]['limit_times'] - $newcouponInfo[$key]['download_times']);
                if ($newcouponInfo[$key]['left_times'] < 0)  {
                    $newcouponInfo[$key]['left_times'] = 0;
                }
                if(strtotime($newcouponInfo[$key]['start_time']) > strtotime($time)){
                    $newcouponInfo[$key]['Countdown_time'] = timediff(strtotime($time),strtotime($newcouponInfo[$key]['start_time']));
                    $newcouponInfo[$key]['Countdown_label'] = 1;
                }
                else{
                     $newcouponInfo[$key]['Countdown_label'] = 0;
                }
            }
            $couponInfo = array_merge($couponInfo,$newcouponInfo);
        }
         
       



        
       //获取全部商家
        $params['limit'] = '';
        $partnerInfo = $partnerHelper->getPartner($params);
     
        $partnerInfo = $this->cutPartnerWords($partnerInfo);



        //获取优惠券评分
        $partnerRateResult= array();
       	$partnerIds = array();
       	foreach ($partnerInfo as $k => $v) {
        	array_push($partnerIds, $v['partner_id']);
        }
        foreach ($partnerIds as $k => $v) {
        	 $eInfo = $Evaluationhelper->getRateByPartnerId($v);
        	 array_push($partnerRateResult, $eInfo);
        }

        //获取顶部与商家分类信息
        list($categories, $location, $labelType) = $this->getTopButtom();
       
        //获取商家标签
        $partnerTagsInfo = $partnerTagshelper->getPartnerTagsInfo();

        
        if (!empty($orderPartner)) {
            $partner = array();
            foreach ($partnerInfo AS $key => $value) {
                $partner[$partnerInfo[$key]['partner_id']] = $partnerInfo[$key];
            }
            unset($partnerInfo);
            foreach ($orderPartner AS $key => $value) {
                $partnerInfo[$orderPartner[$key]['partner_id']] = $partner[$orderPartner[$key]['partner_id']];
            }
            if (count($partnerInfo) < count($partner)) {
                foreach ($partner AS $key => $value) {
                    if (!isset ($partnerInfo[$key])) {
                        $partnerInfo[$key] = $partner[$key];
                    }
                }
            }
        }
        $this->assign("categories", $categories);
        $this->assign("locations", $location);
        $this->assign("label_types", $labelType);
        $this->assign("hot_coupons", $hotCouponInfo);
        $this->assign("coupons", $couponInfo);
        $this->assign("partners", $partnerInfo);
        $this->assign("partner_rates", $partnerRateResult);
        $this->assign("partner_tags", $partnerTagsInfo);
        $this->assign("get_info", $_GET);
        $templateName = $_GET["_URL_"][0]; 
        $this->assign('templateName',$templateName);
        $this->display();
    }
    public function detail(){
        $partnerId = $_GET['_URL_'][3];
        $_SESSION['pid'] = $partnerId;
        $offTime = $_GET['off_time'];
        $partnerId = array(
            'partner_id' => $partnerId,
        );
        $partnerHelper = new PartnerModel();
        $data = $partnerHelper->getPartnerByPartnerId($partnerId);
        if (empty($data)) {
            return false;
        }

        $location_desc = trim(mb_substr($data[0]['location_desc'], 0,17,'utf-8'))."...";
        $description = trim(mb_substr($data[0]['description'], 0,123,'utf-8'));
        if(strlen($description)>330){
            $description = $description."...";
        }
        $partnerPictureId = array(
            'partner_id' => $data[0]['partner_id'],
        );
        $partnerPictureHelper = new PartnerPictureModel();
        $partnerPictureInfo = $partnerPictureHelper->getPartnerPictureByPartnerId($partnerPictureId);
        foreach ($partnerPictureInfo as $k => $v) {
            $json_partnerPicInfo[] = $v['picture_path'];
        }

        //获取商家优惠券
        $couponHelper = new CouponModel();
        $time = date('Y-m-d H:i:s');
        if (!empty($offTime) && is_numeric($offTime)) {
            $str = "end_time < '{$time}'";
            $params = array(
                    'partner_id' => $data[0]['partner_id'],
                    'str' =>  $str,
                    );
        }
        else {

            $startTime = date("Y-m-d H:i:s", strtotime("+2day"));
            $str = "end_time >= '{$time}' AND ((start_time <= '{$startTime}' AND coupon_type = 2) OR (start_time <= '{$time}' AND coupon_type = 1))";
            $params = array(
                    'partner_id' => $data[0]['partner_id'],
                    'str' =>  $str,
                    );       
        }
        $partnerCouponInfo = $couponHelper->getCoupon($params);
        
        
        //获取商家分类标签
        $partnerTagshelper = new PartnerTagsModel();
        $partnerTagsInfo = $partnerTagshelper->getPartnerTagsInfoById($data[0]['partner_id']);
     

        //获取优惠券评分
        $Evaluationhelper = new CouponEvaluationModel();
        $partnerRateResult= array();
        $eInfo = $Evaluationhelper->getRateByPartnerId($data[0]['partner_id']);
        array_push($partnerRateResult, $eInfo);


        //获取热门优惠券
       $hotparams = array(
            'limit' => '0,5',
            'order_by' => "weight DESC",
            'coupon_type' => 1,
            'start_time_lt' => $time,
            'end_time_gt' => $time,
        );
        $hotCouponInfo = $couponHelper->getCoupon($hotparams);
        $hotCouponInfo = $this->cutCouponWords($hotCouponInfo);

        //获取商家所有优惠券的评论
       
         //分页
        $param['partner_id'] = $data[0]['partner_id'];
        $partnerEvaluationHelper = M('Partner_evaluation','v_monkey_'); // 实例化Data数据对象
        import('ORG.Util.AjaxPage'); // 导入分页类
        $listvar = "partnerComments";
        $listRows = 10;
        $target = "alleva_box";
        $pagesId = "page_div";
        $templateName = "Partner:detail";
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $map['partner_id'] = array('in',$partnerId);
        $totalRows      = $partnerEvaluationHelper->where($map)->count(); // 查询满足要求的总记录数
        $list = $partnerEvaluationHelper->where($map)->page($nowPage.','.$listRows)->select();
        $param = array(
            'result'    =>$list,                     //分页用的数组或sql
            'listvar'   =>$listvar,                 //分页循环变量
            'totalRows' =>$totalRows,                    
            'listRows'  =>$listRows,               //每页记录数
            'target'    =>$target,                //ajax更新内容的容器id，不带#
            'pagesId'   =>$pagesId,              //分页后页的容器id不带#target和pagesId同时定义才Ajax分页
            'template'  =>$templateName,        //ajax更新模板
        );
        $result = $this->do_getPageInfo($param);
        $page = $result['show'];
        $linkPage = $page['linkPage'];
        $this->assign("show", $page);
        $this->assign('linkPage',$linkPage);
        $this->assign($listvar,$list);


        $this->assign('location_desc',$location_desc);
        $this->assign('description',$description);
        $this->assign('partnerInfo',$data);
        $this->assign("partner", json_encode($data[0]));
        $this->assign('partnerPictureInfo',$partnerPictureInfo);
        $this->assign("partnerPicture", json_encode($json_partnerPicInfo));
        $this->assign('partnerCouponInfo',$partnerCouponInfo);
        $this->assign("partner_tags", $partnerTagsInfo);
        $this->assign("partner_rate", $partnerRateResult);
        $this->assign("hot_coupons", $hotCouponInfo);
        $this->assign("pageNums", $pageNum);
        $this->assign("get_info", $page);
        $this->assign("get", $_GET);
        $templateName = $_GET["_URL_"][0]; 
        $this->assign('templateName',$templateName);
        $this->display();

      
    }

    public function HandleAjaxPage(){
            $param = array();
            $param['partner_id'] = $_SESSION['pid'];
            // $param['partner_id'] = 25;

            $partnerEvaluationHelper = M('Partner_evaluation','v_monkey_'); // 实例化Data数据对象
            import('ORG.Util.AjaxPage'); // 导入分页类
            $listvar = "partnerComments";
            $listRows = 10;
            $target = "alleva_box";
            $pagesId = "page_div";
            $templateName = "Partner:detail";
            $nowPage = isset($_GET['p'])?$_GET['p']:1;
            $map['partner_id'] = array('in',$param);
            $totalRows = $partnerEvaluationHelper->where($map)->count(); // 查询满足要求的总记录数
            $list = $partnerEvaluationHelper->where($map)->page($nowPage.','.$listRows)->select();
            $param = array(
                'result'    =>$list,                     //分页用的数组或sql
                'listvar'   =>$listvar,                 //分页循环变量
                'totalRows' =>$totalRows,                    
                'listRows'  =>$listRows,               //每页记录数
                'target'    =>$target,                //ajax更新内容的容器id，不带#
                'pagesId'   =>$pagesId,              //分页后页的容器id不带#target和pagesId同时定义才Ajax分页
                'template'  =>$templateName,        //ajax更新模板
            );
            $result = $this->do_getPageInfo($param);
            
            if(empty($result)){
                $data = array(
                    'status' => 0,
                    'info' => '结果集为空！'
                );
                $this->ajaxReturn($data);   
            }else{
                 $data = array(
                    'status' => 1,
                    'info' => '分页成功！',

                );
            }
            $html = '<div class="evacontent_box">';
            foreach ($list AS $key => $value) {
                $rate = $value['rate']*20;
            $html .= <<<HTML
							<div class="evacontent">
								<div class="evacontent_top">
									<a class="username" href="#">{$value['nickname']}**{$value['createtime']}</a>
									<span class="eva_rate_stars">
										<span style="width: {$rate}%;"></span>
									</span>
								</div>
								<p class="comment_desc">{$value['evaluation']}</p>
								<p class="storename">{$value['couponname']}({$value['coupontitle']})</p>
							</div>

HTML;
            }
            $html .= "</div>";

            $html .= <<<HTML
            <div class="page_div" id="page_div_id">
            <ul class="clearfix page_box">
								{$result['show']['first']}{$result['show']['upPage']}
HTML;
foreach ($result['show']['linkPage'] AS $key => $value) {
    $html .= "<li>{$value}</li>";
}

$html .= <<<HTML
{$result['show']['downPage']}{$result['show']['end']}
            </ul>
             </div>
HTML;
                

             $data['html'] = $html;
             $this->ajaxReturn($data);   
            
        
    }
    private function cutCouponWords($info) {
        if (empty($info)) {
            return array();
        }
        foreach ($info AS $key => $value) {
        	if(strlen($info[$key]['description']) >150){
        		$info[$key]['description'] = mb_substr($info[$key]['description'], 0, 110, 'UTF-8').'...';
        	}
            $info[$key]['title'] = mb_substr($info[$key]['title'], 0, 20, 'UTF-8');
        }
        return $info;
    }
    private function cutPartnerWords($info) {
        if (empty($info)) {
            return array();
        }
        foreach ($info AS $key => $value) {
        	if(strlen($info[$key]['location_desc']) >75){
        		$info[$key]['location_desc'] = mb_substr($info[$key]['location_desc'], 0, 25, 'UTF-8').'...';
        	}
        }
        return $info;
    }
    private function getTopButtom() {
        $categories = $this->getCategory();
        $location = $this->getLocation();
        $labelType = $this->labelType;
        return array($categories, $location, $labelType);
    }

    private function getCategory() {
        $helper = new CategoryModel();
        $params = array(
            'limit' => '',
            'status' => 1,
        );
        $category = $helper->getCategoryInfo($params);
        return $category;
    }

    private function getLocation() {
       $helper = new LocationModel();
        $params = array(
            'limit' => '',
            'status' => 1,
        );
       $locationInfo = $helper->getLocationInfo($params);
       return $locationInfo;
    }

    /**
     *+----------------------------------------------------------
     * 分页函数 支持sql和数据集分页 sql请用 buildSelectSql()函数生成
     *+----------------------------------------------------------
     * @access public
     *+----------------------------------------------------------
     * @param array   $result 排好序的数据集或者查询的sql语句
     * @param int       $totalRows  每页显示记录数 默认21
     * @param string $listvar    赋给模板遍历的变量名 默认list
     * @param string $parameter  分页跳转的参数
     * @param string $target  分页后点链接显示的内容id名
     * @param string $pagesId  分页后点链接元素外层id名
     * @param string $template ajaxlist的模板名
     * @param string $url ajax分页自定义的url
     * @param string $tabePrefix需要操作查询的表前缀
     * @param string $tableName需要操作查询的数据表名
     *+----------------------------------------------------------
     */
    private function do_getPageInfo($param = array()) {
        extract($param);
        import("ORG.Util.AjaxPage");
        //总记录数
        $listvar   = $listvar ? $listvar : 'list';
        $listRows  = $listRows ? $listRows : 10;
        $totalRows = $totalRows ? $totalRows : 1;
       
        //创建分页对象
        if ($target && $pagesId)
            $p = new AjaxPage($totalRows, $listRows, $parameter, $target, $pagesId);
        else
            $p = new AjaxPage($totalRows, $listRows, $parameter);
        // $p->anchor = "#back_comment_performance";
        /*
        *设置分页输出选项
        */
        $p->setConfig('next','<li style="width:55px;line-height:25px;text-align:center">下一页</li>');
        $p->setConfig('prev','<li style="width:55px;line-height:25px;text-align:center">上一页</li>');
        $p->setConfig('first','<li style="width:55px;line-height:25px;text-align:center">首页</li>');
        $p->setConfig('last','<li style="width:55px;line-height:25px;text-align:center">末页</li>');
        /**************************************设置分页选项结束**************************************/
       
        //分页显示
        $page = $p->show();
        $result = array(
            'show' =>$page,
            );

        return $result;
    }


}

