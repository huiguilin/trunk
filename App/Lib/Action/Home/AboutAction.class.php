<?php
// 本类由系统自动生成，仅供测试用途
class AboutAction extends Action {
	public function _empty($name){
        $this->error("非法提交！");
    }
    public function about(){
		$this->display();
    }
}