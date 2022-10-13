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
              <li><a href="admin_tickets.php"> Gestion des tickets visiteurs </a></li>
              <li><a href="#"> Gestion de la configuration </a></li>
         	</ul>	
        </ul>
      </nav>
    </div>
    <!-- main body -->
    <div class="content three_quarter"> 
    	<hr>
   		<h2 class="bold"> Activation/Désactivation des proflis <h2>	
   		<p> Veuillez choisir la nouvelle état pour un des  profils existant : </p>
    	<?php
    	$sql5="SELECT * FROM t_compte_cpt join t_profil_pfl using (cpt_pseudo) ;" ;
    	$resultat5=$mysqli->query($sql5);
        if ($resultat5==false) {
	     	 // La requête a echoué
	    	echo "Error: La requête a échoué \n";
	     	echo "Query: " . $sql5 . "\n";
	      	echo "Errno: " . $mysqli->errno . "\n";
	      	echo "Error: " . $mysqli->error . "\n";
      		exit();
        }else{
        echo ('<form action="compte_action.php" method="post">');
        echo ('<select name="pseudo">');
        while ($pseudo= $resultat5->fetch_assoc()){  
        echo ('<option value='.$pseudo['cpt_pseudo'].'>'.$pseudo['cpt_pseudo'].'</option>');
        }
        // formulaire d'activation et désactivation de profil
        echo("</select>");
        echo('<input type="radio" name="etat" value="A" /> Activation');
        echo("<br />");
        echo ('<input type="radio" name="etat" value="D" /> Desactivation');
        echo("<br />");
        echo('<p><input type="submit" value="Valider"></p>');
        echo("</form>");
        }
        $sql4="SELECT  count(*) as nombre_de_ligne from t_profil_pfl ;" ;
        $resultat4 = $mysqli->query($sql4);
        if ($resultat4==false) {
          // La requête a echoué
          	echo "Error: La requête a échoué \n";
         	echo "Query: " . $sql4 . "\n";
          	echo "Errno: " . $mysqli->errno . "\n";
          	echo "Error: " . $mysqli->error . "\n";
          exit();
        }else{
          $nombre=$resultat4->fetch_row() ;
          echo ('<h4 class="bold"> nombre de profils : '.$nombre[0].'</h4>') ;
        }
		?>
		
     </div>

    <div class="clear">
      <?php
      $sql3="SELECT * FROM t_compte_cpt join t_profil_pfl using (cpt_pseudo) ;";
      $resultat3 = $mysqli->query($sql3);
        if ($resultat3==false) {
          // La requête a echoué
           	echo "Error: La requête a échoué \n";
         	echo "Query: " . $sql3 . "\n";
          	echo "Errno: " . $mysqli->errno . "\n";
          	echo "Error: " . $mysqli->error . "\n";
          exit();
        }else{
        echo ('<h2 class="bold"> Détails de tous les profils </h2> ' );
        echo ("<table>");
            echo("<thead>");
            echo("<tr>") ;
            echo("<th> pseudo </th>");
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
          echo ("<td>".$sql3['cpt_pseudo']."</td>"."<td>".$sql3['pfl_nom']."</td>"."<td>".$sql3['pfl_prenom']."</td>");
          echo ("<td>".$sql3['pfl_email']."</td>"."<td>".$sql3['pfl_role']."</td>"."<td>".$sql3['pfl_validite']."</td>"."<td>".$sql3['pfl_date']."</td>");
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