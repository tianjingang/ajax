<?php
header('content-type:text/html;charset=utf8');
//接值
$username=$_POST['username'];
$type=$_POST['type'];
$filename=$_FILES['filename'];
$author=$_POST['author'];
$date=date('Y-m-d h:i:s',time());
//print_r($_POST);
//print_r($_FILES);die;
/*<body>Array
(
    [filename] =&gt; Array
(
    [name] =&gt; 0fc91493259f428c7d01cae1abc21b26_510.jpg
            [type] =&gt; image/jpeg
            [tmp_name] =&gt; C:\Windows\Temp\phpED33.tmp
            [error] =&gt; 0
            [size] =&gt; 52537
        )

)
</body>*/
//临时文件路径
$tmp_name=$filename['tmp_name'];
//指定文件路径
$path='image/'.$filename['name'];
//移动文件路径
move_uploaded_file($tmp_name,$path);
//连库
$link=mysqli_connect("127.0.0.1","root","root","school");
mysqli_query($link,'set names utf8');
//执行语句
$sql="insert into book(b_name,b_type,b_face,b_author)VALUES ('$username','$type','$path','$author')";
//echo $sql;die;
$re=mysqli_query($link,$sql);
if($re){
    echo "添加成功";
    header('location:bshow.php');
}
else{
    echo "添加失败";
    header('location:book.php');
}


?>