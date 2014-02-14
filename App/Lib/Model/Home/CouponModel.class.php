<?php

class CouponModel extends Model {

    protected $trueTableName = 't_monkey_coupon_info';
    private $labelType = array(
        'eat' => array(
            '民以食为天',
            1,
            ),
        'play' => array(
            '休闲娱乐',
            2,
            ),
        'life' => array(
            '生活服务',
            4,
            ),
        'hotel' => array(
            '酒店',
            8,
            ),
        'tour' => array(
            '旅游',
            16,
            ),
        'people' => array(
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

    public function getCoupon($params = array()) {
        $str = "1 = 1";
        
        if (isset($params['coupon_id'])) {
            $str .= " AND coupon_id IN ({$params['coupon_id']})";
        }
        if (isset($params['partner_id'])) {
            $str .= " AND partner_id IN ({$params['partner_id']})";
        }
        if (isset($params['label_type'])) {
            switch ($params['label_type']) {
                case 'eat': 
                    $str .= " AND (label_type & {$this->labelType['eat'][1]} = {$this->labelType['eat'][1]})";
                    break;
                case 'life': 
                    $str .= " AND (label_type & {$this->labelType['life'][1]} = {$this->labelType['life'][1]})";
                    break;
                case 'play': 
                    $str .= " AND (label_type & {$this->labelType['play'][1]} = {$this->labelType['play'][1]})";
                    break;
                case 'tour': 
                    $str .= " AND (label_type & {$this->labelType['tour'][1]} = {$this->labelType['tour'][1]})";
                    break;
                case 'hotel': 
                    $str .= " AND (label_type & {$this->labelType['hotel'][1]} = {$this->labelType['hotel'][1]})";
                    break;
                case 'people': 
                    $str .= " AND (label_type & {$this->labelType['people'][1]} = {$this->labelType['people'][1]})";
                    break;
                default : 
                    $str .= " AND (label_type & {$this->labelType['eat'][1]} = {$this->labelType['eat'][1]})";
                    break;
                    
            }
        }
        if (isset($params['status'])) {
            $str .= " AND status = {$status}";
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
    
}
