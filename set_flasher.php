<?php
$txt = $_POST['msg'];
$myfile = fopen("flash_msg.txt", "a") or die("Unable to open file!");
$txt = $txt."<br><br>";
fwrite($myfile, $txt);
fclose($myfile);
?>