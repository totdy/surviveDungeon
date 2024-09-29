<?php
session_start();
unset($_SESSION["idp"]);
session_destroy();
header('Location: index.html');
?>