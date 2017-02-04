<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
		<meta name="keywords" content=""/>
		<meta name="description" content=""/>
		<meta name="author" content="Yanick 007"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style/gemeente_home.css"/>
    <link rel="stylesheet" href="../public/style/siteHeader.css"/>
    <link rel="stylesheet" href="../public/style/footer.css"/>
    <link rel="stylesheet" href="../web/vieuws/iconmoons/font_generate/style.css"/>
    <link rel="stylesheet" href="../public/style/font.css"/>
    <link rel="stylesheet" href="../public/style/site_search.css"/>
    <!--<link rel="stylesheet" href="../../public/css/global_style/leader_info.css"/>-->
    <script src="../public/javascript/gemeente_home.js"></script>
    <script src="../web/models/ajax_request/gemeente_ajaxRequest.js"></script>
    <script src="../web/models/ajax_request/search_request/site_search.js"></script>
    <script src="../public/javascript/siteHeader.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <title>home</title>
  </head>
    <body>

         <header>

          <div id="placesSearchResults">

              <p id="placesSearchError"></p>

          </div>



          <?php require "../web/vieuws/template/siteHeader.php";?>
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

          <div id="placeContainer">

          </div>

          <div class="frontCultArt">

            <div class="cultuur">

              <div class="cultArtBackground">

              </div>

                <h1 id="cultuurHeader"></h1>

                <p id="cultuurText">


                </p>

            </div>

            <div class="art">

              <div class="cultArtBackground">

              </div>

              <h1 id="artHeader"></h1>

              <p id="artText">



              </p>

            </div>

          </div>

           <?php $organisation_data = $gemeenteHome->display_online_organisation() ?>

          <div id="frontfaceSign">

              <div id="organisation">
                  <h1 id="infoHeader"><?php echo $organisation_data['organisation_header'];?></h1>

                  <p id="informationSign">

                      <?php echo $organisation_data['organisation_info'];?>
                  </p>

              </div>


              <div id="signup">

                  <h1 id="signHead"><?php echo $organisation_data['form_header'];?></h1>
                  <form action="" method="get">

                      <div id="allInputs">

                      <div class="inputs">

                          <input name="surname" type="text" placeholder="Voornaam" class="requestField">

                          <input name="firstname" type="text" placeholder="Achternaam" class="requestField">

                          <input name="tel" type="number" placeholder="Telefoon Nummer" class="requestField">

                          <input name="email" type="email" placeholder="Email" class="requestField">

                      </div>

                      <div class="inputs">

                          <input name="organisation" type="text" placeholder="Organisatie" class="requestField">

                          <input name="website" type="url" placeholder="Website" class="requestField">

                          <select name="artCultuur" required class="requestField">

                            <option>Cultuur of Kunst</option>
                            <option value="cultuur">Cultuur</option>
                            <option value="art">Art</option>

                         </select>


                        <select name="province" id="places" required class="requestField">

                         <option>Kies een plaats</option>


                       </select>

                      </div>

                      </div>


                      <input name="signUp" type="submit" value="Aanmelden" id="subscription">


                  </form>

              </div>

          </div>

        </header>
        <footer>

          <?php require "../web/vieuws/template/footer.php";?>

        </footer>

    </body>

  </html>
