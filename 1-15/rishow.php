<?php
header('content-type:text/html;charset=utf8');
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
if(isset($_POST['search'])){
    $search = isset($_POST['search']) ? $_POST['search'] : '';
}else{
    $search = isset($_GET['search']) ? $_GET['search'] : '';
}
if($search){
    $sql="select count(*) num from sousuo where s_author like '%$search%'";
    $re=mysqli_query($link,$sql);
    $ar=mysqli_fetch_assoc($re);
}else{
    $sql="select count(*) num from sousuo";
    $re=mysqli_query($link,$sql);
    $ar=mysqli_fetch_assoc($re);
}
//获取总条数
$sum_page=$ar['num'];
//设置每页显示条数
$page_num=2;
//获取页数
$page_sum=ceil($sum_page/$page_num);
//获取当前页
$page=isset($_GET['page'])?$_GET['page']:1;
//获取偏移量
$page_limit=($page-1)*$page_num;
//获取偏移量再查询
  if($search){
    $sql2="select * from sousuo where s_author like '%$search%' limit $page_limit,$page_num";
      $res=mysqli_query($link,$sql2);
}else{
    $sql2="select * from sousuo limit $page_limit,$page_num";
      $res=mysqli_query($link,$sql2);
}
//上一页
$last=$page-1<1?1:$page-1;
//下一页
$next=$page+1>$page_sum?$page_sum:$page+1;
?>
<p>欢迎Ggg<a href="#">注销</a></p>
<table border="1">
    <tr>
        <td><input type="checkbox" name="run" onclick="lick()"/>全选</td>
        <td>自动序号</td>
        <td>序列</td>
        <td>名称</td>
        <td>图片</td>
        <td>作者</td>
        <td>添加人</td>
        <td>描述</td>
        <td>权限</td>
        <td>特定信息</td>
        <td>操作</td>
    </tr>
    <?php while($arr=mysqli_fetch_assoc($res)){ ?>
        <tr>
            <td><input type="checkbox" value="<?php echo  $arr['id']?>" name="box" /><?php echo  $arr['id']?></td>
            <td><?php echo $arr['id']?></td>
            <td><?php echo $arr['s_order']?></td>
            <td><?php echo $arr['s_photoname']?></td>
            <td><img src="<?php echo $arr['s_filename']?>" alt="" width="100" height="100"/></td>
            <td><?php echo $arr['s_author']?></td>
            <td><?php echo $arr['s_addman']?></td>
            <td><?php echo $arr['s_desc']?></td>
            <td><?php echo $arr['s_boss']?></td>
            <td><?php echo $arr['s_te']?></td>
            <td><a href="javascript:void (0)" onclick="rishan(<?php echo $arr['id']?>)">删除</a>
                <a href="rixia.php?upload=<?php echo $arr['s_filename']?>">下载</a></td>
        </tr>
    <?php } ?>
    <tr>
        <td><input type="checkbox" name="run" onclick="run()"/>全选</td>
        <td><button onclick="quan()">全选</button></td>
        <td><button onclick="fan()">反选</button></td>
        <td><button onclick="pi()">删除</button></td>
        <td><a href="rikao.php">添加</a></td>
        <td><button onclick="search()">搜索</button></td>
    </tr>
</table>
<?php if($search){ ?>
    <a href="rishow.php?page=1&search=<?php echo $search?>">首页</a>
        <a href="rishow.php?page=<?php echo $last?>&search=<?php echo $search?>">上一页</a>
        <a href="rishow.php?page=<?php echo $next?>&search=<?php echo $search?>">下一页</a>
        <a href="rishow.php?page=<?php echo $page_sum?>&search=<?php echo $search?>">尾页</a>
<?php }else{ ?>
    <a href="rishow.php?page=1">首页</a>
        <a href="rishow.php?page=<?php echo $last?>">上一页</a>
        <a href="rishow.php?page=<?php echo $next?>">下一页</a>
        <a href="rishow.php?page=<?php echo $page_sum?>">尾页</a>


<?php }?>
当前<?php echo $page?>页共<?php echo $page_sum?>页

<script>
    function search(){
        location.href="risou.php";
    }
    //单删
    function rishan(str){
        var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++){
            if(confirm('确定删除吗')){
                location.href='rishan.php?str='+str;
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
        if(confirm('确定删除吗')){
            location.href='rishan.php?str='+str;
        }
    }
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
            box[i].checked=! box[i].checked;
        }

    }
    //联动1
    function lick(){
        var run=document.getElementsByName('run')[0];
        var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++)
        {if(run.checked==true){
            box[i].checked=true;
        }
            else{
            box[i].checked=false;
        }
        }
    }
    //联动2
    function run(){
        var run=document.getElementsByName('run')[1];
        var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++)
        {if(run.checked==true){
            box[i].checked=true;
        }
        else{
            box[i].checked=false;
        }
        }
    }

</script>