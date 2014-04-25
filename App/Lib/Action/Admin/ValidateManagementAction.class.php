<?php
// 本类由系统自动生成，仅供测试用途
class ValidateManagementAction extends Action {
	public function _empty($name){
        $this->error("非法提交！");
    }

    public function singlevalidate(){
        if(empty($_SESSION['user'])){
            $this->redirect('/Admin/Account/login');
        }
        $templateName = $_GET["_URL_"][2]; 
        $this->assign('templateName',$templateName);
		$this->display();
    }
    public function multivalidate(){
        if(empty($_SESSION['user'])){
            $this->redirect('/Admin/Account/login');
        }
        $templateName = $_GET["_URL_"][2]; 
        $this->assign('templateName',$templateName);
		$this->display();
    }
    //查看已经验证过的优惠券
    public function viewvalidate(){
        if(empty($_SESSION['user'])){
            $this->redirect('/Admin/Account/login');
        }
        
        $user = $_SESSION['user'];
        //TBC
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

        //分页
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $userCouponHelper = M('User_coupon','t_monkey_');
        import('ORG.Util.Page'); // 导入分页类
        $map['coupon_id'] = array('in',$couponIds);
        $map['partner_id'] = array('in',$user['partner_id']);
        $map['status'] = array('eq','0');
        $count = $userCouponHelper->where($map)->count(); // 查询满足要求的总记录数
        $Page = new Page($count,6); // 实例化分页类 传入总记录数
        $Page->setConfig('next','<li style="width:55px;line-height:25px;text-align:center">下一页</li>');
        $Page->setConfig('prev','<li style="width:55px;line-height:25px;text-align:center">上一页</li>');
        $Page->setConfig('first','<li style="width:55px;line-height:25px;text-align:center">首页</li>');
        $Page->setConfig('last','<li style="width:55px;line-height:25px;text-align:center">末页</li>');
        $coupon = $userCouponHelper->where($map)->page($nowPage.','.$Page->listRows)->select();
        $show = $Page->show(); // 分页显示输出
        $linkPage = $show['linkPage'];

        $coupon = mergeData($coupon, $couponInfo, 'coupon_id', 'coupon_id');
       
        $params = array(
            'partner_id' => $user['partner_id'],
        );
        $couponType = $couponHelper->getCoupon($params);
        $templateName = $_GET["_URL_"][2];
        $this->assign('templateName',$templateName);
        $this->assign('coupon_info',$coupon);
        $this->assign('couponTypes',$couponType);
        $this->assign('couponids',$couponId);
        $this->assign('show',$show);
        $this->assign('linkPage',$linkPage);
		$this->display();
    }
    //用优惠券码获得优惠券对应的信息
    public function getCouponInfo(){
        $code = $_REQUEST['code'];
        $user = $_SESSION['user'];
        $data = array(
            'status' => 0,
            'info' => '',
        );
        if (empty($code) || empty($user['partner_id'])) {
            $data['status'] = 0;
            $data['info'] = "请输入优惠券验证码！";
            $this->ajaxReturn($data);
        }
        $params = array(
            'partner_id' => $user['partner_id'],
            'code' => $code,
            'status' => 1,
        );
        $userCouponHelper = D('Home/UserCoupon');
        $coupon = $userCouponHelper->getUserCoupon($params);

        if(empty($coupon)){
            $data['status'] = 2;
            $data['info'] = "优惠券验证码输入错误！";
            $this->ajaxReturn($data);
        }
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
            'name' => $coupon[0]['description'],
            'title'=> $coupon[0]['description'],
            'code' => $coupon[0]['code'],
            'stime' => $coupon[0]['start_time'],
            'etime' => $coupon[0]['end_time'],
        );
        $this->ajaxReturn($data);
    }
    //消码
    public function validateCouponCode(){
        $codes = !empty($_GET['codes']) ? $_GET['codes'] : 0;
        $user = $_SESSION['user'];
        $changeData = array(
            'status' => 0,
            'updatetime' => date('Y-m-d H:i:s'),
        );
        $data = array(
            'status' => 0,
            'info' => '',
            );
        if (empty($codes) || empty($user['partner_id'])) {
            $data['status'] = 2;
            $data['info'] = "empty params!";
            $this->ajaxReturn($data);
        }
        $codes = implode(',',explode(',', $codes));
        $params = array(
            'code' => $codes,
            'partner_id' => $user['partner_id'],
            'status' => 1,
        );
        $userCouponHelper = D('Home/UserCoupon');
        $coupon = $userCouponHelper->getUserCoupon($params);
        if(empty($coupon)){
            $data['status'] = 3;
            $data['info'] = "优惠券验证码输入错误！";
            $this->ajaxReturn($data);
        }
        $codes = implode(',', DataToArray($coupon, 'code'));
        $condition = "partner_id = {$user['partner_id']} AND code IN ({$codes})";
        $result = $userCouponHelper->updateUserCoupon($condition, $changeData);
        $data['status'] = 1;
        $data['info'] = "验证已成功！";
        $this->ajaxReturn($data);
    }
}
