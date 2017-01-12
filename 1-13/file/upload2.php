<?php
//接受前台的值
//接受前台的路径
$path=$_GET['upload2'];
//获取文件的类型
$file=getimagesize($path);
//print_r($file);die;
/*Array ( [0] => 1366 [1] => 768 [2] => 2 [3] => width="1366" height="768" [bits] => 8 [channels] => 3 [mime] => image/jpeg ) */
$filetype=$file['mime'];
//通过header获取文件类型
header('content-type:'.$filetype);
//通过header激活下载窗口
header('content-Disposition:attachment;f_face='.$path);
//读取文件
readfile($path);

?>