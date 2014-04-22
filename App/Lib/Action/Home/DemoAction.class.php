<?php
// 本类由系统自动生成，仅供测试用途
class DemoAction extends Action {
    public function demo(){
       
        $id = $_GET['p'];
     
        import("ORG.Util.AjaxPage");// 导入分页类  注意导入的是自己写的AjaxPage类
  
        $credit = new CouponEvaluationModel();
        
        $count = $credit->count(); //计算记录数
        $limitRows = 2; // 设置每页记录数
      
       
        $p = new AjaxPage($count, $limitRows,"test"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value = $p->firstRow . "," . $p->listRows;
       
        $data = $credit->limit($limit_value)->select(); // 查询数据
        var_dump($data);
        $page = $p->show(); // 产生分页信息，AJAX的连接在此处生成
        $this->assign('list',$data);
        $this->assign('page',$page);
        $this->display();
    }
}