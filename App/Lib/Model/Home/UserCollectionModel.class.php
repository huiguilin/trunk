<?php
class UserCollectionModel extends Model {

    protected $trueTableName = 't_monkey_user_collection';

    public function getUserCollection($params = array()) {
        $str = "1 = 1";
        if (isset($params['user_id'])) {
            $str .= " AND user_id IN ({$params['user_id']})";
        }
        if (isset($params['coupon_id'])) {
            $str .= " AND coupon_id IN ({$params['coupon_id']})";
        }
        $data = $this->where($str)->select();
        return $data;
    }

    public function addUserCollection($data = array()) {
        if (empty($data)) {
            return false;
        }
        $result = $this->data($data)->add();
        return $result;
    }
}
