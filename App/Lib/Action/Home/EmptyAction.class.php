<?php
	//判断空模块
	class EmptyAction extends Action{
		function index(){
			$name=MODULE_NAME; //获取当前模块的名字
			$this->error("$name 该模块不存在");
		}
	}

?>