<?php
header('content-type:text/html;charset=utf8');
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
$search=isset($_GET['search'])?$_GET['search']:'';
$search1=isset($_GET['search1'])?$_GET['search1']:'';
$id=isset($_GET['id'])?$_GET['id']:'';
$sqldel="delete from book where id in($id)";
$redel=mysqli_query($link,$sqldel);
//查询语句
$sql="select count(*) num from book inner join type on book.b_type=type.t_id where book.b_name like '%$search%' and book.b_type like '%$search1%'";
$re=mysqli_query($link,$sql);
$al=mysqli_fetch_assoc($re);
//获取总条数
$count=$al['num'];
//每页条数
$page_num=4;
//总页数
$sum_page=ceil($count/$page_num);
//获取当前页
$page=isset($_GET['page'])?$_GET['page']:1;
//上一页
$last=$page-1<1?1:$page-1;
//下一页
$nest=$page+1>$sum_page?$sum_page:$page+1;
//偏移量
$page_limit=($page-1)*$page_num;
//语句
$sql2="select * from book inner join type on book.b_type=type.t_id where book.b_name like '%$search%' and book.b_type like '%$search1%' limit $page_limit,$page_num";
$res=mysqli_query($link,$sql2);
?>
<div id="div1">
    <select name="search1">
        <option value="">请选择</option>
        <?php
       //语句
        $s="select * from type";
        $r=mysqli_query($link,$s);
        while($ar=mysqli_fetch_assoc($r)){
            if($ar['t_id']==$search1){
                echo "<option value='".$ar['t_id']."' selected>".$ar['type']."</option>";

            }
            echo "<option value='".$ar['t_id']."'>".$ar['type']."</option>";
        }
        ?>
    </select>类型
    <input type="search" value="<?php echo $search?>" name="search"/>图书名称
    <button onclick="page(1)">搜索</button>
    <table border="1">
        <tr>
            <td>编号</td>
            <td>图书名称</td>
            <td>图书类型</td>
            <td>图书封面</td>
            <td>图书作者</td>
            <td>操作</td>
        </tr>
        <?php while($arr=mysqli_fetch_assoc($res)){?>
        <tr>
            <td><input type="checkbox" value="<?php echo $arr['id']?>" name="box"/><?php echo $arr['id']?></td>
            <td><?php echo $arr['b_name']?></td>
            <td><?php echo $arr['type']?></td>
            <td><img src="<?php echo $arr['b_face']?>" alt="" height="100" width="100"/></td>
            <td><?php echo $arr['b_author']?></td>
            <td><a href="javascript:void(0) " onclick="del(<?php echo $page?>,<?php echo $arr['id']?>)">删除</a></td>
        </tr>
        <?php }?>
    </table>
    <p><button onclick="quan()">全选</button>
    <button onclick="fan()">反选</button>
    <button onclick="bu()">不选</button>
    <button onclick="pi(<?php echo $page?>)">批删</button></p>
    <a href="javascript:void(0)"onclick="page(1)">首页</a>
    <a href="javascript:void(0)"onclick="page(<?php echo $last?>)">上一页</a>
    <a href="javascript:void(0)"onclick="page(<?php echo $nest?>)">下一页</a>
    <a href="javascript:void(0)"onclick="page(<?php echo $sum_page?>)">尾页</a>
</div>
<script>
    //分页
    function page(page){
        var search=document.getElementsByName('search')[0].value;
        var search1=document.getElementsByName('search1')[0].value;
        var ajax=new XMLHttpRequest();
        ajax.open('get','bshow.php?page='+page+'&search='+search+'&search1='+search1);
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4&ajax.status==200){
                document.getElementById('div1').innerHTML=ajax.responseText;
            }
        }
    }
    //单删
    function del(page,id){
        var search=document.getElementsByName('search')[0].value;
        var search1=document.getElementsByName('search1')[0].value;
        var ajax=new XMLHttpRequest();
        ajax.open('get','bshow.php?page='+page+'&id='+id+'&search='+search+'&search1='+search1);
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4&ajax.status==200){
                document.getElementById('div1').innerHTML=ajax.responseText;
            }
        }
    }
    //批删
    function pi(){
        var search=document.getElementsByName('search')[0].value;
        var search1=document.getElementsByName('search1')[0].value;
        var box=document.getElementsByName('box');
        var str='';
        for(var i=0;i<box.length;i++){
            if(box[i].checked==true){
                str=str+','+box[i].value;
            }
        }
        str=str.substr(1);
        var ajax=new XMLHttpRequest();
        ajax.open('get','bshow.php?page='+page+'&id='+str+'&search='+search+'&search1='+search1);
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4&ajax.status==200){
                document.getElementById('div1').innerHTML=ajax.responseText;
            }
        }
    }
    //全选
    function quan(){
        var search=document.getElementsByName('search')[0].value;
        var search1=document.getElementsByName('search1')[0].value;
        var box=document.getElementsByName('box');
        var ajax=new XMLHttpRequest();
        ajax.open('get','bshow.php?page='+page+'&search='+search+'&search1='+search1);
        ajax.send();
        ajax.onreadystatechange=function(){
            for(var i=0;i<box.length;i++){
                box[i].checked=true;
            }
            }
        }
    //反选
    function fan(){
        var search=document.getElementsByName('search')[0].value;
        var search1=document.getElementsByName('search1')[0].value;
        var box=document.getElementsByName('box');
        var ajax=new XMLHttpRequest();
        ajax.open('get','bshow.php?page='+page+'&search='+search+'&search1='+search1);
        ajax.send();
        ajax.onreadystatechange=function(){
            for(var i=0;i<box.length;i++){
                box[i].checked=!box[i].checked;
            }
        }
    }
    //不选
    function bu(){
        var search=document.getElementsByName('search')[0].value;
        var search1=document.getElementsByName('search1')[0].value;
        var box=document.getElementsByName('box');
        var ajax=new XMLHttpRequest();
        ajax.open('get','bshow.php?page='+page+'&search='+search+'&search1='+search1);
        ajax.send();
        ajax.onreadystatechange=function(){
            for(var i=0;i<box.length;i++){
                box[i].checked=false;
            }
        }
    }

</script>