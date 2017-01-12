<?php
header('content-type:text/html;charset=utf-8');
//连接数据库
$link=mysql_connect("127.0.0.1","root","root") or die("连接失败");
//选择数据库
mysql_select_db("school",$link);
//设置字符集
mysql_query("set names utf-8");
//编写执行语句
$sql_str="select * from xuexin";
$result=mysql_query($sql_str);
?>
<table border="1">
    <tr>
        <td><input type="checkbox" name="run" onclick="lick()"/>编号</td>
        <td>姓名</td>
        <td>密码</td>
        <td>确认密码</td>
        <td>性别</td>
        <td>邮箱</td>
        <td>城市</td>
        <td>手机</td>
        <td>电话</td>
        <td>身份证号</td>
        <td>QQ号</td>
        <td>自我介绍</td>
        <td>操作</td>
    </tr>
    <?php
    while($arr=mysql_fetch_assoc($result)){
        echo "<tr>";
        echo "<td><input type='checkbox' value='".$arr['id']."' name='box'/>".$arr['id']."</td>";
        echo "<td>".$arr['x_name']."</td>";
        echo "<td>".$arr['x_pwd']."</td>";
        echo "<td>".$arr['x_que']."</td>";
        echo "<td>".$arr['x_sex']."</td>";
        echo "<td>".$arr['x_email']."</td>";
        echo "<td>".$arr['x_city']."</td>";
        echo "<td>".$arr['x_phone']."</td>";
        echo "<td>".$arr['x_tel']."</td>";
        echo "<td>".$arr['x_num']."</td>";
        echo "<td>".$arr['x_qq']."</td>";
        echo "<td>".$arr['x_qq']."</td>";
        echo "<td><a href='javascript:void(0)'onclick='shan(".$arr['id'].")'>删除</a>||<a href='xiu1.php?id=".$arr['id']."'>修改</a></td>";
        echo "</tr>";
    }
    ?>
</table>
<button name="quan" onclick="quan()">全选</button>
<button name="fan" onclick="fan()">反选</button>
<button  name="bu" onclick="bu()">不选</button>
<button  name="pi" onclick="pi()">批量删除</button>
<script>
    //验证连选
    function lick(){
        var run=document.getElementsByName('run')[0];
        var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++){
            if(run.checked==true){
                box[i].checked=true;
            }
            else{
                box[i].checked=false;

            }
        }
    }
    //验证全选
    function quan(){
        var run=document.getElementsByName('run')[0];
        var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++){
            run.checked=true;
            box[i].checked=true;
        }
    }
    //验证反选
    function fan(){
        var run=document.getElementsByName('run')[0];
        var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++){
            run.checked=!run.checked;
            box[i].checked=!box[i].checked;
        }
    }
    //验证不选
    function bu(){
        var run=document.getElementsByName('run')[0];
        var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++){
            run.checked=false;
            box[i].checked=false;
        }
    }
    //单删
    function shan(str){
        var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++){
            if(confirm('确认删除')){
                location.href='shan.php?str='+str;
            }
        }

    }
    //批删
    function pi(str){
        var box=document.getElementsByName('box');
        var str='';
        for(var i=0;i<box.length;i++){
            if(box[i].checked==true){
                str=str+','+box[i].value;
            }
        }
        str=str.substr(1);
        if(confirm('确认删除')){
            location.href='shan.php?str='+str;
        }

    }

</script>

