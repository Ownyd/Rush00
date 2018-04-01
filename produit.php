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
</div>
</div>
<div class="produit">
<div class="boitier">
<?php
$tab = unserialize(file_get_contents("data/games"));
	echo("<img src='".$tab[$_GET[name]][img]."'>");
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
</div>
</div>
