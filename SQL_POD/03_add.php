<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增學生資料</title>
    <style>
        label{
            display: block;
            padding: 4px;
            
        }
        label input{
            padding: 3px;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <!-- -------------------------------------------------製作收集資料的表單------------------------------------------------- -->


    <h1>新增學生資料</h1>
    <!-- 參考表資料表的表單欄位內容 school>students>結構-->
    <!-- form:post>label*10>input:text -->
    <form action="04_store.php" method="post"><!-- 找到04_store.php頁面並將資料塞給它處理 -->
        <label for="">學號 : <input type="text" name="uni_id" id=""></label><!-- name必填 用於讓後台PHP對應後接收資料 -->
        <label for="">班級座號 : <input type="text" name="seat_num" id=""></label><!-- name=PHP用 , id=js用 -->
        <label for="">姓名 : <input type="text" name="name" id=""></label><!-- name在取名時,建議與資料欄位相同,作業上較省事 -->
        <label for="">生日 : <input type="text" name="birthday" id=""></label><!-- label的for 填入 input的id 搭配使用 -->
        <label for="">身分證字號 : <input type="text" name="national_id" id=""></label>
        <label for="">住址 : <input type="text" name="address" id=""></label>
        <label for="">家長 : <input type="text" name="parent" id=""></label>
        <label for="">電話 : <input type="text" name="telphone" id=""></label>
        <label for="">科系 : <input type="text" name="major" id=""></label>
        <label for="">畢業國中 : <input type="text" name="secondary" id=""></label>
        <input type="submit" value="新增">
        <input type="reset" value="重製">
    </form>
    <!-- 如果只是從資料庫撈資料出來看 可能會用GET
         但如果今天要對資料庫做的動作 可能會改變資料庫的內容時 建議用POST
         如 新增 刪除 修改等
        -->
        
</body>
</html>