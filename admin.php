<?php
	session_start();

	if (!$_SESSION[accounts])
		$_SESSION[accounts] = unserialize(file_get_contents("data/accounts"));

	if ($_SESSION[accounts][$_SESSION[user_key]][status] !== "admin")
		exit;

	echo("<a href='add_game.php'><input type='submit' value='Ajouter un produit' /></a><br />\n".
		"<a href='game_list.php'><input type='submit' value='Modifier/Supprimer un produit' /></a><br />\n".
		"<a href='account_list.php'><input type='submit' value='Modifier/Supprimer un compte' /></a><br />\n".
		"<a href='index.php'><input type='submit' value='Page d'accueil utilisateur' /></a><br />\n");
?>