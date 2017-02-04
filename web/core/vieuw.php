<?php

   class vieuw {

       public function __construct(){



       }


       public function render($path){

          require '../web/vieuws/sessions/private_session/'.$path.'.php';

       }

       public function render_site($path){

          require '../web/vieuws/sessions/public_session/'.$path.'.php';

       }

   }

 ?>
