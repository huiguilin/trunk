<?php
// 本类由系统自动生成，仅供测试用途
class LoginAction extends Action {
    public function verifyImg(){
		import('ORG.Util.Image');
		Image::buildImageVerify(4,5,'png');
    }
    public function _empty($name){
        $this->error("非法提交！");
    }
}
