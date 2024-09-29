<?php
	include("validar.php");
	
	$level = $_POST["level"];
	$gold = $_POST["gold"];
	$lastb =$_POST["lb"];
	$l=$level-1;
	include ("ligabd.php");
	if($lastb==0){
		$atualiza="update players set gold='".$gold."', level='".$level."' where id='".$_SESSION["idp"]."'";
	}else{
		$atualiza="update players set gold='".$gold."', level='".$level."', lastboss='".$l."' where id='".$_SESSION["idp"]."'";
	};
	
	$faz_atualiza=mysqli_query($ligabd,$atualiza);
	
?>