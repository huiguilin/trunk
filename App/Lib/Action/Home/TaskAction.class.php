<?php
// 本类由系统自动生成，仅供测试用途
class TaskAction extends Action {
    public function _empty($name){
        $this->error("非法提交！");
    }
    public function modifyCouponExpireStatus(){
    	
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