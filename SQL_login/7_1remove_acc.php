
<!-- 判斷 刪除會員資料用 -->

<?php

include_once "connect.php";

$id=$_GET['id'];
$sql="DELETE FROM `users` WHERE `id`=$id"; // 刪除資料表內的資料
$pdo->exec($sql);

unset($_SESSION['user']); // 刪除資料記得把SESSION也刪除
header('location:index.php');
?>