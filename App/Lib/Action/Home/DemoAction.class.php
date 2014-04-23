<?php
// 本类由系统自动生成，仅供测试用途
class DemoAction extends Action {
    public function demo(){
        $userName = "dushuren@outlook.com";
        $helper = new UserProfileModel();
        $userInfo = $helper->getUserProfileByUserName($userName);
        var_dump($userInfo);
        $this->display();
    }
}