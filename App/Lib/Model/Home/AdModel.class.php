<?php
class AdModel extends Model {

    protected $trueTableName = 't_monkey_ad';
    protected $dbName = 'monkey';


    public function getAdByAdId($ids = array()) {
        if (empty($ids)) {
            return array();
        }
        $ids = implode(',', $ids);
        $data = $this->where("id IN ({$ids})")->select();
        return $data;
    }
    public function getAd() {
        $data = $this->where(" 1 = 1")->select();
        return $data;
    }


}
