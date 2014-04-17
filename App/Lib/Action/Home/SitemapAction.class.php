<?php
// 本类由系统自动生成，仅供测试用途
class SitemapAction extends Action {
	public function _empty($name){
        $this->error("非法提交！");
    }
    public function sitemap(){
	$this->display();
    }

    //生成sitemap
    public function create_sitemap() {
        $couponHelper = new CouponModel();
        $couponInfo = $couponHelper->getSiteMapInfo(); 

        #$list = M('Rent')->field('id,title,create_time')->order('id desc')->limit(10000)->select();
        $list = array(1,2,3,4); 
        $sitemap = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\r\n";
        foreach($list as $k=>$v){
            $sitemap .= "<url>\r\n"."<loc>".U('Contents/Rent/show',array('id'=>$v))."</loc>\r\n"."<priority>0.6</priority>\r\n<lastmod>".date('Y-m-d')."</lastmod>\r\n<changefreq>weekly</changefreq>\r\n</url>\r\n";
        }   

        $sitemap .= '</urlset>';
        $file = fopen("/tmp/sitemapone.xml","w");
        fwrite($file,$sitemap);    fclose($file);
        return TRUE;
        }
}
