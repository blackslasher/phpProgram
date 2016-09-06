<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/6
 * Time: 22:02
 */
function randomString($type=1,$length=4){
    if($type==1){
        $char=join('',range(0,9));
    }elseif($type==2){
        $char=join('',array_merge(range('a','z'),range('A','Z')));
    }elseif($type==3){
        $char=join('',array_merge(range('a','z'),range('A','Z'),range(0,9)));
    }


    if($length>strlen($char)){
        exit("验证码长度不够");
    }

    $char=str_shuffle($char);
    return substr($char,0,$length);
}


?>