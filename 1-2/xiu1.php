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
$sql="select * from wangdian where w_id='$id'";
$re=mysql_query($sql);
$arr=mysql_fetch_assoc($re);
?>
<form action="xiu2.php" method="post" onsubmit="return checkall()">
    <table>
        <input type="hidden" name="id" value="<?php echo $arr['w_id'];?>"/>
        <tr>
            <td>网店名称</td>
            <td><input type="text"id="name" name="name" value="<?php echo $arr['w_name'];?>" onblur="checkname()"/><span id="showname"></span></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="password" id="pwd"  name="pwd" value="<?php echo $arr['w_password'];?>" onblur="checkpwd()"/><span id="showpwd"></span></td>
        </tr>
        <tr>
            <td>手机</td>
            <td><input type="text" id="phone" name="phone" value="<?php echo $arr['w_phone'];?>" onblur="checkphone()"/><span id="showphone"></span></td>
        </tr>
        <tr>
            <td>店铺简介</td>
            <td><textarea  id="production"  name="production" value="<?php echo $arr['w_production'];?>"cols="30" rows="10" onblur="checkproduction()"></textarea><span id="showproduction"></span></td>
        </tr>
        <tr>
            <td><input type="submit"value="修改"/></td>
            <td></td>
        </tr>
    </table>

</form>
<script type="text/javascript">
    function $(id){
        return document.getElementById(id);
    }
    function checkname(){
        var name=$('name').value;
        if(name==''){
            $('showname').innerHTML="用户名不能为空";
            $('showname').style.color="red";
            return false;
        }else{
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
        }else{
            $('showpwd').innerHTML="对";
            return true;
        }
    }
    function checkphone(){
        var phone=$('phone').value;
        if(phone==''){
            $('showphone').innerHTML="手机号不能为空";
            $('showphone').style.color="red";
            return false;
        }
        else{
            $('showphone').innerHTML="对";
            return true;
        }
    }
    function checkproduction(){
        var production=$('production').value;
        if(production==''){
            $('showproduction').innerHTML="简介不能为空";
            $('showproduction').style.color="red";
            return false;
        }
        else{
            $('showproduction').innerHTML="对";
            return true;
        }
    }
       function checkall(){
           if(checkname()&checkpwd()&checkphone()&checkproduction()){
               return true;
           }
           else{
               return false;
           }
       }

</script>