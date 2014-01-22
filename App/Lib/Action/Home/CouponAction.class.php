<?php
// 本类由系统自动生成，仅供测试用途
class CouponAction extends Action {
    public function coupon(){
        $couponHelper = new CouponModel();
        $couponInfo = $couponHelper->getCoupon();
        $partnerIds = DataToArray($couponInfo, 'partner_id');
        $adHelper = new AdModel();
        $adInfo = $adHelper->getAd();
        #$model = new PartnerInfoModel();
        #$result = $model->getPartnerInfoById($partnerIds);
        $this->assign("coupons", array_slice($couponInfo, 0, 3));
        $this->assign("coupons_two", array_slice($couponInfo, 0, 4));
        $this->assign("ads", $adInfo);
        $this->display();
    }
    public function detail(){
        $this->display();
    }
}

