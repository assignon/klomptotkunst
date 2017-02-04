<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
		<meta name="keywords" content=""/>
		<meta name="description" content=""/>
		<meta name="author" content="Yanick 007 & Shaif"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style/contact.css"/>
    <link rel="stylesheet" href="../public/style/siteHeader.css"/>
    <link rel="stylesheet" href="../public/style/footer.css"/>
    <link rel="stylesheet" href="../web/vieuws/iconmoons/font_generate/style.css"/>
    <link rel="stylesheet" href="../public/style/font.css"/>
    <link rel="stylesheet" href="../public/style/site_search.css"/>
    <!--<link rel="stylesheet" href="../../public/css/global_style/leader_info.css"/>-->
    <script src="../public/javascript/contact.js"></script>
    <script src="../web/models/ajax_request/gemeente_ajaxRequest.js"></script>
    <script src="../web/models/ajax_request/search_request/site_search.js"></script>
    <script src="../public/javascript/siteHeader.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <title>Contact</title>
  </head>
    <body>

         <header>

            <?php require "../web/vieuws/template/siteHeader.php";?>

            <div id="contactBanner">

                <div id="contactBannerInfo">

                    <div id="contactBannerInfosBack">

                    </div>

                    <div id="contactInfosFront">

                          <h2 id="contactTitel">Kunst en Cultuur in de gemeente Edam-Volendam</h2>

                          <p id="contactInfo">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sed turpis sem. Sed sodales venenatis. Nulla lobortis tristique hendrerit. Class litora torquent per.</p>

                          <button id="contactMore">Meer Informatie</button>

                    </div>

                </div>


            </div>

            <div id="contactUs">

              <div id="us">

                  <h3>Over Ons</h3>
                  <p id="usText"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque urna vel orci interdum rhoncus. Curabitur id lorem risus. Phasellus sed elit ac nisl iaculis aliquam. Donec aliquet rutrum lobortis.

                   Pellentesque imperdiet maximus risus, id ultricies tortor blandit in. Suspendisse vel molestie purus, at lobortis nisi. Nulla quis facilisis sapien. Ut ut ipsum nisi. Curabitur id lorem risus.
                   Phasellus sed elit ac nisl iaculis aliquam. Donec aliquet rutrum lobortis. </p>

              </div>

              <form  action="" method="get">

                <h3 id="head">NEEM CONTACT OP!</h3>
                <input type="text" name="surname"  placeholder="Voornaam" class="questionInputVal">
                <input type="text" name="name" placeholder="Achternaam" class="questionInputVal">
                <input type="text" name="telnr" placeholder="Telefoon" class="questionInputVal">
                <input type="email" name="email" placeholder="Email" class="questionInputVal">
                <textarea name="question" rows="8" cols="80" placeholder="Vraag of Opmerking" class="questionInputVal"></textarea>
                <input type="submit" name="send" value="Vestuur" class="questionInputVal">

              </form>

            </div>


         </header>

         <footer>

            <?php require "../web/vieuws/template/footer.php";?>

         </footer>

   </body>

 </html>
