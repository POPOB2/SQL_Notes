<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯學生資料</title>
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
    <!-- 1. 在02_CRUD.php資料表頁面新增.75~.80行內容 : 增加編輯的按鈕 並使其連結到編輯頁面
         2. 新增編輯頁面05_edit.php 用於填寫編輯資料 並增加更新按鈕 使其連結到更新頁面
         3. 新增更新頁面06_Update.php 用於...
            06_Update.php建議用POST  因為前面GET已經用一個表單丟過來了  而POST可以處理表單

    -->
    <!-- 觀察->分析->參考別人的方法,解決問題的步驟,拆解動作過程->重新整理->變成程式->變成畫面  -->
    
    <!-- -------------------------------------------------編輯資料的表單------------------------------------------------- -->
    

    <h1>編輯學生資料</h1>

    <?php
    // 當我按下02_CRUD.php設置的編輯1按紐時 會把編輯1設置的id帶到05_edit.php頁面時
    $id=$_GET['id'];// 會根據網址傳遞過來的id值 , 依照.39~.42的設定到資料庫撈出資料 , 再把撈出的資料於.54~.63行提供的欄位內 使用value將內容填入

    // 一樣要用PDO連線 所以以下建立連線方式  
    $dsn = "mysql:host=localhost;charset=utf8;dbname=school";// 設置參數設定檔 主機localhost 編碼utf8 資料庫名稱school
    $pdo = new PDO ($dsn,'root','');// 建立PDO 參數設定檔 使用者名稱 使用者密碼
    $sql = "SELECT * FROM `students`WHERE`id`='$id'";// 建立SQL語法 撈資料用 讀取所有資料 來自students資料表 查詢id值結果 = $id
    $student=$pdo->query($sql)->fetch();// 設置撈出學生資料的變數 內容來自= 由$pdo建立起的連線 -> 查詢$sql -> 只撈一筆資料所以用fetch()  框號內的常數可加可不加  不加  預設是key值與索引值都有
    echo "<pre>";
    print_r($student);// 通過上述 在這裡把撈出來的資料顯示出來 用以測試資料對照 確定無誤可以刪除這段   .56行註解
    echo "</pre>";
    ?>
    <!-- 找到06_Update.php頁面並將資料塞給它處理 -->

    <!-- GET 的方式.50行註解  -->
    <!-- <form action="06_Update.php?id=< ?=$id;?>" method="post">     -->

    <!-- POST 的方式.53行內容+.64~.65行內容 -->
    <form action="06_Update.php" method="post">
        <label for="">學號 : <input type="text" name="uni_id" value="<?=$student['uni_id']?>"></label><!-- name必填 用於讓後台PHP對應後接收資料 -->
        <label for="">班級座號 : <input type="text" name="seat_num" value="<?=$student['seat_num']?>"></label>
        <label for="">姓名 : <input type="text" name="name" value="<?=$student['name']?>"></label><!-- 因為需要把既有的資料內容直接顯示在空表格內,所以將id改成value 使用html格式可以接受的echo簡寫< ?=$student['uni_id']?>  以此導入key值 -->
        <label for="">生日 : <input type="text" name="birthday" value="<?=$student['birthday']?>"></label>
        <label for="">身分證字號 : <input type="text" name="national_id" value="<?=$student['national_id']?>"></label>
        <label for="">住址 : <input type="text" name="address" value="<?=$student['address']?>"></label>
        <label for="">家長 : <input type="text" name="parent" value="<?=$student['parent']?>"></label>
        <label for="">電話 : <input type="text" name="telphone" value="<?=$student['telphone']?>"></label>
        <label for="">科系 : <input type="text" name="major" value="<?=$student['uni_id']?>"></label>
        <label for="">畢業國中 : <input type="text" name="secondary" value="<?=$student['secondary']?>"></label>
    <!-- 用於告知要儲存的是哪一筆資料     type="hidden"用於隱藏傳值 ,  name="id"用於... , value="< ?=$id;?>"用於接收.35行由GET傳過來的id傳值 在由.44行用post傳值到06_Update.php-->
        <input type="hidden" name="id" value="<?=$id;?>">
        <input type="submit" value="更新">
        <input type="reset" value="重製">
    </form>
    <!-- 如果只是從資料庫撈資料出來看 可能會用GET
         但如果今天要對資料庫做的動作 可能會改變資料庫的內容時 建議用POST
         如 新增 刪除 修改等
        -->
        
</body>
</html>