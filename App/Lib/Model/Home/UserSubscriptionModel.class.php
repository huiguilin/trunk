<?php
class UserSubscriptionModel extends Model {

    protected $trueTableName = 't_monkey_user_subscription';


    public function addSubscriptionEmailAddress($data = array()) {
        if (empty($data)) {
            return false;
        }
        $result = $this->data($data)->add();
        return $result;
    }
    public function getUserSubscriptionByEmailAddress($email = "") {
        if (empty($email)) {
            return FALSE;
        }
        $data = $this->where("s_email = '{$email}'")->select();
        $data = $data[0];
        return $data;
    }

}
