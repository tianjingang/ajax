<?php
header('content-type:text/html;charset=utf-8');
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf-8');
$search=isset($_GET['search'])?$_GET['search']:'';
$id=isset($_GET['id'])?$_GET['id']:'';
$sqldel="delete from message where id in ($id)";
mysqli_query($link,$sqldel);
//查询分页
$sql="select count(*) num from message where addman like '%$search%'";
$re=mysqli_query($link,$sql);
$ar=mysqli_fetch_assoc($re);
//取总条数
$sum_page=$ar['num'];
//获取每页条数
$page_num=3;
//获取页数
$page_sum=ceil($sum_page/$page_num);
//获取当前页
$page=isset($_GET['page'])?$_GET['page']:1;
//获取上一页
$last=$page-1<1?1:$page-1;
//获取下一页
$nest=$page+1>$page_sum?$page_sum:$page+1;
//获取偏移量
$page_limit=($page-1)*$page_num;
//获取偏移量后的语句
$sql2="select * from message where addman like '%$search%' limit $page_limit,$page_num";
$res=mysqli_query($link,$sql2);
?>
<div id="div1">
    <input type="search"  value="<?php echo $search?>" name="search"/><button onclick="page(1)">搜索</button>
    <table border="1">
        <tr>
            <td><input type="checkbox" name="run" onclick="lick()"/>全选</td>
            <td>添加人</td>
            <td>内容</td>
            <td>添加时间</td>
            <td>操作</td>
        </tr>
        <?php while($arr=mysqli_fetch_assoc($res)){?>
        <tr>
            <td><input type="checkbox"  value="<?php echo $arr['id']?>" name="box"/><?php echo $arr['id']?></td>
            <td><?php echo $arr['addman']?></td>
            <td><?php echo $arr['content']?></td>
            <td><?php echo $arr['addtime']?></td>
            <td><a href="javascript:void (0)" onclick="shan1(<?php echo $page ?>,<?php echo $arr['id']?>)">删除</a>
            <a href="lxiu.php?id=<?php echo $arr['id']?>">修改</a>
            </td>
        </tr>
        <?php }?>
    </table>
    <button onclick="quan()">全选</button>
    <button onclick="fan()">反选</button>
    <button onclick="bu()">不选</button>
    <button onclick="pi(<?php echo $page?>)">批删</button>
    <a href="javascript:void (0)" onclick="page(1)">首页</a>
    <a href="javascript:void (0)" onclick="page(<?php echo $last?>)">上一页</a>
    <a href="javascript:void (0)" onclick="page(<?php echo $nest?>)">下一页</a>
    <a href="javascript:void (0)" onclick="page(<?php echo $page_sum?>)">尾页</a>
   当前第<?php echo $page?>页 共<?php echo $page_sum?>页
</div>
<script>
    //分页
    function page(page){
        var search=document.getElementsByName('search')[0].value;
        var ajax=new XMLHttpRequest();
        ajax.open('get','look.php?page='+page+'&search='+search);
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4&ajax.status==200){
                document.getElementById('div1').innerHTML=ajax.responseText;
            }
        }
    }
    //单删
   function shan1(page,id){
       var search=document.getElementsByName('search')[0].value;
       var ajax=new XMLHttpRequest();
       ajax.open('get','look.php? page='+page+'&id='+id+'&search='+search);
       ajax.send();
       ajax.onreadystatechange=function(){
          // alert(ajax.readyState);
           if(ajax.readyState==4&ajax.status==200){
               document.getElementById('div1').innerHTML=ajax.responseText;
           }
       }
   }
    //批删
   function pi(page){
       var box=document.getElementsByName('box');
       var search=document.getElementsByName('search')[0].value;
       var str='';
       for(var i=0;i<box.length;i++){
           if(box[i].checked==true){
               str=str+','+box[i].value;
           }
       }
       str=str.substr(1);
       var ajax=new XMLHttpRequest();
       ajax.open('get','look.php? page='+page+'&id='+str+'&search='+search);
       ajax.send();
       ajax.onreadystatechange=function(){
           // alert(ajax.readyState);
           if(ajax.readyState==4&ajax.status==200){
               document.getElementById('div1').innerHTML=ajax.responseText;
           }
       }


   }


    //联动
    function lick(run,box){
        var run=document.getElementsByName('run')[0];
        var box=document.getElementsByName('box');
        var ajax=new XMLHttpRequest();
        ajax.open('get','rikao.php?run='+run+'&box='+box);
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4&ajax.status==200){
                for(var i=0;i<box.length;i++){
                    if(run.checked==true){
                        box[i].checked=true
                    }
                    else{
                        box[i].checked=false;
                    }
                }
            }
        }

    }

    //全选
    function quan(box){
        var box=document.getElementsByName('box');
        var ajax=new XMLHttpRequest();
        ajax.open('get','rikao.php?box='+box);
        ajax.send();
        ajax.onreadystatechange=function() {
            if(ajax.readyState==4&ajax.status==200) {
                for(var i=0;i<box.length;i++){
                    box[i].checked=true;
                }

            }
        }
    }
 //反选
    function fan(box){
        var box=document.getElementsByName('box');
        var ajax=new XMLHttpRequest();
        ajax.open('get','rikao.php?box='+box);
        ajax.send();
        ajax.onreadystatechange=function() {
            if(ajax.readyState==4&ajax.status==200) {
                for(var i=0;i<box.length;i++){
                    box[i].checked=!box[i].checked;
                }

            }
        }
    }
 //不选
    function bu(box){
        var box=document.getElementsByName('box');
        var ajax=new XMLHttpRequest();
        ajax.open('get','rikao.php?box='+box);
        ajax.send();
        ajax.onreadystatechange=function() {
            if(ajax.readyState==4&ajax.status==200) {
                for(var i=0;i<box.length;i++){
                    box[i].checked=false;
                }

            }
        }
    }
</script>