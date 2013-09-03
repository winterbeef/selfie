<?php
header('Content-Type: application/javascript');
include $_SERVER['DOCUMENT_ROOT'].'/whoami/init.php';
?>
var axes = <?= json_encode($axes); ?>
