<?php
extract($_GET);
if($from==0){
    $file = fopen("Cur_rank.txt","r");
    if(filesize("Cur_rank.txt") == 0){
        echo "1";
    }
    else{
        echo "0";
    }
    fclose($file);
}
else{
    $file = fopen("Cur_rank.txt","w");
    echo fwrite($file,"1");
    fclose($file);
    echo "0";
}
    
    
?>