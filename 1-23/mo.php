<meta charset="utf-8">
<form action="moin.php" method="post" onsubmit="return checkall()">
    <table border="1">
        <tr>
            <td>姓名</td>
            <td><input type="text" name="m_name" onblur="check1()"/><span id="sp1"></span></td>
        </tr>
        <tr>
            <td>班级</td>
            <td>
                <select name="m_class">
                    <option value="">请选择</option>
                    <?php
                    //连库
                    $link=mysqli_connect("127.0.0.1","root","root","school");
                    mysqli_query($link,'set names utf8');
                    //语句
                    $sql="select * from ban";
                    $re=mysqli_query($link,$sql);
                   while($arr=mysqli_fetch_assoc($re)){
                       echo "<option value='".$arr['r_id']."'>".$arr['b_class']."</option >";
                   }
                    ?>
                </select>
                <span id="sp2"></span></td>
        </tr>
        <tr>
            <td>学号</td>
            <td><input type="text" name="m_num" onblur="check3()"/><span id="sp3"></span></td>
        </tr>
        <tr>
            <td>性别</td>
            <td><input type="radio" name="sex" value="男" />男
                <input type="radio" name="sex" value="女" />女
                <span id="sp4"></span>
            </td>
        </tr>
        <tr>
            <td>爱好</td>
            <td><input type="checkbox" name="hobby[]" value="吃饭" />吃饭
                <input type="checkbox" name="hobby[]" value="睡觉" />睡觉
                <input type="checkbox" name="hobby[]" value="打豆豆" />打豆豆
                <input type="checkbox" name="hobby[]" value="看电视" />看电视
                <span id="sp5"></span>
            </td>
        </tr>
        <tr>
            <td>简介</td>
            <td><textarea rows="5" cols="10" name="myself" onblur="check6()"></textarea>
            <span id="sp6"></span>
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="提交"/></td>
            <td></td>
        </tr>
    </table>
</form>
<script>
    //自定义
    function $(id){
        return document.getElementById(id);
    }
    //验证姓名
    function check1(){
        var m_name=document.getElementsByName('m_name')[0].value;
        if(m_name==''){
            $('sp1').innerHTML="不能为空";
            $('sp1').style.color="red";
            return false;
        }
        else{
            $('sp1').innerHTML="ok";
            $('sp1').style.color="red";
            return true;
        }
    }
    //验证班级
    function check2(){
        var m_class=document.getElementsByName('m_class')[0].value;
        if(m_class==''){
            $('sp2').innerHTML="不能为空";
            $('sp2').style.color="red";
            return false;
        }
        else{
            $('sp2').innerHTML="ok";
            $('sp2').style.color="red";
            return true;
        }
    }//验证学号
    function check3(){
        var m_num=document.getElementsByName('m_num')[0].value;
        if(m_num==''){
            $('sp3').innerHTML="不能为空";
            $('sp3').style.color="red";
            return false;
        }
        else{
            $('sp3').innerHTML="ok";
            $('sp3').style.color="red";
            return true;
        }
    }
    //验证简介
    function check6(){
        var myself=document.getElementsByName('myself')[0].value;
        if(myself==''){
            $('sp6').innerHTML="不能为空";
            $('sp6').style.color="red";
            return false;
        }
        else{
            $('sp6').innerHTML="ok";
            $('sp6').style.color="red";
            return true;
        }
    }



    function checkall() {
        //验证性别
        var sex = document.getElementsByName('sex');
        var str = 0;
        for (var i = 0; i < sex.length; i++) {
            if (sex[i].checked == true) {
                str = str + 1;
            }
        }
        if (str<1) {

            $('sp4').innerHTML = "至少选一项";
            $('sp4').style.color = "red";
            return false;
        }
        else {

            $('sp4').innerHTML = "ok";
            $('sp4').style.color = "red";
        }


        //验证爱好
        var sp5=document.getElementById('sp5');
        var hobby=document.getElementsByName('hobby[]');
        var str=0;
        for(var i=0;i<hobby.length;i++){
                if(hobby[i].checked==true){
                    str=str+1;
                }
            }
            if(str>2){
                $('sp5').innerHTML="ok";
                $('sp5').style.color="red";
            }
            else{
                $('sp5').innerHTML="至少选二项";
                $('sp5').style.color="red";
                return false;
            }
        if(check1()&check2()&check3()&check6()) {
            return true;
        }
        else{
            return false;
        }
    }

</script>