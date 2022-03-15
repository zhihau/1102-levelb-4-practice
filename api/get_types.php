<?php
include_once "../base.php";



//    get bigs
  $rs=$Type->all(['parent'=>$_GET['parent']]);
  foreach($rs as $r){
      echo "<option value='{$r['id']}'>{$r['name']}</option>";
  }
