<?php
//captar dados do formulario
$name=$_POST["name"];
$code=$_POST["pin"];
//liga e escolhe BD
include ("ligabd.php");
//inicio de ação sobre a BD
$existe="select * from players where name='".$name."'";
$faz_existe=mysqli_query($ligabd,$existe);
$ja_existe=mysqli_num_rows($faz_existe);
//verificação se ja registado
if($ja_existe==0){
    $insere_player="insert into players values (NULL,'".$name."','".$code."','0','1','0','200','1','0')";
    $faz_insere_player=mysqli_query($ligabd,$insere_player);
	$faz_existe=mysqli_query($ligabd,$existe);
	$registos=mysqli_fetch_array($faz_existe);
	session_start();
	$_SESSION["idp"]=$registos["id"];
	header('Location: menu.php');
}
elseif($ja_existe==1){
	$registos=mysqli_fetch_array($faz_existe);
	if($registos['code']==$code){
		session_start();
		$_SESSION["idp"]=$registos["id"];
		header('Location: menu.php');
	}else{
		echo '<script>if(confirm("Pin is incorrect")==true){window.location.href = "index.html"}else{window.location.href = "index.html"};</script>';
	}
}

?>