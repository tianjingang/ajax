<?php
header('content-type:text/html;charset=utf8');
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
$sql="select count(*) num from files";
$re=mysqli_query($link,$sql);
$arr=mysqli_fetch_assoc($re);
//获取总条数
$sum_page=$arr['num'];
//设置每页显示条数
$page_num=5;
//获取页数
$page_sum=ceil($sum_page/$page_num);
//获取当前页
$page=isset($_GET['page'])?$_GET['page']:1;
//获取偏移量
$page_limit=($page-1)*$page_num;
//获取偏移量再获取
$sql2="select * from files limit $page_limit,$page_num";
$res=mysqli_query($link,$sql2);
//获取上一页
$last=$page-1<1?1:$page-1;
//获取下一页
$next=$page+1>$page_sum?$page_sum:$page+1;
?>
<table border="1">
    <tr>
        <td>编号</td>
        <td>名称</td>
        <td>图片</td>
        <td>操作</td>
    </tr>
    <?php while($arr=mysqli_fetch_assoc($res)){?>
     <tr>
         <td><input type="checkbox" value=".$arr['id']." name="box"/><?php echo $arr['id']?></td>
         <td><?php echo $arr['uploads']?></td>
         <td><img src="<?php echo $arr['filename']?>" alt="" height="100" width="100"/></td>
         <td><a href='javascript:void(0)' onclick="shan1(<?php echo $arr['id']?>)">删除</a>
             <a href="upload.php?upload=<?php echo $arr['filename']?>">下载</a>
         </td>

    </tr>

<?php }?>
</table>
<P><a href="show1.php?page=1">首页</a>
    <a href="show1.php?page=<?php echo $last?>">上一页</a>
    <a href="show1.php?page=<?php echo $next?>">下一页</a>
    <a href="show1.php?page=<?php echo $page_sum?>">尾页</a>
</P>
<p>当前第<?php echo $page?>页</p>
<p>共<?php echo $page_sum?>页</p>
<script>
    function shan1(id){
        var box=document.getElementsByName('box');
        for(var i=0:i<box.length;i++){
            if(confirm('删除吗?')){
                location.href='shan1.php?str='+id;
            }
        }
    }
</script>