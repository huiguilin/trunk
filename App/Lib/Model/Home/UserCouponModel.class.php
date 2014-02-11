<?php
class UserCouponModel extends Model {

    protected $trueTableName = 't_monkey_user_coupon';

    public function getUserCoupon($params = array()) {
        if (empty($params)) {
            return array();
        }
        $str = "1 = 1";
        if (isset($params['user_id'])) {
            $str .= " AND user_id IN ({$params['user_id']})";
        }
        if (isset($params['coupon_id'])) {
            $str .= " AND coupon_id IN ({$params['coupon_id']})";
        }
        if (isset($params['status'])) {
            $str .= " AND status IN ({$params['status']})";
        }
        if (isset($params['evaluated'])) {
            $str .= " AND evaluated IN ({$params['evaluated']})";
        }

        if (!isset($params['count'])) {
            $data = $this->where($str)->order($params['order_by'])->limit($params['limit'])->select();
        }
        else {
            $data = $this->where($str)->order($params['order_by'])->limit($params['limit'])->count($params['count']);
        }
        return $data;
    }


    public function addUserCoupon($data = array()) {
        if (empty($data)) {
            return false;
        }
        $result = $this->data($data)->add();
        return $result;
    }

}
