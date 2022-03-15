<?php
date_default_timezone_set("Asia/Taipei");
session_start();
class DB{
 private $dsn="mysql:host=localhost;charset=utf8;dbname=db43";
 private $root="root";
 private $pw="";
 private $pdo;
 public $table="";
public $title="";
public $header="";
public $append="";
public $button="";
public $upload="";
public function __construct($table){
    $this->table=$table;
    $this->pdo=new PDO($this->dsn,$this->root,$this->pw);
    $this->setStr($table);
}
private function setStr($table){
    switch($table){
        case "menu":
            $this->title="";
            $this->header="";
            $this->append="";
            $this->button="";
            $this->upload="";
            break;
        case "total":
            $this->title="";
            $this->header="";
            $this->append="";
            $this->button="";
            $this->upload="";
            break;
        case "title":
            $this->title="";
            $this->header="";
            $this->append="";
            $this->button="";
            $this->upload="";
            break;
        case "ad":
            $this->title="";
            $this->header="";
            $this->append="";
            $this->button="";
            $this->upload="";
            break;
        case "image":
            $this->title="";
            $this->header="";
            $this->append="";
            $this->button="";
            $this->upload="";
            break;
        case "news":
            $this->title="";
            $this->header="";
            $this->append="";
            $this->button="";
            $this->upload="";
            break;
        case "bottom":
            $this->title="";
            $this->header="";
            $this->append="";
            $this->button="";
            $this->upload="";
            break;
        case "admin":
            $this->title="";
            $this->header="";
            $this->append="";
            $this->button="";
            $this->upload="";
            break;
        case "mvim":
            $this->title="";
            $this->header="";
            $this->append="";
            $this->button="";
            $this->upload="";
            break;
        default:
            $this->title="";
            $this->header="";
            $this->append="";
            $this->button="";
            $this->upload="";
            break;
    }
}
private function jon($arg){
    $sql="";
    if(is_array($arg)){
foreach($arg as $k=>$v){
$tmp[]="`$k`='$v'";
}
$sql.="where ".join(" and ",$tmp);
    }else{
$sql.="where `id`='$arg'";
    }
    return $sql;
}
private function chk($arg){
    $sql="";
    if(!empty($arg[0])){
        if(is_array($arg[0])){
$sql.=$this->jon($arg[0]);
        }else{
$sql.=$arg;
        }
    }
    if(!empty($arg[1])){
        $sql.=" ".$arg;
    }
    return $sql;
}
public function all(...$arg){
    $sql="select * from $this->table ";
    $sql.=$this->chk($arg);
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
public function math($math,$col,...$arg){
    $sql="select $math($col) from $this->table ";
    $sql.=$this->chk($arg);
    return $this->pdo->query($sql)->fetchColumn();
}
public function find($arg){
    $sql="select * from $this->table ";
    $sql.=$this->jon($arg);
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}
public function del($arg){
    $sql="delete from $this->table ";
    $sql.=$this->jon($arg);
    return $this->pdo->exec($sql);
}
public function q($arg){
    return $this->pdo->query($arg)->fetchAll(PDO::FETCH_ASSOC);
}
public function save($arg){
    $sql="";
    if(!empty($arg['id'])){
        foreach($arg as $k=>$v){
            if($k!="id")
            $tmp[]="`$k`='$v'";
            }
        $sql.=sprintf("update %s set %s where `id`='%s'",$this->table,join(",",$tmp),$arg['id']);
    }else{
        $sql.=sprintf("insert into %s (`%s`) values('%s')",$this->table,join("`,`",array_keys($arg)),join("','",$arg));
    }
    return $this->pdo->exec($sql);
}
}
 function dd($arg){
     echo "<pre>";
     print_r($arg);
     echo "</pre>";
 }
 function to($arg){
     header("location:".$arg);
 }
//  web01
// $Admin=new DB("admin");
// $Mvim=new DB('mvim');
// $Menu=new DB('menu');
// $Total=new DB('total');
// $Title=new DB('title');
// $Image=new DB('image');
// $Ad=new DB('ad');
// $News=new DB('news');
// $Bottom=new DB('bottom');
// echo $Admin->save(['acc'=>'test3']);
// dd($Admin->all());
// $id=$Admin->math('max','id');
// echo $Admin->save(['id'=>$id,'acc'=>'test9']);
// dd($Admin->find(['id'=>$id,'acc'=>'test9']));
// echo $Admin->del($id);
// dd($Admin->q("select * from admin"));

// web02
// $User=new DB("user");
// $View=new DB("view");
// $News=new DB("news");
// $Que=new DB("que");
// $Log=new DB("log");

// 
$Admin=new DB("admin");
$Mem=new DB("mem");
$Ord=new DB("ord");
$Type=new DB("type");
$Goods=new DB("goods");
$Bottom=new DB("bottom");
/*
$all=$News->all('count','*');
$div=5;
$pages=ceil($all/$div);
$now=$_GET('p')??1;
$start=($now-1)*$div;
$rows=$News->all(['sh'=>1]," limit $start,$div");
foreach($rows as $k=>$row){
    $checked=($row['sh']==1)?"checked":"";
}
if(($now-1)>0){
    $pre=$now-1;
    echo "<a href='?do=news&p=$pre'> &lt; </a>";
}
for($i=1;$i<=$pages;$i++){
    $s=($i==$now)?"24px":"16px";
    echo "<a href='?do=news&p=$i' style='font-size:$s'> $i </a>";
}
if(($now+1)<=$pages){
    $next=$now+1;
    echo "<a href='?do=news&p=$next'> &gt; </a>";
}

if(!isset($_SESSION['view'])){
    $view=$View->find(['date'=>date('Y-m-d')]);
    if($view){
        $view['total']++;
        $View->save($view);
        $_SESSION['total']=$view['total'];
    }else{
        $View->save(['date'=>date('Y-m-d'),'total'=>1]);
        $_SESSION['total']=1;
    }
}

$do=$_GET['do']??'main';
$file='front/'.$do.'.php';
if(file_exists($file)){
    include $file;
}else{
    include "front/main.php";
}
*/
// echo "aaaa";
// echo $Admin->save(['acc'=>'admin','pw'=>'1234', 'pr'=>serialize([1,2,3,4,5])]);
// echo $Admin->save(['acc'=>'test','pw'=>'5678',  'pr'=>serialize([1,2,3,4,5])]);
// echo $Admin->save(['acc'=>'mem01','pw'=>'mem01','pr'=>serialize([1,2,3,4,5])]);
// echo $Admin->save(['acc'=>'mem02','pw'=>'mem02','pr'=>serialize([1,2,3,4,5])]);
