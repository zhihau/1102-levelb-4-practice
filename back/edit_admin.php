<h1 class="ct">修改管理帳號</h1>
<?php
$r=$Admin->find($_GET['id']);
$pr=unserialize($r['pr']);
?>
<form action="api/add_admin.php" method="post">
    <table>
        <tr>
            <td class="tt">帳號</td>
            <td class="pp"><input type="text" name="acc" value="<?=$r['acc'];?>"></td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp"><input type="password" name="pw" value="<?=$r['pw'];?>"></td>
        </tr>
        <tr>
            <td class="tt">權限</td>
            <td class="pp">
    <div><input type="checkbox" name="pr[]" value="1" <?=in_array(1,$pr)?"checked":"";?>>商品分類與管理</div>
    <div><input type="checkbox" name="pr[]" value="2" <?=in_array(2,$pr)?"checked":"";?>>訂單管理</div>
    <div><input type="checkbox" name="pr[]" value="3" <?=in_array(3,$pr)?"checked":"";?>>會員管理</div>
    <div><input type="checkbox" name="pr[]" value="4" <?=in_array(4,$pr)?"checked":"";?>>頁尾版權區管理</div>
    <div><input type="checkbox" name="pr[]" value="5" <?=in_array(5,$pr)?"checked":"";?>>最新消息管理</div>
            </td>
        </tr>
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    </table>
    <div class="ct">
        <input type="submit" value="修改"><input type="reset" value="重置">
    </div>
</form>