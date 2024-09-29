<?php
session_start();
if(!isset($_SESSION["idp"])){
	echo"<center><h1>Only for registered players.</h1><center>";
	exit;
}
?>