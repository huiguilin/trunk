<?php
// 本类由系统自动生成，仅供测试用途
class DemoAction extends Action {
    public function demo(){
		$this->display();
    }
   public function demo2(){
 		// $data = M("help")->select();
   		$data = array('a','b','c');
 		$this->assign('data',$data);
 		// dump($data);
 		$this->display();
   }
   public function _empty($name){
   		$this->show("$name 方法不存在");
   }
   public function _before_index(){
   		echo 'qqq';
   }

}