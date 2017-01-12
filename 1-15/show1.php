<?php
header('content-type:text/html;charset=utf8');
$username=$_COOKIE['u_name'];
//连接库
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf-8');
//编写语句
$sql="select count(*) num from zongxi where z_person='$username' ";
$re=mysqli_query($link,$sql);
$ar=mysqli_fetch_assoc($re);
//获取总条数
$sum_page=$ar['num'];
//设定每页显示条数
$page_num=5;
//获取页数
$page_sum=ceil($sum_page/$page_num);
//获取当前页
$page=isset($_GET['page'])?$_GET['page']:1;
//获取偏移量
$page_limit=($page-1)*$page_num;
//获取偏移量后的语句
$sql2="select * from zongxi where z_person='$username' limit $page_limit,$page_num";
$res=mysqli_query($link,$sql2);

//上一页
$last=$page-1<1?1:$page-1;
//下一页
$nest=$page+1>$page_sum?$page_sum:$page+1;
?>
<table border="1">
    <tr>
        <td>编号</td>
        <td>书名</td>
        <td>图像</td>
        <td>添加人</td>
        <td>时间</td>
        <td>操作</td>
    </tr>
    <?php while($arr=mysqli_fetch_assoc($res)){ ?>
        <tr>
            <td><input type="checkbox"  value="<?php echo $arr['id']?>" name="box"/><?php echo $arr['id']?></td>
            <td><?php echo $arr['z_name']?></td>
            <td><img src="<?php echo $arr['z_file']?>" alt="" height="100" width="100"/></td>
            <td><?php echo $arr['z_person']?></td>
            <td><?php echo $arr['z_date']?></td>
            <td><a href="javascript:void(0)" onclick="shan1(<?php echo $arr['id']?>)">删除</a>
            <a href="upload.php? upload=<?php echo $arr['z_file']?>">下载</a>
            </td>
        </tr>
    <?php } ?>
</table>
<button  onclick="quan()">全选</button>
<button  onclick="fan()">反选</button>
<button  onclick="bu()">不选</button>
<button  onclick="pi()">批删</button>
<script>
    //全选
    function quan(){
        var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++){
            box[i].checked=true;
            }
        }
    //反选
    function fan(){
        var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++){
            box[i].checked=!box[i].checked;
        }
    }
    //不选
    function bu(){
        var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++){
            box[i].checked=false;
        }
    }
    //单删
    function shan1(str){
        var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++){
            if(confirm('删除吗')){
                location.href='shan1.php?str='+str;
            }
        }
    }
    //批删
    function pi(str){
        var box=document.getElementsByName('box');
        var str='';
        for(var i=0;i<box.length;i++){
            if(box[i].checked==true){
              str=str+','+box[i].value;
            }
        }
         str=str.substr(1);
        if(confirm('批删吗'))
        {
            location.href='shan1.php?str='+str;
        }
    }


</script>
<p><a href="show1.php?page=1">首页</a>
<a href="show1.php?page=<?php echo $last?>">上一页</a>
<a href="show1.php?page=<?php echo $nest?>">下一页</a>
<a href="show1.php?page=<?php echo $page_sum?>">尾页</a>
    当前<?php echo $page?>页共<?php echo $page_sum?>页
</p>