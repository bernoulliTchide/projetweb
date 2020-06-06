<?php session_start();
?>

<html>
	<head>
		<title>  connecter vous  </title>
		<link rel="stylesheet" type="text/css" href="connec.css"/>
		<meta charset="utf-8"/>
   <style>
   footer
{
  background-color:rgba(0,0,255,0.5);
  margin-top:2em;
  height:17%;
}
         input,td{
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


.ment{
 float:right;
position:absolute;
top:30%;
left:10%;
width:25%;
}

nav
{
  display:inline-block;
  text-align:center;

}
nav ul
{
  list-style-type:none;
}

nav li
{
  display:inline-block;
  background-color: rgba(25,25,25,0.2);
   border:4px inset transparent;
  border-radius: 3px;
  height: 4%;
}

nav a
{
  font-size:1.3em;
  text-transform: uppercase;
  padding-left: 3px;
  padding-right: 3px;
  color:#181818;
  padding-bottom:3px;
  text-decoration:none;
  
}

nav a:hover
{
  color:#760001;
  border-bottom:3px solid #760001;
}
.manque{
  text-align:center;
  border:3px solid rgba(25,25,25,0.2);
}


   </style>
	</head>
	 
	 <body>

  <?php if(@$_SESSION['merde']=='oui')
                  {
                 ?>
                  <div align="right" class="ment">
                     <p>Erreur : <span style="color:red">password ou pseudo ou telephone incorrect reessayez </span></p>
                 </div>
                 <?php
                  }
                 ?>
	 
	 <header>
   <div class="manque">
<nav>
      <ul>
        <li><a href="index.php">Accueil</a></li>
      <li><a href="creeCompte.php">creer mon compte</a></li>
      <li><a href="connexion.php">connexion</a></li>
      <li><a href="mario/fotsing.html">diverts</a></li>
       </ul>
    </nav>
</div>
       <p class="texte"> Veillez remplir le formulaire suivant pour acceder a votre compte</p>

	   </header>
	   <fieldset class="partie">
	     <legend> votre identite</legend>


	<?php
  try{
$bdd = new PDO('mysql:host=localhost;dbname=banque','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

  }catch(Exception $e){die('Erreur '.$e->getMessage());}
  if(isset($_POST['compte'])){
	$nom=htmlspecialchars($_POST['nom']);
	$sex=htmlspecialchars($_POST['sex']);
	$tel=htmlspecialchars($_POST['tel']);
	$email=htmlspecialchars($_POST['mail']);
	$identifiant=htmlspecialchars($_POST['code']);

    $test = $bdd->prepare('SELECT tel,nom FROM abonne WHERE tel = ?');
    $test->execute(array(
    	$tel
    	)
    );
    
    $pomme = $test->fetch();

    if(strlen($pomme['nom'])){
     $_SESSION['decide'] = 'oui';
     
       header('location:creeCompte.php');
    }
    else{

	$requette = $bdd->prepare('INSERT INTO abonne(id,nom,tel,sex,email,password,solde)VALUES(NULL,:nom,:tel,:sex,:email,:code,:sold)');
		$requette->execute(array(
			'nom' => $nom,
			'tel' => $tel,
			'sex' => $sex,
			'email' => $email,
			'code' => $identifiant,
      'sold' => 0
		)
	);
	}
}
	?>
 
 

             

		 <center><img src="images/tete.png"></center><br>

		 <form  action="banque.php" method="POST">
		
		 <center>
		 
		 
		 <label>Pseudo :</label><br>
		 <input type="text" name="pseudo" placeholder="example" id="nom" required><br>
         
         
         <label>Mot de passe :</label><br>
		 <input type="password" name="pass" id = "pass" required><br>
		 
		 
		 <label>Tel :</label><br>
		  <input type="number" name="tel" id = "tel" required>
		  
		 </fieldset>



		 <fieldset class="merde">
		   <legend>Finaliser ou annuler votre inscription</legend>
		     <center> <input type="submit" value="Se Connecter" name="connecter">
			  <input type="reset" value="Renitialiser"></center>
		 </fieldset>
	   </form>
	 <footer>
   <br>
	 <p><center>Copyrigth @ 2020 : Riberfost pour vous servir <center><p>
   <br>
	 </footer>



    <script language="javaScript">
    
       var pseudo = document.getElementById("nom");
       var password = document.getElementById("pass");
       var telephone = document.getElementById("tel");
       let version = [];
       let i=0;
       <?php 
       	$tout = $bdd->query('SELECT nom,tel,password FROM abonne');

        while($name = $tout->fetch())
        {
        ?>
       
 version[i] = {nom:"<?php echo $name['nom'];?>",tel:"<?php echo $name['tel'];?>",word:"<?php echo $name['password'];?>"};
       
         i = i+1;
        <?php	
        }

       ?>
       function verify(){
         if(pseudo.value.length == 0 && password.value.length == 0 && telephone.value.length == 0 ){
         	pseudo.style.borderColor = password.style.borderColor = telephone.style.borderColor = "green";
          }

          else if(pseudo.value.length != 0 && password.value.length == 0 && telephone.value.length == 0 ){
          	password.style.borderColor = telephone.style.borderColor = "green";
          	
          	for(let k = 0;k<i;k++){
          		if(pseudo.value == version[k].nom){
          			pseudo.style.borderColor = "green";
          			break;
          		}
          		else{
          			pseudo.style.borderColor = "red";
          		}
          	}
          }

        

          else if(pseudo.value.length != 0 && password.value.length != 0 && telephone.value.length == 0 ){
          	 telephone.style.borderColor = "green";
          	
          	for(let k = 0;k<i;k++){
          		if(pseudo.value == version[k].nom && password.value == version[k].word){
          			pseudo.style.borderColor = "green";
          			password.style.borderColor = "green";
          			break;
          		}
          		else{
          			pseudo.style.borderColor = "green";
          			password.style.borderColor = "red";
          		}
          	}
          }

              else if(pseudo.value.length != 0 && password.value.length != 0 && telephone.value.length != 0 ){
          	
     for(let k = 0;k<i;k++){
      if(pseudo.value == version[k].nom && password.value == version[k].word && telephone.value == version[k].tel){
          			pseudo.style.borderColor = "green";
          			password.style.borderColor = "green";
          			telephone.style.borderColor = "green";
          			break;
          		}
          		else{
          			pseudo.style.borderColor = "green";
          			password.style.borderColor = "green";
          			telephone.style.borderColor = "red";
          		}
          	}
          }

         }




    var game = setInterval(verify,1000/60);
  </script>




	 </body>
</html>