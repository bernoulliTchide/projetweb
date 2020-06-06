<?php session_start();
?>
<html>
	<head>
	
		<title> Bienvenue dans la banque</title>
		<link rel="stylesheet" type="text/css" href="banquecss.css">
		<meta charset="utf-8" lang="fr">
		<style>

			.sect
{
margin-left:20%;
	margin-right:20%;
	margin-top:6%;
	margin-bottom:auto%;
	height:auto;
	border:12px inset white;
}

input,select{
height:9%;
font-size: 14px;
font-family:'arial black';
}



input:hover{
color:rgba(0,0,250,0.5);
background-color:rgba(25,25,25,0.2);
height:9%;

}

.hist{
	margin-top:40%;
	margin-left: 3%;
	text-align:center;
	float:left;
					font-size:20px;
					color:#557634;
					font-family:'arial';

				}

		</style>
	</head>
	<body>

	<?php
	function comparer($jour,$mois,$annee,$jour1,$mois1,$annee1){
		if($annee>$annee1){
			return true;
		}
		else if($annee == $annee1 && $mois>$mois1){
			return true;
		}
		else if($annee == $annee1 && $mois == $mois1 && $jour>$jour1){
			return true;
		}

		else{
			return false;
		}

	}

  try{
$bdd = new PDO('mysql:host=localhost;dbname=banque','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

  }catch(Exception $e){die('Erreur '.$e->getMessage());}
  if(isset($_POST['connecter'])){
	$nom=htmlspecialchars($_POST['pseudo']);
	$tel=htmlspecialchars($_POST['tel']);
	$identifiant=htmlspecialchars($_POST['pass']);
	$_SESSION['name'] = $nom;
	$_SESSION['tele'] = $tel;
	$_SESSION['pass'] = $identifiant;


 $test = $bdd->prepare('SELECT id,tel,nom,password,email,solde FROM abonne WHERE tel = ? AND nom = ? AND password = ?');
    $test->execute(array(
    	$tel,
    	$nom,
    	$identifiant
    	)
    );
    
    $pomme = $test->fetch();

 if(strlen($pomme['nom'])==0){
     $_SESSION['merde'] = 'oui';
     
       header('location:connexion.php');
    }
  }
 if(strlen($pomme['nom'])>0 OR $_GET['retour'] == 1 OR $_SESSION['aide']=='oui' OR isset($_POST['connecter']) OR $_GET['turn'] = 'vrai'){
	$_SESSION['mail'] = $pomme['email'];
	$id = $pomme['id'];
	$certe = $bdd->prepare('SELECT COUNT(*) AS somme FROM status_empreint WHERE id_abonne = ?');
	    $certe->execute(array(
    	$id
    	)
    );
?>

       <center><h1>LA BANQUE RIBERFOST VOUS SOUHAITE UNE CHALEUREUSE<br> BIENVENUE</h1>
        <p><?php echo $_SESSION['name'];?><p>
	
<p><nav class="hist"><a href="connexion.php">Deconnexion</a><br><br>
</nav></p></center> 

<section class="sect">
       <marquee behavior="alternate" class="gauche"><h1><big>R</big>I<span>B</span>E<big>R</big>F<span>O</span>ST</h1></marquee>
<fieldset>
<legend>Nos services</legend><center>	  
<nav class="hypp">
<br>

	  <ul >
	    <form action="hystoric.php" method="POST" target="blank"><li><input type="submit" value="Consulter mes hystoriques" name="hystoric"></li></form>
	  		<form action="depot.php" method="POST" target="blank"><li><input type="submit" value="Effectuer un depot" name="depots"></li><br>
		<li><input type="submit" value="Effectuer un retrait" name="retraits"></li></form>

       <form action="Empreint.php" method="POST" id="pret" target="blank"><li><input type="submit" value="Empreinter de l'argent" name="empreint"></li></form>
		</form>

		 <form action="rembousser.php" method="POST" target="blank" id="rem"><li><input type="submit" value="Remboussement banquaire" name="empreint"></li></form>
		</form>
		
		<form action="changement.php" method="POST" target="blank"><li><input type="submit" value="Modifier mes parametres" name="modifier">
                <select name="modif">
                <option>Element à modifier</option>
                <option value="email">Email</option>
                <option value="password">Password</option>
                <option value="nom">Nom ou pseudo</option>
                <option value="tel">Numero de Telephone</option>
                </select></li>
                </form>
		<li><input type="submit" value="Mon solde" onclick="solde()"></li>
	   </ul>
<br>
	   </div>
	   </nav>
	</fieldset>

    </section>

	 <footer>
	     <br>
	 <p><center>Copyrigth @ 2020 : Riberfost pour vous servir <center><p>
	 </footer>
	 <script language="javaScript">

	 function solde(){
         let solde = <?php echo $pomme['solde'];?>;
         alert("votre solde en banque est de "+solde+" Frcfa continuer a faire vos transfere en toute securite");
	 }


	 </script>
<?php
$elm = $certe->fetch();
 if($elm['somme'] == 0){
?>
<script language="javaScript">
var remb = document.getElementById("rem");
remb.style.display = "none";
</script>

<?php
 }

 else if($elm['somme'] != 0){
 	$regle = $bdd->prepare('SELECT delais,DAY(delais) AS jour,MONTH(delais) AS mois, YEAR(delais) AS annee FROM status_empreint WHERE id_abonne = ?');
	    $regle->execute(array(
    	$id
    	)
    );
	    $sauce = $regle->fetch();
?>
<script language="javaScript">
var remb = document.getElementById("pret");
remb.style.display = "none";
</script>


<?php

$jour = date('d');
$mois = date('m');
$annee =  date('Y');

if(comparer($jour,$mois,$annee,$sauce['jour'],$sauce['mois'],$sauce['annee'])){
$_SESSION['blocquer']='oui';
	header('location:index.php');
}
}
?>




	</body>
	<?php 
}

	?>

<html>