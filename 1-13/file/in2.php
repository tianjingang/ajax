<?php
header('content-type:text/html;charset=utf8');
//接值
$fname=$_POST['fname'];
$filename=$_FILES['filename'];
$desc=$_POST['desc'];
$boss=$_POST['boss'];
//打印
//print_r($_POST);
//print_r($_FILES);
/*Array
(
    [filename] =&gt; Array
        (
            [name] =&gt; 313250.jpg
            [type] =&gt; image/jpeg
            [tmp_name] =&gt; C:\Windows\Temp\php4802.tmp
            [error] =&gt; 0
            [size] =&gt; 109216
        )

)
*/
//临时文件路径
$tmp_name=$filename['tmp_name'];
//指定文件路径
$path='image/'.$filename['name'];
//移动文件路径
move_uploaded_file($tmp_name,$path);
//连接数据库
$link=mysqli_connect("127.0.0.1","root","root","school");
//设置字符集
mysqli_query($link,'set names utf8');
//设置执行语句
$sql="insert into feng (f_name,f_face,f_desc,f_boss) VALUES ('$fname','$path','$desc','$boss')";
$re=mysqli_query($link,$sql);
if($re){
    header('location:show2.php');
}
else{
    header('location:form2.php');
}






?>