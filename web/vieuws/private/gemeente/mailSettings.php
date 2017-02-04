<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
		<meta name="keywords" content=""/>
		<meta name="description" content=""/>
		<meta name="author" content="Yanick 007&Shaif"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style/mailSettings.css"/>
    <link rel="stylesheet" href="../public/style/header.css"/>
    <link rel="stylesheet" href="../web/vieuws/iconmoons/font_generate/style.css"/>
    <!--<script src="../web/models/ajax_request/admin_ajaxRequest.js"></script>-->
    <script src="../public/javascript/mailSettings.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <title>Mail Settings</title>
  </head>
    <body>

         <header>

          <?php require "../web/vieuws/template/header.php";?>

          <div id="mailMenu">

              <div class="mailImg">

                <a href="welcom.php?action=mail&id=<?php echo $_SESSION['id'];?>">

                  <span class="icon-envelop"></span>
                  <p>Mails</p>

                </a>

              </div>

              <div class="mailImg">

                <a href="welcom.php?action=mailSettings&id=<?php echo $_SESSION['id'];?>" id="msettings">

                  <span class="icon-envelop"><span class="icon-cog" id="config"></span></span>
                  <p>Mails Instellingen</p>

                </a>

              </div>


          </div>


          <form  action="" method="post" id="messageForm">

              <div class="messageCont">

                  <p id="error">Head</p>: <input type="text" name="head" id="mailSender">


              </div>


              <div class="messageCont">

                  <textarea name="acceptMail" rows="8" cols="80" class="textareas"></textarea>
                  <p>De geaccepteerd Verenigingen mail aanpassen</p>

              </div>


              <div class="messageCont">

                  <textarea name="refuseMail" rows="8" cols="80" class="textareas"></textarea>
                  <p>De geweigerd Verenigingen mail aanpassen</p>

              </div>


              <div class="messageCont">

                  <textarea name="waitMail" rows="8" cols="80" class="textareas"></textarea>
                  <p>De Verenigingen die tijdelijk uitgezet zijn mail aanpassen</p>

              </div>


              <div class="messageCont">

                  <textarea name="acceptRefuse" rows="8" cols="80" class="textareas"></textarea>
                  <p>De Verenigingen die geaccepteerd zijn maar weer geweigerd mail aanpassen</p>

              </div>


              <div class="messageCont">

                  <textarea name="acceptWait" rows="8" cols="80" class="textareas"></textarea>
                  <p>De Verenigingen die geaccepteerd zijn maar weer tijdelijk uitgezet mail aanpassen</p>

              </div>


              <div class="messageCont">

                  <textarea name="refuseAccept" rows="8" cols="80" class="textareas"></textarea>
                  <p>De Verenigingen die geweigerd zijn maar weer geaccepteerd mail aanpassen</p>

              </div>


              <div class="messageCont">

                  <textarea name="waitAccept" rows="8" cols="80" class="textareas"></textarea>
                  <p>De Verenigingen die tijdelijk uitgezet zijn maar weer geaccepteerd mail aanpassen</p>

              </div>


              <div class="messageCont">

                  <textarea name="waitRefuse" rows="8" cols="80" class="textareas"></textarea>
                  <p>De Verenigingen die tijdelijk uitgezet zijn maar geweigerd mail aanpassen</p>

              </div>

              <input type="submit" name="send" value="Annpassen">

          </form>

       </header>

       <footer>



       </footer>

   </body>

</html>
