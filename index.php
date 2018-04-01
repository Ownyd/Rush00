<?php
	session_start();
if (!$_SESSION[accounts])
	$_SESSION[accounts] = unserialize(file_get_contents("data/accounts"));
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
	echo("<div id='account'> Bonjour, ".$_SESSION[accounts][$_SESSION[user_key]][login]." <br/><a href='edit.php'><button>Modifier mon profil</button></a><br /><a href='logout.php'><button>Se deconnecter</button></div></a>");	
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
<div class="scrollbar">
<?php
foreach($tab = unserialize(file_get_contents("data/games")) as $key => $elem)
	echo("<a href='produit.php?name=$key'><img class='miniature' src='$elem[img]'></a>");
?>
</div>
<div id="slider">
  <figure>
    <img src="https://emagtrends.com/wp-content/uploads/2018/01/dragon-ball-fighterz.jpg" alt>
    <img src="http://i0.kym-cdn.com/entries/icons/original/000/015/797/splatoon0522151280jpg-b0aaa2_1280w.jpg" alt>
    <img src="http://www.daddydaydream.com/wp-content/uploads/2018/03/3350293-em4r8vzw2ba01.jpg" alt>
    <img src="https://i.ytimg.com/vi/mmoEA0ZS4R4/maxresdefault.jpg" alt>
    <img src="https://emagtrends.com/wp-content/uploads/2018/01/dragon-ball-fighterz.jpg" alt>
  </figure>
</div>

<div class="footer"><font face="Georgia">Conditions générales de vente<br />Vos informations personnelles<br />    Cookies et Publicité sur Internet<br />    ©2018 tlux,gearcenc </font>
</html>
