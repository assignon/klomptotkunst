<?php

        require "../pdo_connection.php";

        function searchResult()
        {

            $pdo = pdo();
            $searchValue = htmlspecialchars($_GET['value']);

            $select_town = $pdo->prepare("SELECT*FROM online_district WHERE district_name LIKE '$searchValue%' LIMIT 12");
            $select_town->execute(array($searchValue));

            $select_community = $pdo->prepare("SELECT*FROM accepted_request WHERE accept_organisation LIKE '$searchValue%' LIMIT 12");
            $select_community->execute(array($searchValue));

            $selectTown_count = $select_town->rowCount();
            $selectCommunity_count = $select_community->rowCount();

            if($selectTown_count > 0 OR $selectCommunity_count > 0)
            {

               while($display_town = $select_town->fetch())
               {

                  ?>

                      <div class="towns">

                         <img src="../public/images/menuIcons/resultTownIcon.png" alt=""  class="townsImg">
                         <p><?php echo $display_town['district_name'];?></p>

                      </div>

                  <?php

               }


            while($display_community = $select_community->fetch())
                  {

                     ?>


                         <div class="communitys">

                            <a href="welcom.php?action=communityPage&name=<?php echo $display_community['accept_organisation'];?>">

                              <img src="../public/images/menuIcons/resultCommunityIcon.png" alt="" class="communityIng">
                              <p><?php echo $display_community['accept_organisation'];?></p>

                            </a>

                         </div>

                     <?php

                  }

                }else{

                echo "Geen gemeente of vereniging gevonden.";

            }


        }

        searchResult();


 ?>
