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
$games = array
(
array(cat => ["fps"], name => "Call of Duty WWII", img => "resources/games/ps4/1.jpeg", prix => "34.99", type => ["ps4"]),
array(cat => ["survie", "fps"], name => "Farcry 5", img => "resources/games/ps4/2.jpeg", prix => "37.99", type => ["ps4"]),
array(cat => ["action"], name => "Just cause 3", img => "resources/games/ps4/3.jpeg", prix => "44.99", type => ["ps4"]),
array(cat => ["sport"], name => "Pes 2018", img => "resources/games/ps4/4.jpeg", prix => "39.99", type => ["ps4"]),
array(cat => ["fps"], name => "COD Infinite warfare", img => "resources/games/ps4/5.jpeg", prix => "54.99", type => ["ps4"]),
array(cat => ["fps", "action"], name => "Watch Dogs 2", img => "resources/games/ps4/6.jpeg", prix => "21.99", type => ["ps4"]),
array(cat => ["survie", "action"], name => "Fortnite", img => "resources/games/ps4/7.jpeg", prix => "36.99", type => ["ps4"]),
array(cat => ["fps"], name => "Ghost Recon", img => "resources/games/ps4/8.jpeg", prix => "62.99", type => ["ps4"]),
array(cat => ["fps"], name => "Battlefield", img => "resources/games/ps4/9.jpeg", prix => "17.99", type => ["ps4"]),
array(cat => ["plateforme"], name => "Crash Bandycoot", img => "resources/games/ps4/10.jpeg", prix => "25.99", type => ["ps4"]),
array(cat => ["action", "fps"], name => "Grand theft auto V", img => "resources/games/ps4/11.jpeg", prix => "38.99", type => ["ps4"]),
array(cat => ["survie"], name => "Uncharted 2", img => "resources/games/ps4/12.jpeg", prix => "45.99", type => ["ps4"]),
array(cat => ["combat"], name => "DragonBall FighterZ", img => "resources/games/xbox/1.jpeg", prix => "37.99", type => ["xbox"]),
array(cat => ["action"], name => "Dark Souls 3", img => "resources/games/xbox/2.jpeg", prix => "42.99", type => ["xbox"]),
array(cat => ["fps"], name => "PUBG", img => "resources/games/xbox/3.jpeg", prix => "41.99", type => ["xbox"]),
array(cat => ["divers"], name => "Spark", img => "resources/games/xbox/4.jpeg", prix => "22.99", type => ["xbox"]),
array(cat => ["action"], name => "Carmageddon Maxdamage", img => "resources/games/xbox/5.jpeg", prix => "23.99", type => ["xbox"]),
array(cat => ["fps"], name => "Battlefield 1", img => "resources/games/xbox/6.jpeg", prix => "45.99", type => ["xbox"]),
array(cat => ["combat"], name => "Dragonball Xenoverse 2", img => "resources/games/xbox/7.jpeg", prix => "22.99", type => ["xbox"]),
array(cat => ["action"], name => "Sunset Overdrive", img => "resources/games/xbox/8.jpeg", prix => "26.99", type => ["xbox"]),
array(cat => ["sport"], name => "ATV Renegades", img => "resources/games/xbox/9.jpeg", prix => "55.99", type => ["xbox"]),
array(cat => ["action", "combat"], name => "Final Fantasy XV", img => "resources/games/xbox/10.jpeg", prix => "45.99", type => ["xbox"]),
array(cat => ["sport"], name => "MXGP 2", img => "resources/games/xbox/11.jpeg", prix => "42.99", type => ["xbox"]),
array(cat => ["plateforme", "action"], name => "Lego Adventures", img => "resources/games/xbox/12.jpeg", prix => "34.99", type => ["xbox"]),
array(cat => ["survie"], name => "Lego Jurassic World", img => "resources/games/xbox/13.jpeg", prix => "27.99", type => ["xbox"]),
array(cat => ["action"], name => "The Division", img => "resources/games/xbox/14.jpeg", prix => "19.99", type => ["xbox"]),
array(cat => ["action"], name => "Zelda Breathe of the Wild", img => "resources/games/switch/1.jpeg", prix => "37.99", type => ["switch"]),
array(cat => ["sport"], name => "Just dance 2018", img => "resources/games/switch/2.jpeg", prix => "45.99", type => ["switch"]),
array(cat => ["divers"], name => "Monopoly", img => "resources/games/switch/3.jpeg", prix => "39.99", type => ["switch"]),
array(cat => ["fps"], name => "Splatoon 2", img => "resources/games/switch/4.jpeg", prix => "32.99", type => ["switch"]),
array(cat => ["plateforme"], name => "Minecraft", img => "resources/games/switch/5.jpeg", prix => "27.99", type => ["switch"]),
array(cat => ["action"], name => "Super Mario Odyssey", img => "resources/games/switch/6.jpeg", prix => "57.99", type => ["switch"]),
array(cat => ["fps"], name => "Arms", img => "resources/games/switch/7.jpeg", prix => "44.99", type => ["switch"]),
array(cat => ["divers"], name => "1 2 Switch", img => "resources/games/switch/8.jpeg", prix => "18.99", type => ["switch"]),
array(cat => ["sport"], name => "Mario Tennis Aces", img => "resources/games/switch/9.jpeg", prix => "29.99", type => ["switch"]),
array(cat => ["plateforme"], name => "Kirby StarAllies", img => "resources/games/switch/10.jpeg", prix => "19.99", type => ["switch"]),
array(cat => ["action"], name => "Mario Kart 8 Deluxe", img => "resources/games/switch/11.jpeg", prix => "34.99", type => ["switch"]),
array(cat => ["plateforme"], name => "Super Bomberman", img => "resources/games/switch/12.jpeg", prix => "37.99", type => ["switch"]),
array(cat => ["sport", "action"], name => "Rocket League", img => "resources/games/switch/13.jpeg", prix => "26.99", type => ["switch"])
);
file_put_contents("data/games",serialize($games));
		header("Location: index.php");
?>
