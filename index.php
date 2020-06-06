<?php session_start();
?>
<html>
	<head> 
		<title> la banque</title>
                <meta lang="fr" charset="utf-8" autor="fotsing@romaric@yves"/>
		<link rel="stylesheet" type="text/css" media="all" href="style.css"/>
		<link rel="icon" type="image/ico" href="images/favicon.ico" />
		
	</head>
	<body>

<?php

if(@$_SESSION['blocquer']=='oui'){
	?>
<script language="javaScript">
 alert("Nous somme desole de vous rapele maintenant que la date de remboussement de vos empreint a expiré.votre compte est blocquer et vous ne pouvez plus y accedez vous devez contactez l'administration si non vous serez poursuivit en justice Merci!!! vous avez juste une journée pour le faire");
		</script>

	<?php
}
@$_SESSION['blocquer']='non';
?>



	 <div id="bloc_page">
	 <header>
	   <div id="titre_principale">
	       <img src="images/zozor_logo.png" alt="logo de zozor" id="logo"/>
		    <h1>Riberfost</h1>
			<h2>Banque d'etat</h2>
		</div>
		
		<nav>
		  <ul>
		    <li><a href="index.php">Accueil</a><li>
			<li><a href="creeCompte.php">creer un compte</a><li>
			<li><a href="connexion.php">connexion</a><li>
			<li><a href="admin.php">ADMIN</a><li>
			<li><a href="mario/fotsing.html">divert</a><li>
		   </ul>
		</nav>
	</header>
	 <div id="banniere_image">
		<div id="banniere_description">
	En coorperation avec les USA
	     <a href="article.php" class="bouton_rouge">voir l'article</a>
		 </div>
	 </div>
	   <section>
	       <section>
	      <article>
		  <h1><img src="images/ico_epingle.png" alt="Cathegorie voyage" class="ico_Categorie"/>Le virus corona dans le monde</h1>
		            <p>Le destin est une bonne  histoire que l'on croit. on ne peut jamais savoir ce qui nous arrivera demain
					c'est pourqoui nous devons profiter au maximum de notre vie dans les voyages comme moi biensur. Mais 
					attention vous avez sans doute suivit a la radio, a la tele ,dans les resaux sociaux et consore qu' un
					autre virus est en train de destabiliser le monde entier en generale et l'italie et la chine en particulier
					. vous devez de ce fait faire tres attention car il a ete revele vrai que ce virus tue enormement 
					et le bilan de mort rien que pour l'italie est de plus de 2000 mort et dernierement on a enregistrer 
					en un seul jour 1000 mort. Vous voyez c'est grave alors de metez pas votre vie en dange pour les voyage
					comme moi la vie est tres cher.</p>
					<p>Je m'appelle fotsing tchide bernoulli riemann et je reside actuellement au cameroon. pays qui pour le
					moment n'enregistre pas de mort mais le bilant de contaminer est entrait de s'alourdir. On nous repete sans
					sesse de rester chez nous et de ne pas sortit sous quelquonue preteste car cette maladie aussi cronoque
					qu'elle soit elle se transmet meme simplement par la parole et le fait que l'on ne doit pas sortir
					nous permet de ne pas etre en contact avec les personnes inffectees. Les billans de personnes inffectees 
					est de 105 personnes pour le moment. Nous somme vraiment effrayer par cette maladie et nous comptons grandement
					sur notre Dieu pour qu'il cesse ces histoires. Nous pouvons etre heureux car la chine premier pays touches par
					cette pandemie a trouver un remede et comme le cameroon est son allier ils ne tarderons pas a nous aider.</p>
					<p>Le corona virus d'apres les rumeurs a connue le jour grace a une mutation entre le sang de serpent et celui
					de la chauve-souris tous cela implanter dans un animal pas tres connue appelle le pangolin. C'est pour cela que 
					les premieres personnes a etre infecter etait ceux de chine qui ont manger de cette viande et qui ont infecter tout a tout leur
					amis et ces amis sont aller inffecter leurs amis ainsi de suite jusqu'a ce que ce virus devienne mondiale. 
					comme souvent nous disons apres un incident sans insidence qu'il ya eu plus de peur que de mal mais la nous 
					nous dissons que la peur et le mal sont notre quotidient a present...</p>
					</article>
	<aside>
					<h1 align="center">A propos de l'auteur</h1>
					<img src="images/bulle.png" alt="" id="fleche_bulle">
					    <p> Nous sommes trois etudiants de la fac science plus precisement en informatique II
                                            et nous avons creer ce site pour permetres a vous de faire plus facilement vos transaction banquaire
                                           a savoir depot, retrait, empreint, et pres.
                                           En effet la securite y regne donc vous ne pouvez pas etre frapper car vos donnes sont cripter avant d'etres envoyer vers le server.
                                            Comme je dissait tanto nous somme a trois et ces image ci dessous nous presente.</p><br>
                                            <p class ="image"><img src="images/fotsing.PNG" title="fotsing CM-UDS-18SCI1057" alt= "photo fotsing"/>
                                               <img src="images/yves.PNG" title="foading CM-UDS-18SCI0091" alt= "photo yves"/>
					      <img src="images/romaric.PNG" title="namou CM-UDS-18SCI1260" alt= "photo romaric"/>
			                 </p>
                                             <p>the Bank of success is around of you. Just one name Riberfost</p>
			</aside>
			</section>
			  <footer>
                   <div id="tweet">
                        <h1>Just Three Name</h1>
						<p>Fotsing</p>
						<p>Yves</p>
                                                <p>Romaric</p>
                     </div>
					  <div id="mes_photos">
                        <h1>Riberfost location</h1>
						<p><img src="images/photo1.jpg" alt="photographie"/>
						<img src="images/photo2.jpg" alt="photographie"/>
						<img src="images/photo3.jpg" alt="photographie"/>
						<img src="images/photo4.jpg" alt="photographie"/>
						</p>
                     </div>
					 <div id="mes_amis">
					    <h1>Nos partenaires</h1>
						  <ul>
						    <li><a href="#" >Union Expess Bank</a></li>
							<li><a href="#" >Express Exchange Bank</a></li>
							<li><a href="#" >Centrale Bank</a></li>
							<li><a href="#" >Banque des Etats</a></li>
						   </ul>
                      
					</div>
				</footer>
			</div>
		<?php	 
			try{

				$bdd = new PDO('mysql:host=localhost','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}catch(Exception $e){die('Erreur '.$e->getMessage());}

		$bdd->query('CREATE DATABASE IF NOT EXISTS banque');
            
        try{

		$bdd = new PDO('mysql:host=localhost;dbname=banque','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}catch(Exception $e){die('Erreur '.$e->getMessage());}


          $bdd->query('
    CREATE TABLE IF NOT EXISTS abonne(
	id integer NOT NULL AUTO_INCREMENT,
	nom VARCHAR(30),
	tel integer,
	sex CHAR(1),
	email VARCHAR(30),
	password VARCHAR(30),
	solde integer,
	PRIMARY KEY(id))
');

     $bdd->query('
 CREATE TABLE IF NOT EXISTS operation(
	id integer NOT NULL AUTO_INCREMENT,
	id_destinataire integer NOT NULL,
	message VARCHAR(255),
	date DATETIME,
	id_recepteur integer,
	montant integer,
	message_recpt VARCHAR(255),
	PRIMARY KEY(id),
	FOREIGN KEY(id_destinataire) REFERENCES abonne(id),
	FOREIGN KEY(id_recepteur) REFERENCES abonne(id))'
);

     $bdd->query('
CREATE TABLE IF NOT EXISTS retrait(
	id integer NOT NULL AUTO_INCREMENT,
	id_abonne integer NOT NULL,
	date DATETIME,
	montant integer,
	message VARCHAR(255),
	PRIMARY KEY(id),
	FOREIGN KEY(id_abonne) REFERENCES abonne(id))'
);

         $bdd->query('
CREATE TABLE IF NOT EXISTS modification(
	id integer NOT NULL AUTO_INCREMENT,
	id_abonne integer NOT NULL,
	element VARCHAR(30),
	date DATETIME,
	message VARCHAR(255),
	PRIMARY KEY(id),
	FOREIGN KEY(id_abonne) REFERENCES abonne(id))'
);

         $bdd->query('
CREATE TABLE IF NOT EXISTS remboussement(
    id integer NOT NULL AUTO_INCREMENT,
    id_abonne integer,
    nom_abonne VARCHAR(30),
    montant_total_emp integer,
    montant_rembousser integer,
    dete_a_rembousser integer,
    date DATETIME,
    PRIMARY KEY(id),
    FOREIGN KEY(id_abonne) REFERENCES abonne(id))'
);

         $bdd->query('
CREATE TABLE IF NOT EXISTS donnee_banque(
    id integer NOT NULL AUTO_INCREMENT,
    id_abonne integer,
    montant VARCHAR(30),
    date DATETIME,
    delait DATETIME,
    nb_operation integer,
    message VARCHAR(255),
    nom_abonne VARCHAR(40),
    PRIMARY KEY(id),
    FOREIGN KEY(id_abonne) REFERENCES abonne(id))'
);

         $bdd->query('
CREATE TABLE IF NOT EXISTS status_empreint(
    id integer NOT NULL AUTO_INCREMENT,
    id_abonne integer,
    nom_abonne VARCHAR(30),
    montant_total_emp integer,
    delais DATETIME,
    PRIMARY KEY(id),
    FOREIGN KEY(id_abonne) REFERENCES abonne(id))'
);

                  $bdd->query('
CREATE TABLE IF NOT EXISTS minichat(
    id integer NOT NULL AUTO_INCREMENT,
    pseudo VARCHAR(30),
    message VARCHAR(255),
    dates DATETIME,
    id_envoi integer,
    id_recoi integer,
    pseudo_r VARCHAR(25),
    PRIMARY KEY(id),
    FOREIGN KEY(id_envoi) REFERENCES abonne(id),
    FOREIGN KEY(id_recoi) REFERENCES abonne(id))'
);

			?>
                  			  
		</body>   
</html>