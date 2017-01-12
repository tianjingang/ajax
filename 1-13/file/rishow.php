<?php
header('content-type:text/html;charset=utf8');
//连接数据库
$link=mysqli_connect("127.0.0.1","root","root","school");
//设置字符集
mysqli_query($link,'set names utf8');
//执行语句
$sql="select count(*) num from qq";
$re=mysqli_query($link,$sql);
$ar=mysqli_fetch_assoc($re);
//获取总条数
$sum_page=$ar['num'];
//设置每页条数
$page_num=3;
//获取页数
$page_sum=ceil($sum_page/$page_num);
//获取当前页
$page=isset($_GET['page'])?$_GET['page']:1;
//获取偏移量
$page_limit=($page-1)*$page_num;
//获取偏移量后的语句
$sql2="select * from qq limit $page_limit,$page_num";
$res=mysqli_query($link,$sql2);
//上一页
$last=$page-1<1?1:$page-1;
//下一页
$nest=$page+1>$page_sum?$page_sum:$page+1;
?>
<table border="1">
    <tr>
        <td>头像</td>
        <td>昵称</td>
        <td>个性签名</td>
        <td>描述</td>
        <td>操作</td>
    </tr>
    <?php while($arr=mysqli_fetch_assoc($res)){?>
        <tr>
            <td><input type="checkbox" value="<?php echo $arr['id']?>" name="box"/><?php echo $arr['id']?></td>
            <?php
            if($arr['q_xian']==1) {?>
                <td><img src="<?php echo $arr['q_filename'] ?>" alt="" height="100" width="100"/></td>
            <?php
            }else{
                ?>
                   <td> <font color="red">主人设置不显示头像</font></td>
            <?php
            }
            ?>
            <td><?php echo $arr['q_my']?></td>
            <td><?php echo $arr['q_ni']?></td>
            <td><a href="javascript:void (0)" onclick="shan(<?php echo $arr['id']?>)">删除</a>||
                <a href="rixia.php?uploads=<?php echo $arr['q_filename']?>">下载</a></td>
        </tr>
    <?php }?>
</table>
<button onclick="quan()">全选</button>
<button onclick="fan()">反选</button>
<button onclick="bu()">不选</button>
<button onclick="pi()">批删</button>
<a href="rishow.php?page=1">首页</a>
<a href="rishow.php?page=<?php echo $last?>">上一页</a>
<a href="rishow.php?page=<?php echo $nest?>">下一页</a>
<a href="rishow.php?page=<?php echo $page_sum?>">尾页</a>
<p>当前页<?php echo $page?></p>
<p>共<?php echo $page_sum?></p>
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
    function shan(str){
        var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++){
            if(confirm('删吗？')){
                location.href='rishan.php?str='+str;
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
        if(confirm('删吗？')){
            location.href='rishan.php?str='+str;
        }
    }
</script>