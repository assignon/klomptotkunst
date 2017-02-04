<?php

require "../web/core/model.php";

class mailSettings_model extends model
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


   public function messages()
   {

      $select = $this->PDO()->query("SELECT*FROM mail_settings");

      $mail = $select->fetch();

      ?>

          <script type="text/javascript">

             window.addEventListener("load", function(){

                var mailSender = document.getElementById("mailSender");
                var textareas = document.querySelectorAll(".textareas");

                mailSender.value = "<?php echo $mail['sender'];?>";
                textareas[0].innerHTML = "<?php echo $mail['accepted_message'];?>";
                textareas[1].innerHTML = "<?php echo $mail['refused_message'];?>";
                textareas[2].innerHTML = "<?php echo $mail['temporary_message'];?>";
                textareas[3].innerHTML = "<?php echo $mail['accepted_refuse'];?>";
                textareas[4].innerHTML = "<?php echo $mail['accepted_temporaryOut'];?>";
                textareas[5].innerHTML = "<?php echo $mail['refused_accept'];?>";
                textareas[6].innerHTML = "<?php echo $mail['temporary_accept'];?>";
                textareas[7].innerHTML = "<?php echo $mail['temporary_refuse'];?>";


             })

          </script>

      <?php

   }


   public function messages_update()
   {

     if(isset($_POST['send']))
     {

        $head = htmlspecialchars($_POST['head']);
        $accepted_message = htmlspecialchars($_POST['acceptMail']);
        $refused_message = htmlentities($_POST['refuseMail']);
        $temporary_message = htmlspecialchars($_POST['waitMail']);

        $this->prepare("UPDATE mail_settings SET sender=?, accepted_message=?, refused_message=?, temporary_message=?", array($head, $accepted_message, $refused_message, $temporary_message));
        ?>

            <script type="text/javascript">

               window.addEventListener("load", function(){

                   var error = document.getElementById("error");

                   error.innerHTML = "De texten zijn succesvol aangepast...";
                   error.style.color = "#00D636";

               })

            </script>

        <?php

     }

   }


 }

 ?>
