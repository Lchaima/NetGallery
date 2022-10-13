<!DOCTYPE html>
<!--
Template Name: Nocobot
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->

<!-- connexion base de donnée -->
<?php
  session_start();
    if(!isset($_SESSION['login']) && !isset($_SESSION['role']) ){
      header("Location:session.php");
    }
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
<title> gestion de tickets  </title>
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
        <h1 class="heading"><a href="../index.html">Net'Gallery</a></h1>
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
      <h6 class="heading">  Gestion des tickets visiteurs </h6>
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
      <h6> Menu </h6>
      <nav class="sdb_holder">
        <ul>
          <li><a href="admin_accueil.php"> Accueil & profils</a></li>
          <li><a href="admin_compte.php"> activation/désactivation des comptes </a></li>
          <li><a href="#"> Gestion </a>
            <ul>
              <li><a href="#"> Gestion des actualités </a></li>
              <li><a href="#"> Gestion des exposants </a></li>
              <li><a href="#"> Gestion des oeuvres </a></li>
              <li><a href="admin_tickets"> Gestion des tickets visiteurs </a></li>
              <li><a href="#"> Gestion de la configuration </a></li>
         	</ul>	
          </li>
        </ul>
      </nav>
    </div>
    <!-- main body -->
    <div class="content three_quarter">
    <hr>
        <div>
        <!-- ########## création  d'un ticket visiteur ######### -->
        <h3 class="bold"> génération d'un nouveau ticket  : </h3> 
        <form action="ticket_action.php" method="post">
          <p> Veuillez cliquer sur le bouton pour générer un nouveau ticket </p>
          <input type="submit" name="Ajouter" value="générer un ticket">
        </form>
        <?php
        if(isset($_GET['msg'])){
          if($_GET['msg']==2){
          echo ("<p class=message> un nouveau ticket a été généré avec succès </p>");
          }
        }
        ?>
        </div>

      <hr>
        <div>
          <!-- ########## formulaire pour supprimer un ticket visiteur ######### -->
          <h3 class="bold"> suppression d'un ticket  : </h3> 
          <p> Veuillez saisir le numéro de visiteur choisi pour supprimer ses données  </p>
          <form action="ticket_action.php" method="post">
            <input class="btmspace-15" type="number" name="numero_visiteur" placeholder="numero visiteur">
            <input type="submit" name="Supprimer" value="Supprimer">
          </form>
          <?php
          if(isset($_GET['msg'])){
            if ($_GET['msg']==3){
            echo ("<p class=message> suppression de ticket ! </p>");
            }
          }
        ?>
        </div>
      <hr>
    </div>

    <div class="clear">  
    	<?php
    	$sql1="Select cpt_pseudo, vis_id ,vis_mot_de_passe ,vis_date,vis_nom,vis_prenom,vis_mail, cmt_texte FROM t_visiteur_vis left outer join t_commentaire_cmt using (vis_id);" ;

    	$resultat1 = $mysqli->query($sql1);
        if ($resultat1==false) {
          // La requête a echoué
           echo "Error: La requête a échoué \n";
              echo "Query: " . $sql1 . "\n";
              echo "Errno: " . $mysqli->errno . "\n";
              echo "Error: " . $mysqli->error . "\n";
          exit();
        }else{

        echo ("<table>");
          echo("<thead>");
           	echo("<tr>") ;
            echo ("<th> créateur </th>");
            echo ("<th> numéro de visiteur </th>");
            echo ("<th>  mot de passe  </th>");
            echo ("<th>  date de création  </th>");
            echo ("<th>  nom   </th>");
            echo ("<th> prenom </th>");
            echo ("<th> Email </th>");
            echo ("<th> commentaire </th>");
            echo("</tr>");
          echo("</thead>") ;

        while($visiteur=$resultat1->fetch_assoc()) {
        	echo ("<tr>");
        	echo ("<td>".$visiteur['cpt_pseudo']."</td>"."<td>".$visiteur['vis_id']."</td>");
        	echo ("<td>".$visiteur['vis_mot_de_passe']."</td>"."<td>".$visiteur['vis_date']."</td>"."<td>".$visiteur['vis_nom']."</td>"."<td>".$visiteur['vis_prenom']."</td>");
        	echo ("<td>".$visiteur['vis_mail']."</td>"."<td>".$visiteur['cmt_texte']."</td>");
        	echo ("</tr>");

    	}
    	 echo ("</table>");	
        }

        $mysqli->close(); 
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