<?php
session_start();
?>


<?php
if(@$_SESSION['merde'] == 'oui'){
?>

<script language="javaScript">
alert("Vous avez entrer des information incompatible avec votre compte");

</script>

<?php
}
@$_SESSION['merde'] = 'non';
?>

<!DOCTYPE html>
<html>

      <head>
        <title> administration </title>
        <style>

        .tete{
          font-family:arial;
          border:1px solid transparent;
          margin-left:3%;
          margin-right:3%;
          border-radius:20px;
          background-color: rgba(0,0,255,0.6);
        }

        nav
{
  display:inline-block;
  width:75%;
  text-align:left;
  margin-left:3%;
}
nav ul
{
  list-style-type:none;
}

nav li
{
  display:inline-block;
  margin-right:5%;
  background-color: 
}

nav a
{
  font-size:1.3em;
  color:#181818;
  border:1px solid rgba(16,65,25,0.6);
  border-radius:10px;
  background-color: rgba(16,65,25,0.6);
  text-decoration:none;
}

nav a:hover
{
  color:#760001;
  border-bottom:3px solid #760001;
}


article,section
{
  display:inline-block;
  border-radius:20px;
  vertical-align:top;
  text-align:justify;
  border:1px solid transparent;
}


article
{
  float:right;
  width:57.5%;
  margin-right:3%;
  font-family:'times';
  background-color:rgba(0,0,0,0.3);
  text-align:justify;
}
section{
  width: 26.6%;
  height: auto;
  margin-left: 3%;
}
aside{
  width:90%;
  margin-left:3%;
  font-size:20px;
  border-radius:20px;
     text-align:justify;
  border:1px solid transparent;
  background-color:rgba(0,255,0,0.4);
  font-family:'Agency FB';
}
.role,.role1{
height: 60%;
 width: 90%;
  border:1px solid transparent;
  margin-left:3%;
   text-align:center;
  border-radius:20px;
  background-color: rgba(0,40,25,0.4);
}

.mom{
  color:rgba(255,255,25,1);;
}
.block{
  font-family:Kristen ITC;
}

footer{
   font-family:arial;
          border:1px solid transparent;
          margin-left:3%;
          margin-right:3%;
          border-radius:20px;
          background-color: rgba(0,0,255,0.6);
}
body{
  background-color: rgba(0,0,0,0.3);
}
    input{
        border-radius:10%;
        height: 5%;
        text-align:center;
        }
              input[type="submit"]:hover{
    color:rgba(0,0,250,0.5);
    background-color:rgba(25,25,25,0.2);
    height:5%;
    border-radius:3%;
        }
   a:focus{
    color:red;
   }
        </style>
      </head>

<body>
<header class="tete"><b><center><h1>GESTIONS DES PROBLEMES AVEC LES COMPTES</h1></center></b></header>
<br><br>
<nav>
      <ul>
        <li><a href="index.php">Accueil</a></li>
      <li><a href="creeCompte.php">Creer mon compte</a></li>
      <li><a href="connexion.php">Connexion</a></li>
      <li><a href="mario/fotsing.html">Diverts</a></li>
       </ul>
    </nav>

<section>
<aside>
  <p><center><u>Les probleme de la banque</u> </center></p>
  <p>1   -  <a href="javaScript:affiche()">Compte blocquer</a></p>
  <p>2   -  <a href="javaScript:origine()">Mot de passe oublier</a></p>
  <p>3   -  <a href="javaScript:affaire()">Plus d'information</a> </p>
  <p>4   -  <a href="javaScript:definir()">Autre chose</a></p>  
</aside>
<br>
<div class="role">
<p id="dir"></p>
</div>

<br>


<div class="role1">
<p  id="top"></p>
</div><br>
</section>

<article>
  <p><center><u class="mom">Salut et bienvenue dans la page resolution des problèmes</u></center></p>
  <p>Nous somme les entrepreneur de ce site et si vous etes la vous c'est pour une raison prescis ou plutot juste pour une simple decourverte. Si vous etes ici pour un probleme sachez que nous somme entierement en votre disposition. pour vos probleme de compte comme par exemple:
  <ol>
    <li>Compte blocquer</li>
    <li>Mot de passe oublier</li>
    <li>Manque d'information</li>
    <li>Autre chose </li>
    </ol>
  <p>nous pouvons les resoudre. Ces probleme plus haut evoquer sont les probleme standards dont les solution ne se resoudront sans trop d'efford; juste vous devez remplir un ensemble de formulaire pour rendre cela possible.
  maintenant si le probleme n'est pas standard; c'est a dire elle aparait dans le point autre chose alors vous pouvez chater avec un personnel de la banque pour trouver une solution efficace a votre probleme.
  vous etes dans la banque du succes et notre priorite est de vous satisfaire au maximum mais si vous la aussi c'est parce que il y a certainement une regle que vous avez enfreint et qui vous a causer des probleme alors nous vous disond tout simplement que pour eviter d'etres malchanceux ou d'avoir des probleme avec votre compte il faut entre autre:</p>
  

<p><center> Encore une fois nous vous remercions d'avoir choisir Riberost</center></p>
</article>

<script language="javascript">
let parg = document.getElementById("dir");
let form = document.getElementById("foto");
let fraise = document.getElementById("top");
parg.innerHTML="<span class='block'>Choisissez l'option Compte blocquer ou mot de passe oublier</span>";
fraise.innerHTML="<span class='block'>Choisissez l'option plus d'information ou Autres choses</span>";
function affiche(){
  parg.innerHTML="<form  name='form' method='POST' action='effectrem.php' target='blank'> <label>Pseudo :</label><br> <input type='text' name='nom' id='nom' required/><br><label>numero tel :</label><br><input type='number' name='tel' id='tel' required/><br><label>Password :</label><br><input type='password' name='code' id='code' required/><br><label>rembourse+Frai(5000fcfa) :</label><br><input type='number' name='kap'  id='kap' required><br><br><input type='submit' value='OK!!!' id='envoyer' name='retrac'></form>";
  fraise.innerHTML="<span class='block'>Choisissez l'option plus d'information ou Autres choses</span>";
}

function affaire(){
fraise.innerHTML="<form  name='form' method='POST' action='effectrem.php' target='blank'><label>Pseudo :</label><br> <input type='text' name='nom' id='nom' required/><br><label>Password :</label><br><input type='password' name='code' id='code' required/><br><label>Incription (500frs) :</label><br><input type='number' name='ins' id='code' required/><br><br><input type='submit' value='OK!!!' id='envoyer' onclick='alert('vous avez souscrit au forfait message plus plus fous serrez donc informer 5/5')'name='retrac'></form><br><br><p>NB : Vous avez besoin d'un compte pour apparier cet option</p>";
parg.innerHTML="<span class='block'>Choisissez l'option Compte blocquer ou mot de passe oublier</span>";
}

function origine(){
  parg.innerHTML="<form  name='form' method='POST' action='effectrem.php' target='blank'> <label>Pseudo :</label><br> <input type='text' name='nom' id='nom' required/><br><label>Email :</label><br> <input type='email' name='mail' id='mail' required/><br><label>numero tel :</label><br><input type='number' name='tel' id='tel' required/><br><br><input type='submit' value='OK!!!' id='envoyer' name='retrac'></form>";
  fraise.innerHTML="<span class='block'>Choisissez l'option Compte blocquer ou mot de passe oublier</span>";
}

function definir(){
   fraise.innerHTML="<form  name='form' method='POST' action='chat.php' target='blank'> <label>Pseudo :</label><br> <input type='text' name='nom' id='nom' required/><br><label>Password :</label><br> <input type='password' name='code' id='code' required/><br><label>numero tel :</label><br><input type='number' name='tel' id='tel' required/><br><br><input type='submit' value='OK!!!' name='envoie'><br><br><p>NB : Vous avez besoin d'un compte pour apparier cet option</p><br>Nom agent :<p><select name='perso' required><option value='Fotsing tchide'>Fotsing tchide</option></select></form>";

parg.innerHTML="<span class='block'>Choisissez l'option Compte blocquer ou mot de passe oublier</span>";
     }

</script>

<footer>
  <b><center><h1>VIVE LA BANQUE RIBERFOST ET VIVE LE CAMEROUN</h1></center></b>
</footer>


</body>
</html>