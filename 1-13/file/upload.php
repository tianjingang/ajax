<?php
//前台设置路径
//后台接受路径
$path=$_GET['upload'];
//获取文件类型
$files=getimagesize($path);
//print_r($files); die;
$filetype=$files['mime'];
//通过header获取文件类型
header('content-type:'.$filetype);
//激活下载窗口
header('content-Disposition:attachment;filename='.$path);
//读取文件
readfile($path);




?>