<?php
header('content-type:text/html;charset=utf8');
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
$search=isset($_GET['search'])?$_GET['search']:'';
$search1=isset($_GET['search1'])?$_GET['search1']:'';
$id=isset($_GET['id'])?$_GET['id']:'';
$sqldel="delete from ri23 where id in ($id)";
$redel=mysqli_query($link,$sqldel);
//查询语句
$sql="select count(*) num from ri23 r inner join ban b on r.m_class=b.r_id where r.m_class like '%$search1%'and r.m_num like '%$search%' ";
$re=mysqli_query($link,$sql);
$ar=mysqli_fetch_assoc($re);
//获取总条数
$count=$ar['num'];
//每页条数
$page_num=4;
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
$sql2="select * from ri23 r inner join ban b on r.m_class=b.r_id where r.m_class like '%$search1%'and r.m_num like '%$search%' limit $page_limit,$page_num";
//echo $sql2;die;
$res=mysqli_query($link,$sql2);
?>
<div id="div1">
    <select name="search1">
        <option value="">请选择</option>
        <?php
        //语句
        $sq="select * from ban";
        $r=mysqli_query($link,$sq);
        while($a=mysqli_fetch_assoc($r)){
            if($a['r_id']==$search1){
            echo "<option value='".$a['r_id']."' selected>".$a['b_class']."</option >";
        }else{
            echo "<option value='".$a['r_id']."'>".$a['b_class']."</option >";

        }
        }
        ?>
    </select>班级
    <input type="text" value="<?php echo $search?>" name="search"/>学号
    <button onclick="page(1)">搜索</button>
<table border="1">
    <tr>
        <td>编号</td>
        <td>姓名</td>
        <td>班级</td>
        <td>学号</td>
        <td>性别</td>
        <td>爱好</td>
        <td>简介</td>
        <td>操作</td>
    </tr>
    <?php while($arr=mysqli_fetch_assoc($res)){?>
    <tr>
        <td><?php echo $arr['id']?></td>
        <td><?php echo $arr['m_name']?></td>
        <td><?php echo $arr['b_class']?></td>
        <td><?php echo $arr['m_num']?></td>
        <td><?php echo $arr['m_sex']?></td>
        <td><?php echo $arr['m_hobby']?></td>
        <td><?php echo $arr['m_myself']?></td>
        <td><a href="javascript:void(0)" onclick="del(<?php echo $page?>,<?php echo $arr['id']?>)">删除</a></td>
    </tr>
    <?php }?>
</table>
    <a href="javascript:void(0)" onclick="page(1)">首页</a>
    <a href="javascript:void(0)" onclick="page(<?php echo $last?>)">上一页</a>
    <a href="javascript:void(0)" onclick="page(<?php echo $nest?>)">下一页</a>
    <a href="javascript:void(0)" onclick="page(<?php echo $sum_page?>)">尾页</a>
</div>
<script>
    //分页
    function page(page){
        var search=document.getElementsByName('search')[0].value;
        var search1=document.getElementsByName('search1')[0].value;
        var ajax=new XMLHttpRequest();
        ajax.open('get','moshow.php?page='+page+'&search='+search+'&search1='+search1);
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
        ajax.open('get','moshow.php?page='+page+'&id='+id+'&search='+search+'&search1='+search1);
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4&ajax.status==200){
                document.getElementById('div1').innerHTML=ajax.responseText;
            }
        }

    }
</script>