<?php

require "../pdo_connection.php";

function refused_community()
 {

     $community_name = htmlspecialchars($_GET['traitment']);
     $email = htmlspecialchars($_GET['email']);
     $name = htmlspecialchars($_GET['name']);
     $pdo = pdo();

     $select_community = $pdo->prepare("SELECT*FROM subscription_request WHERE request_community=?");
     $select_community->execute(array($community_name));
     $select_community_result = $select_community->fetch();


     $select = $pdo->query("SELECT*FROM mail_settings");
     $displayMessages = $select->fetch();
     $messag = $displayMessages['refused_message'];

      if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $email)) // On filtre les serveurs qui rencontrent des bogues.
        {
          $passage_ligne = "\r\n";
        }
      else
        {
          $passage_ligne = "\n";
        }


      $messages = "

         <html>
           <body>
             <header>
             <h1>Best " .$name. " nogmaals dankuwel voor u aanmelding.</h1><br/>
                <p>

                 "
                    .$messag.

               "<br/>


                  Yanick en Shaif van Gemeente Edam Vollendam.

                </p>

             </header>
          </body>
        </html>


      ";
      $boundary = "-----=".md5(rand());


      $header = "From: \"Yanick & Shaif\"<kevineasky@gmail.com>".$passage_ligne;
      $header .= "Reply-to: \"Yanick & Shaif\"<kevineasky@gmail.com>".$passage_ligne;
      $header .= "MIME-version: 1.0".$passage_ligne;
      $header.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
      $header .= "Content-type: multipart/alternative;".$passage_ligne."boundary=\"$boundary\"".$passage_ligne;
      $header.= "Content-Transfer-Encoding: 8bit".$passage_ligne;

      $message = $passage_ligne."--".$boundary.$passage_ligne;
      $message .= $passage_ligne.$messages.$passage_ligne;


     $insert_refused_community = $pdo->prepare("INSERT INTO refused_request(refuse_surname,refuse_firstname,refuse_email,refuse_website,refuse_organisation,refuse_telnr,refuse_culturart,refuse_district,refuse_add_date) VALUES(?,?,?,?,?,?,?,?,NOW())");

     $insert_refused_community->execute(array($select_community_result['request_surname'], $select_community_result['request_firstname'], $select_community_result['request_email'], $select_community_result['request_website'], $select_community_result['request_community'], $select_community_result['request_telnr'], $select_community_result['request_artCultur'], $select_community_result['request_district']));

     $select_refused_community = $pdo->query("SELECT*FROM refused_request");
     $refusedCommunity_count = $select_refused_community->rowCount();

     $delete_select_community = $pdo->prepare("DELETE FROM subscription_request WHERE request_community=?");
     $delete_select_community->execute(array($community_name));

     mail($email,"Aanvraag bevestiging mail",$message,$header);

     ?>

     <div class="notificationIcons">

       <span class="icon-notification"></span>
       <p class="communityNotification">De <?php echo strtoupper($select_community_result['request_community']);?> VERENIGING is GEWEIGERD. Een mail<span class="icon-envelop"></span> waarin de redenen van hun weigerin zit is naar hun gestuurd.</p>

     </div>

     <?php
 }

 refused_community();


?>
