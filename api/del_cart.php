<?php
include_once "../base.php";
// dd($_SESSION['cart']);
unset($_SESSION['cart'][$_POST['id']]);
// dd($_SESSION['cart']);