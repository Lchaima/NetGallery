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

// si le bouton supprimer est appuyé 
if($_POST["Supprimer"]) {
	if ($_POST["numero_visiteur"] ){
    $numero=htmlspecialchars(($_POST['numero_visiteur']));
  }else{
    exit();
  }
  	
  	// suppression des données de visiteur 
  	$sql1="DELETE from t_commentaire_cmt where vis_id=".$numero.";";
	$sql2="DELETE from t_visiteur_vis where vis_id=".$numero." ;" ;

	$result1= $mysqli->query($sql1);
          if ($result1 == false) 
             {
              echo "Error: La requête a échoué \n";
              echo "Query: " . $sql1 . "\n";
              echo "Errno: " . $mysqli->errno . "\n";
              echo "Error: " . $mysqli->error . "\n";
              exit() ;
             } else {
            	$result2= $mysqli->query($sql2);
	        	  if ($result2 == false) 
	             {
	              echo "Error: La requête a échoué \n";
	              echo "Query: " . $sql2 . "\n";
	              echo "Errno: " . $mysqli->errno . "\n";
	              echo "Error: " . $mysqli->error . "\n";
	              exit() ;
          		}else{
          			header("Location:admin_tickets.php?msg=3"); 
          		}
          	}
}

// si le bouton ajouter est appuyé 

if ($_POST["Ajouter"]) { 

  $pseudo=$_SESSION['login'];
  $max="SELECT MAX(vis_id) AS maximum FROM t_visiteur_vis;";
  if (!$resultat=$mysqli->query($max))
  {
  // La requête a echoué
    echo "Error: la requête a échoué \n";
    echo "Query: " . $max . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
  }
  else
  {
  $max=$resultat->fetch_object();
  $lemax=$max->maximum;
  // on incrémente le id max 
  $lemax=$lemax + 1 ;
  }

  // génération d'un nouveau ticket 
  $sql="INSERT INTO t_visiteur_vis VALUES (".$lemax.",'vis".rand(0,9).rand(0,9).rand(0,9)."_exp2022!',now(),NULL,NULL,NULL,'".$pseudo."');";

  $result= $mysqli->query($sql);
          if ($result == false) 
          {
              echo "Error: La requête a échoué \n";
              echo "Query: " . $sql . "\n";
              echo "Errno: " . $mysqli->errno . "\n";
              echo "Error: " . $mysqli->error . "\n";
              exit() ;
          } else {
              header("Location:admin_tickets.php?msg=2");
          }


}

$mysqli->close(); 

?>