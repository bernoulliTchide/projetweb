<?php
session_start();
?>
<html>
	<head>
		<title> result Empreint</title>
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
        background-color:rgb(200,20,30,1);
	
}


		</style>
	</head>
<body class="corp">


<?php

try{
$bdd = new PDO('mysql:host=localhost;dbname=banque','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(Exception $e){die('Erreur '.$e->getMessage());}
  $email = '';
 if(isset($_POST['retrait'])){
     $email=$_POST['mail'];
 }

	$nom=$_POST['nom'];
	$identifiant=$_POST['code'];
	$solde=$_POST['kap'];
	$tel=$_POST['tel'];
	


	$id_recep = $bdd->prepare('SELECT id,nom FROM abonne WHERE tel=?');
	$id_recep->execute(array(
 		$tel
		)
	);
   $idr = $id_recep->fetch();
   $id_em = $idr['id'];
   $nom_em = $idr['nom'];

 
$montant = $bdd->prepare('SELECT SUM(montant) AS somme FROM donnee_banque WHERE id_abonne = ?');
   $montant->execute(array(
 		$id_em
		)
	); 
   $somme = $montant->fetch();

$montants = $bdd->prepare('SELECT SUM(montant_rembousser) AS somme FROM remboussement WHERE id_abonne = ?');
   $montants->execute(array(
 		$id_em
		)
	); 
   $sommes = $montants->fetch();


$message = 'Remboussement de dete a la banque d\'un montant de '.$solde.' Frcfa Riberfost vous remercie';
$argent = $somme['somme'];
$_dete = $argent - $_POST['kap']-$sommes['somme'];
$message = 'Vous venez d\'apporter un remboussement sur vos dete. vous avez avancé '.$_POST['kap'].' fcfa vos dete ne sont maintenant plus que de '.$_dete.' fcfa'; 
if($_dete < 0){
$_dete = -$_dete;
	$supra= $bdd->prepare('UPDATE abonne SET solde=solde+? WHERE id = ?');
	 $supra->execute(array(
	 	$_dete,
 		$id_em
		)
	);
	 $_dete = 0;
}

if($_dete == 0){
	$supr= $bdd->prepare('DELETE FROM status_empreint WHERE id_abonne = ?');
	 $supr->execute(array(
 		$id_em
		)
	); 

  $message = 'Felicitation vous avez couvert tous vos empreint; maintenant ve ne devez plus rien à la banque';

}

  $rembours = $bdd->prepare('INSERT INTO remboussement(id,id_abonne,nom_abonne,montant_total_emp,montant_rembousser,dete_a_rembousser,date,message)VALUES(NULL,?,?,?,?,?,NOW(),?)');

	$rembours->execute(array(
 		$id_em,
 		$nom_em,
        $argent,
        $_POST['kap'],
        $_dete,
        $message
		)
	);



?>


<p><div class="det">VOUS VENNEZ DE REMBOURSER UNE PARTIE OU TOTALITE DE VOS DETE</div></p>
<p>plus d'information dans vos hystoric</p>
</body>
</html>