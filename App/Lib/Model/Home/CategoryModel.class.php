<?php
class CategoryModel extends Model {

    protected $trueTableName = 't_monkey_category';

    public function getCategoryInfo($params = array()) {
        $str = "1 = 1";
        if (isset($params['cat_id'])) {
            $str .= " AND cat_id IN ({$params['cat_id']})";
        }
        if (isset($params['cat_name'])) {
            $str .= " AND cat_name IN ({$params['cat_name']})";
        }
        if (isset($params['status'])) {
            $str .= " AND status IN ({$params['status']})";
        }
        $data = $this->where($str)->limit($params['limit'])->select();
        return $data;
    }

}
