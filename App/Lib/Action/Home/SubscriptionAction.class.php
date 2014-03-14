<?php 
   class SubscriptionAction extends Action{
   	
   	   public function getUserAllEmail(){
   	   	  $userSubscriptionHelper = new UserSubscriptionModel();
   	   	  $data = $userSubscriptionHelper->getUserAllEmail();
   	   	  
   	   	  foreach ($data as $k => $v){
   	   	  	 if ($v['s_type'] == 0) {
   	   	  	 	$oneDayEmail[] = $v['s_email'];
   	   	  	 	$oneDayTime[] = $v['s_time'];
   	   	  	 }else if ($v['s_type'] == 1) {
   	   	  	 	$oneWeekEmail[] = $v['s_email'];
   	   	  	 	$oneWeekTime[] = $v['s_time'];
   	   	  	 }else{
   	   	  	 	$twiceMonthEmail[] = $v['s_email'];
   	   	  	 	$twiceMonthTime[] = $v['s_time'];
   	   	  	 }
   	   	  }
   	   	  $nowTime = array(
   	   	  	's_time' => date('Y-m-d H:i:s'),
   	   	  );
   	   	  $r = $this->oneDaySend($oneDayEmail,$oneDayTime,$nowTime);
   	   	  if (!$r) {
   	   	  	echo "每天发送一次邮件失败<br><br>";
   	   	  }else{
   	   	  	echo "每天发送一次邮件成功<br><br>";
   	   	  }
   	   	  $r = $this->oneWeekSend($oneWeekEmail,$oneWeekTime,$nowTime);
   	   	  if (!$r) {
   	   	  	echo "每周发送一次邮件失败<br><br>";
   	   	  }else{
   	   	  	echo "每周发送一次邮件成功<br><br>";
   	   	  }
   	   	  $r = $this->twiceMonthSend($twiceMonthEmail,$twiceMonthTime,$nowTime);
   	   	  if (!$r) {
   	   	  	echo "每月发送两次邮件失败<br><br>";
   	   	  }else{
   	   	  	echo "每月发送两次邮件成功<br><br>";
   	   	  }
   	   }
   	   public function oneDaySend($oneDayemail = array(),$oneDayTime = array(),$nowTime = array()){
   	   	    for ($i=0;$i<count($oneDayTime);$i++){
   	   	        $mistiming = floor((strtotime($nowTime['s_time'])-strtotime($oneDayTime[$i]))/86400);
   	   	    	if ($mistiming >= 1 && $mistiming < 7) {
   	   	    		for ($j=$i;$j<count($oneDayemail);$j++){
                        $content = "testContent";
                        $subject = "testSubject";
   	   	    			$r = sendEmail($oneDayemail[$j],$content,$subject);
   	   	    			$condition[] = $oneDayemail[$j];
   	   	    			if ($r == 1) {
   	   	    				$this->doUpdateSendTime($nowTime,$condition);
   	   	    			}
   	   	    			break;
   	   	    		}
   	   	    	}
   	   	    }
   	   	    return $r;
   	   }
   	   public function oneWeekSend($oneWeekemail = array(),$oneWeekTime = array(),$nowTime = array()){
	   	   	for ($i=0;$i<count($oneWeekTime);$i++){
	   	   		$mistiming = floor((strtotime($nowTime['s_time'])-strtotime($oneWeekTime[$i]))/86400);
	   	   		if ($mistiming >= 7 && $mistiming < 15) {
	   	   			for ($j=$i;$j<count($oneWeekemail);$j++){
                        $content = "testContent";
                        $subject = "testSubject";
	   	   				$r = sendEmail($oneWeekemail[$j],$content,$subject);
	   	   				$condition[] = $oneWeekemail[$j];
	   	   				if ($r == 1) {
	   	   					$this->doUpdateSendTime($nowTime,$condition);
	   	   				}
	   	   				break;
	   	   			}
	   	   		}
	   	   	}
	   	   	return $r;
   	   }
   	   public function twiceMonthSend($twiceMonthEmail = array(),$twiceMonthTime = array(),$nowTime = array()){
	   	   	for ($i=0;$i<count($twiceMonthTime);$i++){
	   	   		$mistiming = floor((strtotime($nowTime['s_time'])-strtotime($twiceMonthTime[$i]))/86400);
	   	   		if ($mistiming >= 15 && $mistiming < 30) {
	   	   			for ($j=$i;$j<count($twiceMonthEmail);$j++){
                        $content = "testContent";
                        $subject = "testSubject";
	   	   				$r = sendEmail($twiceMonthEmail[$j],$content,$subject);
	   	   				$condition[] = $twiceMonthEmail[$j];
	   	   				if ($r == 1) {
	   	   					$this->doUpdateSendTime($nowTime,$condition);
	   	   				}
	   	   				break;
	   	   			}
	   	   		}
	   	   	}
	   	   	return $r;
	   }
	   public function doUpdateSendTime($data = array(),$condition = array()){
   	      $userSubscriptionHelper = new UserSubscriptionModel();
   	   	  $data = $userSubscriptionHelper->updateSendTime($data,$condition);
   	   	  return $data;
	   }
   }

?>