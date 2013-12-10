<?php
class CmsnewsModel extends Model {

    protected $trueTableName = 't_monkey_cms_news';


    public function getCmsNewsByAdId($ids = array()) {
        if (empty($ids)) {
            return array();
        }
        $ids = implode(',', $ids);
        $data = $this->where("id IN ({$ids})")->select();
        return $data;
    }
    public function getCmsNews() {
        $data = $this->where(" 1 = 1")->select();
        return $data;
    }


}
