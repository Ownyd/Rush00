<?php
	session_start();

	if (!$_SESSION[accounts])
		$_SESSION[accounts] = unserialize(file_get_contents("data/accounts"));
	if (!$_SESSION[games])
		$_SESSION[games] = unserialize(file_get_contents("data/games"));

	if ($_SESSION[accounts][$_SESSION[user_key]][status] !== "admin")
		exit;

	if ($_POST[title] !== "" && $_POST[price] !== "" && $_POST[link] !== "" &&
		($_POST[xbox] || $_POST[ps4] || $_POST["switch"]) &&
		($_POST[fps] || $_POST[survie] || $_POST[action] || $_POST[sport] ||
		$_POST[plateforme] || $_POST[combat] || $_POST[divers]) && $_POST[submit] === "OK")
	{
		foreach ([xbox, ps4, "switch"] as $elem)
		{
			if ($_POST[$elem] != "")
				$type[] = $elem;
		}
		foreach ([fps, survie, action, sport, plateforme, combat, divers] as $elem)
		{
			if ($_POST[$elem] != "")
				$cat[] = $elem;
		}
		$_SESSION[games][] = [name => $_POST[title], prix => $_POST[price], img => $_POST[link],
			type => $type, cat => $cat];
		file_put_contents("data/games", serialise($_SESSION[games]));
	}

	if ($_POST[submit] === "OK")
	{
		echo("<div class='wrongauth'>\n");
		if ($_POST[title] === "")
		{
			echo("Nom manquant<br />\n");
		}
		if ($_POST[price] === "")
		{
			echo("Prix manquant<br />\n");
		}
		if ($_POST[link] === "")
		{
			echo("Image manquante<br />\n");
		}
		if (!($_POST[xbox] || $_POST[ps4] || $_POST["switch"]))
		{
			echo("Aucun type transmis<br />\n");
		}
		if (!($_POST[fps] || $_POST[survie] || $_POST[action] || $_POST[sport] ||
			$_POST[plateforme] || $_POST[combat] || $_POST[divers]))
		{
			echo("Aucune cathegorie transmise<br />\n");
		}
		echo("</div>\n");
	}

	echo("<form method='post'>\n".
		"Nom:<br />\n".
		"<input type='text' name='title' value='$_POST[title]' /><br />\n".
		"Prix:<br />\n".
		"<input type='number' name='price' value='$_POST[price]' /><br />\n".
		"Image:<br />\n".
		"<input type='text' name='link' value='$_POST[link]' /><br />\n".
		"Type:<br />\n".
		"<input type='checkbox' name='xbox' value='checked' $_POST[xbox] />Xbox<br />\n".
		"<input type='checkbox' name='ps4' value='checked' $_POST[ps4] />PS4<br />\n".
		"<input type='checkbox' name='switch' value='checked' $_POST[switch] />Switch<br />\n".
		"Cathegorie:<br />\n".
		"<input type='checkbox' name='fps' value='checked' $_POST[fps] />FPS<br />\n".
		"<input type='checkbox' name='survie' value='checked' $_POST[survie] />Survie<br />\n".
		"<input type='checkbox' name='action' value='checked' $_POST[action] />Action<br />\n".
		"<input type='checkbox' name='sport' value='checked' $_POST[sport] />Sport<br />\n".
		"<input type='checkbox' name='plateforme' value='checked' $_POST[plateforme] />Plateforme<br />\n".
		"<input type='checkbox' name='combat' value='checked' $_POST[combat] />Combat<br />\n".
		"<input type='checkbox' name='divers' value='checked' $_POST[divers] />Divers<br />\n".
		"<input type='submit' name='submit' value='OK' /><br />\n".
		"</form>\n");
?>