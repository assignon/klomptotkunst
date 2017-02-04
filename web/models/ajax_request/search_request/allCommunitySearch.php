<?php

        require "../pdo_connection.php";

        function searchAllCommunity()
        {

           $pdo = pdo();
           $data = htmlspecialchars($_GET['data']);

           $all_community = $pdo->prepare("SELECT*FROM subscription_request WHERE request_community LIKE '$data%' LIMIT 9");
           $all_community->execute(array($data));

           $all_community_count = $all_community->rowCount();


           if($all_community_count > 0)
           {
             ?>
             <div class="newComContainer">
             <?php

              while($display_all = $all_community->fetch())
              {

                ?>



                     <div class="newCom">

                        <p class="new_communities_name"><?php echo ucfirst($display_all['request_community']);?></p>

                     </div>


                <?php

              }

              ?>
             </div>

           <?php

           }else{

            echo "Geen Vereniging Gevonden";

           }



        }


        searchAllCommunity();

 ?>
