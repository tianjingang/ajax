<?php
header('content-type:text/html;charset=utf-8');
//连接数据库
$link=mysql_connect("127.0.0.1","root","root") or die("连接失败");
//选择数据库
mysql_select_db("school",$link);
//设置字符集
mysql_query("set names utf-8");
//编写执行语句
$sql_str="select * from wangdian";
$result=mysql_query($sql_str);
?>
<table border="1">
    <tr>
        <td><input type="checkbox" name="run" onclick="lick()"/>编号</td>
        <td>网店名称</td>
        <td>密码</td>
        <td>手机号</td>
        <td>店铺简介</td>
        <td>操作</td>
    </tr>
    <?php
     while($arr=mysql_fetch_assoc($result)){
         echo "<tr>";
         echo "<td><input type='checkbox' value=".$arr['w_id']." name='box'/>".$arr['w_id']."</td>";
         echo "<td>".$arr['w_name']."</td>";
         echo "<td>".$arr['w_password']."</td>";
         echo "<td>".$arr['w_phone']."</td>";
         echo "<td>".$arr['w_production']."</td>";
         echo "<td><a href='javascript:void(0)' onclick='del(id=".$arr['w_id'].")'>删除</a>||<a href='xiu1.php?id=".$arr['w_id']."'>修改</a></td>";
         echo "</tr>";
     }
    ?>
    <tr>
        <td></td>
        <td><button  onclick="quan()">全选</button></td>
        <td><button  onclick="fan()">反选</button></td>
        <td><button  onclick="bu()">不选</button></td>
        <td><button  onclick="pi()">批量删除</button></td>
    </tr>
</table>


<script>
    //编号
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
    //全选
    function quan(){
        var run=document.getElementsByName('run')[0];
        var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++){
            run.checked=true;
            box[i].checked=true;
        }
    }
    //反选
    function fan(){
        var box=document.getElementsByName('box');
        var run=document.getElementsByName('run')[0];
        for(var i=0;i<box.length;i++){
            box[i].checked= !box[i].checked;
            run.checked= !run.checked;
        }
    }
    //不选
    function bu(){
        var run=document.getElementsByName('run')[0];
        var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++){
            run.checked=false;
            box[i].checked=false;
        }
    }
   //批量删除
    function pi(){
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
   //单个删除
    function del(id){
        var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++){
            if(confirm('确认删除')){
                location.href='shan.php?str='+id;
            }
        }
    }
</script>