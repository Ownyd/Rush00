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
<div id="slider">
  <figure>
    <img src="https://emagtrends.com/wp-content/uploads/2018/01/dragon-ball-fighterz.jpg" alt>
    <img src="http://i0.kym-cdn.com/entries/icons/original/000/015/797/splatoon0522151280jpg-b0aaa2_1280w.jpg" alt>
    <img src="http://www.daddydaydream.com/wp-content/uploads/2018/03/3350293-em4r8vzw2ba01.jpg" alt>
    <img src="https://i.ytimg.com/vi/mmoEA0ZS4R4/maxresdefault.jpg" alt>
    <img src="https://emagtrends.com/wp-content/uploads/2018/01/dragon-ball-fighterz.jpg" alt>
  </figure>
</div>
<div class="scrollbar">
<?php
foreach($tab = unserialize(file_get_contents("data/xbox")) as $elem)
	echo("<img class='miniature' src='$elem'>");
?>
</div>
<div class="footer"><font face="Georgia">Conditions générales de vente<br />Vos informations personnelles<br />    Cookies et Publicité sur Internet<br />    ©2018 tlux,gearcenc </font>
</html>
