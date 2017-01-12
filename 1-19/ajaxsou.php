<?php
header('content-type:text/html;charset=utf8');
//连接数据库
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
$search=isset($_GET['search'])?$_GET['search']:'';
$sql="select count(*) num from wenzhang where w_date like '%$search%'";
$re=mysqli_query($link,$sql);
$ar=mysqli_fetch_assoc($re);
//获取总条数
$count=$ar['num'];
//获取每页条数
$page_num=2;
//获取页数
$sum_page=ceil($count/$page_num);
//获取当前页
$page=isset($_GET['page'])?$_GET['page']:1;
//获取上一页
$last=$page-1<1?1:$page-1;
//获取下一页
$next=$page+1>$sum_page?$sum_page:$page+1;
//获取偏移量
$page_limit=($page-1)*$page_num;
//语句
$sql2="select * from wenzhang where w_date like '%$search%' limit $page_limit,$page_num";
$res=mysqli_query($link,$sql2);
?>
<div id="div1">
    <input type="search" value="<?php echo $search?>" name="search"/><button onclick="page(1)">搜索</button>
    <table border="1">
        <tr>
            <td><input type="checkbox" name="run" onclick="lick()"/>全选</td>
            <td>文章编号</td>
            <td>文章标题</td>
            <td>添加时间</td>
            <td>文章作者</td>
            <td>点击量</td>
            <td>操作</td>
        </tr>
        <?php while($arr=mysqli_fetch_assoc($res)){?>
            <tr>
                <td><input type="checkbox"  value="<?php echo $arr['id']?>" name="box"/></td>
                <td><?php echo $arr['id']?></td>
                <td><?php echo $arr['w_title']?></td>
                <td><?php echo $arr['w_date']?></td>
                <td><?php echo $arr['w_author']?></td>
                <td><?php echo $arr['w_num']?></td>
                <td><a href="javascript:void (0)" onclick="ajaxshan(<?php echo $arr['id']?>)">删除</a><a href="ajaxxiu.php">修改</a></td>
            </tr>
        <?php }?>
    </table>
    <button onclick="pi()">批删</button>
    <a href="javascript:void(0) "onclick="page(1)">首页</a>
    <a href="javascript:void(0)" onclick="page(<?php echo $last?>)">上一页</a>
    <a href="javascript:void(0)"onclick="page(<?php echo $next?>)">下一页</a>
    <a href="javascript:void(0)"onclick="page(<?php echo $sum_page?>)">尾页</a>
    搜索的值为<big style="color: red"><?php echo $search?></big> 搜索的数据为<small style="color: red"><?php echo $count?></small>条 搜索的页数为<?php echo $sum_page?>
</div>
<script>
    //ajax搜索后分页
    function page(page){
        var search=document.getElementsByName('search')[0].value;
        var ajax=new XMLHttpRequest();
        ajax.open('get','ajaxsou.php?page='+page+'&search='+search);
        ajax.send();
        ajax.onreadystatechange=function (){
            if(ajax.readyState==4&ajax.status==200){
                document.getElementById('div1').innerHTML=ajax.responseText;
            }
        }

    }
    //单删
    function ajaxshan(str){
       var ajax=new XMLHttpRequest();
        ajax.open('get','ajaxshan.php?str='+str);
        ajax.send();
        ajax.onreadystatechange=function (){
            if(ajax.readyState==4&ajax.status==200){
                alert('删除成功')
                location.href='ajaxsou.php';
            }
        }
    }
    //批删
    function pi(){
        var box=document.getElementsByName('box');
        var str='';
        for(var i=0;i<box.length;i++){
            if(box[i].checked==true){
                str=str+','+box[i].value;
            }
        }
        str=str.substr(1);
        var ajax=new XMLHttpRequest();
        ajax.open('get','ajaxshan.php?str='+str);
        ajax.send();
        ajax.onreadystatechange=function (){
            if(ajax.readyState==4&ajax.status==200){
                alert('删除成功')
                location.href='ajaxsou.php';
            }
        }
    }





</script>