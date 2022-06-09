<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>註冊會員</title>
</head>
<body>
    <!-- 新增 : 設計一個資料庫->資料表(放上需求的表單欄位), 根據表單欄位在網頁頁面寫入 
                帳號 密碼 姓名 生日 信箱 電話  地址 學歷 忘記密碼的提示 等....
    -->
    <h1>註冊會員</h1>
    <form action="3_2store_member.php" method="post">
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
                <td>生日</td>
                <td><input type="date" name="birthday" id=""></td>
            </tr>
            <tr>
                <td>密碼提示</td>
                <td><input type="text" name="passnote" id=""></td>
            </tr>
            <tr>
                <td>信箱</td>
                <td><input type="email" name="email" id=""></td>
            </tr>
        </table>
        <div>
            <input type="submit" value="註冊">
            <input type="reset" value="重置">
        </div>
    </form>
</body>
</html>