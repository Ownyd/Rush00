<?php
	session_start();

	if (!$_SESSION[accounts])
		$_SESSION[accounts] = unserialize(file_get_contents("data/accounts"));

	if ($_SESSION[accounts][$_SESSION[user_key]][status] !== "admin")
		exit;

	function	auth($login)
	{
		foreach ($_SESSION[accounts] as $key => $elem)
		{
			if ($elem[login] = $login)
				return ($key);
		}
		return (false);
	}
	
	if ($_POST[login] !== "" && (auth($_POST[login]) === false || $_POST[login] === $_SESSION[accounts][$_POST[key]][login]) && $_POST[passwd] !== "" && $_POST[status] !== "" && $_POST[submit] === "MODIFIER")
	{
		$_SESSION[accounts][$_POST[key]] = [login => $_POST[login], passwd => $_POST[passwd], status => $_POST[status]];
		file_put_contents("data/accounts", serialize($_SESSION[accounts]));
		header("Location: account_list.php");
		exit;
	}
	else if ($_POST[submit] === "SUPPRIMER")
	{
		unset($_SESSION[accounts][$_POST[key]]);
		file_put_contents("data/accounts", serialize($_SESSION[accounts]));
		header("Location: account_list.php");
		exit;
	}

	if ($_POST[submit] === "MODIFIER")
	{
		echo("<div class='wrongauth'>\n");
		if ($_POST[login] === "")
		{
			echo("Identifiant manquant<br />\n");
		}
		else if (auth($_POST[login]) !== false && $_POST[login] !== $_SESSION[accounts][$_POST[key]][login])
		{
			echo("Identifiant deja pris<br />\n");
		}
		if ($_POST[passwd] === "")
		{
			echo("Mot de passe manquant<br />\n");
		}
		if ($_POST[status] === "")
		{
			echo("Status manquant<br />\n");
		}
		echo("</div>\n");
	}

	function	check($post, $value)
	{
		if ($post === $value)
			return ("selected");
		else
			return ("");
	}

	echo("<a href='admin.php'><input type='submit' value='Retourner a l accueil administrateur' /></a><br />\n".
		"<form method='post'>\n".
		"<input type='text' name='login' value='".$_SESSION[accounts][$_POST["key"]][login]."' /><br />\n".
		"<input type='password' name='passwd' value='".$_SESSION[accounts][$_POST["key"]][passwd]."' /><br />\n".
		"<select name='status'>\n".
		"<option value='user' ".check($_SESSION[accounts][$_POST[key]][status], 'user').">user</option>\n".
		"<option value='admin' ".check($_SESSION[accounts][$_POST[key]][status], 'admin').">admin</option>\n".
		"</select><br />\n".
		"<input type='hidden' name='key' value='$_POST[key]' />\n".
		"<input type='submit' name='submit' value='MODIFIER' /><br />\n".
		"<input type='submit' name='submit' value='SUPPRIMER' /><br />\n".
		"</form>\n");
?>