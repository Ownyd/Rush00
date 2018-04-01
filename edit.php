<?php
	session_start();

	if (!$_SESSION[accounts])
		$_SESSION[accounts] = unserialize(file_get_contents("data/accounts"));

	if ($_SESSION[accounts][$_SESSION[user_key]] == NULL)
	{
		header("Location: index.php");
		exit;
	}

	if ($_POST[oldpasswd] !== "" && hash("sha512", $_POST[oldpasswd]) === $_SESSION[accounts][$_SESSION[user_key]][passwd] && $_POST[passwd] !== "" && $_POST[passwdconfirm] === $_POST[passwd] && $_POST[submit] === "VALIDER")
	{
		$_SESSION[accounts][$_SESSION[user_key]][passwd] = hash("sha512", $_POST[passwd]);
		file_put_contents("data/accounts", serialize($_SESSION[accounts]));
		header("Location: index.php");
		exit;
	}
	else if ($_POST[oldpasswd] !== "" && hash("sha512", $_POST[oldpasswd]) === $_SESSION[accounts][$_SESSION[user_key]][passwd] && $_POST[submit] === "SUPPRIMER")
	{
		unset($_SESSION[accounts][$_SESSION[user_key]]);
		file_put_contents("data/accounts", serialize($_SESSION[accounts]));
		unset($_SESSION[user_key]);
		header("Location: index.php");
		exit;
	}
	if ($_POST[submit] === "VALIDER" || $_POST[submit] === "SUPPRIMER")
	{
		echo("<div class='edit_error'>");
		if ($_POST[oldpasswd] === "")
		{
			echo("Ancien mot de passe manquant<br />\n");
		}
		else if (hash("sha512", $_POST[oldpasswd]) !== $_SESSION[accounts][$_SESSION[user_key]][passwd])
		{
			echo("Ancien mot de passe errone<br />\n");
			$_POST[oldpasswd] = "";
		}
		if ($_POST[submit] === "VALIDER")
		{
			if ($_POST[passwd] === "")
			{
				echo("Nouveau mot de passe manquant<br />\n");
			}
			if ($_POST[passwdconfirm] === "")
			{
				echo("Confirmation de mot de passe manquante<br />\n");
			}
			else if ($_POST[passwd] !== $_POST[passwdconfirm])
			{
				echo("Confirmation de mot de passe erronee<br />\n");
				$_POST[passwdconfirm] = "";
			}
		}
		echo("</div>");
	}
?>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="index.css">
</head>
<body>
<a href="index.php"><div class="accueuil">
Retourner a l'accueuil
</div></a>
<div class="edit">
<form method='post'>
	<?php
		echo("Ancien mot de passe :<br /><input type='password' name='oldpasswd' value='$_POST[oldpasswd]' />".
			"Nouveau mot de passe :<br /><input type='password' name='passwd' value='$_POST[passwd]' />".
			"Confirmation :<br /><input type='password' name='passwdconfirm' value='$_POST[passwdconfirm]' /><p>".
			"<input type='submit' class='button' name='submit' value='VALIDER' /></p>".
			"<input type='submit' class='button' name='submit' value='SUPPRIMER' />");
	?>
</form>
</div>
</body>
