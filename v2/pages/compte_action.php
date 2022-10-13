<?php
   
    // connexion à la base de donnée 
    $mysqli = new mysqli('localhost','zliheouch','3iqdym8k','zfl2-zliheouch');
    if ($mysqli->connect_errno)
    {
      echo "Error: Problème de connexion à la BDD \n";
      echo "Errno: " . $mysqli->connect_errno . "\n";
      echo "Error: " . $mysqli->connect_error . "\n";
      exit();
    }

?>
 <?php

       if ($_POST['pseudo'] && $_POST['etat']){
          $pseudo=($_POST['pseudo']) ;
          $etat=($_POST['etat']) ;
          $update='UPDATE `t_profil_pfl` SET `pfl_validite`="'.$etat.'" WHERE  cpt_pseudo="'.$pseudo.'";' ;
          $result= $mysqli->query($update);
          if ($result == false) 
             {
              echo "Error: La requête a échoué \n";
              echo "Query: " . $update . "\n";
              echo "Errno: " . $mysqli->errno . "\n";
              echo "Error: " . $mysqli->error . "\n";
              exit() ;
             } else {
            header("Location:admin_accueil.php"); 
          }
        }
       
  $mysqli->close();
  ?>
  