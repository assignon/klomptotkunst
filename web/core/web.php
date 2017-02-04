<?php

 require "controller.php";

  class routing extends controller{

    public function __construct(){

      parent::__construct();

    }

    public function route(){

      if(isset($_GET['action']) AND !empty($_GET['action'])){


         $action = $_GET['action'];

         if($action == 'login'){

           $this->vieuw()->render('gemeente/login');

         }else if($action == 'admin'){

            $this->vieuw()->render('gemeente/admin');

         }else if($action == 'sitehome'){

            $this->vieuw()->render('gemeente/siteHome');

         }else if($action == 'home'){

            $this->vieuw()->render_site('gemeente/gemeente_home');

         }else if($action == 'community'){

            $this->vieuw()->render_site('gemeente/community');

         }else if($action == 'contact'){

            $this->vieuw()->render_site('gemeente/contact');

         }  else if($action == 'mail'){

            $this->vieuw()->render('gemeente/mail');

         }else if($action == 'mailSettings'){

            $this->vieuw()->render('gemeente/mailSettings');

         }else if($action == 'agenda'){

            $this->vieuw()->render('gemeente/agenda');

         }


      }else{

        $this->vieuw()->render('gemeente/login');

      }


    }
  }

 ?>
