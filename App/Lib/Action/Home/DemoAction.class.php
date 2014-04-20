<?php
// 本类由系统自动生成，仅供测试用途
class DemoAction extends Action {
    public function demo(){
       

        // $result = sendCodeToMobile('18611244143', '2222');
        // echo "1111";
        // var_dump($result);
        // die;
        $this->display();
        exit();
        
        echo "今天:",date('Y-m-d H:i:s'),"<br>";
        echo "明天:",date('Y-m-d H:i:s',strtotime('-7 day'));

        $Ytime =date('Y-m-d H:i:s',strtotime('-1 day'));

        $time = "2014-03-12 21:00:00";
        if(strtotime($Ytime) > strtotime($time)){
            echo "1";
        }else{
            echo "2";
        }

       
    	$this->display();
        exit();
    	$date = date('Y-m-d H:i:s');
    	$couponHelper = new CouponModel();
    	$params = array(
    			'end_time_lt' => $date,
    		);
    	$result = $couponHelper->getCoupon($params);
    	if(empty($result)){
    		echo "优惠券都在有效期内";
    	}else{
    		$couponIds = DataToArray($result, 'coupon_id');
	        $couponIds = implode(',', $couponIds);
	        $params = array(
	            'coupon_id' => $couponIds,
	        );
    		$userCouponHelper = new UserCouponModel();
    		$result = $userCouponHelper-> getUserCoupon($params);

    		if(!empty($result)){
    			$couponIds = DataToArray($result, 'coupon_id');
    			$time = date("Y-m-d H:i:s");
    			$updateData = array(
    				'status' => '2',
    				'updatetime' => $time,
    				);
    			$condition = array(
    				'coupon_id' => array(
    					'IN', $couponIds,
    					),
    				);
    			$r = $userCouponHelper ->updateUserCoupon($condition,$updateData);
    			if(!empty($r)){
    				echo "优惠券过期状态修改成功！";
    			}else{
    				echo "优惠券过期状态修改失败！";
    			}
    		}
    	}
    }
}