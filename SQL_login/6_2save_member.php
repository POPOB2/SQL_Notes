

<!-- 用於判斷編輯 不需要html頁面 -->

<?php
include_once "connect.php"; // PDO只須執行一次所以可以用once

// 資料更新users資料表 SET設定pw 使用的值為{$_POST['pw']}以此類推 WHERE如何定位哪一筆資料進行改變 `id`='{$_POST['id']}'
$sql="UPDATE `users`
        SET `pw`='{$_POST['pw']}',
            `birthday`='{$_POST['birthday']}',
            `passnote`='{$_POST['passnote']}',
            `email`='{$_POST['email']}'
        WHERE `id`='{$_POST['id']}'";

$pdo->exec($sql); // $pdo 執行儲存內容($sql) // 把表單資料存進資料庫

header("location:5_1member_center.php"); // 編輯完成回到會員中心頁面

?>