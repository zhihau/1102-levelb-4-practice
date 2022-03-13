<?php
include_once "../base.php";
$DB=new DB($_GET['table']);
$chk=$DB->save($_POST);
// if($chk>0){
//     echo 1;
// }else{
//     echo 0;
// }
to('../back.php?do='.$_GET['table']);