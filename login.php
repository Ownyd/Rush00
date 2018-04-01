<?php
	session_start();

	function	auth($login, $passwd)
	{
		if (!$_SESSION[accounts])
			$_SESSION[accounts] = unserialize(file_get_contents("data/accounts"));
		foreach ($_SESSION[accounts] as $key => $elem)
		{
			if ($elem[login] === $login)
			{
				if ($elem[passwd] === hash("sha512", $passwd))
					return ($key);
				header("Location: login.php?error=passwd&login=$login");
				exit;
			}
		}
		header("Location: login.php?error=login");
		exit;
	}

	if ($_POST[login] && $_POST[passwd] && $_POST[submit] === "VALIDER")
	{
		$_SESSION[user_key] = auth($_POST[login], $_POST[passwd]);
		header("Location: index.php");
		exit;
	}

	if ($_GET[error] === "login")
	{
		echo("Wrong login<br />\n");
	}
	else if ($_GET[error] === "passwd")
	{
		echo("Wrong password<br />\n");
	}
?>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="index.css">
</head>
<body>
<div class="login">
<form method='post'>
	Identifiant :<br />
	<?php echo("<input type='text' name='login' value='$_GET[login]' />");?><br />
	Mot de passe :<br />
	<input type='password' name='passwd' /><p>
	<input class="button"  type='submit' name='submit' value='VALIDER' /></p>
</form>
</div>
<a href="register.php">
<div class="createaccount">
	Créer un compte<br />
</div><a/>
</body>
