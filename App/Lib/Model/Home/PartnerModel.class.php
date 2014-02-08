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
    public function getPartner($params = array()) {
        $str = " 1 = 1";

        if (isset($params['partner_id'])) {
            $str .= " AND partner_id IN ({$params['partner_id']})";
        }
        if (isset($params['tag'])) {
            $str .= " AND tag LIKE '%{$params['tag']}%'";
        }
        if (isset($params['location'])) {
            $str .= " AND location = {$params['location']}";
        }
        if (isset($params['order_by'])) {
            $str .= " ORDER BY {$params['order_by']}";
        }
        $data = $this->where($str)->select();
        return $data;
    }


}
