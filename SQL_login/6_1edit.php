<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯會員資料</title>
</head>
<body>
    <!-- ***注意 : 這裡的作法僅做為理解網頁間的資料傳遞與鏈接的串寫  論安全性實為零  只需要輸入網址即可登入  正常使用時請勿在網址帶入機敏資料  -->
    <!-- ***編輯最好還是以POST的方式撰寫 -->


    <!-- 新增 : 設計一個資料庫->資料表(放上需求的表單欄位), 根據表單欄位在網頁頁面寫入 
                帳號 密碼 姓名 生日 信箱 電話  地址 學歷 忘記密碼的提示 等....
    -->
    <h1>編輯會員資料</h1>
    <?php
    include_once "connect.php";
    // if(isset($_GET['id']))// 有這個值=透過會員中心頁面進入, 沒有值=非法登入(直接知道網頁名稱打網址進入 沒帶任何的id資料給予系統)
    $sql="SELECT * FROM `users` WHERE id='{$_GET['id']}'"; // 進入編輯頁面後 id的資料會傳給使用者 再根據這個id的資料去資料庫把該id的整筆資料撈出來
    $user=$pdo->query($sql)->fetch();// 撈出資料後再將撈出的資料 依據下方td的value內的值 依據填入  顯示於話面上的表單內
    ?>
    
    <!-- 使用者改完資料按下編輯後 導入到action="6_2save_member.php"頁面 將表單填入的資料撈出來 再丟到資料庫去更新 -->
    <form action="6_2save_member.php" method="post">
        <table>
            <tr>
                <td>帳號</td>
                <!-- 僅顯示帳號訊息 不提供更改功能 -->
                <td><?=$user['acc'];?></td>
            </tr>
            <tr>
                <td>密碼</td>
                <td><input type="password" name="pw" value="<?=$user['pw'];?>"></td>
            </tr>
            <tr>
                <td>生日</td>
                <td><input type="date" name="birthday" value="<?=$user['birthday'];?>"></td>
            </tr>
            <tr>
                <td>密碼提示</td>
                <td><input type="text" name="passnote" value="<?=$user['passnote'];?>"></td>
            </tr>
            <tr>
                <td>信箱</td>
                <td><input type="email" name="email" value="<?=$user['email'];?>"></td>
            </tr>
        </table>
        <div>
            <!-- 隱藏按鈕      name連接到id    值是$user內的id -->
            <input type="hidden" name="id" value="<?=$user['id'];?>">
            <input type="submit" value="編輯">
            <input type="reset" value="重置">
        </div>
    </form>
</body>
</html>