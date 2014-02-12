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
        'data' => false,
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

