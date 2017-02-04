<?php

session_start();

require "../web/models/siteHome_model.php";

$siteHome = new siteHome_model();

if(isset($_GET['id']) AND !empty($_GET['id']) AND $_GET['id'] > 0)
{

   $getID = intval($_GET['id']);
   $adminData = $siteHome->getUser_data($getID);

   if(isset($_SESSION['id']) AND isset($adminData['id']) AND $_SESSION['id'] == $adminData['id'])
   {

      $siteHome->delete_place('delete');
      $siteHome->update_private_place('place_update','../public/images/uploaded_image/place_background',40000);
      $siteHome->new_place('new');
      $siteHome->updateCultuur_art('updateCultArt','../public/images/uploaded_image/cultuurArtImages',4000000);
      $siteHome->select_from_cultuurArt();
      $siteHome->update_organisation('update_organisation');
      $siteHome->banner_upload('bannerOnline');
      $siteHome->upload_place('placeUploaded');
      $siteHome->display_status('banner', 'parts');
      $siteHome->display_places_status('places');
      require "../web/vieuws/private/gemeente/siteHome.php";

      $siteHome->banner_update('update_banner');
    //  $siteHome->banner_image('update_banner', '../public/images/uploaded_image', 100000);
      $siteHome->banner();



   }else{

     //la session de l id n est pas egal a l id de la base de donnee(mettre un lien vers la page de vs n etes pas connecter)

   }

}else{

    //l id n existe pas

}

?>
