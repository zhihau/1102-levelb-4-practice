<h1 class="ct">編輯會員資料</h1>
<?php
$row=$Mem->find($_GET['id']);
?>
<form action="api/save.php?table=mem" method="post">
    <table class="all">
        <tr>
            <td class="tt">帳號</td>
            <td class="pp"><?=$row['acc'];?></td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp"><?=$row['pw'];?></td>
        </tr>
        <tr>
            <td class="tt">累積交易額</td>
            <td class="pp"><?=$row['total'];?></td>
        </tr>
        <tr>
            <td class="tt">姓名</td>
            <td class="pp"><input type="text" name="name" value="<?=$row['name'];?>"></td>
        </tr>
        <tr>
            <td class="tt">電子信箱</td>
            <td class="pp"><input type="text" name="email" value="<?=$row['email'];?>"></td>
        </tr>
        <tr>
            <td class="tt">地址</td>
            <td class="pp"><input type="text" name="addr" value="<?=$row['addr'];?>"></td>
        </tr>
        <tr>
            <td class="tt">電話</td>
            <td class="pp"><input type="text" name="tel" value="<?=$row['tel'];?>"></td>
        </tr>
        <input type="hidden" name="id" value="<?=$row['id'];?>">
    </table>
    <div class="ct">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
        <input type="button" onclick="location.href='?do=mem'" value="取消">
    </div>
</form>