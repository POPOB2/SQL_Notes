<?php
include_once "connect.php";// PDO只須執行一次所以可以用once
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問卷系統</title>
    <style>
        nav{
            width: 900px;
            margin: auto;
            text-align: right;
        }
    </style>
</head>
<body>
        <!-- 完整的會員系統 : 1.註冊 2.登入成功 3.編輯資料 4.利用已登入狀態在各個頁面之間變化 5.忘記密碼的處理 6.如何獲取密碼 7.刪除資料紀錄 -->
        <!-- 登入or註冊 發出的表單 較適合用GET POST傳遞
             但若是登入資料 就不適合 GET POST ,考慮到人流進出數量的狀況 負擔較大 
             session cokkie較適合用於保留登入狀態 只要登入過一次就會儲存一份辨識資料
             只要使用者還在網路上 隨時可以讀取已有的cookie session資訊  -->
    <nav>
        <?php // 若抓的到該伺服器有SESSION['user'] 表示 他是登入的使用者 , 那a按鈕顯示登出
        if(isset($_SESSION['user'])){
        ?>
        <a href="2_1logout.php">登出</a>
        <?php
        }else{// 若沒有 則顯示登入按鈕
        ?>
            <a href="1_1login.php">登入</a>
        <?php
        }
        ?>
    </nav>
    <h1 style="text-align:center">問卷</h1>

    <?php
    // 這裡用於PDO的include 因為上面的SESSION所以移到最上面
    
    $sql="SELECT * FROM `users`";
    $users=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);// fetchAll撈出所有資料, PDO::FETCH_ASSOC只要顯示 欄位的 二維陣列
    

    // 將二維陣列的資訊列出
    foreach($users as $user){
        echo $user['acc']."<br>";
    }

    ?>

    
</body>
</html>