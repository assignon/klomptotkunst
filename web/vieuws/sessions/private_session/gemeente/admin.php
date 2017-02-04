<?php

   session_start();

   require "../web/models/admin_model.php";

   $admin = new admin_model();

   if(isset($_GET['id']) AND !empty($_GET['id']) AND $_GET['id'] > 0)
   {

      $getID = intval($_GET['id']);
      $adminData = $admin->getUser_data($getID);

      if(isset($_SESSION['id']) AND isset($adminData['id']) AND $_SESSION['id'] == $adminData['id'])
      {

         require "../web/vieuws/private/gemeente/admin.php";
         $admin->subscriptions();
         $admin->wart();
         //$admin->allCommunity();


      }else{

        //la session de l id n est pas egal a l id de la base de donnee(mettre un lien vers la page de vs n etes pas connecter)

      }

   }else{

       //l id n existe pas

   }

 ?>
