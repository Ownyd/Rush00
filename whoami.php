<?php
	session_start();

	if ($_SESSION[accounts][$_SESSION[user_key]])
		print_r($_SESSION[accounts][$_SESSION[user_key]]);
?>