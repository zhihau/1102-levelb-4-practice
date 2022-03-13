<h1 class="ct">填寫資料</h1>
<?php

$row=$Mem->find(['acc'=>$_SESSION['mem']]);
?>


    <table class="all">
    <tr>
            <td class="tt">登入帳號</td>
            <td class="pp"><?=$_SESSION['mem'];?></td>
        </tr>
        <tr>
            <td class="tt">姓名</td>
            <td class="pp"><input type="text" id="name" value="<?=$row['name'];?>"></td>
        </tr>
        <tr>
            <td class="tt">電子信箱</td>
            <td class="pp"><input type="text" id="email" value="<?=$row['email'];?>"></td>
        </tr>
        <tr>
            <td class="tt">聯絡地址</td>
            <td class="pp"><input type="text" id="addr" value="<?=$row['addr'];?>"></td>
        </tr>
        <tr>
            <td class="tt">連絡電話</td>
            <td class="pp"><input type="text" id="tel" value="<?=$row['tel'];?>"></td>
        </tr>
        
    </table>
    <table>
        <tr class="tt">
            <td>商品名稱</td>
            <td>編號</td>
            <td>數量</td>
            <td>單價</td>
            <td>小計</td>
        </tr>
        <?php
        $total=0;
    foreach($_SESSION['cart'] as $id=>$qt){
    $g=$Goods->find($id);
        ?>
        <tr class="pp">
            <td><?=$g['name'];?></td>
            <td><?=$g['no'];?></td>
            <td><?=$qt;?></td>
            <td><?=$g['price'];?></td>
            <td><?php
            $total+=$qt*$g['price'];
            echo $qt*$g['price'];
            ?></td>
        </tr>
        <?php
    
    }
    ?>
    </table>
    <table>
        
        <tr class="ct tt"><td>總價:<span id="total"><?=$total;?></span></td></tr>
    </table>
    <div class="ct">
        <input type="button"onclick="checkout()" value="確定送出">
    <button onclick="location.href='?do=buycart'">返回修改訂單</button></div>


<script>
    function checkout(){
        let ord={
            name:$('#name').val(),
            email:$('#email').val(),
            addr:$('#addr').val(),
            tel:$('#tel').val(),
            total:$('#total').text(),
        }
        console.log(ord)
        $.post('api/checkout.php',ord,function(){
           
alert('訂購成功\n感謝您的選購');
location.href='index.php';

        })
    }
</script>