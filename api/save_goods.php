<?php
include_once "../base.php";

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}
$_POST['no']=rand(100000,999999);
$chk=$Goods->save($_POST);
// if($chk>0){
//     echo 1;
// }else{
//     echo 0;
// }
to('../back.php?do=th');