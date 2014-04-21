<?php
class UserAction extends Action {
    public function _empty($name){
        $this->error("非法提交！");
    }
    public function checkLogin(){
        $userName = $_POST['username'];
        $passwd = $_POST['password'];
        $verify = mb_strtolower($_POST['vcode']);
        $vcodemark = $_POST['vcodemark'];
        if (empty($userName) || empty($passwd)) {
            $data = array();
            $data['status'] = 4;
            $data['info'] = '用户名和密码不能为空';
            $data['size'] = 9;
            $data['url'] = "";
            $this->ajaxReturn($data,'JSON');
        }
        if(empty($vcodemark)){
            if (session('verify') != md5($verify) || empty($verify)) {
                $data = array();
                $data['status'] = 3;
                $data['info'] = '验证码错误！';
                $data['size'] = 9;
                $data['url'] = "";
                $this->ajaxReturn($data,'JSON');
            }
        }

        $helper = new UserProfileModel();
        $userInfo = $helper->getUserProfileByUserName($userName);

        if (empty($userInfo)) {
            $data = array();
            $data['status'] = 2;
            $data['info'] = '用户名不存在!';
            $data['size'] = 9;
            $data['url'] = "";
            $this->ajaxReturn($data,'JSON');
        }
        $md5 = md5($passwd);
        if ($md5 == $userInfo['password']) {
            $_SESSION['user'] = $userInfo;
            $data = array();
            $data['status'] = 1;
            $data['info'] = '登陆成功！';
            $data['size'] = 9;
            
            if (!empty($userInfo['isBusiness'])) {

                $partnerHelper = new PartnerModel();
                $params = array(
                    'user_id' => $userInfo['user_id'],
                );
                $partnerInfo = $partnerHelper->getPartner($params);
                $partnerInfo = $partnerInfo[0];
                $_SESSION['user'] = array_merge($userInfo, $partnerInfo);
                $data['url'] = "/index.php/Admin/ValidateManagement/singlevalidate";
            }
            else {

                $data['url'] = "";
                
            }
        }
        else {
            $data = array();
            $data['status'] = 0;
            $data['info'] = '密码错误！';
            $data['size'] = 9;
            $data['url'] = "";
        }

        
        $this->ajaxReturn($data,'JSON');
        return TRUE;
    }

    public function register() {

        $getRight = 'ok';
        $mail = !empty($_POST['email']) ? $_POST['email'] : $_POST['email'];
        $phone = !empty($_POST['cellphone']) ? $_POST['cellphone'] : $_POST['cellphone'];
        $nickname = !empty($_POST['nickname']) ? $_POST['nickname'] : $_POST['nickname'];
        $password = !empty($_POST['pwd']) ? $_POST['pwd'] : $_POST['pwd'];
        $verify = mb_strtolower($_POST['vcode']);
        if (!empty($mail)) {
            $result = $this->mailRegister($mail, $nickname, $password, $verify);
        }
        else {
            $result = $this->phoneRegister($phone, $nickname, $password, $verify);
        }
        if ($result == TRUE) {
            $data = array(
                    'status' => 1,
                    'info' => '注册成功！',
                    'size' => 9,
                    'url' => '',
                    );
        }
        else {
            $data = array(
                    'status' => 0,
                    'info' => '注册失败！',
                    'size' => 9,
                    'url' => '',
                    );          
        }
        $this->ajaxReturn($data);
        
    }

    public function mailRegister($mail, $nickname, $password, $verify) {
        if (empty($mail) || empty($password) || empty($nickname)) {
            $data = array(
                    'status' => 0,
                    'info' => '',
                );
            $data['info'] = "邮箱昵称和密码不能为空！";
            $this->ajaxReturn($data);
        }
        if (session('verify') != md5($verify)) {
                $data = array(
                    'status' => 0,
                    'info' => '',
                );
                $data['info'] = "验证码错误";
                $this->ajaxReturn($data);
        }
        $helper = new UserProfileModel();
        $result = $helper->getUserProfileByUserName($mail, $nickname);
        if (!empty($result)) {
            $data = array(
                    'status' => 2,
                    'info' => '',
                );
                $data['info'] = "用户名已存在";
                $this->ajaxReturn($data);
        }
        // $activeCode = $this->sendEmail($mail);
        // if (empty($activeCode)) {
        //     return FALSE;
        // }
        $time = date("Y-m-d H:i:s");
        $password = md5($password);
        $cookie = md5($mail . $nickname . "huiguilin");
        $data = array(
                'nickname' => $nickname,
                'email' => $mail,
                'ctime' => $time, 
                'password' => $password,
                // 'active_code' => $activeCode,
                'cookie' => $cookie,
                'is_actived' => 0,
                'invite_code' => $cookie,
                'last_logindate' => $time,
                'status' => 1,
                'realname' => $nickname,
                'phone_number' => $cookie,
                'level' => 0,
                'isBusiness' => 0,
                'login_times' => 1,
                );
        $r = $helper->addUser($data);
        if (!empty($r)) {
            $data['user_id'] = $r;
            $_SESSION['user'] = $data;
            $this->assign('user', $_SESSION['user']);
            return TRUE;
        }
        return FALSE;
    }

    // private function sendEmail($mail) {
    //     $activeCode = md5($mail . ":huiguilin");
    //     $content = "你好!这是来自惠桂林的账号激活邮件,请点击 http://www.huigl.com/Index.php/user/active?ac={$activeCode}&user={$mail}";
    //     import('ORG.Email'); 
    //     $data['mailto'] = $mail; 
    //     $data['subject'] = '账号激活邮件'; 
    //     $data['body'] = $content; 
    //     $mail = new Email();
    //     if ($mail->send($data)) {
    //         #$this->success('发送成功,请登录邮件激活');
    //         return $activeCode;
    //     } else {
    //         /* $this->error('邮件发送失败...');
    //          * */
    //         echo '邮件发送失败<br>';
    //         return FALSE;
    //     }
    //     return $activeCode;
    // }

    private function sendEmail($mail,$level) {
        if ($level == 'modifyCode') {
            $activeCode = mt_rand(1, 9) * 1000 + mt_rand(0, 9) * 100 + mt_rand(0, 9) * 10 + mt_rand(0, 9);
            $content = "尊敬的惠桂林用户，您好！您修改密码的验证码是：<span style='color:red'>$activeCode</span>，验证码有效期为5分钟，请您尽快修改密码，谢谢!";
            import('ORG.Email');
            $data['mailto'] = $mail;
            $data['subject'] = '惠桂林改密验证码';
            $data['body'] = $content;
        }
        if ($level == 'activeCode') {
            $activeCode = md5($mail . ":huiguilin");
            $content = "你好!这是来自惠桂林的账号激活邮件,请点击 http://test.huiguilin.com/Index.php/user/active?ac={$activeCode}&user={$mail}";
            import('ORG.Email'); 
            $data['mailto'] = $mail; 
            $data['subject'] = '账号激活邮件';
            $data['body'] = $content;
        }
      
        $mail = new Email();
        if ($mail->send($data)) {
            #$this->success('发送成功,请登录邮件激活');
            return $activeCode;
        } else {
            /* $this->error('邮件发送失败...');
             * */
            echo '邮件发送失败<br>';
            return FALSE;
        }
        return $activeCode;
    }


    private function phoneRegister($phone, $nickname, $password, $checkCode) {
        if (empty($phone) || empty($password) || empty($checkCode) || empty($nickname)) {
            return FALSE;
        }
        $helper = new UserProfileModel();
        $result = $helper->getUserProfileByPhoneNumber($phone);
        if (!empty($result)) {
            return FALSE;
        }
        $time = date("Y-m-d H:i:s");
        $password = md5($password);
        if ($_SESSION['pcheck'] != $checkCode) {
            return FALSE;
        }
        $mail = $phone . "#huiguilin";
        #$nickname = $phone;
        $cookie = md5($mail . $nickname . "huiguilin");
        $activeCode = $cookie;
        $data = array(
                'nickname' => $nickname,
                'email' => $mail,
                'ctime' => $time, 
                'password' => $password,
                'active_code' => $activeCode,
                'cookie' => $cookie,
                'is_actived' => 0,
                'invite_code' => $cookie,
                'last_logindate' => $time,
                'status' => 1,
                'realname' => $nickname,
                'phone_number' => $phone,
                'level' => 0,
                'isBusiness' => 0,
                'login_times' => 1,
                );
        $r = $helper->addUser($data);
        if (!empty($r)) {
            $data['user_id'] = $r;
            $_SESSION['user'] = $data;
            $this->assign('user', $_SESSION['user']);
            return TRUE;
        }
        return FALSE;
        #redirect('/index.php', 1, '页面跳转中...');
    }

    public function sendCheckcode() {
        $phoneNumber = $_POST['phone_number'];
        if (empty($phoneNumber)) {
            $this->error('empty phonenumber');
            return FALSE;
        }
        $code = mt_rand(1, 9) * 1000 + mt_rand(0, 9) * 100 + mt_rand(0, 9) * 10 + mt_rand(0, 9);
        $helper = new UserProfileModel();
        $result = $helper->getUserProfileByPhoneNumber($phoneNumber);
        if (!empty($result)) {
            $data = array(
                'status' => 0,
                'info' => '该手机已经在惠桂林注册过了，换一个试试吧^^',
            );
            $this->ajaxReturn($data,'JSON');
            return TRUE;
        }
        
        $data = $this->send($phoneNumber, $code);
        $this->ajaxReturn($data,'JSON');
        return TRUE;
    }
    private function sendForgetPWDCode($phoneNumber, $code) {
        if (empty($phoneNumber) || empty($code)) {
            return FALSE;
        }
        session("pcheck","{$code}");
        session("activeCode","{$code}");
        session("userphone","{$phoneNumber}");
        //TBC
        $text = "验证码是：{$code}，请及时修改密码！";
        $result = sendCodeToMobile($phoneNumber, "{$text}");
        $data = array(
            'status' => 1,
            'info' => '发送成功',
        );
        return $data;
    }

    private function send($phoneNumber, $code) {
        if (empty($phoneNumber) || empty($code)) {
            return FALSE;
        }
        session("pcheck","{$code}");
        session("activeCode","{$code}");
        session("userphone","{$phoneNumber}");
        //TBC
        $text = "您好，验证码是：{$code}，感谢您注册惠校园网会员，惠校园网专注于为大学生们提供各种省钱秘籍，让仅有的生活费发挥更大的作用！";
        $result = sendCodeToMobile($phoneNumber, "{$text}");
        $data = array(
            'status' => 1,
            'info' => '发送成功',
        );
        return $data;
    }
    public function active() {
        $mail = $_GET['mail'];
        $activeCode = $_GET['ac'];
        $checkCode = md5($mail . ":huiguilin");
        if ($activCode != $checkCode) {
            redirect('/index.php', 1, '页面跳转中...');
            return FALSE;
        }
        $helper = new UserProfileModel();
        $result = $helper->getUserProfileByUserName($mail, $nickname);
        if (empty($result)) {
            redirect('/index.php', 1, '页面跳转中...');
            return FALSE;
        }
        $condition = "email = '{$mail}'";
        $data = array(
            'is_actived' => 1
        );
        $helper->updateUser($condition, $data);
        redirect('/index.php', 1, '页面跳转中...');
        return TRUE;
    }

    public function bindPhone() {
        $phoneNumber = !empty($_POST['cellphone_number']) ? $_POST['cellphone_number'] : 0;
        $email = !empty($_SESSION['user']['email']) ? $_SESSION['user']['email'] : "";
        $checkCode = !empty($_POST['vcode']) ? $_POST['vcode'] : 0;
        if (empty($phoneNumber) || empty($email)) {
            return TRUE;
        }
        if ($_SESSION['pcheck'] != $checkCode) {
            $this->error('验证码错误');
            return TRUE;
        }
        $condition = "email = '{$email}'";
        $data = array(
                'phone_number' => $phoneNumber,
                );
        $helper = new UserProfileModel();
        $result = $helper->updateUser($condition, $data);
        if (!empty($result)) {
            $data = array();
            $data['status'] = 1;
            $data['info'] = '绑定成功!';
            $data['size'] = 9;
            $data['url'] = "";
        }
        else {
            $data = array();
            $data['status'] = 0;
            $data['info'] = '用户名不存在!';
            $data['size'] = 9;
            $data['url'] = "";
        }
        $this->ajaxReturn($data,'JSON');
        return TRUE;
    }

    public function verifyImg(){
		import('ORG.Util.Image');
		Image::buildImageVerify(4,5,'png');
       

    }
    public function logout(){
        $data = session('user');
        if (!empty($data)) {
           session('user',null);
           if(!empty($_GET['_URL_'][3])){
                $this->redirect('Admin/Account/login');
           }
           else{
                $this->redirect('Home/Index/index');
           }
           
        }
    }

    public function forgetPwd(){
        //设置session有效期为5分钟
        session_set_cookie_params(5*60);
        session_cache_limiter('private');
        session_cache_expire(5);
        if(!IS_POST){ $this->error("非法提交！");}
        $useremail = $_POST['user_email'];  
        $usercellphone = $_POST['user_cellphone'];
        if (!empty($usercellphone)) {
            $this->sendCheck_code($usercellphone);
        }
        $userHelper = new UserProfileModel();
        $check_mail = $userHelper->getUserProfileByUserName($useremail);
        //判断用户邮箱是否注册
        if (empty($useremail) || empty($check_mail)) {
            $data = array(
                'status' => 5,
                'info' => '邮箱地址为空或邮箱不存在!',
                );
            $this->ajaxReturn($data,'JSON');
        }
        if (!empty($useremail)) {
            
            $activeCode = $this->sendEmail($useremail,'modifyCode');
           
            if (empty($activeCode)) {
                return FALSE;
            }else{
                $_SESSION['activeCode'] = $activeCode;
                $_SESSION['useremail'] = $useremail;
                $data = array(
                    'status' => 13,
                    'info' => '邮件已发送,请及时查收',
                    );
                $this->ajaxReturn($data,'json');
            }
        }
    }
    
    public function modifyPwd(){
        if (empty($_POST['password']) || empty($_POST['password1'])) {
            $data = array(
                'status' => 6,
                'info' =>'新密码不能为空',
                );
            $this->ajaxReturn($data,'json');
        }
        if ($_POST['password'] != $_POST['password1']) {
            $data = array(
                'status' => 7,
                'info' => '两次密码输入不一致',
                );
            $this->ajaxReturn($data,'json');
        }
        if (empty($_POST['checkCode'])) {
            $data = array(
                'status' => 8,
                'info' => '验证码不能为空',
                );
            $this->ajaxReturn($data,'json');
        }
        $password = md5($_POST['password']);
        $checkCode = $_POST['checkCode'];
        if ($checkCode!=$_SESSION['activeCode']) {
            $data = array(
                'status' =>9,
                'info' =>'验证码不正确',
                );
             $this->ajaxReturn($data,'json');
        }
        $userProfileHelper = new UserProfileModel();
        // $condition = $_SESSION['useremail'];
        if (!empty($_SESSION['useremail'])) {
            $email = $_SESSION['useremail'];   
            $condition = "email = '{$email}'";
        }
        if (!empty($_SESSION['userphone'])) {
                    $userphone = $_SESSION['userphone'];
                    $condition = "phone_number = '{$userphone}'";
                }        
        $data = array(
            'password' =>$password,
            );
        $res_modifyPwd = $userProfileHelper->updateUser($condition,$data);
        if($res_modifyPwd == 0 || !$res_modifyPwd){
            $data = array(
                'status' => 11,
                'info' =>'密码修改失败',
                );
             $this->ajaxReturn($data,'json'); 
         }else{
            $data = array(
                'status' => 10,
                'info' =>'密码修改成功',
                );
             $this->ajaxReturn($data,'json');
         }
    }
    public function sendCheck_code($phoneNumber) {
        if (empty($phoneNumber)) {
            $this->error('empty phonenumber');
            return FALSE;
        }
        $code = mt_rand(1, 9) * 1000 + mt_rand(0, 9) * 100 + mt_rand(0, 9) * 10 + mt_rand(0, 9);
        $helper = new UserProfileModel();
        $result = $helper->getUserProfileByPhoneNumber($phoneNumber);
        if (empty($result)) {
            $data = array(
                'status' => 12,
                'info' => '该手机没有在惠校园注册^^',
            );
            $this->ajaxReturn($data,'JSON');
            return TRUE;
        }

        $data = $this->sendForgetPWDCode($phoneNumber, $code);
        $this->ajaxReturn($data,'JSON');
        return TRUE;
    }
}
