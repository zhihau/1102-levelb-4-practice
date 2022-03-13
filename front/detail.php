<?php
$row=$Goods->find($_GET['id']);
$big=$Type->find(['id'=>$row['big']])['name'];
$mid=$Type->find(['id'=>$row['mid']])['name'];
?>
<h1 class="ct"><?=$row['name'];?></h1>

<div style="display:flex">
    <div class="pp" style="width:50%">
        <img src="../img/<?=$row['img'];?>" style="width:200px;height:180px ">
    </div>
    <div class="pp" style="width:50%">
<div>分類：<?=$big.">".$mid;?></div>
<div>編號：<?=$row['no'];?></div>
<div>價格：<?=$row['price'];?></div>
<div>詳細說明：<?=$row['intro'];?></div>
<div>庫存：<?=$row['stock'];?></div>
    </div>
</div>
<div class="ct tt">購買數量：<input type="number" id="qt" value="1">
<a href="#" onclick="buy(<?=$row['id']?>)"><img src="../icon/0402.jpg" alt=""></a>
</div>
<div class="ct"><button onclick="location.href='?do=main&big=<?=$row['big'];?>&mid=<?=$row['mid'];?>'">返回</button></div>

<script>

    function buy(id){
location.href="?do=buycart&id="+id+"&qt="+$('#qt').val();
    }
</script>