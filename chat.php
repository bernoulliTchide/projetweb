<?php
session_start();
$_SESSION['merde'] = 'non';
?>

<html>
	<head>
		<title> Chat perso  </title>
                <meta charset="utf-8"/>
                <style>
                .secte{
                	width:50%;
                	height: 70%;
                	border:1px solid transparent;
                	overflow-y:auto;
                	background-color: rgba(0,0,0,0.7);
                }
                .titre{
                	font-family:'Kristen ITC';
                	color:white;
                	border:1px solid rgba(0,0,0,0.9);
                	width:50%;
                	border-top-left-radius:5px;
                	border-top-right-radius:5px;
                	background-color: rgba(0,0,0,0.8);
                	text-align:center;
                }

                .clair{
                	font-family:times;
                	border:1px solid transparent;
                	width:50%;
                	border-bottom-left-radius:5px;
                	border-bottom-right-radius:5px;
                	background-color: rgba(0,0,0,0.6);
                }

               .mess{
               	margin-left:2%;
               	width:50%;
               	height: auto;
                font-size:16px;
               	background-color:rgba(0,255,0,0.4);
               	border:2px solid transparent;
               	border-radius:15px;
               	padding: 2%;
               }

                .messe{
                margin-left:41%;
                width:50%;
                height: auto;
                font-size:16px;
                background-color:rgba(255,255,255,0.5);
                border:2px solid transparent;
                border-radius:15px;
                padding: 2%;
               }
               

               .sage{
               	width:60%;
               }
               textarea,.img{
               	display:inline-block;
               }
            textarea
{
	width:62%;
	height:50px;
  text-align: justify;
	font-family:Arial;
	border:1px solid rgba(0,0,0,0.6);;
	font-size:20px;
	border-radius:20px;
	overflow-y: hidden;
	resize: none;
	font-weight: none;
}
.img{
	border-radius:100%;
	border:1px solid rgba(0,0,0,0.6);
  height:4%;

}
.img:hover{
  color:blue;
    border:1px inset rgba(0,0,0,0.6);
}
.pseu{
	font-family:'Monotype corsiva';
  color: rgba(0,0,255,0.6);
}
#date{
  font-size:10px;
  color:rgba(255,0,54,0.7);
}
            </style>
	</head>
	 
	 <body>
   <?php
if(isset($_POST['envoie'])){
$_SESSION['pseudo'] = $_POST['nom'];
$_SESSION['tel'] = $_POST['tel'];
$_SESSION['pass'] = $_POST['code'];
$_SESSION['recepteur'] = $_POST['perso'];
}
?>
	 <section class="titre">

	 <p>chat avec un personnel de Riberfost </p>
	 </section>
		<section class="secte">
		
		
		     <?php 
		 
  try{
         $bdd = new PDO('mysql:host=localhost;dbname=banque','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
       }catch(Exception $e){die('Erreur: '.$e->getMessage());}
     
 $test = $bdd->prepare('SELECT tel,nom,password FROM abonne WHERE tel = ? AND nom = ? AND password = ?');
    $test->execute(array(
      $_SESSION['tel'],
      $_SESSION['pseudo'],
      $_SESSION['pass']
      )
    );
    
    $pomme = $test->fetch();

 if(strlen($pomme['nom'])==0){
     $_SESSION['merde'] = 'oui';
     
       header('location:admin.php');
    }



$envoi = $bdd->prepare('SELECT id FROM abonne WHERE nom=? AND password = ? AND tel = ?');
$envoi->execute(array(
      $_SESSION['pseudo'],
      $_SESSION['pass'],
      $_SESSION['tel']
  )
);
$idabonne = $envoi->fetch();
$id_envoi = $idabonne['id'];


$reponse = $bdd->query('SELECT pseudo,message,pseudo_r,DAY(dates) AS jour,MONTH(dates) AS mois,YEAR(dates) AS annee,HOUR(dates) AS heur,MINUTE(dates) AS minute,SECOND(dates) AS seconde  FROM minichat ORDER BY dates ASC');

				 while($prend = $reponse->fetch())
				 {
          if($prend['pseudo'] == $_SESSION['pseudo']){
				 ?>
 <p><div class="mess"><?php echo '~<span class="pseu">'.$prend['pseudo']. '</span><br>  '.$prend['message'];?>
         <span id="date" ><?php echo 'envoyer'.' le '.$prend['jour'].'/'.$prend['mois'].'/'.$prend['annee'].' à '.$prend['heur'].'h'.$prend['minute'].'min'.$prend['seconde'].'s';?></em></div>
         </p>
				 <?php
				 }

         else if($prend['pseudo'] != $_SESSION['pseudo']){
          ?>

           <p><div class="messe"><?php echo '~<span class="pseu">'.$prend['pseudo']. '</span><br>  '.$prend['message'];?>
         <span id="date" ><?php echo 'envoyer'.' le '.$prend['jour'].'/'.$prend['mois'].'/'.$prend['annee'].' à '.$prend['heur'].'h'.$prend['minute'].'min'.$prend['seconde'].'s';?></em></div>
         </p>

          <?php
        }
      }
				 ?>
         </section>
         <section class="clair">
         <form action="chatExer.php" method="POST">
         	<center><p><textarea name="mes"></textarea><input type="submit" value="Send ->" class="img" name="envoyer"/></p></center>
         	</form>
         </section>
   
		


	 </body>
</html>