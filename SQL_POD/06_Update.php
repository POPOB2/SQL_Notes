<?php

$dsn = "mysql:host=localhost;charset=utf8;dbname=school";
$pdo = new PDO($dsn,'root','');

//設定uni_id為POST帶來的uni_id內容 ,以此類推
$sql = "UPDATE `students` SET 
             `uni_id`='{$_POST['uni_id']}',
             `seat_num`='{$_POST['seat_num']}',
             `name`='{$_POST['name']}',
             `birthday`='{$_POST['birthday']}',
             `national_id`='{$_POST['national_id']}',
             `address`='{$_POST['address']}',
             `parent`='{$_POST['parent']}',
             `telphone`='{$_POST['telphone']}',
             `major`='{$_POST['major']}',
             `secondary`='{$_POST['secondary']}'

      WHERE `id`='{$_POST['id']}' ";
//把POST裡面的id 作為條件

echo $sql;
$pdo->exec($sql);//節省伺服器傳資料的負擔 僅傳true / flase
header("location:02_CRUD.php");//更新完不會停留在update頁面 導回首頁02_CRUD.php
?>