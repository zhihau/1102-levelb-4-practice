<h1 class="ct">訂單管理</h1>

<table>
    <tr class="tt">
        <td>訂單編號</td>
        <td>金額</td>
        <td>會員帳號</td>
        <td>姓名</td>
        <td>下單時間</td>
        <td>操作</td>
    </tr>
    <?php
$rs=$Ord->all();
foreach($rs as $r){
    ?>
    <tr class="pp">
        <td><a href="?do=detail&id=<?=$r['id'];?>"><?=$r['no'];?></a></td>
        <td><?=$r['total'];?></td>
        <td><?=$r['acc'];?></td>
        <td><?=$r['name'];?></td>
        <td><?=date('Y/m/d',strtotime($r['orddate']));?></td>
        <td>
            <button onclick="del('ord',<?=$r['id'];?>);">刪除</button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<script>
        function del(table,id){
	$.post('api/del.php',{table,id},function(){
		location.reload();
	})
}
    </script>