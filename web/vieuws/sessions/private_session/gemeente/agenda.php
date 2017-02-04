<?php

        session_start();

        require "../web/models/privateAgenda_model.php";

        $privateAgenda = new private_agendaModel();

        if(isset($_GET['id']) AND !empty($_GET['id']) AND $_GET['id'] > 0)
        {

           $getID = intval($_GET['id']);
           $adminData = $privateAgenda->getUser_data($getID);

           if(isset($_SESSION['id']) AND isset($adminData['id']) AND $_SESSION['id'] == $adminData['id'])
           {

              require "../web/vieuws/private/gemeente/agenda.php";


           }else{

             //la session de l id n est pas egal a l id de la base de donnee(mettre un lien vers la page de vs n etes pas connecter)

           }

        }else{

            //l id n existe pas

        }

?>
