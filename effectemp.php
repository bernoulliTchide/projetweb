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
function dateplusdix(){
  

	$jour = date('d');
	$mois = date('m');
	$annee = date('Y');
	$jour = $jour + 10;
	if($jour>30){
		$jour = $jour - 30;
		$mois = $mois + 1;

		if($mois>12){
			$mois = $mois - 1;
			$annee = $annee + 1;
		}
	}

	return $annee.'-'.$mois.'-'.$jour.' '.date('H').':'.date('i').':'.date('s');
}

try{
$bdd = new PDO('mysql:host=localhost;dbname=banque','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(Exception $e){die('Erreur '.$e->getMessage());}

	$nom=$_POST['nom'];
	$email=$_POST['mail'];
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

   $nbr_op = $bdd->prepare('SELECT COUNT(*) AS op FROM operation WHERE id_destinataire=?');
     $nbr_op->execute(array(
 		$id_em
		)
	);

    $nbr_op1 = $bdd->prepare('SELECT COUNT(*) AS op FROM retrait WHERE id_abonne=?');
     $nbr_op1->execute(array(
 		$id_em
		)
	);

     $p = $nbr_op1->fetch();
     $p2 = $nbr_op->fetch();
     $nb_operation = $p['op'] + $p2['op'];

if($nb_operation < 5 ){
?>
<script language="javascript">
alert("vous ne pouvez pas empreinter de l'argent a la banque pour le moment. Continuer a faire des operation et vous serez a mesure d'empreinter Merci!!! ");

</script>

<?php
}
else{
$message = 'Vous avez empreinter une somme de montant '.$solde.' Frcfa a la banque a remetre dans un delais de rigueur de 10 jours  Riberfost vous remercie';
$delait = dateplusdix();
  $requette = $bdd->prepare('INSERT INTO donnee_banque(id,id_abonne,montant,date,delait,nb_operation,message,nom_abonne)VALUES(NULL,?,?,NOW(),?,?,?,?)');

	$requette->execute(array(
 		$id_em,
        $solde,
        $delait,
        $nb_operation,
        $message,
        $nom_em
		)
	);

$argent = $solde;

  $rembours = $bdd->prepare('INSERT INTO status_empreint(id,id_abonne,nom_abonne,montant_total_emp,delais)VALUES(NULL,?,?,?,?)');

	$rembours->execute(array(
 		$id_em,
 		$nom_em,
        $argent,
        $delait
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


<p><div class="det">VOUS VENNEZ D'EMPREINTER DE L'ARGENT A LA BANQUE MERCI</div></p>
<?php
}
?>
</body>
</html>