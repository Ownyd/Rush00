<html>
	<head>
		<title>Index</title>
		<link rel="stylesheet" href="index.css">
	</head>
	<body>
	<div id="logo">
	<a href="index.php">
		<img src="resources/logo.png"></a>
			<div id="panier">
		<img width="50%" height="100px"src="resources/panier.png"><br />Mon panier
		</div>
	<a href="login.php">
	<div id="account">
		<img width="50%" height="100px"src="resources/avatar.png"><br />Connexion
		</div></a>

	</div>
	<div id="categories">
Categories :
<br />
<div id="support">
	<a href="xbox.php"><img id="mini" src="resources/support/xboxone_icon.png">
<br />XBOX ONE</a> 
</div> <br />
<div id="support">
	<a href="ps4.php"><img id="mini" src="resources/support/ps4_icon.png">
<br />PLAYSTATION 4</a> 
</div> <br />
<div id="support">
	<a href="switch.php"><img id="mini" src="resources/support/switch_icon.png">
<br />NINTENDO SWITCH</a> 
</div> <br />
</div>
<div class="scroller">
<?php
foreach($tab = unserialize(file_get_contents("data/games")) as $elem)
{
	if (array_search("ps4", $elem["type"]) !== false)
	{
		echo("<div class='product'>".
			"<img class='image' src='$elem[img]'>".
			"<div class='middle'>".
			"<div class='text'>$elem[prix]€</div>".
			"</div>".
			"<div class='namegame'>".
			"$elem[name]");
		foreach($elem["cat"] as $elem2)
		echo(" ($elem2) ");
		echo("</div></div>");

	}
}
?>
</div>

</html>
