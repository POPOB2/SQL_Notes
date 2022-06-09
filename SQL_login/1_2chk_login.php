

<!-- 檢查帳密是否正確用 不需要html頁面 -->


<!-- ------------------------------------------作法一.將資料撈出對比------------------------------------------ -->
<!-- 需求 : 對個人資料加工 或 進一步的驗證處理之後 才往下一步走 *例:店商網站 使用者登入成功後 根據今天or之前累積的消費金額資料 將其導到不同頁面 -->
<?php
        // include "connect.php";

        // $acc=$_POST['acc']; // 使用POST的方式傳送過來  所以用POST的方式接收
        // $pw=$_POST['pw'];

// 變數sql=users資料表的 資料表欄位`acc`剛好等於'表單傳過來的acc' 和  資料表欄位`pw`剛好等於'表單傳過來的pw'
        // $sql="SELECT * FROM `users` WHERE `acc`='$acc' && `pw`='$pw'";// 傳輸過來的資料內容較多  就算輸入錯誤沒有資料庫的內容可以比對  也還是會執行一次  只是沒有結果

// 帳號密碼是唯一的 不會有重複
        // $user=$pdo->query($sql)->fetch(); // $user=$pdo  ->執行  query尋找($sql)  ->執行  fetch撈出資料();

// 資料撈出來後做比對  $acc和$pw 等於 $user提供的acc與pw資訊 相同時 執行if
        // if($acc==$user['acc'] && $pw==$user['pw']){
            // header("location:5_1member_center.php");// 正確 導到會員中心頁面
        // }else{
            // header("location:1_1login.php?error=帳號或密碼錯誤");// 錯誤 回到登入頁面
        // }
?>
<!-- ------------------------------------------作法二.僅計算有無登入成功------------------------------------------ -->
<!-- 需求 : 簡易的純登入系統 -->
<?php
        // include "connect.php";
// 使用POST的方式傳送過來  所以用POST的方式接收
        // $acc=$_POST['acc']; // 這裡的$acc+$pw是使用者傳過來的表單內容
        // $pw=$_POST['pw'];

        // $sql="SELECT count(*) FROM `users` WHERE `acc`='$acc' && `pw`='$pw'";// 改用新增count(*) 用此條件計算 符合的資料有幾筆, 若大於0筆 即1=資料存在==0或1==true或false ,該方法只會傳送1或0 效能更佳

        // $user=$pdo->query($sql)->fetchColumn(); // fetchColumn 執行sql語句 並返回該筆資料中指定欄位的資料 ()為欄位的索引 0,1,2...
// 若無資料 表示第0欄位的東西 若1則欄位1 2則欄位2 ==有值或沒值==1或0

        // if($user>0){ // 一般會寫上>0  但其實可以不用寫
            // header("location:5_1member_center.php");// 正確 導到會員中心頁面
        // }else{
            // header("location:1_1login.php?error=帳號或密碼錯誤");// 錯誤 回到登入頁面
        // }
?>
<!-- ------------------------------------------作法二.計算有無登入成功 使用Session對應登入資訊------------------------------------------ -->
<!-- 需求 : 簡易的純登入系統 -->
<?php
include "connect.php";
// 使用POST的方式傳送過來  所以用POST的方式接收
$acc=$_POST['acc']; // 這裡的$acc+$pw是使用者傳過來的表單內容
// $pw=$_POST['pw']; //未有md5時
$pw=md5($_POST['pw']); //改為md5編碼 表單的密碼會經過md5編碼後 去對比資料庫的編碼 是否正確

$sql="SELECT count(*) FROM `users` WHERE `acc`='$acc' && `pw`='$pw'";// 改用新增count(*) 用此條件計算 符合的資料有幾筆, 若大於0筆 即1=資料存在==0或1==true或false ,該方法只會傳送1或0 效能更佳

$chk=$pdo->query($sql)->fetchColumn(); // fetchColumn 執行sql語句 並返回該筆資料中指定欄位的資料 ()為欄位的索引 0,1,2...
// 若無資料 表示第0欄位的東西 若1則欄位1 2則欄位2 ==有值或沒值==1或0


if($chk){ // $_SESSION['user']=$acc; 使用這個方法 要注意 帳號的唯一性 避免系統碰到相同帳號時無法處理 發生錯誤
    // session_start(); // 上方的include "connect.php";已使用session_start();
    $_SESSION['user']=$acc;// SESSION 獲得index的$user資料=表單送過來的帳號 設該帳號為使用狀態(這個過程僅用一次的存取 且該次存取結果僅回覆0或1 簡短 效益好,該SESSION避免為了記錄使用者資料而再去資料庫撈一次資料)
    header("location:5_1member_center.php");
}else{
    header("location:1_1login.php?error=帳號或密碼錯誤");
}
?>

