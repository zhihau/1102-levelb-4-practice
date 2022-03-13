<h1 class="ct">修改管理帳號</h1>
<?php
$row=$Admin->find($_GET['id']);
$pr=unserialize($row['pr']);

?>
<form action="api/save_admin.php" method="post">
    <table class="all">
        <tr>
            <td class="tt">帳號</td>
            <td class="pp"><input type="text" name="acc" value="<?=$row['acc'];?>"></td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp"><input type="text" name="pw" value="<?=$row['pw'];?>"></td>
        </tr>
        <tr>
            <td class="tt">權限</td>
            <td class="pp">
                <input type="checkbox" name="pr[]" value="1" <?=in_array(1,$pr)?"checked":"";?>>商品分類與管理
                <input type="checkbox" name="pr[]" value="2" <?=in_array(2,$pr)?"checked":"";?>>訂單管理
                <input type="checkbox" name="pr[]" value="3" <?=in_array(3,$pr)?"checked":"";?>>會員管理
                <input type="checkbox" name="pr[]" value="4" <?=in_array(4,$pr)?"checked":"";?>>頁尾版權區管理
                <input type="checkbox" name="pr[]" value="5" <?=in_array(5,$pr)?"checked":"";?>>最新消息管理
            </td>
        </tr>
        <input type="hidden" name="id" value="<?=$row['id'];?>">
    </table>
    <div class="ct">
        <input type="submit" value="修改"><input type="reset" value="重置">
    
    </div>
</form>