<?php
// 本类由系统自动生成，仅供测试用途
class SearchAction extends Action {
    private $labelType = array(
        '1' => '美食',
        '2' => '休闲娱乐',
        '3' => '生活服务',
        '4' => '酒店',
        '5' => '旅游',
        '6' => '丽人',
    );
    public function search(){
        $searchKey = !empty($_GET['search_con']) ? $_GET['search_con'] : "";
        $couponInfo = $this->hackSearchWords($searchKey);

        $locationId = !empty($_GET['location']) ? $_GET['location'] : 0;
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
        if (!empty($_GET['cat_id'])) {
            $params['cat_id'] = $_GET['cat_id'];
        }
        if (!empty($_GET['label_type'])) {
            $params['label_type'] = $_GET['label_type'];
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
        if (empty($couponInfo)) {
            $couponInfo = $couponHelper->getCoupon($params);
        }
        if ($params['order_by'] != 'download_times DESC') {
            $params['order_by'] = 'download_times DESC';
        }
        $params['limit'] = '0,5';
        $hotCouponInfo = $couponHelper->getCoupon($params);
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
        $this->assign("total_number", count($couponInfo));
        $this->display();
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
    private function hackSearchWords($searchKey) {
        if (empty($searchKey)) {
            return array();
        }
        //first search
        $params = array(
            'cat_name_like' => $searchKey,
        );
        $catHelper = new CategoryModel();
        $couponHelper = new CouponModel();
        $catInfo = $catHelper->getCategoryInfo($params);
        $couponInfo = array();
        if (!empty($catInfo)) {
            $catIds = DataToArray($catInfo, 'cat_id');
            $catIds = implode(',', $catIds);
            $params = array(
                'cat_id' => $catIds,
            );
            $fCouponInfo = $couponHelper->getCoupon($params);
            foreach ($fCouponInfo AS $key => $value) {
                $couponId = $fCouponInfo[$key]['coupon_id'];
                $couponInfo[$couponId] = $fCouponInfo[$key];
            }
        }
        $params = array(
            'tag' => $searchKey,
            'name_like' => $searchKey,
        );
        $sCouponInfo = $couponHelper->getCoupon($params);
        foreach ($sCouponInfo AS $key => $value) {
            $couponId = $sCouponInfo[$key]['coupon_id'];
            $couponInfo[$couponId] = $sCouponInfo[$key];
        }

        foreach ($this->labelType AS $key => $value) {
            if ($value == $searchKey) {
                $labelType = $key;
            }
        }
        if (!empty($labelType)) {
            $params = array(
                    'label_type' => $labelType,
                    );
            $tCouponInfo = $couponHelper->getCoupon($params);
            foreach ($tCouponInfo AS $key => $value) {
                $couponId = $tCouponInfo[$key]['coupon_id'];
                $couponInfo[$couponId] = $tCouponInfo[$key];
            }
        }
        $couponInfo = array_values($couponInfo);
        return $couponInfo;
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
            'limit' => '0,7',
            'status' => 1,
        );
       $locationInfo = $helper->getLocationInfo($params);
       return $locationInfo;
    }


}
