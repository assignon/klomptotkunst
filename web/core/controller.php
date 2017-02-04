<?php

   class controller{

       public function __construct(){

           require 'vieuw.php';


         }

         protected function vieuw(){

            $vieuw = new vieuw();
            return $vieuw;

         }



   }

 ?>
