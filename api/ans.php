<?php
include_once "../base.php";

// echo $_SESSION['ans'];
// echo $_POST['ans']; 
if($_SESSION['ans']==$_POST['ans']){
    echo 1;
}else{
    echo 0;
}