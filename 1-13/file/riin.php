<?php
header('content-type:text/html;charset=utf8');
//接值
$filename=$_FILES['filename'];
$nic=$_POST['ni'];
$mym=$_POST['my'];
$xianx=$_POST['xian'];
//var_dump($_POST);die;
//打印
//print_r($_POST);
//print_r($_FILES);
/*<body>Array
(
    [filename] =&gt; Array
(
    [name] =&gt; 0d338744ebf81a4c8575a163d72a6059242da6d1[1].jpg
            [type] =&gt; image/jpeg
            [tmp_name] =&gt; C:\Windows\Temp\phpBFE1.tmp
            [error] =&gt; 0
            [size] =&gt; 95066
        )

)
</body>*/
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
//执行语句
$sql="insert into qq(q_filename,q_ni,q_my,q_xian) VALUES ('$path','$nic','$mym','$xianx')";
$re=mysqli_query($link,$sql);
if($re){
    header('location:rishow.php');
}
else{
    header('location:rikao.php');
}






?>