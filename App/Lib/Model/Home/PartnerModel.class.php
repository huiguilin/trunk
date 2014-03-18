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
        if (isset($params['user_id'])) {
            $str .= " AND user_id IN ({$params['user_id']})";
        }
        if (isset($params['label_type'])) {
            $str .= " AND label_type = {$params['label_type']}";
        }
        if (isset($params['tag'])) {
            $str .= " AND tag LIKE '%{$params['tag']}%'";
        }
        if (isset($params['location_id'])) {
            $str .= " AND location = {$params['location_id']}";
        }
        if (isset($params['order_by'])) {
            $str .= " ORDER BY {$params['order_by']}";
        }
        if (isset($params['cat_id'])) {
            $str .= " AND cat_id  IN ({$params['cat_id']})";
        }
        $data = $this->where($str)->select();

        return $data;
    }
    

}
