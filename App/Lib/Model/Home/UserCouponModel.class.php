<?php
class UserCouponModel extends Model {

    protected $trueTableName = 't_monkey_user_coupon';

    public function getUserCoupon($params = array()) {
        if (empty($params)) {
            return array();
        }
        $str = "1 = 1";
        if (isset($params['id'])) {
            $str .= " AND id IN ({$params['id']})";
        }
        if (isset($params['phone_number'])) {
            $str .= " AND telephone = ({$params['phone_number']})";
        }
        if (isset($params['user_id'])) {
            $str .= " AND user_id IN ({$params['user_id']})";
        }
        if (isset($params['coupon_id'])) {
            $str .= " AND coupon_id IN ({$params['coupon_id']})";
        }
        if (isset($params['partner_id'])) {
            $str .= " AND partner_id IN ({$params['partner_id']})";
        }
        if (isset($params['code'])) {
            $codes = explode(',', $params['code']);
            foreach ($codes AS &$code) {
                $code = "'{$code}'";
            }
            $codeStr = implode(',', $codes);
            $str .= " AND code IN ($codeStr)";
        }
        if (isset($params['status'])) {
            $str .= " AND status IN ({$params['status']})";
        }
        if (isset($params['evaluated'])) {
            $str .= " AND evaluated IN ({$params['evaluated']})";
        }
        if (isset($params['start_time'])) {
            $str .= " AND createtime >= '{$params['start_time']}'";
        }
        if (isset($params['end_time'])) {
            $str .= " AND createtime <= '{$params['end_time']}'";
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

    public function updateUserCouponInfo($params) {
        if (empty($params)) {
            return false;
        }
        if (!empty($params['id'])) {
            $str .= "id = {$params['id']}";
        }
        if (!empty($params['user_id'])) {
            $str .= " AND user_id = {$params['user_id']}";
        }
        $data = $params['data'];
        $r = $this->where($str)->save($data);
        return $r;
    }

    public function updateUserCoupon($condition,$data = array()) {
        if (empty($data) ||empty($condition)) {
            return FALSE;
        }
        $result = $this->where($condition)->save($data);
        return $result;
    }

}
