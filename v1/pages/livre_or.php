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
<title> livre d'or </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
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
        <h1><a href="../index.php">Net'Gallery</a></h1>
        <!-- ################################################################################################ -->
      </div>
      <nav id="mainav" class="fl_right"> 
        <!-- ################################################################################################ -->
        <ul class="clear">
          <li><a href="../index.php">Home</a></li>
          <li class="active"><a class="drop" href="#">More</a>
            <ul>
              <li><a href="gallery.php">Gallery</a></li>
              <li><a href="livre_or.php">Livre d'or</a></li>
            </ul>
          </li>
          <li><a href="inscription.php">inscription</a></li>
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
      <h6 class="heading"> livre d'or </h6>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">More</a></li>
        <li><a href="#">Livre d'or </a></li>
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
      <h1> Les commentaires <h1> 
         <table>
          <thead>
           <tr>
             <th> nom </th>
             <th> prenom </th>
             <th>  Email  </th>
             <th>  commentaire  </th>
             <th> date </th>
             </tr>
          </thead>
             <?php
              $comment="SELECT  vis_nom, vis_prenom, vis_mail , cmt_texte ,cmt_date_heure from t_commentaire_cmt join t_visiteur_vis using (vis_id) where cmt_etat='P';";
              $result1 = $mysqli->query($comment);
        if ($result1 == false) 
        { 
        echo "Error: La requête a echoué \n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit();
        }
        else 
        {
        while ($comment= $result1->fetch_assoc())
        {
        echo ("<tr>");
        echo ("<td>".$comment['vis_nom']."</td>"."<td>".$comment['vis_prenom']."</td>");
        echo ("<td>".$comment['vis_mail']."</td>"."<td>".$comment['cmt_texte']."</td>");
        echo ("<td>".$comment['cmt_date_heure']."</td>");
        echo ("</tr>");
        }
        }
         ?>
         </table> 
      
      </div>
      <div id="comments">
        <h2>Comments</h2>
        <ul>
          <li>
            <article>
              <header>
                <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                <address>
                By <a href="#">A Name</a>
                </address>
                <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
              </header>
              <div class="comcont">
                <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
              </div>
            </article>
          </li>
          <li>
            <article>
              <header>
                <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                <address>
                By <a href="#">A Name</a>
                </address>
                <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
              </header>
              <div class="comcont">
                <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
              </div>
            </article>
          </li>
          <li>
            <article>
              <header>
                <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                <address>
                By <a href="#">A Name</a>
                </address>
                <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
              </header>
              <div class="comcont">
                <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
              </div>
            </article>
          </li>
        </ul>
        <h2>Write A Comment</h2>
        <form action="#" method="post">
          <div class="one_third first">
            <label for="name">Name <span>*</span></label>
            <input type="text" name="name" id="name" value="" size="22" required>
          </div>
          <div class="one_third">
            <label for="email">Mail <span>*</span></label>
            <input type="email" name="email" id="email" value="" size="22" required>
          </div>
          <div class="one_third">
            <label for="url">Website</label>
            <input type="url" name="url" id="url" value="" size="22">
          </div>
          <div class="block clear">
            <label for="comment">Your Comment</label>
            <textarea name="comment" id="comment" cols="25" rows="10"></textarea>
          </div>
          <div>
            <input type="submit" name="submit" value="Submit Form">
            &nbsp;
            <input type="reset" name="reset" value="Reset Form">
          </div>
        </form>
      </div>
      <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<?php
              $data="SELECT * FROM t_configuration_con;";
              $result2 = $mysqli->query($data);
        if ($result2 == false) 
        { 
        echo "Error: La requête a echoué \n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit();
        }
        else 
        {
        $data= $result2->fetch_assoc() ;
        }
        ?>
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
        <div class="block clear"><a href="#"><i class="fas fa-clock"></i></a> <span><strong> Monday - Saturday:</strong> 09.00am - 17.00pm
        <?php 
               echo("<br>") ;  
               echo("<br>") ;
               echo("date de debut - date de fin :");
               echo("<br>") ;
               echo ($data['con_date_debut']);
               echo("<br>") ;
               echo ($data['con_date_fin']) ;
              ?>  
        </span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a href="#"><i class="fas fa-map-marker-alt"></i></a> <span><strong>Come visit us:</strong> Direction to <a href="https://www.centrepompidou.fr/fr/"> <?php echo($data['con_lieu']) ; ?>  </a> </span></div>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="bgded overlay row4" style="background-image:url('../images/demo/backgrounds/01.png');">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_quarter first">
      <h6 class="heading">Pellentesque dictum</h6>
      <ul class="nospace linklist">
        <li><a href="#">Ultricies in molestie sed</a></li>
        <li><a href="#">Consectetuer nam sodales</a></li>
        <li><a href="#">Euismod tellus sed non</a></li>
        <li><a href="#">Est etiam in eros curabitur</a></li>
        <li><a href="#">Viverra dui nec arcu sed</a></li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="heading">Fermentum pellentesque</h6>
      <p class="nospace btmspace-15">Pede ullamcorper facilisis bibendum nulla elit gravida elit vel suscipit urna.</p>
      <form action="#" method="post">
        <fieldset>
          <legend>Newsletter:</legend>
          <input class="btmspace-15" type="text" value="" placeholder="Name">
          <input class="btmspace-15" type="text" value="" placeholder="Email">
          <button type="submit" value="submit">Submit</button>
        </fieldset>
      </form>
    </div>
    <div class="one_quarter">
      <h6 class="heading">Nisi nunc velit aliquam</h6>
      <ul class="nospace linklist">
        <li>
          <article>
            <p class="nospace btmspace-10"><a href="#">Sapien sit amet tortor nulla vulputate odio in varius tristique nisi urna.</a></p>
            <time class="block font-xs" datetime="2045-04-06">Friday, 6<sup>th</sup> April 2045</time>
          </article>
        </li>
        <li>
          <article>
            <p class="nospace btmspace-10"><a href="#">Consequat erat id rutrum nisi magna vel tellus phasellus malesuada bibendum.</a></p>
            <time class="block font-xs" datetime="2045-04-05">Thursday, 5<sup>th</sup> April 2045</time>
          </article>
        </li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="heading">Lacinia iaculis nunc</h6>
      <ul class="nospace clear latestimg">
        <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </footer>
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