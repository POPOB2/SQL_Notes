<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
    <style>
        table{
            margin: auto;
            width: 400px;
        }
        table td{
            padding: 1rem;
        }
        .btns{
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    if(isset($_GET['error'])){// 輸入完帳密後 在03_chk_login.php判斷 若錯誤 導回這個登入頁面 而此時帶一個error的變數值回來 在這判斷有無error變數存在 若有 echo出來
        echo "<h2 style='color:red;text-align:center'>{$_GET['error']}</h2>";
    }
    
    ?>
    <!-- form表單蒐集到的資料 傳到03_chk_login.php  , 使用post的方式傳送 -->
    <form action="03_chk_login.php" method="post"> 
        <table>
            <tr>
                <td>帳號</td>
                <td><input type="text" name="acc" id=""></td>
            </tr>
            <tr>
                <td>密碼</td>
                <td><input type="password" name="pw" id=""></td>
            </tr>
            <tr>
                <td><a href="02_register.php">尚未註冊?</a></td>
                <td><a href="02_forgot.php">忘記密碼?</a></td>
            </tr>
        </table>
        <div class="btns">
            <input type="submit" value="登入">
            <input type="reset" value="重置">
        </div>
    </form>
</body>
</html>