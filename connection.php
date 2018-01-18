<?php 
$host = "localhost";
$name   = "1246724";
$p      = "pihuminkal";
$db_name  =   "1246724db2";
$db = mysqli_connect($host,$name,$p,$db_name);
function formatDate($date){
	return date('g:i a',strtotime($date));
}

?>
