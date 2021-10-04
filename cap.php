<!--  Code foe captcha -->

<?php
$r1=range(0,9);
$ran1=array_rand($r1);

$r2=range(9,1);
$ran2=array_rand($r2);

$val = $ran1." + ".$ran2." = ?";

$capsum = $ran1+$ran2;

?>