<?php
require "config.php";
$toarray = array('adm_DeathEater');
print_r($toarray);
foreach ($toarray as $tonick) {
    echo $tonick."<br/>";
    $user = DB::findOneFromQuery("select * from usermaster where nickname = '$tonick'");
    $from = "team@mystique.bitotsav.in";
    $fromname = "Team Mystique";
    $to = $user['email'];
    $toname = $user['nickname'];
    $subject = 'Mystique Treasure Hunt 2014 - Suspicious Activities Warning';
    $body = $toname . ',<br/>Your activities have been recorded as suspicious. Continuing those after 20th level will result in a ban from the hunt without warning.<br/> For further details contact- 9430379892
        <br/>Team Mystique';
    $r = sendMail($to, $subject, $body, $toname);
    if (!$r) {
        $echo = 'Email could not be sent.';
    }
}

?>
