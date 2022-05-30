<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <style>
        h1,h2,h3,h4{
            text-align: center;
        }

        table{
            border-color: collapse;
            border: 3px solid orange;
            margin: auto;
        }

        table td{
            padding: 0.5rem;
            border: 1px solid #aaa;
        }

        table tr:nth-child(odd){
            background: lightgreen;
        }

        table tr:nth-child(even){
            background: lightcyan;
        }

        table tr:hover{
            background: lightcoral;
        }
    </style>
</head>
<body>
    <h1>PHP連線資料庫</h1>

<!-- -------------------------------------------------------------------------------------------------------- -->
<!-- |C| Create 建立 -->
<!-- |R| Read   讀取 -->
<!-- |U| Update 更新 -->
<!-- |D| Delete 刪除 -->

<?php
// 顯示全部479筆
$dsn = "mysql:host=localhost;charset=utf8;dbname=school";
$pdo = new PDO($dsn,'root','');
$sql = "SELECT * FROM `students`";
        $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>
        <h3><button><a href="add.php">新增學生資料</a></button></h3><!-- 新增按鈕 a -->
        <h3><form action="add.php" method="get"><button>新增學生資料</button></form></h3><!-- 新增按鈕 submit -->
        <h3><button onclick="location.href='add.php'">新增學生資料</button></h3><!-- 新增按鈕 onclick -->
        <table>      
            <tr><!-- 新增表頭區塊 -->
                <td>序號</td>
                <td>學號</td>
                <td>學生姓名</td>
                <td>科系</td>
                <td>父母</td>
                <td>畢業國中</td>
            </tr>
<?php
        foreach($rows as $key => $rows){
            echo "<tr>";
                echo "<td>{$rows['id']}</td>";
                echo "<td>{$rows['uni_id']}</td>";
                echo "<td>{$rows['name']}</td>";
                echo "<td>{$rows['major']}</td>";
                echo "<td>{$rows['parent']}</td>";
                echo "<td>{$rows['secondary']}</td>";
            echo "</tr>";
            }
        echo "</table>";

?>
<!--  * 先列出開發流程 :
        1. 先想結果(最終呈現) : 畫面 / 功能 
        2. 先從簡單的開始 (做畫面)
        3. 思考在哪些區塊放入程式
            (會開始因為畫面跟功能的考量開始建資料庫建資料表) : phpMyAdmin
            (連線資料庫) : PDO
            (取得資料) : PDO
            (處理資料) : foreach
            (顯示資料) : 資料列表
-->

<!-- 
        描述 溝通 事情 動作 細節 對象

        前端USER看到的結果 :
        動作        對象        產出
        按下        新增        空白表單
        輸入        欄位        資料
        按下        執行        產出列表畫面
        回到        瀏覽        新的資料在列表中

        後端實際執行 :
        按下執行 ==> 新的資料在列表中
        動作        對象        產出
        按下送出 ==> 資料 ==> 後台程式 ==> 產出SQL語法 ==> PDO ==> 送入 ==> 導向 ==> 回到新的資料在列表中

-->

<!-- 
        1.空白表單
            (輸入用)
            (欄位)

        2.送出
            (GET)
            (POST)

        3.接收
            ($_GET)
            ($_POST)

        4.產生SQL語法
            (insert)新增資料

        5.pdo query (SQL)
            (執行寫入)
 -->
    
</body>
</html>