
<?php
if(isset($_POST['bottom'])){
    $bot=$Bottom->find(1);
    $bot['bottom']=$_POST['bottom'];
    $Bottom->save($bot);
}
?>
<h1 class="ct">編輯頁尾版權區</h1>


<form action="?do=bot" method="post">
    <table class="all">
        <tr>
            <td class="tt">頁尾宣告內容</td>
            <td class="pp"><input type="tel" name="bottom" value="<?=$Bottom->find(1)['bottom'];?>"></td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="編輯">
    <input type="reset" value="重置"></div>
</form>