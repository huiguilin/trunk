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
/**********************************************************************
     * 发送短信函数，发送短信函数,发送成功返回$result的值中result为1
     * @param string $phoneNumber  手机号码
     * @param string $text  发送短信内容
     * @param int $timeout  延时
***************************************************************************/
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
/**********************************************************************
     * 发送邮件函数，发送成功返回1，失败返回0
     * @param string $mail  邮箱地址
     * @param string $content  邮件正文
     * @param string $subject  邮件主题
*************************************************************************/
function sendEmail($mail,$content,$subject) {    
    import('ORG.Email');
    $data['mailto'] = $mail;
    $data['subject'] = $subject;
    $data['body'] = $content;
    $mail = new Email();
    if ($mail->send($data)) {
        return 1;
    } else {
        return 0;
    }
    return 1;
}
/*************************************************************************
     * 计算两个时间戳差值函数，返回Day,Hour,Min,Sec的值，用于计算倒计时
     * @param strtotime $begin_time  开始时间
     * @param strtotime $end_time  结束时间
***************************************************************************/
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
