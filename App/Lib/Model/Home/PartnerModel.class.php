<?php
class PartnerModel extends Model {

    protected $trueTableName = 't_monkey_partner_info';

    public function getPartnerByPartnerId($ids = array()) {
        if (empty($ids)) {
            return array();
        }
        $ids = implode(',', $ids);
        $data = $this->where("partner_id IN ({$ids})")->select();
        return $data;
    }
    public function getPartner() {
        $data = $this->where(" 1 = 1")->select();
        return $data;
    }


}
