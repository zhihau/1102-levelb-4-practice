<style>
    .all td{
	min-width:15px;
	padding:10px;
}
</style>
<?php
// unset($_SESSION['cart']);
// dd(count($_SESSION['cart']));
if(!empty($_GET['id'])){
    if(isset($_SESSION['cart'][$_GET['id']])){
        $_SESSION['cart'][$_GET['id']]+=$_GET['qt'];
    }else{
    
        $_SESSION['cart'][$_GET['id']]=$_GET['qt'];
    }
}else if(!isset($_SESSION['cart'])||empty($_SESSION['cart'])){
    echo "<h1 class='ct'>請選擇商品</h1>";
    exit();
}


if(!isset($_SESSION['mem'])){
    to('?do=login');
    
}


// dd($_SESSION['cart']);
?>
<h1 class="ct"><?=$_SESSION['mem'];?>的購物車</h1>


<table class="all">
    <tr class="tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>
        <td>刪除</td>
    </tr>
    <?php
    // dd($_SESSION['cart']);
foreach($_SESSION['cart'] as $id=>$qt){
    $row=$Goods->find(['id'=>$id]);
    // echo "aa";
    // dd($row);
    // echo "bb";
    ?>
    <tr class="pp">
        <td><?=$row['no'];?></td>
        <td><?=$row['name'];?></td>
        <td><?=$qt;?></td>
        <td><?=$row['stock'];?></td>
        <td><?=$row['price'];?></td>
        <td><?=$row['price']*$qt;?></td>
        <td><a href="#" onclick="del_cart(<?=$id?>)"><img src="../icon/0415.jpg" alt=""></a></td>
    </tr>
    <?php

}
?>
</table>
<div class="ct">
    <a href="?do=main"><img src="../icon/0411.jpg" alt=""></a>
    <a href="?do=check"><img src="../icon/0412.jpg" alt=""></a>
</div>
<script>
    function del_cart(id){
        $.post('api/del_cart.php',{id},function(){
            location.reload();
        })
    }
</script>