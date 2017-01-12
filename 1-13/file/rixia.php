<?php
header('content-type:text/html;charset=utf8');
//接受前台的路径
$path=$_GET['uploads'];
//获取文件的类型
$file=getimagesize($path);
//print_r($file);die;
/*Array ( [0] => 1366 [1] => 768 [2] => 2 [3] => width="1366" height="768" [bits] => 8 [channels] => 3 [mime] => image/jpeg ) */
$filetype=$file['mime'];
//通过header获取文件类型
header('content-type:'.$filetype);
//激活下载窗口
header('content-type-Disposition:attachment;q_filename='.$path);
//读取文件
readfile($path);




?>