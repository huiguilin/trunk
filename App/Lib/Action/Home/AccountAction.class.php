<?php
// 本类由系统自动生成，仅供测试用途
class AccountAction extends Action {

    public function mycoupon(){
        if (empty($_SESSION['user']['user_id'])) {
            echo "eeee";
            return TRUE;
        }
        $pageSize = 10;
        $nowPage = !empty($_GET['page']) ? $_GET['page'] : 0;
        $status = isset($_GET['status']) ? (int) $_GET['status'] : "0,1,2";
        $offset = $pageSize * $page;
        $userId = $_SESSION['user']['user_id'];
        $userCouponHelper = new UserCouponModel();
        $params = array(
            'user_id' => $userId,
            'status' => $status,
            'limit' => "$offset, $pageSize",
            'order_by' => 'createtime DESC',
        );
        $userCouponInfo = $userCouponHelper->getUserCoupon($params);

        $couponIds = DataToArray($userCouponInfo, 'coupon_id');
        $couponIds = implode(',', $couponIds);
        $couponHelper = new CouponModel();
        $params = array(
            'coupon_id' => $couponIds,
            #'sum' => 'off_price',
        );
        $couponInfo = $couponHelper->getCoupon($params);
        $couponInfo = mergeData($userCouponInfo, $couponInfo, 'coupon_id', 'coupon_id');

        $url = "/index.php/account/myacount?status={$status}";
        $pageInfo = getPageInfo($count, $url, $nowPage, $pageSize);
        $this->account_tmp_bottom();
        $this->assign('coupons', $couponInfo);
        $this->assign('page_info', $pageInfo);
        $this->assign('links', $pageInfo['links']);
		$this->display();
    }

    private function account_tmp_bottom() {
        $userId = $_SESSION['user']['user_id'];
        $status = "0,1,2";
        $userCouponHelper = new UserCouponModel();
        $couponHelper = new CouponModel();
        $params = array(
            'user_id' => $userId,
            'status' => $status,
            'count' => 'id',
        );
        $count = $userCouponHelper->getUserCoupon($params);
        $couponHelper = new CouponModel();
        $params = array(
            'user_id' => $userId,
            'status' => $status,
        );
        $ids = $userCouponHelper->getUserCoupon($params);
        $couponIds = implode(',', DataToArray($ids, 'coupon_id'));
        $params = array(
                'coupon_id' => $couponIds,
                'sum' => 'off_price',
                );
        $sum = $couponHelper->getCoupon($params);       
        $this->assign('sum_price', $sum);
        $this->assign('count', $count);
    }

    public function myfavorite(){
        if (empty($_SESSION['user']['user_id'])) {
            echo "dd";
            return TRUE;
        }
        $status = isset($_GET['status']) ? (int) $_GET['status'] : 0;
        $page = !empty($_GET['page']) ? (int) $_GET['page'] : 0;
        $pageSize = 10;
        $offset = $page * $pageSize;

        $userCollectionHelper = new UserCollectionModel();
        $params = array(
            'user_id' => $_SESSION['user']['user_id'],
            'limit' => "{$offset}, {$pageSize}",
            'order_by' => "createtime DESC",
        );
        $collection = $userCollectionHelper->getUserCollection($params);
        $couponIds = implode(',', DataToArray($collection, 'coupon_id'));
        $couponHelper = new CouponModel();
        $params = array(
            'coupon_id' => $couponIds,
        );
        if ($status == 1) {
            $params['start_time_lt'] = date('Y-m-d H:i:s');
            $params['end_time_gt'] = date('Y-m-d H:i:s');
        }
        else if ($status == 2) {
            $params['start_time_gt'] = date('Y-m-d H:i:s');
            $params['end_time_lt'] = date('Y-m-d H:i:s');
        }
        $couponInfo = $couponHelper->getCoupon($params);
        $info = array();
        if (!empty($couponInfo)) {
            $info = mergeData($collection, $couponInfo, 'coupon_id', 'coupon_id');
            $time = time();
            foreach ($info AS $key => $value) {
                $info[$key]['end'] = 1;
                if (strtotime($info[$key]['start_time']) <= $time && strtotime($info[$key]['end_time']) >= $time) {
                    $info[$key]['end'] = 0;
                }
            }
        }
        $this->assign("coupons", $info);
        $this->account_tmp_bottom();
        $this->display();
    }
    public function mytocomment(){
        if (empty($_SESSION['user']['user_id'])) {
            echo "eeee";
            return TRUE;
        }
        $pageSize = 10;
        $nowPage = !empty($_GET['page']) ? $_GET['page'] : 0;
        $status = isset($_GET['status']) ? (int) $_GET['status'] : "0,1,2";
        $evaluated = isset($_GET['evaluated']) ? (int) $_GET['evaluated'] : 0;
        $offset = $pageSize * $page;
        $userId = $_SESSION['user']['user_id'];
        $userCouponHelper = new UserCouponModel();
        $params = array(
            'user_id' => $userId,
            'status' => $status,
            'evaluated' => $evaluated,
            'limit' => "$offset, $pageSize",
            'order_by' => 'createtime DESC',
        );
        $userCouponInfo = $userCouponHelper->getUserCoupon($params);
        $couponIds = implode(',', DataToArray($userCouponInfo, 'coupon_id'));
        $eHelper = new EvaluationModel();
        $params = array(
            'coupon_id' => $couponIds,
            'user_id' => $userId,
        );
        $evaluationInfo = $eHelper->getEvaluations($params);
        $couponIds = implode(',', DataToArray($evaluationInfo, 'coupon_id'));
        $cHelper = new CouponModel();
        $params = array(
                'coupon_id' => $couponIds,
                );       
        $couponInfo = $cHelper->getCoupon($params);
        $eInfo = mergeData($userCouponInfo, $couponInfo, 'coupon_id', 'coupon_id');
        $this->assign('evaluations', $eInfo);
        $this->account_tmp_bottom();
		$this->display();
    }
    public function mycommented(){
        $this->account_tmp_bottom();
        $this->display();
    }
    public function mysetting(){
        $user = $_SESSION['user'];
        $user['phone_number'] = "1111";
        if (!is_numeric($user['phone_number'])) {
            $user['phone_number_used'] = 0;
        }
        else {
            $user['phone_number_used'] = substr_replace($user['phone_number'], "****", 3, 7);
        }
        if (stristr($user['email'], '#huiguilin')) {
            $user['email'] = 0;
        }
        $this->assign('user_setting', $user);
        $this->account_tmp_bottom();
        $this->display();
    }
    public function handleEmailSubscription(){
        $a = $_POST;
        dump($a);
    }
    public function handleChangeCellphone(){
        $a = $_POST;
        dump($a);
    }
    public function handleChangeEmail(){
        $a = $_POST;
        dump($a);
    }
    public function handleChangeNickname(){
        $a = $_POST;
        dump($a);
    }
    public function handleChangePassword(){
        $a = $_POST;
        dump($a);
    }
    public function handleSendToCellphone(){
        $a = $_POST;
        dump($a);
    }
    public function handlePostCouponComment(){
        $_SESSION['user_id'] = "2";
        $a = $_POST;
        dump($a);
    }

    public function sendCode() {
        if (empty($_POST['binding_old_phone']) || empty($_POST['binding_new_phone'])) {
            $this->error('参数错误');
            return TRUE;
        }
        if (empty($_SESSION['user']) || $_SESSION['user']['phone_number'] != $_POST['binding_new_phone']) {
            $this->error('未登录');
            return TRUE;
        }
        $text = "1234";
        $_SESSION['binding_new_phone_code'] = $text;
        sendCodeToMobile($_POST['binding_new_phone'], $text);
        echo "发送成功!";
        return TRUE;
    }

    public function rebindPhone() {
        if (empty($_POST['cellphone_vcode'])) {
            $this->error('参数错误');
            return TRUE;
        }
        echo "修改成功!";
        return TRUE;

    }
}
