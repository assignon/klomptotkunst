<?php

    require "../web/models/contact_model.php";
    $contact = new contact();
     require "../web/vieuws/public/gemeente/contact.php";

     $contact->questions();

 ?>
