<?php
	//判断空模块
	class EmptyAction extends Action{
        public function index(){
            $this->error('此模块不存在!','http://www.huigl.com');
           
        }
        
        
    }


?>