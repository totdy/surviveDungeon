<?php
	include("validar.php");
	
	$gold = $_POST["gold"];
	$speed =$_POST["speed"];
	$health =$_POST["health"];
	
	include ("ligabd.php");
	
	$atualiza="update players set gold='".$gold."', speed='".$speed."',health='".$health."' where id='".$_SESSION["idp"]."'";

	$faz_atualiza=mysqli_query($ligabd,$atualiza);
	
?>