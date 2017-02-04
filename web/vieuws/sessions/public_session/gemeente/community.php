<?php

     require "../web/models/community_model.php";
     $community = new community();
     require "../web/vieuws/public/gemeente/community.php";

     $community->displayCommunities();

 ?>
