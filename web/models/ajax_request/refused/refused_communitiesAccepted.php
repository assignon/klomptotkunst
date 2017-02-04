<?php

    require "../pdo_connection.php";



      function refused_community_accepted()
       {

           $community_name = htmlspecialchars($_GET['wartTraitment']);
           $email = htmlspecialchars($_GET['email']);
           $name = htmlspecialchars($_GET['name']);
           $pdo = pdo();


           $select = $pdo->query("SELECT*FROM mail_settings");
           $displayMessages = $select->fetch();
           $messag = $displayMessages['refused_accept'];

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


           $select_community = $pdo->prepare("SELECT*FROM refused_request WHERE refuse_organisation=?");
           $select_community->execute(array($community_name));
           $select_community_result = $select_community->fetch();

           $insert_accept_community = $pdo->prepare("INSERT INTO accepted_request(accept_surname,accept_firstname,accept_email,accept_website,accept_organisation,accept_telnr,accept_culturart,accept_district,accept_add_date) VALUES(?,?,?,?,?,?,?,?,NOW())");

           $insert_accept_community->execute(array($select_community_result['refuse_surname'], $select_community_result['refuse_firstname'], $select_community_result['refuse_email'], $select_community_result['refuse_website'], $select_community_result['refuse_organisation'], $select_community_result['refuse_telnr'], $select_community_result['refuse_culturart'], $select_community_result['refuse_district']));

           $delete_select_community = $pdo->prepare("DELETE FROM refused_request WHERE refuse_organisation=?");
           $delete_select_community->execute(array($community_name));

           mail($email,"Aanvraag bevestiging mail",$message,$header);

           ?>

           <div class="notificationIcons">

             <span class="icon-notification"></span>
             <p class="communityNotification">De <?php echo strtoupper($select_community_result['refuse_organisation']);?> VERENIGING is in de GEACCEPTEERD lijst toegevoegd. Een mail<span class="icon-envelop"></span> is naar hun gestuurd waarin informaties staan. Als u de inhoud van de mail wil veranderen voor de volgend keer klick rechtsboven op de mail. Daar kunt u de mails die worden naar de vereniging vestuur aanpassen en nog meer doen..</p>

           </div>

           <?php
       }

       refused_community_accepted()


 ?>
