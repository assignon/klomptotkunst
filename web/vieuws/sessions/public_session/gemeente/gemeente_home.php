<?php

  require "../web/models/gemeente_home_model.php";
$gemeenteHome = new gemeente_home();
   require "../web/vieuws/public/gemeente/gemeente_home.php";


   $gemeenteHome->online_banner();
   $gemeenteHome->online_places();
   $gemeenteHome->online_cultuurArt();
   $gemeenteHome->places();
  // $gemeenteHome->search_place();


 ?>
