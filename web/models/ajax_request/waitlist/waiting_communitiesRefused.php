<?php

      require "../pdo_connection.php";



      function waiting_community_refused()
       {

           $community_name = htmlspecialchars($_GET['wartTraitment']);
           $email = htmlspecialchars($_GET['email']);
           $name = htmlspecialchars($_GET['name']);
           $pdo = pdo();


           $select = $pdo->query("SELECT*FROM mail_settings");
           $displayMessages = $select->fetch();
           $messag = $displayMessages['temporary_refuse'];

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




           $select_community = $pdo->prepare("SELECT*FROM waiting_request WHERE wait_organisation=?");
           $select_community->execute(array($community_name));
           $select_community_result = $select_community->fetch();

           $insert_refuse_community = $pdo->prepare("INSERT INTO refused_request(refuse_surname,refuse_firstname,refuse_email,refuse_website,refuse_organisation,refuse_telnr,refuse_culturart,refuse_district,refuse_add_date) VALUES(?,?,?,?,?,?,?,?,NOW())");

           $insert_refuse_community->execute(array($select_community_result['wait_surname'], $select_community_result['wait_firstname'], $select_community_result['wait_email'], $select_community_result['wait_website'], $select_community_result['wait_organisation'], $select_community_result['wait_telnr'], $select_community_result['wait_culturart'], $select_community_result['wait_district']));

           $delete_select_community = $pdo->prepare("DELETE FROM waiting_request WHERE wait_organisation=?");
           $delete_select_community->execute(array($community_name));

           mail($email,"Aanvraag bevestiging mail",$message,$header);

           ?>

           <div class="notificationIcons">

             <span class="icon-notification"></span>
             <p class="communityNotification">De <?php echo strtoupper($select_community_result['wait_organisation']);?> VERENIGING is in de GEWEIGERD lijst toegevoegd. Een mail<span class="icon-envelop"></span> is naar hun gestuurd waarin informaties staan. Als u de inhoud van de mail wil veranderen voor de volgend keer klick rechtsboven op de mail. Daar kunt u de mails die worden naar de vereniging vestuur aanpassen en nog meer doen.</p>

           </div>

           <?php
       }

       waiting_community_refused();


 ?>
