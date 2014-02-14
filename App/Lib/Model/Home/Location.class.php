<?php
class LocationModel extends Model {

    protected $trueTableName = 't_monkey_location';

    public function getLocationInfo($params = array()) {
        $str = "1 = 1";
        if (isset($params['id'])) {
            $str .= " AND id IN ({$params['id']})";
        }
        if (isset($params['name'])) {
            $str .= " AND name IN ({$params['name']})";
        }
        if (isset($params['belong'])) {
            $str .= " AND belong IN ({$params['belong']})";
        }
        $data = $this->where($str)->select();
        return $data;
    }

}
