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
    if (!$mysqli->set_charset("utf8")) {
    printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
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
        <h1 class="heading"><a href="../index.php">Net'Gallery</a></h1>
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
  	<div class="sidebar one_quarter first"> 
      <!-- ################################################################################################ -->
      <h6 class="heading"> Menu </h6>
      <nav class="sdb_holder">
        <ul>
          <li><a href="admin_accueil.php"> Accueil & profils</a></li>
          <?php
          // si l'utilisateur connecté est un administrateur , on affiche l'onglet de  gestion de autres comptes
          if ($_SESSION['role']=='A') {
          echo ('<li> <a href="admin_compte.php"> activation/désactivation des comptes </a> </li>');
          }
          ?>
          <li><a href="#"> Gestion </a>
            <ul>
              <li><a href="#"> Gestion des actualités </a></li>
              <li><a href="#"> Gestion des exposants </a></li>
              <li><a href="#"> Gestion des oeuvres </a></li>
              <li><a href="admin_tickets.php"> Gestion des tickets visiteurs </a></li>
              <li><a href="#"> Gestion de la configuration </a></li>
         	  </ul>	
          </li>
        </ul>
      </nav>
    </div>
    <!-- main body -->
    <?php
    echo ('<div class="content three_quarter">');
      // if l'utilsateur est un organisateur
     if ($_SESSION['role']=='O'){
        echo ('<h1 class="heading"> c\'est l\'espace privée organisateur <h1>') ;
        echo("<h2>".$_SESSION['login']."</h2>");
        $sql1="SELECT * FROM t_compte_cpt join t_profil_pfl using (cpt_pseudo) WHERE
        cpt_pseudo='" . $_SESSION['login'] . "' ;" ;
        $resultat1 = $mysqli->query($sql1);
        if ($resultat1==false) {
          echo "Error: La requête a echoué \n";
          echo "Errno: " . $mysqli->errno . "\n";
          echo "Error: " . $mysqli->error . "\n";
            // La requête a echoué
          exit();
        }else{
        $compte1=$resultat1->fetch_assoc() ;
        echo (" <h2> Bienvenue ".$compte1['pfl_nom']." ".$compte1['pfl_prenom']."</h2>") ;
        echo ('<h2 class="bold"> Détails de Profil: </h2>') ;
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
        echo ("</td>"."<td>".$compte1['pfl_nom']."</td>"."<td>".$compte1['pfl_prenom']."</td>");
        echo ("<td>".$compte1['pfl_email']."</td>"."<td>".$compte1['pfl_role']."</td>"."<td>".$compte1['pfl_validite']."</td>"."<td>".$compte1['pfl_date']."</td>");
        echo ("</tr>");
        echo ("</table>");
        // bouton de déconnexion 
		    echo('<form action="deconnexion_action.php">');
       	echo ('<p> <input type="submit" value="Déconnexion" /> </p>');
   		   echo('</form>');
		echo ("</div>");
		echo ('<div class="clear"> ');
        }
        // if l'utilsateur est un administrateur
      } else if ($_SESSION['role']=='A'){
      echo ('<h1 class="heading"> c\'est l\'espace privée administrateur </h1>');
      echo("<h2>".$_SESSION['login']."</h2>");
      // affichage de profil de l'utilisateur connecté 
      $sql2="SELECT * FROM t_compte_cpt join t_profil_pfl using (cpt_pseudo) WHERE
        cpt_pseudo='" . $_SESSION['login'] . "' ;" ;
        // affichage de tous les profils
      $sql3="SELECT * FROM t_compte_cpt join t_profil_pfl using (cpt_pseudo) ;";
      // le nombre de profils
      $sql4="SELECT  count(*) as nombre_de_ligne from t_profil_pfl ;" ;
      $resultat2 = $mysqli->query($sql2);
        if ($resultat2==false) {
          // La requête a echoué
          echo "Error: Problème d'accès à la base \n";
          exit();
        }else{
        $compte1=$resultat2->fetch_assoc() ;
        echo (" <h2> Bienvenue"." ".$compte1['pfl_nom']." ".$compte1['pfl_prenom']."</h2>") ;
        echo ('<h2 class="bold"> Détails de Profil: </h2>') ;
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
        echo ("<td>".$compte1['pfl_email']."</td>"."<td>".$compte1['pfl_role']."</td>"."<td>".$compte1['pfl_validite']."</td>"."<td>".$compte1 ['pfl_date']."</td>");
        echo ("</tr>");
        echo ("</table>");
		}
		// bouton de déconnexion 
		echo('<form action="deconnexion_action.php">');
       	echo ('<p> <input type="submit" value="Déconnexion" /> </p>');
   		echo('</form>');
		echo ("</div>");
		echo ('<div class="clear"> ');
		$resultat3 = $mysqli->query($sql3);
        if ($resultat3==false) {
          // La requête a echoué
          echo "Error: Problème d'accès à la base \n";
          exit();
        }else{
        echo ('<h2 class="bold"> Détails de tous les profils </h2> ');
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
        while ($compte2= $resultat3->fetch_assoc()){
        	echo ("<tr>");
        	echo ("<td>".$compte2['pfl_nom']."</td>"."<td>".$compte2['pfl_prenom']."</td>");
        	echo ("<td>".$compte2['pfl_email']."</td>"."<td>".$compte2['pfl_role']."</td>"."<td>".$compte2['pfl_validite']."</td>"."<td>".$compte2['pfl_date']."</td>");
        	echo ("</tr>");
        }
        echo ("</table>");	
        }
        $resultat4 = $mysqli->query($sql4);
        if ($resultat4==false) {
          // La requête a echoué
          echo "Error: Problème d'accès à la base \n";
          exit();
        }else{
        	$nombre=$resultat4->fetch_row() ;
        	echo ("<h4> nombre de profils : ".$nombre[0]."</h4>") ;
        }
   	}
    echo ("</div>");
    ?>
    
	<!-- la partie de formulaire de modification de données de l'utilisateur -->
  <!-- formulaire de modification de profil pré-remplis -->
  <div class=update>
    <div class="formulaire1">
	    <h1 class="bold"> modification des données de l'utilisateur </h1>
	    <p> Veuillez modifier les cases des données à mise à jour : </p> 
	    <form action="modification_action.php" method="post">
	    <p>Votre nom : <input type="text" name="nom" <?php echo("value=".$compte1['pfl_nom']."")?> onfocus="this.value=''" /></p>
	    <p>Votre prenom : <input type="text" name="prenom" <?php echo("value=".$compte1['pfl_prenom']."")?> onfocus="this.value=''" /></p>
	    <p>Votre Email : <input type="text" name="Email" <?php echo("value=".$compte1['pfl_email']."")?> onfocus="this.value=''" /></p>
	    <p><input type="submit" name="Valider" value="Valider"></p> 
	    </form>
    </div>
    <div class="formulaire2"> 
	    <h1 class="bold"> changement de mot de passe </h1>
	    <p> Veuillez saisir le nouveau mot de passe : </p> 
	    <form action="modification_action.php" method="post">
	    <label > Votre nouveau mot de passe <span>*</span></label>
	    <input type="password" name="mdp" required  />
	    <label > Confirmation de votre nouveau mot de passe : <span>*</span></label>
	    <input type="password" name="cmdp" required /> 
	    <p><input type="submit" name="Modifier" value="Modifier"></p>
	   	</form>	
    </div>
    <?php
    /* affichage de message : en utilisant la variable globale $_GET pour réccupérer la valeur de msg passé en paramètre dans 
    l'URL de page de admin_accueil.php */
    if(isset($_GET['msg'])){
      echo ('<p class="message"> mot de passe est changé avec succès <p>'); 
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
<?php $mysqli->close(); ?>
</body>
</html>