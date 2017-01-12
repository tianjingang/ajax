<?php
//接收文件路径
$path=$_GET['upload'];
//获取文件类型
$file=getimagesize('$path');
//print_r($file);die;
$filetype=$file['mime'];
//通过header读取文件类型
header('content-type:'.$filetype);
//弹出下载窗口
header('content-Disposition:attachment;s_filename='.$path);
//读取文件
readfile($path);






?>