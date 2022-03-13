<h1 class="ct">商品分類</h1>

<div class="ct">新增大分類<input type="text" name="big" id="big"><button onclick="add_type('big')">新增</button></div>
<div class="ct">新增中分類<select name="bigsel" id="bigsel"></select><input type="text" name="mid" id="mid"><button onclick="add_type('mid')">新增</button></div>

<table class="all">
    <?php
$rows=$Type->all(['parent'=>0]);
foreach($rows as $row){
    ?>
    <tr class="tt">
        <td><?=$row['name'];?></td>
        <td>
            <button onclick="edit_type(this,<?=$row['id'];?>)">修改</button>
            <button onclick="del('type',<?=$row['id'];?>)">刪除</button>
        </td>
    </tr>

    <?php
    $mids=$Type->all(['parent'=>$row['id']]);
    foreach($mids as $mid){
        ?>
        <tr class="pp">
            <td><?=$mid['name'];?></td>
            
            <td>
            <button onclick="edit_type(this,<?=$mid['id'];?>)">修改</button>
            <button onclick="del('type',<?=$mid['id'];?>)">刪除</button>
        </td>
            
        </tr>
        <?php
    }
}
?>
    
</table>

<h1 class="ct">商品管理</h1>
<div class="ct"><button onclick="location.href='?do=add_goods'">新增商品</button></div>
<table class="all">
    <tr class="tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?php
    $rows=$Goods->all();
    foreach($rows as $g){
    ?>
    <tr class="pp">
        <td><?=$g['no'];?></td>
        <td><?=$g['name'];?></td>
        <td><?=$g['stock'];?></td>
        <td><?=$g['sh']==1?"販售中":"已下架";?></td>
        <td>
            <button onclick="location.href='?do=edit_goods&id=<?=$g['id'];?>'">修改</button>
            <button onclick="del('goods',<?=$g['id'];?>)">刪除</button>
            <button onclick="show(1,<?=$g['id'];?>)">上架</button>
            <button onclick="show(0,<?=$g['id'];?>)">下架</button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>

<script>
    $('#bigsel').load('api/gettype.php',{},function(){
        
    })
    function add_type(type){
        switch(type){
            case "big":
            name=$('#big').val();
            parent=0;
            break;
            case "mid":
                name=$('#mid').val();
                parent=$('#bigsel').val();
                
            break;
        }
        $.post('api/save_type.php',{name,parent},function(){
         location.reload();
     })
    }
    function edit_type(dom,id){
     name=prompt("分類名稱為",$(dom).parent('td').prev().text());
     $.post('api/save_type.php',{id,name},function(){
         location.reload();
     })
    }
function del(table, id) {
    $.post('api/del.php', {
        table,
        id
    }, function() {
        location.reload();
    })
}
function show(sh,id){
    $.post('api/save_goods.php',{sh,id},function(){
location.reload();
    });
}
</script>