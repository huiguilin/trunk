<?php
// 本类由系统自动生成，仅供测试用途
class CouponAction extends Action {

    private $labelType = array(
        '1' => '民以食为天',
        '2' => '休闲娱乐',
        '3' => '生活服务',
        '4' => '酒店',
        '5' => '旅游',
        '6' => '丽人',
    );
    public function coupon(){
        $locationId = !empty($_GET['location_id']) ? $_GET['location_id'] : 0;
        $params = array();
        if (!empty($locationId)) {
            $params = array(
                'location_id' => $locationId,
            );
        }
        $partnerHelper = new PartnerModel();
        $partnerInfo = $partnerHelper->getPartner($params);
        $partnerIds = DataToArray($partnerInfo, 'partner_id');
        $partnerIds = implode(',', $partnerIds);
        $params = array(
            'partner_id' => $partnerIds,
        );
        if (!empty($_GET['label_type'])) {
            $params['label_type'] = (int)$_GET['label_type'];
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
        $couponInfo = $couponHelper->getCoupon($params);
        if ($params['order_by'] != 'download_times DESC') {
            $params['order_by'] = 'download_times DESC';
        }
        $hotCouponInfo = $couponHelper->getCoupon($params);
        $adHelper = new AdModel();
        $adInfo = $adHelper->getAd();
        #$model = new PartnerInfoModel();
        #$result = $model->getPartnerInfoById($partnerIds);
        foreach ($couponInfo AS $key => $value) {
            $couponInfo[$key]['description'] = mb_substr($couponInfo[$key]['description'], 0, 40, 'UTF-8');
            $couponInfo[$key]['title'] = mb_substr($couponInfo[$key]['title'], 0, 20, 'UTF-8');
        }
        $this->assign("coupons", $couponInfo);
        $this->assign("hot_coupons", $hotCouponInfo);
        $this->assign("ads", $adInfo);
        $this->display();
    }

    public function detail(){
        if (empty($_GET['_URL_'][2])) {
            return TRUE;
        }
        $couponHelper = new CouponModel();
        $ids = array((int)$_GET['_URL_'][2]);
        $couponInfo = $couponHelper->getCouponByCouponId($ids);
        if (empty($couponInfo)) {
            return TRUE;
        }
        $id = (int)$_GET['_URL_'][2];
        $otherCoupons = $couponHelper->getCouponByPartnerId($id);
        $partnerIds = array($couponInfo[0]['partner_id']);
        $partnerHelper = new PartnerModel();
        $partnerInfo = $partnerHelper->getPartnerByPartnerId($partnerIds);
        $helper = new EvaluationModel();
        $eInfo = $helper->getEvaluationByPartnerId(array($couponInfo[0]['coupon_id']));
        $userId = DataToArray($eInfo, 'user_id');
        $userHelper = new UserProfileModel();
        $userInfo = $userHelper->getUserProfileByUserId($userId);
        $eInfo = $this->mergeData($eInfo, $userInfo, 'user_id', 'user_id');
        $this->assign("coupon", $couponInfo[0]);
        $this->assign("other_coupon", $otherCoupons);
        $this->assign("partner", $partnerInfo[0]);
        $this->assign("evaluation", $eInfo);
        $this->display();
    }

    public function sendCoupon() {
        $_POST['phone_number'] = 18611244143;
        $_POST['coupon_id'] = 3;
        $result = array(
            'status' => 0,
            'info' => "",
        );
        if (empty($_POST['phone_number']) || empty($_POST['coupon_id'])) {
            $result['info'] = "empty params!";
            $this->ajaxReturn($result,'JSON'); 
            return TRUE;
        }

        $couponHelper = new CouponModel();
        $ids = array((int)$_POST['coupon_id']);
        $couponInfo = $couponHelper->getCouponByCouponId($ids);
        if (empty($couponInfo)) {
           $result['info'] = "wrong counpon_id!";
           $this->ajaxReturn($result,'JSON');
           return TRUE;
        }
        $phoneNumber = (int)$_POST['phone_number'];
        $code = 7891234;
        $partnerName = $couponInfo[0]['name'];
        $result = $this->send($phoneNumber, $code, $partnerName);
        $this->ajaxReturn($result, "JSON");
        return TRUE;
    }

    private function send($phoneNumber, $code, $partnerName) {
        if (empty($phoneNumber) || empty($code)) {
            return FALSE;
        }
        session("pcheck","{$code}");
        //TBC
        $result = sendCodeToMobile($phoneNumber, "您的{$partnerName}优惠券码是【{$code}】，感谢您使用【惠桂林】");
        $data = array(
            'status' => 1,
            'info' => '发送成功',
        );
        return $data;
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

}

