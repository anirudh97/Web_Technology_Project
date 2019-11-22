<?php

$myfile = fopen("seatInfo", "r") or die("Unable to open file!");
$info = fread($myfile,filesize("seatInfo"));
$arr= explode(';',$info);
$flag = 0;
$count = 0;
foreach ($arr as $var){
    $moreinfo = explode(',',$var);
    if($moreinfo[0]==$_POST['dept']){
        $moreinfo[1] = $_POST['seats'];
        $flag = 1;

        $arr[$count] = implode(',',$moreinfo);
    }
    $count++;
}
if($flag==0){
    $arr[count($arr)] = $_POST['dept'].','.$_POST['seats'];
}
$finalInfo = implode(';',$arr);
fclose($myfile);
$f = fopen("seatInfo",'w');
fwrite($f, $finalInfo);
fclose($f);
$myfile = fopen("seatInfo", "r") or die("Unable to open file!");
$info = fread($myfile,filesize("seatInfo"));
$arr= explode(';',$info);
?>