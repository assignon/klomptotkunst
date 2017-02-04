<?php


        require "../pdo_connection.php";


         function artCommunities()
         {

                   $pdo = pdo();

                   $congregation = htmlspecialchars($_GET['congregation']);

                   $select = $pdo->prepare("SELECT*FROM accepted_request WHERE accept_district=? AND accept_culturart=?");
                   $select->execute(array($congregation, "art"));

                   while($display = $select->fetch())
                   {
                             ?>

                             <div class="communitiesPlaces">

                                     <img src="" alt="" class="defaultBackground">
                                     <div class="text">

                                          <div class="backgroundColor">

                                          </div>

                                          <h1 class="placeName"><?php echo $display['accept_organisation'];?></h1>

                                          <p>Op aanpassen te klikken, kunt u de text , de titel en de achterground veranderen en nog meer<p>

                                     </div>

                                     <div class="actions">

                                        <a href=" https://www.google.nl/maps/place/" target="_blank"><img src="../public/images/uploaded_image/place_background/mapIcone.png" alt="" class="placesOnMap"></a>
                                        <a href="welcom.php?action=communityPage&name=<?php echo $display['accept_organisation'];?>"><img src="../public/images/uploaded_image/place_background/visitIcon.png" alt="" class="visitPlace"></a>


                                     </div>

                             </div>

                           <?php

                   }

         }

         artCommunities();

 ?>
