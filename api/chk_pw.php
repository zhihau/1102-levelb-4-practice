<?php
include_once "../base.php";

$DB=new DB($_GET['table']);
$chk=$DB->math('count','*',$_POST);

if($chk>0){
    echo 1;
    if($_GET['table']=="admin"){
        $_SESSION['pr']=unserialize($Admin->find($_POST)['pr']);
    }else  if($_GET['table']=="mem"){
       
    }
    $_SESSION[$_GET['table']]=$_POST['acc'];
    
    
    // dd( $_SESSION['mem']);
}else{
    echo 0;
}