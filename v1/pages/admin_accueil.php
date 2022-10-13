<!DOCTYPE html>
<!--
Template Name: Nocobot
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<?php
    session_start();
    if(!isset($_SESSION['login']) && !isset($_SESSION['role']) ){
      header("Location:session.php");
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

?>
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title> espace administration </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
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
        <li><a href="#" title="Login"><i class="fas fa-sign-in-alt"></i></a></li>
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
        <h1><a href="../index.html">Net'Gallery</a></h1>
        <!-- ################################################################################################ -->
      </div>
      <nav id="mainav" class="fl_right"> 
        <!-- ################################################################################################ -->
        <ul class="clear">
          <li><a href="../index.php">Home</a></li>
          <li class="active"><a class="drop" href="#">Pages</a>
            <ul>
              <li><a href="gallery.php">Gallery</a></li>
              <li><a href="livre_or.php">Livre d'or</a></li>
            </ul>
          </li>
          <li><a href="inscription.php"> inscription </a></li>
        </ul>
        <!-- ################################################################################################ -->
      </nav>
    </header>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->

  <div class="overlay">
    <div id="breadcrumb" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <h6 class="heading"> Espace administration </h6>
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
    <div class="content three_quarter"> </div>

    <div class="clear"> 
    <?php
     if ($_SESSION['role']=='O'){
        $sql1="SELECT * FROM t_compte_cpt join t_profil_pfl using (cpt_pseudo) WHERE
        cpt_pseudo='" . $_SESSION['login'] . "' ;" ;
        $resultat1 = $mysqli->query($sql1);
        if ($resultat1==false) {
          // La requête a echoué
          echo "Error: Problème d'accès à la base \n";
          exit();
        }else{
        $compte1=$resultat1->fetch_assoc() ;
        echo ("<h1> c'est l'espace privée organisateur <h1>") ;
        echo ("Bienvenue"." ".$compte1['pfl_nom']." ".$compte1['pfl_prenom']) ;
        echo ("<h2> Détails de Profil: </h2>") ;
        echo ("<table>");
          echo("<thead>");
           	echo("<tr>") ;
            echo ("<th> nom </th>");
            echo ("<th> prenom </th>");
            echo ("<th>  Email </th>");
            echo ("<th>  role  </th>");
            echo ("<th>  validite  </th>");
            echo ("<th> date </th>");
            echo("</tr>");
          echo("</thead>") ;
        echo ("<tr>");
        echo ("<td>".$compte1['pfl_nom']."</td>"."<td>".$compte1['pfl_prenom']."</td>");
        echo ("<td>".$compte1['pfl_email']."</td>"."<td>".$compte1['pfl_role']."</td>"."<td>".$compte1['pfl_validite']."</td>"."<td>".$compte1['pfl_date']."</td>");
        echo ("</tr>");
        }
      } else if ($_SESSION['role']=='A'){
      echo ("<h1> c'est l'espace privée organisateur </h1>");
      $sql2="SELECT * FROM t_compte_cpt join t_profil_pfl using (cpt_pseudo) WHERE
        cpt_pseudo='" . $_SESSION['login'] . "' ;" ;
      $sql3="SELECT * FROM t_compte_cpt join t_profil_pfl using (cpt_pseudo) ;";
      $resultat2 = $mysqli->query($sql2);
        if ($resultat2==false) {
          // La requête a echoué
          echo "Error: Problème d'accès à la base \n";
          exit();
        }else{
        $compte2=$resultat2->fetch_assoc() ;
        echo (" <h2> Bienvenue"." ".$compte2['pfl_nom']." ".$compte2['pfl_prenom']."</h2>") ;
        echo ("<h2> Détails de Profil: </h2>") ;
        echo ("<table>");
          echo("<thead>");
           	echo("<tr>") ;
            echo ("<th> nom </th>");
            echo ("<th> prenom </th>");
            echo ("<th>  Email </th>");
            echo ("<th>  role  </th>");
            echo ("<th>  validite  </th>");
            echo ("<th> date </th>");
            echo("</tr>");
          echo("</thead>") ;
        echo ("<tr>");
        echo ("<td>".$compte2['pfl_nom']."</td>"."<td>".$compte2['pfl_prenom']."</td>");
        echo ("<td>".$compte2['pfl_email']."</td>"."<td>".$compte2['pfl_role']."</td>"."<td>".$compte2['pfl_validite']."</td>"."<td>".$compte2['pfl_date']."</td>");
        echo ("</tr>");
        echo ("</table>");
		}
		$resultat3 = $mysqli->query($sql3);
        if ($resultat3==false) {
          // La requête a echoué
          echo "Error: Problème d'accès à la base \n";
          exit();
        }else{
        echo (" <h2> Détails de tous les profils </h2> " );
        echo ("<table>");
          	echo("<thead>");
           	echo("<tr>") ;
            echo ("<th> nom </th>");
            echo ("<th> prenom </th>");
            echo ("<th>  Email </th>");
            echo ("<th>  role  </th>");
            echo ("<th>  validite  </th>");
            echo ("<th> date </th>");
            echo("</tr>");
         echo("</thead>") ;
        while ($sql3= $resultat3->fetch_assoc()){
        	echo ("<tr>");
        	echo ("<td>".$sql3['pfl_nom']."</td>"."<td>".$sql3['pfl_prenom']."</td>");
        	echo ("<td>".$sql3['pfl_email']."</td>"."<td>".$sql3['pfl_role']."</td>"."<td>".$sql3['pfl_validite']."</td>"."<td>".$sql3['pfl_date']."</td>");
        	echo ("</tr>");
        	}
        echo ("</table>");	
        }
     }
     ?>
       
    </div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

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