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

    public function getUserProfileByUserName($name = "") {
        if (empty($name)) {
            return FALSE;
        }
        $data = $this->where("nickname = '{$name}' 
                                OR email = '{$name}'
                                OR phone_number = '{$name}'")->select();
        $data = $data[0];
        return $data;
    }

    public function getUserProfileByPhoneNumber($phone = "") {
        if (empty($phone)) {
            return FALSE;
        }
        $data = $this->where("phone_number = '{$phone}'")->select();
        $data = $data[0];
        return $data;
    }

    public function getUserProfileByPassword($password = "") {
        if (empty($password)) {
            return FALSE;
        }
        $data = $this->where("password = '{$password}'")->select();
        $data = $data[0];
        return $data;
    }

    public function getUserProfileByCookie($cookie = "") {
        if (empty($cookie)) {
            return FALSE;
        }
        $data = $this->where("cookie = '{$cookie}'")->select();
        $data = $data[0];
        return $data;
    }



    public function addUser($data = array()) {
        if (empty($data)) {
            return false;
        }
        $result = $this->data($data)->add();
        return $result;
    }

    public function updateUser($condition,$data = array()) {
        if (empty($data) ||empty($condition)) {
            return FALSE;
        }
        $result = $this->where("{$condition}")->save($data);
        return $result;
    }



}
