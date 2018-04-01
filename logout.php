<?php
	session_start();
	unset($_SESSION[user_key]);
	header("Location: index.php");
?>
