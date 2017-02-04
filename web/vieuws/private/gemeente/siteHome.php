<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
		<meta name="keywords" content=""/>
		<meta name="description" content=""/>
		<meta name="author" content="Yanick 007"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style/siteHome.css"/>
    <link rel="stylesheet" href="../public/style/header.css"/>
    <link rel="stylesheet" href="../web/vieuws/iconmoons/font_generate/style.css"/>
    <!--<link rel="stylesheet" href="../../public/css/global_style/leader_info.css"/>-->
    <script src="../public/javascript/siteHome.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <title>Admin</title>
  </head>
    <body>

         <header>

          <?php require "../web/vieuws/template/header.php";?>
          <div id="site">



              <div class="parts">


                <div id="siteMenu">


                </div>


              </div>

              <div class="parts">

                  <div id="bannerUpdate">

                      <form action="" method="post" enctype="multipart/form-data">

                          <p id="error">Welcom op de UPDATE venster</p>

                          <div id="forms">

                              <fieldset>

                                  <legend>AANPASSEN</legend>

                                 <div id="inputContainer">

                                   <div class="inputs">
                                       <p>Banner Achter Ground:</p>
                                       <p>Title Text:</p>
                                       <p>Knoop Text:</p>
                                       <p>Informaties:</p>

                                   </div>

                                   <div class="inputs">

                                      <input type="file" name="bannerImage" class='bannerData'>
                                      <input type="text" name="header" class='bannerData'>
                                      <input type="text" name="buttText" class='bannerData'>
                                      <textarea name="infos" id="" cols="30" rows="10" class='bannerData'></textarea>

                                   </div>


                                 </div>

                              </fieldset>

                              <fieldset>

                                  <legend>STYLEN</legend>


                              </fieldset>

                          </div>
                          <div id="bannerTerug">

                            <div class="vieuw">Terug</div>
                            <input type="submit" name="update_banner" value="Aanpassen" id="updateButt">


                          </div>
                      </form>



                  </div>

                <div id="banner">

                    <div id="bannerInfo">

                        <h2 id="titel"></h2>

                        <p id="info"></p>

                        <button id="more"></button>

                    </div>

                    <div id='beweUpload'>

                      <img src="../public/images/uploaded_image/place_background/edit.png" alt="" class="bewerken">
                    <img src="../public/images/uploaded_image/place_background/onlineIcone.png" alt="" id="uploadOnlineButt">

                    </div>

                </div>

                <div id="onlineUploadBanner">

                   <form  action="" method="post" enctype="multipart/form-data">

                     <input type="text" name="bannerHeader" hidden="hidden" id="onlineBannerName">
                     <p>

                      U bevindt u op de upload scherm. Door op de onderstaan knoop te klikken,wordt de banner en alle informaties die bij horen online geupdate of geupload


                      <!--    You are at the upload screen.By clicking on the button under stand, isbanner and all information which belong updated or uploaded online.-->
                        
                        

                     </p>

                     <input type="submit" name="bannerOnline" value="Upload">

                   </form>
                   <button id="onlineTerug">Terug</button>

                </div>


              </div>

              <div class="parts">

                <?php $siteHome->display_private_place();?>

                <div id="place">


                    <div id="placeUpdate">

                        <p id="errorNewPlace">Geef een naam aan</p>

                        <form action="" method="post" enctype="multipart/form-data">

                          <input type="text" name="placeName" placeholder="Plaats Naam" id="newPlaceName">
                          <input type="submit" name="new" value="Toevoegen" id="addPlace">

                        </form>
                        <button id="terug">Terug</button>

                    </div>

                    <div id="newPlace">


                        <h2 id="placeText">Voeg Een nieuw Plaats Toe</h2>

                        <img src="../public/images/uploaded_image/place_background/addIcon.png" alt="" id="placeImg">


                    </div>

                </div>



              </div>

              <div class="parts">

                 <div class="cultuurArt">

                   <div class="backCultArt">

                       <div class="styleCultArt">


                         <form action="" method="post" enctype="multipart/form-data">

                           <p class='error'>error</p>

                             <input type="file" name="background" class="cultArtInput">
                             <input type="text" name="head" placeholder="Nieuw Titel" id="cultArtInputTitel">
                             <textarea name="infos" rows="8" cols="80" id="cultArtInputInfo"></textarea>

                             <select name="choise" id="cultArtInputSelect" required>


                                <option value="cultuur">Cultuur</option>
                                <option value="kunst">Kunst</option>

                             </select>
                             <input type="submit" name="updateCultArt" value="Aanpassen">

                         </form>

                         <div id="styling">

                         </div>

                       </div>

                       <button id="cultArtBack">Terug</button>

                   </div>


                   <div class="frontCultArt">

                     <div class="cultuur">

                         <h1 id="cultuurHeader"></h1>

                         <p id="cultuurText">


                         </p>

                     </div>

                     <div class="art">

                       <h1 id="artHeader"></h1>

                       <p id="artText">



                       </p>

                     </div>

                   </div>


                 </div>

                 <button id="cultArtUpdate">Aanpassen</button>

              </div>



                 <div class="parts">

                   <?php $organisation_data = $siteHome->display_organisation_data() ?>

                 <div id="backfaceSign">

                     <div id="formStyle">

                         <p id="signError">error</p>

                         <form action="" method="post">

                             <input name="infoHeader" type="text" value="<?php echo $organisation_data['info_header'];?>">
                             <input name="formHeader" type="text" value="<?php echo $organisation_data['form_header'];?>">
                             <textarea name="signInfo" rows="10" cols="30"><?php echo $organisation_data['information'];?></textarea>
                             <div class="udateStyle">

                                 <input name="update_organisation" type="submit" value="Aanpassen">

                                 <h4 class="return">Terug</h4>

                             </div>


                         </form>

                     </div>

                     <div id="signStyle"></div>

                 </div>

                 <div id="frontfaceSign">

                     <div id="organisation">
                         <h1 id="infoHeader"><?php echo $organisation_data['info_header'];?></h1>

                         <p id="informationSign">

                             <?php echo $organisation_data['information'];?>
                         </p>

                     </div>


                     <div id="signup">

                         <h1 id="signHead"><?php echo $organisation_data['form_header'];?></h1>
                         <form action="" method="post">

                             <div id="allInputs">

                                 <div class="inputs">

                                 <input name="surname" type="text" placeholder="Voornaam">

                                 <input name="firstname" type="text" placeholder="Achternaam">

                                 <input name="tel" type="number" placeholder="Telefoon Nummer">

                                 <input name="email" type="email" placeholder="Email">

                             </div>

                             <div class="inputs">

                                 <input name="organisation" type="text" placeholder="Organisatie">

                             <input name="website" type="url" placeholder="Website">

                             <select name="artCultuur" required="">

                               <option>Cultuur of Kunst</option>
                               <option value="cultuur">Cultuur</option>
                               <option value="art">Art</option>

                             </select>

                             <select name="province" id="places" required="">

                                <option>Kies een plaats</option>
                                <option value="edam">Edam</option>

                             </select>

                             </div>

                             </div>

                             <div class="udateStyle">

                                 <input name="signUp" type="submit" value="Aanmelden">

                                 <h4 class="update_organisation">Aanpassen</h4>

                             </div>

                         </form>

                     </div>

                 </div>

              </div>



          </div>

         </header>


         <footer>



         </footer>

    </body>

</html>
