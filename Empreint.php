	<?php session_start();

  ?>

  <head>
		<title> Empeint </title>
		<link rel="stylesheet" type="text/css" href="depot.css"/>
		<meta charset="utf-8">

        <script language="javaScript">
function mafonction(){
var infos = document.getElementById("infos");
infos.innerHTML = "bonjour <?php echo $_SESSION['name'];?> pour devenir un partenaire de la banque afin de pouvoir Empreinter de l'argent il faut :<br> 1 - effectuer au moins 5 transaction banquaire (depot et/ou retrait);<br> 2 - les montant de depot et/ou de retrait doivent etre au moins de 5000 * 5fois; <br>3 - rendre dans le delais les empreint d'argent a la banque;<br> 4 - bien se comporter au sein de la banque.";
}
    </script>
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
	<p><div class="dep">VOUS VOULEZ EMPREINTER DE L'ARGENT A LA BANQUE</div></p>
<p align="center"><font size="14px">entrez les champs ci-dessous et validez OK</center></font></p>
<center>
<div class="direct">
<form name="form" method="POST" action="effectemp.php" target="blank">
	 <label>Nom :</label><br>
	  <input type="text" name="nom" id="nom" required value="<?php echo $_SESSION['name'];?>"/><br>
	  <label>Email :</label><br>
	  <input type="email" name="mail" id="mail" required  value="<?php echo $_SESSION['mail'];?>"/><br>
	  <label>numero tel :</label><br>
	  <input type="number" name="tel"   id="tel" value="<?php echo $_SESSION['tele'];?>" required><br>
	  <label>Password :</label><br>
	  <input type="password" name="code" id="code" required  value="<?php echo $_SESSION['pass'];?>"/><br>
	  <label>Montant à empreinter :</label><br>
	  <input type="number" name="kap"  id="kap" required><br><br>
	  <input type='submit' value='OK!!!' id='envoyer' name='retrac'>
    <p>NB: Ne peut empreinter de l'argent a la banque que ceux qui sont des fidel de la banque<br>
    <a href="javaScript:mafonction()">Comment devenir un fidel de la banque</a></p>
	  </form>
	  </div>
	  </center>
    <span id="infos"></span>

</body>
</html>