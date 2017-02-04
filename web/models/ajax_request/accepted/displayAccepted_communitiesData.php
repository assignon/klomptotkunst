<?php

require "../pdo_connection.php";


function accepted_data()
{

   $target_data = htmlspecialchars($_GET['data']);

    $pdo = pdo();
    $select = $pdo->prepare("SELECT*FROM accepted_request WHERE accept_organisation=?");
    $select->execute(array($target_data));

    while($displayData = $select->fetch())
    {

        ?>

        <div id="accepted_datas">

           <div id='accepted_communitiesData'>

             <div class="accepted_dataContainer"><span class="icon-profile"></span><p>Naam:</p><h3 class="accepted_subcriptionInfos"><?php echo $displayData['accept_firstname'];?></h3></div>

             <div class="accepted_dataContainer"><span class="icon-profile"></span><p>VoorNaam:</p><h3 class="accepted_subcriptionInfos"><?php echo $displayData['accept_surname'];?></h3></div>

             <div class="accepted_dataContainer"><span class="icon-envelop"></span><p>Email:</p><h3 class="accepted_subcriptionInfos"><?php echo $displayData['accept_email'];?></h3></div>

             <div class="accepted_dataContainer"><a href="#" target="_blank"><span class="icon-earth"></span><p>Website:</p><h3 class="accepted_subcriptionInfos"><?php echo $displayData['accept_website'];?></h3></a></div>

             <div class="accepted_dataContainer"><span class="icon-users"></span><p>Vereniging:</p><h3 class="accepted_subcriptionInfos"><?php echo $displayData['accept_organisation'];?></h3></div>

             <div class="accepted_dataContainer"><span class="icon-phone"></span><p>Telnr:</p><h3 class="accepted_subcriptionInfos"><?php echo $displayData['accept_telnr'];?></h3></div>

             <div class="accepted_dataContainer"><span class="icon-location"></span><p>Gemeente:</p><h3 class="accepted_subcriptionInfos"><?php echo $displayData['accept_district'];?></h3></div>

             <div class="accepted_dataContainer"><span class="icon-pen"></span><p>Cultuur-Art:</p><h3 class="accepted_subcriptionInfos"><?php echo $displayData['accept_culturart'];?></h3></div>

             <div class="accepted_dataContainer"><span class="icon-clock2"></span><p>Aanmelding Datum:</p><h3 class="accepted_subcriptionInfos"><?php echo $displayData['accept_add_date'];?></h3></div>

           </div>


          <form class="" action="" method="get">

            <input type="submit" name="addRefuse" value="Weigeren" class="accepted_communityTraitment">
            <input type="submit" name="addWait" value="WachtList Zetten" class="accepted_communityTraitment">

          </form>

        </div>

        <?php

    }

}accepted_data();

 ?>
