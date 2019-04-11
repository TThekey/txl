<?php
require('library/Db.class.php');//连接数据库
$name  = $_POST['name'];
$mail  = $_POST['mail'];
$phone  = $_POST['phone'];
$sex  = $_POST['sex'];

$sql = "update txl set mail=:mail,phone=:phone,sex=:sex where name=:name";
$db = new DB();
$edit = $db->query($sql,array("name"=>$name,"mail"=>$mail,"phone"=>$phone,"sex"=>$sex));
if($edit){
    echo 1 ;
}else{
    echo -1;
}