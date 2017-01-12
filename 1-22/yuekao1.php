<meta charset="utf-8">
<form action="yuein.php" method="post" onsubmit="return checkAll()">
    <table border="1">
        <tr>
            <td>学生姓名</td>
            <td><input type="text" name="x_name" onblur="fun()"/><span id="sp1"></span></td>
        </tr>
        <tr>
            <td>班级</td>
            <td>
                <select name="class" onchange="ban()">
                    <option value="">请选择...</option>
                    <?php
                    //连接数据库
                    $link=mysqli_connect("127.0.0.1","root","root","school");
                    mysqli_query($link,'set names utf8');
                    $sql="select * from class ";
                    $re=mysqli_query($link,$sql);
                    while($arr=mysqli_fetch_assoc($re)){
                        echo "<option value='".$arr['c_id']."'>".$arr['c_class']."</option>";
                    }
                    ?>
                </select><span id="sp2"></span>
            </td>
        </tr>
        <tr>
            <td>学号</td>
            <td><input type="text" name="num" onblur="fan()"/><span id="sp3"></span></td>
        </tr>
        <tr>
            <td>性别</td>
            <td><input type="radio" name="sex" value="男" onclick="checksex()"/>男
                <input type="radio" name="sex" value="女" onclick="checksex()"/>女
                <span id="sp4"></span>
            </td>
        </tr>
        <tr>
            <td>爱好</td>
            <td>
                <input type="checkbox" name="hobby[]" value="吃饭"onclick="checkhobby()"/>吃饭
                <input type="checkbox" name="hobby[]" value="睡觉"onclick="checkhobby()"/>睡觉
                <input type="checkbox" name="hobby[]" value="打豆豆"onclick="checkhobby()"/>打豆豆
                <input type="checkbox" name="hobby[]" value="上网"onclick="checkhobby()"/>上网
                <span id="sp6"></span>
            </td>
        </tr>
        <tr>
            <td>个人简介</td>
            <td>
                <textarea rows="5" cols="10" name="self" onblur="checkself()"></textarea><span id="sp5"></span>
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="提交"/></td>
        </tr>
    </table>
</form>
<script>
    //自定义
    function $(id){
        return document.getElementById(id);
    }
    //验证姓名
    function fun(){
        var x_name=document.getElementsByName('x_name')[0];
        if(x_name.value == ''){
            $('sp1').innerHTML="姓名不能为空";
            $('sp1').style.color="red";
            return false;
        }
        else{
            $('sp1').innerHTML="ok";
            $('sp1').style.color="red";
            return true;
        }
    }
    //验证班级
    function ban(){
        var cla=document.getElementsByName('class')[0].value;
        if(cla==''){
            $('sp2').innerHTML="班级不能为空";
            $('sp2').style.color="red";
            return false;
        }
        else{
            $('sp2').innerHTML="ok";
            $('sp2').style.color="red";
            return true;
        }
    }
    //验证学号
    function fan(){
        var num=document.getElementsByName('num')[0].value;
        if(num==''){
            $('sp3').innerHTML="学号不能为空";
            $('sp3').style.color="red";
            return false;
        }
        else{
            $('sp3').innerHTML="ok";
            $('sp3').style.color="red";
            return true;
        }
    }
    //验证简介
    function checkself(){
        var self=document.getElementsByName('self')[0].value;
        if(self==''){
            $('sp5').innerHTML="简介不能为空";
            $('sp5').style.color="red";
            return false;
        }
        else{
            $('sp5').innerHTML="ok";
            $('sp5').style.color="red";
            return true;
        }
    } //验证性别
    function checksex(){
        var sp4=document.getElementById('sp4');
        var sex=document.getElementsByName('sex');
        var str=0;
        for(var i=0;i<sex.length;i++){
            if(sex[i].checked==true){
                str=str+1;
            }
        }
        if(str!=0){
            sp4.innerHTML="ok";
            sp4.style.color="red";
            return true;
        }
        else{
            sp4.innerHTML="至少选一项";
            sp4.style.color="red";
            return false;
        }
    }
    //验证爱好
    function checkhobby(){
        var sp6=document.getElementById('sp6');
        var hobby=document.getElementsByName('hobby[]');
        var str=0;
        for(var i=0;i<hobby.length;i++){
            if(hobby[i].checked==true){
                str=str+1;
            }
        }
        if(str>=2){
            sp6.innerHTML="ok";
            sp6.style.color="red";
            return true;
        }
        else{
            sp6.innerHTML="至少选两项";
            sp6.style.color="red";
            return false;

        }
    }

    function checkAll(){

        if(fun()&ban()&fan()&checksex()&checkhobby()&checkself()){
            return true;
        }
        else{
            return false;
        }
    }


</script>