 <?php
 header('content-type:text/html;charset=utf8');
 //连库
 $link=mysqli_connect("127.0.0.1","root","root","school");
 mysqli_query($link,'set names utf8');
 $search=isset($_GET['search'])?$_GET['search']:'';
 $id=isset($_GET['id'])?$_GET['id']:'';
 $sqldel="delete from ri21 where id in ($id)";
 mysqli_query($link,$sqldel);
 //语句
 $sql="select count(*) as num from ri21 where x_title like '%$search%'";
 $re=mysqli_query($link,$sql);
 $ar=mysqli_fetch_assoc($re);
 //获取总条数
 $count=$ar['num'];
 //echo $count;die;
 //每页条数
 $page_num=5;
 //总页数
 $sum_page=ceil($count/$page_num);
 //echo $sum_page;die;
 //获取当前页
 $page=isset($_GET['page'])?$_GET['page']:1;
 //上一页
 $last=$page-1<1?1:$page-1;
 //下一页
 $nest=$page+1>$sum_page?$sum_page:$page+1;
 //偏移量
 $page_limit=($page-1)*$page_num;
 //语句
 $sql2="select * from ri21 where x_title like '%$search%' limit $page_limit,$page_num";
 $res=mysqli_query($link,$sql2);
 ?>
 <div id="div1">
 <p>关键字<input type="search" value="<?php echo $search?>" name="search"/>
 <button onclick="page(1)">搜索</button>
 </p>
 <table border="1">
     <tr>
         <td>编号</td>
         <td>标题</td>
         <td>出版社</td>
         <td>操作</td>
     </tr>
     <?php while($arr=mysqli_fetch_assoc($res)){?>
     <tr>
         <td><?php echo $arr['id']?></td>
         <td><?php echo $arr['x_title']?></td>
         <td><?php echo $arr['x_copy']?></td>
         <td><a href="javascript:void(0)" onclick="rishan(<?php echo $page?>,<?php echo $arr['id']?>)">删除</a></td>
     </tr>
     <?php }?>
 </table>
     <!--<a href="javascript:void(0)" onclick="page(1)">首页</a>
     <a href="javascript:void(0)" onclick="page(<?php /*echo $last*/?>)">上一页</a>
     <a href="javascript:void(0)" onclick="page(<?php /*echo $nest*/?>)">下一页</a>
     <a href="javascript:void(0)" onclick="page(<?php /*echo $sum_page*/?>)">尾页</a>-->
     <?php if($search){?>
         <?php for($i=1;$i<=$sum_page;$i++){?>
             <a href="rikao.php?page=<?php echo $i?>&search=<?php echo $search?>"><?php echo $i?></a>
             <?php }?>
     <?php }else{
         ?>
         <?php for($i=1;$i<=$sum_page;$i++){?>
             <a href="rikao.php?page=<?php echo $i?>"><?php echo $i?></a>

         <?php }?>
     <?php }?>
 </div>
 <script>
     //分页
     function page(page){
         var search=document.getElementsByName('search')[0].value;
         var ajax=new XMLHttpRequest();
         ajax.open('get','rikao.php?page='+page+'&search='+search);
         ajax.send();
         ajax.onreadystatechange=function(){
             if(ajax.readyState==4&ajax.status==200){
                 document.getElementById('div1').innerHTML=ajax.responseText;
             }
         }
     }
     //单删
     function rishan(page,id){
         var search=document.getElementsByName('search')[0].value;
         var ajax=new XMLHttpRequest();
         ajax.open('get','rikao.php?page='+page+'&id='+id+'&search='+search);
         ajax.send();
         ajax.onreadystatechange=function(){
             if(ajax.readyState==4&ajax.status==200){
                 document.getElementById('div1').innerHTML=ajax.responseText;
             }
         }
     }


 </script>
