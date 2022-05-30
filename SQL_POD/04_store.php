
<!-- 帶參數過來的時候可以在F12的Network中於Payload查看資料內容
         使用一般的表單 顯示Form Date
         使用GET在網址上的 ? 後填入資料 顯示Query String Parmeters
-->

<?php
// * 透過網頁建立表單 獲得資料的流程 : 
//     撈到表單傳過來的資料 ==> 傳到資料庫去 ==> 寫到資料庫去 
//     寫到資料庫的前置作業 : 讓程式連上資料庫
//     連上資料庫 : 建立PDO語法 PDO物件 建立SQL語法(INSERT INTO...) => 執行PDO-CRUD.EXEC => 執行SQL語句 => 送到資料表 => 將資料對應欄位後填上

// 顯示Array
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";

// 顯示資料
        // echo "<pre>";
        // print_r($_GET);
        // echo "</pre>";
?>


<!-- ***********************測試 : PHP可以透過語法連上資料庫, 並且可以送出一段SQL的語法, 讓資料庫可以正確把語法新增進資料庫*********************** -->
<?php
        $dsn="mysql:host=localhost;chartset=utf8;dbname=school"; // 建立參數設定檔
        $pdo=new PDO($dsn,'root',''); // 建立PDO的連線(1.資料庫的設定,2.使用者名稱,3.使用者密碼)

// 一般為了預防發生41行的註解內容, 會將表單內容加工處理 
// 建議將表單提供的資料用變數儲存, 可以讓系統針對這個表單的值做許多式子
// $name=$_POST['name'];
// 如 : 有無內容,無內容重寫 
// 使用htmlspecialchars檢查將 標籤.斜線.分號.單引號等特殊字符轉化為特殊符號,避免前端產出時產生結果時發生錯誤
// $name=htmlspecialchars() $_POST['name'];




// 建立SQL語法
// 若把表單POST直接拿到與法理面用  是比較危險的做法 ,容易被塞奇怪的符號 ,接收表單後就把這些符號上傳到資料庫 ,交到網頁上後網頁亂掉
$sql="INSERT INTO `students` (`uni_id`,
                              `seat_num`,
                              `name`,
                              `birthday`,
                              `national_id`,
                              `address`,
                              `parent`,
                              `telphone`,
                              `major`,
                              `secondary`
                                )values(
                               '{$_POST['uni_id']}',
                               '{$_POST['seat_num']}',
                               '{$_POST['name']}',
                               '{$_POST['birthday']}',
                               '{$_POST['national_id']}',
                               '{$_POST['address']}',
                               '{$_POST['parent']}',
                               '{$_POST['telphone']}',
                               '{$_POST['major']}',
                               '{$_POST['secondary']}'
                                )";
// 框選後ctrl+shift+p 可以使用join Lines連接線功能串成一行

        // echo $sql;// 先測試INSERT INTO語法的表單有無問題
// 正確顯示出整串資料後, 可以複製起來 到MyAdmin裡用SQL新增一筆資料 貼上 執行


// 收到新增的表單資料時, 直接送進資料庫
        $pdo->query($sql);
        //讓pdo使用query功能 執行$sql
        header("location:02_CRUD.php");// 寫完一筆資料後, 在這將頁面導回設定的首頁
?>