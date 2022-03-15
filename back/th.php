<h1 class="ct">商品分類</h1>

<div>
    新增大分類<input type="text" name="big" id="big"><button onclick="add_type('big')">新增</button>
    新增中分類
    <select name="selbig" id="selbig"></select>
    <input type="text" name="mid" id="mid"><button onclick="add_type('mid')">新增</button>
</div>

<table>
    <?php
    $rs=$Type->all(['parent'=>0]);
    foreach($rs as $r){
    ?>
    <tr class="tt">
        <td><?=$r['name'];?></td>
        <td>
            <button onclick="edit_type(this,<?=$r['id'];?>)">修改</button>
            <button onclick="del('type',<?=$r['id'];?>);">刪除</button>
        </td>
    </tr>
    <?php
    $mids=$Type->all(['parent'=>$r['id']]);
    foreach($mids as $mid){
        ?>
        <tr class="pp">
        <td><?=$mid['name'];?></td>
        <td>
        <button onclick="edit_type(this,<?=$mid['id'];?>)">修改</button>
            <button onclick="del('type',<?=$mid['id'];?>);">刪除</button>

        </td>
    </tr>
        <?php
    }
}
?>
    
</table>

<h1 class="ct">商品管理</h1>

<button onclick="location.href='?do=add_goods'">新增商品</button>

<table>
    <tr class="tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?php
$rs=$Goods->all();
foreach($rs as $g){
    ?>
    <tr class="pp">
        <td><?=$g['no'];?></td>
        <td><?=$g['name'];?></td>
        <td><?=$g['stock'];?></td>
        <td><?=$g['sh']==1?"販售中":"已下架";?></td>
        <td>
            <button onclick="location.href='?do=edit_goods&id=<?=$g['id'];?>'">修改</button>
            <button onclick="del('goods',<?=$g['id'];?>);">刪除</button>
            <button onclick="show(1,<?=$g['id'];?>)">上架</button>
            <button onclick="show(0,<?=$g['id'];?>)">下架</button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>

<script>
    function show(sh,id){
        $.post('api/edit_goods.php',{id,sh},function(){
            location.reload()
        })
    }
    $('#selbig').load('api/get_types.php?parent=0',{},function(){

    })
        function del(table,id){
	$.post('api/del.php',{table,id},function(){
		location.reload();
	})
}
function edit_type(dom,id){
    name=prompt('請修改分類名稱',$(dom).parent('td').prev().text())
    $.post('api/edit_type.php',{id,name},function(){
        location.reload();
    })
}
function add_type(type){
    switch(type){
        case 'big':
            var data={
                parent:0,
                name:$('#big').val()
            }
            break;
        case 'mid':
            var data={
                parent:$('#selbig').val(),
                name:$('#mid').val()
            }
            break;
    }
    $.post('api/edit_type.php',data,function(){
        location.reload();
    })

}
    </script>