<?php

      require "../pdo_connection.php";

      function display_data()
      {

         $pdo = pdo();
         $communityName = htmlspecialchars($_GET['communityName']);

         $select = $pdo->prepare("SELECT*FROM accepted_request WHERE accept_organisation=?");
         $select->execute(array($communityName));

         while($displayData = $select->fetch())
         {

           ?>
             <div id='communitiesData'>

               <div class="accepted_dataContainer"><p>Klick op de verenigingen om hun pagina te bezoeken.</p></div>

               <div class="accepted_dataContainer"><p>Naam:</p><h3 class="accepted_subcriptionInfos"><?php echo ucfirst($displayData['accept_firstname']);?></h3></div>

               <div class="accepted_dataContainer"><p>VoorNaam:</p><h3 class="accepted_subcriptionInfos"><?php echo ucfirst($displayData['accept_surname']);?></h3></div>

               <div class="accepted_dataContainer"><p>Email:</p><h3 class="accepted_subcriptionInfos"><?php echo $displayData['accept_email'];?></h3></div>

               <div class="accepted_dataContainer"><a href="#" target="_blank"><p>Website:</p><h3 class="accepted_subcriptionInfos"><?php echo $displayData['accept_website'];?></h3></a></div>

               <div class="accepted_dataContainer"><p>Vereniging:</p><h3 class="accepted_subcriptionInfos"><?php echo ucfirst($displayData['accept_organisation']);?></h3></div>

               <div class="accepted_dataContainer"><p>Telnr:</p><h3 class="accepted_subcriptionInfos"><?php echo $displayData['accept_telnr'];?></h3></div>

               <div class="accepted_dataContainer"><p>Gemeente:</p><h3 class="accepted_subcriptionInfos"><?php echo ucfirst($displayData['accept_district']);?></h3></div>

               <div class="accepted_dataContainer"><p>Cultuur-Art:</p><h3 class="accepted_subcriptionInfos"><?php echo $displayData['accept_culturart'];?></h3></div>

               <div class="accepted_dataContainer"><p>Aanmelding Datum:</p><h3 class="accepted_subcriptionInfos"><?php echo $displayData['accept_add_date'];?></h3></div>

              </div>


           <?php

         }

      }

      display_data()

 ?>
