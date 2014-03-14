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

    public function getUserAllEmail() {

        $data = $this->where('s_type<3')->select();
        return $data;
    }
    public function updateSendTime($data = array(),$condition = array()){
        $map['s_email'] = array('in',$condition);
        $res = $this->where($map)->save($data);
        if (!res) {
            return 1;
        }else{
            return 0;
        }
    }

}
