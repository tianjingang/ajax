<?php
header('content-type:text/html;charset=utf8');
//连接数据库
$link=mysqli_connect("127.0.0.1","root","root","school");
//设置字符集
mysqli_query($link,'set names utf8');
//执行语句
$sql="select count(*) num from tushu ";
$re=mysqli_query($link,$sql);
$arr=mysqli_fetch_assoc($re);
//获取总条数
$page_sum=$arr['num'];
//设置每页条数
$page_num=10;
//获取页数
$sum_page=ceil($page_sum/$page_num);
//获取当前页
$page=isset($_GET['page'])?$_GET['page']:1;
//获取偏移量
$page_limit=($page-1)*$page_num;
//获取偏移量再查询
$sql2="select * from tushu limit $page_limit,$page_num";
$res=mysqli_query($link,$sql2);
//获取上一页
$last=$page-1<1?1:$page-1;
//获取下一页
$nest=$page+1>$sum_page?$sum_page:$page+1;
?>
<table border="1">
    <tr>
        <td>ID</td>
        <td>图书名字</td>
        <td>图书存量</td>
        <td>图书类型</td>
        <td>图书简介</td>
    </tr>
    <?php while($arr=mysqli_fetch_assoc($res)){?>
        <tr>
        <td><input type='checkbox' name='box'/><?php echo $arr['id']?></td>
        <td><?php echo $arr['t_name']?></td>
        <td><?php echo $arr['t_sum']?></td>
        <td><?php echo $arr['t_type']?></td>
        <td><?php echo $arr['t_my']?></td>
        </tr>
   <?php }?>

</table>
<button name="quan" onclick="quan()">全选</button>
<button name="fan" onclick="fan()">反选</button>
<button name="bu" onclick="bu()">不选</button>
<p><a href="show.php?page=1">首页</a>
    <a href="show.php?page=<?php echo $last?>">上一页</a>
    <a href="show.php?page=<?php echo $nest?>">下一页</a>
    <a href="show.php?page=<?php echo $sum_page?>">尾页</a>
</p>
<p><font color="red">当前是第<?php echo $page?>页</font></p>
<p><font color="red">共<?php echo $sum_page?>页</font></p>
<script>
    function fan(){
        var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++){
            if(box[i].checked==true){
                box[i].checked=false;
            }
            else{
                box[i].checked=true;
            }
        }
    }
    function quan()
    { var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++){
            box[i].checked=true;
        }

    }
    function bu()
    { var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++){
            box[i].checked=false;
        }

    }
</script>