<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {

    private $coupon = array();
    private $card = array();
    private $partner = array();
    private $evaluation = array();
    private $news = array();
    private $recommend = array();
    private $ads = array();
    public function _empty($name){
        $this->error("非法提交！");
    }
    public function index(){
        // if(!$cmsData = S('cmsData')){   //缓存
        //     echo('1111');
        //     $helper = new CmsIndexModel();
        //     $cmsData = $helper->readCmsIndex();
        //     S('cmsData',$cmsData,20);
        // }
        $helper = new CmsIndexModel();
        $cmsData = $helper->readCmsIndex();
        $this->releaseData($cmsData);

        list($coupon,$newSpecicalCoupon, $GDCoupon,$hotCouponInfo) = $this->getCoupon($this->$coupon);
        $card = $this->getCard($this->card);
        $news = $this->getNews($this->news);
        $ads = $this->getAds($this->ads);
        $partner = $this->getPartner($this->partner);
        $recommend = $this->getPartner($this->recommend);
        $evaluation = $this->getEvaluation($this->evaluation);
        $location = $this->getLocation();
        $category = $this->getCategory();
        $this->assign("coupons", $coupon);
        $this->assign("hot_coupons", $hotCouponInfo);
        $this->assign("eat_coupons", $newSpecicalCoupon);
        $this->assign("play_coupons", $GDCoupon);
        $this->assign("cards", $card);
        $this->assign("news", $news);
        $this->assign("ads", $ads);
        $this->assign("partners", $partner);
        $this->assign("hot_partners", $partner);
        $this->assign("recommends", $recommend);
        $this->assign("evaluations", $evaluation);
        $this->assign("locations", $location);
        $this->assign("categories", $category);
        $templateName = $_GET["_URL_"][1]; 
        $this->assign('templateName',$templateName);
        $this->display();
        
    }

    private function getCategory() {
        $helper = new CategoryModel();
        $params = array(
            'limit' => '0,6',
            'status' => 1,
        );
        $category = $helper->getCategoryInfo($params);
        return $category;
    }

    private function getLocation() {
       $helper = new LocationModel();
        $params = array(
            'limit' => '0,5',
            'status' => 1,
        );
       $locationInfo = $helper->getLocationInfo($params);
       return $locationInfo;
    }

    private function getCoupon($coupon) {
        if (empty($coupon)) {
            return array();
        }
        $time = date("Y-m-d H:i:s");
        $ids = DataToArray($coupon, 'id');
        $helper = new CouponModel();
        $cHelper = new CategoryModel();
        $info = $helper->getCouponByCouponId($ids);
        $info = $this->cutCouponWords($info);

        //获取限时优惠券
        $params = array(
            'coupon_type' => 2,
            'order_by' => "weight DESC",
        );
        $specicalCoupon = $helper->getCoupon($params);
        $specicalCoupon = $this->cutCouponWords($specicalCoupon);

        foreach ($specicalCoupon as $k => $v) {

            if (strtotime($v['start_time'])-strtotime($time) >= 0 && strtotime($v['start_time'])-strtotime($time) < (3600*48)) {
               $newSpecicalCoupon[] = $v;
            }
             if (strtotime($time) >= strtotime($v['start_time']) && strtotime($time) <= strtotime($v['end_time'])) {
               $newSpecicalCoupon[] = $v;
            }
        }

         foreach ($newSpecicalCoupon AS $key => $value) {
            $newSpecicalCoupon[$key]['left_times'] = (int)($newSpecicalCoupon[$key]['limit_times'] - $newSpecicalCoupon[$key]['download_times']);
            if ($newSpecicalCoupon[$key]['left_times'] < 0)  {
                $newSpecicalCoupon[$key]['left_times'] = 0;
            }
            if(strtotime($newSpecicalCoupon[$key]['start_time']) > strtotime($time)){
                $newSpecicalCoupon[$key]['Countdown_time'] = timediff(strtotime($time),strtotime($newSpecicalCoupon[$key]['start_time']));
                $newSpecicalCoupon[$key]['Countdown_label'] = 1;
            }
            else{
                 $newSpecicalCoupon[$key]['Countdown_label'] = 0;
            }
        }
       
        //获取校园优惠券
        $params = array(
            'tag' => '桂林电子科技大学',
            'limit' => '0,4',
            'order_by' => "weight DESC",
        );
        $GDCoupon = $helper->getCoupon($params);
        $GDCoupon = $this->cutCouponWords($GDCoupon);
        //获取热门优惠券
        $params = array(
            'limit' => '0,5',
            'order_by' => "weight DESC",
            'coupon_type' => 1,
            'start_time_lt' => $time,
            'end_time_gt' => $time,
        );
        $hotCouponInfo = $helper->getCoupon($params);
        $hotCouponInfo = $this->cutCouponWords($hotCouponInfo);


        $result = $this->mergeData($coupon, $info, 'coupon_id');
        return array($result, $newSpecicalCoupon, $GDCoupon,$hotCouponInfo);
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

    private function getCard($card) {
        if (empty($card)) {
            return array();
        }
        $ids = DataToArray($card, 'id');
        $helper = new CouponModel();
        $info = $helper->getCouponByCouponId($ids);
        $result = $this->mergeData($card, $info, 'card_id');
        return $result;
    }

    private function getNews($news) {
        if (empty($news)) {
            return array();
        }
        $ids = DataToArray($news, 'id');
        $newsHelper = new NewsModel();
        $info = $newsHelper->getNewsByNewsId($ids);
        $result = $this->mergeData($news, $info, 'news_id');
        return $result;
    }

    private function getAds($ads) {
        if (empty($ads)) {
            return array();
        }
        $ids = DataToArray($ads, 'id');
        $adHelper = new AdModel();
        $info = $adHelper->getAdByAdId($ids);
        $result = $this->mergeData($ads, $info, 'id');
        return $result;
    }

    private function getPartner($partners) {
        if (empty($partners)) {
            return array();
        }
        $ids = DataToArray($partners, 'id');
        $helper = new PartnerModel();
        $info = $helper->getPartnerByPartnerId($ids);
        $helper = new PartnerPictureModel();
        $picture = $helper->getPartnerPictureByPartnerId($ids); 
        $result = $this->mergeData($partners, $info, 'partner_id');
        $result = $this->mergeData($result, $picture, 'partner_id');
        return $result;
    }

    private function getEvaluation($evaluations) {
        $helper = new EvaluationModel();
        $info = $helper->getEvaluation();
        $userId = DataToArray($info, 'user_id');
        $userHelper = new UserProfileModel();
        $userInfo = $userHelper->getUserProfileByUserId($userId);
        $result = $this->mergeData($info, $userInfo, 'user_id', 'user_id');
        $partnerIds = DataToArray($info, 'id');
        $partnerHelper = new PartnerModel();
        $partnerInfo = $partnerHelper->getPartnerByPartnerId($partnerIds);
        $result = $this->mergeData($result, $partnerInfo, 'partner_id', 'id');
        return $result;
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
    
    private function releaseData($cmsData) {
        foreach ($cmsData AS $k => $v) {
            switch ($cmsData[$k]['module_type']) {
                case '1':
                    $this->card[] = $cmsData[$k];
                    break;

                case '2':
                    $this->coupon[] = $cmsData[$k];
                    break;

                case '3':
                    $this->partner[] = $cmsData[$k];
                    break;

                case '4':
                    $this->evaluation[] = $cmsData[$k];
                    break;

                case '5':
                    $this->news[] = $cmsData[$k];
                    break;
                
                case '6':
                    $this->ads[] = $cmsData[$k];
                    break;

                case '7' :
                    $this->recommend[] = $cmsData[$k];
                    break;

            }
        }
        return TRUE;
    }

}

