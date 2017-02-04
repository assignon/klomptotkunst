<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
		<meta name="keywords" content=""/>
		<meta name="description" content=""/>
		<meta name="author" content="Yanick 007&Shaif"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style/mail.css"/>
    <link rel="stylesheet" href="../public/style/header.css"/>
    <link rel="stylesheet" href="../web/vieuws/iconmoons/font_generate/style.css"/>
    <!--<script src="../web/models/ajax_request/admin_ajaxRequest.js"></script>-->
    <script src="../public/javascript/mail.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <title>Mail</title>
  </head>
    <body>

         <header>

          <?php require "../web/vieuws/template/header.php";?>

         <div id="newMailVenster">

           <p><span class="icon-envelop"></span> Nieuw Mail Venster</p>

            <form  action="" method="get">

                <div id="searchResultContainer">

                   <input type="search" name="searchReceiver" placeholder="Zoek hier de naam of de email van u ontvanger" id="searchReceiver">
                   <div id="searchResult"></div>

                </div>

                <input type="text" name="sender" value="Van de Gemeente">

                <select name="allReceiver" required="required" id="receiverList">

                  <option>Kies een ontvanger</option>

                </select>

                <input type="text" name="object" placeholder="Object">

                <textarea name="message" rows="8" cols="80" placeholder="Schrijf je mail hier..."></textarea>

                <input type="submit" name="send" value="Sturen">

            </form>

         </div>

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

              <form class="mailSearch" action="" method="get">

                  <input type="search" name="searchMail" placeholder="Zoek mails per Email, Naam, en Verenigings'naam...">

              </form>

          </div>


          <div id="mailCore">

            <div id="mailSidebarMenu">

              <div class="sidebar">

                  <span class="icon-envelop"><span class="icon-plus" id="plus"></span></span>
                  <p>Nieuw Mail</p>

              </div>


                <div class="sidebar">

                    <span class="icon-cog"></span>
                    <p>All Mails</p>

                </div>


                <div class="sidebar">

                    <span class="icon-cog"></span>
                    <p>Niet Gelezen</p>

                </div>


                <div class="sidebar">

                    <span class="icon-cog"></span>
                    <p>Gelezen</p>

                </div>


            </div>


            <div id="core">

            </div>

          </div>

        </header>

        <footer>



        </footer>

    </body>

</html>
