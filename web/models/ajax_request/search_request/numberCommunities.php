<?php

    require "../pdo_connection.php";

      function community_number()
      {

           $pdo = pdo();
           $town_name = htmlspecialchars($_GET['townName']);

           $select = $pdo->prepare("SELECT*FROM accepted_request WHERE accept_district=?");
           $select->execute(array($town_name));
           $town_fetch = $select->fetch();

           $town_count = $select->rowCount();
          ?>

               <p class="overResponse"><?php  echo $town_count.' '."vereniging(en) is(zijn) aangemeld bij de gemeente".' '.strtoupper($town_fetch['accept_district']).' '."Doubel Klick erop om de bijhorende vereniging(en) weer te geven en klick op de verenigingen om hun pagina te bezoeken."; ?></p>

          <?php


      }

      community_number();


 ?>
