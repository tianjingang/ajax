<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<script type="text/javascript">
    function $(id){
        return document.getElementById(id);
    }

</script>
<form action="list.php" method="post" onsubmit="return checkall()">
    <table>
        <tr>
            <td>用户名</td>
            <td><input type="text" name="username" id="name" onblur="checkname()"/><span id="showname"></span></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="password" name="pwd" id="pwd" onblur="checkpwd()"/><span id="showpwd"></span></td>
        </tr>
        <tr>
            <td><input type="submit" value="登陆"/></td>
            <td></td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    var fil=false;
    function checkname(){
        var username=$('name').value;
        if(username==''){
            $('showname').innerHTML="用户名不能为空";
            $('showname').style.color='red';
            check=false
        }else{
            var xhr= new XMLHttpRequest();
            xhr.open('get','add_name.php?username='+username);
            xhr.send();
            xhr.onreadystatechange=function(){
                if(xhr.readyState==4&&xhr.status==200){
                    // alert(xhr.responseText);
                    if(xhr.responseText==1){
                        $('showname').innerHTML="用户名正确";
                        fil=true;
                    }else{
                        $('showname').innerHTML="用户名错误";
                        fil=false;
                    }
                }
            }
            return fil;
        }
    }
    var check1=false;
    function checkpwd(){
        var pwd=$('pwd').value;
        var username=$('name').value;

        if(pwd==''){
            $('showpwd').innerHTML="密码不能为空";
            $('showpwd').style.color='red';
            check1=false
        }else{
            var xhr= new XMLHttpRequest();
            xhr.open('get','add_pwd.php?username='+username+'&pwd='+pwd);
            xhr.send();
            xhr.onreadystatechange=function(){
                if(xhr.readyState==4  & xhr.status==200){
                    //  alert(xhr.responseText);
                    if(xhr.responseText==1){
                        $('showpwd').innerHTML="密码正确";
                        fil=true
                    }else{
                        $('showpwd').innerHTML="密码错误";
                        fil=false
                    }
                }
            }

            return fil;
        }
    }
    function checkall(){
        if(checkname()&checkpwd()){
            return true;
        }else{
            return false;
        }
    }
</script>
</body>
</html>