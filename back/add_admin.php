<h1 class="ct">新增管理帳號</h1>

<form action="api/save_admin.php" method="post">
    <table class="all">
        <tr>
            <td class="tt">帳號</td>
            <td class="pp"><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp"><input type="text" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="tt">權限</td>
            <td class="pp">
                <input type="checkbox" name="pr[]" value="1">商品分類與管理
                <input type="checkbox" name="pr[]" value="2">訂單管理
                <input type="checkbox" name="pr[]" value="3">會員管理
                <input type="checkbox" name="pr[]" value="4">頁尾版權區管理
                <input type="checkbox" name="pr[]" value="5">最新消息管理
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增"><input type="reset" value="重置">
    
    </div>
</form>