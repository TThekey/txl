<?php
require('library/Db.class.php');//连接数据库
$name  = $_POST['name'];
$mail  = $_POST['mail'];
$phone  = $_POST['phone'];
$sex  = $_POST['sex'];

$sql = "insert into txl (name,mail,phone,sex) VALUE (:name,:mail,:phone,:sex)";
$db = new DB();
$add = $db->query($sql,array("name"=>$name,"mail"=>$mail,"phone"=>$phone,"sex"=>$sex));
if($add){
    echo 1 ;
}else{
    echo -1;
}