<!DOCTYPE html>
<html lang="">
<head>
<title> inscription </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>

<body id="top" >
<div class="wrapper row0">
  <div id="topbar" class="hoc clear">
    <div class="fl_left"> 
      <!-- ################################################################################################ -->
      <ul class="nospace">
        <li><i class="fas fa-phone rgtspace-5"></i> +00 (123) 456 7890</li>
        <li><i class="far fa-envelope rgtspace-5"></i> info@domain.com</li>
      </ul>
      <!-- ################################################################################################ -->
    </div>
</div>
 <div class="bgded" style="background-image:url('../images/demo/backgrounds/01.png');"> 
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <header id="header" class="hoc clear">
      <div id="logo" class="fl_left"> 
        <!-- ################################################################################################ -->
        <h1 classs="heading"><a href="../index.php">Net'Gallery</a></h1>
        <!-- ################################################################################################ -->
      </div>
      <nav id="mainav" class="fl_right"> 
        <!-- ################################################################################################ -->
        <ul class="clear">
          <li><a href="../index.php">Home</a></li>
          <li class="active"><a class="drop" href="#">More</a>
            <ul>
              <li><a href="gallery.php"> Gallery </a></li>
              <li><a href="livre_or.php"> Livre d'or </a></li>
            </ul>
          </li>
          <li><a href="inscription.php"> inscription </a></li>
        </ul>
        <!-- ################################################################################################ -->
      </nav>
    </header>
  </div>
  <div class="overlay">
    <div id="breadcrumb" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <h6 class="heading"> Inscription </h6>
      <ul>
        <li><a href="">Home</a></li>
        <li><a href="#">inscription</a></li>
       <ul> 
     </div>
  </div>
  <!-- ################################################################################################ -->
</div>

<div class="wrapper row3">
	<main class="hoc container clear">


       <?php

        if ($_POST['nom'] && $_POST['prenom'] && $_POST['Email'] && $_POST['pseudo'] && $_POST['mdp'] && $_POST['cmdp']) {
          $nom=htmlspecialchars(addslashes($_POST['nom']));
          $prenom=htmlspecialchars(addslashes($_POST['prenom']));  
          $Email=htmlspecialchars(addslashes($_POST['Email'])); 
          $id=htmlspecialchars(addslashes($_POST['pseudo']));
          $mdp=htmlspecialchars(addslashes($_POST['mdp']));
          $cmdp=htmlspecialchars(addslashes($_POST['cmdp'])); 
        }
        else 
        {
          
          echo  '<p class="message"> formulaire incomplet ! </p>' ;
          echo  "<br />";
          echo  "veuillez compléter le "  ; 
          echo '<a href="inscription.php"> formulaire d\'inscription </a>'  ;
          exit();
        }

        if (strcmp ($_POST['mdp'],$_POST['cmdp'])){
           echo '<p class="message"> Veuillez vérifier votre mot de passe </p> ' ;
           echo "<br />"; 
           echo '<a href="inscription.php"> formulaire inscription </a>' ; 
           exit() ;
        }

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


        $requete1="INSERT INTO t_compte_cpt VALUES ('".$id."',MD5('".$mdp."')) ; ";
        $result1= $mysqli->query($requete1);
        if ($result1 == false) 
        {
        echo "Error: La requête a échoué \n";
        echo "Query: " . $requete1 . "\n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit() ;
        }
        else 
        {
           $requete2="INSERT INTO t_profil_pfl VAlUES ('".$nom."','".$prenom."','".$Email."','O','D',current_date(),'" .$id. "');";
           $result2= $mysqli->query($requete2);
           if ($result2 == false) 
           {
            
            // supprimer le compte crée
            echo "<h1>"."Inscription échoué !" . "\n"."</h1>" ;
            $requete3="DELETE FROM `t_compte_cpt` where `t_compte_cpt`.`cpt_pseudo` = '".$id."' ; " ;
            echo '<a href="inscription.php"> formulaire d\'inscription </a>' ; 
            $result3= $mysqli->query($requete3);
            if ($result3 == false) 
             {
              echo "Error: La requête a échoué \n";
              echo "Query: " . $requete3 . "\n";
              echo "Errno: " . $mysqli->errno . "\n";
              echo "Error: " . $mysqli->error . "\n";
              exit ;
             }
            }
            else 
            {
             echo "<br />";
            echo "<h1>"."Inscription réussie !" . "\n"."</h1>" ;
          }
        }
        
      $mysqli->close();
      ?>
   </main>
</div>
<div class="wrapper coloured">
  <section id="ctdetails" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul class="nospace clear">
      <li class="one_quarter first">
        <div class="block clear"><a href="#"><i class="fas fa-phone"></i></a> <span><strong>Give us a call:</strong> +00 (123) 456 7890</span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a href="#"><i class="fas fa-envelope"></i></a> <span><strong>Send us a mail:</strong> support@domain.com</span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a href="#"><i class="fas fa-clock"></i></a> <span><strong> Monday - Saturday:</strong> 08.00am - 18.00pm</span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a href="#"><i class="fas fa-map-marker-alt"></i></a> <span><strong>Come visit us:</strong> Directions to <a href="#">our location</a></span></div>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>

<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script> 
</body>
</html>