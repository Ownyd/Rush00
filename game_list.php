<?php
	session_start();

	if (!$_SESSION[accounts])
		$_SESSION[accounts] = unserialize(file_get_contents("data/accounts"));
	if (!$_SESSION[games])
		$_SESSION[games] = unserialize(file_get_contents("data/games"));

	if ($_SESSION[accounts][$_SESSION[user_key]][status] !== "admin")
		exit;

	echo("<form action='modif_game.php' method='post'>\n".
		"<input type='submit' name='submit' value='OK' /><br />");
	foreach ($_SESSION[games] as $key => $elem)
	{
		$title = "Types:";
		foreach ($elem[type] as $elemception)
			$title = $title." ".$elemception;
		$title = $title."\nCathegories:";
		foreach ($elem[cat] as $elemception)
			$title = $title." ".$elemception;
		$title = $title."\n";
		echo("<input type='radio' name='key' value='$key' required><a href='$elem[img]' title='$title'>$elem[name]</a><br />\n");
	}
	echo("</form>\n");
?>