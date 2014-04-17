<?php
Class PageModel extends Model{
        /*
         *$trueTableName为操作的数据表明
         *$pageCount为符合调教的总字段数
         *$pageAll表示总分页数
         *$pageNow表示当前页
         *$field表示匹配字段名称
         *$order表示查询排序条件
         *$countTerm表示要计算的字段名称
         *$map表示查询条件
        */
	  protected $trueTableName;
	  protected $pageCount;
	  var $pageAll;
	  var $pageNow;
	  var $pageSize;
	  var $field = "*";
	  var $order;
	  var $countTerm;
	  var $map = array();
	  
      public function getPages($tableName){
      	$this->trueTableName = $tableName;
      	$this->pageCount = $this->where($this->map)->count($this->countTerm);
      	$this->pageAll = ceil($this->pageCount/$this->pageSize); //cell表示向上取整函数
      	
      	$start = ($this->pageNow - 1)*$this->pageSize;
      	if (empty($this->map)) {
      	   		$pageInfo = $this->getAllPageInfo($start);
      	   	}else{
      	   		$pageInfo = $this->getPageInfoByMap($start);
      	   	}
      	return $pageInfo;
      }
      /*
       *查询所有记录
      */
      function getAllPageInfo($start){
      	$pageInfo = $this->field($this->field)->limit($start,$this->pageSize)->order($this->order)->select();
      	return $pageInfo;
      }
      /*
       *按查询条件查询分类信息
      */
      function getPageInfoByMap($start){
      	$pageInfo = $this->where($this->map)->field($this->field)->limit($start,$this->pageSize)->order($this->order)->select();
      	return $pageInfo;
      }
}

?>