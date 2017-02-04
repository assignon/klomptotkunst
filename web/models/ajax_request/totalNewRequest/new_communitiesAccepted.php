<?php

    require "../pdo_connection.php";




      function new_community_accepted()
       {

           $community_name = htmlspecialchars($_GET['wartTraitment']);
           $email = htmlspecialchars($_GET['email']);
           $name = htmlspecialchars($_GET['name']);
           $pdo = pdo();


               $randString = "abcdefghijklmnopqrstuvwxyz";
               $randString .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
               $random = "";

               $length = strlen($randString);
               $nb = 0;

               while($nb < 10)
               {

                     $random .= $randString[rand(0,$length-1)];
                     $nb++;

               }



               $select = $pdo->query("SELECT*FROM mail_settings");
               $displayMessages = $select->fetch();
               $messag = $displayMessages['accepted_message'];
               $default_username =  $name.'_'.$random;
               $default_password = sha1($community_name.'_'.$random);

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
                              "<h2>Uw tijdelijk inlog gegevens:</h2><br/>"
                              "Gebruikersnaam:".' '.$default_username.
                              "Wachtwoord:".' '.$default_password.


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


           $select_community = $pdo->prepare("SELECT*FROM subscription_request WHERE request_community=?");
           $select_community->execute(array($community_name));
           $select_community_result = $select_community->fetch();

           $insert_accept_community = $pdo->prepare("INSERT INTO accepted_request(accept_surname,accept_firstname,accept_email,accept_website,accept_organisation,accept_telnr,accept_culturart,accept_district,accept_add_date) VALUES(?,?,?,?,?,?,?,?,NOW())");

           $insert_accept_community->execute(array($select_community_result['request_surname'], $select_community_result['request_firstname'], $select_community_result['request_email'], $select_community_result['request_website'], $select_community_result['request_community'], $select_community_result['request_telnr'], $select_community_result['request_artCultur'], $select_community_result['request_district']));

           $insertLogin_data = $pdo->prepare("INSERT INTO users_data(temporary_username,temporary_password,organisation_name) VALUES(?,?,?)");
           $insertLogin_data->execute(array($default_username,$default_password,$community_name));

          //  $all_accepted = $pdo->prepare("INSERT INTO all_community(name, surname, email, website, telnr, organisation_name, district, cultur_art, status, date_time) VALUES(?,?,?,?,?,?,?,?,?,NOW())");
          //  $all_accepted->execute(array($select_community_result['request_firstname'], $select_community_result['request_surname'], $select_community_result['request_email'], $select_community_result['request_website'], $select_community_result['request_telnr'], $select_community_result['request_community'], $select_community_result['request_district'], $select_community_result['request_artCultur'], "Goedgekeurd"));

           $delete_select_community = $pdo->prepare("DELETE FROM subscription_request WHERE request_community=?");
           $delete_select_community->execute(array($community_name));

           mail($email,"Aanvraag bevestiging mail",$message,$header);

           ?>

           <div class="notificationIcons">

             <span class="icon-notification"></span>
             <p class="communityNotification">De <?php echo strtoupper($select_community_result['request_community']);?> VERENIGING is in de GEACCEPTEERD lijst toegevoegd. Een mail<span class="icon-envelop"></span> is naar hun gestuurd waarin informaties staan. Als u de inhoud van de mail wil veranderen voor de volgend keer klick rechtsboven op de mail. Daar kunt u de mails die worden naar de vereniging vestuur aanpassen en nog meer doen.</p>

           </div>

           <?php
       }

       new_community_accepted();


 ?>
