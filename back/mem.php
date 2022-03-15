<h1 class="ct">會員管理</h1>

    <table>
        <tr class="tt">
            <td>姓名</td>
            <td>會員帳號</td>
            <td>註冊日期</td>
            <td>操作</td>
        </tr>
        <?php
        $rs=$Mem->all();
        foreach($rs as $r){
        ?>
        <tr class="pp">
            <td>
                <?=$r['name'];?>
            </td>
            <td>
                <?=$r['acc'];?>
            </td>
            <td>
                <?=date('Y/m/d',strtotime($r['regdate']));?>
            </td>
            <td>
                    <button onclick="location.href='?do=edit_mem&id=<?=$r['id'];?>'">修改</button>
                    <button onclick="del('mem',<?=$r['id'];?>);">刪除</button>
                   
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