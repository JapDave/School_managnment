<?php

include "connection.php";
$file=$_GET['notice'];

header("content-disposition:attachment; filename=".urlencode($file));

$fb=fopen($file,"r");
while(!feof($fb)){
    echo fread($fb,8192);
    flush();
}
fclose($fb);

?>