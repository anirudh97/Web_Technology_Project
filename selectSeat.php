<?php

$myfile = fopen("seatInfo", "r") or die("Unable to open file!");
$info = fread($myfile,filesize("seatInfo"));
$arr= explode(';',$info);
$flag = 0;
$count = 0;
foreach ($arr as $var){
    $moreinfo = explode(',',$var);
    if($moreinfo[0]==$_POST['dept']){
        $moreinfo[1]--;
        $flag = 1;

        $arr[$count] = implode(',',$moreinfo);
    }
    $count++;
}
// if($flag==0){
//     $arr[count($arr)] = $_POST['dept'].','.$_POST['seats'];
// }
$finalInfo = implode(';',$arr);
fclose($myfile);
$f = fopen("seatInfo",'w');
fwrite($f, $finalInfo);
fclose($f);
$myfile = fopen("selectInfo", "a") or die("Unable to open file!");
// $info = fread($myfile,filesize("seatInfo"));
// $arr= explode(';',$info);

$studInfo = $_POST["student"].','.$_POST["dept"]."\n";

fwrite($myfile, $studInfo);

fclose($myfile);

// cur rank ++

$rank = $_POST['rank'];

$myfile = fopen("Cur_rank.txt", "w") or die("Unable to open file!");
// $oldtime = fileatime("Cur_rank");
// $info = fread($myfile,filesize("seatInfo"));
// $serverTime = $info;

fwrite($myfile, $rank +1);

fclose($myfile);
?>