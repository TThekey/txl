<?php
require('library/Db.class.php');//连接数据库
$db = new DB();
$name  = $_POST['name'];
$mail  = $_POST['mail'];
$phone  = $_POST['phone'];
$sex  = $_POST['sex'];
$condition = $_POST['condition'];

switch ($condition){
    case 1: $sql = "select * from txl";
            break;
    case 2: $sql = "select * from txl where name=:name";
            $res = $db->query($sql,array("name"=>$name));
            break;
    case 3: $sql = "select * from txl";
        break;
    case 4: $sql = "select * from txl";
        break;
    case 5: $sql = "select * from txl";
        break;
}
 print_r($res);



