<h1 class="ct">編輯會員資料</h1>
<?php
$r=$Mem->find($_GET['id']);
?>
<form action="api/add_mem.php" method="post">
    <table>
        <tr>
            <td class="tt">帳號</td>
            <td class="pp"><?=$r['acc'];?></td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp"><?=str_repeat('*',mb_strlen($r['pw']));?></td>
        </tr>
        <tr>
            <td class="tt">累積交易額</td>
            <td class="pp"><?=$r['total'];?></td>
        </tr>
        <tr>
            <td class="tt">姓名</td>
            <td class="pp"><input type="text" name="name" value="<?=$r['name'];?>"></td>
        </tr>
        <tr>
            <td class="tt">電子信箱</td>
            <td class="pp"><input type="text" name="email" value="<?=$r['email'];?>"></td>
        </tr>
        <tr>
            <td class="tt">地址</td>
            <td class="pp"><input type="text" name="addr" value="<?=$r['addr'];?>"></td>
        </tr>
        <tr>
            <td class="tt">電話</td>
            <td class="pp"><input type="text" name="tel" value="<?=$r['tel'];?>"></td>
        </tr>
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    </table>
    <div class="ct">
        <input type="submit" value="修改">
        <input type="reset" value="重置">
        <input type="button" value="取消" onclick="location.href='?do=mem'">
    </div>
</form>