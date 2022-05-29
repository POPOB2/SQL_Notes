<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP連線資料庫</title>
    <style>
        h1,h2,h3,h4{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>PHP連線資料庫</h1>

        <!-- PDO範例-------------------------------------------------------------------------------------------------------- -->
        <?php
        // 先設定 參數設定檔
        // nariaDB=mysql系列 localhost不能時用127.0.0.1
                    // $dsn = "mysql:host=localhost;charset=utf8;dbname=school2";
        // 第一個參數設定  第二個使用者 第三個密碼
                    // $pdo = new PDO($dsn,'root','');
        // 使用聯表查詢當範例
        // $sql="SELECT * FROM `students`,`dept` WHERE `dept`.`id`=`students`.`dept`";//重複的name欄頭使名字被覆蓋成科系 會有13個索引
                    // $sql="SELECT `students`.*,`dept`.`code`,`dept`.`name` as `科系` FROM `students`,`dept`  WHERE `dept`.`id`=`students`.`dept`";//調整SQL語法後只拿出需要的內容 會有12個索引
        // 語法送出拿到的結果   ->物件導向用的箭頭
        // $rows=$pdo->query($sql);//只寫這樣會只有把資料送過去
        // $rows=$pdo->query($sql)->fetch();//增加回傳  取出一筆資料
        // $rows=$pdo->query($sql)->fetchAll();//取多筆資料


        // $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_NUM);//依照需求調整屬性內容 索引值 優點 單純的數字 引用上比較快
        // $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);//依照需求調整屬性內容 鍵值 優點 欄位名稱 人 好解讀
                    // $rows=$pdo->query($sql)->fetchAll();//此時會顯示兩組資料 一組是索引表達內容 一組是鍵值表達內容 方便後續用於兩種不同方式提取 但資料量也會變兩倍

        
                    // echo "<pre>";//排序陣列 可讀性UP
                    // print_r($rows);//用陣列的方式顯示//用於測試上面的資料連接成功
                    // echo "</pre>";
        
        // 表格左到右0123456.... 下列0對應在第一個欄頭(id)
        // echo $rows[0][0];
        // echo "<br>";
        // echo $rows[0]['id'];
        ?>




        <!-- mysqli_connect 範例-------------------------------------------------------------------------------------------------------- -->
        <?php
        // 先設定 參數設定檔
        // $dsn = "mysql:host=localhost;charset=utf8;dbname=school2";//需要兩行
                    // $conn = mysqli_connect('localhost','root','','school2');//寫成一行

                    // $sql="SELECT `students`.*,`dept`.`code`,`dept`.`name` as `科系` FROM `students`,`dept`  WHERE `dept`.`id`=`students`.`dept`";//調整SQL語法後只拿出需要的內容 會有12個索引



        // $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_BOTH);
                    // $query=mysqli_query($conn,$sql);//拜訪!  1.連線方式 2.查詢語句 3.

        //撈資料  fetch一筆資料  fetchAll全部資料  後面的參數決定顯示的資料方式
        // $rows=mysqli_fetch_array($query,MYSQLI_NUM);//索引
        // $rows=mysqli_fetch_array($query,MYSQLI_BOTH);//索引+鍵
        // $rows=mysqli_fetch_array($query,MYSQLI_ASSOC);//鍵
        // $rows=mysqli_fetch_All($query,MYSQLI_BOTH);//全顯示  索引+鍵

                    // echo var_dump($query);//印出"所有"內容

                    // echo "<pre>";//排序陣列 可讀性UP
                    // print_r($rows);//用陣列的方式顯示//用於測試上面的資料連接成功
                    // echo "</pre>";
        
        // 表格左到右0123456.... 下列第二個0對應在第一個欄頭(id)
                    // echo $rows[0][0];
                    // echo "<br>";
                    // echo $rows[0]['id'];


        // 古早味寫法 while 下判斷
                    // while($row=mysqli_fetch_array($query,MYSQLI_BOTH)){
                        // echo "<pre>";
                        // print_r($row);
                        // echo "</pre>";
                    // }
        // 古早味寫法 while 下判斷 雖然只顯示一個  但實際還是跑了400多次的總次數  資料量大的時候會影響效能
                    // while($row=mysqli_fetch_array($query,MYSQLI_BOTH)){
                        // if($row['name']=='王鳳如'){
                            // echo "<pre>";
                            // print_r($row);
                            // echo "</pre>";
                        // }
                    // }
        


        ?>




</body>
</html>