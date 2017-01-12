<?php
header('content-type:text/html;charset=utf8');
//连接数据库
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
$id=isset($_GET['id'])?$_GET['id']:'';
$s="delete from ajax1 where id in ($id)";
$r=mysqli_query($link,$s);
//执行语句
$sql="select count(*) num from ajax1";
$re=mysqli_query($link,$sql);
$ar=mysqli_fetch_assoc($re);
//获取总条数
$sum_page=$ar['num'];
//echo $sum_page;die;
//每页条数
$page_num=4;
//获取页数
$page_sum=ceil($sum_page/$page_num);
//echo $page_sum;die;
//获取当前页
$page=isset($_GET['page'])?$_GET['page']:1;
//获取偏移量
$page_limit=($page-1)*$page_num;
//上一页
$last=$page-1<1?1:$page-1;
//下一页
$next=$page+1>$page_sum?$page_sum:$page+1;
//语句
$sql2="select * from ajax1 limit $page_limit,$page_num";
$res=mysqli_query($link,$sql2);
?>
<div id="div1">
<table border="1">
    <tr>
        <td>id</td>
        <td>设备名称</td>
        <td>设备IP</td>
        <td>设备版本</td>
        <td>服务器版本</td>
        <td>登录时间</td>
        <td>是否在线</td>
        <td>操作</td>
    </tr>
    <?php while($arr=mysqli_fetch_assoc($res)) { ?>
    <tr>
        <td><?php echo $arr['id']?></td>
        <td><?php echo $arr['a_name']?></td>
        <td><?php echo $arr['a_IP']?></td>
        <td><?php echo $arr['a_type1']?></td>
        <td><?php echo $arr['a_type2']?></td>
        <td><?php echo $arr['a_time']?></td>
        <td><?php echo $arr['a_statue']?></td>
        <td><a href="#">关机</a>
            <a href="#">修改</a>
            <a href="javascript:void(0)" onclick="del(<?php echo $page?>,<?php echo $arr['id']?>)">删除</a>
        </td>
    </tr>
    <?php }?>
</table>

    <?php for($i=1;$i<=$page_sum;$i++) {?>
        <a href="javascript:void(0)" onclick="page(<?php echo $i?>)">
            <input type="button" value="<?php echo $i?>"/></a>
    <?php }?>
    <p>当前第<?php echo $page?>页  共<?php echo $page_sum?>页</p>
<!--<a href="javascript:void(0)" onclick="page(1)">首页</a>
<a href="javascript:void(0)"onclick="page(<?php /*echo $last*/?>)" >上一页</a>
<a href="javascript:void(0)"onclick="page(<?php /*echo $next*/?>)" >下一页</a>
<a href="javascript:void(0)"onclick="page(<?php /*echo $page_sum*/?>)" >尾页</a>-->
</div>
<script>
    function page(page){
        var ajax=new XMLHttpRequest();
        ajax.open('get','rishow.php?page='+page);
        ajax.send();
        ajax.onreadystatechange=function (){
            if(ajax.readyState==4&ajax.status==200){
                document.getElementById('div1').innerHTML=ajax.responseText;
            }
        }
    }
    function del(page,id){
        var ajax=new XMLHttpRequest();
        ajax.open('get','rishow.php?page='+page+'&id='+id);
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4&ajax.status==200){
                document.getElementById('div1').innerHTML=ajax.responseText;
            }
        }
    }

</script>