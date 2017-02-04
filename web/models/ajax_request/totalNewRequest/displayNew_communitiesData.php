<?php

require "../pdo_connection.php";


function new_communities_data()
{

   $newCommunities_data = htmlspecialchars($_GET['newCommunitiesData']);

    $pdo = pdo();
    $select = $pdo->prepare("SELECT*FROM subscription_request WHERE request_community=?");
    $select->execute(array($newCommunities_data));

    while($displayData = $select->fetch())
    {

        ?>

        <div id="request_datas">

           <div id='request_communitiesData'>

             <div class="request_dataContainer"><span class="icon-profile"></span><p>Naam:</p><h3 class="request_subcriptionInfos"><?php echo $displayData['request_firstname'];?></h3></div>

             <div class="request_dataContainer"><span class="icon-profile"></span><p>VoorNaam:</p><h3 class="request_subcriptionInfos"><?php echo $displayData['request_surname'];?></h3></div>

             <div class="request_dataContainer"><span class="icon-envelop"></span><p>Email:</p><h3 class="request_subcriptionInfos"><?php echo $displayData['request_email'];?></h3></div>

             <div class="request_dataContainer"><a href="#" target="_blank"><span class="icon-earth"></span><p>Website:</p><h3 class="request_subcriptionInfos"><?php echo $displayData['request_website'];?></h3></a></div>

             <div class="request_dataContainer"><span class="icon-users"></span><p>Vereniging:</p><h3 class="request_subcriptionInfos"><?php echo $displayData['request_community'];?></h3></div>

             <div class="request_dataContainer"><span class="icon-phone"></span><p>Telnr:</p><h3 class="request_subcriptionInfos"><?php echo $displayData['request_telnr'];?></h3></div>

             <div class="request_dataContainer"><span class="icon-location"></span><p>Gemeente:</p><h3 class="request_subcriptionInfos"><?php echo $displayData['request_district'];?></h3></div>

             <div class="request_dataContainer"><span class="icon-pen"></span><p>Cultuur-Art:</p><h3 class="request_subcriptionInfos"><?php echo $displayData['request_artCultur'];?></h3></div>

             <div class="request_dataContainer"><span class="icon-clock2"></span><p>Aanmelding Datum:</p><h3 class="request_subcriptionInfos"><?php echo $displayData['subscription_time'];?></h3></div>

           </div>


          <form class="" action="" method="get">

            <input type="submit" name="addrequest" value="Accepteren" class="new_communityTraitment">
            <input type="submit" name="addrefuse" value="Weigeren" class="new_communityTraitment">
            <!--<input type="submit" name="addWait" value="WachtList Zetten" class="new_communityTraitment">-->

          </form>

        </div>

        <?php

    }

}
new_communities_data();

 ?>
