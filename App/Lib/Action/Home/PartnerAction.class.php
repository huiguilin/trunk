<?php
// 本类由系统自动生成，仅供测试用途
class PartnerAction extends Action {
     private $labelType = array(
        '1' => '美食',
        '2' => '休闲娱乐',
        '3' => '生活服务',
        '4' => '酒店',
        '5' => '旅游',
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

        $partnerHelper = new PartnerModel();
    	$couponHelper = new CouponModel();
    	$Evaluationhelper = new CouponEvaluationModel();
        $partnerTagshelper = new PartnerTagsModel();

    	//获取热门优惠券
        $param =array();
    	$param['limit'] = '0,5';
        $hotCouponInfo = $couponHelper->getCoupon($param);
        $hotCouponInfo = $this->cutCouponWords($hotCouponInfo);

        //获取全部优惠券
        $param['limit'] = '';
        $couponInfo = $couponHelper->getCoupon($param);
        $couponInfo = $this->cutCouponWords($couponInfo);
        
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

        
        $this->assign("categories", $categories);
        $this->assign("locations", $location);
        $this->assign("label_types", $labelType);
        $this->assign("hot_coupons", $hotCouponInfo);
        $this->assign("coupons", $couponInfo);
        $this->assign("partners", $partnerInfo);
        $this->assign("partner_rates", $partnerRateResult);
        $this->assign("partner_tags", $partnerTagsInfo);
        $this->assign("get_info", $_GET);
        $templateName = $_GET["_URL_"][1]; 
        $this->assign('templateName',$templateName);
        $this->display();
    }
    public function detail(){
        $partnerId = $_GET['_URL_'][3];
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
            $str = "end_time >= '{$time}' AND start_time <= '{$time}'";
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
        $param =array();
        $param['limit'] = '0,5';
        $hotCouponInfo = $couponHelper->getCoupon($param);
        $hotCouponInfo = $this->cutCouponWords($hotCouponInfo);

        //获取商家所有优惠券的评论
        $param['partner_id'] = $data[0]['partner_id'];
        $page = !empty($_GET['_URL_'][5]) ? $_GET['_URL_'][5] : 0;
        $pageSize = 2;
        $offset = $page * $pageSize;
        $firstset = ($page-1)* $pageSize;

        if($page == 0 || $page ==1){
            $param['limit'] = "0,{$pageSize}";
        }else{
            $param['limit'] = "{$firstset},{$offset}";
        }
        $pEvaluationHelper = new PartnerEvaluationModel();
        $count = $pEvaluationHelper->getCountByPartnerId($data[0]['partner_id']);
        $pageNum = ceil($count/$pageSize);

        $partnerCommentResult = $pEvaluationHelper->getPartnerEvaluationInfoById($param);

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
        $this->assign("partnerComments", $partnerCommentResult);
        $this->assign("pageNums", $pageNum);
        $this->assign("get_info", $page);
        $this->assign("get", $_GET);
        $this->display();
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

}

