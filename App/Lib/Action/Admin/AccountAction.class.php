<?php
// 本类由系统自动生成，仅供测试用途
class AccountAction extends Action {
	public function _empty($name){
        $this->error("非法提交！");
    }

    public function login(){
    	$templateName = $_GET["_URL_"][2]; 
        $this->assign('templateName',$templateName);
		$this->display();
    }
}