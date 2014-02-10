<?php
class UserAction extends Action {
    public function checkLogin(){
        $userName = $_POST['username'];
        $passwd = $_POST['password'];
        $verify = mb_strtolower($_POST['vcode']);
        if (empty($userName) || empty($passwd) || empty($verify)) {
            echo "empty important thing";
            return TRUE;
        }
        if (session('verify') != md5($verify)) {
            $this->error('验证码错误！');
            return TRUE;
        }
        $helper = new UserProfileModel();
        $data = $helper->getUserProfileByUserName($userName);
        if (empty($data)) {
            $data = array();
            $data['status'] = 2;
            $data['info'] = '用户名不存在!';
            $data['size'] = 9;
            $data['url'] = "";
            return TRUE;
        }
        $md5 = md5($passwd);
        if ($md5 == $data['password']) {
            $_SESSION['user'] = $data;
            $data = array();
            $data['status'] = 1;
            $data['info'] = '登陆成功！';
            $data['size'] = 9;
            $data['url'] = "";
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
        $this->display();
    }

    public function register() {
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
            $result = array(
                    'status' => 0,
                    'info' => '注册失败！',
                    'size' => 9,
                    'url' => '',
                    );          
        }
        $this->ajaxReturn($data,'JSON');
        return TRUE;
    }

    public function mailRegister($mail, $nickname, $password, $verify) {
        if (empty($mail) || empty($password) || empty($nickname)) {
            return FALSE;
        }
        if (session('verify') != md5($verify)) {
            $this->error('验证码错误！');
            return FALSE;
        }
        $helper = new UserProfileModel();
        $result = $helper->getUserProfileByUserName($mail, $nickname);
        if (!empty($result)) {
            return FALSE;
        }
        $activeCode = $this->sendEmail($mail);
        if (empty($activeCode)) {
            return FALSE;
        }
        $time = date("Y-m-d H:i:s");
        $password = md5($password);
        $cookie = md5($mail . $nickname . "huiguilin");
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

    private function sendEmail($mail) {
        $activeCode = md5($mail . ":huiguilin");
        $content = "你好!这是来自惠桂林的账号激活邮件,请点击 http://test.huiguilin.com/Index.php/user/active?ac={$activeCode}&user={$mail}";
        import('ORG.Email'); 
        $data['mailto'] = $mail; 
        $data['subject'] = '账号激活邮件'; 
        $data['body'] = $content; 
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
        $data = $this->send($phoneNumber, $code);
        $this->ajaxReturn($data,'JSON');
        return TRUE;
    }

    private function send($phoneNumber, $code) {
        if (empty($phoneNumber) || empty($code)) {
            return FALSE;
        }
        session("pcheck","{$code}");
        //TBC
        #$result = sendCodeToMobile($phoneNumber, "您的激活码是【{$code}】，感谢您注册惠桂林");
        $result = sendCodeToMobile($phoneNumber, "{$code}");
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
        $condition = "email = '{$mail}'";
        $data = array(
            'phone_number' => $phoneNumber,
        );
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
}
