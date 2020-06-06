<?php
session_start();
setcookie('argent',0,time()+365*24*3600,null,null,false,true);
setcookie('nom','france',time()+365*24*3600,null,null,false,true);
setcookie('teles',11111,time()+365*24*3600,null,null,false,true);
$_SESSION['admet'] = 'oui';
?>

<?php
if($_SESSION['invite'] == 'oui')
{
?>
<script language="javaScript">
alert("vous ne pouvez pas retirer cette somme car votre solde est insurfisant");
</script>
<?php
}
?>


<html>

<?php if(isset($_POST['depots'])){
	?>
	<head>
		<title> DEPOT</title>
		<link rel="stylesheet" type="text/css" href="depot.css"/>
		<style>
			body{
	background-color: rgba(100,152,252,0.1);
	font-family:sans-serif;
}
label
{
	font-size:400%;
	color:orange;
	font-family:'arial';
}

 input[type="submit"]:hover{
		color:rgba(0,0,250,0.5);
		background-color:rgba(25,25,25,0.2);
		height:15%;
		border-radius:3%;
        }
         input[type="submit"]{
		height:15%;
		border-radius:3%;
        }

		</style>
		<meta charset="utf-8">
	</head>
<body>


<p><div class="dep">EFFECTUEZ VOS DEPOTS EN TOUTE SECURITE</div></p>
<p align="center"><font size="14px">entrez les champs ci-dessous et validez OK</center></font></p>
<center>
<div class="direct">
<form name="form" method="POST" action="effectdep.php" target="blank">
	 <label>Nom du recepteur:</label><br>
	  <input type="text" name="nom" id="nom" required value="<?php echo $_SESSION['name'];?>" ><br>
	  <label>Email :</label><br>
	  <input type="email" name="mail" id="mail" required value="<?php echo $_SESSION['mail'];?>"/><br>
	  <label>numero tel du recepteur :</label><br>
	  <input type="number" name="tel" id="tel" required value="<?php echo $_SESSION['tele'];?>"><br>
	  <label>Password :</label><br>
	  <input type="password" name="code" id="code" required value="<?php echo $_SESSION['pass'];?>"/><br>
	  <label>Argent de depot :</label><br>
	  <input type="number" name="kap" id="kap" required ><br><br>
	  <input type="submit" value="OK!!!" id="envoyer" name="depos">
	  </form>
	  </div>
	  </center>
<?php
}
else if(isset($_POST['retraits'])||$_SESSION['invite'] == 'oui'){
	?>
	<head>
		<title> RETRAITS</title>
		<link rel="stylesheet" type="text/css" href="polices/depot.css"/>
		<meta charset="utf-8">
				<style>
			body{
					background-color: rgba(100,152,252,0.2);
					font-family:sans-serif;
				}
				label
{
	font-size:400%;
	color:orange;
	font-family:'arial';
}

 input[type="submit"]:hover{
		color:rgba(0,0,250,0.5);
		background-color:rgba(25,25,25,0.2);
		height:15%;
		border-radius:3%;
        }
         input[type="submit"]{
		height:15%;
		border-radius:3%;
        }
        input[required]
        {
        	font-size:400%;
	text-align:center;
        }

		</style>
	</head>
<body>
	<p><div class="dep">EFFECTUEZ VOS RETRAITS EN TOUTE SECURITE</div></p>
<p align="center"><font size="14px">entrez les champs ci-dessous et validez OK</center></font></p>
<center>
<div class="direct">
<form name="form" method="POST" action="effectdret.php" target="blank">
	 <label>Nom :</label><br>
	  <input type="text" name="nom"  required value="<?php echo $_SESSION['name'];?>"/><br>
	  <label>Email :</label><br>
	  <input type="email" name="mail" required  value="<?php echo $_SESSION['mail'];?>"/><br>
	  <label>numero tel :</label><br>
	  <input type="number" name="tel"   value="<?php echo $_SESSION['tele'];?>" required><br>
	  <label>Password :</label><br>
	  <input type="password" name="code" required  value="<?php echo $_SESSION['pass'];?>"/><br>
	  <label>Argent à retirer :</label><br>
	  <input type="number" name="kap"   required><br><br>
	  <input type='submit' value='OK!!!' id='envoyer' name='retrac'>
	  </form>
	  </div>
	  </center>

 

<?php
$_SESSION['invite']='non';
}
$bdd = new PDO('mysql:host=localhost;dbname=banque','root','');
?>




 <script language="javaScript">
    
       var pseudo = document.getElementById("nom");
       var telephone = document.getElementById("tel");
       let version = [];
       let i=0;
       <?php 
       	$tout = $bdd->query('SELECT nom,tel FROM abonne');

        while($name = $tout->fetch())
        {
        ?>
       
 version[i] = {nom:"<?php echo $name['nom'];?>",tel:"<?php echo $name['tel'];?>"};
       
         i = i+1;
        <?php	
        }

       ?>
       function verify(){
       	pseudo.style.borderColor = "green";
          	 telephone.style.borderColor = "green";
          	
          	for(let k = 0;k<i;k++){
          		if(pseudo.value == version[k].nom){
          			pseudo.style.borderColor = "green";
          			telephone.value = version[k].tel;
          			telephone.style.borderColor = "green";
          			break;
          		}
          		else{
          			pseudo.style.borderColor = "red";
          			telephone.style.borderColor = "red";
          		}
          	}

        

         
         }




    var game = setInterval(verify,1000/60);
  </script>




</body>
</html>