<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<h2>1409phpE点名表</h2>
<div id="div1" style="border:2px solid red;width:100px;height:100px;line-height:100px;"></div>
<button onclick="start()">开始</button>
<button onclick="over()">结束</button>
</body>
</html>
<script>
    function ks(){
        var arr = ['刘宁','靳旭东','王久旺','刘伟超','田金刚','赵晓亮'];
        var index = parseInt(Math.random()*arr.length);
        document.getElementById('div1').innerHTML = arr[index];
    }
    function start(){
        p = setInterval('ks()',100);
    }
    function over(){
        clearTimeout(p);
    }
</script>