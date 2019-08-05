#!/usr/bin/php
<?php
include "CountController.php";

$extendsTest = new CountController();
$resultInfo = $extendsTest->countPVUU();

$pv = $resultInfo->pv;
$uu = $resultInfo->uu;

$who = "sonjh32@naver.com";

$title = "PHP TEST YHAHO";
$content = "PV : " . $pv . "\n UU : " . $uu;

mail($who, $title, $content, "From: sonjh32@naver.com");

?>