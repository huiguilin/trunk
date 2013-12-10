<?php
class UserProfileModel extends Model {

    protected $trueTableName = 't_monkey_user_profile';

    public function getUserProfileByUserId($ids = array()) {
        if (empty($ids)) {
            return array();
        }
        $ids = implode(',', $ids);
        $data = $this->where("user_id IN ({$ids})")->select();
        return $data;
    }


}
