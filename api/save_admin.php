<?php
include_once "../base.php";

if($_SESSION['admin']==$_POST['acc']){
$_SESSION['pr']=$_POST['pr'];
}
$_POST['pr']=serialize($_POST['pr']);
$chk=$Admin->save($_POST);
// if($chk>0){
//     echo 1;
// }else{
//     echo 0;
// }
to('../back.php?do=admin');