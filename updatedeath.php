<?php
	include("validar.php");
	include ("ligabd.php");
	$lista="select * from players where id='".$_SESSION["idp"]."'";
	$faz_lista=mysqli_query($ligabd,$lista);
	$registos=mysqli_fetch_array($faz_lista);
		
	$death = $_POST["death"];
	
	$deathsoma=$death+$registos['ndeaths'];
	
		$atualiza="update players set ndeaths='".$deathsoma."' where id='".$_SESSION["idp"]."'";
	
	
	$faz_atualiza=mysqli_query($ligabd,$atualiza);
	
?>