<?php
session_start();	

if(!empty($_GET['c'])){
	$c=$_GET['c'];
	$a=$_GET['a'];
	$p=isset($_GET['p'])?$_GET['p']:0;
	if(!empty($_GET['d']))$d=$_GET['d'].'/';
	else $d='';
	
	include("./controllers/". $d . $c ."Controller.php");
	$page=new $c();
	$page->$a($p);
	
}
else{
	include("./views/hellorh/indexView.php");	
}

?>