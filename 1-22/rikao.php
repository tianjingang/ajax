<?php
header('content-type:text/html;charset=utf8');
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
$id=isset($_GET['id'])?$_GET['id']:'';
$del="delete from ri22 where id in ($id)";
$redel=mysqli_query($link,$del);
$search=isset($_GET['search'])?$_GET['search']:'';
//查询语句
$sql="select count(*) as num from ri22 where r_title like '%$search%'";
$re=mysqli_query($link,$sql);
$ar=mysqli_fetch_assoc($re);
//获取总条数
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
$sql2="select * from ri22 where r_title like '%$search%'limit $page_limit,$page_num ";
$res=mysqli_query($link,$sql2);
?>
<div id="div1">
    标题:<input type="search" value="<?php echo $search?>" name="search"/>
    <button onclick="page(1)">ajax搜索</button>
    <table border="1">
        <tr>
            <td><input type="checkbox" name="run" onclick="lick()"/>全选/反选</td>
            <td>编号</td>
            <td>标题</td>
            <td>内容</td>
            <td>时间</td>
            <td>作者</td>
            <td>类别</td>
            <td>操作</td>
        </tr>
        <?php while($arr=mysqli_fetch_assoc($res)){?>
        <tr>
            <td><input type="checkbox"  value="<?php echo $arr['id']?>" name="box"/></td>
            <td><?php echo $arr['id']?></td>
            <td><?php echo $arr['r_title']?></td>
            <td><?php echo $arr['r_content']?></td>
            <td><?php echo $arr['r_author']?></td>
            <td><?php echo $arr['r_time']?></td>
            <td><?php echo $arr['r_type']?></td>
            <td><a href="javascript:void(0)" onclick="del(<?php echo $page?>,<?php echo $arr['id']?>)">删除</a></td>
        </tr>
        <?php }?>
    </table>
    <p>
        <button onclick="pi(<?php echo $page ?>)">批删</button>
        <button onclick="quan()">全选</button>
        <button onclick="fan()">反选</button>
        <button onclick="bu()">全不选</button>
    </p>
    <p><a href="javascript:void(0)" onclick="page(1)">首页</a>
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
        ajax.open('get','rikao.php?page='+page+'&search='+search);
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
        var search=document.getElementsByName('search')[0].value;
        var ajax=new XMLHttpRequest();
        ajax.open('get','rikao.php?page='+page+'&search='+search);
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
        var search=document.getElementsByName('search')[0].value;
        var ajax=new XMLHttpRequest();
        ajax.open('get','rikao.php?page='+page+'&search='+search);
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
        var search=document.getElementsByName('search')[0].value;
        var ajax=new XMLHttpRequest();
        ajax.open('get','rikao.php?page='+page+'&search='+search);
        ajax.send();
        ajax.onreadystatechange=function(){
            for(var i=0;i<box.length;i++){
                box[i].checked=!box[i].checked;
            }
        }

    }
    //全不选
    function bu(){
        var box=document.getElementsByName('box');
        var search=document.getElementsByName('search')[0].value;
        var ajax=new XMLHttpRequest();
        ajax.open('get','rikao.php?page='+page+'&search='+search);
        ajax.send();
        ajax.onreadystatechange=function(){
            for(var i=0;i<box.length;i++){
                box[i].checked=false;
            }
        }

    }
    //单删
    function del(page,id){
        var box=document.getElementsByName('box');
        var ajax=new XMLHttpRequest();
        ajax.open('get','rikao.php?page='+page+'&id='+id);
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
        ajax.open('get','rikao.php?page='+page+'&id='+str);
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4&ajax.status==200){
                document.getElementById('div1').innerHTML=ajax.responseText;

            }
        }

    }
</script>