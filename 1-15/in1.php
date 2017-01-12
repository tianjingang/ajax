<?php
header('content-type:text/html;charset=utf8');
//接值
$bookname=$_POST['bookname'];
$filename=$_FILES['filename'];
$date=$_POST['date'];
$person=$_POST['person'];
$desc=$_POST['desc'];
//打印
//print_r($_POST);die;
//print_r($_FILES);
/*Array
(
    [filename] =&gt; Array
(
    [name] =&gt; 0d338744ebf81a4c8575a163d72a6059242da6d1[1].jpg
            [type] =&gt; image/jpeg
            [tmp_name] =&gt; C:\Windows\Temp\php2F98.tmp
            [error] =&gt; 0
            [size] =&gt; 95066
        )

)*/
//临时文件路径
$tmp_name=$filename['tmp_name'];
//指定文件路径
$path='image/'.$filename['name'];
//移动文件路径
move_uploaded_file($tmp_name,$path);
//连接库
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf-8');
//编写语句
$sql="insert into zongxi(z_name,z_file,z_person,z_date)VALUES ('$bookname','$path','$person','$date')";
$re=mysqli_query($link,$sql);
if($re){
    echo "成功";
    header('location:show1.php');
}
else{
    echo "失败";
    header('location:in1.php');
}





?>