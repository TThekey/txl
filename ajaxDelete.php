<?php
require('library/Db.class.php');//连接数据库
$name  = $_POST['name'];

$sql = "delete from txl where name=:name";
$db = new DB();
$delete = $db->query($sql,array("name"=>$name));
if($delete){
    echo 1 ;
}else{
    echo -1;
}