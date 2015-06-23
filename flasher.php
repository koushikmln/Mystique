<?php
$myfile = fopen("flash_msg.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("flash_msg.txt"));
fclose($myfile);
?>