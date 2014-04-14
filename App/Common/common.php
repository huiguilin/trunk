<?php

function mergeData($cmsInfo, $info, $key, $cmsKey = 'id') {
    $info = ArrayKeys($info, $key);
    $result = array();
    foreach ($cmsInfo AS $key => $value) {
        $id = $cmsInfo[$key][$cmsKey];
        if (!empty($info[$id])) {
            $cmsInfo[$key] = array_merge($cmsInfo[$key], $info[$id]);
        }
        $result[$key] = $cmsInfo[$key];
    }
    return $result;
}

function getPageInfo($count, $url, $nowPage = 0, $pageSize = 10) {
    $pageArray = array();
    $pageArray['count_number'] = $count;
    $pageArray['page'] = (int) ($count / $pageSize);
    $pageArray['url'] = $url;
    $pageArray['now_page'] = $nowPage;
    $pageArray['front_url'] = !empty($nowPage) ? $url . "&page=" . ($nowPage - 1) : $url . "&page=0";
    $pageArray['first_url'] = $url . "&page=0";
    $pageArray['next_url'] = $nowPage == $pageArray['page'] ? $url . "&page=" . $nowPage: $url . "&page=" . ($nowPage + 1);
    $pageArray['last_url'] = $url . "&page={$pageArray['page']}";
    $links = array();
    for($i = 0; $i <= $page; $i ++) {
        $link = array();
        $link['url'] = $url . "&page=$i";
        $link['is_red'] = $page == $i ? 1 : 0;
        $link['i'] = $i+1;
        $links[] = $link;
    }
    $pageArray['links'] = $links;
    return $pageArray;
}

function sendCodeToMobile($phoneNumber, $text, $timeout = 10) {
    $result = array(
        'data' => 0,
    );
    if (empty($phoneNumber) || empty($text)) {
        return $result;
    }
    $text = urlencode($text);
    $url = "http://smsapi.c123.cn/OpenPlatform/OpenApi?action=sendOnce&ac=1001@500846980001&authkey=91235ECAED41747369D4B0F3762ED8C7&cgid=832&csid=101&c={$text}&m={$phoneNumber}";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
    $info = curl_exec($ch); 

    $dom=new DOMDocument();
    $dom->loadXML($info);
    $result = getArray($dom->documentElement);
    return $result;
    #$info = xml_to_array($info);
    #$info = json_encode($info, TRUE);
    return $info;
}


function getArray($node){
    $array=false;
    if($node->hasAttributes()){
        foreach ($node->attributes as $attr){
            $array[$attr->nodeName]=$attr->nodeValue;
        }
    }
    if($node->hasChildNodes()){
        if($node->childNodes->length==1){
            $array[$node->firstChild->nodeName]=getArray($node->firstChild);
        } else {
            foreach ($node->childNodes as $childNode){
                if($childNode->nodeType!=XML_TEXT_NODE){
                    $array[$childNode->nodeName][]=getArray($childNode);
                }
            }
        }
    } else {
        return $node->nodeValue;
    }
    return $array;
}

function xml_to_array($xml) 
{ 
    $array = (array)(simplexml_load_string($xml)); 
    foreach ($array as $key=> $item){ 
        $array[$key]  =  struct_to_array((array)$item); 
    } 
    return $array; 
} 

function sendEmail($mail,$content,$subject) {
        
    import('ORG.Email');
    $data['mailto'] = $mail;
    $data['subject'] = $subject;
    $data['body'] = $content;
    $mail = new Email();
    if ($mail->send($data)) {
        return 1;
    } else {
        echo 'false<br>';
        return 0;
    }
    return 1;
}

function timediff($begin_time,$end_time){
      if($begin_time < $end_time){
         $starttime = $begin_time;
         $endtime = $end_time;
      }
      else{
         $starttime = $end_time;
         $endtime = $begin_time;
      }
      $timediff = $endtime-$starttime;
      $days = intval($timediff/86400);
      $remain = $timediff%86400;
      $hours = intval($remain/3600);
      $remain = $remain%3600;
      $mins = intval($remain/60);
      $secs = $remain%60;
      $res = array("day" => $days,"hour" => $hours,"min" => $mins,"sec" => $secs);
      return $res;
}
//分配给前台显示
function homePage($page_whole,$pageAll,$pageNow,$url,$sortName='',$sortValue=''){
    $start = floor(($pageNow-1)/$page_whole)*$page_whole+1;
    if ($pageNow > $page_whole) {
       $previou = $start-1;
       /*
        *整体向后翻页变量，每次整体向后翻$page_whole页
       */
        $previous = "<li><a href='$url?pageNow=$previou&$sortName=$sortValue'><</a></li>";
    }else{
        $previous = "<li><a href='$url?pageNow=1&$sortName=$sortValue'><</a></li>";
    }
    if (($pageAll - $pageNow) <= $page_whole) {
        $nexts = "<li><a href='javascript:;'>></a></li>";
    }else{
        $next = $start+$page_whole;
        /*
        *整体向前翻页变量，每次整体向前翻$page_whole页
       */
        $nexts = "<li><a href='$url?pageNow=$next&$sortName=$sortValue'>></a></li>";
    }
    if ($pageAll <= $page_whole) {
        $end = $pageAll + 1;  //$end为前台打印页码变量，for循环结束值
    }else if($pageAll == $pageNow){
        $end = $pageAll + 1;
    }
    else{
        $end = $start+$page_whole;
    }
    $pageArray = array();
    $pageArray['start'] = $start;  //$start为前台打印页码变量，for循环开始值
    $pageArray['previous'] = $previous;
    $pageArray['nexts'] = $nexts;
    $pageArray['end'] = $end;
    return $pageArray;
}
