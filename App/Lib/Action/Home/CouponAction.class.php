<?php
// 本类由系统自动生成，仅供测试用途
class CouponAction extends Action {

    private $labelType = array(
        '美食' => '1',
        '休闲娱乐' => '2',
        '生活服务' => '4',
        '酒店' => '8',
        '旅游' => '16',
    );
    public function _empty($name){
        $this->error("非法提交！");
    }
    public function coupon(){
        $locationId = !empty($_GET['location']) ? $_GET['location'] : 0;
        $params = array();
        if (!empty($locationId)) {
            $params = array(
                'location_id' => $locationId,
            );
            $partnerHelper = new PartnerModel();
            $partnerInfo = $partnerHelper->getPartner($params);
            $partnerIds = DataToArray($partnerInfo, 'partner_id');
            $partnerIds = implode(',', $partnerIds);
            $params = array(
                    'partner_id' => $partnerIds,
                    );
        }

        if (!empty($_GET['cat_id'])) {
            $params['cat_id'] = $_GET['cat_id'];
        }
        if (!empty($_GET['label_type'])) {
            if (is_numeric($_GET['label_type'])) {
                $params['label_type'] = $_GET['label_type'];
            }
            else {
                $params['label_type'] = !empty($this->labelType[$_GET['label_type']]) ? $this->labelType[$_GET['label_type']] : 0;
            }
            $_GET['label_type'] = $params['label_type'];
        }
        if (!empty($_GET['tag'])) {
            $params['tag'] = $_GET['tag'];
        }
        if (!empty($_GET['status'])) {
            $params['status'] = $_GET['status'];
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
       
        $couponHelper = new CouponModel();
        $params['coupon_type'] = 1;
        $time = date("Y-m-d H:i:s");
        $params['start_time_lt'] = $time;
        $params['end_time_gt'] = $time;

        $couponInfo = $couponHelper->getCoupon($params);

        //截取tag string的length
        for ($i = 0; $i < count($couponInfo); $i++) {
            $couponInfo[$i]['tag'] = trim(mb_substr($couponInfo[$i]['tag'], strrpos($couponInfo[$i]['tag'],"，")),"，");
        }

        if ($params['order_by'] != 'download_times DESC') {
            $params['order_by'] = 'download_times DESC';
        }

        $hotparams = array(
            'limit' => '0,5',
            'order_by' => "weight DESC",
            'coupon_type' => 1,
            'start_time_lt' => $time,
            'end_time_gt' => $time,
        );
        $hotCouponInfo = $couponHelper->getCoupon($hotparams);
        $hotCouponInfo = $this->cutCouponWords($hotCouponInfo);
        
        $adHelper = new AdModel();
        $adInfo = $adHelper->getAd();
        #$model = new PartnerInfoModel();
        #$result = $model->getPartnerInfoById($partnerIds);
        foreach ($couponInfo AS $key => $value) {
            $couponInfo[$key]['description'] = mb_substr($couponInfo[$key]['description'], 0, 40, 'UTF-8');
            $couponInfo[$key]['title'] = mb_substr($couponInfo[$key]['title'], 0, 20, 'UTF-8');
        }

        list($categories, $location, $labelType) = $this->getTopButtom();
        $this->assign("categories", $categories);
        $this->assign("locations", $location);
        $this->assign("label_types", $labelType);
        $this->assign("coupons", $couponInfo);
        $this->assign("hot_coupons", $hotCouponInfo);
        $this->assign("ads", $adInfo);
        $this->assign("get_info", $_GET);
        $templateName = $_GET["_URL_"][0]; 
        $this->assign('templateName',$templateName);
        $this->display();
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
    public function specialCoupon(){
        $locationId = !empty($_GET['location']) ? $_GET['location'] : 0;

        $params = array();
        if (!empty($locationId)) {
            $params = array(
                'location_id' => $locationId,
            );
            $partnerHelper = new PartnerModel();
            $partnerInfo = $partnerHelper->getPartner($params);
            $partnerIds = DataToArray($partnerInfo, 'partner_id');
            $partnerIds = implode(',', $partnerIds);
            $params = array(
                    'partner_id' => $partnerIds,
                    );
        }
        if (!empty($_GET['cat_id'])) {
            $params['cat_id'] = $_GET['cat_id'];
        }
        if (!empty($_GET['label_type'])) {
            if (is_numeric($_GET['label_type'])) {
                $params['label_type'] = $_GET['label_type'];
            }
            else {
                $params['label_type'] = !empty($this->labelType[$_GET['label_type']]) ? $this->labelType[$_GET['label_type']] : 0;
            }
            $_GET['label_type'] = $params['label_type'];
        }
        if (!empty($_GET['tag'])) {
            $params['tag'] = $_GET['tag'];
        }
        if (!empty($_GET['status'])) {
            $params['status'] = $_GET['status'];
        }
        $sort = "weight DESC";
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
                default :
                    $params['order_by'] = "ctime DESC";
                    break;
            }
            $params['order_by'] = $sort . ", " . $params['order_by'];
        }
        else {
            $params['order_by'] = $sort;
        }
        $couponHelper = new CouponModel();
        $params['coupon_type'] = 2;
        $time = date("Y-m-d H:i:s");
       
    
        $couponInfo = $couponHelper->getCoupon($params);
         
        foreach ($couponInfo as $k => $v) {

            if (strtotime($v['start_time'])-strtotime($time) >= 0 && strtotime($v['start_time'])-strtotime($time) < (3600*48)) {
               $newcouponInfo[] = $v;
            }
             if (strtotime($time) >= strtotime($v['start_time']) && strtotime($time) <= strtotime($v['end_time'])) {
               $newcouponInfo[] = $v;
            }
        }
        // var_dump($newcouponInfo);
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
      
        if ($params['order_by'] != 'download_times DESC') {
            $params['order_by'] = 'download_times DESC';
        }
        

        $hotparams = array(
            'limit' => '0,5',
            'order_by' => "weight DESC",
            'coupon_type' => 1,
            'start_time_lt' => $time,
            'end_time_gt' => $time,
        );

        $hotCouponInfo = $couponHelper->getCoupon($hotparams);
        $hotCouponInfo = $this->cutCouponWords($hotCouponInfo);
        
        $adHelper = new AdModel();
        $adInfo = $adHelper->getAd();
        #$model = new PartnerInfoModel();
        #$result = $model->getPartnerInfoById($partnerIds);
        foreach ($couponInfo AS $key => $value) {
            $couponInfo[$key]['description'] = mb_substr($couponInfo[$key]['description'], 0, 40, 'UTF-8');
            $couponInfo[$key]['title'] = mb_substr($couponInfo[$key]['title'], 0, 20, 'UTF-8');
        }

        list($categories, $location, $labelType) = $this->getTopButtom();
      
        $this->assign("categories", $categories);
        $this->assign("locations", $location);
        $this->assign("label_types", $labelType);
        $this->assign("coupons", $newcouponInfo);
        $this->assign("hot_coupons", $hotCouponInfo);
        $this->assign("ads", $adInfo);
        $this->assign("get_info", $_GET);
        $templateName = $_GET["_URL_"][1]; 
        $this->assign('templateName',$templateName);
        $this->display();
    }


    public function detail(){
        if (empty($_GET['_URL_'][2])) {
            return TRUE;
        }
        $ids = (int)$_GET['_URL_'][2];
        $_SESSION['cid'] = $ids;
        if ($ids > 0) {
            $ids = array($ids);
        }
        if ($ids == 0) {
            $ids = array((int)$_GET['_URL_'][3]);
        }

        $couponHelper = new CouponModel();
     
        $couponInfo = $couponHelper->getCouponByCouponId($ids);
        if (empty($couponInfo)) {
            return TRUE;
        }
       
        $time = date("Y-m-d H:i:s");
        $stime = date("Y-m-d H:i:s", strtotime("-2 day"));
        foreach ($couponInfo AS $key => $value) {
            $couponInfo[$key]['left_times'] = (int)($couponInfo[$key]['limit_times'] - $couponInfo[$key]['download_times']);
            if ($couponInfo[$key]['left_times'] < 0)  {
                $couponInfo[$key]['left_times'] = 0;
            }
            if(strtotime($couponInfo[$key]['start_time']) > strtotime($time)){
                $couponInfo[$key]['Countdown_time'] = timediff(strtotime($time),strtotime($couponInfo[$key]['start_time']));
                $couponInfo[$key]['Countdown_label'] = 1;
            }
            else{
                 $couponInfo[$key]['Countdown_label'] = 0;
            }
        }
        
        $catIds = $couponInfo[0]['cat_id'];
        $catHelper = new CategoryModel();
        $params = array(
            'cat_id' => $catIds,
            'status' => 1,
        );
        $catInfo = $catHelper->getCategoryInfo($params);
        $id = (int)$_GET['_URL_'][2];
        
        $partnerIds = array($couponInfo[0]['partner_id']);

        $partnerPictureHelper = new PartnerPictureModel(); 
        $partnerPictureInfo = $partnerPictureHelper->getPartnerPictureByPartnerId($partnerIds);
        $allCoupons = $couponHelper->getCouponByPartnerId($couponInfo[0]['partner_id']);


        //获取其他优惠券
        $otherCouponsIds = array();
        foreach ($allCoupons as $k => $v) {
            if($v['coupon_id'] != $_GET['_URL_'][2]){
               array_push($otherCouponsIds, $v['coupon_id']);
            }
        }
        $otherCouponsId = implode(',', $otherCouponsIds);
        $otherParam = array();
        $otherParam['limit'] = '';
        $otherParam['coupon_type'] = 1;
        $otherParam['start_time_lt'] = $time;
        $otherParam['end_time_gt'] = $time;
        $otherParam['coupon_id'] = $otherCouponsId;
        $otherCoupons = $couponHelper->getCoupon($otherParam);

        $otherParam = array();
        $otherParam['limit'] = '';
        $otherParam['coupon_type'] = 2;
        $otherParam['coupon_id'] = $otherCouponsId;
        $sOtherCoupons = $couponHelper->getCoupon($otherParam);
       
        foreach ($sOtherCoupons as $k => $v) {

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
            if(empty($otherCoupons)){
                 $otherCoupons = $newcouponInfo;
            }else{
                 $otherCoupons = array_merge($otherCoupons,$newcouponInfo);
            }
           

        }
        


        $partnerHelper = new PartnerModel();
        $partnerInfo = $partnerHelper->getPartnerByPartnerId($partnerIds);

        $helper = new CouponEvaluationModel();
        $eInfo = $helper->getInfo(array('coupon_id' => $couponInfo[0]['coupon_id']));
        if(!empty($eInfo)){
            $totalRate = 0;
            foreach ($eInfo as $k => $v) {
                $totalRate = $totalRate + intval($v['rate']);
            }
            $avgRate = round($totalRate/count($eInfo),1); 
            $satisfaction = round($totalRate/(count($eInfo)*5),4)*"100".'%';
            $rateInfo  = array();
            $eCount = count($eInfo);
            array_push($rateInfo, $satisfaction,$avgRate,$eCount);
        }else{
            $rateInfo  = array();
            $avgRate = 0;
            $satisfaction =0;
            $eCount = count($eInfo);
            array_push($rateInfo, $satisfaction,$avgRate,$eCount);
        }
        //分页
        import('ORG.Util.AjaxPage'); // 导入分页类
        $listvar = "evaluation";
        $listRows = 10;
        $templateName = "Coupon:detail";
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $map['coupon_id'] = array('in',$couponInfo[0]['coupon_id']);
        $totalRows      = $helper->where($map)->count(); // 查询满足要求的总记录数
        $eInfo = $helper->where($map)->page($nowPage.','.$listRows)->select(); 

       

        for ($i=0; $i < count($otherCoupons); $i++) { 
                if(strlen($otherCoupons[$i]['description']) > 109){   
                    $otherCoupons[$i]['description'] = trim(mb_substr($otherCoupons[$i]['description'], 0,38,'utf-8'))."...";
                }else{
                    $otherCoupons[$i]['description'] = trim($otherCoupons[$i]['description']);
                }
        }
        $use_rule = str_replace('；', '<br>', $couponInfo[0]['use_rule']);


        $userId = DataToArray($eInfo, 'user_id');
        $userHelper = new UserProfileModel();
        $userInfo = $userHelper->getUserProfileByUserId($userId);
        $eInfo = $this->mergeData($eInfo, $userInfo, 'user_id', 'user_id');
        $_SESSION['pname'] = $partnerInfo[0]['name'];

         $param = array(
            'result'    =>$eInfo,                     //分页用的数组或sql
            'listvar'   =>$listvar,                 //分页循环变量
            'totalRows' =>$totalRows,                    
            'listRows'  =>$listRows,               //每页记录数
            'target'    =>$target,                //ajax更新内容的容器id，不带#
            'pagesId'   =>$pagesId,              //分页后页的容器id不带# target和pagesId同时定义才Ajax分页
            'template'  =>$templateName,        //ajax更新模板
           
        );
        $result = $this->do_getPageInfo($param);
        $page = $result['show'];
        $linkPage = $page['linkPage'];
        $this->assign("show", $page);
        $this->assign('linkPage',$linkPage);
        $this->assign($listvar,$eInfo);

        //获取优惠券分类标签
        $labels = $this->labelType;

        foreach ($labels as $key => $value) {
            if($couponInfo[0]['label_type'] == $value){
                $labels = $key;
            }
        }
      
        $this->assign("coupon", $couponInfo[0]);
        $this->assign("other_coupon", $otherCoupons);
        $this->assign("partner", $partnerInfo[0]);
        $this->assign("partnerInfo", json_encode($partnerInfo[0]));
        
        $this->assign("cat_info", $catInfo[0]);
        $this->assign("label_info", $labels);
        $this->assign("partnerPictures",$partnerPictureInfo);
        $this->assign('rateInfo',$rateInfo);
        $this->assign('use_rule',$use_rule);

        $templateName = $_GET["_URL_"][3]; 
        if(empty($templateName)){
            $templateName = $_GET["_URL_"][0]; 
        }
        $this->assign('templateName',$templateName);
    
        $this->display();
    }
     public function HandleAjaxPage(){
            $param = array();
            $param['coupon_id'] = $_SESSION['cid'];
            

            $couponEvaluationHelper = M('Coupon_evaluation','t_monkey_'); // 实例化Data数据对象
            import('ORG.Util.AjaxPage'); // 导入分页类
            // $listvar = "partnerComments";
            $listRows = 10;
            $templateName = "Coupon:detail";
            $nowPage = isset($_GET['p'])?$_GET['p']:1;
            $map['coupon_id'] = array('in',$param);
            $totalRows = $couponEvaluationHelper->where($map)->count(); // 查询满足要求的总记录数
            $eInfo = $couponEvaluationHelper->where($map)->page($nowPage.','.$listRows)->select();
           
            $param = array(
                'result'    =>$eInfo,                     //分页用的数组或sql
                'listvar'   =>$listvar,                 //分页循环变量
                'totalRows' =>$totalRows,                    
                'listRows'  =>$listRows,               //每页记录数
                'target'    =>$target,                //ajax更新内容的容器id，不带#
                'pagesId'   =>$pagesId,              //分页后页的容器id不带#target和pagesId同时定义才Ajax分页
                'template'  =>$templateName,        //ajax更新模板
            );
            $result = $this->do_getPageInfo($param);
            $userId = DataToArray($eInfo, 'user_id');
            $userHelper = new UserProfileModel();
            $userInfo = $userHelper->getUserProfileByUserId($userId);
            $eInfo = $this->mergeData($eInfo, $userInfo, 'user_id', 'user_id');
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
            $html = '<ul class="comment_ul">';
            foreach ($eInfo AS $key => $value) {

            $rate = $value['rate']*20;
            $html .= <<<HTML
                           <li>
                                <p class="one">{$value['nickname']}
                                    <a class="red">@{$_SESSION['pname']}</a>
                                    <span>{$value['createtime']}</span>
                                    <span class="rate_stars">
                                        <span style="width: {$rate}%;"></span>
                                    </span>
                                </p>
                                <p class="two">{$value['evaluation']}</p>
                            </li>
HTML;
            }

            $html .= "</ul>";

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
   function do_getPageInfo($param = array()) {
        extract($param);
        import("ORG.Util.AjaxPage");
        //总记录数
        $listvar   = $listvar ? $listvar : 'list';
        $listRows  = $listRows ? $listRows : 21;
        $totalRows = $totalRows ? $totalRows : 1;
        //创建分页对象
        if ($target && $pagesId)
            $p = new AjaxPage($totalRows, $listRows, $parameter, $target, $pagesId);
        else
            $p = new AjaxPage($totalRows, $listRows, $parameter);
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

    private function getEvaluation($eInfo) {
        if (empty($eInfo)) {
            return array();
        }
    }

    public function sendCouponCode() {
        $data = array(
            'status' => 0,
            'info' => "",
        );
        if (empty($_POST['phone_number']) || empty($_POST['coupon_id'])) {
            $data['info'] = '手机号码不能为空!';
            $this->ajaxReturn($data,'JSON'); 
            return TRUE;
        }
        // if (empty($_SESSION['user']['user_id'])) {
        //     $data['info'] = '未登录!';
        //     $this->ajaxReturn($data,'JSON');
        //     return TRUE;
        // }
    
        if ($_SESSION['verify'] != md5($_POST['vcode'])) {
            $data['status'] = 2;
            $data['info'] = "验证码错误!";
            $this->ajaxReturn($data,'JSON'); 
            return TRUE;
        }
        $phoneNumber = $_POST['phone_number'];
        $couponHelper = new CouponModel();
        $couponId = (int)$_POST['coupon_id'];


        $ids = array($couponId);
        $time = date('Y-m-d H:i:s');
        
        $params = array(
            'coupon_id' => $couponId,
            'start_time_lt' => $time,
            'end_time_gt' => $time,
        );
        $couponInfo = $couponHelper->getCoupon($params);
        if (empty($couponInfo)) {
           $data['info'] = "此优惠券抢购还没开始哦！";
           $this->ajaxReturn($data,'JSON');
           return TRUE;
        }
        $userCouponHelper = new UserCouponModel();
        if ($couponInfo[0]['coupon_type'] == 2) {
            if (empty($_SESSION['user']['user_id'])) {
                $data['info'] = "请先登陆!";
                $this->ajaxReturn($data,'JSON');
                return TRUE;               
            }
            $stime = $couponInfo[0]['start_time'];
            $etime = $couponInfo[0]['end_time'];
            $params = array(
                'coupon_id' => $couponId,
                'count' => 'id',
            );
            $count = $userCouponHelper->getUserCoupon($params);
            if ($count >= $couponInfo[0]['limit_times']) {
                $data['info'] = "已经抢光了，再看看同类优惠券吧~~!";
                $this->ajaxReturn($data,'JSON');
                return TRUE;                          
            }
            
        }
       

        $params = array(
            'phone_number' => $phoneNumber,
            'coupon_id' => $couponId,
            'start_time' => date("Y-m-d H:i:s", strtotime("today")),
            'end_time' => date("Y-m-d H:i:s", strtotime("+1 day")),
            'count' => 'id',
        );
        if(!empty($_SESSION['user']['user_id'])){
             $params['user_id'] = $_SESSION['user']['user_id'];
        }
        $coupons = $userCouponHelper->getUserCoupon($params);
        $count = $userCouponHelper->getUserCoupon($params);

        if ($couponInfo[0]['coupon_type'] == 2) {
            if ($count > 0) {
            $data['status'] = 3;
            $data['info'] = "今天已经申请过了，请明天再来哟!";
            $this->ajaxReturn($data,'JSON'); 
            return TRUE;           
            }
        }
        if (empty($_SESSION['user']['user_id'])) {
            if ($count > 0) {
                $data['status'] = 3;
                $data['info'] = "非登录用户同一张优惠券一天只能下载一站张，会员无限哟!";
                $this->ajaxReturn($data,'JSON'); 
                return TRUE;           
            }
            $params = array(
                'phone_number' => $phoneNumber,
                'count' => 'id',
            );
            $counts = $userCouponHelper->getUserCoupon($params);
            if ($counts >= 5) {
                $data['status'] = 3;
                $data['info'] = "非登录用户总共只能下载5条优惠券，会员无限哟!";
                $this->ajaxReturn($data,'JSON');
            }
        }
        
        // $phoneNumber = $_SESSION['user']['phone_number'];
        
        $_SESSION['user']['phone_number'] = $phoneNumber;
        // if (empty($phonNumber) || !is_numeric($phoneNumber) || $_POST['phone_number'] != $phoneNumber) {
        //     $data['info'] = "erro phone number!";
        //     $this->ajaxReturn($data, 'JSON');
        //     return TRUE;
        // }

        $code = md5(mt_rand(1000,9999) . mb_substr($phoneNumber, -4, 4) . time());
        $code = mb_substr($code, 0, 8); 
        $code = hexdec($code);
        $code = mb_substr("$code", -8, 8); 
        $couponName = $couponInfo[0]['name'];

        $couponDesc = !empty($couponInfo[0]['message']) ? $couponInfo[0]['message'] : $couponInfo[0]['description'];
        $partnerId = $couponInfo[0]['partner_id'];
        $data = $this->send($phoneNumber, $code, $couponName, $couponId,$couponDesc,$partnerId);
       
        //下载成功后数据库中download_times加1
        $helper = new CouponModel();
        $counponDownloadTimes = $couponInfo[0]['download_times'] + 1;
        $time = date("Y-m-d H:i:s");
        $updateData = array(
                'ctime' => $time, 
                'download_times' => $counponDownloadTimes,
                );
        $condition = "coupon_id = '{$couponId}'";
        $r = $helper->updateCoupon($condition,$updateData);
        if (!empty($r)) {
            $updateresult = $helper->getCouponByCouponId($ids);
            $this->assign("coupons", $couponInfo);
        }
        $this->ajaxReturn($data, "JSON");
        return TRUE;
    }

    private function send($phoneNumber, $code, $couponName, $couponId,$couponDesc,$partnerId){
        if (empty($phoneNumber) || empty($code)) {
            return FALSE;
        }
        $addData = array(
                'user_id' => "",
                'coupon_id' => $couponId,
                'status' => 1,
                'code' => $code,
                'createtime' => date('Y-m-d H:i:s'),
                'evaluated' => 0,
                'telephone' => $phoneNumber,
                'partner_id' =>$partnerId,
                );

        if(!empty($_SESSION['user']['user_id'])){     //判断匿名发送，添加我的优惠券
            $addData['user_id'] = $_SESSION['user']['user_id'];
        }
        $helper = new UserCouponModel();
        $r = $helper->addUserCoupon($addData);
        if (empty($r)) {
            $data = array(
                    'status' => 0,
                    'info' => '发送失败',
                    );
            return $data; 
        }
        session("pcheck","{$code}");
        //TODO
        $text = "您的{$couponName}优惠券码是【{$code}】，{$couponDesc}，请在消费前向商家出示此短信，感谢您试用";
        $result = sendCodeToMobile($phoneNumber, $text);
        if ($result['result'] != 1) {
            $data = array(
                    'status' => 0,
                    'info' => '发送失败',
                    );
            return $data; 
        }else{
            $data = array(
                    'status' => 1,
                    'info' => '发送成功',
                ); 

            return $data;
        }
        
    }
    private function mergeData($cmsInfo, $info, $key, $cmsKey = 'id') {
        $info = ArrayKeys($info, $key);
        $result = array();
        foreach ($cmsInfo AS $key => $value) {
            $id = $cmsInfo[$key][$cmsKey];
            if (!empty($info[$id])) {
                $cmsInfo[$key] = array_merge($cmsInfo[$key], $info[$id]);
            }
            $result[$key] = $cmsInfo[$key];
        }
        return $result;
    }
    private function cutCouponWords($info) {
        if (empty($info)) {
            return array();
        }
        foreach ($info AS $key => $value) {
            $info[$key]['description'] = mb_substr($info[$key]['description'], 0, 50, 'UTF-8');
            $info[$key]['title'] = mb_substr($info[$key]['title'], 0, 20, 'UTF-8');
        }
        return $info;
    }

    public function addFavorite() {
        $info = array(
            'status' => 0,
            'info' => "",
        );
        if (empty($_SESSION['user']['user_id']) || empty($_POST['coupon_id'])) {
            $this->ajaxReturn($info, 'JSON');
            return TRUE;
        }

        $addData = array(
                'user_id' => $_SESSION['user']['user_id'],
                'coupon_id' => $_POST['coupon_id'],
                'createtime' => date('Y-m-d H:i:s'),
                );
        $helper = new UserCollectionModel();
        $r = $helper->addUserCollection($addData);   
        if (!empty($r)) {
            $info['status'] = 1;
            $this->ajaxReturn($info, 'JSON');
            return TRUE;
        }
        
    }
    
    public function printCoupon(){

      
        if (empty($_GET['_URL_'][2])) {
            return TRUE;
        }
        $couponHelper = new CouponModel();
        $couponId = intval($_GET['_URL_'][2]);
        //$res_couponInfo = $couponHelper->getCouponByCouponId($arr_couponId);
        $res_couponInfo = $couponHelper->getCouponsByCouponId($couponId);
        if(empty($res_couponInfo)){
            echo "Empty data";
            exit;
        }
        $partner_id = intval($res_couponInfo['partner_id']);
        $arr_partnerId = array($partner_id);
        $partnerHelper = new PartnerModel();
        $res_partnerInfo = $partnerHelper->getPartnerByPartnerId($arr_partnerId);
        if(empty($res_partnerInfo)){
            echo "Empty data";
            exit;
        }
        $partner_name = $res_partnerInfo[0]['name'];
        $partner_name = trim($partner_name);
        $partner_description = $res_partnerInfo[0]['description'];
        $partner_description = trim($partner_description,"");
        array_push($res_couponInfo,$partner_name,$partner_description);
        $couponUseRule = $res_couponInfo['use_rule'];
        $couponUseRule = rtrim($couponUseRule,"。");
        $couponUseRule = str_replace("；", "<br>", str_replace(" ", "&nbsp", $couponUseRule));
        if($res_couponInfo['description'] == "" || $res_couponInfo['use_rule'] == ""){
            $this->assign('errno',1);
        }
        $this->assign('couponInfo',$res_couponInfo);
        $this->assign('couponUseRule',$couponUseRule);
        $this->display();
    }

}

