<?php
  session_start();
  require "../web/models/login_model.php";

   require '../web/vieuws/private/gemeente/login.php';

   $login = new login_model();

   //$login->insert_img('avatar', 'avatar_src', '../public/images/uploaded_image/adminAvatar.png');
   //$login->insert_img('background_image','background_url','../public/images/uploaded_image/amsterdam.jpg');
   $login->change_image('changeBg','background_image','background_url', 'background', '../public/images/uploaded_image' ,95000);
   $login->change_image('changeAvatar','avatar','avatar_src', 'avatar', '../public/images/uploaded_image', 30000);

   $login->display_img('avatar', 'avatar_src','avatar');
   $login->display_img('background_image', 'background_url','body');
   $login->signin();



 ?>
