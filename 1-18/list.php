<div id="div">
    <?php
    header('content-type:text/html;charset=utf-8');
    $name=isset($_GET['name'])?$_GET['name']:'';
    $desc=isset($_GET['desc'])?$_GET['desc']:'';

    //链接数据库
    mysql_connect('127.0.0.1','root','root');
    mysql_select_db('jsyuekao');
    mysql_query('set names utf8');

    //计算总条数
    $sql="select count(*) c from  show1 where `name` like '%$name%' and `desc` like '%$desc%'";
    $re=mysql_query($sql);
    $arr=mysql_fetch_assoc($re);
    $nums=$arr['c'];

    //设置煤业显示的条数
    $length=3;

    //计算总页数
    $pages=ceil($nums/$length);

    //计算当前页面
    $page=isset($_GET['page'])?$_GET['page']:1;

    //上页 下页
    $last=$page<=1?1:$page-1;
    $next=$page>=$pages?$pages:$page+1;

    //计算偏移量
    $offset=($page-1)*$length;

    //遍历
    $sql1="select * from show1 where `name` like '%$name%' and `desc` like '%$desc%' limit $offset,$length";
    //echo $sql1;
    $res=mysql_query($sql1);

    ?>
    名称: <input type="text"id="name"/>
    描述: <input type="text"id="desc"/>
    <input type="button" value="搜索" onclick="checksou()"/>
    <table border="1">
        <tr>
            <td>名称</td>
            <td>描述</td>
            <td>香蕉</td>
            <td>排序</td>
        </tr>
        <?php while($arr1=mysql_fetch_assoc($res)){ ?>
            <tr>
                <td><?php echo $arr1['name']?></td>
                <td><?php echo $arr1['desc']?></td>
                <td><?php echo $arr1['price']?></td>
                <td><?php echo $arr1['sort']?></td>
            </tr>
        <?php }?>
    </table>
    <p>共<?php echo $nums?>数据，共<?php echo $pages?>页，当前第<?php echo $page?>页</p>
    <a href="javascript:;" onclick="page(1)">首页</a>
    <a href="javascript:;" onclick="page(<?php echo $last?>)">上一页</a>
    <a href="javascript:;" onclick="page(<?php echo $next?>)">下一页</a>
    <a href="javascript:;" onclick="page(<?php echo $pages?>)">尾页</a>
</div>
<script type="text/javascript">
    function page(page){

        var xhr= new XMLHttpRequest();
        xhr.open('get','list.php?page='+page);
        xhr.send();
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4&&xhr.status==200){
                document.getElementById('div').innerHTML=xhr.responseText;
            }
        }
    }
    function checksou(){
        var name= document.getElementById('name').value;
        var desc= document.getElementById('desc').value;
        var xhr= new XMLHttpRequest();
        xhr.open('get','list.php?name='+name+'&desc='+desc);
        xhr.send();
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4&&xhr.status==200){
                document.getElementById('div').innerHTML=xhr.responseText;
            }
        }
    }


</script>
