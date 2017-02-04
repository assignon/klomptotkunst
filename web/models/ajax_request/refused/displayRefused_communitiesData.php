<?php

require "../pdo_connection.php";

function refused_data()
{

   $refuse_data = htmlspecialchars($_GET['refuseData']);

    $pdo = pdo();
    $select = $pdo->prepare("SELECT*FROM refused_request WHERE refuse_organisation=?");
    $select->execute(array($refuse_data));

    while($displayData = $select->fetch())
    {

        ?>

        <div id="refused_datas">

           <div id='refused_communitiesData'>

             <div class="refused_dataContainer"><span class="icon-profile"></span><p>Naam:</p><h3 class="refused_subcriptionInfos"><?php echo $displayData['refuse_firstname'];?></h3></div>

             <div class="refused_dataContainer"><span class="icon-profile"></span><p>VoorNaam:</p><h3 class="refused_subcriptionInfos"><?php echo $displayData['refuse_surname'];?></h3></div>

             <div class="refused_dataContainer"><span class="icon-envelop"></span><p>Email:</p><h3 class="refused_subcriptionInfos"><?php echo $displayData['refuse_email'];?></h3></div>

             <div class="refused_dataContainer"><a href="#" target="_blank"><span class="icon-earth"></span><p>Website:</p><h3 class="refused_subcriptionInfos"><?php echo $displayData['refuse_website'];?></h3></a></div>

             <div class="refused_dataContainer"><span class="icon-users"></span><p>Vereniging:</p><h3 class="refused_subcriptionInfos"><?php echo $displayData['refuse_organisation'];?></h3></div>

             <div class="refused_dataContainer"><span class="icon-phone"></span><p>Telnr:</p><h3 class="refused_subcriptionInfos"><?php echo $displayData['refuse_telnr'];?></h3></div>

             <div class="refused_dataContainer"><span class="icon-location"></span><p>Gemeente:</p><h3 class="refused_subcriptionInfos"><?php echo $displayData['refuse_district'];?></h3></div>

             <div class="refused_dataContainer"><span class="icon-pen"></span><p>Cultuur-Art:</p><h3 class="refused_subcriptionInfos"><?php echo $displayData['refuse_culturart'];?></h3></div>

             <div class="refused_dataContainer"><span class="icon-clock2"></span><p>Aanmelding Datum:</p><h3 class="refused_subcriptionInfos"><?php echo $displayData['refuse_add_date'];?></h3></div>

           </div>


          <form class="" action="" method="get">

            <input type="submit" name="addRefuse" value="Accepteren" class="refused_communityTraitment">
            <!--<input type="submit" name="addWait" value="WachtList Zetten" class="refused_communityTraitment">-->

          </form>

        </div>

        <?php

    }

}
refused_data();

 ?>
