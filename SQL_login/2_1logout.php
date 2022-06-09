

<!-- 用於判斷登出 不需要html頁面 -->

<?php
// 在這裡將按下登出時發送過來的資訊 在此判斷 用於清除session(登入資訊)
session_start();
// unset=清除/不存在  , 這裡清除了SESSION的user資訊
unset($_SESSION['user']);

header("location:index.php");
?>