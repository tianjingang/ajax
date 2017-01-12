<?php
//接受前台的值
//接受前台的路径
$path=$_GET['upload'];
//获取文件的类型
$file=getimagesize($path);
//print_r($file);
$filetype=$file['mime'];
//通过header获取文件类型
header('content-type:'.$filetype);
//弹出下载窗口
header('content-Disposition:attachment;z_file='.$path);
//读取文件
readfile($path);







?>