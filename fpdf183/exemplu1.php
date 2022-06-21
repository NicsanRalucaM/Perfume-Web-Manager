<?php
include_once ('../API/Brand/read_one.php');
require('fpdf.php');
 $a=1;
$string = file_get_contents("http://localhost:63342/Perfume-Web-Manager/API/Brand/read_one.php?id=1");
$json_a = json_decode($string, true);
echo $json_a;
$b= $json_a['id'];
//echo $json_a['Jennifer'][status];

?>