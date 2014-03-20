<?php
class PartnerTagsModel extends Model {

    protected $trueTableName = 'v_monkey_partner_tags';
   
    public function getPartnerTagsInfo() {
        $data = $this->where(" 1 = 1")->select();
        return $data;
    }
    public function getPartnerTagsInfoById($partnerId) {
    	if (empty($partnerId)) {
            return array();
        }
        $data = $this->where("partner_id IN ({$partnerId})")->select();
        return $data;
    }
}
