<?php
header("Content-Type: application/xml");

// Tests to get data from the e621/e926 API, PHP version.

$c = $_GET['a'];
    if($c=="pjam"){
        $url = "https://e621.net/post/index.xml?tags=pokehidden&limit=3";
    }else{
        $url = "https://e621.net/post/index.xml?tags=pokehidden&limit=3";
    }

$handle = fopen($url, "r");
if($handle){
    while(!feof($handle)){
        $buffer = fgets($handle, 4096);
        echo $buffer;
    }
    fclose($handle);
}
?>