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


}
