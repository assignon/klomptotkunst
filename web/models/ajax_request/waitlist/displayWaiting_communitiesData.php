<?php

require "../pdo_connection.php";


function waiting_data()
{

   $target_data = htmlspecialchars($_GET['waitingData']);

    $pdo = pdo();
    $select = $pdo->prepare("SELECT*FROM waiting_request WHERE wait_organisation=?");
    $select->execute(array($target_data));

    while($displayData = $select->fetch())
    {

        ?>

        <div id="waiting_datas">

           <div id='waiting_communitiesData'>

             <div class="waiting_dataContainer"><span class="icon-profile"></span><p>Naam:</p><h3 class="waiting_subcriptionInfos"><?php echo $displayData['wait_firstname'];?></h3></div>

             <div class="waiting_dataContainer"><span class="icon-profile"></span><p>VoorNaam:</p><h3 class="waiting_subcriptionInfos"><?php echo $displayData['wait_surname'];?></h3></div>

             <div class="waiting_dataContainer"><span class="icon-envelop"></span><p>Email:</p><h3 class="waiting_subcriptionInfos"><?php echo $displayData['wait_email'];?></h3></div>

             <div class="waiting_dataContainer"><a href="#" target="_blank"><span class="icon-earth"></span><p>Website:</p><h3 class="waiting_subcriptionInfos"><?php echo $displayData['wait_website'];?></h3></a></div>

             <div class="waiting_dataContainer"><span class="icon-users"></span><p>Vereniging:</p><h3 class="waiting_subcriptionInfos"><?php echo $displayData['wait_organisation'];?></h3></div>

             <div class="waiting_dataContainer"><span class="icon-phone"></span><p>Telnr:</p><h3 class="waiting_subcriptionInfos"><?php echo $displayData['wait_telnr'];?></h3></div>

             <div class="waiting_dataContainer"><span class="icon-location"></span><p>Gemeente:</p><h3 class="waiting_subcriptionInfos"><?php echo $displayData['wait_district'];?></h3></div>

             <div class="waiting_dataContainer"><span class="icon-pen"></span><p>Cultuur-Art:</p><h3 class="waiting_subcriptionInfos"><?php echo $displayData['wait_culturart'];?></h3></div>

             <div class="waiting_dataContainer"><span class="icon-clock2"></span><p>Aanmelding Datum:</p><h3 class="waiting_subcriptionInfos"><?php echo $displayData['wait_add_date'];?></h3></div>

           </div>


          <form class="" action="" method="get">

            <input type="submit" name="addAccepted" value="Accepteren" class="waiting_communityTraitment">
            <input type="submit" name="addRefused" value="weigeren" class="waiting_communityTraitment">

          </form>

        </div>

        <?php

    }

}waiting_data();

 ?>
