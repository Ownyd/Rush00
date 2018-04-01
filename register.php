<?php
	session_start();

	function	auth($login)
	{
		foreach ($_SESSION[accounts] as $elem)
		{
			if ($elem[login] === $login)
				return (true);
		}
		return(false);
	}

	if (!$_SESSION[accounts])
		$_SESSION[accounts] = unserialize(file_get_contents("data/accounts"));
	if ($_POST[login] && $_POST[passwd] && $_POST[passwdconfirm] === $_POST[passwd] && $_POST[submit] === "VALIDER" && !auth($_POST[login]))
	{
		$_SESSION[accounts][] = [login => $_POST[login], passwd => hash("sha512", $_POST[passwd]), status => "user"];
		file_put_contents("data/accounts", serialize($_SESSION[accounts]));
		header("Location: index.php");
		exit;
	}
	if ($_POST[submit] === "VALIDER")
	{
echo("<div class='reg_error'>");
		if (!$_POST[login])
		{
			echo("No login<br />\n");
		}
		else if (auth($_POST[login]))
		{
			echo("Login Taken<br />\n");
			$_POST[login] = "";
		}
		if (!$_POST[passwd])
		{
			echo("No password<br />\n");
		}
		if (!$_POST[passwdconfirm])
		{
			echo("No password confirmation<br />\n");
		}
		else if ($_POST[passwd] !== $_POST[passwdconfirm])
		{
			echo("Password and confirmation don't match<br />\n");
			$_POST[passwdconfirm] = "";
		}
	}
echo("</div>");
?>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="index.css">
</head>
<body>
<a href="index.php"><div class="accueuil">
Retourner a l'accueuil
</div></a>
<a href="login.php"><div class="dejacompte">
J'ai deja un compte
</div></a>
<div class="register">
<form method='post'>
	<?php
		echo("Identifiant :<br /><input type='text' name='login' value='$_POST[login]' />".
			"Mot de passe :<br /><input type='password' name='passwd' value='$_POST[passwd]' />".
			"Confirmation :<br /><input type='password' name='passwdconfirm' value='$_POST[passwdconfirm]' /><p>".
			"<input type='submit' class='button' name='submit' value='VALIDER' /></p>");
	?>
</form>
</div>
</body>
