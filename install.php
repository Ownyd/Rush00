<?php
	if (!file_exists("data/accounts"))
	{
		if (!file_exists("data"))
			mkdir("data");
		if ($_GET[login] && $_GET[passwd])
		{
			$accounts = [["login" => "admin", "passwd" => hash("sha512", "admin"), "status" => "admin"]];
			file_put_contents("data/accounts", serialize($accounts));
		}
		else
			echo("ERROR\n");
	}
?>