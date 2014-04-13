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
        if (isset($params['coupon_type'])) {
            $str .= " AND coupon_type IN ({$params['coupon_type']})";
        }
        if (isset($params['label_type']) && !empty($params['label_type'])) {
            $str .= " AND (label_type & {$params['label_type']} = {$params['label_type']})";
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
        if (isset($params['name_like'])) {
            $str .= " OR name like '%{$params['name_like']}%'";
            $str = "tag like '%{$params['tag']}%' OR name like '%{$params['name_like']}%'";
        }
        if (isset($params['cat_id'])) {
            $str .= " AND cat_id  IN ({$params['cat_id']})";
        }
        if (isset($params['str'])) {
            $str .= " AND {$params['str']}";
        }
        if (!isset($params['sum'])) {
            $data = $this->where($str)->order($params['order_by'])->limit($params['limit'])->select();
        }   
        else {
            $data = $this->where($str)->order($params['order_by'])->limit($params['limit'])->sum($params['sum']);
        }  
        if (isset($params['hash_key']) && !empty($params['hash_key']) && !empty($data)) {
            $result = array();
            foreach ($data AS $key => $value) {
                if (isset($data[$key][$params['hash_key']])) {
                    $hashKey = $data[$key][$params['hash_key']];
                    $result[$hashKey] = $data[$key];
                }
            }
            if (!empty($result)) {
                $data = $result;
            }
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

    public function getPartnerCouponOrderBy($orderBy) {
        $condition = "1 = 1";
        $str = "select sum(`download_times`) as download_times, partner_id from t_monkey_coupon_info where 1 = 1 group by partner_id order by {$orderBy}";
        $result = $this->query($str);
        return $result;

    }
}
