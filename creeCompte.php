<?php session_start();
?>
<html lang="fr">
<!DOCTYPE html>
<html lang="fr">
<head>
  <title> creer compte  </title>
  <meta charset="utf-8"/>
  <link rel="stylesheet" type="text/css" href="moncss.css"/>
<style>

nav
{
  display:inline-block;
  margin-left:3%;
  text-align:left;

}
nav ul
{
  list-style-type:none;
}

nav li
{
  display:inline-block;
  margin-right:15px;
  background-color: white;
   border:4px inset transparent;
  border-radius: 3px;
  height: 4%;
}

nav a
{
  font-size:1.3em;
  color:#181818;
  padding-bottom:3px;
  text-decoration:none;
  
}

nav a:hover
{
  color:#760001;
  border-bottom:3px solid #760001;
}


</style>
  <script type="text/javaScript" src="monjs.js"></script>
</head>
<body>
  
 <?php if(@$_SESSION['decide'] == 'oui'){
  ?>
      <script language="javaScript">
        alert("vous avez deja un compte MERCI!!!");
      </script>
      <?php
      @$_SESSION['decide'] = 'non';
        }
        ?>


<body>
<header class="header">
<center><marquee behavior="alternate"><img src="images/Capture.PNG" class="bando"></marquee></center>
<br>
<div class="long">
<nav>
      <ul>
        <li><a href="index.php">Accueil</a></li>
      <li><a href="creeCompte.php">creer mon compte</a></li>
      <li><a href="connexion.php">connexion</a></li>
      <li><a href="mario/fotsing.html">divertS</a></li>
       </ul>
    </nav>
    </div>

</header>  
</header>  
<aside class="aside">
<form name="formulaire" action="banque.php" method="POST">
<p><center><input type="submit" value="Créé un Compte"></center></p>
<span id="gerer">ceci c'est pour ceux qui n'on pas encore de compte</span><br>
Nom et prenom:<br><input type="text" name="nom" id="nom" required><br>
numero tel   :<br><input type="text" name="tel" id="prenom" required><br>
Sex      :<input type="radio" value="masculin" name="sex" size="6px" checked>homme &nbsp <input type="radio" value="feminin" name="sex" size="6px">femme <br>
Email    :<br> <input type="email" name="mail" id="mess" title="fotsing@gmail.com" required><br>
Password :<br> <input type="password" name="code" id="code" required><br>
</form>
<center><center>
<p>Vos information seront tres securiser dans notre base de donnee soyez confiant merci.<p>
</aside>
<section class="section">
<h1 id="remonte"><b><u><i><center>Bienvenue A la banque Riberfost</center></i></u></b></h1>
<h4 align="right"><span style="color:orange">merci de nous fait confiance vous n'allez pas le regreter</span></h2>
<p>La banque Nebufost est une banque creer en 1972 dans le but de rendre</br>
 plus souple et surtout plus rapide les retraits et les depot d'argent.</p>
 <p><a href="bonjour.html"><img src="images/recteur.JPG" class="img" alt="recteur de dschang" usemap="#nommap"></a></p>
<p>Pour en dire plus, cette banque a connue le jour grace a un leader que biensur nous connaissons</br>
 le Recteur de l'universite de Dschang. Ne cherché plus loin mes amis vous etes deja au meilleur<br>
 endroie. pour vous en convaincre vous n'avez qu'a regarger les statistique des annee derniere resumee dans le
 tableau ci-dessous. </p>
 <center><table border="1" cellpadding="0" cellspacing="0">
  <tr>
    <th>Annee</th>
    <th>Nb trans</th>
  <th>Nb retrait</th>
  <th>Nb depot<th>
  <th>% trans</th>
  </tr>
 <tr>
  <td>2010</td>
  <td>12545</td>
  <td>4000</td>
  <td>6500<td>
  <td>55%</td>
  </tr>
   <tr>
  <td>2011</td>
  <td>12345</td>
  <td>5000</td>
  <td>6500<td>
  <td>45%</td>
  </tr>
   <tr>
  <td>2012</td>
  <td>33345</td>
  <td>7000</td>
  <td>9500<td>
  <td>85%</td>
  </tr>
   <tr>
  <td>2013</td>
  <td>55345</td>
  <td>2000</td>
  <td>3500<td>
  <td>55%</td>
  </tr>
   <tr>
  <td>2014</td>
  <td>12555</td>
  <td>3500</td>
  <td>6600<td>
  <td>47%</td>
  </tr>
    <tr>
  <td>2015</td>
  <td>11345</td>
  <td>5000</td>
  <td>6556<td>
  <td>46%</td>
  </tr>
    <tr>
  <td>2016</td>
  <td>12345</td>
  <td>3000</td>
  <td>5500<td>
  <td>45%</td>
  </tr>
    <tr>
  <td>2017</td>
  <td>8345</td>
  <td>5000</td>
  <td>1400<td>
  <td>34%</td>
  </tr>
 </table>
 </center>
<p>nos service sont diverse et nous avons entre autre</p>

<!-- ceci sont des commentaire-->
<a href="index.php">retour a l'acceuil</a>
</section>
<br>
<section>
   <footer>
       <br>
   <p><center>Copyrigth @ 2020 : Riberfost pour vous servir <center><p>
   </footer>
</body>
</html>