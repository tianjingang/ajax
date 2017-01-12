<meta charset="utf-8">
<form action="bin.php" method="post" enctype="multipart/form-data" onsubmit="return checkall()">
    <table border="1">
        <tr>
            <td>名称</td>
            <td><input type="text" name="username" onblur="check1()"/><span name="sp1"></span></td>
        </tr>
        <tr>
            <td>类型</td>
            <td><select name="type" onchange="check2()">
                    <option value="">请选择</option>
                <?php
                //连库
                $link=mysqli_connect("127.0.0.1","root","root","school");
                mysqli_query($link,'set names utf8');
                //语句
                $sq="select * from type";
                $re=mysqli_query($link,$sq);
                while($ar=mysqli_fetch_assoc($re)){
                    echo "<option value='".$ar['t_id']."'>".$ar['type']."</option>";
                }
                ?>
                    </select><span name="sp2"></span>
            </td>
        </tr>
        <tr>
            <td>封面</td>
            <td><input type="file" name="filename" onblur="check3()"/><span name="sp3"></span></td>
        </tr>
        <tr>
            <td>作者</td>
            <td><input type="text" name="author" onblur="check4()"/><span name="sp4"></span></td>
        </tr>
        <tr>
            <td><input type="submit" value="提交"/></td>
            <td></td>
        </tr>
    </table>
</form>
<script>
    var fil=false;
    //验证图书名称
    function check1(){
        var username=document.getElementsByName('username')[0].value;
        var sp1 =document.getElementsByName('sp1')[0];
        if(username==''){
            sp1.innerHTML="不能为空";
            sp1.style.color="red";
            return false;
        }
        else{
            var ajax = new XMLHttpRequest();
            ajax.open('get','book_pro.php?username='+username);
            ajax.send();
            ajax.onreadystatechange=function(){
               if(ajax.readyState==4&&ajax.status==200){
                   if(ajax.responseText==1){
                       sp1.innerHTML="可以使用";
                       sp1.style.color="red";
                       fil=true;
                   }else{
                       sp1.innerHTML="用户名已存在";
                       sp1.style.color="red";
                       fil=false;
                   }
               }
            }
            return fil;
        }
    }
    //验证类型
    function check2(){
        var type=document.getElementsByName('type')[0].value;
        var sp2 =document.getElementsByName('sp2')[0];
        if(type==''){
            sp2.innerHTML="不能为空";
            sp2.style.color="red";
            return false;
        }
        else{
            sp2.innerHTML="对";
            sp2.style.color="red";
            return true;
        }
    }
    //验证封面
    function check3(){
        var filename=document.getElementsByName('filename')[0].value;
        var sp3 =document.getElementsByName('sp3')[0];
        if(filename==''){
            sp3.innerHTML="不能为空";
            sp3.style.color="red";
            return false;
        }
        else{
            sp3.innerHTML="对";
            sp3.style.color="red";
            return true;
        }
    }
    //验证作者
    function check4(){
        var author=document.getElementsByName('author')[0].value;
        var sp4 =document.getElementsByName('sp4')[0];
        if(author==''){
            sp4.innerHTML="不能为空";
            sp4.style.color="red";
            return false;
        }
        else{
            sp4.innerHTML="对";
            sp4.style.color="red";
            return true;
        }
    }
    //验证所有
    function checkall(){
        if(check1()&check2()&check3()&check4()){
            return true;
        }
        else{
            return false;
        }
    }
</script>