<?php
// 本类由系统自动生成，仅供测试用途
class FeedbackAction extends Action {
    public function feedback(){
		$this->display();
    }
    public function _empty($name){
        $this->error("非法提交！");
    }
    
}