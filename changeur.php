<?php
session_start();
?>

<html>
      <head>
            <title> Confirmation changer</title>
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
try{

$bdd = new PDO('mysql:host=localhost;dbname=banque','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


}catch(Exception $e){die('Erreur '.$e->getMessage());}

$recupere = $bdd->prepare('SELECT id FROM abonne WHERE nom=? AND password = ? AND tel = ?');
$recupere->execute(array(
      $_SESSION['name'],
      $_SESSION['pass'],
      $_SESSION['tele']
  )
);
$idabonne = $recupere->fetch();
$id = $idabonne['id'];

 if($_SESSION['verifip']=='nom')
      
  {
$message='Un changement de pseudo a ete effectuer(reussi) et il en resulte que votre nouveau pseudo est '.$_POST['nom2'];

$modif= $bdd->prepare('INSERT INTO modification(id,id_abonne,element,date,message)VALUES(NULL,?,?,NOW(),?)');

$modif->execute(array(
   $id,
   'Pseudo',
   $message
  ));

$ecrit_abonne = $bdd->prepare('UPDATE abonne SET nom = ? WHERE tel = ?');
$ecrit_abonne->execute(array(
    $_POST['nom2'],
    $_SESSION['tele']
  ));
      ?>
      <section class="free">
      <form>
      <br>
      <br>
      <br>
      <label for="nom">votre ancien Pseudo est:</label><br>
      <input type="button" name="nom" id="nom" value="<?php echo $_SESSION['name'];?>"><br><br>
      <label for="nom">votre nouveau Pseudo est:</label><br>
      <input type="button" name="nom" id="nom2" value = "<?php echo $_POST['nom2'];?>"><br><br>
      </form>
      </section><br><br>
  <div class="message">
Changement de pseudo reussi vous aller recevoir un message de confirmation dans vos historiques.
</div>

   <?php  }else if($_SESSION['verifip']=='tel')
 
  {  
$message='Un changement de elephone a ete effectuer(reussi) et il en resulte que votre nouveau numero de telephone est '.$_POST['tel2'];

$modif= $bdd->prepare('INSERT INTO modification(id,id_abonne,element,date,message)VALUES(NULL,?,?,NOW(),?)');

$modif->execute(array(
   $id,
   'telephone',
   $message
  ));

$ecrit_abonne = $bdd->prepare('UPDATE abonne SET tel = ? WHERE password = ? AND nom = ?');
$ecrit_abonne->execute(array(
    $_POST['tel2'],
    $_SESSION['pass'],
    $_SESSION['name']
  ));

      ?>
      <section class="free">
      <form>
      <br>
      <br>
      <br>
      <label for="tel">votre ancien Telephone :</label><br>
      <input type="button" name="tel" id="tel"  value="<?php echo $_SESSION['tele'];?>"><br><br>
      <label for="tel"> votre nouveau Telephone :</label><br>
      <input type="button" name="tel2" id="tel2" value="<?php echo $_POST['tel2'];?>"><br><br>
      </form>
      </section><br><br>
  <div class="message">
Changement telephone  reussi vous allez recevoir un message de confirmation dans vos historiques.
</div>
   <?php  }else if($_SESSION['verifip']=='mail')
 
  {  
$message='Un changement d\'adresse email a ete effectuer(reussi) et il en resulte que votre nouveau email est '.$_POST['mail2'];

$modif= $bdd->prepare('INSERT INTO modification(id,id_abonne,element,date,message)VALUES(NULL,?,?,NOW(),?)');

$modif->execute(array(
   $id,
   'email',
   $message
  ));

$ecrit_abonne = $bdd->prepare('UPDATE abonne SET email = ? WHERE password = ? AND nom = ?');
$ecrit_abonne->execute(array(
    $_POST['mail2'],
    $_SESSION['pass'],
    $_SESSION['name']
  ));

      ?>


      <section class="free">
      <form>
      <br>
      <br>
      <br>
      <label for="email">votre ancien Email:</label><br>
      <input type="button" name="mail" class="mail" value="<?php echo $_SESSION['mail'];?>"><br><br>
      <label for="email">votre nouveau Email:</label><br>
      <input type="button" name="mail" class="mail" value = "<?php echo $_POST['mail2'];?>" ><br><br>
      </form>
      </section><br><br>
  <div class="message">
Changement d'adresse mail reussi vous aller recevoir un message de confirmation dans vos historiques.
</div>

  <?php  }else if($_SESSION['verifip']=='oui')
  {
 $message='Un changement de mot de passe a ete effectuer(reussi) et il en resulte que votre nouveau password est '.$_POST['code2'];

$modif= $bdd->prepare('INSERT INTO modification(id,id_abonne,element,date,message)VALUES(NULL,?,?,NOW(),?)');

$modif->execute(array(
   $id,
   'password',
   $message
  ));

$ecrit_abonne = $bdd->prepare('UPDATE abonne SET password = ? WHERE password = ? AND nom = ?');
$ecrit_abonne->execute(array(
    $_POST['code2'],
    $_SESSION['pass'],
    $_SESSION['name']
  ));
      ?> 
      <section class="free">
      <form>
      <br>
      <br>
      <br>
      <label for="code">Ancien Mot de passe :</label><br>
      <input type="button" name="code"  id="code" value = "<?php echo $_SESSION['pass'];?>" ><br><br>
      <label for="code">neauveau Mot de passe :</label><br>
      <input type="button" name="code" id="code1" value = "<?php echo $_POST['code1'];?>" ><br><br>
      
      </form>
      </section><br><br>
  <div class="message">
Changement de mot de passe reussi vous aller recevoir un message de confirmation dans vos historiques.
</div>



  <?php
  }
   ?>
  </div>

  
<div>
<center><span style="color:red;font-size:40px">Pour que ces modifications soit effectives vous devez vous reconnecter avec les nouveaux parametres</span>
<p><a href="connexion.php"><big>Deconnexion</big></a></p>
</center>
</form>
</div>


</body>
</html>