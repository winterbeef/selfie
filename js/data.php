<?php
header('Content-Type: application/javascript');
include '../init.php';
?>
var axes = <?= json_encode($axes); ?>
