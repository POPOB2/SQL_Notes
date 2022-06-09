<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員中心</title>
    <style>
        .remove{
            color: #eee;
        }
        .remove:hover{
            color:red;
        }
    </style>
</head>
<body>
    <nav><a href="2_1logout.php">登出</a></nav>
    <h1>會員中心</h1>
    <?php include "connect.php"; // 連上資料庫 ?>

    歡迎<?=$_SESSION['user'];?>,祝你有美好的一天

    <!-- 登入完成後,進入會員中心頁面 顯示出使用者資訊 讓使用者可以編輯資料 -->
    <?php
    $sql="SELECT * FROM `users` WHERE acc='{$_SESSION['user']}'"; // 到資料庫撈資料

    $user=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC); // pdo->query獲取$sql查詢的資料->fetch(框號內容可打可不打  加這段可以只取欄位資料,不取索引資料  減少傳輸大小)
    echo "<hr>";
    echo '序號:'.$user['id']."<br>";
    echo '帳號:'.$user['acc']."<br>";
    // echo '密碼:'.$user['pw']."<br>";// 安全考量 較機密的資料不顯示 或 加工處理
    echo '密碼:********<br>';
    echo '密碼提示:'.$user['passnote']."<br>";
    echo '生日:'.$user['birthday']."<br>";
    echo '信箱:'.$user['email']."<br>";
    ?>


    <!-- 使用編輯跳轉到新的頁面表單進行資料更改 -->

    <!-- 帶值:使用 ?id=< ?=$user['id']?> 把id帶過去 告訴編輯頁面 現在這個頁面要編輯的資料 是user資料表裡面的id幾 -->
    <!-- 帶過去後從編輯頁面 把資料庫撈出該id的資料 顯示在畫面上 讓使用者可以進行編輯動作 -->
    <button><a href='6_1edit.php?id=<?=$user['id'];?>'>編輯會員資料a標籤</a></button>
    
    <form action='6_1edit.php' method='post'>
        <input type="hidden" name="id" value="<?=$user['id'];?>">
        <input type="submit" value="編輯會員資料form表單">
    </form>

    <!-- js 換掉網址上的位址 稱作 重新導向 如下 -->
    <!-- 未帶值 -->
    <button onclick="location.href='6_1edit.php'">編輯會員資料js-location未帶值</button>
    <!-- 帶值 方法和a標籤相同 -->
    <button onclick="location.href='6_1edit.php?id=<?=$user['id'];?>'">編輯會員資料js-location帶值</button>
    <!-- 帶值與未帶值的差異 看F12 或 網址內容 -->

    <!-- 移除會員資料 注意安全性的問題 與 重複確認 -->
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <a class="remove" href="7_1remove_acc.php?id=<?=$user['id'];?>">移除會員資料</a>
</body>
</html>