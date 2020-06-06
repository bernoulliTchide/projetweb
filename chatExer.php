<?php
session_start();

?>
<html>
	<head>
		<title> chat  </title>
                <meta charset="utf-8"/>
	</head>
	 
	 <body>
     <?php
	 if(isset($_POST['envoyer'])){
		  if(isset($_POST['mes'])){
		 
		  try{
				 $bdd = new PDO('mysql:host=localhost;dbname=banque','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			 }catch(Exception $e){die('Erreur: '.$e->getMessage());}
		 

		       $pseudo = $_SESSION['pseudo'];
		       $pass = $_SESSION['pass'];
			   $tel = $_SESSION['tel'];
				 $message = htmlspecialchars($_POST['mes']);


$envoi = $bdd->prepare('SELECT id FROM abonne WHERE nom=? AND password = ? AND tel = ?');
$envoi->execute(array(
      $pseudo,
      $pass,
      $tel
	)
);
$idabonne = $envoi->fetch();
$id_envoi = $idabonne['id'];

$recoi = $bdd->prepare('SELECT id FROM abonne WHERE nom=?');
$recoi->execute(array(
      $_SESSION['recepteur']
	)
);
$idrecoi = $recoi->fetch();
$id_recoi = $idrecoi['id'];
				 $reponse = $bdd->prepare('INSERT INTO minichat(pseudo,message,dates,id_envoi,id_recoi,pseudo_r)VALUES(:pseu,:mes,NOW(),:envoi,:recoi,:pseu_r)');
				 $reponse->execute(array(
				 'pseu' => $pseudo,
				 'mes' => $message,
				 'envoi' => $id_envoi,
				 'recoi' => $id_recoi,
				 'pseu_r' => $_SESSION['recepteur']
				 )
				 );
		     header('location:chat.php');
		  }
		  else{
			  echo 'entrer les deux champs mise a votre disposition';
			  ?>
			  <a href="chat.php">retour a la page chat</a>
			  <?php
		  }
		 
	 }
	 
	 ?>
	 </body>
</html>