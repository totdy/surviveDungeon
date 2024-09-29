<?php
$ligabd = mysqli_connect('localhost','root','');
if(!$ligabd){
	echo "<br> Erro: Não foi possivel estabelecer ligação com o MySQL";
	mysqli_close($ligabd);
	exit;
}
$escolhebd= mysqli_select_db($ligabd,'game_db');
if(!$escolhebd){
	echo "<br> Erro: Ao escolher a BD";
	mysqli_close($ligabd);
	exit;
}
?>