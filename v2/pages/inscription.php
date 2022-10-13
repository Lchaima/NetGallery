<!DOCTYPE html>
<html lang="">
<head>
<title> inscription </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>

<body id="top" >
  <!-- #################################CONNEXION à LA BASE ############################################################### -->
<?php 
               
      $mysqli= new mysqli('localhost','zliheouch','3iqdym8k','zfl2-zliheouch');
      if ($mysqli->connect_errno)
        {
        // Affichage d'un message d'erreur
        echo "Error: Problème de connexion à la BDD \n";
        echo "Errno: " . $mysqli->connect_errno . "\n";
        echo "Error: " . $mysqli->connect_error . "\n";
        // Arrêt du chargement de la page
        exit();
        }
        if (!$mysqli->set_charset("utf8")) {
        printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
        exit();
        }

?>
  <!-- #################################CONNEXION à LA BASE ############################################################### -->
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
        <h1 class="heading"><a href="../index.php">Net'Gallery</a></h1>
        <!-- ################################################################################################ -->
      </div>
      <nav id="mainav" class="fl_right"> 
        <!-- ################################################################################################ -->
        <ul class="clear">
          <li><a href="../index.php">Home</a></li>
          <li class="active"><a class="drop" href="#">More</a>
            <ul>
              <li class="active"><a href="gallery.php">Gallery</a></li>
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
	<main class="hoc container clear" >
   <h1 class="bold"> formulaire d'inscription </h1>
   <p> merci de remplir cette formulaire afin de débuter votre inscription </p> 
   <form action="action.php" method="post">
   <p>Votre nom : <input type="text" name="nom" /></p>
   <p>Votre prenom : <input type="text" name="prenom" /></p>
   <p>Votre Email : <input type="text" name="Email" /></p> 
   <p>Votre pseudo: <input type="text" name="pseudo" /></p>
   <p>Votre mot de passe : <input type="password" name="mdp" /></p>
   <p> confirmation de votre mot de passe : <input type="password" name="cmdp" /> </p>
   <p><input type="submit" value="Valider"></p>
   </form>
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
        <div class="block clear"><a href="#"><i class="fas fa-map-marker-alt"></i></a> <span><strong>Come visit us:</strong> Direction to <a href="#">our location</a></span></div>
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
<?php $mysqli->close(); ?> 
</body>
</html>