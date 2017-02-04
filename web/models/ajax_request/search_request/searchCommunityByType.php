<?php

      require "../pdo_connection.php";

      $targetVal = htmlspecialchars($_GET['targetVal']);


      function searchByType($table_name)
      {

          $pdo = pdo();
          $divClass = htmlspecialchars($_GET['divClass']);
          $requestIndex = htmlspecialchars($_GET['requestIndex']);

          $searchingWord = htmlspecialchars($_GET['searchingWord']);

          $wart = $pdo->prepare("SELECT*FROM $table_name WHERE $requestIndex LIKE '$searchingWord%'");
          $wart->execute(array($searchingWord));

          $wart_count = $wart->rowCount();

          if($wart_count > 0)
          {

            ?>
         <div class="<?php echo $divClass;?>ComContainer">
           <?php
            while($display_accepted = $wart->fetch())
            {

                ?>



                     <div class="<?php echo $divClass;?>Com">

                        <p class="accepted_communities_name"><?php echo ucfirst($display_accepted[$requestIndex]);?></p>

                     </div>


                <?php

            }

            ?>
         </div>

         <?php


       }else{

        echo "Geen Vereniging Gevonden...";

       }

      }


      searchByType($targetVal);

 ?>
