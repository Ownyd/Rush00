<?php
	session_start();
	$tmp = $_SESSION[user_key];
	session_destroy();
	session_start();
	if (!$_SESSION[accounts])
				$_SESSION[accounts] = unserialize(file_get_contents("data/accounts"));
	$_SESSION[user_key] = $tmp;
	header("Location:cart.php");
?>
