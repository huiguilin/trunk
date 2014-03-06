<?php
class CategoryModel extends Model {

    protected $trueTableName = 't_monkey_category';

    public function getCategoryInfo($params = array()) {
        $str = "1 = 1";
        if (isset($params['cat_id'])) {
            $str .= " AND cat_id IN ({$params['cat_id']})";
        }
        if (isset($params['cat_name'])) {
            $str .= " AND cat_name  = '{$params['cat_name']}'";
        }
        if (isset($params['label_type'])) {
            $str .= " AND label_type IN ({$params['label_type']})";
        }
        $str .= " AND status = 1";
        $data = $this->where($str)->limit($params['limit'])->select();
        return $data;
    }

}
