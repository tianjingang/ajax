<?php
header('content-type:text/html;charset=utf8');
//连接库
$link=mysqli_connect("127.0.0.1","root","root","school");
//字符集
mysqli_query($link,'set names utf8');
$sql="select count(*) num from xitong";
$re=mysqli_query($link,$sql);
$arr=mysqli_fetch_assoc($re);
//获取总条数
$sum_page=$arr['num'];
//echo $sum_page;die;
//设置每页条数
$page_num=3;
//获取页数
$page_sum=ceil($sum_page/$page_num);
//获取当前页
$page=isset($_GET['page'])?$_GET['page']:1;
//获取偏移量
$page_limit=($page-1)*$page_num;
//上一页
$last=$page-1<1?1:$page-1;
//下一页
$nest=$page+1>$page_sum?$page_sum:$page+1;
$sql2="select * from xitong limit $page_limit,$page_num";
$res=mysqli_query($link,$sql2);
?>
<table border="1">
    <tr>
        <td>编号</td>
        <td>登录名</td>
        <td>类型</td>
        <td>IP地址</td>
        <td>日志描述</td>
        <td>时间</td>
        <td>操作</td>
    </tr>
    <?php while($arr1=mysqli_fetch_assoc($res)){?>
    <tr>
        <td><input type="checkbox" value="<?php echo $arr1['id']?>" name="box"/><?php echo $arr1['id']?></td>
        <td><?php echo $arr1['x_name']?></td>
        <td><?php echo $arr1['x_type']?></td>
        <td><?php echo $arr1['x_IP']?></td>
        <td><?php echo $arr1['x_desc']?></td>
        <td><?php echo $arr1['x_time']?></td>
        <td><a href="javascript:void (0)" onclick="shan1(<?php echo $arr1['id']?>)">删除</a></td>
    </tr>
    <?php }?>
</table>
<button onclick="quan()">全选</button>
<button onclick="fan()">反选</button>
<button onclick="bu()">不选</button>
<button onclick="pi()">批删</button>
<select name="pages" onchange="page()">
    <?php for($i=1;$i<$page_sum;$i++) { ?>
        <option value="<?php echo $i?>"><?php echo $i?></option>
    <?php }?>
</select>
<script>
    function page(page){
        var page=document.getElementsByName('pages')[0].value;
        location.href='rishow1.php?page='+page;
    }
</script>
<script>
    //单删
    function shan1(str){
        var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++){
            if(confirm('删除吗')){
                location.href='shan1.php?str='+str;
            }
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
        for(var i=0;i<box.length;i++) {
            box[i].checked = !box[i].checked;
        }
    }
    //不选
    function bu(){
        var box=document.getElementsByName('box');
        for(var i=0;i<box.length;i++){
            box[i].checked=false;
        }
    }
//批删
    function pi(str){
        var  box=document.getElementsByName('box');
        var str='';
        for(var i=0;i<box.length;i++){
            if(box[i].checked==true){
                str=str+','+box[i].value;
            }
        }
        str=str.substr(1);
        if(confirm('删吗')){
            location.href='shan1.php?str='+str;
        }
    }
</script>
<p><a href="rishow1.php?page=1">首页</a>
    <a href="rishow1.php?page=<?php echo $last?>">上一页</a>
    <a href="rishow1.php?page=<?php echo $nest?>">下一页</a>
    <a href="rishow1.php?page=<?php echo $page_sum?>">末页</a>
    当前第<font color="red"><?php echo $page?></font>页 总<?php echo $page_sum?>页 共<?php echo $sum_page?>条数据

</p>
