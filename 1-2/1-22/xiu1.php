<?php
header('content-type:text/html;charset=utf-8');
//连接数据库
$link=mysql_connect("127.0.0.1","root","root") or die("连接失败");
//选择数据库
mysql_select_db("school",$link);
//设置字符集
mysql_query("set names utf-8");
//编写执行语句
$id=$_GET['id'];
$sql="select * from zhuce where z_id='$id'";
$re=mysql_query($sql);
$arr=mysql_fetch_assoc($re);
?>
<form action="xiu2.php" method="post" onsubmit="return checkall()">
    <h1>欢迎修改新员工信息</h1>
    <table>
        <input type="hidden" name="id" value="<?php echo $arr['z_id'];?>"/>
        <tr>
            <td>用户名：</td>
            <td><input type="text" id="name" name="name" value="<?php echo $arr['z_name'];?>" onblur="checkname()"/><span id="showname"></span></td>
        </tr>
        <tr>
            <td>密码：</td>
            <td><input type="password" id="pwd" name="pwd" value="<?php echo $arr['z_name'];?>" onblur="checkpwd()"/><span id="showpwd"></span></td>
        </tr>
        <tr>
            <td>性别：</td>
            <td><input type="radio" name="sex" value="男"/>男
                <input type="radio" name="sex" value="女"/>女
                <span id="showsex"></span>
            </td>
        </tr>
        <tr>
            <td>部门</td>
            <td><select name="apartment" onchange="checkapartment()">
                    <option value="">请选择</option>
                    <option value="市场部">市场部</option>
                    <option value="教务部">教务部</option>
                    <option value="督察部">督察部</option>
                </select>
                <span id="showapartment"></span>
            </td>
        </tr>
        <tr>
            <td>简介</td>
            <td><textarea rows="5" cols="10"id="myself" name="myself" onblur="checkmyself()"></textarea><span id="showmyself"></span></td>
        </tr>
        <tr>
            <td><input type="submit" value="修改"/></td>
            <td><input type="reset" value="重置"/></td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    function $(id){
        return document.getElementById(id)
    }
    function checkname(){
        var name=$('name').value;
        if(name==''){
            $('showname').innerHTML="用户名不能为空";
            $('showname').style.color="red";
            return false;
        }
        else{
            $('showname').innerHTML="对";
            return true;
        }
    }
    function checkpwd(){
        var pwd=$('pwd').value;
        if(pwd==''){
            $('showpwd').innerHTML="密码不能为空";
            $('showpwd').style.color="red";
            return false;
        }
        else{
            $('showpwd').innerHTML="对";
            return true;
        }
    }
    function checkmyself(){
        var myself=$('myself').value;
        if(myself==''){
            $('showmyself').innerHTML="简介不能为空";
            $('showmyself').style.color="red";
            return false;
        }
        else{
            $('showmyself').innerHTML="对";
            return true;
        }
    }
    function checkapartment(){
        var cla=document.getElementsByName('apartment')[0].value;
        if(cla==''){
            $('showapartment').innerHTML="部门不能为空";
            $('showapartment').style.color="red";
            return false;
        }
        else{
            $('showapartment').innerHTML="对";
            return true;
        }
    }
    function checkall(){
        var sex=document.getElementsByName('sex');
        var str= 0;
        for(var i=0;i<sex.length;i++){
            if(sex[i].checked==true){
                str=str+1;
            }
        }
        if(str<1){
            $('showsex').innerHTML="性别不能为空";
            $('showsex').style.color="red";
            return false;
        }else{
            $('showsex').innerHTML="对";
            $('showsex').style.color="red";
        }

        if (checkname() & checkpwd()& checkapartment()&checkmyself()) {
            return true;
        }else{
            return false;
        }
    }


</script>