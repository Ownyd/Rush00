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
	<a href="categorie.php?support=xbox"><img id="mini" src="resources/support/xboxone_icon.png">
<br />XBOX ONE</a>
</div> <br />
<div id="support">
	<a href="categorie.php?support=ps4"><img id="mini" src="resources/support/ps4_icon.png">
<br />PLAYSTATION 4</a>
</div> <br />
<div id="support">
	<a href="categorie.php?support=switch"><img id="mini" src="resources/support/switch_icon.png">
<br />NINTENDO SWITCH</a>
</div>  <br />
Trier par type :<br />
<a href="categorie.php?cat=fps">
<div id="support">
Fps<br />
</a>
</div>
<a href="categorie.php?cat=survie">
<div id="support">
Survie<br />
</a>
</div>
<a href="categorie.php?cat=action">
<div id="support">
Action<br />
</a>
</div>
<a href="categorie.php?cat=combat">
<div id="support">
Combat<br />
</a>
</div>
<a href="categorie.php?cat=plateforme">
<div id="support">
Plateforme<br />
</a>
</div>
<a href="categorie.php?cat=sport">
<div id="support">
Sport<br />
</a>
</div>
<a href="categorie.php?cat=divers">
<div id="support">
Divers
</a>
</div>
</div>
</div>
<div class="scroller">
<?php
if ($_GET[support] !== "")
	foreach($tab = unserialize(file_get_contents("data/games")) as $key => $elem)
	{
		if (array_search($_GET[support], $elem["type"]) !== false)
		{
			echo("<a href='produit.php?name=$key'><div class='product'>".
				"<img class='image' src='$elem[img]'>".
				"<div class='middle'>".
				"<div class='text'>$elem[prix]€</div>".
				"</div></a>".
				"<div class='namegame'>".
				"$elem[name]");
			foreach($elem["cat"] as $elem2)
				echo(" ($elem2) ");
			echo("</div></div>");

		}
	}
if ($_GET[cat] !== "")
	foreach($tab = unserialize(file_get_contents("data/games")) as $key => $elem)
	{
		if (array_search($_GET[cat], $elem["cat"]) !== false)
		{
			echo("<a href='produit.php?name=$key'><div class='product'>".
				"<img class='image' src='$elem[img]'>".
				"<div class='middle'>".
				"<div class='text'>$elem[prix]€</div>".
				"</div></a>".
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
