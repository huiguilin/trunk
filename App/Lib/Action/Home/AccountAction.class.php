<?php
// 本类由系统自动生成，仅供测试用途
class AccountAction extends Action {
    private $labelType = array(
        '0' => '每天1封',
        '1' => '每周1封',
        '2' => '每月2封',
        '3' => '拒绝接受',
    );
    public function _empty($name){
        $this->error("非法提交！");
    }
    public function mycoupon(){
        if (empty($_SESSION['user']['user_id'])) {
            $this->error('此页面需要登录才能访问，请先登录！');
            return TRUE;
        }

        //分页
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $status = $_GET['status'];
        if(!empty($status)){
            $map['status'] = array('in',$status);
        }
        $userId = $_SESSION['user']['user_id'];
        $userCouponHelper = M('User_coupon','t_monkey_');
        import('ORG.Util.Page'); // 导入分页类
        $map['user_id'] = array('in',$userId);

        $count = $userCouponHelper->where($map)->count(); // 查询满足要求的总记录数
        $Page = new Page($count,7); // 实例化分页类 传入总记录数
        $Page->setConfig('next','<li style="width:55px;line-height:25px;text-align:center">下一页</li>');
        $Page->setConfig('prev','<li style="width:55px;line-height:25px;text-align:center">上一页</li>');
        $Page->setConfig('first','<li style="width:55px;line-height:25px;text-align:center">首页</li>');
        $Page->setConfig('last','<li style="width:55px;line-height:25px;text-align:center">末页</li>');
        $userCouponInfo = $userCouponHelper->where($map)->page($nowPage.','.$Page->listRows)->select();
        $show = $Page->show(); // 分页显示输出
        $linkPage = $show['linkPage'];
      

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
        $this->assign('show',$show);
        $this->assign('linkPage',$linkPage);
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
        $this->assign('user',$_SESSION['user']);
    }

    public function myfavorite(){
        
        if (empty($_SESSION['user']['user_id'])) {
            $this->error('此页面需要登录才能访问，请先登录！');
            return TRUE;
        }
        //分页
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $status = $_GET['status'];
        if(!empty($status)){
            $map['status'] = array('in',$status);
        }
        $userId = $_SESSION['user']['user_id'];
        $userCollectionHelper = M('User_collection','t_monkey_');
        import('ORG.Util.Page'); // 导入分页类
        $map['user_id'] = array('in',$userId);

        $count = $userCollectionHelper->where($map)->count(); // 查询满足要求的总记录数
        $Page = new Page($count,3); // 实例化分页类 传入总记录数
        $Page->setConfig('next','<li style="width:55px;line-height:25px;text-align:center">下一页</li>');
        $Page->setConfig('prev','<li style="width:55px;line-height:25px;text-align:center">上一页</li>');
        $Page->setConfig('first','<li style="width:55px;line-height:25px;text-align:center">首页</li>');
        $Page->setConfig('last','<li style="width:55px;line-height:25px;text-align:center">末页</li>');
        $collection = $userCollectionHelper->where($map)->page($nowPage.','.$Page->listRows)->select();
        $show = $Page->show(); // 分页显示输出
        $linkPage = $show['linkPage'];
        // $status = isset($_GET['status']) ? (int) $_GET['status'] : 0;
        // $page = !empty($_GET['page']) ? (int) $_GET['page'] : 0;
        // $pageSize = 10;
        // $offset = $page * $pageSize;

        // $userCollectionHelper = new UserCollectionModel();
        // $params = array(
        //     'user_id' => $_SESSION['user']['user_id'],
        //     'limit' => "{$offset}, {$pageSize}",
        //     'order_by' => "createtime DESC",
        // );
        // $collection = $userCollectionHelper->getUserCollection($params);
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

        if (!empty($_GET['couponid'])) {
            $couponid = $_GET['couponid'];
            $coupon_id = array(
                'coupon_id' => $couponid,
                );
            $userCollectionHelper = new UserCollectionModel();
            $result = $userCollectionHelper->deleteUserCollection($coupon_id);
            if ($result>0) {
                echo "<script> alert('删除成功！'); window.location='http://www.huigl.com/index.php/account/myfavorite';</script>";
            }
        }
        $this->assign("coupons", $info);
        $this->assign('show',$show);
        $this->assign('linkPage',$linkPage);
        $this->assign('get_info',$_GET);
        $this->account_tmp_bottom();

        $this->display();
    }
    public function mytocomment(){
        if (empty($_SESSION['user']['user_id'])) {
            $this->error('此页面需要登录才能访问，请先登录！');
            return TRUE;
        }
        //分页
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $status = isset($_GET['status']) ? (int) $_GET['status'] : "0,1,2";
        $evaluated = isset($_GET['evaluated']) ? (int) $_GET['evaluated'] : 0;
        $userId = $_SESSION['user']['user_id'];
        $userCouponHelper = M('User_coupon','t_monkey_');
        import('ORG.Util.Page'); // 导入分页类
        $map['user_id'] = array('in',$userId);
        $map['evaluated'] = array('eq',$evaluated);
        $count = $userCouponHelper->where($map)->count(); // 查询满足要求的总记录数
        $Page = new Page($count,3); // 实例化分页类 传入总记录数
        $Page->setConfig('next','<li style="width:55px;line-height:25px;text-align:center">下一页</li>');
        $Page->setConfig('prev','<li style="width:55px;line-height:25px;text-align:center">上一页</li>');
        $Page->setConfig('first','<li style="width:55px;line-height:25px;text-align:center">首页</li>');
        $Page->setConfig('last','<li style="width:55px;line-height:25px;text-align:center">末页</li>');
        $userCouponInfo = $userCouponHelper->where($map)->page($nowPage.','.$Page->listRows)->select();
        $show = $Page->show(); // 分页显示输出
        $linkPage = $show['linkPage'];

       
        $couponIds = implode(',', DataToArray($userCouponInfo, 'coupon_id'));
        $eHelper = new EvaluationModel();
        $params = array(
            'coupon_id' => $couponIds,
            'user_id' => $userId,
        );
        $evaluationInfo = $eHelper->getEvaluations($params);
        $couponIds = implode(',', DataToArray($userCouponInfo, 'coupon_id'));
        $cHelper = new CouponModel();
        $params = array(
                'coupon_id' => $couponIds,
                );       
        $couponInfo = $cHelper->getCoupon($params);
        $eInfo = mergeData($userCouponInfo, $couponInfo, 'coupon_id', 'coupon_id');
        $this->assign('evaluations', $eInfo);
        $this->assign('show',$show);
        $this->assign('linkPage',$linkPage);
        $this->account_tmp_bottom();
		$this->display();
    }
    public function mycommented(){
        if (empty($_SESSION['user']['user_id'])) {
            $this->error('此页面需要登录才能访问，请先登录！');
            return TRUE;
        }
        //分页
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $status = isset($_GET['status']) ? (int) $_GET['status'] : "0,1,2";
        $evaluated = isset($_GET['evaluated']) ? (int) $_GET['evaluated'] : 1;
        $userId = $_SESSION['user']['user_id'];
        $couponEvaluationHelper = M('Coupon_evaluation','t_monkey_');
        import('ORG.Util.Page'); // 导入分页类
        $map['user_id'] = array('in',$userId);
        $map['evaluated'] = array('eq',$evaluated);
        $count = $couponEvaluationHelper->where($map)->count(); // 查询满足要求的总记录数
        $Page = new Page($count,3); // 实例化分页类 传入总记录数
        $Page->setConfig('next','<li style="width:55px;line-height:25px;text-align:center">下一页</li>');
        $Page->setConfig('prev','<li style="width:55px;line-height:25px;text-align:center">上一页</li>');
        $Page->setConfig('first','<li style="width:55px;line-height:25px;text-align:center">首页</li>');
        $Page->setConfig('last','<li style="width:55px;line-height:25px;text-align:center">末页</li>');
        $info = $couponEvaluationHelper->where($map)->page($nowPage.','.$Page->listRows)->select();
        $show = $Page->show(); // 分页显示输出
        $linkPage = $show['linkPage'];

       
        $couponIds = implode(',', DataToArray($info, 'coupon_id'));
        $cHelper = new CouponModel();
        $params = array(
                'coupon_id' => $couponIds,
                );       
        $couponInfo = $cHelper->getCoupon($params);
        $eInfo = mergeData($info, $couponInfo, 'coupon_id', 'coupon_id');
        $this->assign('evaluations', $eInfo);
        $this->assign('show',$show);
        $this->assign('linkPage',$linkPage);
        $this->account_tmp_bottom();
       
        $this->display();
    }
    public function mysetting(){
        if (empty($_SESSION['user']['user_id'])) {
            $this->error('此页面需要登录才能访问，请先登录！');
            return TRUE;
        }
        $user = $_SESSION['user'];
        if (!is_numeric($user['phone_number'])) {
            $user['phone_number_used'] = 0;
        }
        else {
            $user['phone_number_used'] = substr_replace($user['phone_number'], "****", 3, 4);
        }
        if (empty($user['email'])) {
            $user['email'] = "";
        }
        $this->assign('user_setting', $user);
        $this->account_tmp_bottom();
        $this->display();
    }
    public function mysubscription(){
        if (empty($_SESSION['user']['user_id'])) {
            $this->error('此页面需要登录才能访问，请先登录！');
            return TRUE;
        }
        $this->account_tmp_bottom();
        $this->display();
    }
    public function handleEmailSubscription(){

        if(!IS_POST){ $this->error("非法提交！");}
        
        $email = $_POST['email'];
        $type = $_POST['frequency'];
        $data = array(
            'status' => 0,
            'info' => '',
        );
        if(empty($email)){
            $data['status'] = 2;
            $data['info'] = "订阅的邮箱不能为空!";
            $this->ajaxReturn($data,'json');
        }
        //首页订阅频率默认值为0
        if(empty($type)){
            $type = 0;
        }
        $helper = new UserSubscriptionModel();
        $queryResult = $helper->getUserSubscriptionByEmailAddress($email);
        if(!empty($queryResult)){
            $data['status'] = 3;
            $data['info'] = "该邮箱地址已被订阅!";
            $this->ajaxReturn($data,'json');
        }
        // $type = intval($type);
        $addData = array(
                's_email' => $email,
                's_type' => $type,
                's_time' => date("Y-m-d H:i:s"),
                );
        $result = $helper->addSubscriptionEmailAddress($addData);
        if(empty($result)){
            $data['status'] = 0;
            $data['info'] = "惠桂林订阅失败!";
            $this->ajaxReturn($data,'json');
        }else{
            $data['status'] = 1;
            $data['info'] = "惠桂林订阅成功!";
            $_SESSION['user_subscription'] = $email;
            $this->ajaxReturn($data,'json');
        }
    }
    public function handleChangeCellphone(){
        if(!IS_POST){ $this->error("非法提交！");}

        $oldcellphone = @$_POST['oldcellphone'];
        $newcellphone = $_POST['newcellphone'];
        $nickname = $_POST['nickname'];
        $vcode = $_POST['vcode'];
        $data = array(
            'status' => 0,
            'info' => '',
        );
        if(empty($newcellphone)){
            $data['status'] = 3;
            $data['info'] = "输入的新手机不能为空!";
            $this->ajaxReturn($data,'json');
         }
         if(empty($vcode)){
            $data['status'] = 4;
            $data['info'] = "验证码不能为空!";
            $this->ajaxReturn($data,'json');
         }
         if($_SESSION['changeCellphoneCheck'] != $vcode){
            $data['status'] = 6;
            $data['info'] = "验证码错误";
            $this->ajaxReturn($data,'json');
         }

        $helper = new UserProfileModel();
        $result = $helper->getUserProfileByPhoneNumber($newcellphone);
        if(!empty($result)){
            $data['status'] = 7;
            $data['info'] = "输入的新手机已经存在！";
            $this->ajaxReturn($data,'json');
        }
        $time = date("Y-m-d H:i:s");
        $updateData = array(
                'ctime' => $time, 
                'last_logindate' => $time,
                'phone_number' => $newcellphone,
            );

        if (!empty($nickname)) {
            $condition = "nickname = '{$nickname}'";
            $r = $helper->updateUser($condition,$updateData);
        }else{
            if(empty($oldcellphone)){
                $data['status'] = 2;
                $data['info'] = "输入的旧手机不能为空!";
                $this->ajaxReturn($data,'json');
             }
            if($oldcellphone == $newcellphone){
                $data['status'] = 5;
                $data['info'] = "新手机号与旧手机号一致";
                $this->ajaxReturn($data,'json');
             }
            $result = $helper->getUserProfileByPhoneNumber($oldcellphone);
            if (empty($result)) {
                $data['status'] = 0;
                $data['info'] = "此手机号并未注册";
                $this->ajaxReturn($data,'JSON');
            }
            $condition = "phone_number = '{$oldcellphone}'";
            $r = $helper->updateUser($condition,$updateData);
        }
                
        if (!empty($r)) {
            $updateresult = $helper->getUserProfileByPhoneNumber($newcellphone);
            $_SESSION['user'] = $updateresult;
            $this->assign('user', $_SESSION['user']);
            $data['status'] = 1;
            $data['info'] = "手机号码修改成功";
        }
        $this->ajaxReturn($data,'JSON');
        // $oldcellphone = $_POST['oldcellphone'];
        // $newcellphone = $_POST['newcellphone'];
        // $vcode = $_POST['vcode'];
        // $data = array(
        //     'status' => 0,
        //     'info' => '',
        // );
        //  if(empty($oldcellphone)){
        //     $data['status'] = 2;
        //     $data['info'] = "输入的旧手机不能为空!";
        //     $this->ajaxReturn($data,'json');
        //  }
        //  if(empty($newcellphone)){
        //     $data['status'] = 3;
        //     $data['info'] = "输入的新手机不能为空!";
        //     $this->ajaxReturn($data,'json');
        //  }
        //  if(empty($vcode)){
        //     $data['status'] = 4;
        //     $data['info'] = "验证码不能为空!";
        //     $this->ajaxReturn($data,'json');
        //  }
        //  if($oldcellphone == $newcellphone){
        //     $data['status'] = 5;
        //     $data['info'] = "新手机号与旧手机号一致";
        //     $this->ajaxReturn($data,'json');
        //  }
        //  if($_SESSION['changeCellphoneCheck'] != $vcode){
        //     $data['status'] = 6;
        //     $data['info'] = "验证码错误";
        //     $this->ajaxReturn($data,'json');
        //  }
        // $helper = new UserProfileModel();
        // $result = $helper->getUserProfileByPhoneNumber($oldcellphone);
        // if (empty($result)) {
        //     $data['status'] = 0;
        //     $data['info'] = "此手机号并未注册";
        //     $this->ajaxReturn($data,'JSON');
        // }

        // $time = date("Y-m-d H:i:s");
        // $updateData = array(
        //         'ctime' => $time, 
        //         'last_logindate' => $time,
        //         'phone_number' => $newcellphone,
        //         );
        // $condition = "phone_number = '{$oldcellphone}'";
        // $r = $helper->updateUser($condition,$updateData);
        // if (!empty($r)) {
        //     $updateresult = $helper->getUserProfileByPhoneNumber($newcellphone);
        //     $_SESSION['user'] = $updateresult;
        //     $this->assign('user', $_SESSION['user']);
        //     $data['status'] = 1;
        //     $data['info'] = "手机号码修改成功";
        // }
        // $this->ajaxReturn($data,'JSON');
    }
    public function handleChangeEmail(){
        if(!IS_POST){ $this->error("非法提交！");}
        $data = array(
            'status' => 0,
            'info' => '',
        );
        $email = $_POST['email'];
        $vcode = $_POST['vcode'];
        $username = $_POST['username'];

        if(empty($email)){
            $data['status'] = 2;
            $data['info'] = "输入的邮箱地址不能为空!";
            $this->ajaxReturn($data,'json');
        }
        if(empty($vcode)){
            $data['status'] = 3;
            $data['info'] = "输入的验证码不能为空!";
            $this->ajaxReturn($data,'json');
        }
        if (session('verify') != md5($vcode)) {
            $data['status'] = 4;
            $data['info'] = "验证码错误!";
            $this->ajaxReturn($data,'json');
        }
        $helper = new UserProfileModel();
        $result = $helper->getUserProfileByUserName($username);
        if (empty($result)) {
            $data['status'] = 0;
            $data['info'] = "当前邮箱地址并未注册";
            $this->ajaxReturn($data,'JSON');
        }
        if($email == $result['email']){
            $data['status'] = 5;
            $data['info'] = "新老邮箱地址一致";
            $this->ajaxReturn($data,'JSON');
        }
        $time = date("Y-m-d H:i:s");
        $updateData = array(
                'ctime' => $time, 
                'last_logindate' => $time,
                'email' => $email,
                );
        $condition = "nickname = '{$username}'";
        $r = $helper->updateUser($condition,$updateData);
        if (!empty($r)) {
            $updateresult = $helper->getUserProfileByUserName($username);
            $_SESSION['user'] = $updateresult;
            $this->assign('user', $_SESSION['user']);
            $data['status'] = 1;
            $data['info'] = "邮箱地址修改成功";
        }
        $this->ajaxReturn($data,'JSON');
    }
    public function handleChangeNickname(){
        if(!IS_POST){ $this->error("非法提交！");}
        $data = array(
            'status' => 0,
            'info' => '',
        );
        $oldnickname = $_POST['oldnickname'];
        $newnickname = $_POST['newnickname'];
        if(empty($newnickname)){
            $data['status'] = 2;
            $data['info'] = "输入的新昵称不能为空!";
            $this->ajaxReturn($data,'json');
        }
        $helper = new UserProfileModel();
        $result = $helper->getUserProfileByUserName($oldnickname);
        if (empty($result)) {
            $data['status'] = 0;
            $data['info'] = "当前昵称并未注册";
            $this->ajaxReturn($data,'JSON');
        }
        $time = date("Y-m-d H:i:s");
        $updateData = array(
                'ctime' => $time, 
                'last_logindate' => $time,
                'nickname' => $newnickname,
                );
        $condition = "nickname = '{$oldnickname}'";
        $r = $helper->updateUser($condition,$updateData);
        if (!empty($r)) {
            $updateresult = $helper->getUserProfileByUserName($newnickname);
            $_SESSION['user'] = $updateresult;
            $this->assign('user', $_SESSION['user']);
            $data['status'] = 1;
            $data['info'] = "昵称修改成功";
        }
        $this->ajaxReturn($data,'JSON');
    }
    public function handleChangePassword(){
        if(!IS_POST){ $this->error("非法提交！");}
        $data = array(
            'status' => 0,
            'info' => '',
        );
        $oldpwd = $_POST['oldpwd'];
        $newpwd = $_POST['newpwd'];
        $newpwd2 = $_POST['newpwd2'];
        $m_newpwd = md5($newpwd);
        $m_oldpwd = md5($oldpwd);
        if(empty($oldpwd)){
            $data['status'] = 2;
            $data['info'] = "输入的旧密码不能为空!";
            $this->ajaxReturn($data,'json');
        }
         if(empty($newpwd)){
            $data['status'] = 3;
            $data['info'] = "输入的新密码不能为空!";
            $this->ajaxReturn($data,'json');
        }
         if(empty($newpwd2)){
            $data['status'] = 4;
            $data['info'] = "输入的确认密码不能为空!";
            $this->ajaxReturn($data,'json');
        }
        if($newpwd2 != $newpwd){
            $data['status'] = 5;
            $data['info'] = "两次输入的新密码不一致!";
            $this->ajaxReturn($data,'json');
        }
        if($oldpwd == $newpwd){
            $data['status'] = 6;
            $data['info'] = "新密码与旧密码一致!";
            $this->ajaxReturn($data,'json');
        }
        
        $helper = new UserProfileModel();
        $result = $helper->getUserProfileByPassword($m_oldpwd);

        if (empty($result)) {
            $data['status'] = 0;
            $data['info'] = "输入的旧密码错误!";
            $this->ajaxReturn($data,'JSON');
        }
        $time = date("Y-m-d H:i:s");
        $updateData = array(
                'ctime' => $time, 
                'last_logindate' => $time,
                'password' => $m_newpwd,
                );
        $condition = "password = '{$m_oldpwd}'";
        $r = $helper->updateUser($condition,$updateData);
        if (!empty($r)) {
            $updateresult = $helper->getUserProfileByPassword($m_newpwd);
            $_SESSION['user'] = $updateresult;
            $this->assign('user', $_SESSION['user']);
            $data['status'] = 1;
            $data['info'] = "密码修改成功";
        }
        $this->ajaxReturn($data,'JSON');
    }
    public function handleSendVcodeToCellphone(){
        if(!IS_POST){ $this->error("非法提交！");}
        $data = array(
            'status' => 0,
            'info' => '',
        );
        $newcellphone = $_POST['newcellphone'];
        if(empty($newcellphone)){
            $data['status'] = 0;
            $data['info'] = "输入的新手机不能为空!";
            $this->ajaxReturn($data,'json');
        }
        $code = mt_rand(1, 9) * 1000 + mt_rand(0, 9) * 100 + mt_rand(0, 9) * 10 + mt_rand(0, 9);
        session("changeCellphoneCheck","{$code}");
        $result = sendCodeToMobile($newcellphone, "{$code}");
        if (!empty($result)) {
            $data['status'] = 1;
            $data['info'] = "验证码发送成功";
            $this->ajaxReturn($data,'JSON');
        }
    }
    public function handlePostCouponComment(){
        if(!IS_POST){ $this->error("非法提交！");}
        $userId = $_SESSION['user']['user_id'];
        if (empty($userId)) {
            echo "wrong!";return TRUE;
        }
        $id = $_POST['post_id'];
        $rate = $_POST['ratevalue'];
        $comment = $_POST['coupon_comment_content'];
        $couponId = $_POST['post_coupon_id'];
        $partner_id = $_POST['post_partner_id'];
        $params = array(
            'user_id' => $userId,
            'coupon_id' => $couponId,
            'evaluation' => $comment,
            'rate' => $rate,
            'partner_id' => $partner_id,
            );
        $helper = new CouponEvaluationModel();
        $r = $helper->addCouponEvaluation($params);
        if (!empty($r)) {
            $helper = new UserCouponModel();
            $params = array(
                'id' => $id,
                'data' => array(
                    'evaluated' => 1
                ),
            );
            $r = $helper->updateUserCouponInfo($params);
            $this->redirect('Account/mytocomment');
            return TRUE;
        }
    }

    public function handleUpdateCouponComment() {
        if(!IS_POST){ $this->error("非法提交！");}
        $userId = $_SESSION['user']['user_id'];
        if (empty($userId)) {
            echo "wrong!";return TRUE;
        }
        $id = $_POST['post_id'];
        $rate = $_POST['ratevalue'];
        $comment = $_POST['coupon_comment_content'];
        $couponId = $_POST['post_coupon_id'];
        $eId = $_POST['post_e_id'];

        $couponHelper = new CouponModel();
        $couponInfo = $couponHelper->getCouponsByCouponId($couponId);
        $partnerId = $couponInfo['partner_id'];

        $params = array(
            'user_id' => $userId,
            'coupon_id' => $couponId,
            'e_id' => $eId,
            'data' => array(
                'evaluation' => $comment,
                'rate' => $rate,
                'createtime' => date("Y-m-d H:i:s"),
                'partner_id' => $partnerId,
                ),
            );

        $helper = new CouponEvaluationModel();
        $r = $helper->updateInfo($params);
        if (!empty($r)) {
            $this->redirect('Account/mycommented');
            return TRUE;
        }
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
    private function sendEmail($mailaddress) {
        $content = "你好!这是来自惠桂林的账号激活邮件";
        import('ORG.Email'); 
        $data['mailto'] = $mailaddress; 
        $data['subject'] = '惠桂林订阅邮件'; 
        $data['body'] = $content; 
        $mail = new Email();
        if ($mail->send($data)) {
            return true;
        } else {
            return FALSE;
        }
    }
}
