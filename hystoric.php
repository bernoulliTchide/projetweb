<?php 
session_start();
?>

<html>
	<head>
	 <meta charset="utf-8"/>
		<title> Historic </title>
               
				<style>
				body{
					background-color:#CC1244;
				}
				h1,h3{
					text-align:center;
					font-family:times;
				}
				h3{
					background-color:black;
					color:white;
					margin-bottom:0px;
					font-size:0.9em;
				}
				section{
					height: auto;
					width:auto;
				}
				article,aside
				{
					  display:inline-block;
                      vertical-align:top;
                      text-align:justify;
                      border:1px solid transparent;
				}
				article{
					width:45%;
					height: 63%;
					background-color:#CCCCCC;
					overflow-y:auto;
				}
					aside{
					float: right;
					width:45%;
					height: 63%;
					background-color:#CCCCCC;
					overflow-y:auto;
				}
				a{
					text-decoration:none;
					color:blue;
					text-align: right;
				}
				.file{
					width:19.8%;
					height:70%;
					float:left;
					position:absolute;
					top:10%;
					float:right;
					border:4px inset #CCCCCC;
						background-image:url('flick.png');
				}
				
					.form{
					float:right;
					font-size:1.5em;
					position:absolute;
					top:10%;
					left:80%;
					}
					
				
				
				.case{
					width:250px;
					height:100px;
				}
				#pseu{
					width:250px;
					height:40px;
					
				}
				.hist{
					font-size:50px;
					color:#557634;
					font-family:'arial';

				}

			
				</style>
	</head>
	 
	 <body>
    <center><p><h1><u>LISTE DE MES HYSTORIQUES</u></h1></p>
<p>Les historique vous presente en detaille l'ensemble de tous les message consernant les retrait, depot, empreint, remboussement ... effectuer</p>
    </center>

	<?php
	try{
	$bdd = new PDO('mysql:host=localhost;dbname=banque','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
}catch(Exception $e){die('Erreur '.$e->getMessage());}

$nom = $_SESSION['name'];
$pass = $_SESSION['pass'];
$tel = $_SESSION['tele'];

$recupere = $bdd->prepare('SELECT id FROM abonne WHERE nom=? AND password = ? AND tel = ?');
$recupere->execute(array(
      $nom,
      $pass,
      $tel
	)
);
$idabonne = $recupere->fetch();
$id = $idabonne['id'];




	$reponse = $bdd->prepare('SELECT DISTINCT message, DAY(date) AS jour,MONTH(date) AS mois,YEAR(date) AS annee,HOUR(date) AS heur,MINUTE(date) AS minute,SECOND(date) AS seconde FROM operation,abonne WHERE id_destinataire=? ORDER BY date DESC');
	$reponse->execute(array(
       $id
		)
	);

	$repons = $bdd->prepare('SELECT DISTINCT message_recpt,DAY(date) AS jour,MONTH(date) AS mois,YEAR(date) AS annee,HOUR(date) AS heur,MINUTE(date) AS minute,SECOND(date) AS seconde FROM operation,abonne WHERE id_recepteur=? ORDER BY date DESC');
	$repons->execute(array(
       $id
		)
	);

$retrait = $bdd->prepare('SELECT DISTINCT message,DAY(date) AS jour,MONTH(date) AS mois,YEAR(date) AS annee,HOUR(date) AS heur,MINUTE(date) AS minute,SECOND(date) AS seconde FROM retrait,abonne WHERE id_abonne=? ORDER BY date DESC');
	$retrait->execute(array(
       $id
		)
	);

$changer = $bdd->prepare('SELECT DISTINCT message,element,DAY(date) AS jour,MONTH(date) AS mois,YEAR(date) AS annee,HOUR(date) AS heur,MINUTE(date) AS minute,SECOND(date) AS seconde FROM modification,abonne WHERE id_abonne=? ORDER BY date DESC');
	$changer->execute(array(
       $id
		)
	);

	$empreint = $bdd->prepare('SELECT DISTINCT message,DAY(date) AS jour,MONTH(date) AS mois,YEAR(date) AS annee,HOUR(date) AS heur,MINUTE(date) AS minute,SECOND(date) AS seconde,DATE_ADD(date, INTERVAL 11 DAY) AS delais FROM donnee_banque WHERE id_abonne=? ORDER BY date DESC');
	$empreint->execute(array(
       $id
		)
	);

$rembours = $bdd->prepare('SELECT DISTINCT message,DAY(date) AS jour,MONTH(date) AS mois,YEAR(date) AS annee,HOUR(date) AS heur,MINUTE(date) AS minute,SECOND(date) AS seconde FROM remboussement WHERE id_abonne=? ORDER BY date DESC');
	$rembours->execute(array(
       $id
		)
	);

	?>
	<section>
	<article>
	<span style="color:#235555"><strong><u>Liste des depots (internes/externes)</u></strong></span>
	<?php
	while($take = $reponse->fetch())
	{
	?>
	
	<h3><em><?php echo 'depot effectuer'.' ! le '.$take['jour'].'/'.$take['mois'].'/'.$take['annee'].' à '.$take['heur'].'h'.$take['minute'].'min'.$take['seconde'].'s';?></em></h3>
	<p><?php echo $take['message']; ?></p>
<?php 
}
while($pete = $repons->fetch())
	{
	?>
	
	<h3><em><?php echo 'depot effectuer'.' ! le '.$pete['jour'].'/'.$pete['mois'].'/'.$pete['annee'].' à '.$pete['heur'].'h'.$pete['minute'].'min'.$pete['seconde'].'s';?></em></h3>
	<p><?php echo $pete['message_recpt']; ?>
	</p>
<?php 
}
while($empr = $empreint->fetch())
	{
	?>
	
	<h3><em><?php echo 'Empreint effectuer'.' ! le '.$empr['jour'].'/'.$empr['mois'].'/'.$empr['annee'].' à '.$empr['heur'].'h'.$empr['minute'].'min'.$empr['seconde'].'s';?></em></h3>
	<p><?php echo $empr['message'].' la date de delait es fixer pour le '.$empr['delais']; ?>
	</p>
<?php 
}
?>
</article>
<aside>
<span style="color:#235555"><strong><u>Liste de mes retraits</u></strong></span>
<?php
while($rate = $retrait->fetch())
	{
	?>
	
	<h3><em><?php echo 'Retrait effectuer'.' ! le '.$rate['jour'].'/'.$rate['mois'].'/'.$rate['annee'].' à '.$rate['heur'].'h'.$rate['minute'].'min'.$rate['seconde'].'s';?></em></h3>
	<p><?php echo $rate['message']; ?></p>
<?php 
}
while($modif = $changer->fetch())
	{
	?>
	
	<h3><em><?php echo 'modification du '.$modif['element'].' ! le '.$modif['jour'].'/'.$modif['mois'].'/'.$modif['annee'].' à '.$modif['heur'].'h'.$modif['minute'].'min'.$modif['seconde'].'s';?></em></h3>
	<p><?php echo $modif['message']; ?></p>
	<?php
}
?>
<?php 
while($rem = $rembours->fetch())
	{
	?>
	
	<h3><em><?php echo 'Avance pour remboursemment ! le '.$rem['jour'].'/'.$rem['mois'].'/'.$rem['annee'].' à '.$rem['heur'].'h'.$rem['minute'].'min'.$rem['seconde'].'s';?></em></h3>
	<p><?php echo $rem['message']; ?></p>
	<?php
}
?>






</aside>
</section>
	 </body>
</html>