<?php

class CouponModel extends Model {

    protected $trueTableName = 't_monkey_coupon_info';
    private $labelType = array(
        '1' => array(
            '民以食为天',
            1,
            ),
        '2' => array(
            '休闲娱乐',
            2,
            ),
        '3' => array(
            '生活服务',
            4,
            ),
        '4' => array(
            '酒店',
            8,
            ),
        '5' => array(
            '旅游',
            16,
            ),
        '6' => array(
            '丽人',
            32,
            ),
    );

    public function getCouponByCouponId($cIds = array()) {
        if (empty($cIds)) {
            return array();
        }
        $cIds = implode(',', $cIds);
        $data = $this->where("coupon_id IN ({$cIds})")->select();
        return $data;
    }
    public function getCouponsByCouponId($couponId) {
            $data = $this->find($couponId);
            return $data;
    }
    public function getCoupon($params = array()) {
        $str = "1 = 1";
        
        if (isset($params['coupon_id'])) {
            $str .= " AND coupon_id IN ({$params['coupon_id']})";
        }
        if (isset($params['partner_id'])) {
            $str .= " AND partner_id IN ({$params['partner_id']})";
        }
        if (isset($params['label_type'])) {
            $str .= " AND (label_type & {$this->labelType[$params['label_type']][1]} = {$this->labelType[$params['label_type']][1]})";
        }
        if (isset($params['start_time_lt'])) {
            $str .= " AND start_time <= '{$params['start_time_lt']}'";
        }
        if (isset($params['end_time_lt'])) {
            $str .= " AND end_time <= '{$params['end_time_lt']}'";
        }
        if (isset($params['start_time_gt'])) {
            $str .= " AND start_time >= '{$params['start_time_gt']}'";
        }
        if (isset($params['end_time_gt'])) {
            $str .= " AND end_time >= '{$params['end_time_gt']}'";
        }
        if (isset($params['tag'])) {
            $str .= " AND tag like '%{$params['tag']}%'";
        }
        if (isset($params['cat_id'])) {
            $str .= " AND cat_id  = {$params['cat_id']}";
        }
        if (!isset($params['sum'])) {
            $data = $this->where($str)->order($params['order_by'])->limit($params['limit'])->select();
        }   
        else {
            $data = $this->where($str)->order($params['order_by'])->limit($params['limit'])->sum($params['sum']);
        }  
        return $data;
    }
    
    public function getCouponByPartnerId($id = 0) {
        if (empty($id)) {
            return array();
        }
        $data = $this->where("partner_id IN ({$id})")->select();
        return $data;
    }
    public function updateCoupon($condition,$data = array()) {
        if (empty($data) ||empty($condition)) {
            return FALSE;
        }
        $result = $this->where("{$condition}")->save($data);
        return $result;
    }
}
