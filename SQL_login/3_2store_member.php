

<!-- 用於判斷註冊 不需要html頁面 -->

<?php
include_once "connect.php"; // PDO只須執行一次所以可以用once

// 業界需求做法 用許多謹慎的條件 避免錯誤發生 如內容是否符號等...
$acc=$_POST['acc'];
// $_acc=chkAcc($acc);

$pw=md5($_POST['pw']); // 先將表單發過來的密碼 進行編碼 在下方將加工成編碼的變數 存進資料表
                        // 注意資料表的字數設定 不能小於編碼的字數長度 建議至少32
$sql="INSERT INTO `users`(`acc`,`pw`,`birthday`,`passnote`,`email`)
                   values('{$_POST['acc']}','$pw','{$_POST['birthday']}','{$_POST['passnote']}','{$_POST['email']}');";

$pdo->exec($sql); // $pdo 執行儲存內容($sql) // 把表單資料存進資料庫

header("location:1_1login.php"); // 註冊完成回到login頁面

?>