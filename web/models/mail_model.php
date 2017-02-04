<?php

require "../web/core/model.php";

class mail_model extends model
{

   public function __construct()
   {

      parent::__construct();

   }

   public function getUser_data($admin_id)
   {

     $select = $this->prepare("SELECT*FROM super_user WHERE id=?",array($admin_id));
     $data_fetch = $select->fetch();
     return $data_fetch;

   }


 }

 ?>
