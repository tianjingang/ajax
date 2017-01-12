<?php
header('content-type:text/html;charset=utf8');
//print_r($_POST);
//print_r($_FILES);
/*Array
(
    [filename] =&gt; Array
(
    [name] =&gt; 44.jpg
            [type] =&gt; image/jpeg
            [tmp_name] =&gt; C:\Windows\Temp\php42B8.tmp
            [error] =&gt; 0
            [size] =&gt; 121940
        )

)*/
//接受前台文件的值
$fname=$_POST['fname'];
$filename=$_FILES['filename'];
//临时文件路径
$tmp_name=$filename['tmp_name'];
//指定文件路径
$path='image/'.$filename['name'];
move_uploaded_file($tmp_name,$path);
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
$sql="insert into files(uploads,filename)VALUES ('$fname','$path')";
$re=mysqli_query($link,$sql);
if($re){
    header('location:show1.php');
}
else{
    header('location:form1.php');

}
?>
