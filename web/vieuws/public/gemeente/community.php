<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="Bekijk gemakelijk alle kunst en cultuur van de dorpen en steden in de gemeente Edam-Volendam">
    <meta name="keywords" content="Kunst, Cultuur, organisatie, inschrijven, Edam, Volendam, Warder, Kwadijk, Middelie, Oosthuizen, Schardam, Beets, Hobrede">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="author" content="Yanick 007"/>
    <link rel="stylesheet" href="../public/style/community.css"/>
    <link rel="stylesheet" href="../public/style/siteHeader.css"/>
    <link rel="stylesheet" href="../public/style/footer.css"/>
    <link rel="stylesheet" href="../web/vieuws/iconmoons/font_generate/style.css"/>
    <link rel="stylesheet" href="../public/style/font.css"/>
    <link rel="stylesheet" href="../public/style/site_search.css"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--<link rel="stylesheet" href="../../public/css/global_style/leader_info.css"/>-->
    <script src="../public/javascript/community.js"></script>
    <script src="../web/models/ajax_request/search_request/site_search.js"></script>
    <script src="../public/javascript/siteHeader.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <title>home</title>
  </head>
    <body>

         <header>

             <?php require "../web/vieuws/template/siteHeader.php";?>

             <div id="communitiesContainer">


               <div id="banner">

                   <div id="bannerInfo">

                       <div id="bannerInfosBack">

                       </div>

                       <div id="infosFront">

                             <h2 id="titel"></h2>

                             <p id="info"></p>

                             <button id="more"></button>

                       </div>

                   </div>


               </div>

                 <div id="communityFilter">

                     <button id="filterIcon"><span class="icon-glass2"></span></button>
                     <button class="filterButton">Alles</button>
                     <button class="filterButton">Cultuur</button>
                     <button class="filterButton">Kunst</button>

                 </div>


                 <div id="communities">

                 </div>

             </div>

         </header>


          <footer>

             <?php require "../web/vieuws/template/footer.php";?>

          </footer>

      </body>

  </html>
