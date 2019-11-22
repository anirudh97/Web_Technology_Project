<?php
$myfile = fopen("seatInfo", "r") or die("Unable to open file!");
$info = fread($myfile,filesize("seatInfo"));

$arr= explode(';',$info);
// echo implode(";",$arr)."\n";
$flag = 0;
$count = 0;
$text = '<table>';

if($_GET['from']==0){
	$str = "Delete";
	$fname ="deleteDept"; 
}
elseif ($_GET['from']==1) {
	$str = "Select";
	$fname ="selectDept"; 
}

foreach ($arr as $var){
    $moreinfo = explode(',',$var);
	// $text.="<tr><td>".$moreinfo[0]."</td><td>".$moreinfo[1]."</td><td><button id = '".$moreinfo[0]."DEL' onclick ='".$fname."(\"".$moreinfo[0]."\")'>".$str."</button></td></tr>";
	$text.="<tbody><tr><td class='column1'>".$moreinfo[0]."</td><td class='column2'>".$moreinfo[1]."</td><td class='column2'><button id = '".$moreinfo[0]."DEL' onclick ='".$fname."(\"".$moreinfo[0]."\")'>".$str."</button></td></tr></tbody>";
}

$text.="</table>";
fclose($myfile);




echo $text;
?>