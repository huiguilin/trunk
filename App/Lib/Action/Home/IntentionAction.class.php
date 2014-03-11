<?php
// 本类由系统自动生成，仅供测试用途
class IntentionAction extends Action {
	private $area_array = array(1=>'桂林',2=>'南宁',3=>'柳州',4=>'梧州',);
	private $classification_array = array(1=>'美食',2=>'休闲娱乐',3=>'生活服务',4=>'酒店',5=>'旅游',6=>'丽人',);
	public function _empty($name){
        $this->error("非法提交！");
    }
    public function intention(){
		$this->assign("area_array",$this->area_array);
		$this->assign("classification_array",$this->classification_array);
		$this->display();
    }
	
    public function recommend(){
		$this->assign("classification_array",$this->classification_array);
		$this->display();
    }
	
    public function handle(){
    	$returnData = array(
            'status' => 0,
            'info' => '',
        );
		if(!IS_POST){ $this->error("非法提交！");}
		//提交数据整理
		$data = array();
		$data['type'] = $this->filterstr($_POST['type'],'int');
		if(!$data['type']){ $this->error("参数错误！");}
		$data['nickname'] = $this->filterstr($_POST['nickname'],'string',0,20);
		$data['othercommunication'] = $this->filterstr($_POST['othercommunication'],'string',0,64);
		$data['content'] = $this->filterstr($_POST['content'],'string',0,255);
		$data['addtime'] = time();
		$data['status'] = 1;
		if(in_array($data['type'],array(1,2))){ //商业合作和用户推荐商家
			$data['cellphone'] = $this->filterstr($_POST['cellphone'],'string',0,15);
			$data['shopname'] = $this->filterstr($_POST['shopname'],'string',0,64);
			$data['companyaddress'] = $this->filterstr($_POST['companyaddress'],'string',0,128);
			$data['classification'] = $this->filterstr($_POST['classification'],'int');
		}
		if($data['type'] == 1){	//商业合作
			$data['area'] = $this->filterstr($_POST['area'],'int');
		}elseif($data['type'] == 2){	//用户推荐商家
			$data['specialproduct'] = $this->filterstr($_POST['specialproduct'],'string',0,128);
		}
		
		//表单验证规则
		$rules = array(//验证条件
			array('nickname','require','请填写您的称呼！'),
		);
		if(in_array($data['type'],array(1,2))){ //商业合作和用户推荐商家
			array_push($rules,array('cellphone','require','请填写您的联系方式！'),array('shopname','require','请填写您公司的名称！'),array('companyaddress','require','请填写您公司的地址！'));
		}else{	//feedback
			array_push($rules,array('othercommunication','require','请留下您的联系方式！'));
		}
		
		$m_feedback = M("Feedback");
		if(!$m_feedback->validate($rules)->create($data)){	//验证表单数据不通过
			// $this->error($m_feedback->getError());
			$returnData['status'] = 2;
            $returnData['info'] = $m_feedback->getError();
            $this->ajaxReturn($returnData,'json');
		}else{
			$result = $m_feedback->add($data);
			if($result){
				// $this->success('提交成功，感谢您的支持！');
				$returnData['status'] = 1;
            	$this->ajaxReturn($returnData,'json');
			}else{
				// $this->error('对不起，提交失败！');
				$returnData['status'] = 0;
				$returnData['info'] = "对不起，提交失败！";
            	$this->ajaxReturn($returnData,'json');
			}
		}
    }
	
	//非法字符过滤函数
	private function filterstr($str,$type,$cutstart=0,$cutlength=255,$encoding="UTF-8"){
		switch ($type) {
			case 'int':
				$result = intval($str);
				break;
			case 'string':
				$result = strip_tags(trim($str));
				$result = mb_substr($result,$cutstart,$cutlength,$encoding);	//截取字符串长度
				break;
			
			default:
				$result = strip_tags(trim($str));
				break;
		}
		return $result;
	}
}