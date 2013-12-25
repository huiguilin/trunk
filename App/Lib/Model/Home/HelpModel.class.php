<?php
class HelpModel extends Model {
	//获取信息条数
	public function getCount($map){
		return $this->where($map)->count();
	}
	
	//获取指定ID信息
	public function getHelpById($id){
		return $this->find($id);
	}
	
	//获取信息
	public function getHelpInfoAll($map,$field="*",$order="help_id DESC"){
		return $this->field($field)->where($map)->order($order)->select();
	}
	
	//获取信息（分页）
	public function getHelpInfo($map,$start=0,$rows=10,$field="*",$order="help_id DESC"){
		return $this->field($field)->where($map)->order($order)->limit($start,$rows)->select();
	}
}
?>
