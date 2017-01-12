<?php
header('content-type:text/html;charset=utf8');
//接值
$order=$_POST['order'];
$photoname=$_POST['photoname'];
$filename=$_FILES['filename'];
$author=$_POST['author'];
$addman=$_POST['addman'];
$desc=$_POST['desc'];
$boss=$_POST['boss'];
$te=$_POST['te'];
//打印
//print_r($_POST);die;
//print_r($filename);die;
/*Array
(
    [name] =&gt; 0d338744ebf81a4c8575a163d72a6059242da6d1[1].jpg
    [type] =&gt; image/jpeg
    [tmp_name] =&gt; C:\Windows\Temp\php612B.tmp
    [error] =&gt; 0
    [size] =&gt; 95066
)
*/
//临时文件路径
$tmp_name=$filename['tmp_name'];
//指定文件路径
$path='image/'.$filename['name'];
//移动文件路径
move_uploaded_file($tmp_name,$path);
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
$sql="insert into sousuo(s_order,s_photoname,s_filename,s_author,s_addman,s_desc,s_boss,s_te)VALUES ('$order','$photoname','$path','$author','$addman','$desc','$boss','$te')";
$re=mysqli_query($link,$sql);
if($re){
    echo "true";
    header('refresh:2;url=rishow.php');
}
else{
    echo "false";
    header('refresh:2;url=rikao.php');
}





?>