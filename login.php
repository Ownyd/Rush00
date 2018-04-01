<?php
	session_start();

	function	auth($login)
	{
		foreach ($_SESSION[accounts] as $key => $elem)
		{
			if ($elem[login] === $login)
				return ($key);
		}
		return (false);
	}

	if (!$_SESSION[accounts])
		$_SESSION[accounts] = unserialize(file_get_contents("data/accounts"));
	$key = auth($_POST[login]);

	if ($_POST[login] !== "" && $_POST[passwd] !== "" && $_POST[submit] === "VALIDER" && hash("sha512", $_POST[passwd]) === $_SESSION[accounts][$key][passwd])
	{
		$_SESSION[user_key] = $key;
		header("Location: index.php");
		exit;
	}

	if ($_POST[submit] === "VALIDER")
	{
		echo("<div class='wrongauth'>\n");
		if ($_POST[login] === "")
		{
			echo("No login<br />\n");
		}
		else if ($key === false)
		{
			echo("Login doesn't exist<br />\n");
			$_POST[login] = NULL;
		}
		if ($_POST[passwd] === "")
		{
			echo("No password<br />\n");
		}
		else if ($_POST[login] !== "" && hash("sha512", $_POST[passwd]) !== $_SESSION[accounts][$key][passwd])
		{
			echo("Wrong password<br />\n");
		}
		echo("</div>\n");
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
<div class="login">
<form method='post'>
<?php
	echo("Identifiant :<br />\n".
		"<input type='text' name='login' value='$_POST[login]' /><br />\n".
		"Mot de passe :<br />\n".
		"<input type='password' name='passwd' />\n".
		"<p><input class='button'  type='submit' name='submit' value='VALIDER' /></p>\n");
?>
</form>
</div>
<a href="register.php">
<div class="createaccount">
	Créer un compte<br />
</div><a/>
</body>
