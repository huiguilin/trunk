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
        $partnerHelper = new PartnerModel();
        $partnerInfo = $partnerHelper->getSiteMapInfo();

        $sitemap = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\r\n";

        foreach($couponInfo as $k => $v){
            $url = "/index.php/coupon/detail/{$v['coupon_id']}";
            $url = U('/Coupon', "detail={$v['coupon_id']}");
            $priority = 0.8;
            if ($v['coupon_type'] == 2) {
                $url .= "/specialcoupon";
                $priority = 1.0;
            }
            $sitemap .= "<url>\r\n"."<loc>". $url ."</loc>\r\n"."<priority>{$priority}</priority>\r\n<lastmod>". $v['ctime'] ."</lastmod>\r\n<changefreq>daily</changefreq>\r\n</url>\r\n";
        }
        $url = U('/Coupon/specialcoupon');
        $sitemap .= "<url>\r\n"."<loc>". $url ."</loc>\r\n"."<priority>1</priority>\r\n<lastmod>". date("Y-m-d H:i:s") ."</lastmod>\r\n<changefreq>daily</changefreq>\r\n</url>\r\n";
        $url = U('/Coupon/coupon');
        $sitemap .= "<url>\r\n"."<loc>". $url ."</loc>\r\n"."<priority>1</priority>\r\n<lastmod>". date("Y-m-d H:i:s") ."</lastmod>\r\n<changefreq>daily</changefreq>\r\n</url>\r\n";
        $url = U('/Partner/partner');
        $sitemap .= "<url>\r\n"."<loc>". $url ."</loc>\r\n"."<priority>1</priority>\r\n<lastmod>". date("Y-m-d H:i:s") ."</lastmod>\r\n<changefreq>daily</changefreq>\r\n</url>\r\n";

        foreach ($partnerInfo AS $k => $v) {
            $url = U('/Partner/detail/', "pid={$v['partner_id']}");
            $priority = 1.0;
            $sitemap .= "<url>\r\n"."<loc>". $url ."</loc>\r\n"."<priority>{$priority}</priority>\r\n<lastmod>". $v['ctime'] ."</lastmod>\r\n<changefreq>weekly</changefreq>\r\n</url>\r\n";
        }

        $sitemap .= '</urlset>';
        $file = fopen("./sitemapone.xml","w+");
        fwrite($file,$sitemap);    fclose($file);
        return TRUE;
        }
}
