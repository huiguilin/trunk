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
    public function viewvalidate(){
        
        $templateName = $_GET["_URL_"][2]; 
        $this->assign('templateName',$templateName);
		$this->display();
    }
    public function getCouponInfo(){
        $data = array(
            'status' => 1,
            'info' => 'ddd',
        );
        $this->ajaxReturn($data);
    }
    public function validateCouponCode(){

    }
}