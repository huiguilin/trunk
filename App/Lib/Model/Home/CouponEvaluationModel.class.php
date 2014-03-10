<?php
class CouponEvaluationModel extends Model {

    protected $trueTableName = 't_monkey_coupon_evaluation';
 
    public function addCouponEvaluation($data = array()) {
        if (empty($data)) {
            return false;
        }
        $result = $this->data($data)->add();
        return $result;
    }

    public function getInfo($params = array()) {
        if (empty($params)) {
            return false;
        }
        $str = "1 = 1";
        if (!empty($params['user_id'])) {
            $str .= " AND user_id = {$params['user_id']}";
        }
        if (!empty($params['coupon_id'])) {
            $str .= " AND coupon_id = {$params['coupon_id']}";
        }
        $data = $this->where($str)->order($params['order_by'])->limit($params['limit'])->select();
        return $data;
    }

    public function updateInfo($params) {
        if (empty($params)) {
            return false;
        }
        if (!empty($params['e_id'])) {
            $str .= "e_id = {$params['e_id']}";
        }
        if (!empty($params['user_id'])) {
            $str .= " AND user_id = {$params['user_id']}";
        }
        if (!empty($params['coupon_id'])) {
            $str .= " AND coupon_id = {$params['coupon_id']}";
        }
        $data = $params['data'];
        $r = $this->where($str)->save($data);
        return $r;
    }
}