<meta charset="utf-8">
<form action="riin.php" method="post" enctype="multipart/form-data"
    <table>
        <tr>
            <p>上传头像<input type="file" name="filename"/></p>
        </tr>
        <tr>
            <p>昵称<input type="text" name="ni"/></p>
        </tr>
        <tr>
            <p>个人签名<textarea rows="5" cols="10" name="my"></textarea></p>
        </tr>
        <tr>
            <p>是否显示<input type="radio" name="xian" value="1"/>是
                <input type="radio" name="xian" value="0"/>否</p>
        </tr>
        <tr>
            <p><input type="submit" value="提交资料"/></p>
        </tr>
    </table>
</form>