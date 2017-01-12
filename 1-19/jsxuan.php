<meta charset="utf-8">
<p>全选/全不选<input type="checkbox" id="xuan" onclick="checkAll()"/></p>
<p><input type="checkbox" name="data[]"/>生活类</p>
<p><input type="checkbox" name="data[]"/>家具类</p>
<p><input type="checkbox" name="data[]"/>体育类</p>
<p><input type="checkbox" name="data[]"/>酒类</p>
<p><input type="checkbox" name="data[]"/>烟类</p>
<p><input type="checkbox" name="data[]"/>烤鸭类</p>
<p><input type="checkbox" name="data[]"/>计生类</p>
<p><input type="checkbox" name="data[]"/>隐私类</p>
<script>
    function checkAll(){
        //取出值
        var xuan=document.getElementById('xuan');
        var data=document.getElementsByName('data[]');
        if(xuan.checked==true){
            for(i in data){
                if(data[i].checked==false){
                    data[i].checked=true
                }
            }
        }
        else{
            for(i in data){
                if(data[i].checked==true){
                    data[i].checked=false
                }
            }
        }
    }
</script>
