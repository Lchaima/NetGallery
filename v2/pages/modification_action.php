<?php

session_start();

// connexion à la base de donnée 
$mysqli = new mysqli('localhost','zliheouch','3iqdym8k','zfl2-zliheouch');
if ($mysqli->connect_errno)
{
	echo "Error: Problème de connexion à la BDD \n";
	echo "Errno: " . $mysqli->connect_errno . "\n";
	echo "Error: " . $mysqli->connect_error . "\n";
	exit();
}

if (!$mysqli->set_charset("utf8")) {
    printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
    exit();
}

// si la formulaire de ayant le nom de bouton Valider a été soumis , on récuppère les données envoyées afin de les modifier
if($_POST['Valider']){

	//sinon utiliser $_SESSION

	$nom=htmlspecialchars(addslashes($_POST['nom']));
	$prenom=htmlspecialchars(addslashes($_POST['prenom']));
	$Email=htmlspecialchars(addslashes($_POST['Email']));

	  // requête de mise à jour des données de profil de l'utilisateur 
	  $sql="UPDATE t_profil_pfl SET pfl_nom='".$nom."',pfl_prenom='".$prenom."', pfl_email='".$Email."' WHERE cpt_pseudo='".$_SESSION['login']."' ;" ;
	  $resultat = $mysqli->query($sql);
      if ($resultat==false) {
    	// La requête a echoué
	    echo "Error: La requête a echoué \n";
	    echo "Errno: " . $mysqli->errno . "\n";
	    echo "Error: " . $mysqli->error . "\n";
	    exit();
	  }else{
	  	header("Location:admin_accueil.php");
	  }

}

if($_POST['Modifier']){
	// on vérifie si les 2 mot de passe sont de même taille
	if (strcmp ($_POST['mdp'],$_POST['cmdp'])){
       echo '<p class="message"> Veuillez vérifier votre mot de passe </p> ' ;
       echo "<br />"; 
       echo '<a href="adlin_accueil.php"> formulaire inscription </a>' ; 
       exit() ;
    }
	$mdp=htmlspecialchars(addslashes($_POST['mdp']));
	$cmdp=htmlspecialchars(addslashes($_POST['cmdp']));


	  // requête de mise à jour de mot de passe 
    $sql="UPDATE t_compte_cpt SET cpt_mot_de_passe=MD5('".$mdp."') WHERE cpt_pseudo='".$_SESSION['login']."';" ;
  	$resultat = $mysqli->query($sql);
  	if ($resultat==false) {
		// La requête a echoué
	    echo "Error: La requête a echoué \n";
	    echo "Errno: " . $mysqli->errno . "\n";
	    echo "Error: " . $mysqli->error . "\n";
	    exit();
	}else{
	  	header("Location:admin_accueil.php?msg=1");
	}

}

 $mysqli->close(); 
?>