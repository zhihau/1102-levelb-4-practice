<?php
include_once "../base.php";


if($_SESSION['admin']==$_POST['acc']){
    $_SESSION['pr']=$_POST['pr'];
}

$_POST['pr']=serialize($_POST['pr']);
$Admin->save($_POST);

to('../back.php?do=admin');

