<?php
if(!empty($_POST['bottom'])){
    $b=$Bottom->find(1);
    $b['bottom']=$_POST['bottom'];
    $Bottom->save($b);
}
?>
<h1 class="ct">編輯頁尾版權區</h1>

<form action="?do=bot" method="post">
    <table class="all">
        <tr>
            <td class="tt">頁尾宣告內容</td>
            <td class="pp"><input type="text" name="bottom" value="<?=$Bottom->find(1)['bottom'];?>"></td>
        </tr>
        <input type="hidden" name="id" value="1">
    </table>
    <div class="ct">
        <input type="submit" value="編輯"><input type="reset" value="重置">
    </div>
</form>