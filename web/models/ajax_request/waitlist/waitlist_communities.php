<?php

      require "../pdo_connection.php";

      function wait_community()
       {

           $community_name = htmlspecialchars($_GET['traitment']);
           $pdo = pdo();

           $select_community = $pdo->prepare("SELECT*FROM subscription_request WHERE request_community=?");
           $select_community->execute(array($community_name));
           $select_community_result = $select_community->fetch();

           $insert_wait_community = $pdo->prepare("INSERT INTO waiting_request(wait_surname,wait_firstname,wait_email,wait_website,wait_organisation,wait_telnr,wait_culturart,wait_district,wait_add_date) VALUES(?,?,?,?,?,?,?,?,NOW())");

           $insert_wait_community->execute(array($select_community_result['request_surname'], $select_community_result['request_firstname'], $select_community_result['request_email'], $select_community_result['request_website'], $select_community_result['request_community'], $select_community_result['request_telnr'], $select_community_result['request_artCultur'], $select_community_result['request_district']));

           $select_wait_community = $pdo->query("SELECT*FROM waiting_request");
           $waitCommunity_count = $select_wait_community->rowCount();

           $delete_select_community = $pdo->prepare("DELETE FROM subscription_request WHERE request_community=?");
           $delete_select_community->execute(array($community_name));

           ?>

           <div class="notificationIcons">

             <span class="icon-notification"></span>
             <p class="communityNotification">De <?php echo strtoupper($select_community_result['request_community']);?> VERENIGING is in de WACHTLIJK toegevoegd. Een mail<span class="icon-envelop"></span> is naar hun gestuurd waarin de verklaring staat.</p>

           </div>

           <?php
       }

       wait_community();


 ?>
