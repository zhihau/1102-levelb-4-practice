<?php
$type=(!empty($_GET['type']))?$_GET['type']:0;
if(empty($type)){
    $rows=$Goods->all(['sh'=>1]);
    $nav='全部商品';
}else{
    $tt=$Type->find($type);
    if($tt['parent']==0){
        $rows=$Goods->all(['sh'=>1,'big'=>$type]);
        $nav=$tt['name'];
    }else{
        $rows=$Goods->all(['sh'=>1,'mid'=>$type]);
        $bb=$Type->find($tt['parent']);
        $nav=$bb['name'].">".$tt['name'];
    }
}
echo "<h1>$nav</h1>";
foreach($rows as $row){
?>
<div style="display:flex">
    <div class="pp" style="width:50%">
        <a href="?do=detail&id=<?=$row['id'];?>"><img src="../img/<?=$row['img'];?>" style="width:200px;height:180px "></a>
    </div>
    <div class="pp" style="width:50%">
<div class="tt"><?=$row['name'];?></div>
<div>價格：<?=$row['price'];?><a href="?do=buycart&id=<?=$row['id']?>&qt=1"><img src="../icon/0402.jpg" alt=""></a></div>
<div>規格：<?=$row['spec'];?></div>
<div>簡介：<?=$row['intro'];?></div>
    </div>
</div>
<?php
}
?>