<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
		<meta name="keywords" content=""/>
		<meta name="description" content=""/>
		<meta name="author" content="Yanick 007"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style/admin.css"/>
    <link rel="stylesheet" href="../public/style/header.css"/>
    <link rel="stylesheet" href="../web/vieuws/iconmoons/font_generate/style.css"/>
    <!--<script src="../web/models/ajax_request/admin_ajaxRequest.js"></script>-->
    <script src="../public/javascript/admin.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <title>Admin</title>
  </head>
    <body>

         <header>

          <?php require "../web/vieuws/template/header.php";?>

          <!--<form id="messageBox" action="" method="get">

             <p id="mailBoxTitel">Handmatig Mail Sturen</p>
             <input type="text" name="sender" placeholder="Van">
             <p id="receiverAdress">Naar</p>
             <textarea name="messageText" rows="8" cols="80"></textarea>
             <input type="submit" name="sendit" value="Sturen">
             <p id="explication">Om deze scherm de volgend keer niet te zien, u kunt bovenrecht op de mail kliken en daar aan u wensen passen.</p>

          </form>

          <form id="sendMethod" action="" method="post">

            <p class="medhodsName">Automatische</p><input type="radio" name="autoManual" value="automatic" class="mailSendMethods">
            <p class="medhodsName">Handmatig</p><input type="radio" name="autoManual" value="manual" class="mailSendMethods">
            <p id="methods">Verander de manier hoe de berichten worden verzonden</p>

          </form>-->

          <div id="dashContainer">



            <div id="contentContainer">

               <div id="notification">

                  <div class="subscriptionInfos">

                      <h2>Alle Nieuw Aanmelding(en)</h2>
                      <h1 id="total">0</h1>

                  </div>


                  <div class="subscriptionInfos">

                      <h2>Geaccepteerd Aanmelding(en)</h2>
                      <h1 id="acceptedTotal">0</h1>

                  </div>


                  <div class="subscriptionInfos">

                      <h2>Geweigerd Aanmelding(en)</h2>
                      <h1 id="refusedTotal">0</h1>

                  </div>


                  <div class="subscriptionInfos">

                      <h2> Aanmelding(en) Tijdelijk Inactief Zetten</h2>
                      <h1 id="waitingListTotal">0</h1>

                  </div>

                  <form id="searchForm" action="" method="get">

                    <input type="search" name="communitySearch" placeholder="Zoek verenigingen per hun  naam" id="CommunitysearchZone">
                    <p>Verenigingen Soorteren Bij:</p>
                    <input type="radio" name="soort" value="new" class="communitySearchParts"> Nieuw
                    <input type="radio" name="soort" value="accepted" class="communitySearchParts"> Geaccepteerde
                    <input type="radio" name="soort" value="refused" class="communitySearchParts"> Geweigerde
                    <input type="radio" name="soort" value="temporary" class="communitySearchParts"> Inactief

                  </form>

               </div>

               <div id="resultContainer">

                   <div id="subscriptionDisplay">

                     <p id="zeroRegister"></p>

                   </div>


                   <div id="subscriptionParts">

                       <div class="partsData">

                           <div class="notificationIcons">

                             <span class="icon-info"></span>
                             <p class="communityNotification">Door op elke VERENIGING te kliken, kunt u meer informatie over hun organisation tonen</p>


                           </div>

                       </div>


                       <div class="partsInfos" id="partsAccept">

                           <form action="" method="post">

                             <p>geaccepteerd aanmeldingen Weergeven</p>
                             <input type="submit" name="accepted" value="Weergeven" class="wartForm"/>

                          </form>

                       </div>


                       <div class="partsInfos" id="partsRefuse">

                           <form action="" method="post">

                             <p>Geweigerd aanmeldingen Weergeven</p>
                             <input type="submit" name="refused" value="Weergeven" class="wartForm"/>

                          </form>

                       </div>

                       <div class="partsInfos" id="partsWait">

                           <form action="" method="post">

                             <p>Aanmeldingen in de wachtlijst Weergeven</p>
                             <input type="submit" name="waitList" value="WeerGeven" class="wartForm"/>

                          </form>

                       </div>

                       <div class="partsInfos" id="partsNew">

                           <form action="" method="post">

                             <p>Nieuw aanmeldingen Weergeven</p>
                             <input type="submit" name="totalSubs" value="WeerGeven" class="wartForm"/>

                          </form>

                       </div>


                   </div>

               </div>

            </div>

          </div>

         </header>


         <footer>



         </footer>

    </body>

</html>
