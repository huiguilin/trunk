<?php
class EvaluationModel extends Model {

    protected $trueTableName = 't_monkey_partner_evaluation';

    public function getEvaluationByEvaluationId($ids = array()) {
        if (empty($ids)) {
            return array();
        }
        $ids = implode(',', $ids);
        $data = $this->where("evaluation_id IN ({$ids})")->select();
        return $data;
    }

    public function getEvaluation($type = 0) {
        $data = $this->field("*")->where("evaluation_type = '{$type}'")->order("createtime DESC")->select();
        return $data;
    }

    public function getEvaluationByPartnerId($ids = array()) {
        if (empty($ids)) {
            return array();
        }
        $ids = implode(',', $ids);
        $data = $this->where("id IN ({$ids})")->select();
        return $data;
    }

    public function getEvaluations($params = array()) {
        $str = "1 = 1";
        if (isset($params['evaluation_type'])) {
            $str .= " AND evaluation_type IN ({$params['evaluation_type']})";
        }
        if (isset($params['partner_id'])) {
            $str .= " AND partner_id IN ({$params['partner_id']})";
        }
        if (isset($params['coupon_id'])) {
            $str .= " AND coupon_id IN ({$params['coupon_id']})";
        }
        if (isset($params['user_id'])) {
            $str .= " AND user_id IN ({$params['user_id']})";
        }
        $data = $this->where($str)->order($params['order_by'])->limit($params['limit'])->select();
        return $data;
    }
}
