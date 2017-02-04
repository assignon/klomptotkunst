<?php

        require "../pdo_connection.php";

        function display_community()
        {

            $pdo = pdo();
            $town_name = htmlspecialchars($_GET['townName']);

            $select = $pdo->prepare("SELECT*FROM accepted_request WHERE accept_district=? LIMIT 9");
            $select->execute(array($town_name));
            $displayOne = $select->fetch();

           ?>

           <div id="townCommunityContainer">

           <?php

            while($display_community = $select->fetch())
            {

               ?>

                  <a href="welcom.php?action=communityPage&name=<?php echo $display_community['accept_organisation'];?>" class="communityLink">

                      <img src="../public/images/menuIcons/bannenCommunityImg.png" alt="">
                      <p><?php echo $display_community['accept_organisation']; ?></p>

                  </a>

               <?php

            }
            ?>

            </div>

            <div class="townTraitment">

                <a href="welcom.php?action=community&congregation=<?php echo $displayOne['accept_district'];?>"><span class="icon-earth">Gemeente Bezoeken</span></a>
                <a href="https://www.google.nl/maps/place/<?php echo $displayOne['accept_organisation'];?>" target="_blank"><span class="icon-map">Map</span></a>

            </div>

            <?php

        }

        display_community();

 ?>
