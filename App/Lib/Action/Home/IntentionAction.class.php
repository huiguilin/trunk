<?php
// 本类由系统自动生成，仅供测试用途
class IntentionAction extends Action {
    public function intention(){
		$this->display();
    }
    public function handle(){
    	dump($_POST,1,'<pre>',0);
    }
}