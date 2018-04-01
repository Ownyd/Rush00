<?php
	session_start();
if(!$_SESSION[accounts])
	$_SESSION[accounts] = unserialize(file_get_contents("data/accounts"));
unset($_SESSION[user_key]);
header("Location:index.php");
?>
