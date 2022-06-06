<?php

$id=$_GET['id'];//用GET的方式做"刪除"有危險, 有心人士只要在網址上輸入id就可以刪除其它資料, 而這裡使用GET是用於示範, 實際請不要用GET做刪除指令
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,'root','');

$sql="DELETE FROM `students` WHERE `id`='$id'";

$pdo->exec($sql);

header("location:02_CRUD.php");//header是使用發出新的請求 重新導回 更新後的頁面內容, 所以就算拉到下方刪除 還是會跳回上方 因為是新的頁面
?>