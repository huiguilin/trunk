<?php


function sendCodeToMobile($phoneNumber, $text, $timeout = 10) {
    $result = array(
        'data' => false,
    );
    if (empty($phoneNumber) || empty($text)) {
        return $result;
    }
    $text = urlencode($text);
    $url = "http://smsapi.c123.cn/OpenPlatform/OpenApi?action=sendOnce&ac=1001@500815990001&authkey=030CA9C8BA9DE20A621C3C7B64D88D48&cgid=52&csid=101&c={$text}&m={$phoneNumber}";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
    $info = curl_exec($ch);
    #$info = xml_to_array($info);
    #$info = json_encode($info, TRUE);
    return $info;
}


function xml_to_array($xml) 
{ 
    $array = (array)(simplexml_load_string($xml)); 
    foreach ($array as $key=&gt;$item){ 
        $array[$key]  =  struct_to_array((array)$item); 
    } 
    return $array; 
} 

