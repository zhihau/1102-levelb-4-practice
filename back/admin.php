<div class="ct">
    <button onclick="location.href='?do=add_admin'">新增管理員</button></div>


    <table>
        <tr class="tt">
            <td>帳號</td>
            <td>密碼</td>
            <td>管理</td>
        </tr>
        <?php
        $rs=$Admin->all();
        foreach($rs as $r){
        ?>
        <tr class="pp">
            <td>
                <?=$r['acc'];?>
            </td>
            <td>
            <?=str_repeat("*",mb_strlen($r['pw']));?>
            </td>
            <td>
                <?php
                if($r['acc']=='admin'){
                    echo "此帳號為最高權限";
                }else{
                    ?>
                    <button onclick="location.href='?do=edit_admin&id=<?=$r['id'];?>'">修改</button>
                    <button onclick="del('admin',<?=$r['id'];?>);">刪除</button>
                    <?php
                }
                ?>
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