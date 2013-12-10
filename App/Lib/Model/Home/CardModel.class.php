<?php

class CardModel extends Model {

    protected $trueTableName = 't_monkey_membership_card';


    public function getCardByCardId($cIds = array()) {
        if (empty($cIds)) {
            return array();
        }
        $cIds = implode(',', $cIds);
        $data = $this->where("card_id IN ({$cIds})")->select();
        return $data;
    }
    public function getCard() {
        $data = $this->where(" 1 = 1")->select();
        return $data;
    }


}
