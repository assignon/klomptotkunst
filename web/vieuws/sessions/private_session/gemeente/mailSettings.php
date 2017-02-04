<?php

session_start();

require "../web/models/mailSettings_model.php";

$mailSettings = new mailSettings_model();

if(isset($_GET['id']) AND !empty($_GET['id']) AND $_GET['id'] > 0)
{

   $getID = intval($_GET['id']);
   $adminData = $mailSettings->getUser_data($getID);

   if(isset($_SESSION['id']) AND isset($adminData['id']) AND $_SESSION['id'] == $adminData['id'])
   {

     require "../web/vieuws/private/gemeente/mailSettings.php";
     $mailSettings->messages_update();
     $mailSettings->messages();


   }else{

     //la session de l id n est pas egal a l id de la base de donnee(mettre un lien vers la page de vs n etes pas connecter)

   }

}else{

    //l id n existe pas

}

?>
