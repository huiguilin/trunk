<?php
// 本类由系统自动生成，仅供测试用途
class RegisterAction extends Action {
    public function verifyImg(){
		import('ORG.Util.Image');
		Image::buildImageVerify(4,5,'png');
    }
    public function verify(){
    	// dump($_POST,1,'<pre>',0);
    	// $data =array(
    	// 	'status' => '1',
    	// 	)
    	// $this=>ajaxReturn($data,"json");
    }
}