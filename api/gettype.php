<?php
include_once "../base.php";

if(!isset($_POST['parent'])){
    $_POST['parent']=0;
}
$chk=$Type->all(['parent'=>$_POST['parent']]);
foreach($chk as $row){
    echo "<option value='{$row['id']}'>{$row['name']}</option>";
}
// if($chk>0){
//     echo 1;
// }else{
//     echo 0;
// }
