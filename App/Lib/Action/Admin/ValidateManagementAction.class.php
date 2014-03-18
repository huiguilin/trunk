<?php
// 本类由系统自动生成，仅供测试用途
class ValidateManagementAction extends Action {
	public function _empty($name){
        $this->error("非法提交！");
    }

    public function singlevalidate(){
        $templateName = $_GET["_URL_"][2]; 
        $this->assign('templateName',$templateName);
		$this->display();
    }
    public function multivalidate(){
        $templateName = $_GET["_URL_"][2]; 
        $this->assign('templateName',$templateName);
		$this->display();
    }
    //查看已经验证过的优惠券
    public function viewvalidate(){
        $user = $_SESSION['user'];
        //TBC
        $user['partner_id'] = 11;
        if (empty($user['partner_id'])) {
            $this->redirect('/index.php/Admin/Account/login');
        }
        $page = !empty($_GET['page']) ? $_GET['page'] : 0;
        $couponId = !empty($_GET['coupon_id']) ? $_GET['coupon_id'] : 0;
        $params = array();
        if (!empty($couponId)) {
            $params['coupon_id'] = $couponId;
        }
        $couponHelper = D('Home/Coupon');
        $params['partner_id'] = $user['partner_id'];
        $params['hash_key'] = 'coupon_id';
        $couponInfo = $couponHelper->getCoupon($params);
        $couponIds = implode(',', DataToArray($couponInfo, 'coupon_id'));
        $pageSize = 10;
        $offset = $page * $pageSize;
        $params = array(
            'coupon_id' => $couponIds,
            'partner_id' => $user['partner_id'],
            'limit' => "{$offset},{$pageSize}",
            //TBC
            'status' => 0,
        );
        $userCouponHelper = D('Home/UserCoupon');
        $coupon = $userCouponHelper->getUserCoupon($params);

        $coupon = mergeData($coupon, $couponInfo, 'coupon_id', 'coupon_id');
        $templateName = $_GET["_URL_"][2];
        $this->assign('templateName',$templateName);
        $this->assign('coupon_info',$coupon);
		$this->display();
    }
    //用优惠券码获得优惠券对应的信息
    public function getCouponInfo(){
        $code = $_REQUEST['code'];
        $user = $_SESSION['user'];
        $user['partner_id'] = 11;
        $data = array(
            'status' => 0,
            'info' => '',
        );
        if (empty($code) || empty($user['partner_id'])) {
            $data['info'] = "empty params!";
            $this->ajaxReturn($data);
            return TRUE;
        }
        $params = array(
            'partner_id' => $user['partner_id'],
            'code' => $code,
            'status' => 1,
        );

        $userCouponHelper = D('Home/UserCoupon');
        $coupon = $userCouponHelper->getUserCoupon($params);
        $couponIds = implode(DataToArray($coupon, 'coupon_id'));
        $params = array(
           "coupon_id" => $couponIds, 
           'hash_key' => 'coupon_id',
        );
        $couponHelper = D('Home/Coupon');
        $couponInfo = $couponHelper->getCoupon($params);
        $coupon = mergeData($coupon, $couponInfo, 'coupon_id', 'coupon_id');
        $data = array(
            'status' => 1,
            'info' => $coupon,
        );
        $this->ajaxReturn($data);
    }
    //消码
    public function validateCouponCode(){
        $ids = !empty($_GET['ids']) ? $_GET['ids'] : 0;
        $user = $_SESSION['user'];
        $user['partner_id'] = 11;
        $changeData = array(
            'status' => 0,
            'updatetime' => date('Y-m-d H:i:s'),
        );
        if (empty($ids) || empty($user['partner_id'])) {
            $data['info'] = "empty params!";
            $this->ajaxReturn($data);
            return TRUE;
        }
        $ids = implode(',', explode(',', $ids));
        $params = array(
            'id' => $ids,
            'partner_id' => $user['partner_id'],
            'status' => 1,
        );
        $userCouponHelper = D('Home/UserCoupon');
        $coupon = $userCouponHelper->getUserCoupon($params);
        $ids = implode(',', DataToArray($coupon, 'id'));
        $condition = "partner_id = {$user['partner_id']} AND id IN ({$ids})";

        $result = $userCouponHelper->updateUserCoupon($condition, $changeData);
        $data['status'] = $result;
        $this->ajaxReturn($data);
        return TRUE;
    }
}
