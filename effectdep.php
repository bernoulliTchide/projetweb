<?php
session_start();
?>
<html>
	<head>
		<title> result</title>
		<link rel="stylesheet" type="text/css" href="depot.css"/>
		<style>

           .det
{
	font-size:400%;
	text-align:center;
	border:2px solid #ADDEDF;
	background-color:rgb(0,150,0,0.6);
    color:white;
    font-style: italic;
	
}

.corp
{
	margin-top:10%;
	margin-left:10%;
	margin-right:10%;
        background-color:rgb(0,0,0,1);
	
}


		</style>
	</head>
<body class="corp">


<?php

try{
$bdd = new PDO('mysql:host=localhost;dbname=banque','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(Exception $e){die('Erreur '.$e->getMessage());}

	$nom=$_POST['nom'];
	$email=$_POST['mail'];
	$identifiant=$_POST['code'];
	$solde=$_POST['kap'];
	$tel=$_POST['tel'];
	


	$id_recep = $bdd->prepare('SELECT id FROM abonne WHERE tel=?');
	$id_recep->execute(array(
 		$tel
		)
	);
   $idr = $id_recep->fetch();
   $id_recepteur = $idr['id'];


   $id_envoi = $bdd->prepare('SELECT id FROM abonne WHERE tel=?');
	$id_envoi->execute(array(
 		$_SESSION['tele']
		)
	);
   $ide = $id_envoi->fetch();
   $id_envoyeur = $ide['id'];

$message = 'Vous vennez de faire un depot de '.$solde.' Frcfa a la personne de '.$nom.' Riberfost vous remercie';
$messaged=$_SESSION['name'].' Vous a fais un depot de '.$solde.' Frcfa  dans votre compte';
if($id_envoyeur == $id_recepteur){
$message = 'Vous vennez de faire un depot de '.$solde.' Frcfa dans votre propre compte Riberfost vous remercie';
$messaged='Votre solde a augmenté de '.$solde.' Frcfa grace au depot que vous avez effectuer dans votre compte Merci de votre fidelité';
}

  $requette = $bdd->prepare('INSERT INTO operation(id,id_destinataire,message,date,id_recepteur,montant,message_recpt)VALUES(NULL,?,?,NOW(),?,?,?)');

	$requette->execute(array(
 		$id_envoyeur,
        $message,
        $id_recepteur,
        $solde,
        $messaged
		)
	);


$indique = $bdd->prepare('UPDATE abonne SET solde=solde+? WHERE nom=? AND tel=? AND password=?');
$indique->execute(array(
	    $solde,
 		$nom,
 		$tel,
        $_SESSION['pass']
		)
	);

?>


<p><div class="det">DEPOT EFFECTUER AVEC SUCCESS MERCI</div></p>
</body>
</html>