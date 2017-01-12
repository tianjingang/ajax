<?php
header('content-type:text/html;charset=utf-8');
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
$search=isset($_GET['search'])?$_GET['search']:'';
$sql="select count(*)num from xinwen where x_title like '%$search%'";
$re=mysqli_query($link,$sql);
$ar=mysqli_fetch_assoc($re);
//获取总条数
$count=$ar['num'];
//echo $count;die;
//每页条数
$page_num=5;
//获取页数
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
$sql2="select * from xinwen where x_title like '%$search%' limit $page_limit,$page_num ";
$res=mysqli_query($link,$sql2);
?><div id="div1">
新闻标题:<input type="search" value="<?php echo $search?>" name="search"/>
    <button onclick="page(1)">搜索</button>
    <table border="1">
        <tr>
            <td>id</td>
            <td>标题</td>
            <td>内容</td>
        </tr>
        <?php while($arr=mysqli_fetch_assoc($res)){?>
        <tr>
            <td><?php echo $arr['id']?></td>
            <td><?php echo $arr['x_title']?></td>
            <td><?php echo $arr['x_content']?></td>
        </tr>
        <?php }?>
    </table>
    当前页<?php echo $page?>共<?php echo $sum_page?>
    <a href="javascript:void (0)" onclick="page(1)">首页</a>
    <a href="javascript:void (0)" onclick="page(<?php echo $last?>)">上一页</a>
    <a href="javascript:void (0)" onclick="page(<?php echo $nest?>)">下一页</a>
    <a href="javascript:void (0)" onclick="page(<?php echo $sum_page?>)">尾页</a>

</div>
<script>
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
</script>
