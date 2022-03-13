<?php

$row=$Ord->find($_GET['id']);
?>
<h1 class="ct">訂單編號<span style="color:red"><?=$row['no'];?></span>的詳細資料</h1>

<table class="all">
    <tr>
        <td class="tt">會員帳號</td>
        <td class="pp"><?=$row['acc'];?></td>
    </tr>
    <tr>
        <td class="tt">姓名</td>
        <td class="pp"><?=$row['name'];?></td>
    </tr>
    <tr>
        <td class="tt">電子信箱</td>
        <td class="pp"><?=$row['email'];?></td>
    </tr>
    <tr>
        <td class="tt">聯絡地址</td>
        <td class="pp"><?=$row['addr'];?></td>
    </tr>
    <tr>
        <td class="tt">連絡電話</td>
        <td class="pp"><?=$row['tel'];?></td>
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
    $goods=unserialize($row['goods']);
foreach($goods as $id=>$qt){    
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
    <tr class="ct tt"><td>總價:<?=$total;?></td></tr>
</table>
<div class="ct"><button onclick="location.href='?do=order'">返回</button></div>