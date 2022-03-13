<?php
include_once "../base.php";
dd($_POST);
$_POST['goods']=serialize($_SESSION['cart']);
$_POST['no']=date('Ymd').rand(10000,999999);
$_POST['acc']=$_SESSION['mem'];

$chk=$Ord->save($_POST);
// echo $chk;
unset($_SESSION['cart']);
// if($chk>0){
//     echo 1;
// }else{
//     echo 0;
// }
