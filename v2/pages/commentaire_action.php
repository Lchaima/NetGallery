<?php
 /*Affectation dans des variables du numéro de ticket/mot de passe/nom /prenom /email et le commentaire s'ils existent,
  affichage d'un message sinon */
  
  
  if ($_POST["numero"] && $_POST["mdp"] && $_POST["nom"] && $_POST["prenom"] &&$_POST["email"] && $_POST["comment"] ){
    $id=htmlspecialchars(addslashes($_POST['numero']));
    $motdepasse=htmlspecialchars(addslashes($_POST['mdp']));
    $nom=htmlspecialchars(addslashes($_POST['nom']));
    $prenom=htmlspecialchars(addslashes($_POST['prenom']));
    $email=htmlspecialchars(addslashes($_POST['email']));
    $comment=htmlspecialchars(addslashes($_POST['comment']));
  }else{
    echo "veuillez remplir tous les cases" ;
    exit();
  }

  // connexion à la base de donnée 
  $mysqli = new mysqli('localhost','zliheouch','3iqdym8k','zfl2-zliheouch');
  if ($mysqli->connect_errno)
  {
    echo "Error: Problème de connexion à la BDD \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    exit();
  }

  
  // la requête pour vérifier si aucun commentaire a été déja ajouté par le visiteur 
  $existe="SELECT vis_id from t_commentaire_cmt where vis_id=".$id." ;" ;
  $resultat1= $mysqli->query($existe);
    if ($resultat1==false) {
	    // La requête a echoué
	    echo "Error: La requête a echoué \n";
		echo "Errno: " . $mysqli->errno . "\n";
		echo "Error: " . $mysqli->error . "\n";
	    exit();
    }else{
    	if ($resultat1->num_rows==0){
		  	// la requête pour vérifier si le ticket obtenu il y a moins de 3h
		  	$delai= "SELECT vis_id from t_visiteur_vis where vis_date <= now() and now() <= TIMESTAMPADD(HOUR,3,vis_date) and  vis_id=".$id." ; " ;
		  	$resultat2 = $mysqli->query($delai);
		    if ($resultat2==false) {
			    // La requête a echoué
			    echo "Error: La requête a echoué \n";
			    echo "Query: " . $delai . "\n";
			    echo "Errno: " . $mysqli->errno . "\n";
				echo "Error: " . $mysqli->error . "\n";
			    exit();
		    }else{
		   		if ($resultat2->num_rows==1){
		   			// mise à jour de la ligne de visiteur dans le tableau visiteur avec les nouvelles informations 
		   			$update=" UPDATE  t_visiteur_vis set vis_nom='".$nom."' , vis_prenom='".$prenom."' ,vis_mail='".$email."' where vis_id=".$id." and  vis_mot_de_passe='".$motdepasse."';";
		   			// ajout de commentaire de visiteur 
		   			$add="INSERT into t_commentaire_cmt values (NULL,now(),'".$comment."',".$id.",'P')  ;" ;
		   			$resultat3 = $mysqli->query($update);
		   			$resultat4 = $mysqli->query($add);
				    if ($resultat3==false) {
					    // La requête a echoué
					    echo "Error: La requête a echoué \n";
					    echo "Query: " . $update . "\n";
					    echo "Errno: " . $mysqli->errno . "\n";
						echo "Error: " . $mysqli->error . "\n";
					    exit();
					}else{
					if ($resultat4==false) {
						echo "Error: La requête a echoué \n";
						echo "Query: " . $add . "\n";
					    echo "Errno: " . $mysqli->errno . "\n";
						echo "Error: " . $mysqli->error . "\n";
					    exit();
					}else{
						header("Location:livre_or.php"); 
					}
					}
		   		}else{
		   			echo '<p classe="message" > vous avez dépassé le délai pour ajouter un commentaire ! <p> ' ;
           			echo '<a href="../index.php"> page d\'accueil </a>' ; 

		   		}
			}
		}else{
			echo "Vous avez déja ajouté un commentaire !";
			echo '<a href="../index.php"> page d\'accueil </a>' ; 
		}
	}
	$mysqli->close(); 
?>