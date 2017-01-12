<?php
header('content-type:text/html;charset=utf8');
$link=mysqli_connect("127.0.0.1","root","root","js_day20");
mysqli_query($link,'set names utf8');
$id=isset($_GET['id'])?$_GET['id']:'';
$sqldel="delete from ri20 where id in ($id)";
mysqli_query($link,$sqldel);
//查询
$sql="select count(*)num from ri20";
$re=mysqli_query($link,$sql);
$ar=mysqli_fetch_assoc($re);
//获取条数
$count=$ar['num'];
//echo $count;die;
//获取每页条数
$page_num=5;
//获取页数
$sum_page=ceil($count/$page_num);
//获取当前页
$page=isset($_GET['page'])?$_GET['page']:1;
//上一页
$last=$page-1<1?1:$page-1;
//下一页
$nest=$page+1>$sum_page?$sum_page:$page+1;
//获取偏移量
$page_limit=($page-1)*$page_num;
//获取偏移量后的语句
$sql2="select * from ri20 limit $page_limit,$page_num";
$res=mysqli_query($link,$sql2);
?>
<div id="div1">
    <h2 style="margin-left: 300px">文章列表</h2>
<table border="1">
    <tr>
        <td><input type="checkbox" name="run" onclick="run()"/>全选</td>
        <td>文章编号</td>
        <td>文章标题</td>
        <td>添加时间</td>
        <td>作者</td>
        <td>点击量</td>
        <td>操作</td>
    </tr>
    <?php while($arr=mysqli_fetch_assoc($res)){?>
    <tr>
        <td><input type="checkbox" value="<?php echo $arr['id']?>" name="box"/></td>
        <td><?php echo $arr['id']?></td>
        <td><?php echo $arr['w_title']?></td>
        <td><?php echo $arr['w_date']?></td>
        <td><?php echo $arr['w_author']?></td>
        <td><?php echo $arr['w_num']?></td>
        <td>
            <a href="javascript:void (0)" onclick="rishan(<?php echo $page?>,<?php echo $arr['id']?>)">删除</a>
            <a href="rixiu.php?id=<?php echo $arr['id']?>">修改</a>
        </td>
    </tr>
    <?php }?>
</table>
    <a href="javascript:void(0)" onclick="pi(<?php echo $page?>)">批删</a>
    <a href="javascript:void(0)" onclick="page(1)">首页</a>
    <a href="javascript:void(0)" onclick="page(<?php echo $last?>)">上一页</a>
    <a href="javascript:void(0)" onclick="page(<?php echo $nest?>)">下一页</a>
    <a href="javascript:void(0)" onclick="page(<?php echo $sum_page?>)">尾页</a>
</div>
<script>
    //分页
    function page(page){
        var ajax=new XMLHttpRequest();
        ajax.open('get','rikao.php?page='+page);
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4&ajax.status==200){
                document.getElementById('div1').innerHTML=ajax.responseText;
            }
        }
    }
    //单删
    function rishan(page,id){
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

    //联动
    function run(run,box){
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
                }            }
        }

    }

</script>