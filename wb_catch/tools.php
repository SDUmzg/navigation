<?php 
/*foreach ($arr as $key => $value) {
    # code...
    echo $value;
}*/
//var_dump($arr);
$arr=weibo_ct();
while(count($arr)<200){
    $arr=weibo_ct();
}
$length=count($arr);

$arr[5]=str_replace("搜索指数","热度",$arr[5]);
for($i=1;$i<51;$i++)
{
    $value=5+7*$i;
    $arr[$value]=str_replace("/weibo","http://s.weibo.com/weibo",$arr[$value]);
}
/*   foreach ($arr as $key => $value) {
        if((($key%7!=0)||($key%7!=1))&&($key!=6))
        {
            echo $value;
        }
    }*/
$handle=fopen("tools.txt", "w");
for($i=10;$i<$length;$i++){
    if(($i%7!=0)||($i%7!=1))
    {
        fwrite($handle, $arr[$i]);
    }
}
fclose($handle);
echo "success";
function weibo_ct(){
    $command="C:/Users/16661/AppData/Roaming/npm/node_modules/phantomjs/lib/phantom/bin/phantomjs.exe remen.js";
    $arr= array();
    exec($command,$arr);
    return $arr;
}
?> 