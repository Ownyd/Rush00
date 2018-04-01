<?php
session_start();

	if (!$_SESSION[accounts])
		$_SESSION[accounts] = unserialize(file_get_contents("data/accounts"));

	if ($_SESSION[accounts][$_SESSION[user_key]][status] !== "admin")
		exit;

	echo("<a href='admin.php'><input type='submit' value='Retourner a l accueil administrateur' /></a><br />\n".
		"<form action='modif_account.php' method='post'>\n".
		"<input type='submit' name='submit' value='OK' /><br />\n");
	foreach ($_SESSION[accounts] as $key => $elem)
	{
		echo("<input type='radio' name='key' value='$key' required><a title='$elem[status]'>$elem[login]</a><br />\n");
	}
	echo("</form>\n");
?>