<?php
header('content-type:text/html;charset=utf-8');
//接值
$user=$_POST['user'];
$pwd=$_POST['pwd'];
$que=$_POST['que'];
$sex=$_POST['sex'];
$email=$_POST['email'];
$city=$_POST['city'];
$phone=$_POST['phone'];
$tel=$_POST['tel'];
$num=$_POST['num'];
$qq=$_POST['qq'];
$my=$_POST['my'];
//验证
$reg="/^[a-z][0-9a-z]{5,10}$/i";
if(preg_match($reg,$user)){
    header('location:show.php');
}
else{
    echo "姓名不合法";
    header('location:zz.html');
}
 $reg="/^\w{6,}$/i";
if(preg_match($reg,$pwd)){
    header('location:show.php');
}
else{
    echo "密码不合法";
    header('location:zz.html');
}
if($pwd!=$que){
    echo "密码和确认密码不一致";
    header('location:zz.html');
}
$reg="/^\d+@\w+\.(com|cn|net)$/";
if(preg_match($reg,$email)){
    header('location:show.php');

}
else{
    echo "邮箱不合法";
    header('location:zz.html');
}
if($city==''){
    echo "城市不能为空";
}
$reg="/^1[358]\d{9}$/i";
if(preg_match($reg,$phone)){
    header('location:show.php');
}
else{
    echo "手机号不合法";
    header('location:zz.html');
}
$reg="/^(\d{3}-\d{8})$/";
if(preg_match($reg,$tel)){
    header('location:show.php');
}
else{
    echo "座机号不合法";
    header('location:zz.html');
}
$reg="/^(\d{15}|\d{18}|\d{17}.x)$/i";
if(preg_match($reg,$num)){
    header('location:show.php');
}
else{
    echo "身份证号不合法";
    header('location:zz.html');
}
$reg="/^\d{8,11}$/";
if(preg_match($reg,$qq)){
    header('location:show.php');
}
else{
    echo "QQ号不合法";
    header('location:zz.html');
}
$reg="/^[\u4e00-\u9fa5]+$/";
if(preg_match($reg,$my)){
    //header('location:show.php');
}
else{
    echo "自我介绍不合法";
    header('location:zz.html');
}
//连接数据库
$link=mysql_connect("127.0.0.1","root","root") or die("连接失败");
//选择数据库
mysql_select_db("school",$link);
//设置字符集
mysql_query("set names utf-8");
//执行语句
$sql="insert into xuexin(x_name,x_pwd,x_que,x_sex,x_email,x_city,x_phone,x_tel,x_num,x_qq,x_my) VALUES ('$user','$pwd','$que','$sex','$email','$city','$phone','$tel','$num','$qq','$my')";
$re=mysql_query($sql);
if($re){
    echo "添加成功";
    header('location:show.php');
}
else{
    echo "添加失败";
    header('location:zz.html');
}



?>