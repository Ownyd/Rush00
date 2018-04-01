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
		$_POST[plateforme] || $_POST[combat] || $_POST[divers]) && $_POST[submit] === "MODIFIER")
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
		$_SESSION[games][$_POST[key]] = [name => $_POST[title], prix => $_POST[price], img => $_POST[link],
			type => $type, cat => $cat];
		file_put_contents("data/games", serialize($_SESSION[games]));
		header("Location: game_list.php");
		exit;
	}
	else if ($_POST[submit] === "SUPPRIMER")
	{
		unset($_SESSION[games][$_POST[key]]);
		file_put_contents("data/games", serialize($_SESSION[games]));
		header("Location: game_list.php");
		exit;
	}

	if ($_POST[submit] === "MODIFIER")
	{
		echo("<div class='wrongauth'>\n");
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

	function	check($tab, $value)
	{
		if (in_array($value, $tab))
			return ("checked");
		else
			return ("");
	}

	echo("<a href='admin.php'><input type='submit' value='Retourner a l accueil administrateur' /></a><br />\n".
		"<form method='post'>\n".
		"Nom:<br />\n".
		"<input type='text' name='title' value='".$_SESSION[games][$_POST["key"]][name]."' required /><br />\n".
		"Prix:<br />\n".
		"<input type='number' name='price' value='".$_SESSION[games][$_POST["key"]][prix]."' required /><br />\n".
		"Image:<br />\n".
		"<input type='text' name='link' value='".$_SESSION[games][$_POST["key"]][img]."' required /><br />\n".
		"Type:<br />\n".
		"<input type='checkbox' name='xbox' value='checked'".check($_SESSION[games][$_POST["key"]][type], "xbox")." />Xbox<br />\n".
		"<input type='checkbox' name='ps4' value='checked'".check($_SESSION[games][$_POST["key"]][type], "ps4")." />PS4<br />\n".
		"<input type='checkbox' name='switch' value='checked'".check($_SESSION[games][$_POST["key"]][type], "switch")." />Switch<br />\n".
		"Cathegorie:<br />\n".
		"<input type='checkbox' name='fps' value='checked'".check($_SESSION[games][$_POST["key"]][cat], "fps")." />FPS<br />\n".
		"<input type='checkbox' name='survie' value='checked'".check($_SESSION[games][$_POST["key"]][cat], "survie")." />Survie<br />\n".
		"<input type='checkbox' name='action' value='checked'".check($_SESSION[games][$_POST["key"]][cat], "action")." />Action<br />\n".
		"<input type='checkbox' name='sport' value='checked'".check($_SESSION[games][$_POST["key"]][cat], "sport")." />Sport<br />\n".
		"<input type='checkbox' name='plateforme' value='checked'".check($_SESSION[games][$_POST["key"]][cat], "plateforme")." />Plateforme<br />\n".
		"<input type='checkbox' name='combat' value='checked'".check($_SESSION[games][$_POST["key"]][cat], "combat")." />Combat<br />\n".
		"<input type='checkbox' name='divers' value='checked'".check($_SESSION[games][$_POST["key"]][cat], "divers")." />Divers<br />\n".
		"<input type='hidden' name='key' value='$_POST[key]' />\n".
		"<input type='submit' name='submit' value='MODIFIER' /><br />\n".
		"<input type='submit' name='submit' value='SUPPRIMER' /><br />\n".
		"</form>\n");
?>