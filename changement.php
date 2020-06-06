<?php
session_start();
?>

<html>
	<head>
		<title> change de parametre</title>
		<style>
		body{
			background-color:rgba(0,0,0,1);
		}
 			.centrer{
 				position:absolute;
 				left:27%;
 				top:30%;
 				background-color: rgba(255,255,255,1);
 				height: 45%;
 				width: 45%;
 				text-align: center;
 				border-radius:3%;

 			}
 			label{
 				font-family:'arial black',sans-serif;
 				size:4%;
 			}
 			.prend{
 				border-color:red;
 			}

.mail{
	width: 60%;
	font-size:20px;
}

        input[type="submit"]:hover{
		color:rgba(0,0,250,0.5);
		background-color:rgba(25,25,25,0.2);
		height:10%;
		border-radius:3%;
        }
         input[type="submit"]{
		height:10%;
		border-radius:3%;
        }

            input{
				border-radius:10%;
				height: 14%;
				text-align:center;
        }
        .message{
          color:rgba(0,255,0,0.6);
          size:6px;
          font-family:'arial black';
        }
	</style>
	</head>

	<body>
<div class="centrer">
<?php 
 if($_POST['modif'] == 'nom')
 	
  {$_SESSION['verifip']='nom';
  	?>
	<section class="free">
	<form action="changeur.php" method="POST" target="_blank">
	<br>
	<br>
	<label for="nom">Pseudo Courant:</label><br>
	<input type="text" name="nom" id="nom" required value="<?php echo $_SESSION['name'];?>"><br><br>
	<label for="nom">Pseudo Nouveau:</label><br>
	<input type="text" name="nom2" id="nom2" required><br><br>
	<input type="submit" value="Changer" name="changeNom">
	</form>
	</section><br><br>


   <?php  }else if($_POST['modif'] == 'tel')
 
  {  $_SESSION['verifip']='tel';
  	?>
	<section class="free">
	<form action="changeur.php" method="POST" target="_blank">
	<br>
	<br>
	<label for="tel">Telephone courant :</label><br>
	<input type="number" name="tel" min = 0 id="tel" required value="<?php echo $_SESSION['tele'];?>"><br><br>
	<label for="tel">nouveau Telephone :</label><br>
	<input type="number" name="tel2" min = 0 id="tel2" required><br><br>
	<input type="submit" value="Changer" name="changeTel">
	</form>
	</section><br><br>

   <?php  }else if($_POST['modif'] == 'email')
  
  { $_SESSION['verifip']='mail';
  	?>
	<section class="free">
	<form action="changeur.php" method="POST" target="_blank">
	<br>
	<br>
	<label for="email">Email Courant:</label><br>
	<input type="email" name="mail" class="mail" required value="<?php echo $_SESSION['mail'];?>"><br><br>
	<label for="email">Nouveau Email:</label><br>
	<input type="email" name="mail2" class="mail" required><br><br>
	<input type="submit" value="Changer" name="changeMail">
	</form>
	</section><br><br>
 
  <?php  }else if($_POST['modif'] == 'password')
  
  {$_SESSION['verifip']='oui';
  	?> 
	<section class="free">
	<form action="changeur.php" method="POST" target="blank">
	
	<label for="code">Ancien Mot de passe :</label><br>
	<input type="password" name="code"  id="code" required><br><br>
	<label for="code">neauveau Mot de passe :</label><br>
	<input type="password" name="code1" id="code1" required><br><br>
	<label for="code">confirmer Mot de passe :</label><br>
	<input type="password" name="code2" id="code2" required><br><br>
	<span id="take"></span>
	
	</form>
	</section><br>




  <?php
  }
   ?>
  </div>

  <script language="javaScript">
  if("<?php echo $_SESSION['verifip'];?>" == "oui"){
   var code = document.getElementById("code");
   var code1 = document.getElementById("code1");
   var code2 = document.getElementById("code2");
 var take = document.getElementById("take");
  
  function stylistic(){
     if(!take){
      alert("impossible de recuperer le take");
    }
    if(!code){
    	alert("impossible de recuperer le code");
    }
     if(!code1){
    	alert("impossible de recuperer le code1");
    }
     if(!code2){
    	alert("impossible de recuperer le code2");
    }
  code1.style.borderColor = "green";
  if(code.value.length == 0 || code.value == "<?php echo $_SESSION['pass'];?>"){
    code.style.borderColor="green";
}
else{
	code.style.borderColor="red";
}

if(code2.value.length == 0 || code2.value == code1.value){
	code2.style.borderColor = "green";
}
else{code2.style.borderColor = "red";}

if(code.value == "<?php echo $_SESSION['pass'];?>" && code1.value == code2.value && code1.value.length != 0){
   take.innerHTML = "<input type='submit' value='Changer'  name='changePass' onclick = 'blure'>";
   clearInterval(game);
}
else{take.innerHTML = "bien remplir svp et le bouton apparaitra";
}
 


}
  var game = setInterval(stylistic,1000/30);
   }
   <?php $_SESSION['verifip'] == 'non';?>
  </script>

<script type="text/javascript">
function blure(){
var code = document.getElementById("code");
   var code1 = document.getElementById("code1");
   var code2 = document.getElementById("code2");
  if(code.value != "<?php echo $_SESSION['pass'];?>" || code1.value != code2.value){
  	<?php $_SESSION['verifie']='non';?>
  	alert("vous irrez certe dans une autre parge met les information que vous avez entrer ne sont pas coherentes");
  }
  else{
  	<?php $_SESSION['verifie']='oui';?>
  }
}
</script>


  <script language="javaScript">
  if("<?php echo $_SESSION['verifip'];?>" == "tel"){
   var tel = document.getElementById("tel");
   var lel2 = document.getElementById("tel2");

  function stylistic(){
    if(!tel){
    	alert("impossible de recuperer le telephone");
    }
     if(!tel2){
    	alert("impossible de recuperer le telephone1");
    }
  
  tel.style.borderColor = "green";
  if(tel.value == "<?php echo $_SESSION['tele'];?>"){
    tel.style.borderColor="green";
}
else{
	tel.style.borderColor="red";
}

if(tel2.value.length == 0 || tel2.value.length == 9 ){
	tel2.style.borderColor = "green";
}
else{tel2.style.borderColor = "red";}

}
  var game = setInterval(stylistic,1000/30);
   }
   <?php $_SESSION['verifip'] == 'non';?>
  </script>



 <script language="javaScript">
  if("<?php echo $_SESSION['verifip'];?>" == "nom"){
   var nom = document.getElementById("nom");
   var nom2 = document.getElementById("nom2");

  function stylistic(){
    if(!nom){
    	alert("impossible de recuperer le nom");
    }
     if(!nom2){
    	alert("impossible de recuperer le nom2");
    }
  
  nom.style.borderColor = "green";
  if(nom.value == "<?php echo $_SESSION['name'];?>"){
    nom.style.borderColor="green";
}
else{
	nom.style.borderColor="red";
}

if(nom2.value.length != 0 ){
	nom2.style.borderColor = "green";
}
else{nom2.style.borderColor = "red";}

}
  var game = setInterval(stylistic,1000/30);
   }
   <?php $_SESSION['verifip'] == 'non';?>
  </script>




</body>
</html>