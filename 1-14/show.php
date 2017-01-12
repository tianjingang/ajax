<?php
header('content-type:text/html;charset=utf8');
//连接库
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_select_db($link,'set names utf8');
//执行语句
$sql="select count(*) num from xinxi";
$re=mysqli_query($link,$sql);
$arr=mysqli_fetch_assoc($re);
//获取总条数
$page_sum=$arr['num'];
//设置每页条数
$page_num=5;
//获取页数
$sum_page=ceil($page_sum/$page_num);
//获取当前页面
$page=isset($_GET['page'])? $_GET['page']:1;
//获取偏移量
$page_limit=($page-1)*$page_num;
//再查询
$sql2="select * from xinxi limit $page_limit,$page_num";
$res=mysqli_query($link,$sql2);
//获取上一页
$last=$page-1<1?$page:$page-1;
//获取下一页
$nest=$page+1>$sum_page?$sum_page:$page+1;
?>
<div id="div1">
<table border="1">
    <tr>
        <td>ID</td>
        <td>姓名</td>
        <td>密码</td>
        <td>email</td>
        <td>QQ</td>
        <td>身份证号码</td>
        <td>内容</td>
        <td>操作</td>
    </tr>
    <?php while($arr=mysqli_fetch_assoc($res)){?>
        <tr>
            <td><input type="checkbox"  value="<?php echo $arr['id']?>" name="box"/><?php echo $arr['id']?></td>
            <td><?php echo $arr['l_name']?></td>
            <td><?php echo $arr['l_pwd']?></td>
            <td><?php echo $arr['l_email']?></td>
            <td><?php echo $arr['l_qq']?></td>
            <td><?php echo $arr['l_num']?></td>
            <td><?php echo $arr['l_my']?></td>
            <td><a href='javascript:void (0)' onclick="shan(<?php echo $arr['id'] ?>)">删除</a></td>
        </tr>
    <?php }?>
</table>

<button onclick="quan()">全选</button>
<button onclick="fan()">反选</button>
<button onclick="bu()">不选</button>
<button onclick="pi()">批删</button>
<select name="pages" onchange="page()">
    <?php
    for($i=0;$i<$sum_page;$i++){?>
        <option value="<?php echo $i?>"><?php echo $i?></option>
    <?php }?>
</select>
<p><a href="javascript:void (0)" onclick="page(1)">首页</a>
    <a href="javascript:void (0)" onclick="page(<?php echo $last?>)">上一页</a>
    <a href="javascript:void (0)" onclick="page(<?php echo $nest?>)">下一页</a>
    <a href="javascript:void (0)" onclick="page(<?php echo $sum_page?>)">尾页</a>
</p>
<p>当前页是第<?php echo $page?>页</p>
<p>共<?php echo $sum_page?>页</p>  </div>
<script>
    function page(page){
        var page=document.getElementsByName('pages')[0].value;
        location.href='show.php?page='+page;
    }
</script>
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
        var  box=document.getElementsByName('box');
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
            if(confirm('确定删除所选项吗？')){
                location.href='shan.php?str='+str;
            }
        }
    }
    //批删
    function pi(str){
        var box=document.getElementsByName('box');
        var str='';
        for(var i=0;i<box.length;i++){
            if(box[i].checked==true) {
                str = str + ',' + box[i].value;
            }
        }
        str=str.substr(1);
        if(confirm('确定批量删除')){
            location.href='shan.php?str='+str;
        }


    }
    function page(page){
        var ajax=new XMLHttpRequest();
        ajax.open('get','show.php?page='+page);
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4&&ajax.status==200){
                document.getElementById('div1').innerHTML=ajax.responseText;
            }
        }
    }
</script>