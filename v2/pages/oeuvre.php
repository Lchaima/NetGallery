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
<title> Oeuvre </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<style type="text/css">
/* DEMO ONLY */
.container .demo{text-align:center;}
.container .demo div{padding:8px 0;}
.container .demo div:nth-child(odd){color:#FFFFFF; background:#CCCCCC;}
.container .demo div:nth-child(even){color:#FFFFFF; background:#979797;}
@media screen and (max-width:900px){.container .demo div{margin-bottom:0;}}
/* DEMO ONLY */
</style>
</head>
<body id="top">
<!-- ########################################CONNEXION à LA BASE DE DONNEE ######################################################## -->
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


        ######################################## LA REQUETE ######################################################## 
        // requête vérifant le id maximum de la table t_oeuvre_oev 
        $max=" SELECT max(oev_id) as max from t_oeuvre_oev ;" ;
        $result= $mysqli->query($max);
            if ($result == false) 
            { 
              echo "Error: La requête a echoué \n";
              echo "Errno: " . $mysqli->errno . "\n";
              echo "Error: " . $mysqli->error . "\n";
              exit();
            }else{
              $max= $result->fetch_assoc() ;
            }

      if(isset($_GET['id'])){
          if ( is_numeric($_GET['id']) and $_GET['id'] >= 1 and $_GET['id'] <= $max['max'])
          {
            $oeuvre_id= $_GET['id'] ;
            $requete1="SELECT * from t_oeuvre_oev where oev_id =".$oeuvre_id.";";
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
              $oeuvre= $result1->fetch_assoc() ;
            }
          }else
          {
            echo ("le paramètre n'est pas dans la base de donnée!");
            exit();
          }
      }else {
        echo ("Vous avez oublié le paramètre !");
      exit();
      }
      ######################################## LA REQUETE ########################################################
      $requete2="SELECT count(*) as nombre FROM `t_oeuvre_oev` 
      WHERE oev_id=".$oeuvre_id." in ( select oev_id FROM t_presentation_pre  group by oev_id having count(exp_id) > 1) ;" ;

      $result2 = $mysqli->query($requete2);
      if ($result2 == false) 
        { 
        echo "Error: La requête a echoué \n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit();
        }
        else 
        {
        $collectif= $result2->fetch_assoc() ;
        }
     ?>  
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
        <h1 class="heading"><a href="../index.php">Net'Gallery</a></h1>
        <!-- ################################################################################################ -->
      </div>
      <nav id="mainav" class="fl_right"> 
        <!-- ################################################################################################ -->
        <ul class="clear">
          <li><a href="../index.php">Home</a></li>
          <li class="active"><a class="drop" href="#"> More </a>
            <ul>
              <li><a href="gallery.php">Gallery</a></li>
              <li><a href="livre_or.php"> Livre d'or </a></li>
            </ul>
          </li>
          <li><a href="inscription.php"> Inscription </a></li>
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
      <h6 class="heading"> <?php echo($oeuvre['oev_intitule']) ?> </h6>
      <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="#">More</a></li>
        <li><a href="gallery.php"> Gallery </a></li>
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
      <div id="oeuvre">
       <?php
          if ($collectif['nombre'] == 1)
          {
          echo('<figcaption class="sectiontitle">');
          echo('<h1 class="heading underline font-x2"> Oeuvre collectif <h1>');
          echo('</figcaption>');
          echo ('<i class="fa-solid fa-people-group"> </i>') ;
          }else{

          echo('<figcaption class="sectiontitle">');
          echo('<h1 class="heading underline font-x2"> Oeuvre individuel <h1>');
          echo('</figcaption>');
          echo ('<i class="fa-solid fa-person"></i>');
          }

          
          echo("<figure>") ;
          echo ('<img src="../images/demo/gallery/oeuvres/'.$oeuvre['oev_image'].'" style="width:450px; height:450px;" >');
          echo ("<figcaption>") ;
          echo("<h1>".$oeuvre['oev_intitule']."</h1>") ;
          echo ('<h6 class="bold">'.$oeuvre['oev_date'].'</h6>');
          echo("</figcaption>");
          echo("</figure>");
          echo ("<p>".$oeuvre['oev_description']."</p>") ;
          echo ("<br>");
          echo ("<br>");
        ?>
        <?php
          $requete2="SELECT exp_nom , exp_prenom ,exp_image FROM t_exposant_exp join t_presentation_pre using (exp_id) WHERE oev_id=".$oeuvre_id.";";
          $result2 = $mysqli->query($requete2);
          if ($result2 == false) 
          { 
            echo "Error: La requête a echoué \n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit();
          }
          else 
          {
           echo('<figure class="hoc container clear imgroup"> ');
           echo('<h2 class="bold"> liste des exposants associées : </h2>');
           echo('<ul class="nospace group">');
           while ($exposant= $result2->fetch_assoc())
          {
            echo('<li class="one_third">');
            echo('<figure> <a class="imgover" href="#"><img src="../images/demo/gallery/exposants/'.$exposant['exp_image'].'" alt="" style="width:250px; height:250px;"></a>');
            echo('<figcaption>');
            echo('<h6 class="heading">'.$exposant['exp_nom']." ".$exposant['exp_prenom'].' </h6>');
            echo('</figcaption>');
            echo("</figure>");
            echo("</li>");
          }
          echo("</ul>");
          echo("</figure>");
          
          }

        ?> 

     </div> 
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
        <div class="block clear"><a href="#"><i class="fas fa-clock"></i></a> <span><strong> Monday - Saturday:</strong> 09.00am - 17.00pm</span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a href="#"><i class="fas fa-map-marker-alt"></i></a> <span><strong>Come visit us:</strong>  Direction to Le centre national d’art et de culture Georges-Pompidou  <a href="https://www.centrepompidou.fr/fr/"></a></span></div>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
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