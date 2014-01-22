<?php
// 本类由系统自动生成，仅供测试用途
class AccountAction extends Action {
    public function mycoupon(){
		$this->display();
    }
     public function myfavorite(){
		$this->display();
    }
     public function mytocomment(){
		$this->display();
    }
    public function mycommented(){
        $this->display();
    }
     public function mysetting(){
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
}