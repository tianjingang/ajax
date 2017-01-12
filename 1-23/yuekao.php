<meta charset="utf-8">
<form action="yshow.php" method="post" onsubmit="return checkall()">
    <h1>用户登录</h1>
    <table>
        <tr>
            <td>用户名</td>
            <td><input type="text" name="username" onblur="check1()"/><span id="sp1"></span></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="password" name="pwd" onblur="check2()"/><span id="sp2"></span></td>
        </tr>
        <tr>
            <td><input type="submit" value="登录"/></td>
        </tr>
    </table>
</form>
<script>
    //自定义
    function $(id){
        return document.getElementById(id);
    }
   /* //验证用户名
    function check1(){
        var username=document.getElementsByName('username')[0].value;
        if(username==''){
            sp1.innerHTML="不能为空";
            sp1.style.color="red";
            return false;
        }
        else{
            var username=document.getElementsByName('username')[0].value;
            var ajax=new XMLHttpRequest();
            ajax.open('get','y_pi.php?username='+username);
            ajax.send();
            ajax.onreadystatechange=function(){
                if(ajax.readyState==4&ajax.status==200){
                    if(ajax.responseText==1){
                        sp1.innerHTML="可以使用";
                        sp1.style.color="red";
                        return true;
                    }
                    else{
                        sp1.innerHTML="用户名不存在";
                        sp1.style.color="red";
                        return false;
                    }

                }
            }


        }
        return true;
    }*/
    //验证用户名
    var fil=false;
    function check1(){
        var username=document.getElementsByName('username')[0].value;
        if(username==''){
            sp1.innerHTML="不能为空";
            sp1.style.color="red";
            return false;
        }
        else{
            var username=document.getElementsByName('username')[0].value;
            var ajax=new XMLHttpRequest();
            ajax.open('get','y_pi.php?username='+username);
            ajax.send();
            ajax.onreadystatechange=function(){
                if(ajax.readyState==4&ajax.status==200){
                    if(ajax.responseText==1){
                        sp1.innerHTML="可以使用";
                        sp1.style.color="red";
                        fil=true;
                    }
                    else{
                        sp1.innerHTML="用户名不存在";
                        sp1.style.color="red";
                        fil=false;
                    }
                }
            }
            return fil;
        }
    }

    /*//验证密码
    function check2(){
        var pwd=document.getElementsByName('pwd')[0].value;
        if(pwd==''){
            sp2.innerHTML="不能为空";
            sp2.style.color="red";
            return false;
        }
        else{
            var pwd=document.getElementsByName('pwd')[0].value;
            var ajax=new XMLHttpRequest();
            ajax.open('get','y_pei.php?pwd='+pwd);
            ajax.send();
            ajax.onreadystatechange=function(){
                if(ajax.readyState==4&ajax.status==200){
                    if(ajax.responseText==1){
                        sp2.innerHTML="密码正确";
                        sp2.style.color="red";
                        return true;
                    }
                    else{
                        sp2.innerHTML="密码错误";
                        sp2.style.color="red";
                        return false;
                    }

                }
            }


        }
        return true;
    }*/
    var fag=false;
    function check2(){
        var pwd=document.getElementsByName('pwd')[0].value;
        if(pwd==''){
            sp2.innerHTML="不能为空";
            sp2.style.color="red";
            return false;
        }
        else{
            var username=document.getElementsByName('username')[0].value;
            var pwd=document.getElementsByName('pwd')[0].value;
            var ajax=new XMLHttpRequest();
            ajax.open('get','y_pei.php?uname='+username+'&pwd='+pwd);
            ajax.send();
            ajax.onreadystatechange=function(){
                if(ajax.readyState==4&ajax.status==200){
                    if(ajax.responseText==1){
                        sp2.innerHTML="密码正确";
                        sp2.style.color="red";
                        fag=true;
                    }
                    else{
                        sp2.innerHTML="密码错误";
                        sp2.style.color="red";
                        fag=false;
                    }

                }
            }

            return fag;
        }

    }

    function checkall(){
        if(check1()&check2()){
            return true;
        }
        else{
            return false;
        }
    }
</script>
