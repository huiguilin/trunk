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
            echo "TBC2";
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
        $phone = !empty($_POST['phone']) ? $_POST['phone'] : $_POST['phone'];
        $nickname = !empty($_POST['nickname']) ? $_POST['nickname'] : $_POST['nickname'];
        $password = !empty($_POST['pwd']) ? $_POST['pwd'] : $_POST['pwd'];
        if (!empty($mail)) {
            $this->mailRegister($mail, $nickname, $password);
        }
        else {
            $this->phoneRegister($phone, $password);
        }
        if ($result == FALSE) {
        }
    }

    public function mailRegister($mail, $nickname, $password) {
        if (empty($mail) || empty($password) || empty($nickname)) {
            return TRUE;
        }
        $helper = new UserProfileModel();
        $result = $helper->getUserProfileByUserName($mail, $nickname);
        if (!empty($result)) {
            return FALSE;
        }
        $activeCode = $this->sendEmail($mail);
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
                'phone_number' => 111111,
                'level' => 0,
                'isBusiness' => 0,
                'login_times' => 1,
                );
        $r = $helper->addUser($data);
        if (!empty($r)) {
            $data['user_id'] = $r;
            $_SESSION['user'] = $data;
        }
        redirect('/index.php', 1, '页面跳转中...');
        return TRUE;
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
            $this->success('发送成功,请登录邮件激活');
        } else {
            /* $this->error('邮件发送失败...');
             * */
            echo '邮件发送失败<br>';
        }
        return $activeCode;
    }

    public function phoneRegister($phone, $password) {
        $helper = new UserProfileModel();
        $result = $helper->getUserProfileByPhoneNumber($phone);
        if (!empty($result)) {
            return FALSE;
        }
        $time = date("Y-m-d H:i:s");
        $password = md5($password);
        $mail = $phone . "#huiguilin";
        $nickname = $phone;
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
                'phone_number' => 111111,
                'level' => 0,
                'isBusiness' => 0,
                'login_times' => 1,
                );
        $r = $helper->addUser($data);
        if (!empty($r)) {
            $data['user_id'] = $r;
            $_SESSION['user'] = $data;
        }
        redirect('/index.php', 1, '页面跳转中...');
    }

    public function sendCheckcode() {
        $phoneNumber = $_POST['phone_number'];
        $code = mt_rand(0, 9) * 1000 + mt_rand(0, 9) * 100 + mt_rand(0, 9) * 10 + mt_rand(0, 9);
        $this->send($code);
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
}
