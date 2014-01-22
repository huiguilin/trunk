<?php
// 本类由系统自动生成，仅供测试用途
class HelpAction extends Action {
	private $help_search_pagesize = 10;	//搜索每页显示条数
	private $help_search_max_keyword = 10;	//搜索每次最大允许搜索的关键词数量
	
    public function help(){
		$this->display();
    }
    public function error(){
    	$this->display();
    }
    public function faq01(){
		$m_help = D("Help");
		$map['type'] = 1;
		$map['status'] = 1;
		$data = $m_help->getHelpInfoAll($map);
		$this->assign("data",$data);
    	$this->display();
    }
    public function faq02(){
    	$this->display();
    }
    public function faq03(){
    	$this->display();
    }
    public function faq04(){
    	$this->display();
    }
    public function faq05(){
		$m_help = D("Help");
		$map['type'] = 5;
		$map['status'] = 1;
		$data = $m_help->getHelpInfoAll($map);
		$this->assign("data",$data);
    	$this->display();
    }
    public function search(){

		$keyword = strip_tags(trim($_GET["keyword"]));
		$type = intval($_GET["type"]); //转化成int
		
		//关键词分解，支持空格/逗号分隔
		$keyword_array = array();
		$keyword = str_replace("+"," ",$keyword); //将+号替换成空
		$keyword = str_replace("，",",",$keyword);	//将中文逗号替换为英文逗号
		$keyword_array1 = array_filter(explode(" ",$keyword)); //对输入的字符串做处理
		foreach($keyword_array1 as $item){
			$keyword_array2 = explode(",",$item);
			foreach($keyword_array2 as $item2){
				array_push($keyword_array,"%".$item2."%");
			}
		}
	
		if(count($keyword_array)>$this->help_search_max_keyword){  //判断是否操作允许的最大输入长度
			 $keyword_array = array_slice($keyword_array,0,$this->help_search_max_keyword);
		}
		$data = $show = array();
		$count = 0;
		if(count($keyword_array) > 0){
			$m_help = D("Help");
			$where["question"] = array('like',$keyword_array,'AND');
			$where["answer"] = array('like',$keyword_array,'AND');
			$where['_logic'] = 'OR';
			$map['_complex'] = $where;
			if($type>0){ $map['type'] = $type;}
			$map['status']  = 1;
			//获取总条数
			$count = $m_help->getCount($map);
			import('ORG.Util.Page');// 导入分页类
			$Page = new Page($count,$this->help_search_pagesize);// 实例化分页类 传入总记录数和每页显示
			$show = $Page->show();// 分页显示输出
			$data = $m_help->getHelpInfo($map,$Page->firstRow,$Page->listRows);
		}
		
		$this->assign("keyword",$keyword);
		$this->assign("count",$count);
		$this->assign("data",$data);
		$this->assign("page",$show);
        $this->display();
    }
}