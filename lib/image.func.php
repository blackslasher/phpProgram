<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/6
 * Time: 22:02
 */

require_once "string.func.php";
/*通过gd库来写验证码*/

//1创建一个画布
$width=80;
$height=30;
$length=4;
$image=imagecreatetruecolor($width,$height);
$white=imagecolorallocate($image,255,255,255);
$black=imagecolorallocate($image,0,0,0);

//用填充矩形填充画布
imagefilledrectangle($image,0,0,$width,$height,$white);
$chars=randomString(1,4);
$_SESSION['verify_name']=$chars;
for($i=0;$i<$length;$i++){
    $size=mt_rand(14,18);
    $angle=mt_rand(-15,15);
    $x=5+$i*$size;
    $y=mt_rand(20,22);
    $color=imagecolorallocate($image,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
    $text=substr($chars,$i,1);
    $font='../fonts/Arial.ttf';
    imagettftext($image,$size,$angle,$x,$y,$color,$font,$text);
}
header('content-type:image/gif');
imagegif($image);
imagedestroy($image);
?>