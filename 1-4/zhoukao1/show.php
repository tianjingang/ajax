<?php
header('content-type:text/html;charset=utf-8');
/*
	1.查询总条数      count()
	2.每页显示条数
	3.获取总页数       总条数/每页显示条数
	4.获取当前页     $_GET['page'] ? $_GET['page'] : 1
	5.求偏移量        （当前页-1）*每页显示条数
	6.根据偏移量在进行查询数据
     20条数据    每页  5

		 当前页数   起始位置 (下标)    终止位置(下标)
		   1           0            4
		   2           5            9
		   3           10           14
		   4           15            19
*/


//连接数据库
$link=mysqli_connect("127.0.0.1","root","root","school");
//选择数据库
mysqli_select_db($link,'set names utf-8');
//执行语句
$sql="select COUNT(*) num from zhou1";
$re=mysqli_query($link,$sql);
$ar=mysqli_fetch_assoc($re);
//获取总条数
$page_sum=$ar['num'];
//设置每页显示条数
$page_num=5;
//获取总页数
$sum_page=ceil($page_sum/$page_num);
//获取当前页
$page=isset($_GET['page'])? $_GET['page']:1;
//获取偏移量
$page_limit=($page-1)*$page_num;
//根据偏移量再查询数据
$sql2="select * from zhou1 limit $page_limit,$page_num";
$res=mysqli_query($link,$sql2);
//获取上一页
$last=$page-1<1 ? 1: $page-1;
//获取下一页
$nest=$page+1>$sum_page? $sum_page: $page+1;
?>
<h1>学生信息列表</h1>
<table border="1" >
    <tr>
        <td>序号</td>
        <td>姓名</td>
        <td>邮箱</td>
        <td>手机号</td>
        <td>性别</td>
        <td>操作</td>

    </tr>
    <?php while($arr=mysqli_fetch_assoc($res)) { ?>
       <tr>
        <td><input type="checkbox" value="<?php echo $arr['id']?>" name="box"/><?php echo $arr['id']?></td>
        <td><?php echo $arr['k_name']?></td>
        <td><?php echo $arr['k_email']?></td>
        <td><?php echo $arr['k_phone']?></td>
        <td><?php echo $arr['k_sex']?></td>
        <td>
            <a href='javascript:void(0)' onclick='del(<?php echo $arr['id']; ?>)'>删除</a></td>
      </tr>
    <?php } ?>

</table>
<a href="show.php?page=1">首页</a>
<a href="show.php?page=<?php echo $last?>">上一页</a>
<a href="show.php?page=<?php echo $nest?>">下一页</a>
<a href="show.php?page=<?php echo $sum_page?>">尾页</a>
<P>当前页是第<?php echo $page?>页</P>
<P>总页数<?php echo $sum_page?>页</P>
<script>
    //单删
    function del(id){
    var box=document.getElementsByName('box');
    for(var i=0;i<box.length;i++){
        if(confirm('确认删除')){
            location.href='shan.php?str='+id;
        }
    }
    }
</script>

