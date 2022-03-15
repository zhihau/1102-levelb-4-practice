<?php
include_once "../base.php";

if($_SESSION['mem']){
    unset($_SESSION['mem']);
}
if($_SESSION['admin']){
    unset($_SESSION['admin']);
}
if($_SESSION['pr']){
    unset($_SESSION['pr']);
}

to('../index.php');