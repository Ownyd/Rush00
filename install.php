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
$ps4 = array();
array_push($ps4, "resources/games/ps4/1.jpeg","resources/games/ps4/3.jpeg","resources/games/ps4/4.jpeg","resources/games/ps4/5.jpeg","resources/games/ps4/6.jpeg","resources/games/ps4/7.jpeg","resources/games/ps4/8.jpeg","resources/games/ps4/9.jpeg","resources/games/ps4/10.jpeg","resources/games/ps4/11.jpeg","resources/games/ps4/12.jpeg");
file_put_contents("data/ps4",serialize($ps4));
$switch = array();
array_push($switch, "resources/games/switch/1.jpeg","resources/games/switch/3.jpeg","resources/games/switch/4.jpeg","resources/games/switch/5.jpeg","resources/games/switch/6.jpeg","resources/games/switch/7.jpeg","resources/games/switch/8.jpeg","resources/games/switch/9.jpeg","resources/games/switch/10.jpeg","resources/games/switch/11.jpeg","resources/games/switch/12.jpeg");
file_put_contents("data/switch",serialize($switch));
$xbox = array();
array_push($xbox, "resources/games/xbox/1.jpeg","resources/games/xbox/3.jpeg","resources/games/xbox/4.jpeg","resources/games/xbox/5.jpeg","resources/games/xbox/6.jpeg","resources/games/xbox/7.jpeg","resources/games/xbox/8.jpeg","resources/games/xbox/9.jpeg","resources/games/xbox/10.jpeg","resources/games/xbox/11.jpeg","resources/games/xbox/12.jpeg");
file_put_contents("data/xbox",serialize($xbox));
?>
