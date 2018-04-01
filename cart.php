<?php
	session_start();
if (!$_SESSION[accounts])
		$_SESSION[accounts] = unserialize(file_get_contents("data/accounts"));
	if ($_GET[submit] === "VALIDER")
	{
		if ($_GET[quantite] !== "" && $_GET[quantite] >= 0)
		{
			if(isset($_SESSION[cart]))
			{
				foreach($_SESSION[cart] as $key => $elem)
				{
					if (array_search($_GET[name], $elem))
					{
						$_SESSION[cart][$key][quant] = $_GET[quantite];
					}
				}
			}
		}
	}
?>
<html>
	<head>
		<title>Index</title>
		<link rel="stylesheet" href="index.css">
	</head>
	<body>
	<div id="logo">
	<a href="index.php">
		<img src="resources/logo.png"></a>
	<a href="cart.php">
			<div id="panier">
		<img width="50%" height="100px"src="resources/panier.png"><br />Mon panier
</a>
		</div>
<?php
if (!isset($_SESSION[accounts][$_SESSION[user_key]]))
{
	echo("<a href='login.php'>".
			"<div id='account'>".
					"<img width='50%' height='100px'src='resources/avatar.png'><br />Connexion".
							"</div></a>");
}
else
{
echo("<div id='account'> Bonjour, ".$_SESSION[accounts][$_SESSION[user_key]][login]." <br/><br /><br /> <a href='logout.php'>Se deconnecter</div></a>");
}
?>
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
$tab = unserialize(file_get_contents("data/games"));
$prix = 0.00;
if (isset($_SESSION[cart]))
foreach($_SESSION[cart] as $elem)
{
	if ($elem[quant] != 0)
	{
	echo("<div class='product'>".
		"<img width=150px height=200px src='".
		$tab[$elem[key]][img].
		"'> Quantite : ".
		$elem[quant].
		" | Prix unitaire : ".
		$tab[$elem[key]][prix].
		"€ | Prix total : ".
		number_format($tab[$elem[key]][prix] * $elem[quant], 2).
		"€  ");
?>
<form>
<?php
		echo("  | Modifier la quantite :  <input type='number' name='quantite' value='quantite' />".
			"<input type='hidden' name='name' value='$elem[key]'/>".
			"<input type='submit' name='submit' value='VALIDER'/></div>");
?>
</form>
<?php
	$prix += $tab[$elem[key]][prix] * $elem[quant];
	}
}
echo("Prix total : ".$prix."€  <br />");
if (!isset($_SESSION[accounts][$_SESSION[user_key]]))
{
echo("  Merci de vous connecter pour continuer");
}
else
	echo ("Passer votre commande");
echo("<br /><a href='reset.php'>Vider mon panier</a>");
?>
</div>
