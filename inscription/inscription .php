<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="inscription.css">
        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
        <script type="text/javascript" src =" inscription.js"></script>
		<title>Inscription</title>
    </head>
    <body>    


 <?php 
			
include ("../fonctionsBDD.php");

if (isset($_POST['Enregistrer'])) 
{	
	
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$bday = htmlspecialchars($_POST['bday']);
	$mail = htmlspecialchars($_POST['mail']);
	$mail2 = htmlspecialchars($_POST['mail2']);
	$adresse = htmlspecialchars($_POST['adresse']);
	$codepostal = htmlspecialchars($_POST['codepostal']);
	$ville = htmlspecialchars($_POST['ville']);
	$mdp = $_POST['mdp'];// on criptera les mdp une fois que tout sera ok
	$mdp2 = $_POST['mdp2'];
	$mdp_cript = password_hash($mdp, PASSWORD_DEFAULT);
	$mdp2_cript = password_hash($mdp2, PASSWORD_DEFAULT);
	$genre= htmlspecialchars($_POST['myRadio']);
	//////////////////////////////////////////////
	//Test longueur pseudo	
	if ( (!empty($pseudo)) AND ((strlen($pseudo) <5) || (strlen($pseudo) >30)) ) 
	{
		$er_pseudo = "La longueur doit être comprise entre 5 et 30 caractères!";
				
	}
	//////////////////////////////////////////////
	//Test longueur MDP

	if ( (!empty($mdp))AND ((strlen($mdp) <6) ) ) 
	{
		$er_mdp = "La longueur doit être de 6 caractères minimum! ";
				
	}
	//////////////////////////////////////////////
	//Test correspondance des emails
		
	if ( !empty($mail) AND !empty($mail2) AND ($mail != $mail2) ) 
	{
		$er_mail2 = "Les adresses e-mails ne correspondent pas !";
	}
	//////////////////////////////////////////////
	//Test validité CP

	if ( (!empty($codepostal)) AND (strlen($codepostal) !=5) ) 
	{
		$er_codepostal = 'Code Postal invalide !';
	}
	//////////////////////////////////////////////
	//Test correspondance des mdp
		
	if ( !empty($mdp) AND !empty($mdp2) AND ($mdp != $mdp2) ) 
	{
		$er_mdp2 = "Les mots de passes ne correspondent pas !";
	}
	//////////////////////////////////////////////
	//ADRESSE MAIL EXISTE DEJA

	// Test remplissage

	if ( (!empty($nom)) AND (!empty($prenom)) AND (!empty($pseudo)) AND (!empty($bday)) AND (!empty($mail)) AND (!empty($mail2)) AND (!empty($mdp)) AND (!empty($mdp2))) 
			
	{ // On a pas aucune erreur 
			if ( (!isset($er_nom)) AND (!isset($er_prenom)) AND (!isset($er_pseudo)) AND (!isset($er_bday)) AND (!isset($er_mail)) AND (!isset($er_mail2)) AND (!isset($er_mdp)) AND (!isset($er_mdp2)))  
		{
						
			// SI tout est ok  car on a pas d'erreur ,
			if ( (!empty($adresse)) AND (!empty($ville)) AND (!empty($codepostal) ) AND (!isset($er_codepostal))  )

			{//on définit le status ( acheteur si pas remplie données d'adresse, vendeur sinon)
				$status = 'vendeur';
			}
			else
			{
				$status = 'acheteur';
			}
							
			// TOUT est rempli ET on a 0 erreur			
	$validation ="Félicitations".$pseudo."!";

if ($status == 'vendeur') 
{ // on ne peut pas remplir une table si on ne met pas TOUTES !!! les valeurs
  // donc si vendeur, on place toutes les valeurs! 


			mysqli_connect("localhost","root","","bddshoes");
			$insert_membre = "INSERT INTO membres VALUES ('".$nom."','".$prenom."','".$pseudo."','".$bday."','".$mail."','".$adresse."','".$codepostal."','".$ville."','".$mdp_cript."','".$genre."','".$status."')";
			mysqli_query(mysqli_connect("localhost","root","","bddshoes"),$insert_membre);
			mysqli_close(mysqli_connect("localhost","root","","bddshoes"));
			
}
if ($status == 'acheteur') 
{
	// si acheteur, on met des NULL a la place de adresse CP et ville!
	mysqli_connect("localhost","root","","bddshoes");
			$insert_membre = "INSERT INTO membres VALUES ('".$nom."','".$prenom."','".$pseudo."','".$bday."','".$mail."',NULL,NULL,NULL,'".$mdp_cript."','".$genre."','".$status."')";
	mysqli_query(mysqli_connect("localhost","root","","bddshoes"),$insert_membre);
	mysqli_close(mysqli_connect("localhost","root","","bddshoes"));

	$_SESSION['comptecree']="Votre compte a bien été créé";
	header('location:../accueil/index.php');
			
}


		}
				
	}
			else
			{// si on pas tout rempli, on a erreur 
				 if (empty($nom)){$er_nom = "veuillez entrer un nom";}if (empty($prenom)){$er_prenom = "veuillez entrer un prenom";}if (empty($pseudo)){$er_pseudo = "veuillez entrer un pseudo";}if (empty($bday)){$er_bday = "veuillez entrer une date ";}if (empty($mail)){$er_mail = "veuillez entrer une adresse e-mail";}if (empty($mail2)){$er_mail2 = "veuillez confirmer l'adresse e-mail";}if (empty($nom)){$er_mdp = "veuillez entrer un mot de passe";}if (empty($mdp2)){$er_mdp2 = "veuillez confirmer le mot de passe";}
			}

}

?>

<div align="center" id='formulaire'>
<header>
	<div id='entete'align="center">Devenir Membre E Shoes</div>
	<div id='presentationMembre' > 
	Créez votre compte Premium <h4 id='Eshoes'>E Shoes</h4> pour<br>  acheter et vendre vos articles de <br>manière 100% sécurisé!<br/><br>

</div>

</header>

	<form method="POST" action ="" name='inscription' id='FormulaireInsc'>
		<div id="div_connexion">
			<a href="../connexion/connexion.php">Deja un compte? connectez vous !</a>
			<span id="span_ou">OU</span>

		</div>
			

<br>

		<!-- Nom-->
		<input id="input_nom"  type="text"  name="nom"  placeholder="<?php if( isset($er_nom) ) 
		{echo $er_nom;} else {echo"Votre Nom";} ?>"  value="<?php if ( isset($nom) ) {echo$nom;}  ?>">
					<br/>
		<!-- Prenom-->
		<input id="input_prenom"  type="text"  name="prenom"  placeholder="<?php if( isset(
		$er_prenom) ){echo$er_prenom;} else {echo"Votre prenom";}?>"  value="<?php if(isset($prenom
		)){echo$prenom;}?>">
					<br/>
		<!-- Pseudo-->
		<input id="input_pseudo" type="text" name="pseudo" placeholder="<?php if( isset($er_pseudo)
		){echo $er_pseudo;} else {echo"Votre pseudo";}?>" value="<?php if((isset($pseudo)) AND 
		(!isset($er_pseudo))) { echo $pseudo;} ?>" >
					<br/>
		<!-- DATE DE NAISSANCE-->
		<input id="input_bday"  type="text"  id='date_Naissance'  name="bday"  placeholder="<?php 
		if( isset($er_bday) ){echo $er_bday;} else {echo"Votre date de naissance";} ?>"
		onfocus="(this.type='date')" onblur="(this.type='text')"  value="<?php if ( isset($bday) ) 
		{echo $bday;}?>">
					
					<br/>
		<!-- Adresse a remplir seulement si vendeur-->
		<input  type="text"  name="adresse"  placeholder="Adresse(facultatif pour non vendeur)" value="<?php if( isset($adresse) ){echo$adresse;}?>">
						<br/>

		<!-- CP a remplir seulement si vendeur-->
		<input id="input_codepostal"  type="number"  name="codepostal"  placeholder="<?php 
		if( isset($er_codepostal) ){echo$er_codepostal;} else {echo"Code Postal(facultatif pour non vendeur)";}?>" value="<?php if( (isset($codepostal) ) AND ( !isset($er_codepostal)) ) 
		{echo$codepostal;}?>">
					<br/>
		<!-- Ville a remplir seulement si vendeur-->
		<input  type="text"  name="ville"  placeholder="Ville(facultatif pour non vendeur)" 
		value="<?php if( isset($ville) ){echo$ville;}?>">
					<br/>

		<!-- Mail-->
		<input id="input_mail"  type="text"  name="mail"  placeholder="<?php if( isset($er_mail) )
		{echo $er_mail;} else {echo"Adresse e-mail";}?>" value="<?php if( isset($mail) )
		{echo$mail;}?>">
					<br/>
		<!-- Confirmer Mail-->
		<input id="input_mail2"  type="text"  name="mail2"  placeholder="<?php if(isset($er_mail2))
		{echo $er_mail2;} else {echo"Confirmation e-mail";}?>" value="" >
					<br/>
		<!-- mot de passe-->
		<input id="input_mdp"  id="MDP"  type="password"  name="mdp"  placeholder="<?php 
		if( isset($er_mdp) ){echo$er_mdp;} else {echo"Mot de passe";}?>" value="" >
						<br/>
		<!-- Confirmation mot de passe-->		
		<input id="input_mdp2"  type="password"  name="mdp2"  placeholder="<?php 
		if( isset($er_mdp2) ){echo$er_mdp2;} else {echo"Confirmation du mot de passe";}?>">

					<br/>


		<!-- GENRE/SEXE -->

		<div class="radio">
			<!--Homme-->
			<input class="radio__input" type="radio" name="myRadio" id="myRadio1" value="Homme" 
			<?php if( (isset($genre)AND($genre == 'Homme') )||( !isset($genre)) ){echo'checked';}?>>
			<label class="radio__label" for="myRadio1">Homme</label>

			<!--Femme-->
			<input class="radio__input" type="radio" name="myRadio" id="myRadio2" value="Femme" 
			<?php if( isset($genre)AND($genre == 'Femme') ){echo'checked';}?>>
			<label class="radio__label" for="myRadio2">Femme</label>

			<!--Autre-->
			<input class="radio__input" type="radio" name="myRadio" id="myRadio3" value="Autre" 
			<?php if( isset($genre)AND($genre == 'Autre') ){echo'checked';}?>>
			<label class="radio__label" for="myRadio3">Autre</label>														
		</div>
								

		<!--Couleur placeholder si erreur-->

		<style type="text/css"><?php if(isset($er_nom)){echo " #input_nom::placeholder{color: #343a40;}";}?></style>

		<style type="text/css"><?php if(isset($er_prenom)){echo " #input_prenom::placeholder{color: #343a40;}";}?></style>

		<style type="text/css"><?php if(isset($er_pseudo)){echo " #input_pseudo::placeholder{color : #343a40;}";}?></style>

		<style type="text/css"><?php if(isset($er_bday)){echo " #input_bday::placeholder{color : #343a40;}";}?></style>

		<style type="text/css"><?php if(isset($er_mail)){echo " #input_mail::placeholder{color : #343a40;}";}?></style>

		<style type="text/css"><?php if(isset($er_mail2)){echo " #input_mail2::placeholder{color : #343a40;}";}?></style>

		<style type="text/css"><?php if(isset($er_mdp)){echo " #input_mdp::placeholder{color : #343a40;}";}?></style>

		<style type="text/css"><?php if(isset($er_mdp2)){echo " #input_mdp2::placeholder{color : #343a40;}";}?></style>

		<style type="text/css"><?php if(isset($er_codepostal)){echo " #input_codepostal::placeholder{color : #343a40;}";}?></style>


		
		<!-- BOUTON je m'inscris -->
		<div  id="div_inscription">
		<button id="register" type="submit" name="Enregistrer" <?php if( isset($validation) )
		{echo"disabled";}?>> <?php if( isset($validation) ){echo$validation;echo"<br/>Tu es maintenant ".$status." E Shoes ! =)";} else {echo"Je m'incris!";}?>
		</button> 
		</div>

	 				
	</form>

</div>
	      




	     
</body>

</html>