<?php session_start();
?>
<html>
	<head>
		<title> commentaire pour le biellet </title>
                <meta charset="utf-8"/>
						<style>
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
				.news{
					width:50%;
					margin:auto;
					background-color:#CCCCCC;
				}
				a{
					text-decoration:none;
					color:blue;
				}
				.comment{
					margin-left:10%;
					font-family:times;
					font-size:1.5em;
				}
				.form{
					float:right;
					font-size:1.5em;
					position:absolute;
					left:70%;
				}
				.case{
					width:250px;
					height:100px;
				}
				.dom{
					font-size:1em;
					font-family:times;
					margin-left:10%;
				}
				
				</style>
	</head>
	 
	 <body>
    <h1>MON SUPER BLOG!</h1></br>
	<p><a href="index.php">retour a la liste des billet</a><p>
   
	<?php 
	$prend = htmlspecialchars($_GET['champ']);
	$compteur = 0;
    while(true){
		if($compteur == $_GET['champ']){
		break;
		}
		$compteur++;
	}
	try{
	$bdd = new PDO('mysql:host=localhost;dbname=blog','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}catch(Exception $e){die('Erreur '. $e->getMessage());}
	
	if(isset($_GET['add'])){
	  $ponse = $bdd->prepare('INSERT INTO commentaire(id_billet,auteur,commentaire,date_commentaire)VALUES(?,?,?,NOW())');
	  $ponse->execute(array($_GET['champ'],$_GET['pseu'],$_GET['case']));
		
	}
	
	$reponse = $bdd->prepare('SELECT id,titre,contenu,DAY(date_creation) AS jour,MONTH(date_creation) AS mois,YEAR(date_creation) AS annee,HOUR(date_creation) AS heur,MINUTE(date_creation) AS minute,SECOND(date_creation) AS seconde FROM billets WHERE id = ?');
	$prend = htmlspecialchars($_GET['champ']);
	$reponse->execute(array($prend));
	 $take = $reponse->fetch();
	 ?>
		<p>
	<div class="news">
	<h3><?php echo $take['titre'].' ! le '.$take['jour'].'/'.$take['mois'].'/'.$take['annee'].' à '.$take['heur'].'h'.$take['minute'].'min'.$take['seconde'].'s';?></h3>
	
	<p><?php echo $take['contenu'] ?></p>
	</div>
	</p>
	<?php
	$reponse->closeCursor();
	?>
       <a href="post_comment.php?champ=<?php echo $compteur?>"><div class="form"><input type="button" value="ajoutez un commentaire"></div></a>
	<div class="comment">
	<strong><h2>Commentaire</h2></strong>
	</div>
	<div class="dom">
	<p>
		<?php 
	$retire = $bdd->prepare('SELECT id_billet,auteur,commentaire,DAY(date_commentaire) AS jour,MONTH(date_commentaire) AS mois,YEAR(date_commentaire) AS annee,HOUR(date_commentaire) AS heur,MINUTE(date_commentaire) AS minute,SECOND(date_commentaire) AS seconde FROM commentaire WHERE id_billet=? LIMIT 0,5');
		$prend = htmlspecialchars($_GET['champ']);
	$retire->execute(array($prend));
	while($crepe = $retire->fetch())
	{
	?>
	<p><strong><?php echo $crepe['auteur'].' '?></strong><?php echo ' le '.$crepe['jour'].'/'.$crepe['mois'].'/'.$crepe['annee'].' à '.$crepe['heur'].'h'.$crepe['minute'].'min'.$crepe['seconde'].'s';?></p>
	<p><?php echo $crepe['commentaire']?></p>
	<?php
	}
		
	?>
	
	
	
	</p>
    </div>
	 </body>
</html>