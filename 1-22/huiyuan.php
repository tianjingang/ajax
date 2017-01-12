<?php
header('content-type:text/html;charset=utf8');
//连库
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
$search=isset($_GET['search'])?$_GET['search']:'';
$id=isset($_GET['id'])?$_GET['id']:'';
$sqldel="delete from huiyuan where id in($id)";
$redel=mysqli_query($link,$sqldel);
//查询语句
$sql="select count(*) as num from huiyuan where h_name like '%$search%'";
$re=mysqli_query($link,$sql);
$ar=mysqli_fetch_assoc($re);
//总条数
$count=$ar['num'];
//每页条数
$page_num=4;
//总页数
$sum_page=ceil($count/$page_num);
//获取当前页
$page=isset($_GET['page'])?$_GET['page']:1;
//上一页
$last=$page-1<1?1:$page-1;
//下一页
$nest=$page+1>$sum_page?$sum_page:$page+1;
//偏移量
$page_limit=($page-1)*$page_num;
//获取偏移量后的语句
$sql2="select * from huiyuan where h_name like '%$search%' limit $page_limit,$page_num";
$res=mysqli_query($link,$sql2);
?>
<div id="div1">
    <input type="search" value="<?php echo $search?>" name="search"/>
    <button onclick="page(1)">ajax搜索会员</button>
    <table border="1">
        <tr>
            <td><input type="checkbox" name="run" onclick="lick()"/>全选</td>
            <td>会员编号</td>
            <td>会员名称</td>
            <td>会员密码</td>
            <td>会员性别</td>
            <td>会员年龄</td>
            <td>所在城市</td>
            <td>会员爱好</td>
            <td>会员电话</td>
            <td>自我介绍</td>
            <td>操作</td>
        </tr>
        <?php while($arr=mysqli_fetch_assoc($res)){?>
        <tr>
            <td><input type="checkbox" value="<?php echo $arr['id']?>" name="box"/></td>
            <td><?php echo $arr['id']?></td>
            <td><?php echo $arr['h_name']?></td>
            <td><?php echo $arr['h_pwd']?></td>
            <td><?php echo $arr['h_sex']?></td>
            <td><?php echo $arr['h_age']?></td>
            <td><?php echo $arr['h_city']?></td>
            <td><?php echo $arr['h_hobby']?></td>
            <td><?php echo $arr['h_tel']?></td>
            <td><?php echo $arr['h_self']?></td>
            <td>
                <a href="huixiu.php?id=<?php echo $arr['id']?>">修改</a><a href="javascript:void(0)" onclick="huidel(<?php echo $page?>,<?php echo $arr['id']?>)">删除</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <p>
        <button onclick="pi(<?php echo $page?>)">批删</button>
        <button onclick="quan()">全选</button>
        <button onclick="bu()">不选</button>
        <button onclick="fan()">反选</button>
    </p>
    <p>
        <a href="javascript:void(0)" onclick="page(1)">首页</a>
        <a href="javascript:void(0)" onclick="page(<?php echo $last?>)">上一页</a>
        <a href="javascript:void(0)" onclick="page(<?php echo $nest?>)">下一页</a>
        <a href="javascript:void(0)" onclick="page(<?php echo $sum_page?>)">尾页</a>
    </p>
</div>
<script>
    //分页
    function page(page){
        var search=document.getElementsByName('search')[0].value;
        var ajax=new XMLHttpRequest();
        ajax.open('get','huiyuan.php?page='+page+'&search='+search);
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4&ajax.status==200){
                document.getElementById('div1').innerHTML=ajax.responseText;
            }
        }
    }
    //单删
    function huidel(page,id){
        var search=document.getElementsByName('search')[0].value;
        var ajax=new XMLHttpRequest();
        ajax.open('get','huiyuan.php?page='+page+'&id='+id+'&search='+search);
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4&ajax.status==200){
                document.getElementById('div1').innerHTML=ajax.responseText;
            }
        }
    }
    //批删
   function pi(page){
       var box=document.getElementsByName('box');
       var str='';
       for(var i=0;i<box.length;i++){
           if(box[i].checked==true){
               str=str+','+box[i].value;
           }
       }
       str=str.substr(1);
       var ajax=new XMLHttpRequest();
       ajax.open('get','huiyuan.php?page='+page+'&id='+str);
       ajax.send();
       ajax.onreadystatechange=function(){
           if(ajax.readyState==4&ajax.status==200){
               document.getElementById('div1').innerHTML=ajax.responseText;
           }
       }

   }
    //联动
    function lick(){
        var run=document.getElementsByName('run')[0];
        var box=document.getElementsByName('box');
        var search=document.getElementsByName('search')[0].value
        var ajax=new XMLHttpRequest();
        ajax.open('get','huiyuan.php?page='+page+'&search='+search);
        ajax.send();
        ajax.onreadystatechange=function(){
           for(var i=0;i<box.length;i++){
               if(run.checked==true){
                   box[i].checked=true;
               }
               else{
                   box[i].checked=false;
               }
           }
        }
    }
    //全选
    function quan(){
        var box=document.getElementsByName('box');
        var search=document.getElementsByName('search')[0].value
        var ajax=new XMLHttpRequest();
        ajax.open('get','huiyuan.php?page='+page+'&search='+search);
        ajax.send();
        ajax.onreadystatechange=function(){
            for(var i=0;i<box.length;i++){
               box[i].checked=true;
            }
        }
    }
    //反选
    function fan(){
        var box=document.getElementsByName('box');
        var search=document.getElementsByName('search')[0].value
        var ajax=new XMLHttpRequest();
        ajax.open('get','huiyuan.php?page='+page+'&search='+search);
        ajax.send();
        ajax.onreadystatechange=function(){
            for(var i=0;i<box.length;i++){
                box[i].checked=! box[i].checked;
            }
        }
    }
    //不选
    function bu(){
        var box=document.getElementsByName('box');
        var search=document.getElementsByName('search')[0].value
        var ajax=new XMLHttpRequest();
        ajax.open('get','huiyuan.php?page='+page+'&search='+search);
        ajax.send();
        ajax.onreadystatechange=function(){
            for(var i=0;i<box.length;i++){
                box[i].checked=false;
            }
        }
    }



</script>