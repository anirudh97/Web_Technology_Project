<?php
    $file = fopen("ans.txt","r");
    $content = fgets($file);
    echo $content;
    fclose($file);
?>