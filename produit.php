<?php
	session_start();
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
<?php
	session_start();
?>
<div class="produit">
<div class="boitier">
<?php
$tab = unserialize(file_get_contents("data/games"));
	echo("<img src='".$tab[$_GET[name]][img]."'>");

	$_SESSION[cart][] = [key => 26, quant => 2];
?>
</div>
<div class="description">
<?php
	echo(" Prix :".$tab[$_GET[name]][prix]." Euros<br />");
	echo(" Categories :"); 
	foreach($tab[$_GET[name]][cat] as $elem)
	echo(" [".$elem."] ");
	echo("<br /> Support : ".$tab[$_GET[name]][type][0]."<br />");
?>
<form>
   <p> <font size=10px>
	Acheter : <br /><br />Quantite :
<?php
		echo("<input type='number' name='quantite' value='quantite' /> <br />".
			"<input type='hidden' name='name' value='$_GET[name]'".
			"<input type='submit' name='submit' value='VALIDER'");
?>
   </p> </font>
</form>
</div>
</div>
