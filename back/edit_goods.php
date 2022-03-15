<h1 class="ct">新增商品</h1>
<?php
$g=$Goods->find($_GET['id']);
?>
<form action="api/add_goods.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td class="tt">所屬大分類</td>
            <td class="pp">
                <select name="big" id="big">

                </select>
            </td>
        </tr>
        <tr>
            <td class="tt">所屬中分類</td>
            <td class="pp">
            <select name="mid" id="mid">
                    
                    </select>
    
            </td>
        </tr>
        <tr>
            <td class="tt">商品編號</td>
            <td class="pp"><?=$g['no'];?></td>
        </tr>
        <tr>
            <td class="tt">商品名稱</td>
            <td class="pp"><input type="text" name="name" value="<?=$g['name'];?>"></td>
        </tr>
        <tr>
            <td class="tt">商品價格</td>
            <td class="pp"><input type="number" name="price" value="<?=$g['price'];?>"></td>
        </tr>
        <tr>
            <td class="tt">規格</td>
            <td class="pp"><input type="tel" name="spec" value="<?=$g['spec'];?>"></td>
        </tr>
        <tr>
            <td class="tt">庫存量</td>
            <td class="pp"><input type="number" name="stock" value="<?=$g['stock'];?>"></td>
        </tr>
        <tr>
            <td class="tt">商品圖片</td>
            <td class="pp"><input type="file" name="img" id=""></td>
        </tr>
        <tr>
            <td class="tt">商品介紹</td>
            <td class="pp"><textarea name="intro" id="" cols="30" rows="10"><?=$g['intro'];?></textarea></td>
        </tr>
        <input type="hidden" name="id" value="<?=$g['id'];?>">
    </table>
    <div class="ct">
        <input type="submit" value="修改">
        <input type="reset" value="重置"><input type="button" value="返回" onclick="location.href='?do=goods'">
    </div>
</form>

<script>
$('#big').load('api/get_types.php?parent=0',{},function(){
    $("#big option[value='<?=$g['big'];?>']").prop('selected',true);
    $('#mid').load('api/get_types.php?parent='+$(this).val(),{},function(){
        $("#mid option[value='<?=$g['mid'];?>']").prop('selected',true);
    })
})
$('#big').on('change',function(){
    bigid=$(this).val();
    $('#mid').load('api/get_types.php?parent='+bigid,{},function(){

})
})
</script>