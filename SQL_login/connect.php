
<!-- 用於複數頁面會用到的程式碼, 縮減程式碼內容  -->

<?php

$dsn="mysql:host=localhost;charset=utf8;dbname=member";
$pdo=new PDO($dsn,'root','');
session_start();
?>