<?php
// 本类由系统自动生成，仅供测试用途
class DemoAction extends Action {
    public function demo(){
    	$node = new xml()
    	$a = getArray($node);
    	var_dump($a);
        $this->display();
    }
}