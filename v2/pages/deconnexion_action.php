
     <?php
        
        session_start();
        // libération des variables globales associées à la session
        unset($_SESSION['login']);
        unset($_SESSION['role']) ;
        // destruction de la session
        session_destroy();
        header("Location:session.php");

     ?>
