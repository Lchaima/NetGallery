<!DOCTYPE html>
<!--
Template Name: Nocobot
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title> Gallery </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ##################################### Connexion à la base de donnée ########################################################### -->
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

<!-- ##################################### Connexion à la base de donnée ########################################################### -->

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
    <div class="fl_right"> 
      <!-- ################################################################################################ -->
      <ul class="nospace">
        <li><a href="session.php" title="Login"><i class="fas fa-sign-in-alt"></i></a></li>
        <li><a href="#" title="Sign Up"><i class="fas fa-edit"></i></a></li>
        <li id="searchform">
          <div>
            <form action="#" method="post">
              <fieldset>
                <legend>Quick Search:</legend>
                <input type="text" placeholder="Enter search term&hellip;">
                <button type="submit"><i class="fas fa-search"></i></button>
              </fieldset>
            </form>
          </div>
        </li>
      </ul>
      <!-- ################################################################################################ -->
    </div>
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded" style="background-image:url('../images/demo/backgrounds/01.png');"> 
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <header id="header" class="hoc clear">
      <div id="logo" class="fl_left"> 
        <!-- ################################################################################################ -->
        <h1 class="heading"><a href="../index.html">Net'Gallery</a></h1>
        <!-- ################################################################################################ -->
      </div>
      <nav id="mainav" class="fl_right"> 
        <!-- ################################################################################################ -->
        <ul class="clear">
          <li><a href="../index.php">Home</a></li>
          <li class="active"><a class="drop" href="#">More</a>
            <ul>
              <li class="active"><a href="gallery.php">Gallery</a></li>
              <li><a href="livre_or.php">livre d'or</a></li>
            </ul>
            <li><a href="inscription.php">inscription</a></li>
          </li>
        </ul>
        <!-- ################################################################################################ -->
      </nav>
    </header>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="overlay">
    <div id="breadcrumb" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <h6 class="heading">Gallery</h6>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">More</a></li>
      </ul>
      <!-- ################################################################################################ -->
    </div>
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="content"> 
      <!-- ################################################################################################ -->
      <div id="gallery">
        <figure>
          <header class="heading"> LES OEUVRES </header>
          <hr size="5" align=center width="40%" > 
          <ul class="nospace clear">
          <?php
          $requete1= " SELECT  * from t_oeuvre_oev ; " ;
          $result1 = $mysqli->query($requete1);
      		if ($result1 == false) 
      		{ 
        		echo "Error: La requête a echoué \n";
        		echo "Errno: " . $mysqli->errno . "\n";
        		echo "Error: " . $mysqli->error . "\n";
        		exit();
      		}
      		else 
      		{
            # s’il n’y a pas d’œuvre dans la base de données,affiche (« Aucune œuvre pour le moment ! »).
            if ($result1->num_rows == 0 )  {
              echo "Aucune œuvre pour le moment !" ;
            }
            else 
            {
          		$cpt= 1 ;
          		while ($oev = $result1->fetch_assoc())
        		  {
    	          if ($cpt % 4 == 1 ) {
                  echo('<li class="one_quarter first">') ;
                  echo("<figure>") ;	
                  echo('<a class="imgover" href="https://obiwan2.univ-brest.fr/licence/lic245/v2/pages/oeuvre.php?id='.$oev['oev_id'].'"><img src="../images/demo/gallery/oeuvres/'.$oev['oev_image'].'"'.'style="width:350px;height:300px;"></a>');
                  echo ("<figcaption>") ;
                  echo ('<h6 class="heading">'.$oev['oev_intitule'].'</h6>');
                  echo ("<div>");
                  echo ("<p>".$oev['oev_date']."</p>");
                  echo ("</div>");
                  echo("</figcaption>");
                  echo("</figure>");
                  echo("</li>");
              } else {
                echo('<li class="one_quarter">');
                echo("<figure>") ;	
                echo('<a class="imgover" href="https://obiwan2.univ-brest.fr/licence/lic245/v2/pages/oeuvre.php?id='.$oev['oev_id'].'"><img src="../images/demo/gallery/oeuvres/'.$oev['oev_image'].'"'.'style="width:350px;height:300px;"></a>');
                echo ("<figcaption>") ;
                echo ('<h6 class="heading">'.$oev['oev_intitule'].'</h6>');
                echo ("<div>");
                echo ("<p>".$oev['oev_date']."</p>");
                echo ("</div>");
                echo("</figcaption>");
                echo("</figure>");
                echo("</li>");
              }
              $cpt++;
              }
            }
          }
          ?>
          </ul>
          <hr size="5" align=center width="40%" > 
        </figure>
      </div>
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <nav class="pagination">
        <ul>
          <li><a href="#">&laquo; Previous</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><strong>&hellip;</strong></li>
          <li><a href="#">3</a></li>
          <li><a href="#">Next &raquo;</a></li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
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
<?php $mysqli->close(); ?> 
</body>
</html>