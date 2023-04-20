<?php 
   
   session_start();
   if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
    header('Location: index.php?login=erro2'); 
    // echo 'Volta a pagina anterior e faça o login';
   }
       
?>
