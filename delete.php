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

	if ($_SESSION[accounts][$_SESSION[user_key]][status] !== "admin")
		exit;

	if ($_POST[login] !== "" && $_POST[submit] === "OK")
	{
		if ($key = auth($_POST[login]))
		{
			$login = $_SESSION[accounts][$key][login];
			unset($_SESSION[accounts][$key]);
			echo("$login removed<br />\n");
		}
		else
			echo("$login doesn't exist<br />\n");
	}

	if ($_POST[submit] === "OK")
	{
		if ($_POST[login] === "OK")
		{
			echo("No login<br />\n");
		}
	}

?>

<form method='post'>
	<input type='text' name='login' />
	<input type='submit' name='submit' value='OK' />
</form>