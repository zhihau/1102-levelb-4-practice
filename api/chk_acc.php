<?php
include_once "../base.php";

$DB=new DB($_GET['table']);

// dd($_POST);
$chk=$DB->math('count','*',$_POST);
if($chk>0){

    echo 1;
}else{
    echo 0;
}