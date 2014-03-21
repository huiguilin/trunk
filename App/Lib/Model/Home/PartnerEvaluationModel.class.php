<?php
class PartnerEvaluationModel extends Model {

    protected $trueTableName = 'v_monkey_partner_evaluation';
   
    public function getPartnerEvaluationInfo() {
        $data = $this->where(" 1 = 1")->select();
        return $data;
    }
    public function getPartnerEvaluationInfoById($params = array()) {
    	if (empty($params)) {
            return false;
        }
        $data = $this->where("partner_id IN ({$params['partner_id']})")->limit($params['limit'])->select();
        return $data;
    }
    public function getCountByPartnerId($partner_id){
        $map = array(
            'partner_id' => $partner_id,
            );
        return $this->where($map)->count();
    }
}
