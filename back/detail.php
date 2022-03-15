<?php
$o=$Ord->find($_GET['id']);
?>

<h1 class="ct">訂單編號<span style="color:red"><?=$o['no'];?></span>的詳細資料</h1>

<table>
    <tr>
        <td class="tt">會員帳號</td>
        <td class="pp"><?=$o['acc'];?></td>
    </tr>
    <tr>
        <td class="tt">姓名</td>
        <td class="pp"><?=$o['name'];?></td>
    </tr>
    <tr>
        <td class="tt">電子信箱</td>
        <td class="pp"><?=$o['email'];?></td>
    </tr>
    <tr>
        <td class="tt">聯絡地址</td>
        <td class="pp"><?=$o['addr'];?></td>
    </tr>
    <tr>
        <td class="tt">連絡電話</td>
        <td class="pp"><?=$o['tel'];?></td>
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
    $goods=unserialize($o['goods']);
foreach($goods as $id=>$qt){
    $g=$Goods->find($id);

    ?>
    <tr class="pp">
        <td><?=$g['name'];?></td>
        <td><?=$g['no'];?></td>
        <td><?=$qt;?></td>
        <td><?=$g['price'];?></td>
        <td>
            <?php

            $total+=$g['price']*$qt;
            echo $g['price']*$qt?>
        </td>
    </tr>
    <?php

}
?>
</table>
<table>
    <tr class="tt">
        <td>總價：<?=$total;?></td>
    </tr>
</table>