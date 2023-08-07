<?php
namespace App\Http\Services;
class Common{
    static function message($phone,$content){
        $user = "94769669804";
        $password = "3100";
        $text = urlencode($content);
        $to = "94".(int)$phone;
        
        $baseurl ="http://www.textit.biz/sendmsg";
        $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
        $ret = file($url);
        
        $res= explode(":",$ret[0]);
        
        if (trim($res[0])=="OK")
        {
        echo "Message Sent - ID : ".$res[1];
        }
        else
        {
        echo "Sent Failed - Error : ".$res[1];
        }
    }
    
}

