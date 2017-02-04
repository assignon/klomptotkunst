<?php

   require "pdo_connection.php";



     function subscription_request()
     {

       //$pdo = new PDO("mysql:host=localhost;dbname=gemeente",'root','');
       //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       $pdo = pdo();


       if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $destination)) // On filtre les serveurs qui rencontrent des bogues.
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
              <h1>Dankuwel voor u aanmelding.</h1><br/>
                 <p>

                   Deze mail bevestig u aanmelding als vereniging in ons gemeente.<br/>
                   U krijgt binnen 7dagen een aantwoord of uw organisatie wel of niet een pagina op<br/>
                   ons website hebben.
                   Heb u binnen 7 dagen geen mail check in u span.<br/>

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





        $surname = htmlspecialchars($_GET['surname']);
        $firstname = htmlspecialchars($_GET['firstname']);
        $tel = htmlspecialchars($_GET['tel']);
        $email = htmlspecialchars($_GET['email']);
        $organisation = htmlspecialchars($_GET['organisation']);
        $website = htmlspecialchars($_GET['website']);
        $artCultur = htmlspecialchars($_GET['artCultur']);
        $province = htmlspecialchars($_GET['province']);

        $select = $pdo->prepare("SELECT*FROM subscription_request WHERE request_community=? OR request_email=? OR request_website=? OR request_telnr=?");
        $select->execute(array($organisation, $email, $website, $tel));

        $select_accpted = $pdo->prepare("SELECT*FROM accepted_request WHERE accept_email=? OR accept_website=? OR accept_organisation=? OR accept_telnr=?");
        $select_accpted->execute(array($email, $website, $organisation, $tel));

        $select_refused = $pdo->prepare("SELECT*FROM refused_request WHERE refuse_email=? OR refuse_website=? OR refuse_organisation=? OR refuse_telnr=?");
        $select_refused->execute(array($email, $website, $organisation, $tel));

        $select_waiting = $pdo->prepare("SELECT*FROM waiting_request WHERE wait_email=? OR wait_website=? OR wait_organisation=? OR wait_telnr=?");
        $select_waiting->execute(array($email, $website, $organisation, $tel));


        $communityCount = $select->rowCount();

        $acceptedCount = $select_accpted->rowCount();
        $refusedCount = $select_refused->rowCount();
        $waitingCount = $select_waiting->rowCount();


        /*if($communityCount == 0)
        {*/

          $select_community = $pdo->prepare("SELECT*FROM subscription_request WHERE request_community=?");
          $select_community->execute(array($organisation));

          $communityCount_community = $select_community->rowCount();

          if($communityCount_community == 0)
          {

            $select_email = $pdo->prepare("SELECT*FROM subscription_request WHERE request_email=?");
            $select_email->execute(array($email));

            $communityCount_email = $select_email->rowCount();

            if($communityCount_email == 0)
            {


              $select_website = $pdo->prepare("SELECT*FROM subscription_request WHERE request_website=?");
              $select_website->execute(array($website));

              $communityCount_website = $select_website->rowCount();

              if($communityCount_website == 0)
              {

                $select_tel = $pdo->prepare("SELECT*FROM subscription_request WHERE request_telnr=?");
                $select_tel->execute(array($tel));

                $communityCount_tel = $select_tel->rowCount();

                if($communityCount_tel == 0)
                {

                   if($artCultur != "Cultuur of Kunst")
                   {

                      if($province != "Kies een plaats")
                      {

                        if($acceptedCount == 0)
                        {

                            if($refusedCount == 0)
                            {

                              if($waitingCount == 0)
                              {

                                 $insert = $pdo->prepare("INSERT INTO subscription_request(request_surname, request_firstname, request_email, request_website, request_telnr, request_community, request_district, request_artCultur, subscription_time)
                                 VALUES(?,?,?,?,?,?,?,?,NOW())");

                                 $insert->execute(array($surname, $firstname, $email, $website, $tel, $organisation, $province, $artCultur));

                                 $insertAll = $pdo->prepare("INSERT INTO all_community(name, surname, email, website, telnr, organisation_name, district, cultur_art, status, date_time)
                                 VALUES(?,?,?,?,?,?,?,?,?,NOW())");

                                $insertAll->execute(array( $firstname, $surname, $email, $website, $tel, $organisation, $province, $artCultur,"New"));

                                  mail($email,"Aanvraag bevestiging mail",$message,$header);
                                //myMail($email);

                                 echo "U aanvraag is verzonden. U krijgt binnen 7dagen een aantwoord. We hebben een bevestiging bericht naar u mail gestuurd.";

                          ?>

                             <script type="text/javascript">

                                window.addEventListener("load", function(){

                                     var requestField = document.querySelectorAll(".requestField");

                                     for (var i = 0; i < requestField.length; i++)
                                      {

                                         var requestFieldArr = requestField[i];
                                         var requestFieldArrVal = requestFieldArr.value;
                                         requestFieldArrVal = "";

                                      }

                                })

                             </script>

                          <?php

                                     }else{

                                        echo "Sorry maar de organisatie met de naam: ".' '.$organisation.' '."heeft zich al aangemeld en is in de wachtLijst gezet als vereniging in de".' '.$province.' '."gemeente";

                                     }

                                  }else{

                                    echo "Sorry maar de organisatie met de naam: ".' '.$organisation.' '."heeft zich al aangemeld en is GEWIEGERD als vereniging in de".' '.$province.' '."gemeente";

                                  }

                           }else{

                               echo "Sorry maar de organisatie met de naam: ".' '.$organisation.' '."heeft zich al aangemeld en is GEACCEPTEERD als vereniging in de".' '.$province.' '."gemeente";

                             }

                       }else{

                       echo "Kies een gemeente";

                    }

                    }else{

                        echo "Kies een tussen Cultuur en Kunst";

                    }


                   }else{

                      echo "Sorry maar de telefoon nummer met de naam: ".' '.$tel.' '."is al in gebruikt";

                   }

              }else{

                 echo "Sorry maar de website met de naam: ".' '.$website.' '."is al in gebruikt";

              }


            }else{

               echo "Sorry maar de email met de naam: ".' '.$email.' '."beataat al";

            }

           }else{

               echo "Sorry maar de organisatie met de naam: ".' '.$organisation.' '."heeft zich al aangemeld";

           }

        /*}else{

           echo "Sorry maar deze organisatie heeft zich al aangemeld";

        }*/

     }

     subscription_request();


 ?>
