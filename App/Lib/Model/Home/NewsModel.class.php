<?php
class NewsModel extends Model {

    protected $trueTableName = 't_monkey_news';

    public function getNewsByNewsId($ids = array()) {
        if (empty($ids)) {
            return array();
        }
        $ids = implode(',', $ids);
        $data = $this->where("news_id IN ({$ids})")->select();
        return $data;
    }
    public function getNews() {
        $data = $this->where(" 1 = 1")->select();
        return $data;
    }


}
