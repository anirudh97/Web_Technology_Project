<?php

header("Content-Type: text/event-stream");
header('Cache-Control: no-cache');
ob_start();
ob_flush();
flush();

$myfile = fopen("Cur_rank.txt", "r");

//$oldtie = fileatime("Cur_rank");
if(!(filesize("Cur_rank.txt"))){
	$info = "Admission not started";
	// sendMsg($info);
	echo "event:message\n";
	echo "data:".$info."\n\n";
	// echo PHP_EOL;
	ob_flush();

	flush();
}
else{
	$info = fread($myfile,filesize("Cur_rank.txt"));
	//$serverTime = $info;
	// sendMsg($info);
	echo "event:message\n";
	echo "data:".$info."\n\n";
	// echo PHP_EOL;
	ob_flush();
	flush();
}




// while(true){
// 	if($newtime > $oldtime)
// 		sendMsg(1,$serverTime);
// 	sleep(2);
// }

// ob_start();
// 	ob_flush();
// 	flush();
// 	$count=0;
// 	while(true){
// 		$newtime = fileatime("Cur_rank");

// 		if($newtime > $oldtime){
// 			echo "event:msg\n";
// 			echo "data:Count is: $info\n\n";
// 			ob_flush();
// 			flush();
// 		}
// 		sleep(2);
// 		$count++;	
// 	}


