<?php


          require "../pdo_connection.php";




          function users_questions()
          {

              $pdo = pdo();

              $name = htmlspecialchars($_GET['name']);
              $surname = htmlspecialchars($_GET['surname']);
              $telnr = htmlspecialchars($_GET['telnr']);
              $email = htmlspecialchars($_GET['email']);
              $question = htmlspecialchars($_GET['question']);


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
                     <h1>Dankuwel voor u aanmelding.</h1><br/>
                        <p>

                          Deze mail bevestig dat u vraag goed vestuur en ontvangen is.<br/>
                          U krijgt zo snel mogelijk een aantwoord op u vraag<br/><br/>
                          Naam:".$name."<br/>
                          Voornaam:".$surname."<br/>
                          Vraag of Opmerking:".$question."<br/></br>


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



              if(!empty($name) AND !empty($surname) AND !empty($telnr) AND !empty($email) AND !empty($question))
              {

                 $insert = $pdo->prepare("INSERT INTO contact(name, surname, telnr, email, question, date_time) VALUES(?,?,?,?,?,NOW())");
                 $insert->execute(array($name,$surname,$telnr,$email,$question));

                 mail($email,"Aanvraag bevestiging mail",$message,$header);

                 echo "U vra(a)g(en) of opmerking(en) is of zijn vestuurd.U krijgt zo snel mogelijk een antwoord.";

                 ?>

                     <script type="text/javascript">

                        window.addEventListener("load", function(){

                           var questionInputVal = document.querySelectorAll(".questionInputVal");

                           questionInputVal[0].value = "";
                           questionInputVal[1].value = "";
                           questionInputVal[2].value = "";
                           questionInputVal[3].value = "";
                           questionInputVal[4].value = "";

                        })

                     </script>

                 <?php

              }else{

                echo "Vul alle velden in";

              }

          }

          users_questions();


 ?>
