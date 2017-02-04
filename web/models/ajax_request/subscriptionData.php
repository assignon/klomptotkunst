<?php

    require "pdo_connection.php";


    function subscription_data()
    {

         $data = htmlspecialchars($_GET['data']);


       $pdo = pdo();

       $select = $pdo->prepare("SELECT*FROM subscription_request WHERE request_community=?");
       $select->execute(array($data));
       //$subscriptionCount = $select->rowCount();
       while($display = $select->fetch())
       {

         ?>

          <div id="datas">

             <div id='communitiesData'>

               <div class="dataContainer"><span class="icon-profile"></span><p>Naam:</p><h3 class="subcriptionInfos"><?php echo $display['request_firstname'];?></h3></div>

               <div class="dataContainer"><span class="icon-profile"></span><p>VoorNaam:</p><h3 class="subcriptionInfos"><?php echo $display['request_surname'];?></h3></div>

               <div class="dataContainer"><span class="icon-envelop"></span><p>Email:</p><h3 class="subcriptionInfos"><?php echo $display['request_email'];?></h3></div>

               <div class="dataContainer"><a href="#" target="_blank"><span class="icon-earth"></span><p>Website:</p><h3 class="subcriptionInfos"><?php echo $display['request_website'];?></h3></a></div>

               <div class="dataContainer"><span class="icon-users"></span><p>Vereniging:</p><h3 class="subcriptionInfos"><?php echo $display['request_community'];?></h3></div>

               <div class="dataContainer"><span class="icon-phone"></span><p>Telnr:</p><h3 class="subcriptionInfos"><?php echo $display['request_telnr'];?></h3></div>

               <div class="dataContainer"><span class="icon-location"></span><p>Gemeente:</p><h3 class="subcriptionInfos"><?php echo $display['request_district'];?></h3></div>

               <div class="dataContainer"><span class="icon-pen"></span><p>Cultuur-Art:</p><h3 class="subcriptionInfos"><?php echo $display['request_artCultur'];?></h3></div>

               <div class="dataContainer"><span class="icon-clock2"></span><p>Aanmelding Datum:</p><h3 class="subcriptionInfos"><?php echo $display['subscription_time'];?></h3></div>

             </div>


            <form class="" action="" method="get">

              <input type="submit" name="addAccept" value="GoedKeuren" class="communityTraitment">
              <input type="submit" name="addRefuse" value="Weigeren" class="communityTraitment">
              <!--<input type="submit" name="addWait" value="WachtList Zetten" class="communityTraitment">-->

            </form>

          </div>


         <?php
       }


    }



    subscription_data();


?>
