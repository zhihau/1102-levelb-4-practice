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
        <td class="tt">驗證碼</td>
        <td class="pp">
            <?php
$a=rand(10,99);
$b=rand(10,99);
$ans=$a+$b;
$_SESSION['ans']=$ans;
echo $a."+".$b."=";
            ?>
            <input type="text" name="ans" id="ans">
        </td>
    </tr>
</table>
<div class="ct"><button onclick="login()">確認</button></div>

<script>
function login() {
    let user = {
        acc: $('#acc').val(),
        pw: $('#pw').val(),
        ans: $('#ans').val(),
    }
    console.log(user);
    $.post('api/ans.php', {
        ans: user.ans
    }, function(chk) {
        if (parseInt(chk) == 0) {
            alert("對不起，您輸入的驗證碼有誤\n請您重新輸入");
        } else {
            delete user.ans;
            $.post('api/chk_pw.php?table=admin', user, function(chk) {
                if (parseInt(chk) == 0) {
                    alert("帳號或密碼錯誤");
                } else {
                    alert("登入成功");
                    

                        location.href = "back.php"
                    

                }
            })
        }
    })
}
</script>