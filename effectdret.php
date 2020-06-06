<?php
session_start();
$_SESSION['invite'] = 'non';
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


	$id_recep = $bdd->prepare('SELECT id,solde FROM abonne WHERE tel=?');
	$id_recep->execute(array(
 		$tel
		)
	);
   $idr = $id_recep->fetch();
   $id_recepteur = $idr['id'];

   $solde_banque = $idr['solde'];
if($solde_banque>=$solde)
{
$messretrait = 'Vous venez de faire un retrait de '.$solde.' Frcfa Riberfost est votre allies';

   $requette = $bdd->prepare('INSERT INTO retrait(id,id_abonne,date,montant,message)VALUES(NULL,?,NOW(),?,?)');
   $requette->execute(array(
   	$id_recepteur,
   	$solde,
   	$messretrait
   	)
   );
 
   $directe = $bdd->prepare('UPDATE abonne SET solde=solde-? WHERE tel=? AND password=?');
    $directe->execute(array(
   	$solde,
   	$tel,
   	$identifiant
   	)
   );
?>
<p><div class="det">RETRAIT EFFECTUER AVEC SUCCESS MERCI</div></p>
<?php
}else if($solde>$solde_banque){
	$_SESSION['invite']='oui';
   header('location:depot.php');
}
?>
</body>
</html>